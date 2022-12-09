<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Mylog;
use App\Models\Lost_Pet;
use Illuminate\Support\Facades\Auth;
use App\Models\Blood_bank;
use App\Models\Partner;

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
                $provider_id = $event["source"]['userId'];
                $users = User::where('provider_id' , $provider_id)->get();
                foreach ($users as $user) {
                    $user_id = $user->id ;
                }
                
                $user_text_topic = Profile::where('user_id', $user_id)->get('language');
                foreach ($user_text_topic as $item) {
                    $user_language = $item->language;
        
                }

                $template_path = storage_path('../public/json/flex-line-other-language/flex-line-other-' . $user_language . '.json');  
                
                $string_json = file_get_contents($template_path);
                $messages = [ json_decode($string_json, true) ]; 
    			break;

    		case 'pet_insurance':
    			$template_path = storage_path('../public/json/flex_pet_insurance.json');   
                $string_json = file_get_contents($template_path);

                $messages = [ json_decode($string_json, true) ]; 
    			break;
            case 'viicheck':
                $template_path = storage_path('../public/json/viicheck.json');   
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
                $data_blood = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->get();
                //จำนวนสัตว์ทั้งหมด
                $data_count_pet = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->groupBy('pet_id')
                    ->get();

                $data_quantity_bloods = Blood_bank::where('user_id', $user_id)
                    ->where('status', "Yes")
                    ->selectRaw('sum(quantity) as count')
                    ->get();

                $count_pet = count($data_count_pet);
                $count_blood = count($data_blood);
                foreach ($data_quantity_bloods as $data_quantity_blood) {
                    $quantity_blood = $data_quantity_blood->count ;
                }

                $data_Text_topic = [
                    "ธนาคารเลือด",
                    "เพิ่มเติม",
                    "จำนวน",
                    "จาก",
                    "ปริมาณ",
                    "แชร์",
                    "ใช้",
                ];

                $data_topic = $this->language_for_user($data_Text_topic, $provider_id);

                if (!empty($count_pet)) {
                    $template_path = storage_path('../public/json/flex_blood_bank.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("Total_quantity", $quantity_blood,$string_json);
                    $string_json = str_replace("Total_pet",$count_pet,$string_json);
                    $string_json = str_replace("user_id",$user_id,$string_json);
                    $string_json = str_replace("Total_time", $count_blood,$string_json);
                }else{
                    $template_path = storage_path('../public/json/flex_blood_bank.json');   
                    $string_json = file_get_contents($template_path);
                    $string_json = str_replace("Total_quantity", "0",$string_json);
                    $string_json = str_replace("Total_pet", "0" ,$string_json);
                    $string_json = str_replace("user_id",$user_id,$string_json);
                    $string_json = str_replace("Total_time", "0" ,$string_json);
                }

                $string_json = str_replace("ธนาคารเลือด",$data_topic[0],$string_json);
                $string_json = str_replace("เพิ่มเติม",$data_topic[1],$string_json);
                $string_json = str_replace("จำนวน",$data_topic[2],$string_json);
                $string_json = str_replace("จาก",$data_topic[3],$string_json);
                $string_json = str_replace("ปริมาณ",$data_topic[4],$string_json);
                $string_json = str_replace("แชร์",$data_topic[5],$string_json);
                $string_json = str_replace("ใช้",$data_topic[6],$string_json);
                
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
            case 'view_more':
                $id_lost_pet = $data ;
                $data_lost_pet = Lost_Pet::where('id' , $id_lost_pet)->first();
                $text_detail = $data_lost_pet->detail ;

                $template_path = storage_path('../public/json/send_finished.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("เปลี่ยนข้อความตรงนี้",$text_detail,$string_json);

                $messages = [ json_decode($string_json, true) ]; 
            break;
            case 'Chinese':
                $provider_id = $event["source"]['userId'];
                $user = User::where('provider_id', $provider_id)->get();

                foreach ($user as $item) {
                    $user_id = $item->id ;
                }
                $template_path = storage_path('../public/json/flex-language-Chinese.json');   
                $string_json = file_get_contents($template_path);
                $string_json = str_replace("user_id",$user_id,$string_json);

                $messages = [ json_decode($string_json, true) ]; 
            break;
            case 'my_pet':
                $provider_id = $event["source"]['userId'];
                $users = User::where('provider_id' , $provider_id)->get();
                foreach ($users as $user) {
                    $user_id = $user->id ;
                }

                $pet = Pet::where('user_id', $user_id)->get();
                $data_pet = Pet::where('user_id', $user_id)->inRandomOrder()->limit(3)->get();

                for ($i=0; $i < count($data_pet);) { 
                    foreach($data_pet as $item ){
                        $id[$i] = $item->id;
                        $name[$i] = $item->name;
                        $photo[$i] = $item->photo;
                        $gender[$i] = $item->gender;
                        $i++;
                    }
                }

                switch(count($pet))
                {
                    case "1": 
                            $template_path = storage_path('../public/json/flex-pet.json');   
                            $string_json = file_get_contents($template_path);

                            $gender1 = $gender[0];

                            $gender_m = "https://www.peddyhub.com/peddyhub/images/img-icon/male.png";
                            $gender_f = "https://www.peddyhub.com/peddyhub/images/img-icon/female.png";
                            $gender_e = "https://www.peddyhub.com/peddyhub/images/img-icon/equality.png";


                            // เพศ
                            if ($gender1 == "ชาย") {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_m,$string_json);    
                            }
                            if ($gender1 == "หญิง") {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_f,$string_json);    
                            }
                            else{
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_e,$string_json);    

                            }

                            // รูป
                            if (!empty($item->photo)) {
                                $pet_photo = "https://www.peddyhub.com/storage/".$photo[0] ;
                            }
                            if (empty($item->photo)) {
                                $pet_photo = "https://www.peddyhub.com/peddyhub/images/sticker/catanddog.png" ;
                            }
                            $string_json = str_replace("pet_1",$id[0],$string_json);  
                            $string_json = str_replace("pet_name_1",$name[0],$string_json);
                            $string_json = str_replace("https://www.peddyhub.com/img_pet1.jpg",$pet_photo,$string_json);    

                  
                    break;
                    case "2": 
                            $template_path = storage_path('../public/json/flex-pet2.json');   
                            $string_json = file_get_contents($template_path);
                            $gender1 = $gender[0];
                            $gender2 = $gender[1];

                            $gender_m = "https://www.peddyhub.com/peddyhub/images/img-icon/male.png";
                            $gender_f = "https://www.peddyhub.com/peddyhub/images/img-icon/female.png";
                            $gender_e = "https://www.peddyhub.com/peddyhub/images/img-icon/equality.png";

                            // เพศ
                            if ($gender1 == 'ชาย') {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_m,$string_json);    
                            }
                            if ($gender1 == 'หญิง') {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_f,$string_json);    
                            }else{
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_e,$string_json);    
                            }

                            if ($gender2 == 'ชาย') {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_m,$string_json);    
                            }
                            if ($gender2 == 'หญิง') {
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_f,$string_json);    
                            }else{
                                $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_e,$string_json);    
                            }
                            
                            // รูป
                            if (!empty($item->photo)) {
                                $pet_photo = "https://www.peddyhub.com/storage/".$photo[0] ;
                                $pet_photo2 = "https://www.peddyhub.com/storage/".$photo[1] ;

                            }
                            if (empty($item->photo)) {
                                $pet_photo = "https://www.peddyhub.com/peddyhub/images/sticker/catanddog.png" ;
                            }
                            //สัตว์เลี้ยง1
                            $string_json = str_replace("pet_name_1",$name[0],$string_json);
                            $string_json = str_replace("https://www.peddyhub.com/img_pet1.jpg",$pet_photo,$string_json); 
                            $string_json = str_replace("pet_1",$id[0],$string_json);  
                            //สัตว์เลี้ยง2
                            $string_json = str_replace("pet_name_2",$name[1],$string_json);
                            $string_json = str_replace("https://www.peddyhub.com/img_pet2.jpg",$pet_photo2,$string_json);
                            $string_json = str_replace("pet_2",$id[1],$string_json);  
                    break;
                    default: 
                        $template_path = storage_path('../public/json/flex-pet3.json');   
                        $string_json = file_get_contents($template_path);

                        $gender1 = $gender[0];
                        $gender2 = $gender[1];
                        $gender3 = $gender[2];


                        $gender_m = "https://www.peddyhub.com/peddyhub/images/img-icon/male.png";
                        $gender_f = "https://www.peddyhub.com/peddyhub/images/img-icon/female.png";
                        $gender_e = "https://www.peddyhub.com/peddyhub/images/img-icon/equality.png";

                        // เพศ
                        if ($gender1 == 'ชาย') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_m,$string_json);    
                        }
                        if ($gender1 == 'หญิง') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_f,$string_json);    
                        }else{
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male.png",$gender_e,$string_json);    
                        }

                        if ($gender2 == 'ชาย') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_m,$string_json);    
                        }
                        if ($gender2 == 'หญิง') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_f,$string_json);    
                        }else{
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male2.png",$gender_e,$string_json);    
                        }

                        if ($gender3 == 'ชาย') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male3.png",$gender_m,$string_json);    
                        }
                        if ($gender3 == 'หญิง') {
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male3.png",$gender_f,$string_json);    
                        }else{
                            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/img-icon/male3.png",$gender_e,$string_json);    
                        }

                        // รูป
                        if (!empty($item->photo)) {
                            $pet_photo = "https://www.peddyhub.com/storage/".$photo[0] ;
                            $pet_photo2 = "https://www.peddyhub.com/storage/".$photo[1] ;
                            $pet_photo3 = "https://www.peddyhub.com/storage/".$photo[2] ;
                        }
                        if (empty($item->photo)) {
                            $pet_photo = "https://www.peddyhub.com/peddyhub/images/sticker/catanddog.png" ;
                        }
                        //สัตว์เลี้ยง1
                        $string_json = str_replace("pet_name_1",$name[0],$string_json);
                        $string_json = str_replace("https://www.peddyhub.com/img_pet1.jpg",$pet_photo,$string_json); 
                        $string_json = str_replace("pet_1",$id[0],$string_json);    
                        //สัตว์เลี้ยง2
                        $string_json = str_replace("pet_name_2",$name[1],$string_json);
                        $string_json = str_replace("https://www.peddyhub.com/img_pet2.jpg",$pet_photo2,$string_json);
                        $string_json = str_replace("pet_2",$id[1],$string_json);    
                        //สัตว์เลี้ยง3
                        $string_json = str_replace("pet_name_3",$name[2],$string_json);
                        $string_json = str_replace("https://www.peddyhub.com/img_pet3.jpg",$pet_photo3,$string_json);
                        $string_json = str_replace("pet_3",$id[2],$string_json);    
                    break;
                }
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

    public function alert_vaccine()
    {
        $date_now = date("Y-m-d");
        $date_add = strtotime("+7 Day");
        $next_day = date("Y-m-d" , $date_add);

        $rabies = pet::where('date_next_rabies' , $next_day)
            ->where('provider_id', 'LIKE', "%U%")
            ->whereNull('rabies')
            ->get();

        foreach ($rabies as $item) {

            $data_Text_topic = [
                    "แจ้งเตือนการฉีดวัคซีน",
                    "ฉีดวัคซีนพิษสุนัขบ้า",
                    "อาทิตย์หน้า",
                    "กำหนดฉีดวันที่",
                    "สัตว์เลี้ยง",
                    "แก้ไขวันที่ฉีดวัคซีน",
                ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->provider_id);

            $template_path = storage_path('../public/json/flex-alert-vaccine-rabies.json');   
            $string_json = file_get_contents($template_path);
            
            $string_json = str_replace("แจ้งเตือนการฉีดวัคซีน",$data_topic[0],$string_json);
            $string_json = str_replace("ฉีดวัคซีนพิษสุนัขบ้า",$data_topic[1],$string_json);
            $string_json = str_replace("อาทิตย์หน้า",$data_topic[2],$string_json);
            $string_json = str_replace("กำหนดฉีดวันที่",$data_topic[3],$string_json);
            $string_json = str_replace("date_time",$item->date_next_rabies,$string_json);
            $string_json = str_replace("สัตว์เลี้ยง",$data_topic[4],$string_json);
            $string_json = str_replace("แก้ไขวันที่ฉีดวัคซีน",$data_topic[5],$string_json);
            $string_json = str_replace("pet_id",$item->id,$string_json); 
            $string_json = str_replace("pet_name",$item->name,$string_json); 
            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/sticker/01.png","https://www.peddyhub.com/storage/".$item->photo,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
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
                "title" => "แจ้งเตือนฉีดวัคซีนพิษสุนัขบ้า",
                "content" => $item->username . " - " . $item->provider_id,
            ];
            
            DB::table('pets')
                ->where('id', $item->id)
                ->update(['rabies' => $date_now]);

            MyLog::create($data_save_log);
        }


        $flea = pet::where('date_next_flea' , $next_day)
            ->where('provider_id', 'LIKE', "%U%")
            ->whereNull('flea')
            ->get();

        foreach ($flea as $item) {

            $data_Text_topic = [
                    "แจ้งเตือนการฉีดวัคซีน",
                    "ฉีดวัคซีนเห็บ-หมัด",
                    "อาทิตย์หน้า",
                    "กำหนดฉีดวันที่",
                    "สัตว์เลี้ยง",
                    "แก้ไขวันที่ฉีดวัคซีน",
                ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->provider_id);

            $template_path = storage_path('../public/json/flex-alert-vaccine-flea.json');   
            $string_json = file_get_contents($template_path);
            
            $string_json = str_replace("แจ้งเตือนการฉีดวัคซีน",$data_topic[0],$string_json);
            $string_json = str_replace("ฉีดวัคซีนเห็บ-หมัด",$data_topic[1],$string_json);
            $string_json = str_replace("อาทิตย์หน้า",$data_topic[2],$string_json);
            $string_json = str_replace("กำหนดฉีดวันที่",$data_topic[3],$string_json);
            $string_json = str_replace("date_time",$item->date_next_flea,$string_json);
            $string_json = str_replace("สัตว์เลี้ยง",$data_topic[4],$string_json);
            $string_json = str_replace("แก้ไขวันที่ฉีดวัคซีน",$data_topic[5],$string_json);
            $string_json = str_replace("pet_id",$item->id,$string_json); 
            $string_json = str_replace("pet_name",$item->name,$string_json); 
            $string_json = str_replace("https://www.peddyhub.com/peddyhub/images/sticker/01.png","https://www.peddyhub.com/storage/".$item->photo,$string_json);

            $messages = [ json_decode($string_json, true) ];

            $body = [
                "to" => $item->provider_id,
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
                "title" => "แจ้งเตือนฉีดวัคซีนเห็บหมัด",
                "content" => $item->username . " - " . $item->provider_id,
            ];
            
            DB::table('pets')
                ->where('id', $item->id)
                ->update(['flea' => $date_now]);

            MyLog::create($data_save_log);
        }
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

        $phone = $data['phone'];

        switch ($data['pet_category_id']) {
        	case '1':
        		$pet_category_id = 'สุนัข';
        		break;
        	case '2':
        		$pet_category_id = 'แมว';
        		break;
        	case '3':
        		$pet_category_id = 'นก';
        		break;
        	case '4':
        		$pet_category_id = 'ปลา';
        		break;
        	case '5':
        		$pet_category_id = 'สัตว์เล็ก';
        		break;
        	case '6':
        		$pet_category_id = 'Exotic';
        		break;
        }

        $send_to_users = Profile::where('id', '!=' , $data['user_id'])
        	->where('changwat_th' ,$changwat_th)
        	->where('amphoe_th' ,$amphoe_th)
        	->where('tambon_th' ,$tambon_th)
            ->where('type' ,'line')
        	->get();

        foreach ($send_to_users as $item) {
            if (!empty($item->user->provider_id)) {
                $alert_arr = json_decode($item->alert_lost_pet) ;

                if (in_array($data['pet_category_id'] , $alert_arr)){
                    
                    // ส่งข้อความ
                    $data_Text_topic = [
                        "ตามหา",
                        "วันที่หาย",
                        "โทร",
                        "หาย",
                        "เจ้าของ",
                        $pet_category_id,
                        "ประเภท",
                        "เพศ",
                        "สายพันธ์",

                    ];

                    $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);

                    $template_path = storage_path('../public/json/flex_lost_pet.json');   

                    $string_json = file_get_contents($template_path);

                    $string_json = str_replace("ตามหา",$data_topic[0],$string_json);
                    $string_json = str_replace("วันที่หาย",$data_topic[1],$string_json);
                    $string_json = str_replace("โทร",$data_topic[2],$string_json);
                    $string_json = str_replace("หาย",$data_topic[3],$string_json);
                    $string_json = str_replace("เจ้าของ",$data_topic[4],$string_json);
                    $string_json = str_replace("PET_TYPE",$data_topic[5],$string_json);
                    $string_json = str_replace("ประเภท",$data_topic[6],$string_json);
                    $string_json = str_replace("เพศ",$data_topic[7],$string_json);
                    $string_json = str_replace("สายพันธ์ุ",$data_topic[8],$string_json);

                    foreach ($data_users as $data_user) {
                    //     $string_json = str_replace("lucky",$data_user->profile->name,$string_json); 
                            $string_json = str_replace("lucky",$data_user->profile->name,$string_json);
                            $string_json = str_replace("PHONE_USER_TEL",$phone,$string_json);
                          
                    }

                    $string_json = str_replace("IMGPET",$photo,$string_json);
                    $string_json = str_replace("DATE_LOST",$date_now,$string_json);
                    // $string_json = str_replace("รายละเอียด",$detail,$string_json);
                    

                    // $string_json = str_replace("TEXT_EN",$item->user->language,$string_json);
                    // $string_json = str_replace("สีแดง",$detail,$string_json);

                    //partner
                    $partner = DB::table('partners')
                        ->where('show_homepage' , "show")
                        ->inRandomOrder()
                        ->limit(6)
                        ->get();

                    $cout_partner = count($partner) - 1 ;


                    for ($i=0; $i <= $cout_partner; ) { 

                        foreach($partner as $item_partner ){
                            $img_partner[$i] = $item_partner->logo;
                            $i++;

                        }
                        
                    }
                    
                    $string_json = str_replace("IMGPARTNER_1",$img_partner[0],$string_json);   
                    $string_json = str_replace("IMGPARTNER_2",$img_partner[1],$string_json);   
                    $string_json = str_replace("IMGPARTNER_3",$img_partner[2],$string_json);   
                    $string_json = str_replace("IMGPARTNER_4",$img_partner[3],$string_json);   
                    $string_json = str_replace("IMGPARTNER_5",$img_partner[4],$string_json);   
                    $string_json = str_replace("IMGPARTNER_6",$img_partner[5],$string_json); 

                      
                    
                    $now = Carbon::now();

                    // data pet 
                    foreach ($data_pets as $data_pet) {
                        
                        $birth = Carbon::parse($data_pet->birth);
                        $birth_year = $birth->diff($now)->format("%y");
                        $birth_month = $birth->diff($now)->format("%m");
                        $birth_day = $birth->diff($now)->format("%d");

                        $pet_age = null;

                        if ( $birth_year != 0 ) {
                            $pet_age = $birth_year ." ปี";
                        }
                        if( $birth_month != 0){
                            $pet_age =  $pet_age . $birth_month ." เดือน ";
                        }
                        if( $birth_day != 0){
                            $pet_age = $pet_age . $birth_day ." วัน ";
                        }

                        if (!empty($data_pet->species)) {
                            $string_json = str_replace("PET_SPECIES",$data_pet->species,$string_json);
                        }else{
                            $string_json = str_replace("PET_SPECIES","ไม่ได้ระบุ",$string_json);
                        }

                        $string_json = str_replace("PET_NAME",$data_pet->name,$string_json);    
                        $string_json = str_replace("PET_AGE",$pet_age,$string_json);
                        $string_json = str_replace("PET_GENDER",$data_pet->gender,$string_json);
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
            
        }
		
	}

    public function send_lost_pet_again($data)
    {

        $data_users = User::where('id', $data['user_id'])->get();
        $data_pets = Pet::where('id', $data['pet_id'])->get();

        $date_now = date("d/m/Y");

        $changwat_th = $data['changwat_th'];
        $amphoe_th = $data['amphoe_th'];
        $tambon_th = $data['tambon_th'];

        $photo = $data['photo'];

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
            $alert_arr = json_decode($item->alert_lost_pet) ;

            if (in_array($data['pet_category_id'] , $alert_arr)){
                // ส่งข้อความ
                $data_Text_topic = [
                    "ตามหา",
                    "วันที่หาย",
                    "คำอธิบาย",
                    "ติดต่อ",
                    "หาย",
                    "แปลภาษา",
                    "เจ้าของ",
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
                $string_json = str_replace("เจ้าของ",$data_topic[6],$string_json);

                $string_json = str_replace("pet_cat",$data_topic[7],$string_json);
                
                foreach ($data_users as $data_user) {
                    $string_json = str_replace("lucky",$data_user->profile->name,$string_json);   
                }

                $string_json = str_replace("IMGPET",$photo,$string_json);
                $string_json = str_replace("4544.png",$img_icon,$string_json);
                $string_json = str_replace("22/2/2022",$date_now,$string_json);
                $string_json = str_replace("0999999999",$item->phone,$string_json);

                
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

        return "ok" ;
        
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
            $string_json = str_replace("500",$quantity,$string_json);
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

    public function send_blood_success($data_bloods , $data_user , $data_pet)
    {
        $date_now = date("Y-m-d") ;
        $time_now = date("H:i");

        foreach ($data_user as $item) {
            $user_id = $item->id ;
            //จำนวนการฝาก
            $data_blood_2 = Blood_bank::where('user_id', $user_id)
                ->where('status', "Yes")
                ->get();

            $data_quantity_bloods = Blood_bank::where('user_id', $user_id)
                ->where('status', "Yes")
                ->selectRaw('sum(quantity) as count')
                ->get();

            $count_blood = count($data_blood_2);
            foreach ($data_quantity_bloods as $data_quantity_blood) {
                $quantity_blood = $data_quantity_blood->count ;
            }

            $data_Text_topic = [
                "ฝากเลือดสำเร็จแล้ว",
                "ชื่อ",
                "เจ้าของ",
                "วันที่",
                "เวลา",
                "ปริมาณรวม",
                "ปริมาณ",
                "ธนาคารเลือด",
                "ฝากรวม",
                "ครั้ง",
            ];

            $data_topic = $this->language_for_user($data_Text_topic, $item->user->provider_id);

            $template_path = storage_path('../public/json/flex-success-blood-bank.json');   

            $string_json = file_get_contents($template_path);

            $string_json = str_replace("ฝากเลือดสำเร็จแล้ว",$data_topic[0],$string_json);
            $string_json = str_replace("ชื่อ",$data_topic[1],$string_json);
            $string_json = str_replace("เจ้าของ",$data_topic[2],$string_json);
            $string_json = str_replace("วันที่",$data_topic[3],$string_json);
            $string_json = str_replace("เวลา",$data_topic[4],$string_json);

            $string_json = str_replace("ปริมาณรวม",$data_topic[5],$string_json);
            $string_json = str_replace("ปริมาณ",$data_topic[6],$string_json);

            $string_json = str_replace("ธนาคารเลือด",$data_topic[7],$string_json);
            $string_json = str_replace("ฝากรวม",$data_topic[8],$string_json);
            $string_json = str_replace("ครั้ง",$data_topic[9],$string_json);

            $string_json = str_replace("data_name_owner",$item->name,$string_json);
            $string_json = str_replace("data_date",$date_now,$string_json);
            $string_json = str_replace("data_time",$time_now,$string_json);

            $string_json = str_replace("data_total_quantity_blood",$quantity_blood,$string_json);
            $string_json = str_replace("data_total_r",$count_blood,$string_json);

            foreach ($data_bloods as $key) {
                $string_json = str_replace("data_name_location",$key->location,$string_json);
                $string_json = str_replace("data_quantity",$key->quantity,$string_json);
            }

            foreach ($data_pet as $pet) {
                $string_json = str_replace("data_name_pet",$pet->name,$string_json);
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

    public function send_update_profile($provider_id)
    {
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

            $body = [
                "to" => $item->provider_id,
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
                "title" => "update profile",
                "content" => $item->username . " - " . $item->provider_id,
            ];
            MyLog::create($data_save_log);
        }
    }
}