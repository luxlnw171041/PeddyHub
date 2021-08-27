<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
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
        return view('pet.create');
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
        Pet::create($requestData);
        return redirect('pet')->with('flash_message', 'Pet added!');
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
        $user = Auth::user();
        $requestData['user_id'] = Auth::id();
        $pet = Pet::findOrFail($id);

        return view('pet.edit', compact('pet'));
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

        return redirect('pet')->with('flash_message', 'Pet updated!');
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
            return redirect('pet');
        }else{
            return redirect('/login/line?redirectTo=pet');
        }
    }
}
