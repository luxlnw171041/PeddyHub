<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Hospital_near;
use Illuminate\Http\Request;

class Hospital_nearController extends Controller
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
            $hospital_near = Hospital_near::where('name', 'LIKE', "%$keyword%")
                ->orWhere('lat', 'LIKE', "%$keyword%")
                ->orWhere('lng', 'LIKE', "%$keyword%")
                ->orWhere('photo_1', 'LIKE', "%$keyword%")
                ->orWhere('photo_2', 'LIKE', "%$keyword%")
                ->orWhere('photo_3', 'LIKE', "%$keyword%")
                ->orWhere('photo_4', 'LIKE', "%$keyword%")
                ->orWhere('photo_5', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('business_hours', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $hospital_near = Hospital_near::latest()->paginate($perPage);
        }

        return view('hospital_near.index', compact('hospital_near'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('hospital_near.create');
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
                if ($request->hasFile('photo_1')) {
            $requestData['photo_1'] = $request->file('photo_1')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $requestData['photo_2'] = $request->file('photo_2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_3')) {
            $requestData['photo_3'] = $request->file('photo_3')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_4')) {
            $requestData['photo_4'] = $request->file('photo_4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_5')) {
            $requestData['photo_5'] = $request->file('photo_5')
                ->store('uploads', 'public');
        }

        Hospital_near::create($requestData);

        return redirect('hospital_near')->with('flash_message', 'Hospital_near added!');
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
        $hospital_near = Hospital_near::findOrFail($id);

        return view('hospital_near.show', compact('hospital_near'));
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
        $hospital_near = Hospital_near::findOrFail($id);

        return view('hospital_near.edit', compact('hospital_near'));
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
                if ($request->hasFile('photo_1')) {
            $requestData['photo_1'] = $request->file('photo_1')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $requestData['photo_2'] = $request->file('photo_2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_3')) {
            $requestData['photo_3'] = $request->file('photo_3')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_4')) {
            $requestData['photo_4'] = $request->file('photo_4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_5')) {
            $requestData['photo_5'] = $request->file('photo_5')
                ->store('uploads', 'public');
        }

        $hospital_near = Hospital_near::findOrFail($id);
        $hospital_near->update($requestData);

        return redirect('hospital_near')->with('flash_message', 'Hospital_near updated!');
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
        Hospital_near::destroy($id);

        return redirect('hospital_near')->with('flash_message', 'Hospital_near deleted!');
    }
}
