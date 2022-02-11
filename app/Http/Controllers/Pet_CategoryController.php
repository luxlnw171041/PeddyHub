<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pet_Category;
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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pet_category = Pet_Category::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pet_category = Pet_Category::latest()->paginate($perPage);
        }

        return view('pet_-category.index', compact('pet_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pet_-category.create');
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

        return redirect('pet_-category')->with('flash_message', 'Pet_Category added!');
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

        return view('pet_-category.show', compact('pet_category'));
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

        return view('pet_-category.edit', compact('pet_category'));
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

        return redirect('pet_-category')->with('flash_message', 'Pet_Category updated!');
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

        return redirect('pet_-category')->with('flash_message', 'Pet_Category deleted!');
    }
}
