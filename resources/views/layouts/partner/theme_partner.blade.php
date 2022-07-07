<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="shortcut icon" href="{{ asset('/img/logo/logo_x-icon.png') }}" type="image/x-icon" />
	<!--plugins-->
	<link href="{{ asset('/admin/plugins/simplebar/css/simplebar.css') }}">
	<link href="{{ asset('/admin/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('/admin/plugins/highcharts/css/highcharts.css') }}" rel="stylesheet" />
	<link href="{{ asset('/admin/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('/admin/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('/admin/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('/admin/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('/admin/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('/admin/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/admin/css/icons.css') }}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{ asset('/admin/css/dark-theme.css') }}" />
	<link rel="stylesheet" href="{{ asset('/admin/css/semi-dark.css') }}" />
	<link rel="stylesheet" href="{{ asset('/admin/css/header-colors.css') }}" />
    <!-- fontawesome icon -->
    <link href="https://kit-pro.fontawesome.com/releases/v6.0.0/css/pro.min.css" rel="stylesheet">
    
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
	<title>Partner Viicheck</title>

	<style>
		.notify_alert{
          animation-name: notify_alert;
          color: red;
          animation-duration: 4s;
          animation-iteration-count: 99;
        }

        @keyframes notify_alert {
          0%   {color: red;}
          20%  {color: yellow;}
          40%  {color: red;}
          60% {color: yellow;}
          80%   {color: red;}
          100%  {color: yellow;}

        }
	</style>
</head>

<body>
	<!--wrapper-->
	
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
                    <div>
                        
                    </div>
                    <div>
                        <a href="{{ url('/partner_index') }}" >
						@php
						$user = \Illuminate\Support\Facades\Auth::user();
						$partner = \App\Models\Partner::where('id' , '=' ,$user->partner)->get();
						@endphp
						<a href="{{ url('/partner_index') }}" >
                            <h4 style="color:#b8205b;font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
								@foreach($partner as $item)
									{{$item->name}}
								@endforeach
							</h4>
                        </a>
                    </div>
                <div class="toggle-icon ms-auto">
                    <i class='bx bx-first-page'></i>
                </div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
				<li class="menu-label" style="font-size:18px;color:#B8205B">
                    Check In/Out 
                </li>
                <li>
					<a href="{{ url('/check_in_admin') }}">
						<div class="parent-icon"><i class="fa-regular fa-location-dot"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">Check In/Out</div>
					</a>
				</li>
				<li>
					<a href="{{ url('/check_in/add_new_check_in') }}">
						<div class="parent-icon"><i class="fas fa-qrcode"></i>
						</div>
						<div class="menu-title">เพิ่มจุด Check in</div>
					</a>
				</li>
				<li>
					<a href="{{ url('/check_in/gallery') }}">
						<div class="parent-icon"><i class="far fa-images"></i>
						</div>
						<div class="menu-title">คลังภาพ Check in</div>
					</a>
				</li>
				<li class="menu-label" style="font-size:18px;color:#B8205B">
                    Shop 
                </li>
				<li>
					<a href="{{ url('/product_admin') }}">
						<div class="parent-icon"><i class="fa-solid fa-hand-holding-box"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">Product</div>
					</a>
				</li>
                <li>
					<a href="{{ url('/order_admin') }}">
						<div class="parent-icon"><i class="fa-solid fa-cart-shopping"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">Order</div>
					</a>
				</li>
                <li class="menu-label" style="font-size:18px;color:#B8205B">
                    การใช้งาน
                </li>
                <li>
					<a href="{{ url('/media') }}">
						<div class="parent-icon"><i class="fa-regular fa-photo-film"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">สื่อประชาสัมพันธ์</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="topbar d-flex align-items-center" >
				<nav class="navbar navbar-expand" >
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>
					<div class="search-bar flex-grow-1 header-notifications-list header-message-list">
						<div class="position-relative search-bar-box">
							<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class='bx bx-search'></i></span>
							<span class="position-absolute top-50 search-close translate-middle-y"><i class='bx bx-x'></i></span>
						</div>
					</div>
					<div class="top-menu ms-auto">
					</div>
					<div class="user-box dropdown">
						<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }}
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                                </form>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content" style="margin-top:-25px;">
				<br>
			  	@yield('content')
			  
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<!-- <p class="mb-0">Copyright © 2021. All right reserved.</p> -->
		</footer>
	</div>
	
	<!--end wrapper-->
	<!--start switcher-->
	<!-- <div class="switcher-wrapper">
		<div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
		</div>
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">Theme Customizer</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">Theme Styles</h6>
			<hr/>
			<div class="d-flex align-items-center justify-content-between">
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked>
					<label class="form-check-label" for="lightmode">Light</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
					<label class="form-check-label" for="darkmode">Dark</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
					<label class="form-check-label" for="semidark">Semi Dark</label>
				</div>
			</div>
			<hr/>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
				<label class="form-check-label" for="minimaltheme">Minimal Theme</label>
			</div>
			<hr/>
			<h6 class="mb-0">Header Colors</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator headercolor1" id="headercolor1"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor2" id="headercolor2"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor3" id="headercolor3"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor4" id="headercolor4"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor5" id="headercolor5"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor6" id="headercolor6"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor7" id="headercolor7"></div>
					</div>
					<div class="col">
						<div class="indigator headercolor8" id="headercolor8"></div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">Sidebar Backgrounds</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
	
	<!--end switcher-->
    <!-- modal_change_color -->
    <div class="modal fade" id="modal_change_color" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">เลือกสีที่คุณต้องการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-12">
                                <center>
                                    <div class="menu">
                                        <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" checked="" />
                                        <label class="menu-open-button" for="menu-open" onclick="change_color();"> 
                                            <i class="fas fa-sync-alt text-info"></i>
                                        </label>
                                        <a id="fa_item_1" href="#" class="menu-item item-1"> 
                                            <i class="fa fa"></i><span id="text_item_1"></span>
                                        </a>
                                        <a id="fa_item_2" href="#" class="menu-item item-2"> 
                                            <i class="fa fa"></i> <span id="text_item_2"></span>
                                        </a> 
                                        <a id="fa_item_3" href="#" class="menu-item item-3"> 
                                            <i class="fa fa"></i> <span id="text_item_3"></span>
                                        </a> 
                                        <a id="fa_item_4" href="#" class="menu-item item-4"> 
                                            <i class="fa fa"></i> <span id="text_item_4"></span>
                                        </a> 
                                        <a id="fa_item_5" href="#" class="menu-item item-5"> 
                                            <i class="fa fa"></i> <span id="text_item_5"></span>
                                        </a> 
                                        <a id="fa_item_6" href="#" class="menu-item item-6"> 
                                            <i class="fa fa"></i> <span id="text_item_6"></span>
                                        </a> 
                                    </div>
                                </center>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <div class="col-3"></div>
                            <div class="col-2">
                                <i id="circle_color" class="fas fa-circle" style="font-size:45px;"></i>
                            </div>
                            <div class="col-4">
                                <input class="form-control" type="text" name="" id="input_color" oninput="view_color();">
                            </div>
                            <div class="col-1">
                                <!-- <button class="btn btn-sm btn-outline-success" onclick="view_color();">ดู</button> -->
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button id="bnt_sub_color" type="button" class="btn btn-primary d-none" onclick="submit_color();">ตกลง</button>
                  </div>
                </div>
              </div>
            </div>



    <!-- Button trigger modal -->
	<button id="btn_modal_notify" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_notify">
	</button>

	<!-- Modal -->
	<div class="modal fade " id="modal_notify" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
	    <div class="modal-content">
	      	<div class="modal-header " style="background-color:#D85261;">
	        	<h4 class="modal-title text-white text-center"  id="exampleModalLabel"> <b>แจ้งเตือน<br>การขอความช่วยเหลือ</b> </h4>
				<img width="45%" src="{{ asset('/img/stickerline/PNG/21.png') }}">
	      	</div>
	      	<div class="modal-body text-center" style="padding:0px;">
			  <br>
			  <div class="row">
				  <div class="col-12">
                    <h2 class="text-info"><b id="modal_notify_name"></b>
						<button type="button" class="btn btn-primary text-center d-none" id="btn_modal_notify_img" data-toggle="modal" data-target="#asd" style="border-radius: 50px;">
							<i class="fad fa-images"></i>
						</button>
					</h2>
				</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0">เวลา</h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_time"></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0">เบอร์</h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_phone"></span>
						</li>
						<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
							<h4 class="mb-0">สถานที่</h4>
							<span class="text-secondary" style="font-size:25px;" id="modal_notify_name_area"></span>
						</li>
					</ul>
				</div>
	      	</div>
	     	<div class="modal-footer">
	        <button type="button" style="border-radius: 25px; background-color:#408AF4" class="btn text-white" onclick="document.querySelector('#div_menu_help_1').click();"><i class="fal fa-eye"></i>ดูข้อมูล</button>
	        <a id="tag_a_link_ggmap" target="bank" class="btn text-white" style="border-radius: 25px; background-color:#26A664"><i class="far fa-map-marker-alt"></i>ดูแผนที่</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="asd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-sm " role="document"style="right: -411px;z-index: 10040;">
    <div class="modal-content">
      <div class="modal-body text-center" style="padding:0px;">
        <img src="" alt="" id="modal_notify_img">
      </div>
    </div>
  </div>
</div>
	<!-- Bootstrap JS -->
	<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
	<script src="{{ asset('admin/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
	<script src="{{ asset('admin/plugins/highcharts/js/highcharts.js') }}"></script>
	<script src="{{ asset('admin/plugins/highcharts/js/exporting.js') }}"></script>
	<script src="{{ asset('admin/plugins/highcharts/js/variable-pie.js') }}"></script>
	<script src="{{ asset('admin/plugins/highcharts/js/export-data.js') }}"></script>
	<script src="{{ asset('admin/plugins/highcharts/js/accessibility.js') }}"></script>
	<script src="{{ asset('admin/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
	<script src="{{ asset('admin/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/js/app.js') }}"></script>
    
</body>

</html>