<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;
use App\Models\Check_in;

use App\Models\OrderProduct;

use App\Models\Partner;
use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\Time_zone;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $partner = Partner::where('name_area', null)
                ->where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('district', 'LIKE', "%$keyword%")
                ->orWhere('sub_district', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner = Partner::where('name_area', null)->latest()->paginate($perPage);
        }

        return view('partner.index', compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('partner.create');
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

        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')->store('uploads', 'public');
        }

        if ($request->hasFile('qr_cond_line')) {
            $requestData['qr_cond_line'] = $request->file('qr_cond_line')->store('uploads', 'public');
        }

        $requestData['class_color_menu'] = "other";
        Partner::create($requestData);

        return redirect('partner')->with('flash_message', 'Partner added!');
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
        $partner = Partner::findOrFail($id);

        return view('partner.show', compact('partner'));
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
        $partner = Partner::findOrFail($id);

        return view('partner.edit', compact('partner'));
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

        if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')->store('uploads', 'public');
        }
        
        if ($request->hasFile('qr_cond_line')) {
            $requestData['qr_cond_line'] = $request->file('qr_cond_line')->store('uploads', 'public');
        }

        $partner = Partner::findOrFail($id);
        $partner->update($requestData);

        return redirect('partner')->with('flash_message', 'Partner updated!');
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
        Partner::destroy($id);

        return redirect('partner')->with('flash_message', 'Partner deleted!');
    }
    public function manage_user(Request $request)
    {
        $data_user = Auth::user();
 
        $data_partners = Partner::where("id", $data_user->partner)
            ->where("name_area", null)
            ->get();

        foreach ($data_partners as $data_partner) {
            $name_partner = $data_partner->id ;
        }
// echo "<pre>";
//         print_r($name_partner);
//         echo "<pre>";
//         exit;
        $keyword = $request->get('search');
        $perPage = 25;
       
        if (!empty($keyword)) {
            $all_user = User::Where('username', 'LIKE', "%$keyword%")
                ->Where('partner', $name_partner)
                ->latest()->paginate($perPage);
        } else {
            $all_user = User::Where('partner', $name_partner)
                ->latest()->paginate($perPage);
        }

        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();


        return view('partner_admin.user.manage_user', compact('data_partners','all_user','data_time_zone'));
    }

    
    public function create_user_partner(Request $request)
    {
        $requestData = $request->all();
       
        $type_user = $request->get('type_user');
        $data_user = Auth::user();

        $data_partners = Partner::where("id", $data_user->partner)
        ->where("name_area", null)
        ->get();
        foreach ($data_partners as $data_partner) {
            $partners = $data_partner->name ;
        }

        $name = uniqid($partners.'-');
        $username = $name ;
        $type = "web" ;

        $password = uniqid();
        $provider_id = uniqid($partners.'-', true);

        $user = new User();
        $user->username = $name;
        $user->provider_id = $provider_id;
        $user->password = Hash::make($password);
        $user->email = "กรุณาเพิ่มอีเมล";
        $user->role = $type_user;
        $user->partner = $data_user->partner;
        $user->creator = $data_user->id;
        $user->status = "active";
        $user->save();

        $profile = new Profile();
        $profile->name = $name;
        $profile->user_id = $user->id;
        $profile->type = $type;
        $profile->save();



        $data_time_zone = Time_zone::groupBy('TimeZone')->orderBy('CountryCode' , 'ASC')->get();

        return view('partner_admin.user.create_user_partner', compact('data_partners' , 'partners' , 'username' , 'password','data_time_zone'));
    }

    public function dashboard_partner(Request $request)
    {
        $data_user = Auth::user();
      

        $date_now = date("Y-m-d");
        $day28 = strtotime("-28 Day");
        $date_28 = date("Y-m-d" , $day28);

        // all order
        $count_order = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereBetween('order_products.status' , ["completed", "created"])
        ->groupByRaw('order_id')
        ->get()->count();
        // ----------------------------------------------all----------------------------------------------
        // all product
        $count_product = Product::where('partner_id', $data_user->partner)->get()->count();

        //customer
        $count_customer = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereBetween('order_products.status' , ["completed", "created"])
        ->groupBy("user_id")
        ->get('user_id')
        ->count();
        
        //revenue
        $revenue =OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->where('order_products.status' , "completed")
        ->get()->sum("total");
        $completed ="completed";
        $created = "created";

        // ---------------------------------------------to day --------------------------------------
        // order today
        $order_today = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereDate('order_products.updated_at' , $date_now)
        ->whereBetween('order_products.status' , [$completed, $created])
        ->groupBy('order_id')
        ->get()->count();

        //customer today
        $customer_today = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereDate('order_products.updated_at' , $date_now)
        ->whereBetween('order_products.status' , ['completed', 'created'])
        ->groupBy('user_id')->get()->count();

        //revenue_today
        $revenue_today = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereDate('order_products.updated_at' , $date_now)
        ->where('order_products.status' , "completed")
        ->get()->sum("total");
        
        // -----------------------------------------28 day-----------------------------------------
        //order_28 day
        $order_28 = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereBetween('order_products.status' , [$completed, $created])      
        ->whereDate('order_products.updated_at',">=", $date_28)
        ->groupBy('order_id')
        ->get()
        ->count();

        //customer_28 day
        $customer_28 = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereBetween('order_products.status' , [$completed, $created])      
        ->whereDate('order_products.updated_at',">=", $date_28)
        ->groupBy('user_id')
        ->get()
        ->count();

        //revenue_28 day
        $revenue_28 = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereDate('order_products.updated_at',">=", $date_28)
        ->where('order_products.status' , "completed")
        ->get()->sum("total");


        //top 6 selling
        $top_product = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
            ->where('products.partner_id',$data_user->partner)
            ->whereBetween('order_products.status' , [$completed, $created])  
            ->selectRaw('products.*, COALESCE(sum(order_products.total),0) total_price')
            ->selectRaw('products.*, COALESCE(sum(order_products.quantity),0) total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(10)
            ->get();
        
        //
        //customer
        $customer = OrderProduct::join('products', 'order_products.product_id', '=', 'products.id') 
        ->where('products.partner_id',$data_user->partner)
        ->whereBetween('order_products.status' , ["completed", "created"])
        ->groupBy("user_id")
        ->get();

        //check in
        $checkin = Check_in::join('partners', 'check_ins.partner_id', '=', 'partners.id') 
        ->where('check_ins.check_in_at', 'LIKE', "%$data_user->partner%")
        ->selectRaw('COALESCE(count(check_ins.check_in_at),0) count_checkin')
        ->selectRaw('COALESCE((partners.name_area),0) area_name')
        ->groupBy("partners.name_area")
        ->get();

        $checkin_today_count = Check_in::join('partners', 'check_ins.partner_id', '=', 'partners.id') 
        ->where('check_ins.check_in_at', 'LIKE', "%$data_user->partner%")
        ->whereDate('check_ins.created_at' , $date_now)
        ->get()->count();

        $checkin_today = Check_in::join('partners', 'check_ins.partner_id', '=', 'partners.id') 
        ->whereDate('check_ins.created_at' , $date_now)
        ->where('check_ins.check_in_at', 'LIKE', "%$data_user->partner%")
        ->selectRaw('COALESCE(count(check_ins.check_in_at),0) count_checkin')
        ->selectRaw('COALESCE((partners.name_area),0) area_name')
        ->groupBy("partners.name_area")
        ->orderBy('count_checkin','desc')
        ->get();
          $count_checkin = $checkin->pluck('count_checkin');
            $area_name = $checkin->pluck('area_name');
          
            
   

        return view('partner_admin.dashboard_partner'  ,compact('checkin_today','checkin_today_count','area_name','count_checkin','checkin','customer','top_product','revenue_28','customer_28','order_28','count_product' ,'count_order' ,'count_customer' ,'revenue','order_today','customer_today','revenue_today'));
    }
}
