<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Pet;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use Illuminate\Support\Facades\Auth;


class LineMessagingAPI extends Model
{
	public function replyToUser($data, $event, $message_type)
    {  
    	switch ($message_type) {
            case "contact_PEDDyHUB": 
                $template_path = storage_path('../public/json/soon.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;

            case 'contact':
                $template_path = storage_path('../public/json/flex-contact.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
                break;

            case "language": 

                $provider_id = $event["source"]['userId'];
                $user = User::where('provider_id', $provider_id)->get();

                foreach ($user as $item) {
                    $user_id = $item->id ;
                }
                $template_path = storage_path('../public/json/flex-language.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("user_id",$user_id,$string_json);

                $messages = [ json_decode($string_json, true) ]; 
                break;

    		case 'other':

                $data_Text_topic = [
                    "ข้อมูลของคุณ",
                    "ถามตอบ",
                    "ติดต่อ",
                    "ยินดีให้บริการค่ะ",
                ];

                $data_topic = $this->language_for_user($data_Text_topic, $event["source"]['userId']);

    			$template_path = storage_path('../public/json/flex-other.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("ข้อมูลของคุณ",$data_topic[0],$string_json);
                $string_json = str_replace("ถามตอบ",$data_topic[1],$string_json);
                $string_json = str_replace("ติดต่อ",$data_topic[2],$string_json);
                $string_json = str_replace("ยินดีให้บริการค่ะ",$data_topic[3],$string_json);

                $messages = [ json_decode($string_json, true) ]; 
    			break;

    		case 'pet_insurance':
    			$template_path = storage_path('../public/json/flex_pet_insurance.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
    			break;
            case 'profile':
                    $provider_id = $event["source"]['userId'];
                    $user = User::where('provider_id' , $provider_id)->get();

                foreach($user as $item){
                    $template_path = storage_path('../public/json/flex-profile.json');   
                    $string_json = file_get_contents($template_path);
                    // รูป
                    if (!empty($item->profile->photo)) {
                        $photo_profile = "https://www.peddyhub.com/storage/".$item->profile->photo ;
                    }
                    if (empty($item->profile->photo)) {
                        $photo_profile = $item->avatar ;
                    }
                    $string_json = str_replace("lucky@gmail.com",$item->email,$string_json);
                    $string_json = str_replace("Lucky",$item->profile->name,$string_json);
                    $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/sticker/01.png",$photo_profile,$string_json);
                    // เบอร์
                    if (!empty($item->profile->phone)) {
                        $string_json = str_replace("0999999999",$item->profile->phone,$string_json);
                    }else{
                        $string_json = str_replace("0999999999","กรุณาเพิ่มเบอร์โทรศัพท์",$string_json);
                    }
                    // วันเกิด
                    if (!empty($item->profile->birth)) {
                        $string_json = str_replace("17/10/1998",$item->profile->birth,$string_json);
                    }else{
                        $string_json = str_replace("17/10/1998","กรุณาเพิ่มวันเกิด",$string_json);
                    }
                    
                    // เพศ
                    if (!empty($item->profile->sex)) {
                        $string_json = str_replace("ชาย",$item->profile->sex,$string_json);
                    }else{
                        $string_json = str_replace("ชาย","กรุณาระบุเพศ",$string_json);
                    }
                    $messages = [ json_decode($string_json, true) ]; 
                }
                break;
            case 'blood_bank':
                $provider_id = $event["source"]['userId'];
                $users = User::where('provider_id' , $provider_id)->get();
                foreach ($users as $user) {
                    $user_id = $user->id ;
                }
                
                //จำนวนสัตว์ทั้งหมด
                $count_pet = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->groupBy('pet_id')
                    ->get()->count();
                // จำนวนคร้งทั้งหมด
                    $count_time = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->selectRaw('count(pet_id) as count')
                    ->count();
                //  ประมาณทั้งหมด
                $count_blood = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->selectRaw('sum(total_blood) as count')
                    ->get();
                foreach ($count_blood as $item) {
                    $total_blood = $item->count ;
                }

                if (!empty($count_pet)) {
                    $template_path = storage_path('../public/json/flex_blood_bank.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("1700", $total_blood,$string_json);
                    $string_json = str_replace("3",$count_pet,$string_json);
                    $string_json = str_replace("user_id",$user_id,$string_json);
                    $string_json = str_replace("5", $count_time,$string_json);
                }else{
                    $template_path = storage_path('../public/json/flex_blood_bank.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("1700", "0",$string_json);
                    $string_json = str_replace("3", "0" ,$string_json);
                    $string_json = str_replace("user_id",$user_id,$string_json);
                    $string_json = str_replace("5", "0" ,$string_json);
                }
                
                $messages = [ json_decode($string_json, true) ]; 
            break;
            case 'cf_blood_bank':
    			$template_path = storage_path('../public/json/flex-cf-blood-bank.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
    		break;
            case 'success_blood_bank':
    			$template_path = storage_path('../public/json/flex-success-blood-bank.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
    		break;
    	}

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
        $data_SAVE_LOG = [
            "title" => "reply Success",
            "content" => "reply Success",
        ];
        MyLog::create($data_SAVE_LOG);
        return $result;
    }

	public function send_lost_pet($data)
	{
        $data_users = User::where('id', $data['user_id'])->get();
        $data_pets = Pet::where('id', $data['pet_id'])->get();

        $date_now = date("d/m/Y");

        if (!empty($data['select_province'])) {
        	$changwat_th = $data['select_province'];
        	$amphoe_th = $data['select_amphoe'];
        	$tambon_th = $data['select_tambon'];
        }else{
        	$changwat_th = $data['input_province'];
        	$amphoe_th = $data['input_amphoe'];
        	$tambon_th = $data['input_tambon'];
        }

        $photo = $data['photo'];

        if (!empty($data['detail'])) {
            $detail = $data['detail'];
        }else{
            $detail = "-";
        }
        
        $phone = $data['phone'];

        switch ($data['pet_category_id']) {
        	case '1':
        		$pet_category_id = 'สุนัข';
        		$img_icon = 'shiba.png';
        		break;
        	case '2':
        		$pet_category_id = 'แมว';
        		$img_icon = 'cat.png';
        		break;
        	case '3':
        		$pet_category_id = 'นก';
        		$img_icon = 'bird.png';
        		break;
        	case '4':
        		$pet_category_id = 'ปลา';
        		$img_icon = 'fish.png';
        		break;
        	case '5':
        		$pet_category_id = 'สัตว์เล็ก';
        		$img_icon = 'otter.png';
        		break;
        	case '6':
        		$pet_category_id = 'Exotic';
        		$img_icon = 'spider.png';
        		break;
        }

        $send_to_users = Profile::where('id', '!=' , $data['user_id'])
        	->where('changwat_th' ,$changwat_th)
        	->where('amphoe_th' ,$amphoe_th)
        	->where('tambon_th' ,$tambon_th)
        	->where('type' ,'line')
        	->get();

        foreach ($send_to_users as $item) {

            $data_Text_topic = [
                "ตามหา",
                "วันที่หาย",
                "คำอธิบาย",
                "ติดต่อ",
                "หาย",
                "แปลภาษา",
                $pet_category_id,
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);

        	$template_path = storage_path('../public/json/flex_lost_pet.json');   

	        $string_json = file_get_contents($template_path);

            $string_json = str_replace("ตามหา",$data_topic[0],$string_json);
            $string_json = str_replace("วันที่หาย",$data_topic[1],$string_json);
            $string_json = str_replace("คำอธิบาย",$data_topic[2],$string_json);
            $string_json = str_replace("ติดต่อ",$data_topic[3],$string_json);
            $string_json = str_replace("หาย",$data_topic[4],$string_json);
            $string_json = str_replace("แปลภาษา",$data_topic[5],$string_json);

            $string_json = str_replace("pet_cat",$data_topic[6],$string_json);

	        $string_json = str_replace("IMGPET",$photo,$string_json);
	        $string_json = str_replace("4544.png",$img_icon,$string_json);
	        $string_json = str_replace("22/2/2022",$date_now,$string_json);
	        // $string_json = str_replace("รายละเอียด",$detail,$string_json);
            $string_json = str_replace("0999999999",$phone,$string_json);

         //    $string_json = str_replace("TEXT_EN",$item->user->language,$string_json);
	        // $string_json = str_replace("สีแดง",$detail,$string_json);
            
            // data pet 
            foreach ($data_pets as $data_pet) {
                $string_json = str_replace("pet_name",$data_pet->name,$string_json);

                switch ($data_pet->gender) {
                    case 'ชาย':
                        $img_pet_gendeer = 'male.png';
                        break;
                    case 'หญิง':
                        $img_pet_gendeer = 'female.png';
                        break;
                    case 'ไม่ระบุ':
                        $img_pet_gendeer = 'equality.png';
                        break;
                }

                $string_json = str_replace("pet_img_gender.png",$img_pet_gendeer,$string_json);
            }

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
	                //'timeout' => 60
	            ]
	        ];
	                            
	        $context  = stream_context_create($opts);
	        $url = "https://api.line.me/v2/bot/message/push";
	        $result = file_get_contents($url, false, $context);

	        //SAVE LOG
	        $data_save_log = [
	            "title" => "ส่งข้อความแจ้งสัตว์เลี้ยงหาย",
	            "content" => $item->user->username . " - " . $item->user->provider_id,
	        ];
        	MyLog::create($data_save_log);

        }
		
	}

    public function send_lane_to_user($data_user, $data_pet , $location , $quantity , $data_blood_id)
    {   
        $date_now = date("Y-m-d") ;
        $time_now = date("H:i");

        foreach ($data_user as $item) {

            $data_Text_topic = [
                "ยืนยันการฝากเลือด",
                "ชื่อ",
                "เจ้าของ",
                "วันที่",
                "เวลา",
                "ปริมาณ",
                "ไม่ยืนยัน",
                "ยืนยัน",
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);

            $template_path = storage_path('../public/json/flex-cf-blood-bank.json');   

            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ยืนยันการฝากเลือด",$data_topic[0],$string_json);
            $string_json = str_replace("ชื่อ",$data_topic[1],$string_json);
            $string_json = str_replace("เจ้าของ",$data_topic[2],$string_json);
            $string_json = str_replace("วันที่",$data_topic[3],$string_json);
            $string_json = str_replace("เวลา",$data_topic[4],$string_json);
            $string_json = str_replace("ปริมาณ",$data_topic[5],$string_json);
            $string_json = str_replace("ไม่ยืนยัน",$data_topic[6],$string_json);
            $string_json = str_replace("ยืนยัน",$data_topic[7],$string_json);

            $string_json = str_replace("รพ. เกษตร",$location,$string_json);
            $string_json = str_replace("500 ml",$quantity,$string_json);
            $string_json = str_replace("Lucky",$item->name,$string_json);
            $string_json = str_replace("17/3/2565",$date_now,$string_json);
            $string_json = str_replace("16:44",$time_now,$string_json);

            $string_json = str_replace("blood_id",$data_blood_id,$string_json);


            foreach ($data_pet as $pet) {
                $string_json = str_replace("Luca",$pet->name,$string_json);
                $string_json = str_replace("https://www.peddyhub.com/storage/uploads/Se5EidTPqpxlQbIf4CAWrGg9A2iwlWlk6hY9gYtQ.jpg","https://www.peddyhub.com/storage/".$pet->photo,$string_json);
            }

            
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
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data_save_log = [
                "title" => "ส่งข้อความแจ้งข้อมูลการฝากเลือด",
                "content" => $item->user->username . " - " . $item->user->provider_id,
            ];
            MyLog::create($data_save_log);

        }
        
    }

    public function send_blood_success($data_blood , $data_user , $data_pet)
    {
        $date_now = date("Y-m-d") ;
        $time_now = date("H:i");

        //จำนวนสัตว์ทั้งหมด
        $count_pet = Blood_bank::where('user_id', $user_id)
            ->where('status', "Yes")
            ->groupBy('pet_id')
            ->get()->count();
        // จำนวนคร้งทั้งหมด
            $count_time = Blood_bank::where('user_id', $user_id)
            ->where('status', "Yes")
            ->selectRaw('count(pet_id) as count')
            ->count();
        //  ประมาณทั้งหมด
        $count_blood = Blood_bank::where('user_id', $user_id)
            ->where('status', "Yes")
            ->selectRaw('sum(total_blood) as count')
            ->get();

        foreach ($data_user as $item) {

            $data_Text_topic = [
                "ฝากเลือดสำเร็จแล้ว",
                "ชื่อ",
                "เจ้าของ",
                "วันที่",
                "เวลา",
                "ปริมาณ",
                "ธนาคารเลือด",
                "ฝากรวม",
                "จาก",
                "ปริมาณรวม",
                "ครั้ง",
                "ตัว",
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);

            $template_path = storage_path('../public/json/flex-success-blood-bank.json');   

            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ฝากเลือดสำเร็จแล้ว",$data_topic[0],$string_json);
            $string_json = str_replace("ชื่อ",$data_topic[1],$string_json);
            $string_json = str_replace("เจ้าของ",$data_topic[2],$string_json);
            $string_json = str_replace("วันที่",$data_topic[3],$string_json);
            $string_json = str_replace("เวลา",$data_topic[4],$string_json);
            $string_json = str_replace("ปริมาณ",$data_topic[5],$string_json);

            $string_json = str_replace("ธนาคารเลือด",$data_topic[6],$string_json);
            $string_json = str_replace("ฝากรวม",$data_topic[7],$string_json);
            $string_json = str_replace("จาก",$data_topic[8],$string_json);
            $string_json = str_replace("ปริมาณรวม",$data_topic[9],$string_json);
            $string_json = str_replace("ครั้ง",$data_topic[10],$string_json);
            $string_json = str_replace("ตัว",$data_topic[11],$string_json);

            foreach ($data_blood as $key) {
                $string_json = str_replace("รพ. เกษตร",$key->location,$string_json);
                $string_json = str_replace("500 ml",$key->quantity,$string_json);
            }

            $string_json = str_replace("Lucky",$item->name,$string_json);
            $string_json = str_replace("17/3/2565",$date_now,$string_json);
            $string_json = str_replace("16:44",$time_now,$string_json);
            
            foreach ($data_pet as $pet) {
                $string_json = str_replace("Luca",$pet->name,$string_json);
                $string_json = str_replace("https://www.peddyhub.com/storage/uploads/Se5EidTPqpxlQbIf4CAWrGg9A2iwlWlk6hY9gYtQ.jpg","https://www.peddyhub.com/storage/".$pet->photo,$string_json);
            }

            $string_json = str_replace("5",$count_time,$string_json);
            $string_json = str_replace("3",$count_pet,$string_json);
            $string_json = str_replace("1300",$count_blood,$string_json);

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
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data_save_log = [
                "title" => "ฝากเลือดสำเร็จ",
                "content" => $item->user->username . " - " . $item->user->provider_id,
            ];
            MyLog::create($data_save_log);
        }
    }

     public function send_blood_no_cf($data_user)
    {
        foreach ($data_user as $item) {

            $data_Text_topic = [
                "คุณไม่ได้ยืนยันการฝากเลือด",
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);
            $template_path = storage_path('../public/json/not_cf_blood.json');   

            $string_json = file_get_contents($template_path);
            $string_json = str_replace("คุณไม่ได้ยืนยันการฝากเลือด",$data_topic[0],$string_json);

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
                    //'timeout' => 60
                ]
            ];
                                
            $context  = stream_context_create($opts);
            $url = "https://api.line.me/v2/bot/message/push";
            $result = file_get_contents($url, false, $context);

            //SAVE LOG
            $data_save_log = [
                "title" => "ฝากเลือดwไม่สำเร็จ",
                "content" => $item->user->username . " - " . $item->user->provider_id,
            ];
            MyLog::create($data_save_log);
        }
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