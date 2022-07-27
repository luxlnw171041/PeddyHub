@extends('layouts.peddyhub')
@section('content')
<style>


aside {
  float: left;
  padding: 1%;
  width: 100%;
}

.sticky {
  position: relative;
}

</style>
    <div class="about pet">
        <section class="service">
            <div class="container">
                <div class="heading text-center">
                    <p class="wow fadeInUp" style="visibility: visible;"><span class="purple"><i class="fas fa-paw"></i> </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                    <h4 class="wow fadeInDown" style="visibility: visible;">โรงพยาบาลสัตว์ใกล้ฉัน</h4>
                </div>
                <div class="row">
                    <div class="row col-12 d-none">
                        <input class="form-control col-4" name="lat" type="text" id="lat" value="13.7248936" >
                        <input class="form-control col-4" name="lng" type="text" id="lng" value="100.4930264" >
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <button id="btn_select_my_location" type="button" class="btn btn-danger wow fadeInUp" onclick="select_my_location();">
                            <i class="fa-solid fa-location-crosshairs"></i> เลือกจากตำแหน่งของฉัน
                        </button>
                        <button id="btn_select_location_by_T" type="button" class="btn btn-danger d-none wow fadeInUp" onclick="select_location_by_T();">
                            <i class="fa-solid fa-map-location-dot"></i> เลือกจากพื้นที่
                        </button>
                    </div>
                    <div class="col-12 col-md-10 col-lg-10 d-none" id="div_spinner">
                        <br>
                        <div class="spinner-border text-success"></div> &nbsp;&nbsp;กำลังค้นหา..
                        <br><br>
                    </div>
                    <br><br>
                    <hr class="col-11 col-md-11 col-lg-11" style="margin-left:15px;">
                    <div class="col-12 col-md-10 col-lg-10">
                        <!-- ตำแหน่งของฉัน -->
                        <div id="my_location" class="row d-none">
                            <div class="form-group col-lg-5 col-md-5 col-sm-12">
                                <input type="text" id="latlng" class="form-control" placeholder="ตำแหน่งของฉัน" readonly>
                            </div>
                            <div class="form-group col-lg-5 col-md-5 col-sm-12">
                                <select name="distance" id="distance" class="form-control d-none" required >
                                    <option value='15' selected="selected">15</option>
                                </select>
                            </div>
                        </div>

                        <!-- เลือกจากตำบล -->
                        <div id="location_by_T" class="row wow fadeInDown">
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <select name="select_province" id="select_province" class="form-control" onchange="select_A();" required>
                                    <option value="" selected>- เลือกจังหวัด -</option>
                                </select>
                                <input type="text" name="input_province" id="input_province" class="form-control d-none" readonly>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T();" required>
                                    <option value="" selected>- เลือกอำเภอ -</option>
                                </select>
                                <input type="text" name="input_amphoe" id="input_amphoe" class="form-control d-none" readonly>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                                <select name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng();" required>
                                    <option value="" selected>- เลือกตำบล -</option>
                                </select>
                                <input type="text" name="input_tambon" id="input_tambon" class="form-control d-none" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group d-none">
                    <button type="button" class="btn btn-outline-primary">ค้นหา</button>
                    <button type="button" class="btn btn-outline-danger">Reset</button>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInLeft main-content order-md-1 order-2">
                        <div id="div_recommend" class="">
                            @foreach($hospital_recommend as $item)
                                <div class="card main-shadow main-radius" onclick="view_markar('{{ $item->lat }}' , '{{ $item->lng }}','{{ $item->name }}');">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6>{{ $item->name }}</h6>
                                        </div>
                                        <div class="col-3">
                                            <button class="btn btn-sm btn-success float-right" style="margin-top: -10px;">
                                                แนะนำ <i class="fa-solid fa-badge-check"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-12 col-md-7">                                         
                                            <p style="margin-bottom:0px;">
                                                <i style="color:#b81f5b;padding-right:10px;" class="fa-solid fa-location-crosshairs" ></i>
                                                {{ $item->address }}
                                            </p>
                                            <p style="margin-bottom:0px;">
                                                <i style="color:green;padding-right:10px;" class="fa-solid fa-timer" ></i>
                                                {{ $item->business_hours }}
                                            </p>
                                            <p style="margin-bottom:0px;">
                                                <a href="tel:{{ $item->phone }}">
                                                    <i style="color:blue;padding-right:10px;" class="fa-solid fa-phone-volume" ></i>
                                                    {{ $item->phone }}
                                                </a>
                                            </p>
                                        </div>
                                        <div class="col-12 col-md-5">
                                            <img src="{{ $item->photo }}" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span id="text_select_distance" class="text-danger d-none">กรุณาเลือกระยะทาง</span>
                        <span id="search_not_found" class="text-danger d-none">ไม่พบการค้นหา</span>
                        <a href="#div-sticky">
                            <!-- DIV ค้นหา ร้านแนะนำ-->
                            <div id="content_search_recommend" class="d-none"></div>
                            <!-- DIV ค้นหา -->
                            <div id="content_search" class="d-none"></div>
                        </a>

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 order-md-2 order-1">
                        <aside id="div-sticky" class="sticky">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        <center>
                                            <img src="{{ url('/peddyhub/images/icons/marker_user_new.png') }}" width="40px;"> <br>ตำแหน่งของคุณ
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <img src="{{ url('/peddyhub/images/icons/placeholder_2_new.png') }}" width="40px;"> <br>แนะนำ
                                        </center>
                                    </div>
                                    <div class="col-4">
                                        <center>
                                            <img src="{{ url('/peddyhub/images/icons/marker_general_new.png') }}" width="40px;"> <br>ทั่วไป
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <br>
                        <div id="map" class="wow fadeInRight"></div>
                        <div id="map_my_location" class="wow fadeInRight d-none"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    @if(Auth::check())
        <input type="text" class="d-none" name="language_user" id="language_user" value="{{ Auth::user()->profile->language }}">
    @else
        <input type="text" class="d-none" name="language_user" id="language_user" value="th">
    @endif
    <a id="btn_change_language" class="d-none" href=""></a>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
    <style type="text/css">
        #map {
          height: calc(60vh);
        }
        #map_my_location {
          height: calc(60vh);
        }
        
    </style>

    <script>

        var map ;
        var user ;
        var marker ;
        var marker_user ;
        var marker_recommend ;
        var image_marker_user = "https://www.peddyhub.com/peddyhub/images/icons/marker_user.png";
        var image_marker_recommend = "https://www.peddyhub.com/peddyhub/images/icons/placeholder_2.png";
        var icon_image_marker = "https://www.peddyhub.com/peddyhub/images/icons/marker_general.png";

        var language_user = document.querySelector('#language_user').value ;

        document.addEventListener('DOMContentLoaded', (event) => {
            // console.log("START");
            // getLocation();
            initMap();
            select_province();
        });

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(initMap_my_location);
            } else { 
                x.innerHTML = "Geolocation is not supported by this browser.";
            }

            document.querySelector('#map_my_location').classList.remove('d-none');
            document.querySelector('#map').classList.add('d-none');
            document.querySelector('#map').classList.add('animated fadeInUp');
        }

        function initMap_my_location(position) { 

            let lat_text = document.querySelector("#lat");
            let lng_text = document.querySelector("#lng");
            let latlng = document.querySelector("#latlng");

            lat_text.value = position.coords.latitude ;
            lng_text.value = position.coords.longitude ;
            latlng.value = position.coords.latitude+","+position.coords.longitude ;
            
            let lat = parseFloat(lat_text.value) ;
            let lng = parseFloat(lng_text.value) ;

            document.querySelector('#div_spinner').classList.add('d-none');

            map = new google.maps.Map(document.getElementById("map_my_location"), {
                zoom: 11,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ตำแหน่ง USER
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user , icon: image_marker_user});

            search_my_location();

            // document.querySelector('#div_form').classList.remove('d-none');
            // document.querySelector('#distance').classList.remove('d-none');

        }



        function initMap() { 

            document.querySelector('#map_my_location').classList.add('d-none');
            document.querySelector('#map').classList.remove('d-none');

            let lat_text = document.querySelector("#lat");
            let lng_text = document.querySelector("#lng");
            let latlng = document.querySelector("#latlng");

            // lat_text.value = position.coords.latitude ;
            // lng_text.value = position.coords.longitude ;
            // latlng.value = position.coords.latitude+","+position.coords.longitude ;
            
            let lat = parseFloat(lat_text.value) ;
            let lng = parseFloat(lng_text.value) ;

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ตำแหน่ง USER
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user , icon: image_marker_user });

            // document.querySelector('#div_form').classList.remove('d-none');

            @foreach($hospital_recommend as $item)
                @if(!empty($item->lng))
                    marker = new google.maps.Marker({
                        position: {lat: {{ $item->lat }} , lng: {{ $item->lng }} },
                        map: map,
                        icon: image_marker_recommend,
                    });
                @endif
            @endforeach

        }

        function initMap_location_by_T(input_province , input_amphoe , input_tambon) { 

            document.querySelector('#map_my_location').classList.add('d-none');
            document.querySelector('#map').classList.remove('d-none');

            let lat_text = document.querySelector("#lat");
            let lng_text = document.querySelector("#lng");
            let latlng = document.querySelector("#latlng");

            // lat_text.value = position.coords.latitude ;
            // lng_text.value = position.coords.longitude ;
            // latlng.value = position.coords.latitude+","+position.coords.longitude ;
            
            let lat = parseFloat(lat_text.value) ;
            let lng = parseFloat(lng_text.value) ;

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 11,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ตำแหน่ง USER
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user , icon: image_marker_user });

            // document.querySelector('#div_form').classList.remove('d-none');

            fetch("{{ url('/') }}/api/search_location_by_T/" + input_province + "/" + input_amphoe + "/" + input_tambon)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    if (result.length === 0) {
                        document.querySelector('#content_search').classList.add('d-none');
                    }else{
                        // แสดงข้อมูล รพ.ใกล้ฉัน
                        document.querySelector('#content_search').classList.remove('d-none');

                        let content_search = document.querySelector('#content_search');
                            content_search.textContent = "" ;

                        for(let item of result){

                            let div_card = document.createElement("div");
                            let class_div_card = document.createAttribute("class");
                                class_div_card.value = "card main-shadow main-radius";
                                div_card.setAttributeNode(class_div_card);
                            let onclick_div_card = document.createAttribute("onclick");
                                onclick_div_card.value = "view_markar('" + item.lat + "' , '" + item.lng + "' , '" + item.name + "');";
                                div_card.setAttributeNode(onclick_div_card);

                            let div_row = document.createElement("div");
                            let class_div_row = document.createAttribute("class");
                                class_div_row.value = "row";
                                div_row.setAttributeNode(class_div_row);
                            div_card.appendChild(div_row);

                            // ชื่อ
                            let div_col_name = document.createElement("div");
                            let class_div_name = document.createAttribute("class");
                                class_div_name.value = "col-12";
                                div_col_name.setAttributeNode(class_div_name);
                            let h_name = document.createElement("h6");
                                h_name.innerHTML = item.name ;
                                div_col_name.appendChild(h_name);
                            div_row.appendChild(div_col_name);

                            // ข้อมูล
                            let div_col_data = document.createElement("div");
                            let class_div_data = document.createAttribute("class");
                                class_div_data.value = "col-sm-12 col-md-7";
                                div_col_data.setAttributeNode(class_div_data);

                                // address
                                let p_address = document.createElement("p");
                                let style_p_address = document.createAttribute("style");
                                    style_p_address.value = "margin-bottom:0px;";
                                    p_address.setAttributeNode(style_p_address);

                                let icon_address = document.createElement("i");
                                let icon_class = document.createAttribute("class");
                                    icon_class.value = "fa-solid fa-location-crosshairs";
                                    icon_address.setAttributeNode(icon_class);
                                let icon_style = document.createAttribute("style");
                                    icon_style.value = "color:#b81f5b;padding-right:10px;";
                                    icon_address.setAttributeNode(icon_style);
                                    p_address.appendChild(icon_address);

                                let span_address = document.createElement("span");
                                    span_address.innerHTML = item.address ;
                                    p_address.appendChild(span_address);
                                div_col_data.appendChild(p_address);

                                // business_hours
                                let p_business_hours = document.createElement("p");
                                let style_p_business_hours = document.createAttribute("style");
                                    style_p_business_hours.value = "margin-bottom:0px;";
                                    p_business_hours.setAttributeNode(style_p_business_hours);

                                let icon_business_hours = document.createElement("i");
                                let icon_class_business_hours = document.createAttribute("class");
                                    icon_class_business_hours.value = "fa-solid fa-timer";
                                    icon_business_hours.setAttributeNode(icon_class_business_hours);
                                let icon_style_business_hours = document.createAttribute("style");
                                    icon_style_business_hours.value = "color:green;padding-right:10px;";
                                    icon_business_hours.setAttributeNode(icon_style_business_hours);
                                    p_business_hours.appendChild(icon_business_hours);

                                let span_business_hours = document.createElement("span");
                                    span_business_hours.innerHTML = item.business_hours ;
                                    p_business_hours.appendChild(span_business_hours);
                                div_col_data.appendChild(p_business_hours);

                                // phone
                                let p_phone = document.createElement("p");
                                let style_p_phone = document.createAttribute("style");
                                    style_p_phone.value = "margin-bottom:0px;";
                                    p_phone.setAttributeNode(style_p_phone);

                                let tag_a_phone = document.createElement("a");
                                let href_tag_a_phone = document.createAttribute("href");
                                    href_tag_a_phone.value = "tel:" + item.phone;
                                    tag_a_phone.setAttributeNode(href_tag_a_phone);
                                    p_phone.appendChild(tag_a_phone);

                                let icon_phone = document.createElement("i");
                                let icon_class_phone = document.createAttribute("class");
                                    icon_class_phone.value = "fa-solid fa-phone-volume";
                                    icon_phone.setAttributeNode(icon_class_phone);
                                let icon_style_phone = document.createAttribute("style");
                                    icon_style_phone.value = "color:blue;padding-right:10px;";
                                    icon_phone.setAttributeNode(icon_style_phone);
                                    tag_a_phone.appendChild(icon_phone);

                                let span_phone = document.createElement("span");
                                    span_phone.innerHTML = item.phone ;
                                    tag_a_phone.appendChild(span_phone);

                                div_col_data.appendChild(p_phone);

                            div_row.appendChild(div_col_data);

                            // รูปภาพ
                            let div_col_img = document.createElement("div");
                            let class_div_img = document.createAttribute("class");
                                class_div_img.value = "col-sm-12 col-md-5";
                                div_col_img.setAttributeNode(class_div_img);

                                let tag_img = document.createElement("img");
                                let class_tag_img = document.createAttribute("class");
                                    class_tag_img.value = "img-fluid";
                                    tag_img.setAttributeNode(class_tag_img);
                                let src_img = document.createAttribute("src");
                                    src_img.value = item.photo;
                                    tag_img.setAttributeNode(src_img);

                                    div_col_img.appendChild(tag_img);

                            div_row.appendChild(div_col_img);

                            content_search.appendChild(div_card);

                            //ปักหมุด
                            marker = new google.maps.Marker({
                                position: { lat: parseFloat(item.lat)  , lng: parseFloat(item.lng) } , 
                                map: map,
                                icon: icon_image_marker,
                            }); 
                            
                        }

                    }

                });

            fetch("{{ url('/') }}/api/search_location_by_T_recommend/" + input_province + "/" + input_amphoe + "/" + input_tambon )
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    if (result.length === 0) {
                        document.querySelector('#content_search_recommend').classList.add('d-none');
                    }else{
                        // แสดงข้อมูล รพ.ใกล้ฉัน แนะนำ
                        document.querySelector('#content_search_recommend').classList.remove('d-none');

                        let content_search_recommend = document.querySelector('#content_search_recommend');
                            content_search_recommend.textContent = "" ;

                        for(let item of result){

                            let div_card_recommend = document.createElement("div");
                            let class_div_card_recommend = document.createAttribute("class");
                                class_div_card_recommend.value = "card main-shadow main-radius";
                                div_card_recommend.setAttributeNode(class_div_card_recommend);
                            let onclick_div_card_recommend = document.createAttribute("onclick");
                                onclick_div_card_recommend.value = "view_markar('" + item.lat + "' , '" + item.lng + "' , '" + item.name + "');";
                                div_card_recommend.setAttributeNode(onclick_div_card_recommend);

                            let div_row_recommend = document.createElement("div");
                            let class_div_row_recommend = document.createAttribute("class");
                                class_div_row_recommend.value = "row";
                                div_row_recommend.setAttributeNode(class_div_row_recommend);
                            div_card_recommend.appendChild(div_row_recommend);

                            // ชื่อ
                            let div_col_name_recommend = document.createElement("div");
                            let class_div_name_recommend = document.createAttribute("class");
                                class_div_name_recommend.value = "col-9";
                                div_col_name_recommend.setAttributeNode(class_div_name_recommend);
                            let h_name_recommend = document.createElement("h6");
                                h_name_recommend.innerHTML = item.name ;
                                div_col_name_recommend.appendChild(h_name_recommend);
                            div_row_recommend.appendChild(div_col_name_recommend);

                            // ป้ายนะนำ
                            let div_col_btn_recommend = document.createElement("div");
                            let class_div_btn_recommend = document.createAttribute("class");
                                class_div_btn_recommend.value = "col-3";
                                div_col_btn_recommend.setAttributeNode(class_div_btn_recommend);
                            let btn_recommend = document.createElement("button");
                            let class_btn_recommend = document.createAttribute("class");
                                class_btn_recommend.value = "btn btn-sm btn-success float-right";
                                btn_recommend.setAttributeNode(class_btn_recommend);
                            let style_btn_recommend = document.createAttribute("style");
                                style_btn_recommend.value = "margin-top: -10px;";
                                btn_recommend.setAttributeNode(style_btn_recommend);
                            let span_recommend = document.createElement("span");
                                span_recommend.innerHTML = "แนะนำ " ;
                                btn_recommend.appendChild(span_recommend);
                            let icon_btn_recommend = document.createElement("i");
                            let icon_class_btn_recommend = document.createAttribute("class");
                                icon_class_btn_recommend.value = "fa-solid fa-badge-check";
                                icon_btn_recommend.setAttributeNode(icon_class_btn_recommend);
                                btn_recommend.appendChild(icon_btn_recommend);
                            

                                div_col_btn_recommend.appendChild(btn_recommend);
                            div_row_recommend.appendChild(div_col_btn_recommend);

                            // ข้อมูล
                            let div_col_data_recommend = document.createElement("div");
                            let class_div_data_recommend = document.createAttribute("class");
                                class_div_data_recommend.value = "col-sm-12 col-md-7";
                                div_col_data_recommend.setAttributeNode(class_div_data_recommend);

                                // address
                                let p_address_recommend = document.createElement("p");
                                let style_p_address_recommend = document.createAttribute("style");
                                    style_p_address_recommend.value = "margin-bottom:0px;";
                                    p_address_recommend.setAttributeNode(style_p_address_recommend);

                                let icon_address_recommend = document.createElement("i");
                                let icon_class_recommend = document.createAttribute("class");
                                    icon_class_recommend.value = "fa-solid fa-location-crosshairs";
                                    icon_address_recommend.setAttributeNode(icon_class_recommend);
                                let icon_style_recommend = document.createAttribute("style");
                                    icon_style_recommend.value = "color:#b81f5b;padding-right:10px;";
                                    icon_address_recommend.setAttributeNode(icon_style_recommend);
                                    p_address_recommend.appendChild(icon_address_recommend);

                                let span_address_recommend = document.createElement("span");
                                    span_address_recommend.innerHTML = item.address ;
                                    p_address_recommend.appendChild(span_address_recommend);
                                div_col_data_recommend.appendChild(p_address_recommend);

                                // business_hours
                                let p_business_hours_recommend = document.createElement("p");
                                let style_p_business_hours_recommend = document.createAttribute("style");
                                    style_p_business_hours_recommend.value = "margin-bottom:0px;";
                                    p_business_hours_recommend.setAttributeNode(style_p_business_hours_recommend);

                                let icon_business_hours_recommend = document.createElement("i");
                                let icon_class_business_hours_recommend = document.createAttribute("class");
                                    icon_class_business_hours_recommend.value = "fa-solid fa-timer";
                                    icon_business_hours_recommend.setAttributeNode(icon_class_business_hours_recommend);
                                let icon_style_business_hours_recommend = document.createAttribute("style");
                                    icon_style_business_hours_recommend.value = "color:green;padding-right:10px;";
                                    icon_business_hours_recommend.setAttributeNode(icon_style_business_hours_recommend);
                                    p_business_hours_recommend.appendChild(icon_business_hours_recommend);

                                let span_business_hours_recommend = document.createElement("span");
                                    span_business_hours_recommend.innerHTML = item.business_hours ;
                                    p_business_hours_recommend.appendChild(span_business_hours_recommend);
                                div_col_data_recommend.appendChild(p_business_hours_recommend);

                                // phone
                                let p_phone_recommend = document.createElement("p");
                                let style_p_phone_recommend = document.createAttribute("style");
                                    style_p_phone_recommend.value = "margin-bottom:0px;";
                                    p_phone_recommend.setAttributeNode(style_p_phone_recommend);

                                let tag_a_phone_recommend = document.createElement("a");
                                let href_tag_a_phone_recommend = document.createAttribute("href");
                                    href_tag_a_phone_recommend.value = "tel:" + item.phone;
                                    tag_a_phone_recommend.setAttributeNode(href_tag_a_phone_recommend);
                                    p_phone_recommend.appendChild(tag_a_phone_recommend);

                                let icon_phone_recommend = document.createElement("i");
                                let icon_class_phone_recommend = document.createAttribute("class");
                                    icon_class_phone_recommend.value = "fa-solid fa-phone-volume";
                                    icon_phone_recommend.setAttributeNode(icon_class_phone_recommend);
                                let icon_style_phone_recommend = document.createAttribute("style");
                                    icon_style_phone_recommend.value = "color:blue;padding-right:10px;";
                                    icon_phone_recommend.setAttributeNode(icon_style_phone_recommend);
                                    tag_a_phone_recommend.appendChild(icon_phone_recommend);

                                let span_phone_recommend = document.createElement("span");
                                    span_phone_recommend.innerHTML = item.phone ;
                                    tag_a_phone_recommend.appendChild(span_phone_recommend);

                                div_col_data_recommend.appendChild(p_phone_recommend);

                            div_row_recommend.appendChild(div_col_data_recommend);

                            // รูปภาพ
                            let div_col_img_recommend = document.createElement("div");
                            let class_div_img_recommend = document.createAttribute("class");
                                class_div_img_recommend.value = "col-sm-12 col-md-5";
                                div_col_img_recommend.setAttributeNode(class_div_img_recommend);

                                let tag_img_recommend = document.createElement("img");
                                let class_tag_img_recommend = document.createAttribute("class");
                                    class_tag_img_recommend.value = "img-fluid";
                                    tag_img_recommend.setAttributeNode(class_tag_img_recommend);
                                let src_img_recommend = document.createAttribute("src");
                                    src_img_recommend.value = item.photo;
                                    tag_img_recommend.setAttributeNode(src_img_recommend);

                                    div_col_img_recommend.appendChild(tag_img_recommend);

                            div_row_recommend.appendChild(div_col_img_recommend);

                            content_search_recommend.appendChild(div_card_recommend);

                            //ปักหมุด
                            marker_recommend = new google.maps.Marker({
                                position: { lat: parseFloat(item.lat)  , lng: parseFloat(item.lng) } , 
                                map: map,
                                icon: image_marker_recommend,
                            }); 
                            
                        }
                    }

            });

        }

        function select_province(){
            let select_province = document.querySelector('#select_province');

            fetch("{{ url('/') }}/api/select_province/")
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    select_province.innerHTML = "";

                    let option_select = document.createElement("option");
                        option_select.text = "- เลือกจังหวัด -";
                        option_select.value = "";
                        select_province.add(option_select); 

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.changwat_th;
                        option.value = item.changwat_th;
                        select_province.add(option);
                    }
                });
        }

        function select_A(){
            let select_province = document.querySelector('#select_province');
            let select_amphoe = document.querySelector('#select_amphoe');

            fetch("{{ url('/') }}/api/select_amphoe" + "/" + select_province.value)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    select_amphoe.innerHTML = "";

                    let option_select = document.createElement("option");
                        option_select.text = "- เลือกอำเภอ -";
                        option_select.value = "";
                        select_amphoe.add(option_select); 

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.amphoe_th;
                        option.value = item.amphoe_th;
                        select_amphoe.add(option);
                    }
                });

                change_language_user();
        }

        function select_T(){
            let select_province = document.querySelector('#select_province');
            let select_amphoe = document.querySelector('#select_amphoe');
            let select_tambon = document.querySelector('#select_tambon');

            fetch("{{ url('/') }}/api/select_tambon" + "/" + select_province.value + "/" + select_amphoe.value)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    select_tambon.innerHTML = "";

                    let option_select = document.createElement("option");
                        option_select.text = "- เลือกตำบล -";
                        option_select.value = "";
                        select_tambon.add(option_select); 

                    for(let item of result){
                        let option = document.createElement("option");
                        option.text = item.tambon_th;
                        option.value = item.tambon_th;
                        select_tambon.add(option);
                    }
                });

                change_language_user();

        }

        function change_language_user()
        {
            let btn_change_language = document.querySelector('#btn_change_language');
                btn_change_language.href = "javascript:trocarIdioma('" + language_user +"')" ;
            
            var delayInMilliseconds = 1000; //1.5 second

            setTimeout(function() {
                document.querySelector('#btn_change_language').click();
            }, delayInMilliseconds);
        }

        function select_lat_lng(){

            let select_province = document.querySelector('#select_province');

            if (select_province.value) {
                let select_amphoe = document.querySelector('#select_amphoe');
                let select_tambon = document.querySelector('#select_tambon');

                fetch("{{ url('/') }}/api/select_lat_lng" + "/" + select_province.value + "/" + select_amphoe.value + "/" + select_tambon.value)
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);

                        let lat = document.querySelector('#lat');
                            lat.value = result[0]['lat'];

                        let lng = document.querySelector('#lng');
                            lng.value = result[0]['lng'];

                        select_location_by_T();
                        initMap_location_by_T(select_province.value , select_amphoe.value , select_tambon.value);
                           
                    });
            }else{
                let input_province = document.querySelector('#input_province');
                let input_amphoe = document.querySelector('#input_amphoe');
                let input_tambon = document.querySelector('#input_tambon');

                fetch("{{ url('/') }}/api/select_lat_lng" + "/" + input_province.value + "/" + input_amphoe.value + "/" + input_tambon.value)
                    .then(response => response.json())
                    .then(result => {
                        // console.log(result);

                        let lat = document.querySelector('#lat');
                            lat.value = result[0]['lat'];

                        let lng = document.querySelector('#lng');
                            lng.value = result[0]['lng'];

                        select_location_by_T();
                        initMap_location_by_T(input_province.value , input_amphoe.value , input_tambon.value);
                           
                    });
            }
            
            
        }

        function select_location_by_T()
        {
            let content_search = document.querySelector('#content_search');
                content_search.textContent = "" ;
            let content_search_recommend = document.querySelector('#content_search_recommend');
                content_search_recommend.textContent = "" ;

            document.querySelector('#location_by_T').classList.remove('d-none');
            document.querySelector('#my_location').classList.add('d-none');

            document.querySelector('#btn_select_my_location').classList.remove('d-none');
            document.querySelector('#btn_select_location_by_T').classList.add('d-none');

            document.querySelector("#div_recommend").classList.add('d-none');
        }

        function select_my_location()
        {
            document.querySelector('#select_province').value = "";
            document.querySelector('#select_amphoe').value = "";
            document.querySelector('#select_tambon').value = "";
            
            let content_search = document.querySelector('#content_search');
                content_search.textContent = "" ;
            let content_search_recommend = document.querySelector('#content_search_recommend');
                content_search_recommend.textContent = "" ;

            document.querySelector('#div_spinner').classList.remove('d-none');

            document.querySelector('#location_by_T').classList.add('d-none');
            document.querySelector('#my_location').classList.remove('d-none');

            document.querySelector('#btn_select_my_location').classList.add('d-none');
            document.querySelector('#btn_select_location_by_T').classList.remove('d-none');

            document.querySelector("#div_recommend").classList.add('d-none');
            // document.querySelector('#text_select_distance').classList.remove('d-none');

            getLocation();
        }

        function search_my_location()
        {
            document.querySelector('#text_select_distance').classList.add('d-none');
            let latlng = document.querySelector('#latlng').value;
            let distance = document.querySelector('#distance').value;

            fetch("{{ url('/') }}/api/search_my_location_recommend/" + latlng + "/" + distance)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);
                    if (result.length === 0) {
                        document.querySelector('#content_search_recommend').classList.add('d-none');
                    }else{
                        // แสดงข้อมูล รพ.ใกล้ฉัน แนะนำ
                        document.querySelector('#content_search_recommend').classList.remove('d-none');

                        let content_search_recommend = document.querySelector('#content_search_recommend');
                            content_search_recommend.textContent = "" ;

                        for(let item of result){

                            let div_card_recommend = document.createElement("div");
                            let class_div_card_recommend = document.createAttribute("class");
                                class_div_card_recommend.value = "card main-shadow main-radius";
                                div_card_recommend.setAttributeNode(class_div_card_recommend);
                            let onclick_div_card_recommend = document.createAttribute("onclick");
                                onclick_div_card_recommend.value = "view_markar('" + item.lat + "' , '" + item.lng + "' , '" + item.name + "');";
                                div_card_recommend.setAttributeNode(onclick_div_card_recommend);

                            let div_row_recommend = document.createElement("div");
                            let class_div_row_recommend = document.createAttribute("class");
                                class_div_row_recommend.value = "row";
                                div_row_recommend.setAttributeNode(class_div_row_recommend);
                            div_card_recommend.appendChild(div_row_recommend);

                            // ชื่อ
                            let div_col_name_recommend = document.createElement("div");
                            let class_div_name_recommend = document.createAttribute("class");
                                class_div_name_recommend.value = "col-9";
                                div_col_name_recommend.setAttributeNode(class_div_name_recommend);
                            let h_name_recommend = document.createElement("h6");
                                h_name_recommend.innerHTML = item.name ;
                                div_col_name_recommend.appendChild(h_name_recommend);
                            div_row_recommend.appendChild(div_col_name_recommend);

                            // ป้ายนะนำ
                            let div_col_btn_recommend = document.createElement("div");
                            let class_div_btn_recommend = document.createAttribute("class");
                                class_div_btn_recommend.value = "col-3";
                                div_col_btn_recommend.setAttributeNode(class_div_btn_recommend);
                            let btn_recommend = document.createElement("button");
                            let class_btn_recommend = document.createAttribute("class");
                                class_btn_recommend.value = "btn btn-sm btn-success float-right";
                                btn_recommend.setAttributeNode(class_btn_recommend);
                            let style_btn_recommend = document.createAttribute("style");
                                style_btn_recommend.value = "margin-top: -10px;";
                                btn_recommend.setAttributeNode(style_btn_recommend);
                            let span_recommend = document.createElement("span");
                                span_recommend.innerHTML = "แนะนำ " ;
                                btn_recommend.appendChild(span_recommend);
                            let icon_btn_recommend = document.createElement("i");
                            let icon_class_btn_recommend = document.createAttribute("class");
                                icon_class_btn_recommend.value = "fa-solid fa-badge-check";
                                icon_btn_recommend.setAttributeNode(icon_class_btn_recommend);
                                btn_recommend.appendChild(icon_btn_recommend);
                            

                                div_col_btn_recommend.appendChild(btn_recommend);
                            div_row_recommend.appendChild(div_col_btn_recommend);

                            // ข้อมูล
                            let div_col_data_recommend = document.createElement("div");
                            let class_div_data_recommend = document.createAttribute("class");
                                class_div_data_recommend.value = "col-sm-12 col-md-7";
                                div_col_data_recommend.setAttributeNode(class_div_data_recommend);

                                // address
                                let p_address_recommend = document.createElement("p");
                                let style_p_address_recommend = document.createAttribute("style");
                                    style_p_address_recommend.value = "margin-bottom:0px;";
                                    p_address_recommend.setAttributeNode(style_p_address_recommend);

                                let icon_address_recommend = document.createElement("i");
                                let icon_class_recommend = document.createAttribute("class");
                                    icon_class_recommend.value = "fa-solid fa-location-crosshairs";
                                    icon_address_recommend.setAttributeNode(icon_class_recommend);
                                let icon_style_recommend = document.createAttribute("style");
                                    icon_style_recommend.value = "color:#b81f5b;padding-right:10px;";
                                    icon_address_recommend.setAttributeNode(icon_style_recommend);
                                    p_address_recommend.appendChild(icon_address_recommend);

                                let span_address_recommend = document.createElement("span");
                                    span_address_recommend.innerHTML = item.address ;
                                    p_address_recommend.appendChild(span_address_recommend);
                                div_col_data_recommend.appendChild(p_address_recommend);

                                // business_hours
                                let p_business_hours_recommend = document.createElement("p");
                                let style_p_business_hours_recommend = document.createAttribute("style");
                                    style_p_business_hours_recommend.value = "margin-bottom:0px;";
                                    p_business_hours_recommend.setAttributeNode(style_p_business_hours_recommend);

                                let icon_business_hours_recommend = document.createElement("i");
                                let icon_class_business_hours_recommend = document.createAttribute("class");
                                    icon_class_business_hours_recommend.value = "fa-solid fa-timer";
                                    icon_business_hours_recommend.setAttributeNode(icon_class_business_hours_recommend);
                                let icon_style_business_hours_recommend = document.createAttribute("style");
                                    icon_style_business_hours_recommend.value = "color:green;padding-right:10px;";
                                    icon_business_hours_recommend.setAttributeNode(icon_style_business_hours_recommend);
                                    p_business_hours_recommend.appendChild(icon_business_hours_recommend);

                                let span_business_hours_recommend = document.createElement("span");
                                    span_business_hours_recommend.innerHTML = item.business_hours ;
                                    p_business_hours_recommend.appendChild(span_business_hours_recommend);
                                div_col_data_recommend.appendChild(p_business_hours_recommend);

                                // phone
                                let p_phone_recommend = document.createElement("p");
                                let style_p_phone_recommend = document.createAttribute("style");
                                    style_p_phone_recommend.value = "margin-bottom:0px;";
                                    p_phone_recommend.setAttributeNode(style_p_phone_recommend);

                                let tag_a_phone_recommend = document.createElement("a");
                                let href_tag_a_phone_recommend = document.createAttribute("href");
                                    href_tag_a_phone_recommend.value = "tel:" + item.phone;
                                    tag_a_phone_recommend.setAttributeNode(href_tag_a_phone_recommend);
                                    p_phone_recommend.appendChild(tag_a_phone_recommend);

                                let icon_phone_recommend = document.createElement("i");
                                let icon_class_phone_recommend = document.createAttribute("class");
                                    icon_class_phone_recommend.value = "fa-solid fa-phone-volume";
                                    icon_phone_recommend.setAttributeNode(icon_class_phone_recommend);
                                let icon_style_phone_recommend = document.createAttribute("style");
                                    icon_style_phone_recommend.value = "color:blue;padding-right:10px;";
                                    icon_phone_recommend.setAttributeNode(icon_style_phone_recommend);
                                    tag_a_phone_recommend.appendChild(icon_phone_recommend);

                                let span_phone_recommend = document.createElement("span");
                                    span_phone_recommend.innerHTML = item.phone ;
                                    tag_a_phone_recommend.appendChild(span_phone_recommend);

                                let span_km_pc_recommend = document.createElement("span");
                                let span_km_class_pc_recommend = document.createAttribute("class");
                                    span_km_class_pc_recommend.value = "d-none d-lg-block float-right";
                                    span_km_pc_recommend.setAttributeNode(span_km_class_pc_recommend);
                                    span_km_pc_recommend.innerHTML = (item.distance * 2.6 ).toFixed(2) + " กิโลเมตร" ;
                                    p_phone_recommend.appendChild(span_km_pc_recommend);

                                let span_km_mb_recommend = document.createElement("span");
                                let span_km_class_mb_recommend = document.createAttribute("class");
                                    span_km_class_mb_recommend.value = "d-block d-md-none";
                                    span_km_mb_recommend.setAttributeNode(span_km_class_mb_recommend);
                                    span_km_mb_recommend.innerHTML = (item.distance * 2.6 ).toFixed(2) + " กิโลเมตร" ;
                                    p_phone_recommend.appendChild(span_km_mb_recommend);

                                div_col_data_recommend.appendChild(p_phone_recommend);

                            div_row_recommend.appendChild(div_col_data_recommend);

                            // รูปภาพ
                            let div_col_img_recommend = document.createElement("div");
                            let class_div_img_recommend = document.createAttribute("class");
                                class_div_img_recommend.value = "col-sm-12 col-md-5";
                                div_col_img_recommend.setAttributeNode(class_div_img_recommend);

                                let tag_img_recommend = document.createElement("img");
                                let class_tag_img_recommend = document.createAttribute("class");
                                    class_tag_img_recommend.value = "img-fluid";
                                    tag_img_recommend.setAttributeNode(class_tag_img_recommend);
                                let src_img_recommend = document.createAttribute("src");
                                    src_img_recommend.value = item.photo;
                                    tag_img_recommend.setAttributeNode(src_img_recommend);

                                    div_col_img_recommend.appendChild(tag_img_recommend);

                            div_row_recommend.appendChild(div_col_img_recommend);

                            content_search_recommend.appendChild(div_card_recommend);

                            //ปักหมุด
                            marker_recommend = new google.maps.Marker({
                                position: { lat: parseFloat(item.lat)  , lng: parseFloat(item.lng) } , 
                                map: map,
                                icon: image_marker_recommend,
                            }); 
                            
                        }
                    }

            });

            fetch("{{ url('/') }}/api/search_my_location/" + latlng + "/" + distance)
                .then(response => response.json())
                .then(result => {
                    // console.log(result);

                    if (result.length === 0) {
                        document.querySelector('#search_not_found').classList.remove('d-none');
                        document.querySelector('#content_search').classList.add('d-none');
                    }else{
                        document.querySelector('#search_not_found').classList.add('d-none');
                        // แสดงข้อมูล รพ.ใกล้ฉัน
                        document.querySelector('#content_search').classList.remove('d-none');

                        let content_search = document.querySelector('#content_search');
                            content_search.textContent = "" ;

                        for(let item of result){

                            let div_card = document.createElement("div");
                            let class_div_card = document.createAttribute("class");
                                class_div_card.value = "card main-shadow main-radius";
                                div_card.setAttributeNode(class_div_card);
                            let onclick_div_card = document.createAttribute("onclick");
                                onclick_div_card.value = "view_markar('" + item.lat + "' , '" + item.lng + "' , '" + item.name + "');";
                                div_card.setAttributeNode(onclick_div_card);

                            let div_row = document.createElement("div");
                            let class_div_row = document.createAttribute("class");
                                class_div_row.value = "row";
                                div_row.setAttributeNode(class_div_row);
                            div_card.appendChild(div_row);

                            // ชื่อ
                            let div_col_name = document.createElement("div");
                            let class_div_name = document.createAttribute("class");
                                class_div_name.value = "col-12";
                                div_col_name.setAttributeNode(class_div_name);
                            let h_name = document.createElement("h6");
                                h_name.innerHTML = item.name ;
                                div_col_name.appendChild(h_name);
                            div_row.appendChild(div_col_name);

                            // ข้อมูล
                            let div_col_data = document.createElement("div");
                            let class_div_data = document.createAttribute("class");
                                class_div_data.value = "col-sm-12 col-md-7";
                                div_col_data.setAttributeNode(class_div_data);

                                // address
                                let p_address = document.createElement("p");
                                let style_p_address = document.createAttribute("style");
                                    style_p_address.value = "margin-bottom:0px;";
                                    p_address.setAttributeNode(style_p_address);

                                let icon_address = document.createElement("i");
                                let icon_class = document.createAttribute("class");
                                    icon_class.value = "fa-solid fa-location-crosshairs";
                                    icon_address.setAttributeNode(icon_class);
                                let icon_style = document.createAttribute("style");
                                    icon_style.value = "color:#b81f5b;padding-right:10px;";
                                    icon_address.setAttributeNode(icon_style);
                                    p_address.appendChild(icon_address);

                                let span_address = document.createElement("span");
                                    span_address.innerHTML = item.address ;
                                    p_address.appendChild(span_address);
                                div_col_data.appendChild(p_address);

                                // business_hours
                                let p_business_hours = document.createElement("p");
                                let style_p_business_hours = document.createAttribute("style");
                                    style_p_business_hours.value = "margin-bottom:0px;";
                                    p_business_hours.setAttributeNode(style_p_business_hours);

                                let icon_business_hours = document.createElement("i");
                                let icon_class_business_hours = document.createAttribute("class");
                                    icon_class_business_hours.value = "fa-solid fa-timer";
                                    icon_business_hours.setAttributeNode(icon_class_business_hours);
                                let icon_style_business_hours = document.createAttribute("style");
                                    icon_style_business_hours.value = "color:green;padding-right:10px;";
                                    icon_business_hours.setAttributeNode(icon_style_business_hours);
                                    p_business_hours.appendChild(icon_business_hours);

                                let span_business_hours = document.createElement("span");
                                    span_business_hours.innerHTML = item.business_hours ;
                                    p_business_hours.appendChild(span_business_hours);
                                div_col_data.appendChild(p_business_hours);

                                // phone
                                let p_phone = document.createElement("p");
                                let style_p_phone = document.createAttribute("style");
                                    style_p_phone.value = "margin-bottom:0px;";
                                    p_phone.setAttributeNode(style_p_phone);

                                let tag_a_phone = document.createElement("a");
                                let href_tag_a_phone = document.createAttribute("href");
                                    href_tag_a_phone.value = "tel:" + item.phone;
                                    tag_a_phone.setAttributeNode(href_tag_a_phone);
                                    p_phone.appendChild(tag_a_phone);

                                let icon_phone = document.createElement("i");
                                let icon_class_phone = document.createAttribute("class");
                                    icon_class_phone.value = "fa-solid fa-phone-volume";
                                    icon_phone.setAttributeNode(icon_class_phone);
                                let icon_style_phone = document.createAttribute("style");
                                    icon_style_phone.value = "color:blue;padding-right:10px;";
                                    icon_phone.setAttributeNode(icon_style_phone);
                                    tag_a_phone.appendChild(icon_phone);

                                let span_phone = document.createElement("span");
                                    span_phone.innerHTML = item.phone ;
                                    tag_a_phone.appendChild(span_phone);

                                let span_km_pc = document.createElement("span");
                                let span_km_class_pc = document.createAttribute("class");
                                    span_km_class_pc.value = "d-none d-lg-block float-right";
                                    span_km_pc.setAttributeNode(span_km_class_pc);
                                    span_km_pc.innerHTML = (item.distance * 2.6 ).toFixed(2) + " กิโลเมตร" ;
                                    p_phone.appendChild(span_km_pc);

                                let span_km_mb = document.createElement("span");
                                let span_km_class_mb = document.createAttribute("class");
                                    span_km_class_mb.value = "d-block d-md-none";
                                    span_km_mb.setAttributeNode(span_km_class_mb);
                                    span_km_mb.innerHTML = (item.distance * 2.6 ).toFixed(2) + " กิโลเมตร" ;
                                    p_phone.appendChild(span_km_mb);

                                div_col_data.appendChild(p_phone);

                            div_row.appendChild(div_col_data);

                            // รูปภาพ
                            let div_col_img = document.createElement("div");
                            let class_div_img = document.createAttribute("class");
                                class_div_img.value = "col-sm-12 col-md-5";
                                div_col_img.setAttributeNode(class_div_img);

                                let tag_img = document.createElement("img");
                                let class_tag_img = document.createAttribute("class");
                                    class_tag_img.value = "img-fluid";
                                    tag_img.setAttributeNode(class_tag_img);
                                let src_img = document.createAttribute("src");
                                    src_img.value = item.photo;
                                    tag_img.setAttributeNode(src_img);

                                    div_col_img.appendChild(tag_img);

                            div_row.appendChild(div_col_img);

                            content_search.appendChild(div_card);

                            //ปักหมุด
                            marker = new google.maps.Marker({
                                position: { lat: parseFloat(item.lat)  , lng: parseFloat(item.lng) } , 
                                map: map,
                                icon: icon_image_marker,
                            }); 
                            
                        }

                    }

                });
        }

        function view_markar(text_lat , text_lng , name)
        {   
            document.querySelector('#map_my_location').classList.add('d-none');
            document.querySelector('#map').classList.remove('d-none');
            
            let lat = parseFloat(text_lat) ;
            let lng = parseFloat(text_lng) ;

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ปักหมุด
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user , icon:icon_image_marker });

            const myLatlng = { lat: parseFloat(lat), lng: parseFloat(lng) };
            let lat_mail = '@' + parseFloat(lat) ;
            const contentString =
                '<div>' +
                    '<h6>'+ name +'</h6>' +
                    '<div>' +
                        "<p>lat : "+ lat + "lng : "+ lng + "</p>" +
                    '</div>' +
                    '<div>' +
                        '<a href="https://www.google.co.th/maps/search/'+ lat + ',' + lng + '/' + lat_mail + ',' + lng +',16z" class="btn btn-sm btn-primary float-right" target="bank"><i class="fa-solid fa-circle-location-arrow"></i> เส้นทาง</a>' +
                    '</div>' +
                "</div>";

            let infoWindow = new google.maps.InfoWindow({
                // content: "<p>ชื่อพื้นที่ : <b>" + name_area  + "</b></p>" + "Lat :" + lat + "<br>" + "Lat :" + lng,
                content: contentString,
                position: myLatlng,
            });

            infoWindow.open(map);

        }



    </script>
<script>
var stickySidebar = $('.sticky');

if (stickySidebar.length > 0) {	
  var stickyHeight = stickySidebar.height(),
      sidebarTop = stickySidebar.offset().top;
}

// on scroll move the sidebar
$(window).scroll(function () {
  if (stickySidebar.length > 0) {	
    var scrollTop = $(window).scrollTop();
            
    if (sidebarTop < scrollTop) {
      stickySidebar.css('top', scrollTop - sidebarTop);

      // stop the sticky sidebar at the footer to avoid overlapping
      var sidebarBottom = stickySidebar.offset().top + stickyHeight,
          stickyStop = $('.main-content').offset().top + $('.main-content').height();
      if (stickyStop < sidebarBottom) {
        var stopPosition = $('.main-content').height() - stickyHeight;
        stickySidebar.css('top', stopPosition);
      }
    }
    else {
      stickySidebar.css('top', '0');
    } 
  }
});

$(window).resize(function () {
  if (stickySidebar.length > 0) {	
    stickyHeight = stickySidebar.height();
  }
});
if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
    document.querySelector('#div-sticky').classList.remove('sticky');
}
</script>
@endsection