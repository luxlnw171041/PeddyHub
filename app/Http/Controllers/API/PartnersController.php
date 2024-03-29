<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\LineMessagingAPI;
use App\Http\Controllers\API\API_Time_zone;
use App\Models\Mylog;
use App\Models\Disease;

use App\Models\Check_in;
use App\Models\Partner;
use App\Models\Partner_token;

class PartnersController extends Controller
{
    public function search_name($id_partner_name_area , $text_name_area , $name)
    {
        if ($text_name_area == "ทั้งหมด") {

            $data = DB::table('profiles')
                ->join('check_ins', 'profiles.id', '=', 'check_ins.user_id')
                ->select('profiles.*' , 'check_ins.created_at as created_check_in')
                ->where("check_ins.check_in_at", 'LIKE', "%$id_partner_name_area%")
                ->where('check_ins.status' , 'show')
                ->where("profiles.real_name" , 'LIKE', "%$name%")
                ->groupBy('profiles.id')
                ->orderBy('created_at' , 'ASC')
                // ->groupBy('check_ins.created_at')
                ->get();

        }else{
            $data = DB::table('profiles')
                ->join('check_ins', 'profiles.id', '=', 'check_ins.user_id')
                ->select('profiles.*')
                ->where("check_ins.partner_id", $id_partner_name_area)
                ->where('check_ins.status' , 'show')
                ->where("profiles.real_name" , 'LIKE', "%$name%")
                ->groupBy('profiles.id')
                ->orderBy('created_at' , 'ASC')
                // ->groupBy('check_ins.created_at')
                ->get();
        }

        return $data ;
    }

    public function show_group_risk($user_id , $id_partner_name_area , $name_disease)
    {
        // แก้ check_in_at เป็น id_partner_name_area

        DB::table('profiles')
          ->where('id', $user_id)
          ->update([
            'check_covid' => "Yes",
        ]);

        $data_all_date = array();
        $uesr_risk_groups = array();
        $data_user_risk_groups = array();
        
        $groupBy_date = Check_in::where("user_id" , $user_id)
            ->where("check_in_at", 'LIKE', "%$id_partner_name_area%")
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"))
            ->get();

        $i = 0 ;

        foreach ($groupBy_date as $key) {
            
            $time_in = "07:00:00";
            $time_out = "19:00:00";
            // echo "<br>";
            // echo date("Y/m/d" , strtotime($key->created_at ));

            $time_in_of_date = Check_in::where("user_id" , $user_id)
                ->select('time_in')
                ->where("check_in_at", 'LIKE', "%$id_partner_name_area%")
                ->where("time_in", "!=" , null)
                ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                ->orderBy('time_in', 'desc')
                ->get();

            foreach ($time_in_of_date as $item) {

                $time_in = $item->time_in;
            }

            $time_out_of_date = Check_in::where("user_id" , $user_id)
                ->select('time_out')
                ->where("check_in_at", 'LIKE', "%$id_partner_name_area%")
                ->where("time_out", "!=" , null)
                ->whereDate('created_at', date("Y/m/d" , strtotime($key->created_at )))
                ->orderBy('time_out', 'desc')
                ->get();

            foreach ($time_out_of_date as $item) {

                $time_out = $item->time_out;
            }

            // echo "<br>";
            // echo "IN >>>> " . $time_in;
            // echo "<br>";
            // echo "OUT >>>> " . $time_out;
            // echo "<br>";

            $data_all_date[$i] = [
                "date" => date("Y/m/d" , strtotime($key->created_at )),
                "time_in" => date("H:i" , strtotime($time_in)),
                "time_out" => date("H:i" , strtotime($time_out)),
            ];

            $i++ ;
            $time_in = "";
            $time_out = "";
        }

        // echo "<pre>";
        // print_r($data_all_date);
        // echo "<pre>";

        for ($ii=0; $ii < count($data_all_date); $ii++) {
            
            $date_time_in =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_in'] ;
            $date_time_in = date("Y/m/d H:i" , strtotime($date_time_in) - 60*60 );

            $date_time_out =  $data_all_date[$ii]['date'] . " " . $data_all_date[$ii]['time_out'] ;
            $date_time_out = date("Y/m/d H:i" , strtotime($date_time_out) + 60*60 );

            // echo "<br>";
            // echo $date_time_in;
            // echo "<br>";
            // echo $date_time_out;
            

            $risk_groups = Check_in::where("user_id" ,"!=" , $user_id)
                ->where("check_in_at", 'LIKE', "%$id_partner_name_area%")
                ->whereBetween('created_at', [$date_time_in, $date_time_out])
                ->where('status' , 'show')
                ->orderBy('created_at' , 'DESC')
                ->groupBy('user_id')
                ->get();

            // echo "<pre>";
            // print_r($risk_groups);
            // echo "<pre>";

            foreach ($risk_groups as $risk_group) {

                array_push($uesr_risk_groups , $risk_group->user_id);

            }

        }

        // echo "<pre>";
        // print_r($uesr_risk_groups);
        // echo "<pre>";

        for ($y=0; $y < count($uesr_risk_groups); $y++) { 

            $data_users = DB::table('profiles')
                ->where("profiles.id" , $uesr_risk_groups[$y])
                ->get();

                foreach ($data_users as $data_user) {
                    $data_user_risk_groups[$y] = [
                        "id" => $data_user->id,
                        "name" => $data_user->name,
                        "real_name" => $data_user->real_name,
                        "phone" => $data_user->phone,
                        "check_in_at" => $id_partner_name_area,
                        "name_disease" => $name_disease,
                    ];
                }
            
        }

        // echo "<pre>";
        // print_r($data_user_risk_groups);
        // echo "<pre>";

        return $data_user_risk_groups ;
    }

    public function send_risk_group()
    {
        
        $json = file_get_contents("php://input");
        $data = json_decode($json, true);

        $count_user = count($data);
        $id_partner_name_area = $data[0]['check_in_at'] ;
        $name_disease = $data[0]['name_disease'] ;


        echo "<pre>";
        print_r($data);
        echo "<pre>";

        for ($i=0; $i < $count_user ; $i++) { 

            $user_id = $data[$i]['id'] ;

            $profiles = DB::table('profiles')
                ->where('user_id', $user_id)
                ->where('type' , 'line')
                ->where('send_covid' , null)
                ->get();

            $users = DB::table('users')
                ->where('id', $user_id)
                ->get();

            foreach ($profiles as $profile) {

                $user_language = $profile->language ;

                $data_in_outs = Check_in::where('user_id', $profile->id)
                    ->where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                    ->latest()
                    ->take(3)
                    ->get();

                $data_location_check_in = Partner::where('id' , $id_partner_name_area)->first();

                if (!empty($data_location_check_in->name_area)) {
                    $check_in_at = $data_location_check_in->name . " - " . $data_location_check_in->name_area ;
                }else{
                    $check_in_at = $data_location_check_in->name ;
                }

                $data_disease['name'] = $name_disease;
                Disease::firstOrCreate($data_disease);

                $zx=0;
                foreach ($data_in_outs as $data_in_out ) {
                    $text_time[$zx] = date("d/m/Y H:i" , strtotime($data_in_out->created_at)) ;
                    $zx = $zx + 1 ;    
                }

                if (!empty($text_time[0])) {
                   $text_time_1 = $text_time[0] ;
                }else{
                    $text_time_1 = "-" ;
                }

                if (!empty($text_time[1])) {
                   $text_time_2 = $text_time[1] ;
                }else{
                    $text_time_2 = "-" ;
                }

                if (!empty($text_time[2])) {
                   $text_time_3 = $text_time[2] ;
                }else{
                    $text_time_3 = "-" ;
                }

                
                // TIME ZONE
                // $API_Time_zone = new API_Time_zone();
                // $time_zone = $API_Time_zone->change_Time_zone($profile->user->time_zone);

                // $data_topic = [
                //     "เรียนคุณ",
                //     "ด้วยสถานการณ์การระบาดของ Coronavirus Disease 2019 (COVID -19) ขณะนี้ท่านอยู่ในกลุ่มเสี่ยง",
                //     "เนื่องจาก ท่านได้ Scan เข้าพื้นที่",
                //     "จึงขอความร่วมมือในการปฏิบัติตามมาตราการเร่งด่วนในการป้องกันและควบคุมโรคติดต่อไวรัสโคโรนา กรุณาทำการตรวจเช็คและเฝ้าระวังตามพระราชบัญญัติโรคติดต่อ พ.ศ.2558",
                //     "วัน / เวลา",
                // ];

                if ($name_disease == 'covid') {
                    $data_topic = [
                            "เรียนคุณ",
                            "ด้วยสถานการณ์การระบาดของ Coronavirus Disease 2019 (COVID -19) ขณะนี้ท่านอยู่ในกลุ่มเสี่ยง",
                            "เนื่องจาก ท่านได้ Scan เข้าพื้นที่",
                            "จึงขอความร่วมมือในการปฏิบัติตามมาตราการเร่งด่วนในการป้องกันและควบคุมโรคติดต่อไวรัสโคโรนา กรุณาทำการตรวจเช็คและเฝ้าระวังตามพระราชบัญญัติโรคติดต่อ พ.ศ.2558",
                            "วัน / เวลา",
                            $name_disease,
                        ];
                }else{
                    $data_topic = [
                            "เรียนคุณ",
                            "ขณะนี้มีการระบาดของ",
                            "เนื่องจาก ท่านได้ Scan เข้าพื้นที่",
                            "จึงขอความร่วมมือในการปฏิบัติตามมาตราการเร่งด่วนในการป้องกันและควบคุมโรคติดต่อกรุณาทำการตรวจเช็คและเฝ้าระวังตามพระราชบัญญัติโรคติดต่อ พ.ศ.2558",
                            "วัน / เวลา",
                            $name_disease,
                        ];
                }

                for ($xi=0; $xi < count($data_topic); $xi++) { 

                    $text_topic = DB::table('text_topics')
                            ->select($user_language)
                            ->where('th', $data_topic[$xi])
                            ->where('en', "!=", null)
                            ->get();

                    foreach ($text_topic as $item_of_text_topic) {
                        $data_topic[$xi] = $item_of_text_topic->$user_language ;
                    }
                }

                $template_path = storage_path('../public/json/risk_group.json');
                $string_json = file_get_contents($template_path);
                // users 
                $string_json = str_replace("ตัวอย่าง",$data_topic[0],$string_json);
                $string_json = str_replace("เรียนคุณ",$data_topic[0],$string_json);
                $string_json = str_replace("check_in_area",$check_in_at,$string_json);
                $string_json = str_replace("xxx",$profile->name,$string_json);

                $string_json = str_replace("text_00",$data_topic[1],$string_json);
                $string_json = str_replace("text_02",$data_topic[2],$string_json);
                $string_json = str_replace("text_03",$data_topic[3],$string_json);
                $string_json = str_replace("ตามวัน / เวลาด้านล่าง",$data_topic[4],$string_json);
                $string_json = str_replace("text_01",$data_topic[5],$string_json);

                $string_json = str_replace("text_time_1",$text_time_1,$string_json);
                $string_json = str_replace("text_time_2",$text_time_2,$string_json);
                $string_json = str_replace("text_time_3",$text_time_3,$string_json);
                

                $messages = [ json_decode($string_json, true) ];

                foreach ($users as $user) {
                    $body = [
                        "to" => $user->provider_id,
                        "messages" => $messages,
                    ];
                }

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
                $data_2 = [
                    "title" => "คุณคือกลุ่มเสี่ยง",
                    "content" => $profile->name . 'คือกลุ่มเสี่ยง',
                ];
                Mylog::create($data_2);

                $date_now = date("Y-m-d");

                DB::table('profiles')
                    ->where('id', $profile->id)
                    ->where('type' , 'line')
                      ->update([
                        'send_covid' => $date_now,
                ]);
            }


        }

        return $count_user;
    }
    function submit_show_homepage($partner_id , $input_show_homepage)
    {
        DB::table('partners')
            ->where('id', $partner_id)
              ->update([
                'show_homepage' => $input_show_homepage,
        ]);

        return "OK" ;
    }
    public function check_data_partner($user_organization)
    {
        $data_partners = Partner::where("name", $user_organization)
            ->where("name_area", null)
            ->get();

        return $data_partners;
    }
    public function change_color_menu($color_menu , $partner , $class_color_menu)
    {
        $color_menu = str_replace("_","#",$color_menu);
        if ($color_menu == "#null") {
            $color_menu = null ;
        }

        $partner = str_replace("_"," ",$partner);

        DB::table('partners')
              ->where('name', $partner)
              ->where("name_area", null)
              ->update([
                // 'color' => $color_menu,
                'class_color_menu' => $class_color_menu,
        ]);

        return $color_menu ;
    }
    public function change_color_navbar($color_navbar , $partner)
    {
        $color_navbar = str_replace("_","#",$color_navbar);
        $partner = str_replace("_"," ",$partner);

        DB::table('partners')
              ->where('name', $partner)
              ->where("name_area", null)
              ->update([
                'color_navbar' => $color_navbar,
        ]);

        return $color_navbar ;
    }

    public function Create_Token($id_partner)
    {
        $data_partner = Partner::where('id' , $id_partner)->first();
        $data_partner_tokens = Partner_token::where('partner_id' , $id_partner)->first();

        $ex_1 = uniqid($id_partner . '-');
        $ex_2 = uniqid();
        $token = $ex_1 . $ex_2 ;

        if (!empty($data_partner_tokens)) {

            DB::table('partner_tokens')
                ->where("partner_id", $id_partner)
                ->update([
                    'token' => $token,
            ]);

        }else{
            $data = array();
            

            $data['name_partner'] = $data_partner->name ;
            $data['partner_id'] = $id_partner ;
            $data['token'] = $token ;

            Partner_token::create($data);

        }

        return $token ;
    }
}
