@extends('layouts.peddyhub')

@section('content')
<style>
     .owl-nav {
        display: none;
    }
    .owl-carousel .item {
        padding: 0 5px;
    }
    input[type="number"] {
  -webkit-appearance: textfield;
  -moz-appearance: textfield;
  appearance: textfield;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
  -webkit-appearance: none;
}

.number-input {
  border: 2px solid #ddd;
  display: inline-flex;
}

.number-input,
.number-input * {
  box-sizing: border-box;
}

.number-input button {
  outline:none;
  -webkit-appearance: none;
  background-color: transparent;
  border: none;
  align-items: center;
  justify-content: center;
  width: 2rem;
  height: 2rem;
  cursor: pointer;
  margin: 0;
  position: relative;
}

.number-input button:before,
.number-input button:after {
  display: inline-block;
  position: absolute;
  content: '';
  width: 1rem;
  height: 2px;
  background-color: #212121;
  transform: translate(-50%, -50%);
}
.number-input button.plus:after {
  transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
  font-family: sans-serif;
  max-width: 5rem;
  padding: .5rem;
  border: solid #ddd;
  border-width: 0 2px;
  font-size: 1rem;
  height: 2rem;
  font-weight: bold;
  text-align: center;
}

</style>
    <section class="featured">
        <div class="crumb">
            <div class="container">
                <h1>
                    Pawrex <span class="wow pulse" data-wow-delay="1s" style="visibility: visible; animation-delay: 1s;"> Product </span>
                </h1>
                <div class="bg_tran">
                    PawreX Product
                </div>
                <p>
                    <a href="index-5.html" title="Home">HOME</a>
                    || <span> PRODUCT </span>
                </p>
            </div>
        </div>

    </section>
    <div class="pet profile">
        <section class="profile">
            <div class="container">
                <div class="slide">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="images">
                                <img src="{{ url('storage/'.$product->photo )}}" alt="Image of Product" title="Profuct" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="spec">
                                <div class="name">
                                    <h3>{{$product->title}}</h3>
                                </div>
                                <div class="price">
                                    <!-- <span class="old purple">$679.89</span> -->
                                    <span class="new orange" style="font-size:25px;">฿ {{$product->price}}</span>
                                    <!-- <span class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star-o"></i>
                                    </span> -->
                                    <span class="review"> (3 reviews)</span>
                                </div>
                                <p>
                                    Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas. Vestibulum tortor quam,
                                    feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit
                                    amet quam egestas semper. Aenean ultricies mi
                                    vitae est. Mauris placerat eleifend leo.
                                </p>

                                <!-- <strong class="orange">
                                    2 in stock
                                </strong> -->
                                <!-- <form method="POST" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $product->id }}" >
                                    <input class="d-none" name="title" type="text" id="title" value="{{ $product->title }}" > 
                                    <input class="d-none" name="order_id" type="number" id="order_id" value="" >                                                       
                                    <input class="d-none" name="user_id" type="number" id="user_id" value="" >    
                                    <input  class="col-md-1" name="quantity" type="number" id="quantity" value="1" >                                
                                    <input class="d-none" name="price" type="number" id="price" value="{{ $product->price }}" >                                
                                    <input class="d-none" name="total" type="number" id="total" value="" >
                                    <input class="d-none" name="total_cost" type="number" id="total_cost" value="" >
                                    <input class="d-none"  name="cost" type="number" id="cost" value="{{ $product->cost }}">
                                    <button type="submit" class="btn btn-sm btn-dark" >
                                    <i class="fa fa-shopping-cart"></i> เพิ่มไปยังรถเข็น
                                    </button> 
                                </form> -->
                                <form id="add" class="cart" method="POST" action="{{ url('/order-product') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="number-input">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" ></button>
                                        <input class="quantity" step="1" min="1"  name="quantity" value="1" title="Qty" size="4" type="number">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                    </div>   
                                    <br>
                                    <br>
                                    <div class="button" type="submit">
                                        
                                        <a href="#" class="btn main hvr-rectangle-in" title="Buy Now" onclick="document.getElementById('add').submit()">
                                            Add to Cart <i class="fas fa-paw"></i>
                                        </a>
                                    </div>
                                    <input class="d-none" name="product_id" type="number" id="product_id" value="{{ $product->id }}" >
                                    <input class="d-none" name="title" type="text" id="title" value="{{ $product->title }}" > 
                                    <input class="d-none" name="order_id" type="number" id="order_id" value="" >                                                       
                                    <input class="d-none" name="user_id" type="number" id="user_id" value="" >                                  
                                    <input class="d-none" name="price" type="number" id="price" value="{{ $product->price }}" >                                
                                    <input class="d-none" name="total" type="number" id="total" value="" >
                                    <input class="d-none" name="total_cost" type="number" id="total_cost" value="" >
                                    <input class="d-none"  name="cost" type="number" id="cost" value="{{ $product->cost }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <section class="description">
            <!-- <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="tab_bar_section">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#description">Description <i class="fas fa-paw ps-2"></i></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" data-bs-target="#review">Reviews<i class="fas fa-paw ps-2"></i></a>
                                </li>
                            </ul>
                            <div class="tab-content content">
                                <div id="description" class="tab-pane active">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas
                                        ac elementum elit. Morbi eu arcu ipsum. Aliquam lobortis
                                        accumsan quam ac convallis. Fusce elit mauris, aliquet at odio
                                        vel, convallis vehicula nisi. Morbi vitae porttitor dolor.
                                        Integer eget metus sem. Nam venenatis mauris vel leo pulvinar,
                                        id rutrum dui varius. Nunc ac varius quam, non convallis magna.
                                        Donec suscipit commodo dapibus.
                                    </p>
                                    <p>
                                        Vestibulum et ullamcorper ligula. Morbi bibendum tempor
                                        rutrum. Pelle tesque auctor purus id molestie ornare.Donec eu
                                        lobortis risus. Pellentesque sed aliquam lorem. Praesent
                                        pulvinar lorem vel mauris ultrices posuere. Phasellus elit ex,
                                        gravida a semper ut, venenatis vitae diam. Nullam eget leo
                                        massa. Aenean eu consequat arcu, vitae scelerisque quam.
                                        Suspendisse risus turpis, pharetra a finibus vitae, lobortis et
                                        mi.
                                    </p>
                                </div>
                                <div id="review" class="tab-pane fade">
                                    <h3 class="text-center">Reviews (3)</h3>
                                    <div class="comment">
                                        <div class="image">
                                            <img class="img-fluid" src="images/home_5/reviewer-1.png" alt="Image of Author" title="Author">
                                        </div>
                                        <div class="context">
                                            <h5>Natasha</h5>
                                            <p>
                                                <span>March 2, 2021</span> || <span><a href="#" title="Reply">Reply</a>
                                                </span>
                                            </p>
                                            <p class="rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p>This book is a treatise on the theory of
                                                ethics, very popular during the Renaissance. The first
                                                line of Lorem Ipsum, “Lorem ipsum dolor sit amet..
                                            </p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="image">
                                            <img class="img-fluid" src="images/home_5/reviewer-2.png" alt="Image of Author" title="Author">
                                        </div>
                                        <div class="context">
                                            <h5>Jessica</h5>
                                            <p>
                                                <span>June 3, 2021</span> || <span>
                                                    <a href="#" title="Reply">Reply</a>
                                            </span></p>
                                            <p class="rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p>Nunc augue purus, posuere in accumsan sodales
                                                ac, euismod at est. Nunc faccumsan ermentum consectetur
                                                metus placerat mattis.</p>
                                        </div>
                                    </div>
                                    <div class="comment">
                                        <div class="image">
                                            <img class="img-fluid" src="images/home_5/reviewer-3.png" alt="Image of Author" title="Author">
                                        </div>
                                        <div class="context">
                                            <h5>Jenny</h5>
                                            <p>
                                                <span>October 10, 2021</span> || <span>
                                                    <a href="#" title="Reply">Reply</a>
                                            </span></p>
                                            <p class="rating">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </p>
                                            <p>Nunc augue purus, posuere in accumsan sodales
                                                ac, euismod at est. Nunc faccumsan ermentum consectetur
                                                metus placerat mattis.</p>
                                        </div>
                                    </div>
                                    <div class="write">
                                        <a data-bs-toggle="collapse" data-bs-target="#collapseExample" class="orange font-weight-bold" aria-expanded="true">Leave a Review </a>
                                        <div id="collapseExample" class="full commant_box collapse show" style="">
                                            <form action="index.html" method="post">
                                                <div class="form-group"><textarea placeholder="Enter Your Review here.." cols="30" rows="5" class="form-control"></textarea></div>
                                                <a class="btn main bg_yellow hvr-rectangle-in" type="submit">Comment</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </section> -->
        <div class="main-wrapper pet shop">
            <section class="steps">
                <div class="container">
                    <p>
                        <span style="font-size:25px;"> สินค้าอื่นๆ </span>
                    </p>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                            <div class="services">
                                <div class="cards">
                                    <div class="row">
                                        <div class="owl-carousel owl-theme">
                                            @foreach($data_product as $item)
                                            <div class="item">
                                                <div class="card orange" style="padding-bottom: 0px;">
                                                    <a href="{{ url('/product/' . $item->id) }}" title="Prescription Diet">
                                                        <div class="image">
                                                            <img src="{{ url('storage/'.$item->photo )}}" style=" height: 250px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
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
                                                        <div class="content" style="padding-top:5px ;">
                                                            <h6 style="overflow: hidden;text-overflow: ellipsis; ">{{ $item->title }}</h5>
                                                            <p style="font-size: 13px;">{{ $item->type }}</p>
                                                            <p class="head">฿ {{ number_format($item->price) }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>



<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 5,
        pagination: true,
        navigation: false,
        slideSpeed: 500,
        autoPlay: true,
        loop: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 3,
                nav: false
            },
            1000: {
                items: 5,
                nav: true,
                loop: false
            }
        }
    });
</script>
    <!-- <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Product {{ $product->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/product') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/product/' . $product->id . '/edit') }}" title="Edit Product"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('product' . '/' . $product->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Product" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $product->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $product->title }} </td></tr><tr><th> Price </th><td> {{ $product->price }} </td></tr><tr><th> Price2 </th><td> {{ $product->price2 }} </td></tr><tr><th> Photo </th><td> {{ $product->photo }} </td></tr><tr><th> Pet Category Id </th><td> {{ $product->pet_category_id }} </td></tr><tr><th> Link </th><td> {{ $product->link }} </td></tr><tr><th> Type </th><td> {{ $product->type }} </td></tr><tr><th> Promotion </th><td> {{ $product->promotion }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
