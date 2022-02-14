@extends('layouts.peddyhub')

@section('content')
<body>
    <div class="main-wrapper pet shop">
        <section class="featured">
            <div class="crumb">
                <div class="container">
                    <h1>
                        Manoonpet <span class="wow pulse" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;"> Shop </span>
                    </h1>
                    <div class="bg_tran">
                        Manoonpet Shop
                    </div>
                    <p>
                        <a href="index-5.html" title="Home">HOME</a>
                        || <span> PET-SHOP </span>
                    </p>
                </div>
            </div>

        </section>

        <section class="steps">
            <div class="container">
                <!-- <div class="filter">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="form">
                                <div class="form-group">
                                    <select name="sorting" id="sorting" class="form-select">
                                        <option value="Default Sorting">Default Sorting</option>
                                        <option value="Sort By Newness">Sort By Newest</option>
                                        <option value="Sort By Price: High to low">Sort By Price: High to low
                                        </option>
                                        <option value="Sort By Price: Low to high">Sort By Price: Low to high
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="layout">
                                <div class="tabs">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6 col-sm-12">
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list">
                                                        <i class="fas fa-th"></i>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail">
                                                        <i class="fas fa-list"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select name="sorting" id="sorting" class="form-select">
                                                    <option value="Showing Result">Showing Result</option>
                                                    <option value="8">8</option>
                                                    <option value="12">12</option>
                                                    <option value="16">16</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
                        <div class="services">
                            <div class="cards">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card orange">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                <div class="sale_label bg_orange">
                                                    Sale
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p class="cat">Food</p>
                                                <a href="https://www.manoonpetshop.co.th/product/anf-holistic-lamb-rice" title="Prescription Diet">
                                                    <h5>ANF Holistic อาหารสุนัขชนิดเม็ด สูตรแกะและข้าว</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>฿1,490</span> ฿1,490</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/anf-holistic-lamb-rice" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/2.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Food</p>
                                                <a href="https://www.manoonpetshop.co.th/product/lifemate-%e0%b8%ad%e0%b8%b2%e0%b8%ab%e0%b8%b2%e0%b8%a3%e0%b8%aa%e0%b8%b8%e0%b8%99%e0%b8%b1%e0%b8%82%e0%b9%82%e0%b8%95-%e0%b8%9e%e0%b8%b1%e0%b8%99%e0%b8%98%e0%b8%b8%e0%b9%8c%e0%b8%81%e0%b8%a5%e0%b8%b2%e0%b8%87-%e0%b8%9e%e0%b8%b1%e0%b8%99%e0%b8%98%e0%b8%b8%e0%b9%8c%e0%b9%83%e0%b8%ab%e0%b8%8d%e0%b9%88-400-%e0%b8%81%e0%b8%a3%e0%b8%b1%e0%b8%a1" title="Prescription Diet">
                                                    <h5>Lifemate อาหารสุนัข รสเนื้อ
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"> ฿69-฿1,690</p>
<br>
                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/lifemate-%e0%b8%ad%e0%b8%b2%e0%b8%ab%e0%b8%b2%e0%b8%a3%e0%b8%aa%e0%b8%b8%e0%b8%99%e0%b8%b1%e0%b8%82%e0%b9%82%e0%b8%95-%e0%b8%9e%e0%b8%b1%e0%b8%99%e0%b8%98%e0%b8%b8%e0%b9%8c%e0%b8%81%e0%b8%a5%e0%b8%b2%e0%b8%87-%e0%b8%9e%e0%b8%b1%e0%b8%99%e0%b8%98%e0%b8%b8%e0%b9%8c%e0%b9%83%e0%b8%ab%e0%b8%8d%e0%b9%88-400-%e0%b8%81%e0%b8%a3%e0%b8%b1%e0%b8%a1" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card purple">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/3.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Grooming</p>
                                                <a href="https://www.manoonpetshop.co.th/product/furminator-giant-long-hair" title="Prescription Diet">
                                                    <h5>FURMINATOR GIANT LONG HAIR</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-o"></i>
                                                    <i class="fas fa-star-o"></i>
                                                </p>
                                                <p class="head"><span> ฿2,778</span> ฿2,500</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/furminator-giant-long-hair" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card orange">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/4.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                <div class="sale_label new">
                                                    New
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p class="cat">Accessories</p>
                                                <a href="https://www.manoonpetshop.co.th/product/kit-cat-bentonite-cat-litter-powder" title="Prescription Diet">
                                                    <h5>Kit Cat ทรายแมว Baby Powder
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>฿ 169</span> ฿ 169</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/kit-cat-bentonite-cat-litter-powder" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/5.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Food</p>
                                                <a href="https://www.manoonpetshop.co.th/product/temptations-savoury-salmon-flavour" title="Prescription Diet">
                                                    <h5>เทมเทชั่นส์ขนมแมวรสเซเวอรี่แซลมอน
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>฿ 69</span> ฿ 69</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/temptations-savoury-salmon-flavour" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card purple">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/6.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Food</p>
                                                <a href="https://www.manoonpetshop.co.th/product/optimum-hi-pro-wheat-germ" title="Prescription Diet">
                                                    <h5>ออพติมั่ม ไฮโปร ปลาคาร์พ เม็ดใหญ่
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>	฿ 230</span> 	฿ 230</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/optimum-hi-pro-wheat-germ" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card orange">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/7.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Grooming</p>
                                                <a href="https://www.manoonpetshop.co.th/product/furminator-small-animal" title="Prescription Diet">
                                                    <h5>FURMINATOR แปรงขนกระต่าย Small Animal
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>฿ 1,320</span> 	 1,450</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/furminator-small-animal" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/8.png') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Health Food</p>
                                                <a href="https://www.manoonpetshop.co.th/product/oxbow-natural-science-multi-vitamin" title="Prescription Diet">
                                                    <h5>Oxbow - อาหารเสริมวามนรวม 120 กรัม
 </h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-o"></i>
                                                </p>
                                                <p class="head"><span>	฿ 295</span> 	฿ 295</p>

                                                <div class="more">
                                                    <a href="https://www.manoonpetshop.co.th/product/oxbow-natural-science-multi-vitamin" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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