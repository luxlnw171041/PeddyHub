<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as Image;

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
        return view('user/profile',compact('data') );
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
    public function edit($id)
    {
        if (Auth::id() == $id )
        {
            $data = User::findOrFail($id);
            return view('user/edit', compact('data'));
            
        }else
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
                ->store('storage/uploads', 'public'); 
        }
        

        $data = User::findOrFail($id);
        $data->update($requestData);
        
        return redirect('user')->with('flash_message', 'profile updated!');
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
 
}
