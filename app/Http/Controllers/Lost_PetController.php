<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use App\Models\Profile;

use App\Models\Lost_Pet;
use App\Models\Pet_Category;
use App\Models\Pet;
use App\Models\Partner;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LineMessagingAPI;

class Lost_PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $category  = $request->get('pet_category_id');

        $keyword =  !empty($category);
        
        if (!empty($keyword)) {
            $lost_pet = Lost_Pet::where('pet_category_id',    'LIKE', '%' .$category.'%')
                ->latest()->paginate($perPage);
        } else {
            $lost_pet = Lost_Pet::latest()->paginate($perPage);
        }

        return view('lost_pet.index', compact('lost_pet' ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user_id = Auth::id();

        $select_pet = Pet::where('user_id' , $user_id)->get();
        $partner = Partner::where('show_homepage' , "show")->get();


        return view('lost_pet.create', compact('select_pet','partner'));
    }

    function lost_pet_by_js100()
    {
        $user_id = Auth::id();

        $select_pet = Pet::where('user_id' , $user_id)->get();
        $partner = Partner::where('show_homepage' , "show")->get();


        return view('lost_pet.lost_pet_by_js100', compact('select_pet','partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $requestData['tambon_th'] = $requestData['select_tambon']; 
        $requestData['amphoe_th'] = $requestData['select_amphoe']; 
        $requestData['changwat_th'] = $requestData['select_province']; 
        $requestData['status'] = 'searching'; 

        if (!empty($requestData['input_province'])) {
            $requestData['tambon_th'] = $requestData['input_tambon']; 
            $requestData['amphoe_th'] = $requestData['input_amphoe']; 
            $requestData['changwat_th'] = $requestData['input_province'];
        }

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
            ->store('uploads', 'public');
        }

        Lost_Pet::create($requestData);

        if (!empty($requestData['phone'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update(['phone' => $requestData['phone']]);
        }

        $line = new LineMessagingAPI();
        $line->send_lost_pet($requestData);

        return redirect('lost_pet')->with('flash_message', 'Lost_Pet added!');
    }

    public function store_js100(Request $request)
    {
        $requestData = $request->all();

        // if (!empty($requestData['token_api'])) {
        //     // code...
        // }

        if (empty($requestData['owner_name'])) {
            $requestData['owner_name'] = "ไม่ได้ระบุ" ;
        }

        if (empty($requestData['owner_phone'])) {
            $requestData['owner_phone'] = "ไม่ได้ระบุ" ;
        }

        if (empty($requestData['sub_category'])) {
            $requestData['sub_category'] = "ไม่ได้ระบุ" ;
        }

        if (empty($requestData['detail'])) {
            $requestData['detail'] = "ไม่ได้ระบุ" ;
        }

        $requestData['tambon_th'] = $requestData['select_tambon']; 
        $requestData['amphoe_th'] = $requestData['select_amphoe']; 
        $requestData['changwat_th'] = $requestData['select_province']; 
        $requestData['status'] = 'searching'; 

        if (!empty($requestData['input_province'])) {
            $requestData['tambon_th'] = $requestData['input_tambon']; 
            $requestData['amphoe_th'] = $requestData['input_amphoe']; 
            $requestData['changwat_th'] = $requestData['input_province'];
        }

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
            ->store('uploads', 'public');
        }

        Lost_Pet::create($requestData);

        $data_lost_pet = Lost_Pet::latest()->first();
        $lost_pet_id = $data_lost_pet->id ;

        // echo "<br>" ;
        // echo "<pre>" ;
        // print_r($requestData) ;
        // echo "<pre>" ;
        // exit();

        $this->send_lost_pet_by_js100($requestData, $lost_pet_id);

        return redirect('lost_pet/create')->with('flash_message', 'Lost_Pet added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $lost_pet = Lost_Pet::findOrFail($id);

        return view('lost_pet.show', compact('lost_pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $lost_pet = Lost_Pet::findOrFail($id);

        return view('lost_pet.edit', compact('lost_pet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }

        $lost_pet = Lost_Pet::findOrFail($id);
        $lost_pet->update($requestData);

        return redirect('lost_pet')->with('flash_message', 'Lost_Pet updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Lost_Pet::destroy($id);

        return redirect('my_post')->with('flash_message', 'Lost_Pet deleted!');
    }

    public function lost_pet_line()
    {
        if(Auth::check()){
            return redirect('lost_pet/create');
        }else{
            return redirect('/login/line?redirectTo=lost_pet/create');
        }
    }

    public function mypost()
    {
        $id = Auth::id();
        $my_post = Lost_Pet::where('user_id', $id)->get();

        $date_now = date("Y-m-d");
        $date_delete_7 = strtotime("-6 days");
        $date_7 = date("Y-m-d" , $date_delete_7);
            
        return view('lost_pet.my_post', compact('my_post' , 'date_7'));

    }

    public function update_lost_pet_send_line($id)
    {
        $data = Lost_Pet::findOrFail($id);

        $num_round = $data->send_round ;

        $sum_round = (int)$num_round + 1;
       
        $requestData['send_round'] =  $sum_round ;
        $data->update($requestData);

        $line = new LineMessagingAPI();
        $line->send_lost_pet_again($data);

        // return $sum_round ;

    }

    public function found_pet($id)
    {
        $data = Lost_Pet::findOrFail($id);
       
        $requestData['status'] =  'found' ;
        $data->update($requestData);

        return "ok" ;
    }

    public function send_lost_pet_by_js100($data, $lost_pet_id)
    {
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

        if (!empty($data['photo_link'])) {
            $photo = $data['photo_link'];
        }else{
            $photo = "https://www.peddyhub.com/storage/" . $data['photo'];
        }
        
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

        $send_to_users = Profile::where('type' ,'line')
            ->where('changwat_th' ,$changwat_th)
            ->where('amphoe_th' ,$amphoe_th)
            ->where('tambon_th' ,$tambon_th)
            ->get();

        foreach ($send_to_users as $item) {
            if (!empty($item->user->provider_id)) {
                $alert_arr = json_decode($item->alert_lost_pet) ;

                if (in_array($data['pet_category_id'] , $alert_arr)){
                    
                    // ส่งข้อความ
                    $data_Text_topic = [
                        "ตามหา",
                        "หาย",
                        "วันที่หาย",
                        "ประเภท",
                        "เพศ",
                        "สายพันธุ์",
                        "รายละเอียด",
                        "ดูเพิ่มเติม",
                        "โทร",
                        "เจ้าของ",
                        $pet_category_id,
                        "ไม่ได้ระบุ",
                    ];
                    
                    $line = new LineMessagingAPI();
                    $data_topic = $line->language_for_user($data_Text_topic, $item->user->provider_id);

                    $template_path = storage_path('../public/json/flex_lost_pet_by_js100.json');   
                    $string_json = file_get_contents($template_path);

                    // แปลภาษาหัวข้อ
                    $string_json = str_replace("ตามหา",$data_topic[0],$string_json);
                    $string_json = str_replace("หาย",$data_topic[1],$string_json);
                    $string_json = str_replace("วันที่หาย",$data_topic[2],$string_json);
                    $string_json = str_replace("ประเภท",$data_topic[3],$string_json);
                    $string_json = str_replace("เพศ",$data_topic[4],$string_json);
                    $string_json = str_replace("สายพันธุ์",$data_topic[5],$string_json);
                    $string_json = str_replace("รายละเอียด",$data_topic[6],$string_json);
                    $string_json = str_replace("ดูเพิ่มเติม",$data_topic[7],$string_json);
                    $string_json = str_replace("โทร",$data_topic[8],$string_json);
                    $string_json = str_replace("เจ้าของ",$data_topic[9],$string_json);

                    $string_json = str_replace("PET_TYPE",$data_topic[10],$string_json);
                    $string_json = str_replace("DATE_LOST",$date_now,$string_json);

                    // data pet 
                    $string_json = str_replace("https:IMGPET",$photo,$string_json);
                    $string_json = str_replace("PET_NAME",$data['pet_name'],$string_json);
                    $string_json = str_replace("PET_AGE",$data['pet_age'],$string_json);
                    $string_json = str_replace("PET_GENDER",$data['pet_gender'],$string_json);

                    $string_json = str_replace("PET_SPECIES",$data['sub_category'],$string_json);
                    $string_json = str_replace("PHONE_USER",$data['owner_phone'],$string_json);
                    $string_json = str_replace("NAME_USER",$data['owner_name'],$string_json);
                    $string_json = str_replace("LOST_PET_ID",$lost_pet_id,$string_json);
                    $string_json = str_replace("ไม่ได้ระบุ",$data_topic[11],$string_json);

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
                        "title" => "ส่งข้อความแจ้งสัตว์เลี้ยงหาย โดย Partner",
                        "content" => $item->user->username . " - " . $item->user->provider_id,
                    ];
                    MyLog::create($data_save_log);
                }
            }
            
        }
    }

}
