<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Time_zone;
use Illuminate\Http\Request;

class Time_zoneController extends Controller
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
            $time_zone = Time_zone::where('CountryCode', 'LIKE', "%$keyword%")
                ->orWhere('TimeZone', 'LIKE', "%$keyword%")
                ->orWhere('UTC', 'LIKE', "%$keyword%")
                ->orWhere('DST', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $time_zone = Time_zone::latest()->paginate($perPage);
        }

        return view('time_zone.index', compact('time_zone'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('time_zone.create');
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
        
        Time_zone::create($requestData);

        return redirect('time_zone')->with('flash_message', 'Time_zone added!');
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
        $time_zone = Time_zone::findOrFail($id);

        return view('time_zone.show', compact('time_zone'));
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
        $time_zone = Time_zone::findOrFail($id);

        return view('time_zone.edit', compact('time_zone'));
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
        
        $time_zone = Time_zone::findOrFail($id);
        $time_zone->update($requestData);

        return redirect('time_zone')->with('flash_message', 'Time_zone updated!');
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
        Time_zone::destroy($id);

        return redirect('time_zone')->with('flash_message', 'Time_zone deleted!');
    }
}
