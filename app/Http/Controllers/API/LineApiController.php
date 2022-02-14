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

        // //GET ONLY FIRST EVENT
        // $event = $requestData["events"][0];

        // switch($event["type"]){
        //     case "message" : 
        //         $this->messageHandler($event);
        //         break;
        //     case "postback" : 
        //         $this->postbackHandler($event);
        //         break;
        //     case "join" :
        //         $this->save_group_line($event);
        //         break;
        //     case "follow" :
        //         // $this->user_follow_line($event);
        //         DB::table('users')
        //             ->where([ 
        //                     ['provider_id', $event['source']['userId']],
        //                 ])
        //             ->update(['add_line' => 'Yes']);
        //         break;
        // }

        return $data ;
    }

    

}
