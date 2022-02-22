<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
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

    public function messageHandler($event)
    {
        switch($event["message"]["type"]){
            case "text" : 
                $this->textHandler($event);
                break;
        }   

    }

    public function textHandler($event)
    {
        $line = new LineMessagingAPI();

        switch($event["message"]["text"])
        {     
            case "อื่นๆ" :  
                $line->replyToUser(null, $event, "other");
                break;
            case "other" :  
                $line->replyToUser(null, $event, "other");
                break;
            case "ประกันสัตว์เลี้ยง" :  
                $line->replyToUser(null, $event, "pet_insurance");
                break;
            case "pet insurance" :  
                $line->replyToUser(null, $event, "pet_insurance");
                break;
            case "ติดต่อ PEDDyHUB" :  
                $line->replyToUser(null, $event, "contact");
                break;
            case "contact" :  
                $line->replyToUser(null, $event, "contact");
                break;
            case "language" :  
                $line->replyToUser(null, $event, "language");
                break;
        }
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

        $data_users = User::where('provider_id', $provider_id)->get();

        if (!empty($data_users[0])) {
            // เช็คภาษาของ User
            $this->check_language_user($data_users);
        }else {
            // ตั้งค่าริชเมนูเริ่มต้น
            $this->set_richmanu_start($provider_id , $data_result->language);
        }

    }

    public function check_language_user($data_users)
    {
        foreach ($data_users as $data_user) {
            $user_language = $data_user->profile->language ;
            $provider_id = $data_user->provider_id ;
        }

        if (empty($user_language)) {
            // DF ริชเมนู EN 
            $richMenuId = "richmenu-9fe970f1ec5f06e605e47817d609219b" ;
        }else {
            switch ($user_language) {
                case 'th':
                    $richMenuId = "richmenu-4e144d1cdd02b6be63227643a34bf6e2" ;
                    break;
                case 'en':
                    $richMenuId = "richmenu-9fe970f1ec5f06e605e47817d609219b" ;
                    break;
            }
        }

        $this->set_richmanu_language($provider_id , $richMenuId , $user_language);
        
    }

    public function set_richmanu_language($provider_id , $richMenuId , $user_language)
    {
        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('CHANNEL_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CLIENT_SECRET')]);
        $response = $bot->linkRichMenu($provider_id, $richMenuId);

        $data = [
            "title" => "set_richmanu_" . $user_language,
            "content" => $provider_id,
        ];
        MyLog::create($data);
    }

    public function set_richmanu_start($provider_id , $device_language)
    {
        switch ($device_language) {
            case 'th':
                $richMenuId_start = "richmenu-8eeb36859ec849957228c1a07f8aee28" ;
                break;
            case 'en':
                $richMenuId_start = "richmenu-3cac8ef4737798bbb9b3dda3d6100dc6" ;
                break;
            
            default:
                // en
                $richMenuId_start = "richmenu-3cac8ef4737798bbb9b3dda3d6100dc6" ;
                break;
        }

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('CHANNEL_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_CLIENT_SECRET')]);
        $response = $bot->linkRichMenu($provider_id, $richMenuId_start);

        $data = [
            "title" => "set_richmanu_start",
            "content" => $provider_id,
        ];
        MyLog::create($data);

    }
    

}
