<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use Illuminate\Support\Facades\DB;
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
        $latlng = $request->get('latlng');

        echo $latlng ;
        $perPage = 3;
        $hospital_near = "";

        $hospital_recommend = Hospital_near::where('recommend', "Yes")->where('type','hospital')->inRandomOrder()->limit(5)->get();

        $hospital_recommend_no1 = Hospital_near::where('recommend', "Yes_01")->where('type','hospital')->inRandomOrder()->limit(1)->get();
       
        // DB::table('hospital_nears')
        //     ->update([
        //         'type' => 'hospital',
        // ]);

        return view('hospital_near.index', compact('hospital_near','hospital_recommend','hospital_recommend_no1'));
    }

    public function pet_land_index(Request $request)
    {
        $latlng = $request->get('latlng');

        echo $latlng ;
        $perPage = 3;
        $hospital_near = "";

        $hospital_recommend = Hospital_near::where('recommend', "Yes")->where('type','petland')->inRandomOrder()->limit(5)->get();

        // DB::table('hospital_nears')
        //     ->update([
        //         'type' => 'hospital',
        // ]);

        return view('hospital_near.pet_land_index', compact('hospital_near','hospital_recommend'));
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
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
                if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
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


    // hospital
    public function search_my_location($latlng , $text_distance)
    {
        $lat_lung_sp = explode(",",$latlng);
        $lat = $lat_lung_sp[0];
        $lng = $lat_lung_sp[1];

        $hos_near = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM hospital_nears WHERE recommend IS NULL AND type LIKE 'hospital' HAVING distance < $text_distance ORDER BY distance ", []);

        return $hos_near;
    }

    public function search_my_location_recommend($latlng , $text_distance)
    {
        $lat_lung_sp = explode(",",$latlng);
        $lat = $lat_lung_sp[0];
        $lng = $lat_lung_sp[1];

        $hos_near_recommend = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM hospital_nears WHERE recommend LIKE 'Yes' AND type LIKE 'hospital' HAVING distance < 20 ORDER BY distance LIMIT 0 ,2", []);

        return $hos_near_recommend;
    }

    public function search_location_by_T_recommend($input_province , $input_amphoe , $input_tambon)
    {
        $input_province = str_replace('จ.' , '' , $input_province);
        $input_amphoe = str_replace('อ.' , '' , $input_amphoe);
        $input_tambon = str_replace('ต.' , '' , $input_tambon);

        $input_amphoe = str_replace('เขต' , '' , $input_amphoe);
        $input_tambon = str_replace('แขวง' , '' , $input_tambon);

        $hos_near = Hospital_near::where('recommend', "Yes")
            ->where('type' , 'hospital')
            ->where('tambon_th' , 'LIKE', "%$input_tambon%" )
            ->where('amphoe_th' , 'LIKE', "%$input_amphoe%" )
            ->where('changwat_th' , 'LIKE', "%$input_province%" )
            ->get();

        return $hos_near;
    }

    public function search_location_by_T($input_province , $input_amphoe , $input_tambon)
    {
        $input_province = str_replace('จ.' , '' , $input_province);
        $input_amphoe = str_replace('อ.' , '' , $input_amphoe);
        $input_tambon = str_replace('ต.' , '' , $input_tambon);

        $input_amphoe = str_replace('เขต' , '' , $input_amphoe);
        $input_tambon = str_replace('แขวง' , '' , $input_tambon);

        $hos_near = Hospital_near::where('recommend' , null)
            ->where('type' , 'hospital')
            ->where('tambon_th' , 'LIKE', "%$input_tambon%" )
            ->where('amphoe_th' , 'LIKE', "%$input_amphoe%" )
            ->where('changwat_th' , 'LIKE', "%$input_province%" )
            ->get();

        return $hos_near;
    }

    // PET LAND
    public function search_my_location_petland($latlng , $text_distance)
    {
        $lat_lung_sp = explode(",",$latlng);
        $lat = $lat_lung_sp[0];
        $lng = $lat_lung_sp[1];

        $hos_near = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM hospital_nears WHERE recommend IS NULL AND type LIKE 'petland' HAVING distance < $text_distance ORDER BY distance ", []);

        return $hos_near;
    }

    public function search_my_location_recommend_petland($latlng , $text_distance)
    {
        $lat_lung_sp = explode(",",$latlng);
        $lat = $lat_lung_sp[0];
        $lng = $lat_lung_sp[1];

        $hos_near_recommend = DB::select("SELECT *,( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM hospital_nears WHERE recommend LIKE 'Yes' AND type LIKE 'petland' HAVING distance < 20 ORDER BY distance LIMIT 0 ,2", []);

        return $hos_near_recommend;
    }

    public function search_location_by_T_recommend_petland($input_province , $input_amphoe , $input_tambon)
    {
        $input_province = str_replace('จ.' , '' , $input_province);
        $input_amphoe = str_replace('อ.' , '' , $input_amphoe);
        $input_tambon = str_replace('ต.' , '' , $input_tambon);

        $input_amphoe = str_replace('เขต' , '' , $input_amphoe);
        $input_tambon = str_replace('แขวง' , '' , $input_tambon);

        $hos_near = Hospital_near::where('recommend', "Yes")
            ->where('type' , 'petland')
            ->where('tambon_th' , 'LIKE', "%$input_tambon%" )
            ->where('amphoe_th' , 'LIKE', "%$input_amphoe%" )
            ->where('changwat_th' , 'LIKE', "%$input_province%" )
            ->get();

        return $hos_near;
    }

    public function search_location_by_T_petland($input_province , $input_amphoe , $input_tambon)
    {
        $input_province = str_replace('จ.' , '' , $input_province);
        $input_amphoe = str_replace('อ.' , '' , $input_amphoe);
        $input_tambon = str_replace('ต.' , '' , $input_tambon);

        $input_amphoe = str_replace('เขต' , '' , $input_amphoe);
        $input_tambon = str_replace('แขวง' , '' , $input_tambon);

        $hos_near = Hospital_near::where('recommend' , null)
            ->where('type' , 'petland')
            ->where('tambon_th' , 'LIKE', "%$input_tambon%" )
            ->where('amphoe_th' , 'LIKE', "%$input_amphoe%" )
            ->where('changwat_th' , 'LIKE', "%$input_province%" )
            ->get();

        return $hos_near;
    }

}
