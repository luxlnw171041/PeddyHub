<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Profile;
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

    public function postbackHandler($event)
    {
        $line = new LineMessagingAPI();

        $data_postback_explode = explode("/",$event["postback"]["data"]);
        $data_postback = $data_postback_explode[0] ;

        switch($data_postback){
            case "Chinese" : 
                $line->replyToUser(null, $event, "Chinese");
                break;
            case "check_list" :  
                $line->replyToUser($data_postback_explode[1], $event, "check_list");
                break;
            case "qr_code_checklist" : 
                $line->replyToUser($data_postback_explode[1], $event, "qr_code_checklist");
                break;
        }   

    }

    public function textHandler($event)
    {
        $line = new LineMessagingAPI();

        if ($event["message"]["text"] == "ติดต่อ PEDDyHUB") {
            $line->replyToUser(null, $event, "contact_PEDDyHUB");
        }else {

            $data_users = User::where('provider_id', $event["source"]['userId'])->get();

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
            
            $text_topic = DB::table('text_topics')
                ->select('th')
                ->where($user_language, $event["message"]["text"])
                ->get();

            foreach ($text_topic as $item) {
                $text_th = $item->th ;
            }

            switch( strtolower($text_th) )
            {     
                case "อื่นๆ" :  
                    $line->replyToUser(null, $event, "other");
                    break;
                case "ประกันสัตว์เลี้ยง" :  
                    $line->replyToUser(null, $event, "pet_insurance");
                    break;
                case "ติดต่อ" :  
                    $line->replyToUser(null, $event, "contact");
                    break;
                case "language" :  
                    $line->replyToUser(null, $event, "language");
                    break;
                case "ข้อมูลของคุณ" :  
                    $line->replyToUser(null, $event, "profile");
                    break;
                case "ธนาคารเลือด" :  
                    $line->replyToUser(null, $event, "blood_bank");
                    break;
                case "ยืนยันฝากเลือด" :  
                    $line->replyToUser(null, $event, "cf_blood_bank");
                    break;
                case "ฝากเลือดสำเร็จ" :  
                        $line->replyToUser(null, $event, "success_blood_bank");
                        break;
                case "เจ้าตัวแสบ" :  
                    $line->replyToUser(null, $event, "my_pet");
                    break;
                case "viicheck" :  
                    $line->replyToUser(null, $event, "viicheck");
                    break;
            }
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
            $richMenuId = "richmenu-dbf4820aecd13df1703c12d09322c72b" ;
        }else {
            switch ($user_language) {
                case 'th':
                    $richMenuId = "richmenu-43ef567de0818cdd79ae24a2d50aa4ee" ;
                    break;
                case 'en':
                    $richMenuId = "richmenu-dbf4820aecd13df1703c12d09322c72b" ;
                    break;
                case 'zh-TW':
                    $richMenuId = "richmenu-d40f5cc58d1c219ddaa6ac0a65bb662f" ;
                    break;
                case 'zh-CN':
                    $richMenuId = "richmenu-6916e86cdfc521df9b56ca28625592f0" ;
                    break;
                case 'ja':
                    $richMenuId = "richmenu-7ec356dfb24f08d9e756a0e2b8a01824" ;
                    break;
                case 'ko':
                    $richMenuId = "richmenu-70c7b6c040ec0b8cc442d484fe14b10d" ;
                    break;
                case 'es':
                    $richMenuId = "richmenu-c809bb15d43d845ffbad0170655b84b5" ;
                    break;
                case 'lo':
                    $richMenuId = "richmenu-c069c7f512440742229c84f2bacac98a" ;
                    break;
                case 'my':
                    $richMenuId = "richmenu-805f223be51bdc874e62d398c0eda1c3" ;
                    break;
                case 'de':
                    $richMenuId = "richmenu-ca6576055a92884a28c29478fb1f4098" ;
                    break;
                case 'hi':
                    $richMenuId = "richmenu-2bbb6e7e290379ec4c6a5eadde431b4e" ;
                    break;
                case 'ar':
                    $richMenuId = "richmenu-e76c82ef1ab500b730fdf03693d18b00" ;
                    break;
                case 'ru':
                    $richMenuId = "richmenu-65256f37cbd6bdcc026e5bcd4dbaa45c" ;
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
            case 'zh-TW':
                $richMenuId_start = "richmenu-4b756c02810fe8cd9c78113a3aeb1f36" ;
                break;
            case 'zh-CN':
                $richMenuId_start = "richmenu-8e7af0aa823103063f1fa6b8e1f7e28b" ;
                break;
            case 'ja':
                $richMenuId_start = "richmenu-7e58899e24ce1e7426f3c9a0e2449b2b" ;
                break;
            case 'ko':
                $richMenuId_start = "richmenu-3a90990cc163861dd76a9ac4ec119e8b" ;
                break;
            case 'es-ES':
                $richMenuId_start = "richmenu-9b794a29304525db1e5c03071006c534" ;
                break;
            case 'lo':
                $richMenuId_start = "richmenu-629b710928998ef3708438ed1b1b02a9" ;
                break;
            case 'my':
                $richMenuId_start = "richmenu-45ed64d7f16ba38019298a9b54c47d0f" ;
                break;
            case 'de':
                $richMenuId_start = "richmenu-3df87fdac7037f17b37510aacfac4691" ;
                break;
            case 'hi':
                $richMenuId_start = "richmenu-5c6f39c3fc496c157537698202e04c4f" ;
                break;
            case 'ar':
                $richMenuId_start = "richmenu-712b3dbaebbe8d7a25c97e75a1e4d6c7" ;
                break;
            case 'ru':
                $richMenuId_start = "richmenu-7acb0c4dfb15371ccb0db93917a4eef7" ;
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


    // ตั้งค่าริชเมนูอันใหม่ทั้งระบบ
    public function set_new_richMenu()
    {
        $data_users = Profile::where('type', 'line')->get();

        foreach ($data_users as $key) {
            $user_language = $key->language ;
            $provider_id = $key->user->provider_id;

            if (empty($user_language)) {
                // DF ริชเมนู EN 
                $richMenuId = "richmenu-dbf4820aecd13df1703c12d09322c72b" ;
            }else {
                switch ($user_language) {
                    case 'th':
                        $richMenuId = "richmenu-43ef567de0818cdd79ae24a2d50aa4ee" ;
                        break;
                    case 'en':
                        $richMenuId = "richmenu-dbf4820aecd13df1703c12d09322c72b" ;
                        break;
                    case 'zh-TW':
                        $richMenuId = "richmenu-d40f5cc58d1c219ddaa6ac0a65bb662f" ;
                        break;
                    case 'zh-CN':
                        $richMenuId = "richmenu-6916e86cdfc521df9b56ca28625592f0" ;
                        break;
                    case 'ja':
                        $richMenuId = "richmenu-7ec356dfb24f08d9e756a0e2b8a01824" ;
                        break;
                    case 'ko':
                        $richMenuId = "richmenu-70c7b6c040ec0b8cc442d484fe14b10d" ;
                        break;
                    case 'es':
                        $richMenuId = "richmenu-c809bb15d43d845ffbad0170655b84b5" ;
                        break;
                    case 'lo':
                        $richMenuId = "richmenu-c069c7f512440742229c84f2bacac98a" ;
                        break;
                    case 'my':
                        $richMenuId = "richmenu-805f223be51bdc874e62d398c0eda1c3" ;
                        break;
                    case 'de':
                        $richMenuId = "richmenu-ca6576055a92884a28c29478fb1f4098" ;
                        break;
                    case 'hi':
                        $richMenuId = "richmenu-2bbb6e7e290379ec4c6a5eadde431b4e" ;
                        break;
                    case 'ar':
                        $richMenuId = "richmenu-e76c82ef1ab500b730fdf03693d18b00" ;
                        break;
                    case 'ru':
                        $richMenuId = "richmenu-65256f37cbd6bdcc026e5bcd4dbaa45c" ;
                        break;
                    
                }
            }

            $this->set_richmanu_language($provider_id , $richMenuId , $user_language);

        }
        
        return "OK KUB" ;
    }
    

}
