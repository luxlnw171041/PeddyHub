<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Models\Mylog;
use App\Models\LineMessagingAPI;
use Illuminate\Support\Facades\DB;

class LineApiController extends Controller
{
    public function store(Request $request)
    {
        //SAVE LOG
        $requestData = $request->all();
        $data = [
            "title" => "Line",
            "content" => json_encode($requestData, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data);  

        //GET ONLY FIRST EVENT
        $event = $requestData["events"][0];

        switch($event["type"]){
            case "message" : 
                $this->messageHandler($event);
                break;
            case "postback" : 
                $this->postbackHandler($event);
                break;
            case "join" :
                $this->save_group_line($event);
                break;
            case "follow" :
                $this->user_follow_line($event);
                DB::table('users')
                    ->where([ 
                            ['provider_id', $event['source']['userId']],
                        ])
                    ->update(['add_line' => 'Yes']);
                break;
        }

        return $data ;
    }


    public function user_follow_line($event)
    {
        $provider_id = $event['source']['userId'];

        $opts = [
            'http' =>[
                'method'  => 'GET',
                'header'  => 'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
                //'timeout' => 60
            ]
        ];
                            
        $context  = stream_context_create($opts);

        $url = "https://api.line.me/v2/bot/profile/".$provider_id;
        $result = file_get_contents($url, false, $context);

        $data_result = json_decode($result);

        //SAVE LOG
        $data = [
            "title" => "ตรวจสอบภาษาเครื่องผู้ใช้",
            "content" => $data_result->displayName . "-" . $data_result->language,
        ];
        MyLog::create($data);

        $data_users = DB::table('users')
            ->where('provider_id', $provider_id)
            ->get();

        // if (!empty($data_users[0])) {
        //     // เช็คภาษาของ User
        //     $this->check_language_user($data_users);
        // }else {
        //     // ตั้งค่าริชเมนูเริ่มต้น
        //     $this->set_richmanu_start($provider_id , $data_result->language);
        // }

    }
    

}
