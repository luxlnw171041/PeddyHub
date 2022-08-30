<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $id = Auth::id();
        $data = User::findOrFail($id);
        $petuser = Pet::where('user_id', $id)->get();

        return view('user/profile',compact('data' ,'petuser') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $requestData = $request->all();

        // if ($request->hasFile('photo')) {
        //     $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

        //     $img_avatar = Image::make(storage_path("app/public")."/".$requestData['photo']);

        //     $size_avatar = $img_avatar->filesize();  

        //     if($size_avatar > 512000 ){
        //         $img_avatar->resize(
        //             intval($img_avatar->width()/2) , 
        //             intval($img_avatar->height()/2)
        //         )->save(); 
        //     }

        // }

        // $data = User::findOrFail($id);
        // $data->update($requestData);
        // return redirect('profile')->with('flash_message', 'Product added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('user/profile' , compact('data') );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $login = $request->get('login');

        if (Auth::id() == $id )
        {
             $data = User::findOrFail($id);
             $changwat = $data->profile->changwat_th;
            return view('user/edit', compact('data','login','changwat'));
            
        }
        else
            return view('errors/404');

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $requestData = $request->all();
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public'); 
        }
        
        $data = User::findOrFail($id);
        $data->update($requestData);
        
        return redirect()->back()->with('flash_message', 'profile updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function user_pet($id)
    {
        $petuser = Pet::where('id', $id)->get();
        $now = Carbon::now();
        


        foreach ($petuser as $key ) {
            $user_id = $key->user_id ; 
            $birth = Carbon::parse($key->birth);

        }
        $user = User::where('id', $user_id)->get();
        $birth_month = $birth->diffInMonths($now)% 12;
        $birth_year = $birth->diffInYears($now);
        $birth_day = $birth->diffInDays($now);

        return view('user/user_pet',compact('petuser' ,'user' ,'birth_month' ,'birth_year','birth_day','now') );

    }

    public function user_pet_checklist($pet_id)
    {
        $user = Auth::user();

        $data_pet = Pet::where('id' , $pet_id)->first();
        $data_user = User::where('id' , $data_pet->user_id)->first();

        if ($user->id == $data_user->id or $user->role == "admin-partner" or $user->role == "partner")
        {
            $petuser = Pet::where('id', $pet_id)->get();
            $now = Carbon::now();
            
            foreach ($petuser as $key ) {
                $user_id = $key->user_id ; 
                $birth = Carbon::parse($key->birth);

            }
            $user = User::where('id', $user_id)->get();
            $birth_month = $birth->diffInMonths($now)% 12;
            $birth_year = $birth->diffInYears($now);
            $birth_day = $birth->diffInDays($now);
        //      echo "<pre>";
        // print_r($birth_day);
        // print_r($birth_month);
        // print_r($birth_year);

        // echo "</pre>";
        // exit();
            return view('user/user_pet_checklist',compact('petuser' ,'user' ,'birth_month' ,'birth_year','birth_day','now') );
            
        }else{
            return view('errors/404');
        }

    }

    public function view_qr_code_checklist(Request $request , $pet_id)
    {
        if(Auth::check()){
            return redirect('user_pet_checklist/' . $pet_id);
        }else{
            return redirect('login/line?redirectTo=user_pet_checklist/' . $pet_id);
        }
    }
}
