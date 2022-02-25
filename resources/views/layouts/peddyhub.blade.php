
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="utf-8">
    <title>PeddyHub</title>
    <!-- icon -->

    <link href="https://kit-pro.fontawesome.com/releases/v6.0.0/css/pro.min.css" rel="stylesheet">
    <!-- Stylesheets -->
    <link href="{{ asset('peddyhub/css/imagehover.css') }}" rel="stylesheet">
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
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100&display=swap" rel="stylesheet">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@500&display=swap" rel="stylesheet">
</head>
<style>
    .goog-logo-link {
            display:none !important;
        } 
            
    .goog-te-gadget {
            color: transparent !important;
        }

    .goog-te-banner-frame.skiptranslate {
        display: none !important;
        } 
    .main-shadow{
            box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
        }
    .main-radius{
        border-radius: 5px;
    }
</style>
<body>
    
<div class="main-wrapper pet">

        <div id="preloading"></div>

        <section class="featured">
            <div class="header" style="padding-bottom:10px;">
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            
                        <img src="{{ url('/peddyhub/images/logo-4.png') }}" width="" alt="image of logo" title="logo"
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
                                    <a href="{{ url('/') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >หน้าแรก</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ url('/post') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >ชุมชน</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="{{ url('/adoptpet') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >อุปการะ</a>
                                </li>
                                @guest
                                    <li class="nav-item dropdown">
                                        <a href="{{'login'}}" class="hvr-overline-from-center nav-link dropdown-toggle"
                                            >เข้าสู่ระบบ</a>
                                    </li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a href="#" style="font-size: 20px; color:#B8205B;" class="hvr-overline-from-center nav-link dropdown-toggle notranslate"
                                            data-bs-toggle="dropdown">{{ Auth::user()->profile->name }}</a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ url('/user') }}">โปรไฟล์</a></li>
                                            <li><a href="{{ url('/pet') }}">สัตว์เลี้ยง</a></li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('ออกจากระบบ') }}
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="main-header" >
                    <div class="sticky-header" >
                        <div class="auto-container clearfix">
                            <!--Logo-->
                            <div class="logo pull-left">
                                <a href="{{ url('/') }}" class="img-responsive"><img src="{{ url('/peddyhub/images/home_5/logo.png') }}" alt="" width="15%" style="margin-bottom:-30px;"
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
                                    <div class="navbar-collapse clearfix ">
                                        <ul class="navigation clearfix">    
                                            <li class="d-none"><div id="google_translate_element" onchange="check_language();"></div></li>
                                            <li><a href="{{ url('/') }}">หน้าแรก</a></li>
                                            <li>
                                                <a href="{{ url('/post') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >ชุมชน</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a href="{{ url('/adoptpet') }}" class="hvr-overline-from-center nav-link dropdown-toggle" >อุปการะ</a>
                                            </li>
                                            @guest
                                                <li class="nav-item dropdown">
                                                    <a href="{{'login'}}" class="hvr-overline-from-center nav-link dropdown-toggle"
                                                        >LOGIN</a>
                                                </li>
                                            @else
                                                <li class="nav-item dropdown">
                                                    <a href="#" style="color:#B8205B;" class="notranslate hvr-overline-from-center nav-link dropdown-toggle"
                                                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="{{ url('/user') }}">โปรไฟล์</a></li>
                                                        <li><a href="{{ url('/pet') }}">สัตว์เลี้ยง</a></li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                {{ __('ออกจากระบบ') }}
                                                            </a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                                @csrf
                                                            </form>
                                                        </li>   
                                                    </ul>
                                                </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::check())
      <h1 class="d-none" id="change_country" onclick="change_country('{{ Auth::user()->id }}','{{ Auth::user()->country }}' , '{{ Auth::user()->profile->language }}');"></h1> 
      <div class="d-none">
        <a id="btn_change_language_th" href="javascript:trocarIdioma('th')">th</a>
        <a id="btn_change_language_en" href="javascript:trocarIdioma('en')">en</a>
        <a id="btn_change_language_zh-TW" href="javascript:trocarIdioma('zh-TW')">zh-TW</a>
        <a id="btn_change_language_ja" href="javascript:trocarIdioma('ja')">ja</a>
        <a id="btn_change_language_ko" href="javascript:trocarIdioma('ko')">ko</a>
        <a id="btn_change_language_es" href="javascript:trocarIdioma('es')">es</a>
        <a id="btn_change_language_lo" href="javascript:trocarIdioma('lo')">lo</a>
        <a id="btn_change_language_my" href="javascript:trocarIdioma('my')">my</a>
        <a id="btn_change_language_de" href="javascript:trocarIdioma('de')">de</a>
        <a id="btn_change_language_ar" href="javascript:trocarIdioma('ar')">ar</a>
        <a id="btn_change_language_hi" href="javascript:trocarIdioma('hi')">hi</a>
        <a id="btn_change_language_ru" href="javascript:trocarIdioma('ru')">ru</a>
      </div>
      <!-- Button trigger modal -->
      <button id="btn_select_language" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModal">
          BTN เลือกภาษา
        </button>
        <!-- Modal -->
        <div style="z-index:999999;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  <img width="35" src="{{ url('peddyhub/images/national-flag/translation.png') }}">
                  &nbsp;
                  <span class="notranslate">Please select language</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                  <!----------------------------------------------- pc ----------------------------------------------->
              <div class="modal-body d-none d-lg-block">
                <div class="col-12">
                  <div class="row text-center">
                    <div class="col-4">
                      <div class="btn" style="margin-left:-10px;" onclick="user_language('en', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="60" src="{{ url('/peddyhub/images/national-flag/flex-en.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">English</h5>
                      </div>
                    </div>
                    <div class="col-4 ">
                      <div class="btn" onclick="user_language('zh-TW', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-zh-TW.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">中國人</h5>
                      </div>
                    </div>
                    <div class="col-4 ">
                      <div class="btn" onclick="user_language('hi', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-in.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">इंडिया</h5>
                      </div>
                    </div>
                    <div class="col-4 ">
                      <div class="btn"style="margin-left:-10px;" onclick="user_language('ar', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ar.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">عرب</h5>
                      </div>
                    </div>
                    <div class="col-4 ">
                      <div class="btn" onclick="user_language('ru', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ru.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">Россия</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn"  onclick="user_language('es', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-es.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">Español</h5>
                      </div>
                    </div>
                    <div class="col-4" style="left:-15px">
                      <div class="btn" onclick="user_language('de', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="60" src="{{ url('/peddyhub/images/national-flag/flex-de.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:22px;">Deutschland</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('ja', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ja.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">日本</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('ko', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ko.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">한국인</h5>
                      </div>
                    </div>
                    <div class="col-4" style="left:-5px">
                      <div class="btn" onclick="user_language('th', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-th.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">ไทย</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('lo', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-la.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">ລາວ</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('mr', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-mm.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:18px;">မြန်မာပြည်</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  <!----------------------------------------------- end pc ----------------------------------------------->
              <!--------------------------------------------------- mobile --------------------------------------------------->
               <div class="modal-body d-block d-md-none">
                <div class="col-12">
                  <div class="row text-center">
                    <div class="col-4" style="top:2px;left:-5px">
                      <div class="btn"  onclick="user_language('en', '{{ Auth::user()->id }}');"  data-dismiss="modal">
                        <img width="60" src="{{ url('/peddyhub/images/national-flag/flex-en.PNG') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">English</h5>
                      </div>
                    </div>
                    <div class="col-4 " style="top:5px;padding:0px;" >
                      <div class="btn"style="margin-left:3px;" onclick="user_language('zh-TW', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="60" src="{{ url('/peddyhub/images/national-flag/flex-zh-TW.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:18px;">&nbsp;中國人&nbsp;</h5>
                      </div>
                    </div>
                    <div class="col-4" style="top:3px;">
                      <div class="btn"style="margin-top:5px;" onclick="user_language('hi', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-in.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">इंडिया</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('ar', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="65" src="{{ url('/peddyhub/images/national-flag/flex-ar.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">&nbsp;عرب&nbsp;</h5>
                      </div>
                    </div>
                    <div class="col-4 " style="left:-8px;">
                      <div class="btn" style="margin-left:-5px;" onclick="user_language('ru', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="50" src="{{ url('/peddyhub/images/national-flag/flex-ru.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">Россия</h5>
                      </div>
                    </div>
                    <div class="col-4" style="left:-8px;top:-5px;">
                      <div class="btn"  onclick="user_language('es', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="58" src="{{ url('/peddyhub/images/national-flag/flex-es.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">Español</h5>
                      </div>
                    </div>
                    <div class="col-4" style="left:-15px">
                      <div class="btn" onclick="user_language('de', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="60" src="{{ url('/peddyhub/images/national-flag/flex-de.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:16px;">Deutschland</h5>
                      </div>
                    </div>
                    <div class="col-4" style="padding:0px;">
                      <div class="btn" onclick="user_language('ja', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ja.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:16px;">日本</h5>
                      </div>
                    </div>
                    <div class="col-4"  style="padding:0px;">
                      <div class="btn" onclick="user_language('ko', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-ko.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">한국인</h5>
                      </div>
                    </div>
                    <div class="col-4" style="left:-5px ; top:-2px">
                      <div class="btn" onclick="user_language('th', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-th.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">&nbsp;&nbsp;ไทย&nbsp;&nbsp;</h5>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="btn" onclick="user_language('lo', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-la.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;">&nbsp;&nbsp;ລາວ&nbsp;&nbsp;</h5>
                      </div>
                    </div>
                    <div class="col-4"style="padding:0px;">
                      <div class="btn" onclick="user_language('mr', '{{ Auth::user()->id }}');" data-dismiss="modal">
                        <img width="55" src="{{ url('/peddyhub/images/national-flag/flex-mm.png') }}">
                        <br>
                        <h5 class="notranslate" style="margin-top:10px;font-size:16px;">မြန်မာပြည်</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-------------------------------------------------- End Mobile -------------------------------------------------->
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div> -->
            </div>
          </div>
        </div>
      @endif
        <!--End Header Upper-->
            @yield('content')
        <!--Main Footer-->
        <footer class="main-footer">
            <div class="auto-container">
                <!--Widgets Section-->
                <!-- <div class="widgets-section">
                    <div class="row clearfix">
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
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
                        <div class="big-column col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                                    <div class="footer-widget posts-widget">
                                        <h2>Recent Posts</h2>
                                        <article class="widget-post">
                                            <figure class="post-thumb"><a href="blog-single.html"><img
                                                        src="images/resource/post-thumb-1.jpg" alt=""></a></figure>
                                            <div class="text"><a href="blog-single.html">We have best Pet Grooming
                                                    Services</a></div>
                                            <div class="post-info">Feb 15, 2021</div>
                                        </article>
                                        <article class="widget-post">
                                            <figure class="post-thumb"><a href="blog-single.html"><img
                                                        src="images/resource/post-thumb-2.jpg" alt=""></a></figure>
                                            <div class="text"><a href="blog-single.html">Less tme is required for cat
                                                    grooming</a></div>
                                            <div class="post-info">Feb 15, 2021</div>
                                        </article>
                                    </div>
                                </div>
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
                </div> -->
                <div class="col-12 footer-bottom d-flex justify-content-start">
                    <div class="copyright">WWW.PEDDYHUB.COM <span>•</span> 
                        <a href="{{'privacy_policy'}}">
                            <span>นโยบายเกี่ยวกับข้อมูลส่วนบุคคล</span>
                        </a>
                        <span>•</span> 
                        <a href="{{'terms_of_service'}}">
                            <span>ข้อกำหนดและเงื่อนไขการใช้บริการ</span>
                        </a>
                    </div>
                    <div class="col-1" style="margin-left:10px;">
                        <a href="https://www.trustmarkthai.com/callbackData/popup.php?data=e344-28-5-49449596d2ceb578b715eeb176566617f8eaa34dd" target="bank">
                            <img width="100%" src="{{ asset('peddyhub/images/home_5/bns_registered.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-12 text-center" style="top:-25px;">
                    <p class="copyright">รูปภาพที่ใช้ในการพัฒนาในเว็บไซต์ อ้างอิงจาก https://www.manoonpetshop.co.th/</p>
                </div>
            </div>
        </footer>
        <!--End Main Footer-->
    </div>
    <!--End pagewrapper-->
    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" style="background-color:#B8205B;border-color: #B8205B; " data-bs-target="html">
        <div class="row">
            <p style="margin-top:5px; color:white; ">top</p><br>
            <p  style="margin-top:-38px; color:white; font-size:20px" class="icon flaticon-pawprint-1"></p>
        </div>
    </div>
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
    <script src="{{ asset('peddyhub/js/jquery.countdown.js') }}"></script>
    <script type="text/javascript">
    var comboGoogleTradutor = 'null'; //Varialvel global

    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'po',
            // includedLanguages: 'th,en,zh-TW,ja,ko,es',
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');

        comboGoogleTradutor = document.getElementById("google_translate_element").querySelector(".goog-te-combo");
    }

    function changeEvent(el) {
        if (el.fireEvent) {
            el.fireEvent('onchange');
        } else {
            var evObj = document.createEvent("HTMLEvents");

            evObj.initEvent("change", false, true);
            el.dispatchEvent(evObj);
        }
    }

    function trocarIdioma(sigla) {
        if (comboGoogleTradutor) {
            comboGoogleTradutor.value = sigla;
            changeEvent(comboGoogleTradutor);//Dispara a troca
        }
    }
    </script>
    
    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


</body>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

      if (document.querySelector("#name_user")) {

        var name_user = document.querySelector("#name_user");

            fetch("{{ url('/') }}/api/explode_name/" + name_user.value)
                .then(response => response.text())
                .then(result => {
                    // console.log(result);
                    let input_name = document.querySelector("#input_name");
                    input_name.innerHTML = result;
                    
                });

            var status_user = document.querySelector('#status_user').value;
            var status_id = document.querySelector('#status_id').value;
      }

        if (status_user === 'expired') {
          document.querySelector('#btn_welcome_home').click();
          fetch("{{ url('/') }}/api/welcome_home/"+status_id+"/profile");
        }
    });

    if (document.querySelector("#change_country")) {

        document.querySelector("#change_country").click();
    }


function change_country(user_id, country , language) {

    // console.log(user_id);
    // console.log(country);
    // console.log(language);

    if (country === "") {
      fetch("{{ url('/') }}/api/change_country/"  + user_id );
    }

    if (language === "") {
        document.querySelector('#btn_select_language').click();
    }else {

      var delayInMilliseconds = 1500; //1.5 second

        setTimeout(function() {

          document.querySelector('#btn_change_language_' + language).click();

      }, delayInMilliseconds);
    }

}

function user_language(language, user_id) {

    console.log(language);
    console.log(user_id);

    fetch("{{ url('/') }}/api/user_language/"  + language + "/" + user_id);

    var delayInMilliseconds = 1500; //1.5 second

      setTimeout(function() {

        document.querySelector('#btn_change_language_' + language).click();

    }, delayInMilliseconds);
      
}
</script>

</body>

</html>