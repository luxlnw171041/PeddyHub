<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\Adoptpet;
use App\Models\Pet_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdoptpetController extends Controller
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
            $adoptpet = Adoptpet::where('pet_category_id',    'LIKE', '%' .$category.'%')
                ->latest()->paginate($perPage);
        } else {
            $adoptpet = Adoptpet::latest()->paginate($perPage);
        }

        return view('adoptpet.index', compact('adoptpet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = Pet_Category::groupBy('name')->get();

        return view('adoptpet.create' , compact('category'));
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
        $requestData['user_id'] = Auth::id();   
 
        $requestData = $request->all();       
        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit;
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }
            if ($request->hasFile('photo2')) {
            $requestData['photo2'] = $request->file('photo2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo3')) {
            $requestData['photo3'] = $request->file('photo3')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        }
        if (!empty($requestData['phone_user'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'phone' => $requestData['phone_user'],
                ]);
        }  
        Adoptpet::create($requestData);

        return redirect('adoptpet')->with('flash_message', 'Adoptpet added!');
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
        $adoptpet = Adoptpet::findOrFail($id);

        return view('adoptpet.show', compact('adoptpet'));
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
        $adoptpet = Adoptpet::findOrFail($id);

        return view('adoptpet.edit', compact('adoptpet'));
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
        if (!empty($requestData['phone'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'phone' => $requestData['phone_user'],
                ]);
        } 
        $adoptpet = Adoptpet::findOrFail($id);
        $adoptpet->update($requestData);

        return redirect('adoptpet')->with('flash_message', 'Adoptpet updated!');
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
        Adoptpet::destroy($id);

        return redirect('adoptpet')->with('flash_message', 'Adoptpet deleted!');
    }
}
