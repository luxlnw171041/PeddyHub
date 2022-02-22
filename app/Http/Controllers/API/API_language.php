<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;
// use App\Models\LineMessagingAPI;


class API_language extends Controller
{
    public function change_language($language , $user_id)
    {
        DB::table('profiles')
              ->where('user_id', $user_id)
              ->update([
                'language' => $language,
        ]);

        $data_users = User::where('id', $user_id)->get();

        $lineAPI = new LineApiController();
        $lineAPI->check_language_user($data_users);

        return $language;
    }

    // public function change_language_fromline($language , $user_id)
    // {
    //     DB::table('users')
    //           ->where('id', $user_id)
    //           ->update([
    //             'language' => $language,
    //     ]);

    //     $data_users = DB::table('users')
    //             ->where('id', $user_id)
    //             ->where('status', "active")
    //             ->get();

    //     $lineAPI = new LineApiController();
    //     $lineAPI->check_language_user($data_users);

    //     foreach ($data_users as $key ) {
    //       $provider_id = $key->provider_id ;
    //     }

    //     $data_Text_topic = [
    //         "เปลี่ยนภาษาเรียบร้อยแล้ว",
    //     ];

    //     $data_topic = $this->language_for_user($data_Text_topic, $provider_id);

    //     $template_path = storage_path('../public/json/change_language_success.json');   
    //     $string_json = file_get_contents($template_path);
    //     $string_json = str_replace("เปลี่ยนภาษาเรียบร้อยแล้ว",$data_topic[0],$string_json);

    //     $messages = [ json_decode($string_json, true) ]; 

    //     $body = [
    //         "to" => $provider_id,
    //         "messages" => $messages,
    //     ];

    //     $opts = [
    //         'http' =>[
    //             'method'  => 'POST',
    //             'header'  => "Content-Type: application/json \r\n".
    //                         'Authorization: Bearer '.env('CHANNEL_ACCESS_TOKEN'),
    //             'content' => json_encode($body, JSON_UNESCAPED_UNICODE),
    //             //'timeout' => 60
    //         ]
    //     ];
                            
    //     $context  = stream_context_create($opts);
    //     $url = "https://api.line.me/v2/bot/message/push";
    //     $result = file_get_contents($url, false, $context);

    //     //SAVE LOG
    //     $data = [
    //         "title" => "https://api.line.me/v2/bot/message/push",
    //         "content" => json_encode($result, JSON_UNESCAPED_UNICODE),
    //     ];

    //     MyLog::create($data);
    //     // return $result;
    //     return view('return_line');
    // }

}