<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Like;
use App\Models\Blood_bank;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        //จำนวนสัตว์ทั้งหมด
        $data_blood = Blood_bank::where('user_id', 1)
            ->where('status', "Yes")
            ->get();
        //จำนวนสัตว์ทั้งหมด
        $data_count_pet = Blood_bank::where('user_id', 1)
            ->where('status', "Yes")
            ->groupBy('pet_id')
            ->get();

        $data_quantity_bloods = Blood_bank::where('user_id', 1)
            ->where('status', "Yes")
            ->selectRaw('sum(quantity) as count')
            ->get();

        $count_pet = count($data_count_pet);
        $count_blood = count($data_blood);
        foreach ($data_quantity_bloods as $data_quantity_blood) {
            $quantity_blood = $data_quantity_blood->count ;
        }

        echo $count_pet . " ตัว" ;
        echo "<br>";
        echo $count_blood . " ครั้ง" ;
        echo "<br>";
        echo $quantity_blood . " ml" ;

        echo "<pre>";
        print_r($data_count_pet);
        echo "<pre>";

        exit();

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $like = Like::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('post_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $like = Like::latest()->paginate($perPage);
        }

        return view('like.index', compact('like'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('post.index');
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
        
        Like::create($requestData);

        return redirect('post')->with('flash_message', 'Like added!');
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
        $like = Like::findOrFail($id);

        return view('like.show', compact('like'));
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
        $like = Like::findOrFail($id);

        return view('like.edit', compact('like'));
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
        
        $like = Like::findOrFail($id);
        $like->update($requestData);

        return redirect('like')->with('flash_message', 'Like updated!');
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
        Like::destroy($id);

        return redirect('post')->with('flash_message', 'Like deleted!');
    }
}
