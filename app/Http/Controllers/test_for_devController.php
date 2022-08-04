<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;

use App\Models\LineMessagingAPI;
use App\Models\Mylog;

use App\Models\Adoptpet;
use App\Models\Pet_Category;
use Illuminate\Http\Request;
use App\Models\Lost_Pet;
use App\Models\Pet;

class test_for_devController extends Controller
{
    public function test_for_dev()
    {
        $pet_id = "1";
        // 7 วัน ถามข้อมูล ค้นหาสัตว์
        $date_now = date("Y-m-d");
        $date_delete_7 = strtotime("-7 days");
        $date_7 = date("Y-m-d" , $date_delete_7);

        $data = Lost_Pet::where('pet_id' , $pet_id)->where('updated_at' , "<=" , $date_7)->first();

        if (!empty($data)) {
            echo $data->id;
        }else{
            echo "ไม่มี";
        }

        echo "<pre>" ;
        print_r($data);
        echo "<pre>" ;
        exit();
    }

    public function test_send_png(Request $request)
    {

        $data_users = User::where('id', "1")->first();

        $template_path = storage_path('../public/json/sticker_peddyhub/stk_ph_test.json');   
        $string_json = file_get_contents($template_path);

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

        return "ok" ;
    }

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

            $data_Text_topic = [
                "ประกาศหาน้องเป็นอย่างไรบ้าง",
                "วันที่หาย",
                "เจอแล้ว",
                "ส่งขอความอีกครั้ง",
                "ยืนยันการค้นหา",
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $data_users->provider_id);

            $template_path = storage_path('../public/json/flex_confirm_lost_pet.json');   
            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ประกาศหาน้องเป็นอย่างไรบ้าง",$data_topic[0],$string_json); 
            $string_json = str_replace("วันที่หาย",$data_topic[1],$string_json); 
            $string_json = str_replace("เจอแล้ว",$data_topic[2],$string_json); 
            $string_json = str_replace("ส่งขอความอีกครั้ง",$data_topic[3],$string_json); 
            $string_json = str_replace("ยืนยันการค้นหา",$data_topic[4],$string_json); 

            $string_json = str_replace("IMGPET",$item->photo,$string_json); 
            $string_json = str_replace("pet_name",$data_pets->name,$string_json); 
            $string_json = str_replace("22/2/2022",$item->created_at,$string_json); 
            
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

    // แปลภาษา
    public function language_for_user($data_topic, $to_user)
    {
        $data_users = User::where('provider_id', $to_user)->get();

        foreach ($data_users as $data_user) {
            if (!empty($data_user->profile->language)) {
                    $user_language = $data_user->profile->language ;
                    if ($user_language == "zh-TW") {
                        $user_language = "zh_TW";
                    }
                    if ($user_language == "zh-CN") {
                        $user_language = "zh_CN";
                    }
                }else{
                    $user_language = 'en' ;
                }
        }

        for ($i=0; $i < count($data_topic); $i++) { 

            $text_topic = DB::table('text_topics')
                    ->select($user_language)
                    ->where('th', $data_topic[$i])
                    ->where('en', "!=", null)
                    ->get();

            foreach ($text_topic as $item_of_text_topic) {
                $data_topic[$i] = $item_of_text_topic->$user_language ;
            }
        }

        return $data_topic ;

    }



}
