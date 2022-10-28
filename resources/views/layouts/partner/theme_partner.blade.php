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
    <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Laila:wght@700&family=Mitr&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@600;700;800&family=Prompt:wght@500&display=swap" rel="stylesheet">
	<title>Partner Admin</title>

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

        .main-shadow {
		   	box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.15), 0 4px 10px 0 rgba(0, 0, 0, 0.15);
		}

		 .main-radius {
		    border-radius: 5px;
		}
	</style>
</head>

<body>
	<!--wrapper-->
	@php
	$user = \Illuminate\Support\Facades\Auth::user();
	$partner = \App\Models\Partner::where('id' , '=' ,$user->partner)->get();
	@endphp
	@foreach($partner as $item)
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div id="switcher-wrapper_menu" class="sidebar-wrapper" data-simplebar="true">
						
			<div class="sidebar-header"id="header-wrapper_menu">
				<div>
					<a href="{{ url('/partner_index') }}" >
						<img src="{{ url('storage')}}/{{ $item->logo }}" class="logo-icon" alt="logo icon">
					</a>
				</div>
				<div>
					<a href="{{ url('/partner_index') }}" >
						<h4 class="logo-text" style="white-space: nowrap; width: 150px; overflow: hidden;text-overflow: clip; ">{{$item->name}}</h4>
					</a>
				</div>
				<div class="toggle-icon ms-auto"><i class="bx bx-first-page"></i>
				</div>
			</div>
			@endforeach
	
			<!--navigation-->
			<ul class="metismenu" id="menu" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
				<li>
					<a href="{{ url('/dashboard_partner') }}">
						<div class="parent-icon"><i class="fa-regular fa-house"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">Dashboard</div>
					</a>
				</li>
				@if (Auth::user()->role == 'admin-partner')
					<li class="menu-label" style="font-size:18px;color:#B8205B;padding-top:12px;text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
	                    Admin
	                </li>
	                <li>
						<a href="{{ url('/manage_user_partner') }}">
							<div class="parent-icon"><i class="fa-solid fa-users-gear"></i>
							</div>
							<div class="menu-title" style="font-size:18px;">จัดการผู้ใช้</div>
						</a>
					</li>
					<li>
						<!-- <a href="{{ url('/lost_pet_by_partner') }}"> -->
						<a href="{{ url('/lost_pet_partner/index_partner') }}">
							<div class="parent-icon">
								<i class="fa-regular fa-magnifying-glass-location"></i>
							</div>
							<div class="menu-title" style="font-size:18px;">ตามหาสัตว์หาย</div>
						</a>
					</li>
					<li>
						<a href="{{ url('adoptpet/create') }}" target="bank">
							<div class="parent-icon">
								<i class="fa-solid fa-dog-leashed"></i>
							</div>
							<div class="menu-title" style="font-size:18px;">Adoption</div>
						</a>
					</li>
				@endif
				<li class="menu-label" style="font-size:18px;color:#B8205B;padding-top:12px;text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
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
				<li class="menu-label" style="font-size:18px;color:#B8205B;padding-top:12px;text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
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
                <li class="menu-label" style="font-size:18px;color:#B8205B;padding-top:12px;text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                    การใช้งาน
                </li>
                <li>
					<a href="{{ url('/media') }}">
						<div class="parent-icon"><i class="fa-regular fa-photo-film"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">สื่อประชาสัมพันธ์</div>
					</a>
				</li>
				<li>
					<a href="{{ url('/how_to_use_partner') }}">
						<div class="parent-icon"><i class="fa-regular fa-book"></i>
						</div>
						<div class="menu-title" style="font-size:18px;">วิธีใช้งาน</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div id="div_color_navbar" class="topbar d-flex align-items-center" style="">
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
                        <span class="text-secondary" style="text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">
                        	{{ Auth::user()->profile->name }}
                        </span>
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
	<div class="switcher-wrapper">
		@if(Auth::check())
            @if(Auth::user()->role == "admin-partner")
				<div id="div_switcher" class="switcher-btn" onclick="change_color();" style=""> 
					<i class='bx bx-cog bx-spin'></i>
				</div>
			@endif
		@endif
		<div class="switcher-body">
			<div class="d-flex align-items-center">
				<h5 class="mb-0 text-uppercase">เครื่องมือปรับแต่งธีม</h5>
				<button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
			</div>
			<hr/>
			<h6 class="mb-0">
				พื้นหลังส่วนหัว
				<i class="fas fa-sync-alt btn" style="float: right;" onclick="random_color();"></i>
			</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator" id="color_item_1"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_2"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_3"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_4"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_5"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_6"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_7"></div>
					</div>
					<div class="col">
						<div class="indigator" id="color_item_8"></div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col-5">
								<div style="float: right;" class="indigator" id="color_item_Ex"></div>
							</div>
							<div class="col-7">
								<input style="margin-top:5px;" type="text" class="form-control" id="code_color" name="code_color" placeholder="color code" oninput="add_color_item_Ex();">
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr/>
			<h6 class="mb-0">พื้นหลังแถบเมนู</h6>
			<hr/>
			<div class="header-colors-indigators">
				<div class="row row-cols-auto g-3">
					<div class="col">
						<div class="indigator sidebarcolor1" id="sidebarcolor1" onclick="add_input_color_menu('1')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor2" id="sidebarcolor2" onclick="add_input_color_menu('2')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor3" id="sidebarcolor3" onclick="add_input_color_menu('3')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor4" id="sidebarcolor4" onclick="add_input_color_menu('4')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor5" id="sidebarcolor5" onclick="add_input_color_menu('5')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor6" id="sidebarcolor6" onclick="add_input_color_menu('6')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor7" id="sidebarcolor7" onclick="add_input_color_menu('7')"></div>
					</div>
					<div class="col">
						<div class="indigator sidebarcolor8" id="sidebarcolor8" onclick="add_input_color_menu('8')"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
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
@foreach($partner as $item)
<input type="text" class="" name="user_organization" id="user_organization" value="{{ $item->name }}">
@endforeach
<input id="color_of_partner" type="text" class="d-none" name="" value="">
<input id="class_color_menu" type="text" class="d-none" name="" value="">
<input id="check_name_partner" type="hidden" name="" value="">
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
    <script src="{{ asset('admin/assets/js/index2.js') }}"></script>
        <script>
            new PerfectScrollbar('.customers-list');
            new PerfectScrollbar('.store-metrics');
            new PerfectScrollbar('.product-list');
        </script>
	<script>
		new PerfectScrollbar('.dashboard-top-countries');
	</script>
	<script src="{{ asset('admin/js/index.js') }}"></script>
	<!--app JS-->
	<script src="{{ asset('admin/js/app.js') }}"></script>
    <script>
		document.addEventListener('DOMContentLoaded', (event) => {
			// console.log("START");
			check_data_partner();
    	});

		function change_color()
    {
        let delayInMilliseconds = 500; //0.5 second

        setTimeout(function() {
            random_color();
        }, delayInMilliseconds);

    }

	function check_data_partner()
    {
    	let user_organization = document.querySelector('#user_organization').value ;
    	// console.log(user_organization);

    	fetch("{{ url('/') }}/api/check_data_partner/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                console.log(result[0]['class_color_menu']);
                let delayInMilliseconds = 200; 

		        setTimeout(function() {
		        	if (result[0]['class_color_menu'] !== "other"){
			    		document.querySelector('#sidebarcolor' + result[0]['class_color_menu'] ).click();
		        	}
		        }, delayInMilliseconds);
                document.querySelector('#color_of_partner').value = result[0]['name'];
                document.querySelector('#check_name_partner').value = result[0]['name'];
                document.querySelector('#class_color_menu').value = result[0]['class_color_menu'];
                document.querySelector('#div_color_navbar').style = "background: " + result[0]['color_navbar'] + ";" ;
                document.querySelector('#div_switcher').style = "background: " + result[0]['color_navbar'] + ";" ;
				
		});
    }
	function change_color()
    {
        let delayInMilliseconds = 500; //0.5 second

        setTimeout(function() {
            random_color();
        }, delayInMilliseconds);

    }
	function add_color_item_Ex()
    {
    	let code_color = document.querySelector('#code_color').value ;

    	let color_item_Ex = document.querySelector('#color_item_Ex');
            let color_item_Ex_style = document.createAttribute("style");
                color_item_Ex_style.value = "background-color:" + code_color + " ;";
                color_item_Ex.setAttributeNode(color_item_Ex_style); 
            let click_color_item_Ex = document.createAttribute("onclick");
                click_color_item_Ex.value = "add_input_color('" + code_color + "')";
                 color_item_Ex.setAttributeNode(click_color_item_Ex); 
    }

    function add_color_item_Ex_menu()
    {
    	let code_color_menu = document.querySelector('#code_color_menu').value ;

    	let color_item_Ex_menu = document.querySelector('#color_item_Ex_menu');
    		color_item_Ex_menu.style = "";
    		color_item_Ex_menu.onclick = "";

            let color_item_Ex_style_menu = document.createAttribute("style");
                color_item_Ex_style_menu.value = "background-color:" + code_color_menu + " ;";
                color_item_Ex_menu.setAttributeNode(color_item_Ex_style_menu); 
            let click_color_item_Ex_menu = document.createAttribute("onclick");
                click_color_item_Ex_menu.value = "add_input_color_menu('" + code_color_menu + "')";
                 color_item_Ex_menu.setAttributeNode(click_color_item_Ex_menu); 
    }

    function random_color()
    {
        let letters = '0123456789ABCDEF'.split('');
        let color = '#';

        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        add_color_to_item(color)
    }

    function add_color_to_item(color)
    {
        let text_color = color.split('');

        let color_1 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "FF" ;
        let color_2 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "CC" ;
        let color_3 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "99" ;
        let color_4 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "77" ;
        let color_5 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "55" ;
        let color_6 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "33" ;
        let color_7 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "11" ;
        let color_8 = text_color[0] + text_color[1] + text_color[2] + text_color[3] + text_color[4] + "00" ;

        // 1
        let color_item_1 = document.querySelector('#color_item_1');
            let color_item_1_style = document.createAttribute("style");
                color_item_1_style.value = "background-color:" + color_1 + " ;";
                color_item_1.setAttributeNode(color_item_1_style); 
            let click_color_item_1 = document.createAttribute("onclick");
                click_color_item_1.value = "add_input_color('" + color_1 + "')";
                 color_item_1.setAttributeNode(click_color_item_1); 

        // 2
        let color_item_2 = document.querySelector('#color_item_2');
            let color_item_2_style = document.createAttribute("style");
                color_item_2_style.value = "background-color:" + color_2 + " ;";
                color_item_2.setAttributeNode(color_item_2_style); 
            let click_color_item_2 = document.createAttribute("onclick");
                click_color_item_2.value = "add_input_color('" + color_2 + "')";
                 color_item_2.setAttributeNode(click_color_item_2); 

        // 3
        let color_item_3 = document.querySelector('#color_item_3');
            let color_item_3_style = document.createAttribute("style");
                color_item_3_style.value = "background-color:" + color_3 + " ;";
                color_item_3.setAttributeNode(color_item_3_style); 
            let click_color_item_3 = document.createAttribute("onclick");
                click_color_item_3.value = "add_input_color('" + color_3 + "')";
                 color_item_3.setAttributeNode(click_color_item_3); 

        // 4
        let color_item_4 = document.querySelector('#color_item_4');
            let color_item_4_style = document.createAttribute("style");
                color_item_4_style.value = "background-color:" + color_4 + " ;";
                color_item_4.setAttributeNode(color_item_4_style); 
            let click_color_item_4 = document.createAttribute("onclick");
                click_color_item_4.value = "add_input_color('" + color_4 + "')";
                 color_item_4.setAttributeNode(click_color_item_4); 

        // 5
        let color_item_5 = document.querySelector('#color_item_5');
            let color_item_5_style = document.createAttribute("style");
                color_item_5_style.value = "background-color:" + color_5 + " ;";
                color_item_5.setAttributeNode(color_item_5_style); 
            let click_color_item_5 = document.createAttribute("onclick");
                click_color_item_5.value = "add_input_color('" + color_5 + "')";
                 color_item_5.setAttributeNode(click_color_item_5); 

        // 6
        let color_item_6 = document.querySelector('#color_item_6');
            let color_item_6_style = document.createAttribute("style");
                color_item_6_style.value = "background-color:" + color_6 + " ;";
                color_item_6.setAttributeNode(color_item_6_style); 
            let click_color_item_6 = document.createAttribute("onclick");
                click_color_item_6.value = "add_input_color('" + color_6 + "')";
                 color_item_6.setAttributeNode(click_color_item_6); 

        // 7
        let color_item_7 = document.querySelector('#color_item_7');
            let color_item_7_style = document.createAttribute("style");
                color_item_7_style.value = "background-color:" + color_7 + " ;";
                color_item_7.setAttributeNode(color_item_7_style); 
            let click_color_item_7 = document.createAttribute("onclick");
                click_color_item_7.value = "add_input_color('" + color_7 + "')";
                 color_item_7.setAttributeNode(click_color_item_7); 

        // 8
        let color_item_8 = document.querySelector('#color_item_8');
            let color_item_8_style = document.createAttribute("style");
                color_item_8_style.value = "background-color:" + color_8 + " ;";
                color_item_8.setAttributeNode(color_item_8_style); 
            let click_color_item_8 = document.createAttribute("onclick");
                click_color_item_8.value = "add_input_color('" + color_8 + "')";
                 color_item_8.setAttributeNode(click_color_item_8); 

    }

    function add_input_color(color)
    {
    	let div_color_navbar = document.querySelector('#div_color_navbar');
    		div_color_navbar.style = "";
    		div_color_navbar.style = "background-color:" + color + " ;";

    	let div_switcher = document.querySelector('#div_switcher');
    		div_switcher.style = "";
    		div_switcher.style = "background-color:" + color + " ;";

    		div_switcher

            color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

        fetch("{{ url('/') }}/api/change_color_navbar/"+ color + "/" + color_of_partner);
    }

    function add_input_color_menu(color)
    {
    	var header_wrapper_menu = document.querySelector('#header-wrapper_menu');

    	switch (color) {
			case "1":
			    color = "#null" ;
			    class_color_menu = "1"
			    	header_wrapper_menu.style = "" ;
			break;
			case "2":
			    color = "#null" ;
			    class_color_menu = "2"
			    	header_wrapper_menu.style = "" ;
			break;
			case "3":
			    color = "#null" ;
			    class_color_menu = "3"
			    	header_wrapper_menu.style = "" ;
			break;
			case "4":
			    color = "#null" ;
			    class_color_menu = "4"
			    	header_wrapper_menu.style = "" ;
			break;
			case "5":
			    color = "#null" ;
			    class_color_menu = "5"
			    	header_wrapper_menu.style = "" ;
			break;
			case "6":
			    color = "#null" ;
			    class_color_menu = "6"
			    	header_wrapper_menu.style = "" ;
			break;
			case "7":
			    color = "#null" ;
			    class_color_menu = "7"
			    	header_wrapper_menu.style = "" ;
			break;
			case "8":
			    color = "#null" ;
			    class_color_menu = "8"
			    	header_wrapper_menu.style = "" ;
			break;
			default:
			    color = color ;
			    class_color_menu = "other"

			    let html_class = document.querySelector('#html_class');

		    	let html_class_class_1 = document.createAttribute("class");
            		html_class_class_1.value = "";
            		html_class.setAttributeNode(html_class_class_1);

            	let html_class_class_2 = document.createAttribute("class");
            		html_class_class_2.value = "";
            		html_class.setAttributeNode(html_class_class_2); 

			    let switcher_wrapper_menu = document.querySelector('#switcher-wrapper_menu');
			    	switcher_wrapper_menu.style = "" ;
			    	switcher_wrapper_menu.style = "background-color: " + color + ";" ;

			    	header_wrapper_menu.style = "" ;
			    	header_wrapper_menu.style = "background-color: " + color + ";" ;

			    	
		}

    	

        color = color.replace("#","_");

    	let color_of_partner = document.querySelector('#color_of_partner');
            color_of_partner = color_of_partner.value.replaceAll(" ","_");

		// console.log(color);
  //   	console.log(color_of_partner);
  //   	console.log(class_color_menu);

        fetch("{{ url('/') }}/api/change_color_menu/"+ color + "/" + color_of_partner + "/" + class_color_menu);
    }
	</script>
</body>

</html>