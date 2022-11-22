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
use \Carbon\Carbon;

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

        $data_user_check_in = Profile::where("real_name", "LIKE", "%$select_name%")->get();
        
        $id_user_check_in = "" ;

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
        
        // ชื่อ อย่างเดียว
        if ( !empty($select_name) and empty($select_time_1) and empty($select_date) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
            ->where('status', 'show')
            ->where('user_id', $id_user_check_in)
            ->orderBy('created_at' , 'DESC')
            ->latest()->paginate($perPage);
                
        }
        // วันที่ อย่างเดียว
        else if ( !empty($select_date) and empty($select_time_1) and empty($select_name) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->where('status', 'show')
                ->whereDate('created_at', $select_date)
                ->orderBy('created_at' , 'DESC')
                ->latest()->paginate($perPage);
        }
        // วันที่ และ ชื่อ.
        else if ( !empty($select_date) and !empty($select_name) and empty($select_time_1) ) {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->where('status', 'show')
                ->where('user_id',$id_user_check_in)
                ->whereDate('created_at', $select_date)
                ->orderBy('created_at' , 'DESC')
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา
        else if ( !empty($select_date) and !empty($select_time_1) and empty($select_name) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->where('status', 'show')
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->orderBy('created_at' , 'DESC')
                ->latest()->paginate($perPage);
        }
        // วันที่ และ เวลา และ ชื่อ
        else if ( !empty($select_date) and !empty($select_time_1) and !empty($select_name) ) {
            $date_and_time_1 =  $select_date . " " . $select_time_1 ;
            $date_and_time_1 = date("Y/m/d H:i" , strtotime($date_and_time_1));

            $date_and_time_2 =  $select_date . " " . $select_time_2 ;
            $date_and_time_2 = date("Y/m/d H:i" , strtotime($date_and_time_2));

            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
                ->where('status', 'show')
                ->whereBetween('created_at', [$date_and_time_1, $date_and_time_2])
                ->where('user_id', $id_user_check_in)
                ->orderBy('created_at' , 'DESC')
                ->latest()->paginate($perPage);
        }
        // ว่าง
        else {
            $check_in = Check_in::where('check_in_at', 'LIKE', "%$id_partner_name_area%")
            ->where('status', 'show')
            ->orderBy('created_at' , 'DESC')
            ->latest()->paginate($perPage);
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
        $requestData['status'] = 'show' ;

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

        // // update check_in id user to partner
        // if (!empty($requestData['time_in'])) {
        //     $data_date_time = $requestData['time_in'] ;
        // }else{
        //     $data_date_time = $requestData['time_out'] ;
        // }

        // $arr_data_user_check_in = array();
        // $arr_data_user_check_in['user_id'] = $requestData['user_id'];
        // $arr_data_user_check_in['type_check'] = $requestData['check_in_out'];
        // $arr_data_user_check_in['date_time'] = $data_date_time ;

        // $user_check_in = $data_partner->user_check_in ;

        // if (empty($user_check_in)) {
        //     $arr_user_check_in[] = $arr_data_user_check_in; 
        // }else{
        //     $arr_user_check_in = json_decode($user_check_in) ;
        //     array_push($arr_user_check_in , $arr_data_user_check_in) ;

        // }

        // DB::table('partners')
        //     ->where('id', $requestData['partner_id'])
        //     ->update([
        //         'user_check_in' => $arr_user_check_in,
        // ]);
        // // end update check_in id user to partner


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

    function admin_gallery(Request $request){
        
        // $data_user = Auth::user();

        $requestData = $request->all();
        $request_name_partner = $request->get('name_partner');
        $name_partner = null ;
        $all_areas = null ;

        $all_partners = Partner::where("name", '!=' , null)->groupBy('name')->orderBy('name', 'ASC')->get();

        if ($request_name_partner == "all") {

            $name_partner = 'ทั้งหมด' ;
            $all_areas = Partner::where("name", '!=' , null)->orderBy('name', 'ASC')->get();

        }else{

            $data_name_partner = Partner::where("id", $request_name_partner)->get();

            foreach ($data_name_partner as $item_1) {
                $name_partner = $item_1->name ;
            }

            $all_areas = Partner::where("name", $name_partner)->orderBy('name_area', 'ASC')->get();
        }

        return view('check_in.admin_gallery', compact('all_partners', 'all_areas','name_partner'));

    }

    function search_data_broadcast_by_check_in(Request $request){

        $requestData = $request->all();

        $arr_select_user = [] ;

        $partner_id = $requestData['partner_id'];

        $data_partners = Partner::where('id' , $partner_id)->first();
        $name_partner = $data_partners->name ;

        $id_name_area = $requestData['id_name_area'];

        $time_1 = $requestData['time_1'] ; // เช็คข้อมูลจากช่องนี้
        $time_2 = $requestData['time_2'] ;
        if ( !empty($time_1) && empty($time_2) ) {
            $time_2 = '23:59' ;
        }else{
            $time_2 = $time_2 ;
        }

        $select_day = $requestData['select_day'] ; // เช็คข้อมูลจากช่องนี้
        $amount_in_out = $requestData['amount_in_out'] ; // เช็คข้อมูลจากช่องนี้
        $amount_last_entry = $requestData['amount_last_entry'] ; // เช็คข้อมูลจากช่องนี้

        // data user
        $this_month = $requestData['this_month'] ; // เช็คข้อมูลจากช่องนี้
        $check_click_user = $requestData['check_click_user'] ; // เช็คข้อมูลจากช่องนี้
        $select_user_sex = $requestData['select_user_sex'] ;
        $select_user_age = $requestData['select_user_age'] ;
        $select_user_location = $requestData['select_user_location'] ;

        // พื้นที่ทั้งหมด
        if (empty($id_name_area)) {
            
            // ทุกอย่างว่างทั้งหมด
            if ( empty($time_1) && empty($select_day) && empty($amount_in_out) && empty($amount_last_entry) && empty($this_month) && empty($check_click_user) ) {

                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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

            // ช่วงเวลา
            if (!empty($time_1)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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
            }

            // วัน (จันทร์ - อาทิตย์)
            if (!empty($select_day)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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
            }

            // จำนวนการเข้าพื้นที่ มากกว่า .. ครั้ง
            if (!empty($amount_in_out)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->selectRaw('profiles.* , count(check_ins.user_id) as count' )
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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
            }

            // เข้า-ออก ล่าสุด .. วัน
            if (!empty($amount_last_entry)) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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
            }

            // ผู้ใช้ที่เกิดเดือนนี้
            if ($this_month) {
                $data_all_check_partner = "" ;
                $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                    ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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

                // ว่างหมด
                if ( empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ) {
                    $data_all_check_partner = [] ;
                }
                // กรอง 1
                else if( !empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('profiles.sex' , $select_user_sex)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }
                // กรอง 2 
                else if( !empty($select_user_sex) && !empty($select_user_age) && empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('profiles.sex' , $select_user_sex)
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->select('profiles.*')
                        ->get();
                }else if( !empty($select_user_sex) && empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->where('profiles.sex' , $select_user_sex)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }else if( empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
                        ->whereYear('profiles.birth' , "<=" , $age_range_1)
                        ->whereYear('profiles.birth' , ">=" , $age_range_2)
                        ->where('profiles.changwat_th' , $select_user_location)
                        ->select('profiles.*')
                        ->get();
                }
                // กรอง 3
                else if( !empty($select_user_sex) && !empty($select_user_age) && !empty($select_user_location) ){
                    $data_all_check_partner = Check_in::join('profiles', 'check_ins.user_id', '=', 'profiles.id')
                        ->where('check_ins.check_in_at', 'LIKE' , "%$name_partner%")
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
            }
                
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

                // ว่างหมด
                if ( empty($select_user_sex) && empty($select_user_age) && empty($select_user_location) ) {
                    $data_all_check_partner = [] ;
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
            }

        }
        
        return $arr_select_user ;

    }

}
