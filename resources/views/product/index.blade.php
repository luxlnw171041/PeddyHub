@extends('layouts.peddyhub')

@section('content')
<style>
    /* .two-lines {
          display: -webkit-box;
max-width: 400px;
height: 73.2px;
-webkit-line-clamp: 2;
-webkit-box-orient: vertical;
overflow: hidden;
text-overflow: ellipsis;
line-height: 1.625;
      } */
      .button-cart {
    background-color: #B8205B;
    color: white !important;
    padding: 10px 20px!important;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px !important;
    cursor: default;
    border: 2px solid #B8205B;
    border-radius: 25px !important;
    font-family: 'Sarabun', sans-serif;
    
}
</style>
    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Product</div>
                    <div class="card-body">
                        <a href="{{ url('/product/create') }}" class="btn btn-success btn-sm" title="Add New Product">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/product') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Title</th><th>Price</th><th>Price2</th><th>Photo</th><th>Pet Category Id</th><th>Link</th><th>Type</th><th>Promotion</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->price }}</td><td>{{ $item->price2 }}</td><td>{{ $item->photo }}</td><td>{{ $item->pet_category_id }}</td><td>{{ $item->link }}</td><td>{{ $item->type }}</td><td>{{ $item->promotion }}</td>
                                        <td>
                                            <a href="{{ url('/product/' . $item->id) }}" title="View Product"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/product/' . $item->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/product' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $product->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <body>
    <div class="main-wrapper pet shop">
        <section class="featured">
            <div class="crumb">
                <div class="container notranslate">
                    <h1>
                        Peddyhub <span class="wow pulse" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;"> Shop </span>
                    </h1>
                    <div class="bg_tran">
                        Peddyhub Shop
                    </div>
                    <p>
                        <a href="{{''}}" title="Home">HOME</a>
                        || <span> PET-SHOP </span>
                    </p>
                </div>
            </div>

        </section>
        <div class="row col-12">
            @include ('menubar.menu')
        </div>
        <div class="button wow fadeInUp ">
            <div class="container  d-flex justify-content-end">
                <a style="font-size:15px;" href="{{ url('/order-product') }}"  class="btn button-cart" title="contact">
                     <p style="padding:0px 10px 0px 10px;margin:0px 0px -10px 20px;background-color:#FFFFFF;border-radius: 10px 10px 10px 10px;font-size:small;"><b style="color:#B8205B">{{ $count_order }}</b> </p>    
                    <i style="font-size: 25px;vertical-align: middle;margin-left:-10px;" class="fa-solid fa-cart-shopping"></i> 
                    
                </a>
                &nbsp;
                <a style="font-size:15px;" href="{{ url('/product/create') }}" class="btn main" title="contact">
                    เพิ่มสินค้า <i class="fas fa-paw"></i>
                </a>
            </div>
        </div>
        <section class="steps">
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="services">
                            <div class="cards">
                                <div class="row">
                                    
                                    @foreach($product as $item)
                                        @if($item->promotion == "manoon")
                                            <div class="col-lg-3 col-md-6 col-sm-12">
                                                <div class="card orange">
                                                    <a href="{{ $item->link }}" title="Prescription Diet">
                                                        <div class="image">
                                                            <img src="{{ url('storage/'.$item->photo )}}"style=" height: 253px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                                <div class="manoon_label bg_orange">
                                                                    <img src="{{ asset('/peddyhub/images/logo-partner/logomanoonpetshop2.png') }}"style="bject-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        <div class="content">
                                                            <p class="cat">{{ $item->type }}</p>
                                                            <h5 style="overflow: hidden;text-overflow: ellipsis;max-width:400px;white-space: nowrap;">{{ $item->title }}</h5>
                                                            <p class="head"><span></span> ฿ {{ number_format($item->price) }}</p>
                                                        </a>
                                                        <br>
                                                        <!-- <div class="more">
                                                            <a href="{{ url('/product/' . $item->id) }}" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                        </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        <div class="col-lg-3 col-md-6 col-sm-12">
                                            <div class="card orange">
                                                <a href="{{ url('/product/' . $item->id) }}" title="Prescription Diet">
                                                    <div class="image">
                                                        <img src="{{ url('storage/'.$item->photo )}}"style=" height: 253px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                        
                                                        @switch($item->promotion)
                                                            @case('ใหม่')
                                                                <div class="sale_label bg_orange">
                                                                    New
                                                                </div>
                                                            @break
                                                            @case('โปรโมชั่น')
                                                                <div class="sale_label bg_orange" style="font-size:11px">
                                                                    promotion
                                                                </div>
                                                            @break
                                                        @endswitch
                                                        
                                                    </div>
                                                    <div class="content">
                                                        <p class="cat">{{ $item->type }}</p>
                                                        
                                                            <h5 style="overflow: hidden;text-overflow: ellipsis;max-width:400px;white-space: nowrap;">{{ $item->title }}</h5>
                                                        
                                                        <!-- <p class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </p> -->
                                                        <!-- <p class="head"><span>฿1,490</span> ฿1,490</p> -->
                                                        <p class="head"><span></span> ฿ {{ number_format($item->price) }}</p>
                                                    </a>
                                                    <br>
                                                    <div class="more">
                                                        <form id="add{{ $item->id }}" class="cart" method="POST" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                                <input class="quantity d-none" step="1" min="1"  name="quantity" value="1" title="Qty" size="4" type="number">
                                                            <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $item->id }}" >
                                                            <input class="d-none" name="title" type="text" id="title" value="{{ $item->title }}" > 
                                                            <input class="d-none" name="order_id" type="number" id="order_id" value="" >                                                       
                                                            <input class="d-none" name="user_id" type="number" id="user_id" value="" >                                  
                                                            <input class="d-none" name="price" type="number" id="price" value="{{ $item->price }}" >                                
                                                            <input class="d-none" name="total" type="number" id="total" value="" >
                                                            <input class="d-none" name="total_cost" type="number" id="total_cost" value="" >
                                                            <input class="d-none"  name="cost" type="number" id="cost" value="{{ $item->cost }}">
                                                            <a title="Add to Cart" onclick="document.getElementById('add{{ $item->id }}').submit()"><i class="fas fa-shopping-cart"></i></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        </section>
        
        <div class="search-popup">
            <button class="close-search style-two"><img src="images/home_5/cross-out.png" alt=""></button>
            <button class="close-search"><img src="images/home_5/cross-out.png" alt=""></button>
            <form method="post" action="blog.html">
                <div class="form-group">
                    <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>

    </div>
@endsection
