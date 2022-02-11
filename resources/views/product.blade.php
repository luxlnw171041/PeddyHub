@extends('layouts.peddyhub')

@section('content')
<body>
    <div class="main-wrapper pet shop">
        <section class="featured">
            <div class="crumb">
                <div class="container">
                    <h1>
                        Pawrex <span class="wow pulse" data-wow-delay="1s" style="visibility: hidden; animation-delay: 1s; animation-name: none;"> Shop </span>
                    </h1>
                    <div class="bg_tran">
                        PawreX Shop
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
                                                <a href="#" title="Prescription Diet">
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
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Accessories</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Flavor Dental Chews</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card purple">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Accessories</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Natural Dog Wax</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-o"></i>
                                                    <i class="fas fa-star-o"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card orange">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                                <div class="sale_label new">
                                                    New
                                                </div>
                                            </div>
                                            <div class="content">
                                                <p class="cat">Grooming</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Hair deShedding Edge</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Health Food</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Prescription Diet</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card purple">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Health Food</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Prescription Diet</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card orange">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Health Food</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Prescription Diet</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card yellow">
                                            <div class="image">
                                                <img src="{{ asset('peddyhub/images/product/1.jpg') }}"style=" width: 348px;" alt="Image of Product" title="Profuct" class="img-fluid">
                                            </div>
                                            <div class="content">
                                                <p class="cat">Health Food</p>
                                                <a href="#" title="Prescription Diet">
                                                    <h5>Prescription Diet</h5>
                                                </a>
                                                <p class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-o"></i>
                                                </p>
                                                <p class="head"><span>$50.00</span> $32.80</p>

                                                <div class="more">
                                                    <a href="pet-product.html" title="Add to Cart"><i class="fas fa-shopping-cart"></i></a>
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