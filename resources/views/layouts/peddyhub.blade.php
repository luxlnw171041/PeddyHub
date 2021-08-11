<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PeddyHub</title>
    <!-- Stylesheets -->
    <link href="{{ asset('peddyhub/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> 
    <link href="{{ asset('peddyhub/plugins/revolution/css/settings.css') }}" rel="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="{{ asset('peddyhub/plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('peddyhub/plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link href="{{ asset('peddyhub/css/style.css') }}" rel="stylesheet"  type="text/css">
    <link href="{{ asset('peddyhub/css/responsive.css') }}" rel="stylesheet" type="text/css">
    <!--Color Switcher Mockup-->
    <link href="{{ asset('peddyhub/css/color-switcher-design.css') }}" rel="stylesheet">
    <!--Color Themes-->
     <link href="{{ asset('peddyhub/ss/color-themes/default-theme.css') }}" rel="stylesheet" id="theme-color-file">
    <link id="theme-color-file" href="{{ asset('peddyhub/css/color-themes/default-theme.css') }}" rel="stylesheet">
    <!--Favicon-->
    <link href="{{ asset('peddyhub/images/home_5/favicon.png') }}" type="image/x-icon" rel="shortcut icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="main-wrapper pet">

        <div id="preloading"></div>

        <section class="featured">
            <div class="header">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            
                        <img src="peddyhub/images/logo-4.png" width="" alt="image of logo" title="logo"
                                class="img-fluid d-inline-block align-middle mr-2">
                            <span class="text-uppercase font-weight-bold"></span>
                        </a>
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent"
                            class="navbar-toggler"><span class="navbar-toggler-icon fa">&#xf0c9;</span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item dropdown">
                                    <a href="{{ url('/') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >HOME</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="about.html" class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">ABOUT</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="about-2.html">About 2</a></li>
                                        <li><a href="about-pet.html">About 3</a></li>
                                        <li><a href="about-pet2.html">About 4</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="services.html" class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">SERVICES</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="pet-service.html">Services 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown"><a href="pets.html"
                                        class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">PETS</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="buy-pet.html">Pets 01</a></li>
                                        <li><a href="pet-detail.html">Pet Detail</a></li>
                                        <li><a href="pet-profile.html">Pet Detail 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">SHOP</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="pet-shop.html">Shop 01</a></li>
                                        <li><a href="product-details.html">Product Detail</a></li>
                                        <li><a href="pet-product.html">Product Detail 01</a></li>
                                        <li><a href="cart.html">Cart</a></li>
                                        <li><a href="pet-cart.html">Cart 01</a></li>
                                        <li><a href="checkout.html">Check Out</a></li>
                                        <li><a href="pet-checkout.html">Check Out 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown"><a href="#"
                                        class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">PAGES</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="gallery-2.html">Gallery 02</a></li>
                                        <li><a href="pet-gallery.html">Gallery 03</a></li>
                                        <li><a href="pet-gallery2.html">Gallery 04</a></li>
                                        <li><a href="404.html">Error</a></li>
                                        <li><a href="pet-error.html">Error 01</a></li>
                                        <li><a href="commingsoon.html">Comming Soon</a></li>
                                        <li><a href="pet-coming.html">Comming Soon 01</a></li>
                                        <li><a href="donation.html">Donation</a></li>
                                        <li><a href="pet-donate.html">Donation 01</a></li>
                                        <li><a href="appointment.html">Appointment</a></li>
                                        <li><a href="pet-appoint.html">Appointment 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown"><a href="#"
                                        class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">SPECIAL
                                        PAGES</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="jobs-list.html">Jobs</a></li>
                                        <li><a href="pet-job.html">Jobs 01</a></li>
                                        <li><a href="job-details.html">Job Detail</a></li>
                                        <li><a href="job-profile.html">Job Detail 01</a></li>
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="pet-login.html">Login 01</a></li>
                                        <li><a href="register.html">Register</a></li>
                                        <li><a href="pet-register.html">Register 01</a></li>
                                        <li><a href="team.html">Team</a></li>
                                        <li><a href="pet-team.html">Team 01</a></li>
                                        <li><a href="team-detail.html">Team Detail</a></li>
                                        <li><a href="team-profile.html">Team Detail 01</a></li>
                                        <li><a href="events.html">Events</a></li>
                                        <li><a href="pet-event.html">Events 01</a></li>
                                        <li><a href="event-single.html">Event Detail</a></li>
                                        <li><a href="event-profile.html">Event Detail 01</a></li>
                                        <li><a href="calculator.html">Calories Calculator</a></li>
                                        <li><a href="pet-calorie.html">Calories Calculator 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#" class="hvr-overline-from-center nav-link dropdown-toggle"
                                        data-bs-toggle="dropdown">BLOG</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="blog.html">Our Blog</a></li>
                                        <li><a href="blog2.html">Blog 02</a></li>
                                        <li><a href="pet-blog.html">Blog 03</a></li>
                                        <li><a href="pet-blog2.html">Blog 04</a></li>
                                        <li><a href="blog-leftsidebar.html">Blog Right Sidebar</a></li>
                                        <li><a href="pet-blog-right.html">Blog Right Sidebar 01</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="blog-profile.html">Blog Single 01</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{'login'}}" class="hvr-overline-from-center nav-link dropdown-toggle"
                                        >LOGIN</a>
                                </li>
                                <li class="nav-item">
                                    <div class="search-box-outer">
                                        <div class="search-box-btn">
                                            <a href="#" class="nav-link"><i class="fas fa-search"></i></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="main-header" >
                    <div class="sticky-header" >
                        <div class="auto-container clearfix">
                            <!--Logo-->
                            <div class="logo pull-left">
                                <a href="index.html" class="img-responsive"><img src="peddyhub/images/home_5/logo.png" alt="" width="15%" style="margin-bottom:-30px;"
                                        title=""></a>
                            </div>
                            <!--Right Col-->
                            <div class="right-col pull-right">
                                <!-- Main Menu -->
                                <nav class="main-menu" style="margin-top:-25px;">
                                    <div class="navbar-header">
                                        <!-- Toggle Button -->
                                        <button type="button" class="navbar-toggle" data-bs-toggle="collapse"
                                            data-bs-target=".navbar-collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="navbar-collapse clearfix">
                                        <ul class="navigation clearfix">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li class="dropdown"><a href="about.html">About</a>
                                                <ul>
                                                    <li><a href="about-2.html">About 2</a></li>
                                                    <li><a href="about-pet.html">About 3</a></li>
                                                    <li><a href="about-pet2.html">About 4</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="services.html">Services</a>
                                                <ul>
                                                    <li><a href="pet-service.html">Services 01</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="pets.html">Pets</a>
                                                <ul>
                                                    <li><a href="buy-pet.html">Pets 01</a></li>
                                                    <li><a href="pet-detail.html">Pet Detail</a></li>
                                                    <li><a href="pet-profile.html">Pet Detail 02</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Shop</a>
                                                <ul>
                                                    <li><a href="shop.html">Shop</a></li>
                                                    <li><a href="pet-shop.html">Shop 01</a></li>
                                                    <li><a href="product-details.html">Product Detail</a></li>
                                                    <li><a href="pet-product.html">Product Detail 01</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="pet-cart.html">Cart 01</a></li>
                                                    <li><a href="checkout.html">Check Out</a></li>
                                                    <li><a href="pet-checkout.html">Check Out 01</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Pages</a>
                                                <ul>
                                                    <li><a href="gallery.html">Gallery</a></li>
                                                    <li><a href="gallery-2.html">Gallery 02</a></li>
                                                    <li><a href="pet-gallery.html">Gallery 03</a></li>
                                                    <li><a href="pet-gallery2.html">Gallery 04</a></li>
                                                    <li><a href="404.html">Error</a></li>
                                                    <li><a href="pet-error.html">Error 01</a></li>
                                                    <li><a href="commingsoon.html">Comming Soon</a></li>
                                                    <li><a href="pet-coming.html">Comming Soon 01</a></li>
                                                    <li><a href="donation.html">Donation</a></li>
                                                    <li><a href="pet-donate.html">Donation 01</a></li>
                                                    <li><a href="appointment.html">Appointment</a></li>
                                                    <li><a href="pet-appoint.html">Appointment 01</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Special Pages</a>
                                                <ul>
                                                    <li><a href="jobs-list.html">Jobs</a></li>
                                                    <li><a href="pet-job.html">Jobs 01</a></li>
                                                    <li><a href="job-details.html">Job Detail</a></li>
                                                    <li><a href="job-profile.html">Job Detail 01</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="pet-login.html">Login 01</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="pet-register.html">Register 01</a></li>
                                                    <li><a href="team.html">Team</a></li>
                                                    <li><a href="pet-team.html">Team 01</a></li>
                                                    <li><a href="team-detail.html">Team Detail</a></li>
                                                    <li><a href="team-profile.html">Team Detail 01</a></li>
                                                    <li><a href="events.html">Events</a></li>
                                                    <li><a href="pet-event.html">Events 01</a></li>
                                                    <li><a href="event-single.html">Event Detail</a></li>
                                                    <li><a href="event-profile.html">Event Detail 01</a></li>
                                                    <li><a href="calculator.html">Calories Calculator</a></li>
                                                    <li><a href="pet-calorie.html">Calories Calculator 01</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown"><a href="#">Blog</a>
                                                <ul>
                                                    <li><a href="blog.html">Our Blog</a></li>
                                                    <li><a href="blog2.html">Blog 02</a></li>
                                                    <li><a href="pet-blog.html">Blog 03</a></li>
                                                    <li><a href="pet-blog2.html">Blog 04</a></li>
                                                    <li><a href="blog-leftsidebar.html">Blog Right Sidebar</a></li>
                                                    <li><a href="pet-blog-right.html">Blog Right Sidebar 01</a></li>
                                                    <li><a href="blog-single.html">Blog Single</a></li>
                                                    <li><a href="blog-profile.html">Blog Single 01</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="{{'login'}}">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--End Header Upper-->
            @yield('content')
        <!--Main Footer-->
        <footer class="main-footer">
            <div class="auto-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">
                        <!--big column-->
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <!--Footer Column-->
                                <div class="footer-column col-md-7 col-sm-6 col-xs-12">
                                    <div class="footer-widget logo-widget">
                                        <div class="logo">
                                            <a href="index.html"><img src="images/footer-logo.png" alt="" /></a>
                                        </div>
                                        <div class="text">This prodigiously grew tortoise charact stupidly pernicious
                                            jeepers along while accordingly under useful much salacious walking fars
                                            before some supp aesthetically wow shuddered.</div>
                                        <ul class="social-icon-two">
                                            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                            <li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                                            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                                            <li><a href="#"><span class="fa fa-youtube-play"></span></a></li>
                                            <li><a href="#"><span class="fa fa-pinterest-p"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--Footer Column-->
                                <div class="footer-column col-md-5 col-sm-6 col-xs-12">
                                    <div class="footer-widget links-widget">
                                        <h2>Web Links</h2>
                                        <ul class="links">
                                            <li><a href="index.html">Home Page</a></li>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="services.html">Our Services</a></li>
                                            <li><a href="blog.html">Our News</a></li>
                                            <li><a href="contact.html">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--big column-->
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget posts-widget">
                                        <h2>Recent Posts</h2>
                                        <!--Widget Post-->
                                        <article class="widget-post">
                                            <figure class="post-thumb"><a href="blog-single.html"><img
                                                        src="images/resource/post-thumb-1.jpg" alt=""></a></figure>
                                            <div class="text"><a href="blog-single.html">We have best Pet Grooming
                                                    Services</a></div>
                                            <div class="post-info">Feb 15, 2021</div>
                                        </article>
                                        <!--Widget Post-->
                                        <article class="widget-post">
                                            <figure class="post-thumb"><a href="blog-single.html"><img
                                                        src="images/resource/post-thumb-2.jpg" alt=""></a></figure>
                                            <div class="text"><a href="blog-single.html">Less tme is required for cat
                                                    grooming</a></div>
                                            <div class="post-info">Feb 15, 2021</div>
                                        </article>
                                    </div>
                                </div>
                                <!--Footer Column-->
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget info-widget">
                                        <h2>Get In Touch</h2>
                                        <ul>
                                            <li><span class="icon fa fa-map-marker"></span>32 BellSouth, Harley Street
                                                <br> Florida 33968</li>
                                            <li>
                                                <span class="icon fa fa-phone"></span>
                                                <a href="tel:+12345678900">+(1) 234 567 8900 </a>
                                            </li>
                                            <li>
                                                <span class="icon fa fa-envelope"></span>
                                                    <a href="mailto:support@pawrex.com"> support@pawrex.com </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="copyright">Copyrights 2021 <span>PAWREX</span> • All Rights Reserved.</div>
                </div>
            </div>
        </footer>
        <!--End Main Footer-->
    </div>
    <!--End pagewrapper-->
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" style="background-color:#B8205B;border-color: #B8205B; " data-bs-target="html"><span class="icon flaticon-pawprint-1"></span></div>
    <!-- Color Palate / Color Switcher -->
    <!-- <div class="color-palate">
        <div class="color-trigger">
            <i class="flaticon-pawprint-1"></i>
        </div>
        <div class="color-palate-head">
            <h6>Choose Your Color</h6>
        </div>
        <div class="various-color clearfix">
            <div class="colors-list">
                <span class="palate default-color active" data-theme-file="css/color-themes/default-theme.css"></span>
                <span class="palate green-color" data-theme-file="css/color-themes/green-theme.css"></span>
                <span class="palate blue-color" data-theme-file="css/color-themes/blue-theme.css"></span>
                <span class="palate orange-color" data-theme-file="css/color-themes/orange-theme.css"></span>
                <span class="palate purple-color" data-theme-file="css/color-themes/purple-theme.css"></span>
                <span class="palate teal-color" data-theme-file="css/color-themes/teal-theme.css"></span>
                <span class="palate brown-color" data-theme-file="css/color-themes/brown-theme.css"></span>
                <span class="palate redd-color" data-theme-file="css/color-themes/redd-color.css"></span>
            </div>
        </div>
        <a href="#" class="purchase-btn">Purchase now $17</a>
        <div class="palate-foo">
            <span>You will find much more options for colors and styling in admin panel. This color picker is used only
                for demonstation purposes.</span>
        </div>
    </div> -->
    <script src="{{ asset('peddyhub/js/jquery.js') }}"></script>
    <!--Revolution Slider-->
    <script src="{{ asset('peddyhub/plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ asset('peddyhub/plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/main-slider-script.js') }}"></script>
    <script src="{{ asset('peddyhub/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('peddyhub/js/owl.js') }}"></script>
    <script src="{{ asset('peddyhub/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('peddyhub/js/appear.js') }}"></script>
    <script src="{{ asset('peddyhub/js/wow.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/gallery.js') }}"></script>
    <script src="{{ asset('peddyhub/js/script.js') }}"></script>
    <script src="{{ asset('peddyhub/js/color-settings.js') }}"></script>   
    <script src="{{ asset('peddyhub/js/jquery.js') }}"></script>
    <script src="{{ asset('peddyhub/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/mousewheel.js') }}"></script>
    <script src="{{ asset('peddyhub/js/vivus.min.js') }}"></script>
    <script src="{{ asset('peddyhub/js/validate.js') }}"></script>
</body>

</html>