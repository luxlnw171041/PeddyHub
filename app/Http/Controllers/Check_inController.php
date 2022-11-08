<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Check_in;
use App\Models\Partner;
use App\Models\User;
use App\Models\Disease;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Check_inController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $requestData = $request->all();
        $perPage = 25;
        $data_user = Auth::user();
        $check_in_at = $data_user->partner;

        $data_partner = Partner::where('id' , $check_in_at)->first();
        $id_partner = $data_partner->id ;
        $name_partner = $data_partner->name ;

        $select_date = $request->get('select_date');
        $select_time_1 = $request->get('select_time_1');
        $select_time_2 = $request->get('select_time_2');
        $select_name = $request->get('select_name');

        $data_user_check_in = profile::where('real_name', $select_name)->get();
        
        foreach($data_user_check_in as $item){
            $id_user_check_in = $item->user_id ;
        }

        $request_name_area = $request->get('name_area');
        $text_name_area = null ;
        $id_partner_name_area =  null ;

        if ($request_name_area == 'all') {
            $id_partner_name_area = $id_partner ;
            $text_name_area = "ทั้งหมด" ;
        }else{
            $data_partner_name_area = Partner::where('id' , $request_name_area)->get();
            foreach ($data_partner_name_area as $data_name_area) {
                $text_name_area = $data_name_area->name_area ;
                $id_partner_name_area = $data_name_area->id ;
            }
        }

        // echo "request >> " . $request_name_area;
        // echo "<br>";
        // echo "text_name_area >> " . $text_name_area;
        // echo "<br>";
        // echo "id_partner_name_area >> " . $id_partner_name_area;
        // echo "<br>";
        // exit();
        
        // ชื่อ อย่างเดียว
        if ( !empty($select_name) and empty($select_time_1) and empty($select_date) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
            ->where('user_id', $id_user_check_in)
            ->latest()->paginate($perPage);
                
        }
        // วันที่ อย่างเดียว
        else if ( !empty($select_date) and empty($select_time_1) and empty($select_name) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->whereDate('created_at', $select_date)
                ->latest()->paginate($perPage);
        }
        // วันที่ และ ชื่อ.
        else if ( !empty($select_date) and !empty($select_name) and empty($select_time_1) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->where('user_id',$id_user_check_in)
                ->whereDate('created_at', $select_date)
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา
        else if ( !empty($select_date) and !empty($select_time_1) and empty($select_name) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา และ ชื่อ
        else if ( !empty($select_date) and !empty($select_time_1) and !empty($select_name) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->where('user_id', $id_user_check_in)
                ->latest()->paginate($perPage);
        }
        // ว่าง
        else {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")->latest()->paginate($perPage);
        }

        // ส่งค่าไปใช้งานฝนหน้า blade

        $data_name_area_all = Partner::where('name' , $name_partner)
            ->where('name_area' , '!=' , null)
            ->orderBy('name_area' , 'ASC')
            ->get();

        $diseases = Disease::where('status' , 'show')->orderBy('name' , 'ASC')->get();

        return view('check_in.index', compact('check_in','check_in_at','diseases','id_partner_name_area','text_name_area','data_name_area_all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $date_now = date("Y/m/d H:i:s");
        $location =  $request->get('location');

        $data_partner = Partner::where('id' , $location)->get();

        $real_name = Auth::user()->profile->real_name;
        $phone_user = Auth::user()->profile->phone;

        return view('check_in.create', compact('location', 'date_now' , 'data_partner','real_name','phone_user'));
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

        if ($requestData['check_in_out'] == "check_in") {
            $requestData['time_out'] = null ;
        }else if($requestData['check_in_out'] == "check_out"){
            $requestData['time_in'] = null ;
        }

        $data_partner = Partner::where('id' , $requestData['check_in_at'])->first();
        $partner_partner = Partner::where('name' , $data_partner->name)->where('name_area' ,null)->first();
        $requestData['partner_id'] = $requestData['check_in_at'] ;
        $requestData['check_in_at'] = $requestData['check_in_at'] . "(" . $partner_partner->name . " " . $partner_partner->id . ")" ;
        
        Check_in::create($requestData);

        // update check_in id user to partner
        if (!empty($requestData['time_in'])) {
            $data_date_time = $requestData['time_in'] ;
        }else{
            $data_date_time = $requestData['time_out'] ;
        }

        $arr_data_user_check_in = array();
        $arr_data_user_check_in['user_id'] = $requestData['user_id'];
        $arr_data_user_check_in['type_check'] = $requestData['check_in_out'];
        $arr_data_user_check_in['date_time'] = $data_date_time ;

        $user_check_in = $data_partner->user_check_in ;

        if (empty($user_check_in)) {
            $arr_user_check_in[] = $arr_data_user_check_in; 
        }else{
            $arr_user_check_in = json_decode($user_check_in) ;
            array_push($arr_user_check_in , $arr_data_user_check_in) ;

        }

        DB::table('partners')
            ->where('id', $requestData['partner_id'])
            ->update([
                'user_check_in' => $arr_user_check_in,
        ]);
        // end update check_in id user to partner


        $data_user = Profile::where('id' , $requestData['user_id'])->get();
        $check_in_at_re = explode("(",$requestData['check_in_at']) ;
        $id_check_in_at = $check_in_at_re[0];

        foreach ($data_user as $user) {
            if (empty($user->check_in_at)) {
                $check_in_all = array($id_check_in_at) ;
            }else{
                $check_in_all = json_decode($user->check_in_at) ;
                if (in_array($id_check_in_at , $check_in_all)){
                    $check_in_all = $check_in_all ;
                }
                else{   
                    array_push($check_in_all , $id_check_in_at) ;
                }
            }
        }

        DB::table('profiles')
            ->where('id', $requestData['user_id'])
            ->update([
                'check_in_at' => $check_in_all,
        ]);

        if (!empty($requestData['time_in'])) {
            $time = $requestData['time_in'] ;
            $type = "CHECK IN" ;
        }

        if (!empty($requestData['time_out'])) {
            $time = $requestData['time_out'] ;
            $type = "CHECK OUT" ;
        }
        // เบอร์
        if(!empty($requestData['phone_user'])){
            DB::table('profiles')
              ->where('id', $requestData['user_id'])
              ->update([
                'phone' => $requestData['phone_user'],
            ]);
        }
        //ชื่อจริง
        if(!empty($requestData['real_name'])){
            DB::table('profiles')
              ->where('id', $requestData['user_id'])
              ->update([
                'real_name' => $requestData['real_name'],
            ]);
        }
        $data_in_out = check_in::where('user_id', $requestData['user_id'])
            ->where('check_in_at', $requestData['check_in_at'])
            ->latest()
            ->take(3)
            ->get();   

        $check_in_at = $requestData['input_name_partner'] ;
        $partner = Partner::where('show_homepage' , "show")->get();

        $time = str_replace("T"," ",$time);


        // return redirect('check_in')->with('flash_message', 'Check_in added!');
        return view('check_in.check_in_finish', compact('time','type','data_in_out','check_in_at','partner'));

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
        $check_in = Check_in::findOrFail($id);

        return view('check_in.show', compact('check_in'));
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
        $check_in = Check_in::findOrFail($id);

        return view('check_in.edit', compact('check_in'));
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
        
        $check_in = Check_in::findOrFail($id);
        $check_in->update($requestData);

        return redirect('check_in')->with('flash_message', 'Check_in updated!');
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
        Check_in::destroy($id);

        return redirect('check_in')->with('flash_message', 'Check_in deleted!');
    }

    public function welcome_check_in_line(Request $request)
    {
        $location = $request->get('location');

        if(Auth::check()){
            return redirect('check_in/create?location=' . $location);
        }else{
            return redirect('/login/line?redirectTo=check_in/create?location=' . $location);
        }
    }

    function add_new_check_in(Request $request){
        

        $data_user = Auth::user();
        $data_partners = Partner::where("id", $data_user->partner)->first();
            
        // foreach ($data_partners as $key) {
        //     $logo_partner = $key->logo ;
        // }

        return view('check_in.add_new_check_in', compact('data_partners'));

    }

    function gallery(Request $request){
        
        $data_user = Auth::user();
        $data_partners = Partner::where("id", $data_user->partner)->first();
        $name_partner = $data_partners->name ;

        $all_areas = Partner::where("name", $name_partner)->get();

        return view('check_in.gallery', compact('all_areas'));

    }

    function create_new_area_check_in($name_partner , $name_new_check_in){

        $name_partner = str_replace("_" , " " , $name_partner);
        $name_new_check_in = str_replace("_" , " " , $name_new_check_in);

        $data_partners = Partner::where("name", $name_partner)->where('name_area' , null)->first();

        // สร้างพาร์ทเนอร์ย่อย
        $requestData['name'] = $name_partner ;
        $requestData['phone'] = $data_partners->phone ;
        $requestData['name_area'] = $name_new_check_in ;
        $requestData['logo'] = $data_partners->logo ;

        Partner::firstOrCreate($requestData);

        $data_partner_last = Partner::where("name", $name_partner)->latest()->first();
        $id = $data_partner_last->id;

        return $id;

    }

}
