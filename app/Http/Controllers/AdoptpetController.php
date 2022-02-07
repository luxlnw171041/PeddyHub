<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\Adoptpet;
use Illuminate\Http\Request;

class AdoptpetController extends Controller
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
            $adoptpet = Adoptpet::where('titel', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
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
        return view('adoptpet.create');
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
