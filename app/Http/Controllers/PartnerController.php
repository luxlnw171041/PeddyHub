<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

use App\Models\Partner;
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
            $partner = Partner::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('province', 'LIKE', "%$keyword%")
                ->orWhere('district', 'LIKE', "%$keyword%")
                ->orWhere('sub_district', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $partner = Partner::latest()->paginate($perPage);
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
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
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
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
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
}
