<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Order;
use App\Models\User;

use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class OrderController extends Controller
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
        $user = Auth::user();
        $orderproduct = OrderProduct::where('user_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        
        switch(Auth::user()->role)
        {
            case "admin" : 
                $order = Order::latest()->paginate($perPage);

                if (!empty($keyword)) {
                    $order = Order::where('id', 'LIKE', "%$keyword%")
                        ->orWhere('tracking', 'LIKE', "%$keyword%")
                        ->orWhere('created_at', 'LIKE', "%$keyword%")
                        ->latest()->paginate($perPage);
                } else {
                    $order = Order::latest()->paginate($perPage);
                }
                break;
                
            default : 
                //means guest
                $order = Order::where('user_id',Auth::id() )->latest()->paginate($perPage);      
        }


        return view('order.index', compact('order','orderproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order.create');
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
        
        OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )
            ->update([
                'status' => 'created'
            ]);


        return redirect('order')->with('flash_message', 'Order added!');
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
        $order = Order::findOrFail($id);

        return view('order.show', compact('order'));
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
        $order = Order::findOrFail($id);

        return view('order.edit', compact('order'));
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
        
        $order = Order::findOrFail($id);
        $order->update($requestData);

        
        return redirect('order')->with('flash_message', 'Order updated!');
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
        Order::destroy($id);

        return redirect('order')->with('flash_message', 'Order deleted!');
    }
    public function order_admin( Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $user = Auth::id();
        $test = OrderProduct::orderBy('created_at', 'DESC')->get();
        $partner = User::where('id' , '=' ,$user)->get('partner');
        foreach ($partner as $key ) {
            $partner_id = $key->partner ;
        }

        return view('partner_admin.order_admin', compact('test','partner_id'));

    }
}
