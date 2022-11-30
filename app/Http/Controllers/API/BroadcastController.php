<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads_content;
use App\Models\Partner_premium;
use App\Models\Mylog;
use App\Models\User;
use DB;
use Intervention\Image\ImageManagerStatic as Image;

class BroadcastController extends Controller
{
    function send_content_BC_by_check_in(Request $request)
    {
        $requestData = $request->all();

        // echo "<pre>" ;
        // print_r($requestData);
        // echo "<pre>" ;
        // exit();

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        if (!empty($arr_user_id)) {
            // เช็คว่าเป็น Content ใหม่หรือเก่า
            if ($requestData['send_again'] == "Yes") { // Content เก่า

                $data_Ads_content = Ads_content::where('id' , $requestData['id_ads'] )->first();
                $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

                $requestData['photo'] = $data_Ads_content->photo ;

                $BC_by_check_in_sent = $data_partner_premium->BC_by_check_in_sent ;
                $sum_BC_by_check_in_sent = $BC_by_check_in_sent + $requestData['amount'] ;
                $sum_send_round = $data_Ads_content->send_round + 1 ;

                
                DB::table('partner_premia')
                    ->where('id_partner', $requestData['id_partner'])
                    ->update([
                        'BC_by_check_in_sent' => $sum_BC_by_check_in_sent ,
                ]);

                DB::table('ads_contents')
                    ->where('id', $requestData['id_ads'])
                    ->update([
                        'send_round' => $sum_send_round ,
                ]);

                $requestData['link'] = $data_Ads_content->link ;

                // ส่ง content เข้าไลน์
                $this->send_content_BC_to_line($requestData , $data_Ads_content);

            }else{ // Content ใหม่

                if ($request->hasFile('photo')) {
                    $requestData['photo'] = $request->file('photo')->store('uploads', 'public');
                }

                Ads_content::create($requestData);

                $data_Ads_content = Ads_content::latest()->first();
                $data_partner_premium = Partner_premium::where('id_partner' , $requestData['id_partner'])->first();

                $BC_by_check_in_sent = $data_partner_premium->BC_by_check_in_sent ;
                $sum_BC_by_check_in_sent = $BC_by_check_in_sent + $requestData['amount'] ;
                $sum_send_round = $data_Ads_content->send_round + 1 ;

                DB::table('partner_premia')
                    ->where('id_partner', $requestData['id_partner'])
                    ->update([
                        'BC_by_check_in_sent' => $sum_BC_by_check_in_sent ,
                ]);

                DB::table('ads_contents')
                    ->where('id', $data_Ads_content->id)
                    ->update([
                        'link' => "https://www.peddyhub.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id,
                        'send_round' => $sum_send_round ,
                ]);

                $requestData['link'] = "https://www.peddyhub.com/api/check_content?redirectTo=" . $requestData['link'] . "&id_content=" . $data_Ads_content->id;

                // ส่ง content เข้าไลน์
                $this->send_content_BC_to_line($requestData , $data_Ads_content);

            }
        }


        return redirect('/broadcast/broadcast_by_check_in')->with('flash_message', 'Partner updated!');

    }

    // -------------- send content LINE -------------------------

    function send_content_BC_to_line($requestData , $data_Ads_content){

        if ($requestData['send_again'] == "Yes") {
            $arr_user_id = json_decode($requestData['arr_user_id_send_to_user']) ;
        }else{
            $arr_user_id = json_decode($requestData['arr_user_id_selected']) ;
        }

        $show_user = [] ;
        if (!empty($data_Ads_content->show_user)) {
            $show_user = json_decode($data_Ads_content->show_user) ;
        }

        $img = 'https://www.peddyhub.com/storage/' . $requestData['photo'];
        $img_content = Image::make( $img );

        $img_content_w = $img_content->width();
        $img_content_h = $img_content->height();

        // ส่ง content
        if (!empty($arr_user_id)) {
            for ($xi=0; $xi < count($arr_user_id); $xi++) { 

                $data_user = User::where('id' , $arr_user_id[$xi])->first();

                $template_path = storage_path('../public/json/broadcast/flex-broadcast.json');
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ตัวอย่าง",$requestData['name_content'],$string_json);
                $string_json = str_replace("TEXT_W",$img_content_w,$string_json);
                $string_json = str_replace("TEXT_H",$img_content_h,$string_json);
                $string_json = str_replace("PHOTO_BC",$requestData['photo'],$string_json);
                $string_json = str_replace("TEXT_URL",$requestData['link'] . "&user_id=" . $arr_user_id[$xi] ,$string_json);

                $messages = [ json_decode($string_json, true) ];

                $body = [
                    "to" => $data_user->provider_id,
                    "messages" => $messages,
                ];

                // flex ask_for_help
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
                $url = "https://api.line.me/v2/bot/message/push";
                $result = file_get_contents($url, false, $context);

                // SAVE LOG
                $data = [
                    "title" => "BC_by_check_in" ,
                    "content" => "TO >> user_id = " . $arr_user_id[$xi],
                ];
                MyLog::create($data);

                // update show_user in ads_contents
                array_push($show_user, $arr_user_id[$xi]);

                DB::table('ads_contents')
                    ->where('id', $data_Ads_content->id)
                    ->update([
                        'show_user' => $show_user ,
                ]);

            }
        }
        

        return "send done all" ;

    }

    function check_content(Request $request){

        $requestData = $request->all();

        $url = $requestData['redirectTo'] ;
        $to_url_ep = explode("//" , $url);

        if (count($to_url_ep) > 1) {
            $to_url = $url ;
        }else{
            $to_url = 'http://' . $url ;
        }

        $data_Ads_content = Ads_content::where('id' , $requestData['id_content'])->first();

        $arr_user_click = [] ;

        if (!empty($data_Ads_content->user_click)) {
            $arr_user_click = json_decode($data_Ads_content->user_click) ;
        }
        array_push($arr_user_click, $requestData['user_id']);

        DB::table('ads_contents')
            ->where('id', $requestData['id_content'])
            ->update([
                'user_click' => $arr_user_click ,
        ]);

        return redirect($to_url)->with('flash_message', 'Partner updated!');
    }

}
