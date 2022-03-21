<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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
        $date_delete_15 = strtotime("-15 days");
        $date_15 = date("Y-m-d" , $date_delete_15);
            
        return view('lost_pet.my_post', compact('my_post' , 'date_15'));

    }

}
