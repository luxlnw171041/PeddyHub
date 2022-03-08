@extends('layouts.peddyhub')
@section('content')
    <div class="main-wrapper pet service">
        <div class="about pet">
            <section class="service">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp" style="visibility: visible;"><span class="purple"><i class="fas fa-paw"></i> </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                        <h4 class="wow fadeInDown" style="visibility: visible;">โรงพยาบาลสัตว์ใกล้ฉัน</h4>
                    </div>
                    <div class="cards">
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
                                        <input type="text" id="latlng" class="form-control" placeholder="ตำแหน่งของฉัน"
                                            readonly>
                                    </div>
                                    <div class="form-group col-lg-5 col-md-5 col-sm-12">
                                        <select name="pet_category_id" class="form-control" required>
                                            <option value='' selected="selected">ระยะทาง</option>
                                            <option value="1">1 กม.</option>
                                            <option value="5">5 กม.</option>
                                            <option value="10">10 กม.</option>
                                            <option value="25">25 กม.</option>
                                            <option value="50">50 กม.</option>
                                            <option value="75">70 กม.</option>
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

                        <div class="row ">
                            <div class="col-lg-6 col-md-6 col-sm-12 wow fadeInLeft">
                                @foreach($hospital_near as $item)
                                    <div class="card main-shadow main-radius">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>{{ $item->name }}</h6>
                                            </div>
                                            <div class="col-7">                                         
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
                                            <div class="col-5">
                                                <img src="{{ url('storage')}}/{{ $item->photo }}" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div id="map" class="wow fadeInRight"></div>
                                <div id="map_my_location" class="wow fadeInRight d-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
    <br>

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
        var marker_user ;

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
                zoom: 15,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ตำแหน่ง USER
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user });

            // document.querySelector('#div_form').classList.remove('d-none');

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
                zoom: 15,
                center: { lat: lat, lng: lng },
                mapTypeId: "terrain",
            });

            // ตำแหน่ง USER
            user = { lat: lat, lng: lng };
            marker_user = new google.maps.Marker({ map, position: user });

            // document.querySelector('#div_form').classList.remove('d-none');

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

                        document.querySelector('#map').classList.remove('d-none');
                        initMap();
                           
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

                        document.querySelector('#map').classList.remove('d-none');
                        initMap();
                           
                    });
            }
            
            
        }

        function select_location_by_T()
        {
            document.querySelector('#location_by_T').classList.remove('d-none');
            document.querySelector('#my_location').classList.add('d-none');

            document.querySelector('#btn_select_my_location').classList.remove('d-none');
            document.querySelector('#btn_select_location_by_T').classList.add('d-none');
        }

        function select_my_location()
        {
            document.querySelector('#div_spinner').classList.remove('d-none');

            document.querySelector('#location_by_T').classList.add('d-none');
            document.querySelector('#my_location').classList.remove('d-none');

            document.querySelector('#btn_select_my_location').classList.add('d-none');
            document.querySelector('#btn_select_location_by_T').classList.remove('d-none');

            getLocation();
        }
    </script>
@endsection