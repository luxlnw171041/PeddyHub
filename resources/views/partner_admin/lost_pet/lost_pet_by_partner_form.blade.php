<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
<style>
    .page-content{
        padding: 5px;
    }
     .box {
    width: 100%;
    height: 100%;
    }
    .box input[type="file"] {
    opacity: 0;
    z-index: 100;
    }
    .box label,input[type="file"] {
    display: block;
    width: 100%;
    height: 300px;
    border-radius:20px;
    border:3px #b8205b dashed ;
    background: white;
    text-align: center;
    }
    label {
    position: relative;
    }

    .lbl {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 99;
    }
    .lbl img{
        display: block;
        justify-items: center;
    }
    .show-img{
      
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        position: absolute;
        z-index: 99;
        
    }
    .show-img img{
        object-fit: contain;  
        width: 100%;
        height: 100%;
    }
    
    .input-photo{
        position: relative;
        z-index: 999;
    }.owl-nav {
        display: none;
    }.owl-dots{
        display: none;
    }
</style>
<div class="card radius-10" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;padding-right:15px;">
    <div class="card-header border-bottom-0 bg-transparent" style="padding-right:0px;">
        <div class="row">
            <div class="col-12 col-md-12">
                <h2 style="margin-top: 10px;">แจ้งน้องหาย</h2>
            </div>
        </div>
        <div class="main-wrapper pet check">
            <div class="pet service">
                <section class="contact" style="margin-top:10px;">
                    <div class="row d-flex justify-content-end">
                        <hr>
                        <!-- MAP -->
                        <div class="col-12 col-md-3">
                            <div class="main-shadow main-radius" style="border-radius: 20px;" id="map">
                                <img style=" object-fit: contain; " width="280 px" src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/15.png') }}" class="card-img-top center" style="padding: 10px;">
                                <div style="position: relative; z-index: 5">
                                    <div class="translate p-3 text-center">
                                        <h4 style="font-family: 'Kanit', sans-serif;"> <b>ขออภัยครับ</b> </h4>
                                        <h6 style="font-family: 'Kanit', sans-serif;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งครับ</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- DATA -->
                        <div class="card-body p-2 col-12 col-md-9">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="fa-solid fa-location-dot me-1 font-22 text-danger"></i>
                                </div>
                                <h5 class="mb-0 text-danger">สถานที่</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="select_province" class="form-label">จังหวัด<span class="text-danger">*</span></label>
                                    <select name="select_province" id="select_province" class="form-control" onchange="select_A(); check();" required>
                                        <option value="">- เลือกจังหวัด -</option>
                                    </select>
                                    <div id="select_provinceFeedback" class="invalid-feedback">โปรดระบุจังหวัดที่ถูกต้อง.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="select_amphoe" class="form-label">อำเภอ<span class="text-danger">*</span></label>
                                    <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T(); check();" required>
                                        <option value="">- เลือกอำเภอ -</option>
                                    </select>
                                    <div id="select_amphoeFeedback" class="invalid-feedback">โปรดระบุอำเภอที่ถูกต้อง.</div>
                                </div>
                                <div class="col-md-4">
                                    <label for="select_tambon" class="form-label">ตำบล<span class="text-danger">*</span></label>
                                    <select name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng(); check();" required>
                                        <option value="">- เลือกตำบล -</option>
                                    </select>
                                    <div id="select_tambonFeedback" class="invalid-feedback">โปรดระบุตำบลที่ถูกต้อง.</div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-title d-flex align-items-center mt-4">
                                <div><i class="fa-solid fa-memo-circle-info me-1 font-22 text-info"></i>
                                </div>
                                <h5 class="mb-0 text-info">ข้อมูลเจ้าของ</h5>
                            </div>      
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputLastName2" class="form-label">ชื่อ</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="bx bxs-user"></i></span>
                                        <input class="form-control" name="owner_name" type="text" id="owner_name" value="" placeholder="ชื่อเจ้าของ" onchange="check();">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <label for="inputPhoneNo" class="form-label">เบอร์ติดต่อ</label>
                                    <div class="input-group"> <span class="input-group-text bg-transparent"><i class="fa-solid fa-phone"></i></span>
                                        <input class="form-control" name="owner_phone" type="text" id="owner_phone" value="" placeholder="หมายเลขโทรศัพท์" onchange="check();">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-title d-flex align-items-center mt-4">
                                <div><i class="fa-solid fa-paw me-1 font-22 text-primary"></i>
                                </div>
                                    <h5 class="mb-0 text-primary">ข้อมูลรายละเอียดสัตว์เลี้ยง</h5>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-7 col-lg-7 ">
                                        <div class="row">
                                            <div class="col-12 col-md-6 form-group">
                                                <div class=" form-group {{ $errors->has('pet_name') ? 'has-error' : ''}}">
                                                    <label for="pet_name" class="control-label">{{ 'ชื่อสัตว์เลี้ยง' }}<span class="text-danger">*</span></label>
                                                    <input class="form-control" name="pet_name" type="text" id="pet_name" value="{{ isset($lost_pet->pet_name) ? $lost_pet->pet_name : ''}}" required onchange="check();">
                                                    <div id="validationServer03Feedback" class="invalid-feedback">โปรดระบุชื่อสัตว์เลี้ยง.</div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-group">
                                                <div class="form-group {{ $errors->has('pet_age') ? 'has-error' : ''}}">
                                                    <label for="pet_age" class="control-label">{{ 'อายุสัตว์เลี้ยง' }}<span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <input class="form-control" name="pet_age" type="number" id="pet_age_Y" value="" placeholder="ปี" onchange="input_pet_age();" min="0" required>
                                                        <input class="form-control" name="pet_age" type="number" id="pet_age_M" value="" style="border-radius: 0px 5px 5px 0px;" placeholder="เดือน" onchange="input_pet_age(); check();" min="0">
                                                        <div id="validationServer03Feedback" class="invalid-feedback">โปรดระบุอายุสัตว์เลี้ยงอย่างน้อย 1 เดือน </div>
                                                    </div>
                                                    <input class="form-control d-none" name="pet_age" type="text" id="pet_age" value="" readonly>
                                                    {!! $errors->first('pet_category_id', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-group">
                                                <div class="form-group {{ $errors->has('pet_category_id') ? 'has-error' : ''}}">
                                                    <label for="pet_category_id" class="control-label">{{ 'ประเภทสัตว์เลี้ยง' }}<span class="text-danger">*</span></label>
                                                    <select style="margin:0px;" id="select_category" name="pet_category_id" class="form-control" onchange="species_select(); check();" required>
                                                        <option class="translate" value="" selected> - โปรดเลือก - </option>
                                                    </select>
                                                    {!! $errors->first('pet_category_id', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 form-group">
                                                <div class="form-group {{ $errors->has('sub_category') ? 'has-error' : ''}}">
                                                    <label for="sub_category" class="control-label">{{ 'สายพันธุ์' }}</label>
                                                    <input class="form-control" name="sub_category" type="text" id="sub_category" value="" placeholder="ระบุสายพันธุ์" onchange="check();" onchange="check();">
                                                    {!! $errors->first('sub_category', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-12 form-group mt-3">
                                                <div class="form-group {{ $errors->has('pet_gender') ? 'has-error' : ''}}">
                                                    <label for="pet_gender" class="control-label">{{ 'เพศ' }}<span class="text-danger">*</span></label>
                                                    <div class="form-group">
                                                        <input type="radio" class="form-check-input" id="pet_gender_M" name="pet_gender" value="ชาย" required="" onchange="check();">
                                                        <label class="form-check-label" for="pet_gender_M">ชาย</label>
                                                         &nbsp;&nbsp;

                                                        <input type="radio" class="form-check-input" id="pet_gender_w" name="pet_gender" value="หญิง" required="" onchange="check();">
                                                        <label class="form-check-label" for="pet_gender_w">หญิง</label>&nbsp;&nbsp;


                                                        <input type="radio" class="form-check-input" id="pet_gender_O" name="pet_gender" value="" required="" onchange="check();">
                                                        <label class="form-check-label" for="pet_gender_O">ไม่ระบุ</label> &nbsp;&nbsp;
                                                        <div class="invalid-feedback">โปรดระบุเพศสัตว์เลี้ยง.</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 form-group mt-3">
                                                <div class=" form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
                                                    <label for="detail" class="control-label">{{ 'รายละเอียด' }}</label>
                                                    <textarea class="form-control" name="detail" type="textarea" rows="4" id="detail" value="" onchange="check();"></textarea>
                                                    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-5 col-lg-5 ">
                                        <div class="col-12 col-md-12 form-group ">
                                        <label for="photo" class="control-label">{{ 'รูปภาพ' }} <span class="text-danger">*เพียง 1 รูปเท่านั้น</span></label>
                                            <div class="box col-12">
                                                <label class="lableimg text-center" for="photo">
                                                    <!-- <input id="uploadBtn" type="file" required /> -->  
                                                    <input type="file" name="photo" id="photo" class="form-control input-photo" value="{{ isset($lost_pet->photo) ? $lost_pet->photo : ''}}" accept="image/*" required onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0]),add_photo(); check();">
                                                    <!-- <input  class="form-control input-photo" name="photo" type="file" id="photo" value="{{ isset($lost_pet->photo) ? $lost_pet->photo : ''}}" required accept="image/*" onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0]),add_photo(); check();" >                                    -->
                                                   
                                                    <span id="show-img" class="d-none"style="object-fit: cover;">
                                                        <img src="" id="show_photo" class="show-img" style="max-width: 100%; max-height:100%"  alt="">
                                                    </span>

                                                    <span class="lbl ">
                                                        <center>
                                                            <img src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/23.png') }}"  width="50%" alt="">
                                                            <span class="mt-5" style="margin-top: 50px;font-size:25px">ลากและวางไฟล์ลงที่นี่</span>
                                                            <a href="#" class="btn btn-md btn-outline-primary mt-2 w-100" style="position: relative; z-index: 9999;" style="border-radius: 50px;"role="button" aria-pressed="true" onclick="document.getElementById('photo').click();">เลือกไฟล์</a>
                                                        </center>
                                                    </span>
                                                    <div class="invalid-feedback">โปรดเพิ่มรูปภาพสัตว์เลี้ยง.</div>
                                                </label>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ปุ่มส่งข้อมูล -->
                                    <div class="col-12 form-group mt-2 d-flex justify-content-end">
                                        <button style="margin-right: 20px;margin-top: 20px;" id="btn-check" type="submit" class="btn btn-primary button-three btn-md">
                                            แจ้งน้องหาย
                                        </button>

                                        
                                        <button  style="margin-right: 20px;margin-top: 20px;" id="modal_submit" type="button" class="btn btn-primary button-three btn-md d-none" data-toggle="modal" data-target="#modal_thx" onclick="submit_form_lost_pet();">
                                            แจ้งน้องหาย
                                        </button>
                                        <input class="btn btn-primary d-none" id="lost_pet_submit" type="submit" value="{{ $formMode === 'edit' ? 'แจ้งน้องหาย' : 'แจ้งน้องหาย' }}">
                                    </div>
                                    <!-- ------------------------------------ -->
                                </div>  
                        </div>
                        <div class="col-12 col-md-9 " style="padding-right:20px;padding-left: 20px;">

                                <!-- ข้อมูล lat , lng -->
                                <div class="d-none form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
                                    <label for="lat" class="control-label">{{ 'Let' }}</label>
                                    <input class="form-control" name="lat" type="text" id="lat" value="13.753882">
                                    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="d-none form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
                                    <label for="lng" class="control-label">{{ 'Long' }}</label>
                                    <input class="form-control" name="lng" type="text" id="lng" value="100.571329">
                                    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
                                </div>
                                <input class="d-none" type="text" id="latlng" name="latlng" readonly>
                                <input class="d-none" type="text" id="num_zoom" name="num_zoom" value="6" readonly>
                                <input class="d-none" type="text" id="by_partner" name="by_partner" value="{{ Auth::user()->partner }}" >
                                <input class="d-none" type="text" id="by_api" name="by_api" value="No" >

                                <br>

                                <!-- Modal -->
                                <div class="modal fade " data-keyboard="false" data-backdrop="static" id="modal_thx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered"  role="document">
                                        <div class="modal-content"style="border-radius:20px ;">
                                            <div class="modal-body text-center">
                                                <h3>ได้รับข้อมูลเรียบร้อยแล้ว</h3>
                                                <img width="60%" src="{{ asset('peddyhub/images/PEDDyHUB sticker line/03.png') }}">
                                                <br><br>
                                                <h5>สนับสนุนโดย</h5>
                                                <div class="col-12 owl-carousel-two align-self-center" style="padding:0px;">
                                                    <div class="owl-carousel">
                                                        @foreach($partner as $item)
                                                        <div class="item" style="padding:0px;z-index:-1;">
                                                            <div class="testimon">
                                                                <a href="{{$item->link}}" target="bank">
                                                                    <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
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

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th"></script>
<style type="text/css">
    #map {
        height: calc(65vh);
    }
    .gm-style-cc{
        display: none;
    }
    .gm-bundled-control-on-bottom{
        display: none;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
        select_province();
        select_category();
        document.querySelector('#btn_lost_pet_15day').click();
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initMap);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function initMap() {

let lat_text = document.querySelector("#lat");
let lng_text = document.querySelector("#lng");
let latlng = document.querySelector("#latlng");
let zoom = document.querySelector("#num_zoom").value;

// lat_text.value = position.coords.latitude ;
// lng_text.value = position.coords.longitude ;
// latlng.value = position.coords.latitude+","+position.coords.longitude ;

let lat = parseFloat(lat_text.value);
let lng = parseFloat(lng_text.value);

var image = {
    url: "https://www.peddyhub.com/peddyhub/images/icons/location.png",
    scaledSize: new google.maps.Size(25, 33)
};


const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: {
        lat: lat,
        lng: lng
    },
    mapTypeId: "terrain",
    mapTypeControl: true,
    fullscreenControl: true,
    scaleControl: false,
    streetViewControl: false,
    
});

// ตำแหน่ง USER
const user = {
    lat: lat,
    lng: lng
};


const marker_user = new google.maps.Marker({
    map,
    position: user,
    icon: image
});

const circle = new google.maps.Circle( {
map           : map,
center        : new google.maps.LatLng( lat, lng ),
radius        : 15000,
strokeColor   : '#B8205B',
strokeOpacity : 1,
strokeWeight  : 2,
fillColor     : '#B8205B',
fillOpacity   : 0.2
} );

// document.querySelector('#div_form').classList.remove('d-none');

}

    function select_province() {
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

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.changwat_th;
                    option.value = item.changwat_th;
                    select_province.add(option);
                }
            });
    }

    function select_A() {
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

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.amphoe_th;
                    option.value = item.amphoe_th;
                    select_amphoe.add(option);
                }
            });
    }

    function select_T() {
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

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.tambon_th;
                    option.value = item.tambon_th;
                    select_tambon.add(option);
                }
            });

    }

    function select_lat_lng() {

        document.querySelector('#div_form').classList.remove('d-none');

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

                    document.querySelector("#num_zoom").value = 14 ;
                    initMap();

                });
        } else {
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

                    document.querySelector("#num_zoom").value = 12 ;
                    initMap();

                });
        }
    }

    function select_category() {
        let select_category = document.querySelector('#select_category');

        fetch("{{ url('/') }}/api/select_category/")
            .then(response => response.json())
            .then(result => {

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.name;
                    option.value = item.id;
                    select_category.add(option);
                }

            });
    }

    function input_pet_age(){
        let pet_age_Y = document.querySelector('#pet_age_Y').value ;
        let pet_age_M = document.querySelector('#pet_age_M').value ;
        let pet_age = document.querySelector('#pet_age') ;

        // -------- เอา required ออก ----------
        if (pet_age_Y && pet_age_M) {
            pet_age.value = pet_age_Y + " ปี " + pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(pet_age_Y && !pet_age_M){
            pet_age.value = pet_age_Y + " ปี " ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(!pet_age_Y && pet_age_M){
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        if (pet_age_Y == "0" && pet_age_M) {
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        if (pet_age_Y && pet_age_M == "0") {
            pet_age.value = pet_age_Y + " ปี" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        // -------- ใส่ required  ----------
        if (pet_age_M == "0" && pet_age_Y == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && pet_age_M == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (pet_age_Y == "0" && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }
    }

    function add_photo(){
        document.querySelector('.lbl').classList.add('d-none');
        document.querySelector('#show-img').classList.remove('d-none');
    }


</script>
<script>
    function submit_form_lost_pet() {
        setTimeout(function() {
            document.getElementById("lost_pet_submit").click();
        }, 3000);
    }
</script>
<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function () {
			  'use strict'
	
			  // Fetch all the forms we want to apply custom Bootstrap validation styles to
			  var forms = document.querySelectorAll('.needs-validation')
	
			  // Loop over them and prevent submission
			  Array.prototype.slice.call(forms)
				.forEach(function (form) {
				  form.addEventListener('submit', function (event) {
					if (!form.checkValidity()) {
					  event.preventDefault()
					  event.stopPropagation()
					}
	
					form.classList.add('was-validated')
				  }, false)
				})
			})()
	</script>
    <script>
      function check() {
        let allAreFilled = true;
        document.getElementById("lostpet_by_partner").querySelectorAll("[required]").forEach(function(i) {
            if(!allAreFilled) return;
            if(!i.value) allAreFilled = false;
            if(i.type === "radio") {
                let radioValueCheck = false;				          
                document.getElementById("lostpet_by_partner").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                    if(r.checked) radioValueCheck = true;
                })
                    allAreFilled = radioValueCheck;
            }
        })
        if(!allAreFilled) {
            console.log("adas");
        }else{
            var btn_check = document.getElementById("btn-check");
            btn_check.classList.add("d-none");

            document.querySelector('#modal_submit').classList.remove('d-none');
        }
    };
    </script>
    
<script>
var owl = $('.owl-carousel');
owl.owlCarousel({
smartSpeed:250,
autoplay:true,
dots:false,
loop:true,
nav:false,
autoplay:true,
autoplayTimeout:1000,
margin:10,
responsive:{
    0:{
        items:1
    },
    600:{
        items:3
    },            
    960:{
        items:5
    },
    1200:{
        items:5
    }
}
});
</script>