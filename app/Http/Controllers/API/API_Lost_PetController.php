<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Lost_Pet;
use App\Models\Pet;
use App\Models\LineMessagingAPI;
use Illuminate\Support\Facades\Auth;

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

    public function check_line_lost_pet($pet_id , $answer)
    {
        // $data = Lost_Pet::findOrFail($pet_id);
        $data = Lost_Pet::where('pet_id' , $pet_id)->first();
       
        if ($answer == 'found') {
            $requestData['status'] =  'found' ;
            $data->update($requestData);

        }else{
            $num_round = $data->send_round ;

            $sum_round = (int)$num_round + 1;
           
            $requestData['send_round'] =  $sum_round ;
            $data->update($requestData);

            $line = new LineMessagingAPI();
            $line->send_lost_pet_again($data);
        }

         return view('return_line');

    }

}
