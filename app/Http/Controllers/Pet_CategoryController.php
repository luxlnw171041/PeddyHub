<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pet_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Pet_CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $user_id = 1 ;
        $data_user = DB::table('users')->where('id', $user_id)->get();

        foreach ($data_user as $item) {
                
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';

            $ip = $ipaddress; // your ip address here
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

            if($query && $query['status'] == 'success')
            {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                        'country' => $query['countryCode'],
                        'time_zone' => $query['timezone'],
                        'ip_address' => $query,
                ]);
            }
        }

        echo "<pre>" ;
        print_r($query);
        echo "<pre>" ;

        exit();
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pet_category = Pet_Category::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pet_category = Pet_Category::latest()->paginate($perPage);
        }

        return view('pet_category.index', compact('pet_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pet_category.create');
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
        
        Pet_Category::create($requestData);

        return redirect('pet_category')->with('flash_message', 'Pet_Category added!');
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
        $pet_category = Pet_Category::findOrFail($id);

        return view('pet_category.show', compact('pet_category'));
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
        $pet_category = Pet_Category::findOrFail($id);

        return view('pet_category.edit', compact('pet_category'));
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
        
        $pet_category = Pet_Category::findOrFail($id);
        $pet_category->update($requestData);

        return redirect('pet_category')->with('flash_message', 'Pet_Category updated!');
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
        Pet_Category::destroy($id);

        return redirect('pet_category')->with('flash_message', 'Pet_Category deleted!');
    }
}
