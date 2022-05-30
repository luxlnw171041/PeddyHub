<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\User;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $data = Auth::user();
        
        $orderproduct = OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )
            ->latest()->paginate($perPage);

        return view('order-product.index', compact('orderproduct','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order-product.create');
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
        $requestData['total'] = $requestData['quantity'] * $requestData['price'];
        $requestData['total_cost'] = $requestData['quantity'] * $requestData['cost'];
        $requestData['user_id'] = Auth::id();
        OrderProduct::create($requestData);

        return redirect('order-product')->with('flash_message', 'OrderProduct added!');
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
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.show', compact('orderproduct'));
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
        $data = User::findOrFail($id);
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.edit', compact('orderproduct'));
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
        
        $orderproduct = OrderProduct::findOrFail($id);
        $orderproduct->update($requestData);
        // echo "<pre>";
        // print_r($requestData);
        // echo "</pre>";
        // exit();
        if (Auth::user()->role == 'admin-partner') {
            return redirect('order_admin')->with('flash_message', 'Product deleted!');
        }
        return redirect('order-product')->with('flash_message', 'OrderProduct updated!');
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
        OrderProduct::destroy($id);

        return redirect('order-product')->with('flash_message', 'OrderProduct deleted!');
    }
}
