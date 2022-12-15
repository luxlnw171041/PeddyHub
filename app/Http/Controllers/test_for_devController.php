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
use App\Models\Partner;
use App\Models\Check_in;
use \Carbon\Carbon;

class test_for_devController extends Controller
{
    public function main_test(){

        $date_now = date('Y-m-d');

        $test = Check_in::get();

        $test_2 = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                ->selectRaw('profiles.birth , profiles.sex , profiles.changwat_th , check_ins.user_id , check_ins.created_at , count(check_ins.user_id) as count' )
                ->where('check_ins.time_in' , '!=' , null)
                ->groupBy('check_ins.user_id')
                ->get();

        foreach ($test_2 as $kkk) {
            if (!empty($kkk->birth)) {
                $day_age = ((strtotime($date_now) - strtotime($kkk->birth))/  ( 60 * 60 * 24 )) + 1 ;
                $age = number_format( $day_age / 365 );
            }else{
                $age = "" ;
            }

            if (!empty($kkk->sex)) {
                $sex = $kkk->sex ;
            }else{
                $sex = "" ;
            }
            
            if (!empty($kkk->changwat_th)) {
                $changwat_th = $kkk->changwat_th ;
            }else{
                $changwat_th = "" ;
            }

            // echo "<br>";
            echo "<b>User ID</b> : " . $kkk->user_id . " ::: <b>เข้า-ออก</b> = " . $kkk->count . " ครั้ง " . " :: <b>อายุ</b> = " . $age . "( " .$kkk->birth." )" . " :: <b>เพศ</b> = " . $sex . " :: <b>ที่อยู่</b> = " . $changwat_th  ;
            echo "<br>";
            echo "------------------------------------------------------------------------------------------------------------------";
            echo "<br>";

        }

        echo "****************************************************************************************";
        echo "<br>";

        // เวลาเข้าออก
        foreach ($test as $key) {
            $date = Carbon::parse( $key->created_at , 'UTC+7');
            $name_day = $date->isoFormat('dddd');
            $intTotalDay = ((strtotime($date_now) - strtotime($key->created_at))/  ( 60 * 60 * 24 )) + 1 ;
            $day_ago = number_format($intTotalDay) ;

            if (!empty($key->time_in)) {
                echo  "พื้นที่ย่อย : " . $key->partner_id . " == " . "User ID : " . $key->user_id . 
                " == ". " <span style='color: green;'>เวลาเข้า </span>: "  . $key->created_at . " >> " . $name_day . " >>>> ผ่านมาแล้ว...  <b>" . $day_ago . "</b> ...วัน";
                echo "<br>";
            }else{
                echo  "พื้นที่ย่อย : " . $key->partner_id . " == " . "User ID : " . $key->user_id . 
                " == ". " <span style='color: red;'>เวลาออก </span>: "  . $key->created_at . " >> " . $name_day . " >>>> ผ่านมาแล้ว...  <b>" . $day_ago . "</b> ...วัน";
                echo "<br>";
            }

        }
        echo "-------------------------------------------------";

        // --------------------------------------------------------
        $arr_select_user = [] ;

        $partner_id = '1';

        $data_partners = Partner::where('id' , $partner_id)->first();
        $name_partner = $data_partners->name ;

        $id_name_area = '40';

        $time_1 = '15:30' ; // เช็คข้อมูลจากช่องนี้
        $time_2 = '15:59' ;
        if ( !empty($time_1) && empty($time_2) ) {
            $time_2 = '23:59' ;
        }else{
            $time_2 = $time_2 ;
        }

        $select_day = '' ; // เช็คข้อมูลจากช่องนี้
        $amount_in_out = '' ; // เช็คข้อมูลจากช่องนี้
        $amount_last_entry = '' ; // เช็คข้อมูลจากช่องนี้

        // data user
        $this_month = false ; // เช็คข้อมูลจากช่องนี้
        $check_click_user = false ; // เช็คข้อมูลจากช่องนี้
        $select_user_sex = '' ;
        $select_user_age = '' ;
        $select_user_location = 'จ.พระนครศรีอยุธยา' ;

        $Filter_data = "" ;


        // พื้นที่ทั้งหมด
        if (empty($id_name_area)) {
            $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                    ->groupBy('check_ins.user_id')
                    ->select('profiles.*')
                    ->get();
                
        }
        // พื้นที่เฉพาะพื้นที่ย่อย
        else{

            // ทุกอย่างว่างทั้งหมด
            if ( empty($time_1) && empty($select_day) && empty($amount_in_out) && empty($amount_last_entry) && empty($this_month) && empty($check_click_user) ) {

                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->groupBy('check_ins.user_id')
                    ->select('profiles.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->user_id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->birth ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }

                $Filter_data = $Filter_data . "ไม่ได้กรองข้อมูล" ;
            }

            // ช่วงเวลา
            if (!empty($time_1)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->whereTime('check_ins.created_at', '>=', $time_1)
                    ->whereTime('check_ins.created_at', '<=', $time_2)
                    ->groupBy('check_ins.user_id')
                    ->select('profiles.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $arr_data = array();
                    $arr_data['user_id'] = $data->user_id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->birth ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }

                $Filter_data = $Filter_data . " , ช่วงเวลา = " . $time_1 . " - " . $time_2 ;
            }

            // วัน (จันทร์ - อาทิตย์)
            if (!empty($select_day)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->select('profiles.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $date = Carbon::parse( $data->created_at , 'UTC+7');
                    $name_day = $date->isoFormat('dddd'); 

                    if ($name_day == $select_day) {

                        $arr_data = array();
                        $arr_data['user_id'] = $data->user_id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->birth ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }

                $Filter_data = $Filter_data . " , วัน = " . $select_day ;
            }

            // จำนวนการเข้าพื้นที่ มากกว่า .. ครั้ง
            if (!empty($amount_in_out)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->selectRaw('profiles.* , count(check_ins.user_id) as count' )
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->where('check_ins.time_in' , '!=' , null)
                    ->groupBy('check_ins.user_id')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    if ($data->count >= $amount_in_out) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->user_id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->birth ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }

                $Filter_data = $Filter_data . " , จำนวนการเข้าพื้นที่ มากกว่า = " . $amount_in_out . " ครั้ง" ;

            }

            // เข้า-ออก ล่าสุด .. วัน
            if (!empty($amount_last_entry)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->select('profiles.*' , 'check_ins.created_at as created_at')
                    ->get();

                foreach ($data_all_check_partner as $data) {
                    $intTotalDay = ((strtotime($date_now) - strtotime($data->created_at))/  ( 60 * 60 * 24 )) + 1 ;
                    $day_ago = number_format($intTotalDay) ;;

                    if ((int)$amount_last_entry >= (int)$day_ago) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->user_id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->birth ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }

                $Filter_data = $Filter_data . " , เข้า-ออก ล่าสุด = " . $amount_last_entry . " วัน" ;

            }

            // ผู้ใช้ที่เกิดเดือนนี้
            if ($this_month) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.partner_id',  $id_name_area)
                    ->whereMonth('profiles.birth' , date('m'))
                    ->select('profiles.*')
                    ->get();

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->user_id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->birth ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }

                $Filter_data = $Filter_data . " , ผู้ใช้ที่เกิดเดือน = " . date('m') ;

            }

            // ข้อมูลผู้ใช้
            if ($check_click_user) {
                $data_all_check_partner = "" ;

                switch ($select_user_age) {
                    case '<20':
                        $range_1 = "0" ;
                        $range_2 = "20" ;
                        break;
                    case '21-29':
                        $range_1 = "21" ;
                        $range_2 = "29" ;
                        break;
                    case '30-45':
                        $range_1 = "30" ;
                        $range_2 = "45" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '46-59':
                        $range_1 = "46" ;
                        $range_2 = "59" ;
                        break;
                    case '60+':
                        $range_1 = "60" ;
                        $range_2 = "100" ;
                        break;
                    
                    default:
                        $range_1 = "" ;
                        $range_2 = "" ;
                        break;
                }

                $age_range_1 = date("Y" , strtotime("-$range_1 Year") );
                $age_range_2 = date("Y" , strtotime("-$range_2 Year") );

                echo "<br>" ;
                echo "กรองผู้ใช้ :::: " . "sex : " . $select_user_sex  . " >> " . "age : " . $select_user_age . " >> " . "location : " . $select_user_location;
                echo "<br>" ;

                // ว่างหมด
                if ( empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ) {
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->groupBy('check_ins.user_id')
                        ->select('profiles.*')
                        ->get();

                    foreach ($data_all_check_partner as $data) {
                        $arr_data = array();
                        $arr_data['user_id'] = $data->user_id ;
                        $arr_data['name'] = $data->name ;
                        $arr_data['sex'] = $data->sex ;
                        $arr_data['age'] = $data->birth ;

                        if (in_array($arr_data, $arr_select_user)){
                            // skip
                        }else{
                            array_push( $arr_select_user , $arr_data );
                        }
                    }
                }
                // กรอง 1
                else if( !empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('profiles.sex' , $select_user_sex)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }
                // กรอง 2 
                else if( !empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('profiles.sex' , $select_user_sex)
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->select('profiles.*')
                        ->get();
                }else if( !empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('profiles.sex' , $select_user_sex)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }
                // กรอง 3
                else if( !empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.partner_id',  $id_name_area)
                        ->where('profiles.sex' , $select_user_sex)
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }
                

                foreach ($data_all_check_partner as $data) {

                    $arr_data = array();
                    $arr_data['user_id'] = $data->user_id ;
                    $arr_data['name'] = $data->name ;
                    $arr_data['sex'] = $data->sex ;
                    $arr_data['age'] = $data->birth ;

                    if (in_array($arr_data, $arr_select_user)){
                        // skip
                    }else{
                        array_push( $arr_select_user , $arr_data );
                    }
                }

                $Filter_data = $Filter_data . " , ข้อมูลผู้ใช้ = " . "เพศ : " . $select_user_sex . " / " . "อายุ : " . $select_user_age . " / " . "สถานที่ : " . $select_user_location ;

            }

        }



        echo "<br>";
        echo "กรองข้อมูล ::: " . $Filter_data ;
        echo "<br>";

        echo "<br>";
        echo "<br>";
        echo "<pre>";
        print_r($arr_select_user);
        echo "<pre>";
        exit();


        // -------------------------------------------------------------

    }

    public function user_check_in()
    {
        $data_partner = Partner::where('id' , '1')->first();

        $user_check_in = $data_partner->user_check_in ;

        $user_check_in = json_decode($user_check_in);
            
        // echo "<pre>";
        // print_r( $user_check_in );
        // echo "<pre>";

        echo "Check in/out ทั้งหมด : " . count($user_check_in) . " ครั้ง" ;
        echo "<br>" ;
        echo "<br>" ;

        for ($i=0; $i < count($user_check_in); $i++) { 
            // print_r( $user_check_in[$i] ) ;
            // echo "<br>" ;

            echo "user_id >> " . $user_check_in[$i]->user_id  ;
            echo "<br>" ;
            echo "type_check >> " . $user_check_in[$i]->type_check  ;
            echo "<br>" ;
            echo "date_time >> " . $user_check_in[$i]->date_time  ;
            echo "<br>" ;
            
            echo "<---------------------------------------------->";
            echo "<br>" ;
        }

        exit();

        // $data = array();
        // $data['user_id'] = '1';
        // $data['type_check'] = 'check_in';
        // $data['date_time'] = date("d/m/Y h:i:sa") ;

        // // echo "<pre>";
        // // print_r( $arr_user_check_in );
        // // echo "<pre>";

        // $add_data = array();
        // $add_data['user_id'] = '2';
        // $add_data['type_check'] = 'check_out';
        // $add_data['date_time'] = date("d/m/Y h:i:sa") ;

        // // echo "<pre>";
        // // print_r( $add_data );
        // // echo "<pre>";

        // echo "<---------------------------------------------->";
        // echo "<br>" ;

        // $user_check_in = '[{"user_id":"1","type_check":"check_in","date_time":"08\/11\/2022 05:53:59pm"},{"user_id":"2","type_check":"check_out","date_time":"08\/11\/2022 05:59:10pm"}]' ;

        // if (empty($user_check_in)) {
        //     $arr_user_check_in[] = $data; 
        // }else{
        //     $arr_user_check_in = json_decode($user_check_in) ;
        //     array_push($arr_user_check_in , $add_data) ;

        // }

        // DB::table('partners')
        //     ->where('id', "1")
        //     ->update([
        //         'user_check_in' => $arr_user_check_in,
        // ]);

        // exit();

        
    }

    public function test_api_lostpet()
    {
        $requestArr = [
            'Token' => "17-63566b72456ac63566b72456ae",
            'province' => "จ.พระนครศรีอยุธยา",
            'amphoe' => "อ.บางปะอิน",
            'tambon' => "ต.บ้านกรด",
            'owner_name' => "เบนซ์",
            'owner_phone' => "0999999999",
            'pet_name' => "โกโก้",
            'pet_age' => "2 ปี 10 เดือน",
            'pet_category' => "สุนัข",
            'sub_category' => "ร็อตไวเลอร์",
            'pet_gender' => "ชาย",
            'detail' => "ทดสอบตามหาสุนัขหาย",
            'photo_link' => "https://www.peddyhub.com/storage/uploads/nkRauC1MfHHxpaU3OQ6IsC8GCfasu9cxBTOhF4Cr.jpg",
        ];

        // $url = 'http://localhost/PeddyHub/public/api/partner_lost_pet';
        $url = 'https://www.peddyhub.com/api/partner_lost_pet';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestArr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

    }

    public function test_api_register_viicheck()
    {
        $data_users = User::where('id', "1")->first();

        return view('test_for_dev.test_api_register_viicheck', compact('data_users'));

        // echo "<pre>";
        // print_r($data_users);
        // echo "<pre>";
        // exit();

        // $url = 'http://localhost/PeddyHub/public/api/partner_lost_pet';
        $url = 'https://www.viicheck.com/api/register_api';
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestArr);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;

    }


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

    function lat_lng_pro()
    {
        $province = "จ.ชัยภูมิ" ;

        $latlng = DB::table('lat_longs')
            ->where('changwat_th', $province)
            ->get();

        $i = 1 ;
        $lat = 0 ;
        $lng = 0 ;

        foreach ($latlng as $item) {
            
            $lat  = number_format($item->lat + $lat , 4, '.', '') ;
            $lng  = number_format($item->lng + $lng , 4, '.', '') ;

            $x_lat = number_format($lat / $i , 4, '.', '') ;
            $x_lng = number_format($lng / $i , 4, '.', '') ;


            $i = $i + 1 ;
        }


        $lat_lng_arr = array();

        $lat_lng_arr['lat'] = $x_lat ;
        $lat_lng_arr['lng'] = $x_lng ;

        echo "<pre>";
        print_r($lat_lng_arr);
        echo "<pre>";

        exit();
    }

    function BC_to_user_line(){

        $data_users_line = Profile::where('type' , 'line')->get();
        // $data_users_line = Profile::where('type' , 'line')
        //     ->where('id' , 9)
        //     ->orWhere('id' , 1)
        //     ->get();

        $iii = 1 ;

        foreach ($data_users_line as $item) {

            if ( !empty($item->user->provider_id) ) {
                $topic = "ชวนเที่ยวงาน PET VARIETY.." ;
                $photo = "PET%20VARIETY.png" ;
                $size = "793:650" ;
                $link = "https://pet-variety.com/?gclid=Cj0KCQjw-fmZBhDtARIsAH6H8qhGuuUM4mV9KrI_cdL5itQAuwqRhV9HueYhQOtmTuLXqLXzYlBrRgAaAtr_EALw_wcB";
                
                $template_path = storage_path('../public/json/broadcast/bc_to_user_line.json');   
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ตัวอย่าง",$topic,$string_json);
                $string_json = str_replace("TEXT_PHOTO",$photo,$string_json); 
                $string_json = str_replace("TEXT_SIZE",$size,$string_json); 
                $string_json = str_replace("TEXT_LINK",$link,$string_json); 

                $messages = [ json_decode($string_json, true) ]; 

                $body = [
                    "to" => $item->user->provider_id,
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
                    "title" => "BC_to_user_line : id = " . $item->id,
                    "content" => $topic . " / ครั้งที่ : " . $iii,
                ];

                MyLog::create($data_save_log);

                $iii = $iii + 1 ;
            }
        }

        return "ok" ;
    }

    function BC_to_user_line_carousel(){

        // $data_users_line = Profile::where('type' , 'line')->get();
        $data_users_line = Profile::where('type' , 'line')
            ->where('id' , 9)
            ->orWhere('id' , 1)
            ->get();

        $iii = 1 ;

        foreach ($data_users_line as $item) {

            if ( !empty($item->user->provider_id) ) {
                $topic = "พร้อมพาน้องบินหรือยัง.." ;
                
                $template_path = storage_path('../public/json/broadcast/bc_to_user_line_carousel.json');   
                $string_json = file_get_contents($template_path);

                $string_json = str_replace("ตัวอย่าง",$topic,$string_json);

                $messages = [ json_decode($string_json, true) ]; 

                $body = [
                    "to" => $item->user->provider_id,
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
                    "title" => "BC_to_user_line_carousel : id = " . $item->id,
                    "content" => $topic . " / ครั้งที่ : " . $iii,
                ];

                MyLog::create($data_save_log);

                $iii = $iii + 1 ;
            }
        }

        return "ok" ;
    }



}
