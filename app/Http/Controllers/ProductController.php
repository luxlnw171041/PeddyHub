<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Pet_Category;
use App\Models\Product;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProductController extends Controller
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
        $requestData = $request->all();
        $category  = $request->get('pet_category_id');
        $type  = $request->get('type');
        
        $needFilter =  !empty($type) || !empty($category);
        
        $count_order = OrderProduct::whereNull('order_id')
        ->where('user_id', Auth::id())->get()->count();

// echo "<pre>";
//         print_r($count_order);
//         echo "</pre>";
//         exit();
        if (!empty($needFilter)) {
            $product = Product::where('type',    'LIKE', '%' .$type.'%')
            ->Where('pet_category_id',    'LIKE', '%' .$category.'%')
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('product.index', compact('product','count_order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = Pet_Category::groupBy('name')->get();

        return view('product.create', compact('category'));
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
        

        $requestData['partner_id'] = Auth::user()->partner;

        Product::create($requestData);
        if (Auth::user()->role == 'admin-partner') {
            return redirect('product_admin')->with('flash_message', 'Product deleted!');
        }
        return redirect('product')->with('flash_message', 'Product added!');
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
        $product = Product::findOrFail($id);
        $data_product = product::inRandomOrder()->limit(15)->get();
        return view('product.show', compact('product','data_product'));
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
        $product = Product::findOrFail($id);

        if ( $product->partner_id != Auth::User()->partner ) {
            return redirect('/404');
        }else{

            $category = Pet_Category::groupBy('name')->get();
            return view('partner_admin.edit_product_admin', compact('product','category'));
        }

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

        $product = Product::findOrFail($id);
        $product->update($requestData);

        return redirect('product_admin')->with('flash_message', 'Product updated!');
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
        Product::destroy($id);

        return redirect('product_admin')->with('flash_message', 'Product deleted!');
    }

    public function product_category(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $data_manoon = product::where('promotion', "manoon" )->inRandomOrder()->limit(10)->get();
        $data_promotion = product::where('promotion', "โปรโมชั่น" )->inRandomOrder()->limit(10)->get();
        $data_new = product::where('promotion', "ใหม่" )->inRandomOrder()->limit(10)->get();

        // echo "<pre>";
//         print_r($data_promotion);
//         echo "</pre>";
//         exit();

        if (!empty($keyword)) {
            $product = Product::where('title', 'LIKE', "%$keyword%")
                ->orWhere('price', 'LIKE', "%$keyword%")
                ->orWhere('price2', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('pet_category_id', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('promotion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('product.product_category', compact('product','data_promotion','data_new','data_manoon'));
    }
    public function product_admin(Request $request)
    {
        $category = Pet_Category::groupBy('name')->get();

        $keyword = $request->get('search');
        $perPage = 25;
        $user = Auth::user();
        $product_admin = Product::where('partner_id', $user->partner)
        ->orderBy('created_at', 'DESC')->get();

        if (!empty($keyword)) {
            $product_admin = Product::where('partner_id', $user->partner)
                ->where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $product = Product::latest()->paginate($perPage);
        }

        return view('partner_admin.product_admin',compact('product_admin','category'));
    }
}
