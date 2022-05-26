@extends('layouts.peddyhub')

@section('content')
<style>
    * {
        box-sizing: border-box;
    }

    .zoom {

        background-color: green;
        transition: transform .2s;
        width: 100px;
        height: 100px;
        margin: 0 auto;
        object-fit: cover;
    }

    .zoom:hover {
        -ms-transform: scale(5.5);
        /* IE 9 */
        -webkit-transform: scale(5.5);
        /* Safari 3-8 */
        transform: scale(5.5);


    }
</style>

<section class="featured">
    <div class="crumb center">
        <div class="container">
            <h1>
                รายการสั่งซื้อ </span>
            </h1>
            <div class="bg_tran">
                รายการสั่งซื้อ
            </div>
            <p>
                <a href="{{'product'}}" title="Home">HOME</a>
                || <span> Order </span>
            </p>
        </div>
    </div>
</section>
<section class="padding ptb-xs-60">
    <div class="cart_page_area sp100">
        <div class="container">
            <div class="cart_table_wraper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="cart_wrpaer">
                            <div class="table_scroll table-responsive">
                                <table class="table" style="border: 0.1px solid black;">
                                    <thead class="dark-bg">
                                        <tr>
                                            <th><span>สินค้า</span></th>
                                            <th><span>รายละเอียด</span></th>
                                            <th><span>ราคา</span></th>
                                            <th><span>จำนวน</span></th>
                                            <th><span>รวม</span></th>
                                            <th><span>สถานะ</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orderproduct as $item)
                                        <tr>
                                            <td><img class="img-rounded" src="{{ url('storage/'.$item->product->photo )}}" alt="">
                                            </td>
                                            <td class="padding_all">
                                                <p>
                                                    {{$item->product->title}}
                                                </p>
                                            </td>
                                            <td class="padding_all">
                                                <p>
                                                    ฿ {{ number_format($item->product->price) }}
                                                </p>
                                            </td>
                                            <td class="padding_all">
                                                <div class="cart_amount_wrap">
                                                    <div class="product-regulator">
                                                        {{ number_format($item->quantity) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="padding_all">
                                                <p>
                                                    ฿ {{ number_format($item->total) }}
                                                </p>
                                            </td>
                                            <td class="padding_all">
                                                @switch($item->status)
                                                @case("created")
                                                <!-- <div>รอหลักฐานการชำระเงิน</div> -->
                                                <div class="row">

                                                    <div class="col-sm-12 d-flex justify-content-start">
                                                        <form method="POST" action="{{ url('/order-product/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                            {{ method_field('PATCH') }}
                                                            {{ csrf_field() }}
                                                            <select class="d-none" name="status" id="status">
                                                                <option value="cancelled">ยกเลิกออร์เดอร์</option>
                                                            </select>
                                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm(&quot;Confirm Cancelled?&quot;)">ยกเลิกออร์เดอร์</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                @break
                                                @case("checking")
                                                <div>รอตรวจสอบ</div>
                                                <div><img src="{{ asset("storage/{$item->payment->slip}")  }}" width="100" /></div>
                                                @if(Auth::user()->role == "admin")
                                                <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                    <select class="" name="status" id="status">
                                                        <!-- <option value="paid">ชำระเงินเรียบร้อย</option> -->
                                                        <option value="cancelled">ยกเลิกออร์เดอร์</option>
                                                    </select>
                                                    <button class="btn btn-primary btn-sm" type="submit">เปลี่ยนสถานะ</button>
                                                </form>
                                                @endif
                                                @break
                                                @case("paid")
                                                <div>ชำระเงินแล้ว รอเลข tracking</div>
                                                @if(Auth::user()->role == "admin")
                                                <form method="POST" action="{{ url('/order/' . $item->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                    <input name="tracking" type="text" id="tracking" value="" placeholder="ใส่เลข tracking...">
                                                    <input name="status" type="hidden" id="status" value="completed">
                                                    <button class="btn btn-primary btn-sm" type="submit">ส่งเลข Tracking</button>
                                                </form>
                                                @endif
                                                @break
                                                @case("completed")
                                                <div>ส่งสินค้าแล้ว</div>
                                                <div>เลขติดตามพัสดุ</div>
                                                <div>{{ $item->tracking }}</div>
                                                @break
                                                @case("cancelled")
                                                <div>ยกเลิกออร์เดอร์แล้ว</div>
                                                @break
                                                @endswitch
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- table End -->
                            </div>
                            <!-- cart_btns End -->
                        </div>
                    </div>
                    <!-- column End -->
                </div>
                <!-- row End -->
            </div>
        </div>
        <!-- container End -->
    </div>
</section>

<!-- <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Order</div>
                    <div class="card-body">
                        <a href="{{ url('/order/create') }}" class="btn btn-success btn-sm" title="Add New Order">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/order') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Total</th><th>Status</th><th>Checking At</th><th>Tracking</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($order as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->total }}</td><td>{{ $item->status }}</td><td>{{ $item->checking_at }}</td><td>{{ $item->tracking }}</td>
                                        <td>
                                            <a href="{{ url('/order/' . $item->id) }}" title="View Order"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/order/' . $item->id . '/edit') }}" title="Edit Order"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/order' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Order" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $order->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection