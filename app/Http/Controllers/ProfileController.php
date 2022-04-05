<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
            $profile = Profile::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('birth', 'LIKE', "%$keyword%")
                ->orWhere('sex', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('language', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $profile = Profile::latest()->paginate($perPage);
        }

        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('profile.create');
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
        
        Profile::create($requestData);

        return redirect('profile')->with('flash_message', 'Profile added!');
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
        $profile = Profile::findOrFail($id);

        return view('profile.show', compact('profile'));
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
        $profile = Profile::findOrFail($id);

        return view('profile.edit', compact('profile'));
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
                ->store('storage/uploads', 'public'); 
        }
      
        $profile = Profile::findOrFail($id);
        $profile->update($requestData);

        if(!empty($requestData['login'])){
            return Redirect("https://lin.ee/Bvi9Zr9");
        }
        else{
            return redirect('user')->with('flash_message', 'Profile updated!');
        }
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
        Profile::destroy($id);

        return redirect('profile')->with('flash_message', 'Profile deleted!');
    }

    public function profile_edit_line()
    {
        $id = Auth::id();

        if(Auth::check()){
            return redirect('user/'.$id.'/edit');
        }else{
            return redirect('/login/line?redirectTo=login_line_profile2');
        }
    }

    public function profile_edit_line2()
    {
        $id = Auth::id();

        return redirect('/login/line?redirectTo=user/'.$id.'/edit');
      
    }
}
