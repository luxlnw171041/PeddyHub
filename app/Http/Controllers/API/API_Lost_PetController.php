<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Lost_Pet;
use App\Models\Pet;
use App\Models\LineMessagingAPI;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Pet_Category;
use App\Models\Mylog;

class API_Lost_PetController extends Controller
{
    public function select_img_pet($pet_id)
    {
        $data_pet = DB::table('pets')->where('id', $pet_id)->get();
       
        return $data_pet;
    }

    public function check_lost_pet($pet_id)
    {
        $data_lost_pet = Lost_Pet::where('pet_id' , $pet_id)->where('status' , 'searching')->get();

        return $data_lost_pet ;
    }

    public function check_line_lost_pet($pet_id , $answer , $event)
    {
        // 7 วัน ถามข้อมูล ค้นหาสัตว์
        $date_now = date("Y-m-d");
        $date_delete_7 = strtotime("-7 days");
        $date_7 = date("Y-m-d" , $date_delete_7);

        $data = Lost_Pet::where('pet_id' , $pet_id)->where('updated_at' , "<=" , $date_7)->first();

        if (!empty($data)) {
            if ($answer == 'found') {
                $requestData['status'] =  'found' ;
                $data->update($requestData);

                $line->send_finished('found' , 'successfully', $event);

            }else{
                $num_round = $data->send_round ;

                $sum_round = (int)$num_round + 1;
               
                $requestData['send_round'] =  $sum_round ;
                $data->update($requestData);

                $line = new LineMessagingAPI();
                $line->send_lost_pet_again($data);

                $line->send_finished('send_line' , 'successfully', $event);

            }
        }else{
            //  ส่งข้อความตอบ คุณดำเนินการนี้แล้ว
            if ($answer == 'found') {
                $line->send_finished('found' , 'not_successfully', $event);
            }else{
                $thilines->send_finished('send_line' , 'not_successfully', $event);
            }
        }

        return view('return_line');

    }

}
