@extends('layouts.partner.theme_partner')

@section('content')

@php
    function percent($data_find , $data_total){

        if($data_find == 0 or $data_total == 0 ){
            $data = 0 ;
        }
        else{
            $data = number_format( ( $data_find * 100 ) / $data_total, 2 ) ;
        }
        
        return $data ;
    }
@endphp
<style>

.lightbox {
  /* Default to hidden */
  display: none;

  /* Overlay entire screen */
  position: fixed;
  z-index: 999;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  
  /* A bit of padding around image */
  padding: 1em;

  /* Translucent background */
  background: rgba(0, 0, 0, 0.8);
}

/* Unhide the lightbox when it's the target */
.lightbox:target {
  display: block;
}

.lightbox span {
  /* Full width and height */
  display: block;
  width: 100%;
  height: 100%;

  /* Size and position background image */
  background-position: center;
  background-repeat: no-repeat;
  background-size: contain;
}
.btn-peddyhub{
    background-color:#B8205B;
    color:white;
    
}
.btn-peddyhub:hover {
    color:white;
      }
</style>

<div class="card radius-10">

    <div class="card-body" style="position: relative;padding:30px;">
        <div class="row">

            <!-- DIV เลือกจำนวน / กรองข้อมูล -->
            <div class="col-3">
                <div class="row">
                    <div class="card filter d-none"  style="padding:20px;">
                        <div class="col-12">
                            <div class="row form-select-car" >
                                <div class="col-12 text-center text-selected">
                                    <h5>เลือกจำนวน</h5>
                                    <span id="">
                                        (ไม่เกิน <span id="">0</span>)
                                    </span>
                                    
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-7">
                                            <span id="" class=""></span>
                                        <input min="1" max="500" style="width:100%;" placeholder="ไม่เกิน 0 คัน"  class="form-control" type="number" name="" id="" >
                                    </div>
                                    <div class="col-5">
                                        <button id="" style="width: 100%;" class="btn-select btn btn-primary btn-md">
                                            เลือก<span id="" class="d-none"></span>
                                        </button>
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="col-12 mt-3">
                                    <button id="" style="margin-top: 0px;width: 100%;" class="btn btn-md btn-info text-white btn-select">
                                        เลือกทั้งหมด&nbsp;(<span id=""> 0 </span>)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p id="" class="d-none text-danger mb-0" style="margin-top:15px;font-family: 'Kanit', sans-serif;">
                                <!-- ข้อความแจ้งเตือน -->
                            </p>
                        </div>
                        <hr style="margin-top:20px;border:1px solid #db2d2e;" >
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-12 text-selected">
                                    <h5>เลือกแล้ว</h5> &nbsp;0&nbsp;/ 0 คน
                                </div>
                                <div class="col-12">
                                    <center>
                                        <button id="" type="button" class="btn-select btn btn-md btn-success main-shadow main-radius" style="width:70%;" data-toggle="modal" data-target="#exampleModalCenter" disabled>
                                            ต่อไป
                                        </button>
                                    </center>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                    <br>

                    <!-- ตัวกรองข้อมูล -->
                    <div class="card filter accordion" id="accordion_data_filter" style="padding:20px;">
                        <div>
                            <div class="header text-filter ">
                                <h5>
                                    <i class="fa-regular fa-filter-list"></i> กรองข้อมูล
                                </h5>
                            </div>
                            <div class="row ">

                                <div class="col-12">
                                    <br>
                                    <label for="name_area" class="form-label">
                                        <b>พื้นที่</b>
                                    </label>
                                    <select name="name_area" class="notranslate form-control" id="name_area" onchange="search_data();">
                                        <option class="translate" value="" selected> ทั้งหมด </option>
                                        @foreach($all_area_partners as $area)
                                        <option value="{{ $area->id }}">
                                            {{ $area->name_area }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <label for="time" class="form-label">
                                        <input type="checkbox" name="check_click_time" id="check_click_time" data-toggle="collapse" data-target="#collapse_time" aria-expanded="true" aria-controls="collapse_time" onclick="check_click_checked('time');">
                                        &nbsp;&nbsp;<b>ช่วงเวลา</b>
                                    </label>
                                    <div id="collapse_time" class="collapse" data-parent="#accordion_data_filter">
                                        <div class="row">
                                            <div class="col-5">
                                                <input type="time" class="form-control" name="time_1" id="time_1" onchange="search_data();">
                                            </div>
                                            <div class="col-2">
                                                <center style="margin-top:10px;">
                                                    <span>ถึง</span>
                                                </center>
                                            </div>
                                            <div class="col-5">
                                                <input type="time" class="form-control" name="time_2" id="time_2" onchange="search_data();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <label for="select_day" class="form-label">
                                        <input type="checkbox" name="check_click_select_day" id="check_click_select_day" data-toggle="collapse" data-target="#collapse_select_day" aria-expanded="true" aria-controls="collapse_select_day" onclick="check_click_checked('select_day');">
                                        &nbsp;&nbsp;<b>วัน</b> (จันนทร์ - อาทิตย์)
                                    </label>
                                    <div id="collapse_select_day" class="collapse" data-parent="#accordion_data_filter">
                                        <select name="select_day" id="select_day" class="notranslate form-control" onchange="search_data();">
                                            <option value="" selected> - เลือก - </option>
                                            <option value="Monday" > จันทร์ </option>
                                            <option value="Tuesday" > อังคาร </option>
                                            <option value="Wednesday" > พุธ </option>
                                            <option value="Thursday" > พฤหัสบดี </option>
                                            <option value="Friday" > ศุกร์ </option>
                                            <option value="Saturday" > เสาร์ </option>
                                            <option value="Sunday" > อาทิตย์ </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <label for="amount_in_out" class="form-label">
                                        <input type="checkbox" name="check_click_amount_in_out" id="check_click_amount_in_out" data-toggle="collapse" data-target="#collapse_amount_in_out" aria-expanded="true" aria-controls="collapse_amount_in_out"onclick="check_click_checked('amount_in_out');">
                                        &nbsp;&nbsp;<b>จำนวนการเข้าพื้นที่</b>
                                    </label>
                                    <div id="collapse_amount_in_out" class="collapse" data-parent="#accordion_data_filter">
                                        <div class="row">
                                            <div class="col-6">
                                                <center style="margin-top:10px;">
                                                    <span>เข้าพื้นที่มากกว่า</span>
                                                </center>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="amount_in_out" id="amount_in_out" class="form-control" min="0" value="" onchange="search_data();">
                                            </div>
                                            <div class="col-2">
                                                <center style="margin-top:10px;">
                                                    <span>ครั้ง</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <label for="last_entry" class="form-label">
                                        <input type="checkbox" name="check_click_last_entry" id="check_click_last_entry" data-toggle="collapse" data-target="#collapse_last_entry" aria-expanded="true" aria-controls="collapse_last_entry"onclick="check_click_checked('last_entry');">
                                        &nbsp;&nbsp;<b>เข้า-ออก ล่าสุด</b>
                                    </label>
                                    <div id="collapse_last_entry" class="collapse" data-parent="#accordion_data_filter">
                                        <div class="row">
                                            <div class="col-4">
                                                <center style="margin-top:10px;">
                                                    <span>เข้า-ออก</span>
                                                </center>
                                            </div>
                                            <div class="col-4">
                                                <input type="number" name="amount_last_entry" id="amount_last_entry" class="form-control" min="0" value="" onchange="search_data();">
                                            </div>
                                            <div class="col-4">
                                                <center style="margin-top:10px;">
                                                    <span>วันล่าสุด</span>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <br>
                                    <label for="amount_in_out" class="form-label">
                                        <input type="checkbox" name="this_month" id="this_month" onclick="search_data();">
                                        &nbsp;&nbsp;<b>ผู้ใช้ที่เกิดเดือนนี้</b><span class="text-secondary"> ( {{ date("F", mktime(0, 0, 0, date('m'), 10)); }} )</span>
                                    </label>
                                </div>
                                <!-- กรองข้อมูลผู้ใช้ -->
                                <!-- หา % ต่างๆ -->
                                @php
                                    $count_user = count($check_in);
                                    $count_man = 0;
                                    $count_female = 0;
                                    $count_sex_not_specified = 0;

                                    $count_age_Range_1 = 0 ;
                                    $count_age_Range_2 = 0 ;
                                    $count_age_Range_3 = 0 ;
                                    $count_age_Range_4 = 0 ;
                                    $count_age_Range_5 = 0 ;
                                    $count_age_not_specified = 0 ;

                                    $count_location_bkk = 0 ;
                                    $count_location_near_bkk = 0 ;
                                    $count_location_other = 0 ;
                                    $count_location_not_specified = 0 ;

                                    foreach($check_in as $item){
                                        // เพศ
                                        if( $item->profile->sex == "ผู้ชาย" ){
                                            $count_man = $count_man + 1 ;
                                        }else if( $item->profile->sex == "ผู้หญิง" ){
                                            $count_female = $count_female + 1 ;
                                        }else{
                                            $count_sex_not_specified = $count_sex_not_specified + 1 ;
                                        }
                                        $percent_man = percent( $count_man , $count_user ) ;
                                        $percent_female = percent( $count_female , $count_user );
                                        $percent_sex_not_specified = percent( $count_sex_not_specified , $count_user );

                                        // อายุ 
                                        $year_now = date('Y');
                                        $birth = $item->profile->birth ;

                                        if(empty($birth)){
                                            $count_age_not_specified = $count_age_not_specified + 1 ;
                                        }else{
                                            $birth_sp = explode("-" , $birth);
                                            $birth_year = $birth_sp[0];
                                            $age_user = (int)$year_now - (int)$birth_year ;

                                            if($age_user < 20){
                                                $count_age_Range_1 = $count_age_Range_1 + 1 ;
                                            }else if($age_user >= 21 && $age_user < 30){
                                                $count_age_Range_2 = $count_age_Range_2 + 1 ;
                                            }else if($age_user >= 30 && $age_user < 46){
                                                $count_age_Range_3 = $count_age_Range_3 + 1 ;
                                            }else if($age_user >= 46 && $age_user < 60){
                                                $count_age_Range_4 = $count_age_Range_4 + 1 ;
                                            }else if($age_user >= 60){
                                                $count_age_Range_5 = $count_age_Range_5 + 1 ;
                                            }
                                        }

                                        $percent_age_Range_1 = percent( $count_age_Range_1 , $count_user ) ;
                                        $percent_age_Range_2 = percent( $count_age_Range_2 , $count_user ) ;
                                        $percent_age_Range_3 = percent( $count_age_Range_3 , $count_user ) ;
                                        $percent_age_Range_4 = percent( $count_age_Range_4 , $count_user ) ;
                                        $percent_age_Range_5 = percent( $count_age_Range_5 , $count_user ) ;
                                        $percent_age_not_specified = percent( $count_age_not_specified , $count_user ) ;

                                        // สถานที่
                                    }
                                @endphp
                                <div class="col-12">
                                    <br>
                                    <label for="user_data" class="form-label">
                                        <input type="checkbox" name="check_click_user_data" id="check_click_user_data" data-toggle="collapse" data-target="#collapse_user_data" aria-expanded="true" aria-controls="collapse_user_data"onclick="check_click_checked('user_data');">
                                        &nbsp;&nbsp;<b>ข้อมูลผู้ใช้</b>
                                    </label>
                                    <div id="collapse_user_data" class="collapse" data-parent="#accordion_data_filter">
                                        <!-- เพศ -->
                                        <label for="user_sex" class="form-label">
                                            <i class="fa-solid fa-circle-small"></i> เพศ
                                        </label>
                                        <div class="row">
                                            <div class="col-4">
                                                ชาย : {{ $percent_man }} %
                                            </div>
                                            <div class="col-4">
                                                หญิง : {{ $percent_female }} %
                                            </div>
                                            <div class="col-4">
                                                ไม่ทราบ : {{ $percent_sex_not_specified }} %
                                            </div>
                                            <div class="col-12">
                                                <select style="margin-top:8px;" name="select_user_sex" id="select_user_sex" class="notranslate form-control" onchange="search_data();">
                                                    <option value="" selected> - ทั้งหมด - </option>
                                                    <option value="ผู้ชาย" > ผู้ชาย </option>
                                                    <option value="ผู้หญิง" > ผู้หญิง </option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- อายุ -->
                                        <label for="user_age" class="form-label">
                                            <i class="fa-solid fa-circle-small"></i> อายุ
                                        </label>
                                        <div class="row">
                                            <div class="col-4">
                                                <20 : {{ $percent_age_Range_1 }} %
                                            </div>
                                            <div class="col-4">
                                                21 - 29 : {{ $percent_age_Range_2 }} %
                                            </div>
                                            <div class="col-4">
                                                30 - 45 : {{ $percent_age_Range_3 }} %
                                            </div>
                                            <div class="col-4">
                                                46 - 59 : {{ $percent_age_Range_4 }} %
                                            </div>
                                            <div class="col-4">
                                                60+ : {{ $percent_age_Range_5 }} %
                                            </div>
                                            <div class="col-4">
                                                ไม่ทราบ : {{ $percent_age_not_specified }} %
                                            </div>
                                            <div class="col-12">
                                                <select style="margin-top:8px;" name="select_user_age" id="select_user_age" class="notranslate form-control" onchange="search_data();">
                                                    <option value="" selected> - ทั้งหมด - </option>
                                                    <option value="<20" > น้อยกว่า 20 </option>
                                                    <option value="21-29" > 21 - 29 </option>
                                                    <option value="30-45" > 30 - 45 </option>
                                                    <option value="46-59" > 46 - 59 </option>
                                                    <option value="60+" > 60 ขึ้นไป </option>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- สถานที่ -->
                                        <label for="user_location" class="form-label">
                                            <i class="fa-solid fa-circle-small"></i> สถานที่
                                        </label>
                                        <div class="row">
                                            <div class="col-3">
                                                กรุงเทพฯ : 0 %
                                            </div>
                                            <div class="col-3">
                                                ปริมณฑล : 0 %
                                            </div>
                                            <div class="col-3">
                                                อื่นๆ : 0 %
                                            </div>
                                            <div class="col-3">
                                                ไม่ทราบ : 0 %
                                            </div>
                                            <div class="col-12">
                                                <select style="margin-top:8px;" name="select_user_location" id="select_user_location" class="notranslate form-control" onchange="search_data();">
                                                    <option value="" selected> - ทั้งหมด - </option>
                                                    <!-- loop location -->
                                                    @foreach($location_user as $lo_user)
                                                        <option value="{{ $lo_user->changwat_th }}" > {{ $lo_user->changwat_th }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <br>
                                    <center>
                                        <span class="btn btn-sm btn-secondary main-shadow main-radius" style="width:80%;">
                                            ล้างการค้นหา
                                        </span>
                                    </center>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DIV ผลการค้นหา -->

            <div class="col-9">
                <div class="row">
                    <div style="padding: 15px;">
                        <div>
                            <h4>
                                <i class="fa-solid fa-square-poll-horizontal"></i> ผลการค้นหา&nbsp;&nbsp;
                                <span style="font-size:15px;color: grey;">
                                    <span>ทั้งหมด</span> <span id="count_search_data">0</span>&nbsp;<span>คน</span>
                                </span>
                            </h4>
                        </div>    
                        <div class="div-result" >
                            <div class="row ">
                                <div class="col-12">
                                    <span>
                                        <b>กำลังค้นหา : </b> <span id="text_searching"></span>
                                    </span>
                                </div>
                                <div class="col-12">
                                    <!-- content_search_data -->
                                    <div class="row" id="content_search_data">
                                        
                                        <!--  -->

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

<script>

document.addEventListener('DOMContentLoaded', (event) => {
    // console.log("START");
    search_data();
    document.querySelector('#text_searching').innerHTML = "พื้นที่ = " + "ทั้งหมด";
});

function search_data(){

    let op_name_area = document.querySelector('#name_area') ;
    let id_name_area = document.querySelector('#name_area').value;
    let name_area = op_name_area.options[op_name_area.selectedIndex].text ;

    let op_select_day = document.querySelector('#select_day');
    let select_day = document.querySelector('#select_day').value;
    let TH_select_day = op_select_day.options[op_select_day.selectedIndex].text ;


    let time_1 = document.querySelector('#time_1').value;
    let time_2 = document.querySelector('#time_2').value;
    let amount_in_out = document.querySelector('#amount_in_out').value;
    let amount_last_entry = document.querySelector('#amount_last_entry').value;

    // data user
    let this_month = document.querySelector('#this_month').checked;
    let check_click_user = document.querySelector('#check_click_user_data').checked;
    let select_user_sex = document.querySelector('#select_user_sex').value;
    let select_user_age = document.querySelector('#select_user_age').value;
    let select_user_location = document.querySelector('#select_user_location').value;

    let data_search = {
            "partner_id" : {{ $partner_id }},
            "id_name_area" : id_name_area,
            "time_1" : time_1,
            "time_2" : time_2,
            "select_day" : select_day,
            "amount_in_out" : amount_in_out,
            "amount_last_entry" : amount_last_entry,
            "this_month" : this_month,
            "check_click_user" : check_click_user,
            "select_user_sex" : select_user_sex,
            "select_user_age" : select_user_age,
            "select_user_location" : select_user_location,
        };

    // console.log(data_search);

    fetch("{{ url('/') }}/api/search_data_broadcast_by_check_in",
    {
        method: 'post',
        body: JSON.stringify(data_search),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
        .then(result => {
            try {
                // console.log(result);

                document.querySelector('#count_search_data').innerHTML = result['length'] ;

                let content_search_data = document.querySelector('#content_search_data');
                    content_search_data.innerHTML = "" ;

                let content_count = 1 ;

                for (var i = 0; i < result.length; i++) {

                    if (!result[i]['name']) {
                        result[i]['name'] = "ไม่ได้ระบุ" ;
                    }

                    if (!result[i]['sex']) {
                        result[i]['sex'] = "ไม่ได้ระบุ" ;
                    }

                    let age_user = "" ;
                    if (!result[i]['age']) {
                        result[i]['age'] = "ไม่ได้ระบุ" ;
                    }else{
                        const user_birth = new Date( result[i]['age'] );
                        user_birth_year = user_birth.getFullYear();
                        const date_now = new Date();
                        year_now = date_now.getFullYear();
                        age_user = year_now - user_birth_year ;
                    }

                    let div_data_name = document.createElement("div");
                    let class_div_data_name = document.createAttribute("class");
                        class_div_data_name.value = "col-12 col-md-3 col-lg-3 p-1";
                        div_data_name.setAttributeNode(class_div_data_name);

                    let btn_select = document.createElement("i");
                        let name_btn_select = document.createAttribute("name");
                            name_btn_select.value = "i_btn_select_"  + content_count;
                        btn_select.setAttributeNode(name_btn_select);
                        let uid = document.createAttribute("data");
                            uid.value = result[i]['user_id']  ;
                        btn_select.setAttributeNode(uid);
                        let class_btn_select = document.createAttribute("class");
                            class_btn_select.value = "far fa-circle btn";
                            btn_select.setAttributeNode(class_btn_select);

                        div_data_name.appendChild(btn_select);


                    let span_name_user = document.createElement("span");
                        span_name_user.innerHTML = "<center><h5>" + result[i]['name'] + "<span class='text-secondary' style='font-size: 14px;'>(" + result[i]['user_id'] +")</span></h5>  <br> <b>เพศ :</b> " + result[i]['sex'] + " <b>อายุ :</b> " + age_user + "</center>" ;
                        div_data_name.appendChild(span_name_user);

                    // -------------------------------------------------------
                    content_search_data.appendChild(div_data_name);
                    content_count = content_count + 1 ;
                }
            }
            catch(err) {
                // console.log(err);
            }
            
        });

    // ---------- แสดงการค้นหา -------------------------------

    let text_searching = document.querySelector('#text_searching');
        text_searching.innerHTML = "" ;
    let new_text_searching = "" ;

    if (!name_area) {
        new_text_searching = new_text_searching + "พื้นที่ = " + "ทั้งหมด";
    }else{
        new_text_searching = new_text_searching + "พื้นที่ = " + name_area;
    }

    let check_click_time = document.querySelector('#check_click_time').checked;
    if (check_click_time) {
        new_text_searching = new_text_searching + ", เวลาเข้า = " + time_1;
        new_text_searching = new_text_searching + ", เวลาออก = " + time_2;
    }

    let check_click_select_day = document.querySelector('#check_click_select_day').checked;
    if (check_click_select_day) {
        new_text_searching = new_text_searching + ", วัน = " + TH_select_day;
    }

    let check_click_amount_in_out = document.querySelector('#check_click_amount_in_out').checked;
    if (check_click_amount_in_out) {
        new_text_searching = new_text_searching + ", จำนวนการเข้า-ออก มากกว่า = " + amount_in_out + " ครั้ง";
    }

    let check_click_last_entry = document.querySelector('#check_click_last_entry').checked;
    if (check_click_last_entry) {
        new_text_searching = new_text_searching + ", เข้า-ออก ล่าสุด = " + amount_last_entry + " วัน ล่าสุด";
    }

    if (this_month) {
        new_text_searching = new_text_searching + ", ผู้ใช้ที่เกิดเดือนนี้ (" + {{ date('m') }} + ")";
    }

    let check_click_user_data = document.querySelector('#check_click_user_data').checked;
    if (check_click_user_data) {
        new_text_searching = new_text_searching + ", เพศ  = " + select_user_sex;
        new_text_searching = new_text_searching + ", อายุ  = " + select_user_age;
        new_text_searching = new_text_searching + ", สถานที่  = " + select_user_location;
    }



    text_searching.innerHTML = new_text_searching ;

}

function check_click_checked($checked){
    let check_input_checked = document.querySelector('#check_click_' + $checked).checked ;

    if (!check_input_checked) {
        // console.log($checked);

        switch($checked) {
            case 'time':
                document.querySelector('#time_1').value = "";
                document.querySelector('#time_2').value = "";
            break;
            case 'select_day':
                document.querySelector('#select_day').value = "";
            break;
            case 'amount_in_out':
                document.querySelector('#amount_in_out').value = "";
            break;
            case 'last_entry':
                document.querySelector('#amount_last_entry').value = "";
            break;
            case 'user_data':
                document.querySelector('#select_user_sex').value = "";
                document.querySelector('#select_user_age').value = "";
                document.querySelector('#select_user_location').value = "";
            break;
        }

        search_data();
    }
}

</script>
@endsection