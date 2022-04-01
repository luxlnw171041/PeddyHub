<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\Pet_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {   
        $user = Auth::user();
        $keyword = $request->get('search');
        $perPage = 25;



        if (!empty($keyword)) {
            $pet = Pet::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('birth', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pet = Pet::where('user_id', $user->id)
            ->latest()->paginate($perPage);
        }

        return view('pet.index', compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = Pet_Category::all(['id', 'name']);

        $user = Auth::user();
        return view('pet.create' , compact('category'));
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

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
            ->store('uploads', 'public');
        }
        $requestData['user_id'] = Auth::id(); 

        if (!empty($requestData['select_province'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'changwat_th' => $requestData['select_province'],
                    'amphoe_th' => $requestData['select_amphoe'],
                    'tambon_th' => $requestData['select_tambon'],
                    'phone' => $requestData['phone_user']
                ]);
        }  

        
        
        Pet::create($requestData)->update([
            'pet_category_id' => $requestData['pet_category_id'],
            'sub_category' => $requestData['sub_category'],
        ]);
        return redirect('user')->with('flash_message', 'Pet added!');
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
        $pet = Pet::findOrFail($id);

        return view('pet.show', compact('pet'));
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
        $user_id = Auth::id();
        $check_user = Pet::where('user_id',$user_id )->where('id',$id )->get();
        $category = Pet_Category::all(['id', 'name']);

        foreach ($check_user as $key ) {
            $user = $key->id ;
        }
        if (empty($user)) {

            return view('/errors/404');

       }else{
            $pet = Pet::findOrFail($id);
            return view('pet.edit', compact('pet' ,'category'));
       }
        
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
        $requestData['user_id'] = Auth::id();
        $pet = Pet::findOrFail($id);
        $pet->update($requestData);

        return redirect('user')->with('flash_message', 'Pet updated!');
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
        Pet::destroy($id);

        return redirect('pet')->with('flash_message', 'Pet deleted!');
    }

    public function welcome_line()
    {
        if(Auth::check()){
            return redirect('pet/create');
        }else{
            return redirect('/login/line?redirectTo=pet/create');
        }
    }

    public function welcome_line_pet()
    {
        if(Auth::check()){
            return redirect('user');
        }else{
            return redirect('/login/line?redirectTo=user');
        }
    }

    public function welcome_line_Hospital_near()
    {
        if(Auth::check()){
            return redirect('/hospital_near');
        }else{
            return redirect('/login/line?redirectTo=hospital_near');
        }
    }
}
