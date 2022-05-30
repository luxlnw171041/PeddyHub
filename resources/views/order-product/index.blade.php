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
        -ms-transform: scale(2.5);
        /* IE 9 */
        -webkit-transform: scale(2.5);
        /* Safari 3-8 */
        transform: scale(2.5);

    }
</style>
<div class="main-wrapper pet cart">
    <section class="featured">
        <div class="crumb center">
            <div class="container">
                <h1>
                    PEDDyHUB <span class="wow pulse" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s;"> Cart </span>
                </h1>
                <div class="bg_tran">
                    PEDDyHUB Cart
                </div>
                <p>
                    <a href="{{'product'}}" title="Home">HOME</a>
                    || <span> CART </span>
                </p>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" style="color:#B8205B;"><i class="fa-solid fa-location-dot"></i> ที่อยู่จัดส่ง</h5>
                    @if(!empty($data->profile->tambon_th))
                    <h5>
                        {{$data->profile->address}} {{$data->profile->tambon_th}}  {{$data->profile->amphoe_th}}  {{$data->profile->changwat_th}} {{$data->profile->zip_code}}
                        <span><button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#adress">แก้ไขที่อยู่</button>
                    </h5>
                  
                    @else
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#adress">เพิ่มที่อยู่</button>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="entry">
        <div class="container">
            <div class="card mb-5">
                <table class="table">
                    <thead class="thead">
                        <tr class="text-center">
                            <th scope="col">สินค้า</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">รวม</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderproduct as $item)
                        <tr>
                            <th scope="row">
                                <!-- <img src="{{ url('storage/'.$item->product->photo )}}"style=" height: 100px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid"> -->
                                <img class="zoom" src="{{ url('storage/'.$item->product->photo )}}" alt="This zooms-in really well and smooth">
                                <span style="margin-left:15px;">{{ $item->product->title }}</span>
                            </th>
                            <td class="text-center">{{ $item->quantity }}</td>
                            <td class="text-center">฿ {{ number_format($item->price) }}</td>
                            <td class="orange text-center">฿ {{ number_format($item->total) }}
                                <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete OrderProduct" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="coupan">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="form">
                            <!-- <form action="">
                                    <div class="form-group">
                                        <input type="number" name="coupan" placeholder="Coupan Code" id="coupan" class="form-control">
                                        <button type="submit" class="form-control">Apply Coupan</button>
                                    </div>
                                </form> -->
                            <ul class="mt-4 mb-30">
                                <li>ราคารวม <span>฿ {{ number_format($orderproduct->sum('total')) }}</span></li>
                                <!-- <li>Shipping Charge <span>$ 00.00</span></li> -->
                                <li>การจัดส่ง <span style="color:red">เก็บเงินปลายทาง</span></li>
                                <li>รวมทั้งหมด <span> ฿ {{ number_format($orderproduct->sum('total')) }}</span></li>
                            </ul>
                            <form id="buy" method="POST" action="{{ url('/order') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <a class="btn main hvr-rectangle-in" onclick="document.getElementById('buy').submit()">สั่งสินค้า</a>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="continue">
                            <a href="{{ 'product' }}" title="Countinue Shopping" class="btn orange">Countinue Shopping <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
<!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Orderproduct</div>
                    <div class="card-body">
                        <a href="{{ url('/order-product/create') }}" class="btn btn-success btn-sm" title="Add New OrderProduct">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Order Id</th><th>Product Id</th><th>User Id</th><th>Quantity</th><th>Price</th><th>Total</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($orderproduct as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->order_id }}</td><td>{{ $item->product_id }}</td><td>{{ $item->user_id }}</td><td>{{ $item->quantity }}</td><td>{{ $item->price }}</td><td>{{ $item->total }}</td>
                                        <td>
                                            <a href="{{ url('/order-product/' . $item->id) }}" title="View OrderProduct"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/order-product/' . $item->id . '/edit') }}" title="Edit OrderProduct"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/order-product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete OrderProduct" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $orderproduct->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
<div class="modal fade" id="adress" tabindex="-1" role="dialog" aria-labelledby="adressTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">ที่อยู่</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ url('/profile' . '/' . Auth::id()) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6 faq form-group {{ $errors->has('real_name') ? 'has-error' : ''}}">
                            <input style="border-radius: 25px 0px 25px 25px ;" name="real_name" class="form-control" type="text" id="real_name" value="{{ isset($data->profile->real_name) ? $data->profile->real_name : ''}}" placeholder="ชื่อ-นามสกุล">
                            {!! $errors->first('real_name', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-6 faq form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                            <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" name="phone" type="text" id="phone" value="{{ $data->profile->phone }}" pattern="[0-9]{10}" placeholder="หมายเลขโทรศัพท์">
                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select style="border-radius: 25px 0px 25px 25px ;" name="select_province" id="select_province" class="form-control" onchange="select_A();">
                                    <option value="" selected>- เลือกจังหวัด -</option>
                                </select>
                                <input type="text" name="input_province" id="input_province" class="form-control d-none" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="faq ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <select style="border-radius: 25px 0px 25px 25px ;" name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T();">
                                                <option value="" selected>- เลือกอำเภอ -</option>
                                            </select>
                                            <input type="text" name="input_amphoe" id="input_amphoe" class="form-control d-none" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="faq ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <select style="border-radius: 25px 0px 25px 25px ;" name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng();">
                                            <option value="" selected>- เลือกตำบล -</option>
                                        </select>
                                        <input type="text" name="input_tambon" id="input_tambon" class="form-control d-none" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 faq form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}">
                            <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" name="zip_code" type="tel" id="zip_code" value="{{ $data->profile->zip_code }}" maxlength="5" placeholder="รหัสไปรษณีย์">
                            {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="faq ">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <br>
                                    <textarea style="border-radius: 25px 0px 25px 25px ;" name="address" class="form-control" rows="3"  type="text" id="address" value="{{ $data->profile->address }}" placeholder="รายละเอียดที่อยู่"></textarea>
                            {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        select_province();
    });

    function select_province() {
        let select_province = document.querySelector('#select_province');

        fetch("{{ url('/') }}/api/select_province/")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_province.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกจังหวัด -";
                option_select.value = "";
                select_province.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.changwat_th;
                    option.value = item.changwat_th;
                    select_province.add(option);
                }
            });
    }

    function select_A() {
        let select_province = document.querySelector('#select_province');
        let select_amphoe = document.querySelector('#select_amphoe');

        fetch("{{ url('/') }}/api/select_amphoe" + "/" + select_province.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_amphoe.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกอำเภอ -";
                option_select.value = "";
                select_amphoe.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.amphoe_th;
                    option.value = item.amphoe_th;
                    select_amphoe.add(option);
                }
            });
    }

    function select_T() {
        let select_province = document.querySelector('#select_province');
        let select_amphoe = document.querySelector('#select_amphoe');
        let select_tambon = document.querySelector('#select_tambon');

        fetch("{{ url('/') }}/api/select_tambon" + "/" + select_province.value + "/" + select_amphoe.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_tambon.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกตำบล -";
                option_select.value = "";
                select_tambon.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.tambon_th;
                    option.value = item.tambon_th;
                    select_tambon.add(option);
                }
            });

    }
</script>