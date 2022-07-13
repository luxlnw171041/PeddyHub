@extends('layouts.partner.theme_partner')

@section('content')

<div class="page-content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-xl-2">
                            <a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" class="btn btn-primary mb-3 mb-lg-0"><i class="bx bxs-plus-square"></i>New Product</a>
                        </div>
                        <div class="col-lg-9 col-xl-10">
                            <a style="float: right;" type="button" data-toggle="modal" data-target="#product">
                                <button class="btn btn-primary btn-md">
                                    <i class="fas fa-info-circle"></i>วิธีใช้
                                </button>
                            </a>
                            <form class="float-lg-end" method="GET" action="{{ url('/product_admin') }}" accept-charset="UTF-8" role="search">
                                <div class="row row-cols-lg-auto g-2">
                                    <div class="col-12">
                                        <div class="position-relative">
                                            <input type="text" name="search" class="form-control ps-5" placeholder="Search Product..." value="{{ request('search') }}"> <span class="position-absolute top-50 product-show translate-middle-y"><i class="bx bx-search"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="collapse col-12" id="collapseExample">
                            <div class="card">
                                <div class="card-body" style="padding: 10px 0px 10px 0px;">
                                    <h5 class="card-title">Add New Product</h5>
                                    <hr>
                                    <div class="form-body mt-4">
                                        <form method="POST" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="border border-3 p-4 rounded">
                                                        <div class="mb-3">
                                                            <label for="inputProductTitle" class="form-label">Product Title</label>
                                                            <input class="form-control" name="title" type="text" id="title" value="{{ isset($product->title) ? $product->title : ''}}">
                                                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductDescription" class="form-label">Description</label>
                                                            <textarea class="form-control" type="text" name="description" id="description" rows="3" value="{{ isset($product->description) ? $product->description : ''}}"></textarea>
                                                            {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="inputProductDescription" class="form-label">Product Images</label>
                                                            <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($product->photo) ? $product->photo : ''}}" accept="image/*">
                                                            {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="border border-3 p-4 rounded">
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="inputProductType" class="form-label">Product Tags</label>
                                                                <select id="tag" name="promotion" class="form-control" >
                                                                    <option value='' selected="selected">ปรกติ</option>
                                                                    <option value="ใหม่">สินค้าใหม่</option>
                                                                    <option value="โปรโมชั่น">สินค้าโปรโมชั่น</option>
                                                                    @if(Auth::user()->role == "admin" )
                                                                    <option value="manoon">manoon</option>
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputPrice" class="form-label">Price</label>
                                                                <input class="form-control" name="price" type="text" id="price" value="{{ isset($product->price) ? $product->price : ''}}" placeholder="00.00">
                                                                {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                                                            </div>
                                                            <div id="div_price2"class="col-md-6 d-none">
                                                                <label for="inputCompareatprice" class="form-label">Compare at Price</label>
                                                                <input class="form-control" name="price2" type="text" id="price2" value="{{ isset($product->price2) ? $product->price2 : ''}}" placeholder="00.00">
                                                                {!! $errors->first('price2', '<p class="help-block">:message</p>') !!}
                                                            </div>
                                                            <!-- <div class="col-md-6">
                                                                <label for="inputCostPerPrice" class="form-label">Cost Per Price</label>
                                                                <input type="email" class="form-control" id="inputCostPerPrice" placeholder="00.00">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputStarPoints" class="form-label">Star Points</label>
                                                                <input type="password" class="form-control" id="inputStarPoints" placeholder="00.00">
                                                            </div>
                                                             -->
                                                            <div class="col-12">
                                                                <label for="inputVendor" class="form-label">animal type</label>
                                                                <select name="pet_category_id" class="form-control" required>
                                                                    <option value='' selected="selected">โปรดเลือก</option>
                                                                    @foreach($category as $item)
                                                                    <option value="{{ isset($item->id) ? $item->id : ''}}">{{ $item->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="inputCollection" class="form-label">Product Type</label>
                                                                <select name="type" class="form-control" required>
                                                                    <option value='' selected="selected">โปรดเลือก</option>
                                                                    <option value="Food">Food</option>
                                                                    <option value="Grooming">Grooming</option>
                                                                    <option value="Health Food">Health Food</option>
                                                                    <option value="Snack">Snack</option>
                                                                    <option value="Pill">Pill</option>
                                                                </select>
                                                                {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                                            </div>
                                                            <div id="div_link" class="col-12 d-none">
                                                                <label for="inputProductTags" class="form-label">Product link</label>
                                                                <input class="form-control" name="link" type="text" id="link" value="{{ isset($product->link) ? $product->link : ''}}" >
                                                                {!! $errors->first('link', '<p class="help-block">:message</p>') !!}            
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="d-grid">
                                                                    <button type="submit" class="btn btn-primary">Save Product</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--end row-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid">
        @foreach($product_admin as $item)
        <div class="col">
            <div class="card">
                <img src="{{ url('storage/'.$item->photo )}}" width="266px" height="266px" class="card-img-top" alt="...">
                @if(!empty($item->promotion))
                <div class="">
                    <div class="position-absolute top-0 end-0 m-3 "><span class="" style="border-radius: 25px;border: 1px solid black;padding:10px;background-color:white;">{{$item->promotion}}</span></div>
                </div>
                @endif
                <div class="card-body">
                    <h6 class="card-title cursor-pointer">{{$item->title}}</h6>
                    <div class="clearfix">
                        <p class="mb-0 float-start"><strong>{{$item->type}}</strong></p>
                        @if(!empty($item->price2))
                        <p class="mb-0 float-end fw-bold"><span class="me-2 text-decoration-line-through text-secondary"> {{$item->price2}}</span><span> {{$item->price}}</span></p>
                        @else
                        <p class="mb-0 float-end fw-bold"><span> {{$item->price}}</span></p>
                        @endif
                    </div>
                    <!-- <div class="d-flex align-items-center mt-3 fs-6">
                        <div class="cursor-pointer">
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-warning"></i>
                            <i class="bx bxs-star text-secondary"></i>
                        </div>
                        <p class="mb-0 ms-auto">4.2(182)</p>
                    </div> -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--end row-->
 
</div>
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/product/1.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ค้นหารายการสินค้าจากชื่อสินค้าตามคำที่กำหนด</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.Product Title : กรอกชื่อสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.Description : กรอกรายละเอียดสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.Product Images : เพิ่มรูปสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.Product Tags : เลือกป้ายสินค้า เช่น สินค้าใหม่ หรือสินค้าโปรโมชั่น</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.Price : กรอกราคาสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.Compare Price : กรอกราคาสินค้าก่อนลดราคา</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">8.animal Type : เลือกประเภทสัตว์ที่ใช้สินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">9.Product Type : เลือกประเภทสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">10.Save Product : เมื่อกรอกข้อมูลครบถ้วนแล้วให้กดที่ปุ่มSave Product</h5>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('tag').addEventListener('change', function() {
        if (this.value === "โปรโมชั่น"){
            document.querySelector('#div_price2').classList.remove('d-none');
        }else if(this.value === "manoon"){
            document.querySelector('#div_link').classList.remove('d-none');
        }else{
            document.querySelector('#div_price2').classList.add('d-none');
            document.querySelector('#div_link').classList.add('d-none');

        }   
    });
</script>

@endsection