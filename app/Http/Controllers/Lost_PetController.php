<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use App\Models\Profile;

use App\Models\Lost_Pet;
use App\Models\Pet_Category;
use App\Models\Pet;
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
                ->where('status','show')
                ->latest()->paginate($perPage);
        } else {
            $lost_pet = Lost_Pet::where('status','show')->latest()->paginate($perPage);
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

        return view('lost_pet.create', compact('select_pet'));
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
        $requestData['status'] = 'show'; 

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

        return redirect('lost_pet')->with('flash_message', 'Lost_Pet deleted!');
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
        $date_delete_15 = strtotime("-14 days");
        $date_15 = date("Y-m-d" , $date_delete_15);
            
        return view('lost_pet.my_post', compact('my_post' , 'date_15'));

    }

    public function update_lost_pet_nosend($id)
    {
        $lost_pet = Lost_Pet::findOrFail($id);

        $requestData['status'] = "show" ;
        $lost_pet->update($requestData);
    }

    public function update_lost_pet_send_line($id)
    {
        $lost_pet = Lost_Pet::findOrFail($id);

        $requestData['status'] = "show" ;
        $lost_pet->update($requestData);

        $line = new LineMessagingAPI();
        $line->send_lost_pet($lost_pet);

        $data_users = User::where('id', $lost_pet['user_id'])->get();
        $data_pets = Pet::where('id', $lost_pet['pet_id'])->get();

        $date_now = date("d/m/Y");

        $changwat_th = $lost_pet['changwat_th'];
        $amphoe_th = $lost_pet['amphoe_th'];
        $tambon_th = $lost_pet['tambon_th'];

        $photo = $lost_pet['photo'];

        if (!empty($lost_pet['detail'])) {
            $detail = $lost_pet['detail'];
        }else{
            $detail = "-";
        }
        
        $phone = $lost_pet['phone'];

        switch ($lost_pet['pet_category_id']) {
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

        $send_to_users = Profile::where('id', '!=' , $lost_pet['user_id'])
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

}
