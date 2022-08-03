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

                $this->send_finished('found' , 'successfully', $event);

            }else{
                $num_round = $data->send_round ;

                $sum_round = (int)$num_round + 1;
               
                $requestData['send_round'] =  $sum_round ;
                $data->update($requestData);

                $this->send_finished('send_line' , 'successfully', $event);

                $line = new LineMessagingAPI();
                $line->send_lost_pet_again($data);

            }
        }else{
            //  ส่งข้อความตอบ คุณดำเนินการนี้แล้ว
            if ($answer == 'found') {
                $this->send_finished('found' , 'not_successfully', $event);
            }else{
                $this->send_finished('send_line' , 'not_successfully', $event);
            }
        }

        return view('return_line');

    }

    public function send_finished($answer , $type_send , $event)
    {
        $data_users = User::where('provider_id', $event['userId'])->first();

        $data_Text_topic = [
            "PEDDyHUB ขอแสดงความยินดีด้วยนะคะ",
            "ส่งข้อความค้นหาอีกครั้งเรียบร้อยแล้วค่ะ",
            "คุณได้ดำเนินการนี้ไปแล้ว คุณสามารถส่งข้อความอีกครั้งใน 7 วันหลังจากส่งครั้งล่าสุด",
            "คุณได้ดำเนินการนี้ไปแล้ว",
        ];

        $data_topic = $this->language_for_user($data_Text_topic, $data_users->provider_id);

        $template_path = storage_path('../public/json/send_finished.json');   
        $string_json = file_get_contents($template_path);

        // if ($type_send == "successfully") {  
        //     if ($answer == "found") {
        //         // กดหาน้องเจอครั้งแรก
        //         $string_json = str_replace("เปลี่ยนข้อความตรงนี้",$data_topic[0],$string_json);
        //     }else{
        //         // กดส่งข้อความอีกครั้งครั้งแรก
        //         $string_json = str_replace("เปลี่ยนข้อความตรงนี้",$data_topic[1],$string_json);
        //     }
        // }else{
        //     if ($answer == "found") {
        //         // กดหาน้องเจอครั้งต่อๆไป
        //         $string_json = str_replace("เปลี่ยนข้อความตรงนี้",$data_topic[3],$string_json);
        //     }else{
        //         // กดส่งข้อความอีกครั้งครั้งต่อๆไป
        //         $string_json = str_replace("เปลี่ยนข้อความตรงนี้",$data_topic[2],$string_json);
        //     }
        // }

        $messages = [ json_decode($string_json, true) ]; 

        $body = [
            "replyToken" => $event["replyToken"],
            "messages" => $messages,
        ];

        $opts = [
            'http' =>[
                'method'  => 'POST',
                'header'  => "Content-Type: application/json \r\n".
                            'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);
        //https://api-data.line.me/v2/bot/message/11914912908139/content
        $url = "https://api.line.me/v2/bot/message/reply";
        $result = file_get_contents($url, false, $context);

        //SAVE LOG
        $data_save_log = [
            "title" => "ส่งข้อความดำเนินการเสร็จสิ้น",
            "content" => $data_users->username ,
        ];

        Mylog::create($data_save_log);

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
