<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use App\Models\LineMessagingAPI;

use App\Models\Adoptpet;
use App\Models\Pet_Category;
use Illuminate\Http\Request;
use App\Models\Lost_Pet;
use App\Models\Pet;

class test_for_devController extends Controller
{
    public function send_line_lost_pet(Request $request)
    {
        // 7 วัน ถามข้อมูล ค้นหาสัตว์
        $date_now = date("Y-m-d");
        $date_delete_7 = strtotime("-7 days");
        $date_7 = date("Y-m-d" , $date_delete_7);

        // ส่งไลน์ถามเจ้าของ เจอยัง ? 

        $check_7days = Lost_Pet::where('updated_at' , "<=" , $date_7)->get();

        foreach ($check_7days as $item) {
            
            $data_users = User::where('id', $item->user_id)->first();
            $data_pets = Pet::where('id', $item->pet_id)->first();

            $template_path = storage_path('../public/json/flex_confirm_lost_pet.json');   
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("PET_ID",$item->pet_id,$string_json); 

            $messages = [ json_decode($string_json, true) ]; 

            $body = [
                "to" => $data_users->provider_id,
                "messages" => $messages,
            ];

            $opts = [
                'http' =>[
                    'method'  => 'POST',
                    'header'  => "Content-Type: application/json \r\n".
                                'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                    'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data_save_log = [
                "title" => "ส่งข้อความยืนยันการค้นหาสัตว์เลี้ยง",
                "content" => $data_users->username . " - " . $data_users->provider_id,
            ];

            MyLog::create($data_save_log);

        }

        return "ok" ;
    }

}
