@extends('layouts.peddyhub')

@section('content')
<style>
    .btn-outline-peddyhub2 {
        position: relative;
        line-height: 29px;
        color: #cd628c;
        font-size: 16px;
        font-weight: 700;
        border: none;
        background: none;
        font-size: 18px;
    }

    .btn-outline-peddyhub2:hover {
        background: #B81F5B;
        color: #ffffff;
    }

    .btn-outline-peddyhub2 a:hover {

        color: #ffffff;
    }

    /* 
    .two-lines {
        display: -webkit-box;
        max-width: 400px;
        height: 55px;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.625;
    } */

    .owl-nav {
        display: none;
    }

    .owl-carousel .item {
        height: 350px;
        padding: 0 5px;
    }
</style>
<div class="main-wrapper pet shop">
    <section class="steps">
        <section class="featured">
            <div class="crumb">
                <div class="container notranslate">
                    <h1>
                        Peddyhub <span class="wow pulse" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;"> Shop </span>
                    </h1>
                    <div class="bg_tran">
                        Peddyhub Shop
                    </div>
                </div>
            </div>
        </section>
        <div class="container notranslate">
            <p>
                <span style="font-size:20px;font-family: 'Mitr', sans-serif;"> หมวดหมู่ </span>
            </p>
            <div class="col-12">
                <div class="row text-center">
                    <div class="col-2" style="padding:0px">
                        <a href="product" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/logo/logo-5.png') }}" alt="">
                                <br>All</b></a>

                    </div>
                    <div class="col-2" style="padding:0px">
                        <a href="product?type=food" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/product/food.png') }}" alt="">
                                <br>Food</b></a>

                    </div>
                    <div class="col-2" style="padding:0px">
                        <a href="product?type=Grooming" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/product/grooming.png') }}" alt="">
                                <br>Grooming</b></a>

                    </div>
                    <div class="col-2" style="padding:0px">
                        <a href="product?type=Health Food" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/product/Health Food.png') }}" alt="">
                                <br>Health Food</b></a>

                    </div>
                    <div class="col-2" style="padding:0px">
                        <a href="product?type=Snack" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/product/snack.png') }}" alt="">
                                <br>Snack</b></a>

                    </div>
                    <div class="col-2" style="padding:0px">
                        <a href="product?type=Pill" type="submit" class="btn btn-outline-peddyhub2"><b class="text-b">
                                <img height="80px" src="{{ asset('peddyhub/images/product/pill.png') }}" alt="">
                                <br>Pill</b></a>

                    </div>
                </div>
            </div>
            <br>
            <p>
                <span style="font-size:20px;font-family: 'Mitr', sans-serif;"> สินค้าจาก มนูญเพ็ทช็อป </span>
            </p>
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="services">
                            <div class="cards">
                                <div class="row">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($data_manoon as $item)
                                        <div class="item">
                                            <div class="card orange">
                                                <a href="{{ $item->link }}" title="Prescription Diet">
                                                    <div class="image">
                                                        <img src="{{ url('storage/'.$item->photo )}}" style=" height: 192px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                        <div class="manoon_label bg_orange">
                                                            <img src="{{ asset('/peddyhub/images/logo-partner/logomanoonpetshop2.png') }}"style="bject-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="content" style="padding-top:5px ;">
                                                        <h6 style="overflow: hidden;text-overflow: ellipsis;max-width:400px;white-space: nowrap;">{{ $item->title }}</h5>
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
            <p>
                <span style="font-size:20px;font-family: 'Mitr', sans-serif;"> สินค้าใหม่ </span>
            </p>
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="services">
                            <div class="cards">
                                <div class="row">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($data_new as $item)
                                        <div class="item">
                                            <div class="card orange">
                                                <a href="{{ url('/product/' . $item->id) }}" title="Prescription Diet">
                                                    <div class="image">
                                                        <img src="{{ url('storage/'.$item->photo )}}" style=" height: 192px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                        <div class="sale_label bg_orange">
                                                            New
                                                        </div>
                                                    </div>
                                                    <div class="content" style="padding-top:5px ;">
                                                        <h6 style="overflow: hidden;text-overflow: ellipsis;max-width:400px;white-space: nowrap;">{{ $item->title }}</h5>
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
            <p>
                <span style="font-size:20px;font-family: 'Mitr', sans-serif;"> สินค้าโปรโมชั่น </span>
            </p>
            <div class="container">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="services">
                            <div class="cards">
                                <div class="row">
                                    <div class="owl-carousel owl-theme">
                                        @foreach($data_promotion as $item)
                                        <div class="item">
                                            <div class="card orange">
                                                <a href="{{ url('/product/' . $item->id) }}" title="Prescription Diet">
                                                    <div class="image">
                                                        <img src="{{ url('storage/'.$item->photo )}}" style="height: 196px;object-fit: cover;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                        <div class="sale_label bg_orange">
                                                            <span style="font-size: 12px;font-family: 'Sarabun', sans-serif;">promotion</span>
                                                        </div>
                                                    </div>
                                                    <div class="content" style="padding-top:5px ;">
                                                        <h6 style="overflow: hidden;text-overflow: ellipsis;max-width:400px;white-space: nowrap;">{{ $item->title }}</h5>
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
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: 5,
        pagination: false,
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
@endsection