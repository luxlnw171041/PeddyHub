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

<div id="check_in_max" class="div_alert d-none" role="alert">
    <span id="text_check_in_max">
        ขออภัย เกินจำนวนที่กำหนด
    </span>
</div>


<form method="POST" action="{{ url('/') }}/api/send_content_BC_by_check_in" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
    {{ csrf_field() }}

    <input class="form-control d-none" type="text" name="type_content" id="type_content" value="BC_by_check_in">
    <input class="form-control d-none" type="text" name="arr_user_id_selected" id="arr_user_id_selected" readonly>
    <input class="form-control d-none" type="text" name="name_partner" id="name_partner" value="{{ $name_partner }}">
    <input class="form-control d-none" type="text" name="id_partner" id="id_partner" value="{{ $partner_id }}">

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-md-9 col-lg-9">
                        <div class="modal-content" style="border-radius: 20px;">
                            <div class="modal-header">
                                <input class="form-control d-none" type="text" name="arr_user_id_send_to_user" id="arr_user_id_send_to_user" readonly>

                                <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold;font-family: 'Kanit', sans-serif;">
                                    กำหนดบรอดแคสต์
                                </h5>
                                <div>
                                    <a class="btn btn-warning btn-sm text-white main-shadow main-radius " onclick="reset_BC();">
                                        <i class="fas fa-sync"></i> reset
                                    </a>
                                    <button type="button" class="close btn btn-md" data-dismiss="modal" aria-label="Close">
                                        <span style="font-size: 28px;" aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12" style="font-family: 'Kanit', sans-serif;">
                                        <h4 class="text-dark">สร้างเนื้อหาใหม่</h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group {{ $errors->has('name_content') ? 'has-error' : ''}}">
                                                    <label for="name_content" class="control-label">{{ 'ชื่อเนื้อหา' }}</label>
                                                    <input style="border-radius: 10px;" class="form-control" name="name_content" type="text" id="name_content" value="" onchange="check_send_content();">
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
                                                    <label for="link" class="control-label">{{ 'ลิงก์' }}</label>
                                                    <input  style="border-radius: 10px;"class="form-control" name="link" type="text" id="link" value="" onchange="check_send_content();">
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-12 d-none">
                                                <div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
                                                    <label for="detail" class="control-label">{{ 'คำอธิบาย' }}</label>
                                                    <!-- <span class="text-secondary">(ไม่แสดงต่อผู้ใช้)</span> -->
                                                    <textarea class="form-control" name="detail" rows="4" type="text" id="detail" value="" onchange="check_send_content();"></textarea>
                                                    <br>
                                                </div>
                                            </div>
                                            <div id="div_user_unique" class="col-12 d-none d-flex align-items-center">
                                                <input class="" name="user_unique" type="checkbox" id="user_unique" value="" style="border-radius:50px;width:20px;height: 20px;cursor: pointer;" onclick="check_user_unique();">
                                                    &nbsp;<label for="user_unique" style="cursor: pointer;">ไม่ซ้ำกับผู้ใช้ที่เคยส่งแล้ว</label>
                                                <!-- &nbsp; ไม่ซ้ำกับผู้ใช้ที่เคยส่งแล้ว -->
                                                <br>
                                            </div>
                                            <div class="col-12 d-none">
                                                <div class="form-group {{ $errors->has('arr_show_user') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="arr_show_user" type="text" id="arr_show_user" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-3 d-none">
                                                <div class="form-group {{ $errors->has('send_again') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="send_again" type="text" id="send_again" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-3 d-none">
                                                <div class="form-group {{ $errors->has('id_ads') ? 'has-error' : ''}}">
                                                    <input class="form-control" name="id_ads" type="text" id="id_ads" value="" readonly>
                                                </div>
                                                <br>
                                            </div>
                                            <div class="col-6 d-none">
                                                <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                                    <!-- <label for="photo" class="control-label">{{ 'รูปภาพ' }}</label> -->
                                                    <input class="form-control" name="photo" id="photo" type="file" accept="image/*" onchange="loadFile(event),check_send_content();">
                                                </div>
                                                <br>
                                            </div>

                                            <div class="col-6">
                                                <span style="font-size:20px;color:blue;">จำนวน <span id="span_amount_send">0</span> คัน</span>
                                                <div class="d-none form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                                                    <!-- <label for="amount" class="control-label">{{ 'Amount' }}</label> -->
                                                    <input class="form-control" name="amount" type="text" id="amount" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <button id="btn_send_content" style="float: right;width: 40%;" class="btn-select btn btn-success btn-md main-shadow main-radius" data-toggle="modal" data-target="#btn-loading" data-dismiss="modal" aria-label="Close" disabled onclick="document.querySelector('#btn_btn_send_content_submit').click();">
                                                        ยืนยัน
                                                    </button>
                                                    <input class="d-none" id="btn_btn_send_content_submit" type="submit" value="{{ 'ยืนยัน' }}"  >
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <hr>
                                        <br>

                                        <h4>เลือกเนื้อหา</h4>
                                        <br>
                                        <div class="owl-carousel owl-theme content">
                                            @if(!empty($ads_contents))
                                                @foreach($ads_contents as $ads)
                                                    @php
                                                        if(!empty($ads->show_user)){
                                                            $show_user = json_decode($ads->show_user) ;
                                                            $count_show_user = count($show_user) ;
                                                        }else{
                                                            $count_show_user = '0' ;
                                                        }

                                                        if(!empty($ads->user_click)){
                                                            $user_click = json_decode($ads->user_click) ;
                                                            $count_user_click = count($user_click) ;
                                                        }else{
                                                            $count_user_click = '0' ;
                                                        }
                                                        
                                                    
                                                    @endphp

                                                    <div class="item item-content " >
                                                        <h5>{{ $ads->name_content }}</h5>
                                                        <div class="img-content">
                                                            <img src="{{ url('storage')}}/{{ $ads->photo }}" alt="">
                                                        </div>
                                                        <div class="content-status">
                                                            <div class="col-6">
                                                                <h6>
                                                                    ส่ง {{ $ads->send_round }} ครั้ง                
                                                                </h6>
                                                            </div >
                                                            <div class="col-6">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-6 col-lg-6 p-0 ">
                                                                        <h6 style="float: right; padding-right:10px;">
                                                                            <i class="fa-solid fa-user"></i> {{ $count_show_user }}
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-12  col-6 col-lg-6 p-0" >
                                                                        <h6 style="float: right; padding-right:10px;">
                                                                            <i class="fad fa-eye"></i> {{ $count_user_click }}
                                                                        </h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <span style="float: right;width: 100%;margin-top:15px;margin-bottom:5px;" class="btn-select btn btn-success btn-sm main-shadow main-radius" onclick="select_content_again('{{ $ads->id }}');">
                                                            เลือก
                                                        </span>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>

                                    </div>
                                <!-- ----------------phone----------------- -->
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-12 col-md-3 col-lg-3">
                        <center>
                            <br class="mt-5 d-block d-md-none">
                            <div class="phone-frame ml-5 modal-content" style="padding-top: 0px;">
                                <div class="row">
                                    <div class="col-12 " style="background-color: #FFFFFF;  border-radius:50px 50px 0px 0px;margin-top:-0.5%">
                                        <div class="row">
                                        <div class="col-3 text-center">{{ date('H:i') }}</div>
                                        <div class="col-6 phone-camera"></div>
                                        <div class="col-3 d-flex align-items-center">
                                            <div class="col-12 p-0">
                                                <div class="row ">
                                                    <div class="col p-0 phone-icon"><i class="fa-sharp fa-solid fa-signal-bars"></i></div>
                                                    <div class="col p-0 phone-icon"><i class="fa-solid fa-wifi"></i></div>
                                                    <div class="col p-0 phone-icon"><i class="fa-solid fa-battery-full"></i></div></div>
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="phone-header">
                                        <div class="row">
                                            <div class="col-7 phone-name ">
                                                <div class="row">
                                                    <div class="col-2 text-center"><i class="fa-solid fa-chevron-left"></i></div>
                                                    <div class="col-10 text-start p-0"> <img src="{{ asset('/peddyhub/images/icons/โล่.png') }}" alt="" width="8%"> ViiCHECK</div>
                                                </div>
                                            </div>
                                            <div class="col-5 phone-icon-header">
                                                <div class="row ">
                                                    <div class="col"><img src="{{ asset('/peddyhub/images/icons/search.png') }}" alt="" width="100%"></i></div>
                                                    <div class="col"><img src="{{ asset('/peddyhub/images/icons/document.png') }}" alt="" width="100%"></div>
                                                    <div class="col"><img src="{{ asset('/peddyhub/images/icons/more.png') }}" alt="" width="100%"></i></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div  class="phone-content" >
                                        <div id="div_img" class="col-12 d-none remove-scrollbar div_img" style="min-width: 100%;max-height: 100%;overflow:auto;cursor: grab;">
                                            <div class="col-12" >
                                                <div id="send-img">
                                                    <img src="{{ asset('/peddyhub/images/logo/logo-3.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#db2d2e 1px solid ; background-color:white;margin:5px" alt="" width="13%">
                                                        
                                                    <button id="img_exchange" type="button" class="button-reset-img" onclick="document.querySelector('#photo').click();">
                                                        <span class="button-reset-img-icon">
                                                            <i class="fa-solid fa-arrows-rotate"></i>
                                                        </span>
                                                        <span class="button-reset-img-text">Reset</span>
                                                    </button>
                                                    <img src="" alt="" width="100%" style="padding: 0px 5px;border-radius:10px" id="img-content"  >
                                                </div>
                                            </div>
                                            
                                            <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                        </div>
                                        <div id="div_add_img" class="col-12 remove-scrollbar" style="min-width: 100%;max-height: 250px;overflow:auto;cursor: grab;" onclick="document.querySelector('#photo').click();">
                                            <div class="col-12" >
                                                <div id="send-img">
                                                    <img src="{{ asset('/peddyhub/images/logo/logo-3.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#db2d2e 1px solid ; background-color:white;margin:5px" alt="" width="13%">
                                                    <img src="{{ asset('peddyhub/images/sticker/community.png') }}" alt="" width="100%" style="padding: 0px 5px;border-radius:10px" id="img_add_img"  >
                                                </div>
                                            </div>
                                            <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                        </div>
                                    </div>
                                    <div class="richmenu text-center" >
                                        <img src="{{ asset('/peddyhub/images/richmenu/main-richmenu_new/ph_richmenu_th.png') }}" alt="" width="100%">
                                    </div>
                                    <div class="row phone-footer d-flex justify-content-start">
                                        <div class="col d-flex justify-content-start" style="float: left;"><img src="{{ asset('/img/icon/keyboard.png') }}" alt="" width="20%"></div>
                                        <div class="col d-flex justify-content-start" style="cursor: pointer;float: left;">
                                            <span onclick="document.querySelector('.richmenu').classList.toggle('d-none');
                                            document.querySelector('.phone-content').classList.toggle('no-richmenu');
                                            document.querySelector('.div_img').classList.toggle('no-richmenu');">เมนู▾</span>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="card radius-10">

    <div class="card-body" style="position: relative;padding:30px;">
        <div class="row">

            <!-- DIV เลือกจำนวน / กรองข้อมูล -->
            <div class="col-3">
                <div class="row">
                    <div class="card filter"  style="padding:20px;">
                        <div class="col-12">
                            <div class="row form-select-car" >
                                <div class="col-12 text-center text-selected">
                                    <h5>เลือกจำนวน</h5>
                                    <span id="tell_BC_by_check_in_max">
                                        (ไม่เกิน <span id="amount_remain">{{ $BC_by_check_in_max - $BC_by_check_in_sent }}</span>)
                                    </span>
                                    
                                </div>
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-7">
                                            <span id="" class=""></span>
                                            <input min="0" max="{{ $BC_by_check_in_max - $BC_by_check_in_sent }}" style="width:100%;" placeholder="ไม่เกิน {{ $BC_by_check_in_max - $BC_by_check_in_sent }} คน" class="form-control" type="number" name="select_amount" id="select_amount" oninput="document.querySelector('#span_select_from_amount').innerHTML = '(' + document.querySelector('#select_amount').value + ')',document.querySelector('#span_select_from_amount').classList.remove('d-none');">
                                    </div>
                                    <div class="col-5">
                                        <button id="btn_select_from_amount" style="width: 100%;" class="btn-select btn btn-primary btn-md" onclick="select_from_amount();">
                                            เลือก<span id="span_select_from_amount" class=""></span>
                                        </button>
                                    </div>
                                    </div>
                                    
                                </div>

                                <div class="col-12 mt-3">
                                    <button id="btn_amount_remain_all" style="margin-top: 0px;width: 100%;" class="btn btn-md btn-info text-white btn-select" onclick="click_select_all();">
                                        เลือกทั้งหมด&nbsp;(<span id="amount_remain_all">{{ $BC_by_check_in_max - $BC_by_check_in_sent }}</span>)
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <p id="warn_BC_by_check_in_max" class="d-none text-danger mb-0" style="margin-top:15px;font-family: 'Kanit', sans-serif;">
                                <!-- ข้อความแจ้งเตือน -->
                            </p>
                        </div>
                        <hr style="margin-top:20px;border:1px solid #db2d2e;" >
                        <div class="col-12">
                            <div class="row ">
                                <div class="col-12 text-selected">
                                    <h5>
                                        เลือกแล้ว
                                        <span id="user_selected">0</span> / {{ $BC_by_check_in_max - $BC_by_check_in_sent }} คัน
                                    </h5>
                                </div>
                                <div class="col-12">
                                    <center>
                                        <button id="btn_next_selected_user" type="button" class="btn-select btn btn-md btn-success main-shadow main-radius" style="width:70%;" data-toggle="modal" data-target="#exampleModalCenter" disabled>
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

// -------------------------------------------------------------------------------------------------------------

var delayInMilliseconds = 1000; // Delay
var count_arr_user_id = 0 ;
var text_BC_remain = "";

var arr_user_id = [] ; // array() user_id
var arr_user_id_selected = document.querySelector('#arr_user_id_selected'); // input array user_id

if (arr_user_id_selected.value) {
    count_arr_user_id = JSON.parse(arr_user_id_selected.value).length ;
}

var remain = {{ $BC_by_check_in_max - $BC_by_check_in_sent }} - count_arr_user_id ; // จำนวนคงเหลือ

var amount_remain = document.querySelector('#amount_remain') ;
var amount_remain_all = document.querySelector('#amount_remain_all') ;

// -------------------------------------------------------------------------------------------------------------

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

                    // DIV COL-3
                    let div_data_name = document.createElement("div");
                        let class_div_data_name = document.createAttribute("class");
                            class_div_data_name.value = "col-12 col-md-3 col-lg-3 p-1";
                            div_data_name.setAttributeNode(class_div_data_name);
                        let onclick_btn_select = document.createAttribute("onclick");
                            onclick_btn_select.value = "click_select('" + result[i]['user_id'] + "')";
                            div_data_name.setAttributeNode(onclick_btn_select);
                        let id_div_result_content = document.createAttribute("id");
                            id_div_result_content.value = "div_result_content_count_" + content_count ;
                            div_data_name.setAttributeNode(id_div_result_content);

                    // ------------------------------------------------------------

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
                        let id_btn_select = document.createAttribute("id");
                            id_btn_select.value = "btn_select_user_id_" + result[i]['user_id'] ;
                            btn_select.setAttributeNode(id_btn_select);

                        let text_user_id = result[i]['user_id'].toString();

                            if ( arr_user_id.includes(text_user_id) ) {
                                // console.log("เลือกแล้ว");
                                class_btn_select.value = "fas fa-check-circle btn text-success";
                            }else{
                                class_btn_select.value = "far fa-circle btn";
                                // console.log("ยังไม่ได้เลือก");
                            }

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

// ตรวจสอบเกินจำนวนหรือไม่และเลือกหรือลบ
function click_select(user_id){

    document.querySelector('#user_unique').checked = false ;
    document.querySelector('#arr_user_id_send_to_user').value = null ;
    
    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);
    let class_btn_select_user_id = btn_select_user_id.classList[0] ;

    if (remain <= 0) { // ไม่มีโควต้า
        if (class_btn_select_user_id == "fas") {
            document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
            drop_user(user_id);
        }else{
            // เกินจำนวนที่กำหนด
            // console.log(remain + " <= 0");
            document.querySelector('#warn_BC_by_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#warn_BC_by_check_in_max').classList.remove('d-none');

            document.querySelector('#text_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
            document.querySelector('#check_in_max').classList.add('up_down');

            const animated = document.querySelector('.up_down');
            animated.onanimationend = () => {
                document.querySelector('#check_in_max').classList.remove('up_down');
            };
        }
    }else{ // มีโควต้า
        if (class_btn_select_user_id == "far") {
            document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
            select_user(user_id);
        }else{
            // เลือกแล้ว
            drop_user(user_id);
        }
    }

}

// คลิกเลือก
function select_user(user_id){
    // console.log("select_user");

    if (!arr_user_id_selected.value) {
        arr_user_id = JSON.parse( '["'+user_id +'"]' );
        arr_user_id_selected.value = JSON.stringify(arr_user_id) ;
    }else{
        arr_user_id = JSON.parse(arr_user_id_selected.value) ;

        if ( arr_user_id.includes(user_id) ) {
            // 
        }else{
            arr_user_id.push(user_id);
            arr_user_id_selected.value = JSON.stringify(arr_user_id) ;
        }
    }

    // ยังไม่ได้เลือก
    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);
        btn_select_user_id.classList = "fas fa-check-circle btn text-success" ;

    document.querySelector('#user_selected').innerHTML = JSON.parse(arr_user_id_selected.value).length ;

    remain = remain - 1 ;
    text_BC_remain = remain.toString();
    amount_remain.innerHTML = text_BC_remain ;
    amount_remain_all.innerHTML = text_BC_remain ;

    remain_it_0(remain);
}

function drop_user(user_id){
    // console.log("drop_user");

    let btn_select_user_id = document.querySelector('#btn_select_user_id_' + user_id);

    try{
        btn_select_user_id.classList = "far fa-circle btn" ;
    }
    catch{
        // 
    }

    let arr_select_user_id = JSON.parse(arr_user_id_selected.value) ;
    // delete array by user_id
    for( var ii = 0; ii < arr_select_user_id.length; ii++){ 
        if ( arr_select_user_id[ii] === user_id) { 
            arr_select_user_id.splice(ii, 1); 
        }
    }
    arr_user_id_selected.value = JSON.stringify(arr_select_user_id) ;
    document.querySelector('#user_selected').innerHTML = JSON.parse(arr_user_id_selected.value).length ;

    remain = remain + 1 ;
    text_BC_remain = remain.toString();
    amount_remain.innerHTML = text_BC_remain ;
    amount_remain_all.innerHTML = text_BC_remain ;

    remain_it_0(remain);
}

// เลือกจากจำนวน
function select_from_amount(){
    // console.log("select_from_amount");

    search_data();

    // ส่งต่อฟังก์ชั่น
    setTimeout(function() {
        let select_amount = document.querySelector('#select_amount').value ;
        select_content_from_amount(select_amount);
    }, delayInMilliseconds);
}

// คลิกเลือกทั้งหมด
function click_select_all(){
    // console.log("click_select_all");

    search_data();

    // ส่งต่อฟังก์ชั่น
    setTimeout(function() {
        select_content_from_amount(remain);
    }, delayInMilliseconds);
}

// คลิกเลือกตามจำนวนที่เลือก
async function select_content_from_amount(amount){
    // console.log("select_content_from_amount :: " + amount);
    
    // เช็ค จำนวนที่เลือกเกินกำหนดหรือไม่
    if ( amount <= remain ) {
        document.querySelector('#warn_BC_by_check_in_max').classList.add('d-none');
        document.querySelector('#tell_BC_by_check_in_max').classList.remove('text-danger');

        // คลิกเลือกตามจำนวน
        for (var i = 1; i <= amount; i++) {

            let i_btn_select = document.getElementsByName('i_btn_select_' + i);
            let class_i_btn_select = i_btn_select[0].classList[0] ;

            let uid_i_btn_select = i_btn_select[0].getAttribute('data') ;
                // console.log(uid_i_btn_select);

            if (!arr_user_id_selected.value) {
                // arr_user_id ว่าง
                if (class_i_btn_select == "far") {
                    document.querySelector('#div_result_content_count_' + i).click();
                }else{
                    amount = parseInt(amount) + 1 ;
                }
            }else{
                // arr_user_id ไม่ว่าง
                arr_user_id = JSON.parse(arr_user_id_selected.value) ;

                if ( arr_user_id.includes(uid_i_btn_select) ) {
                    // มี user id ใน arr_user_id แล้ว
                    amount = parseInt(amount) + 1 ; 

                }else{
                    // ยังไม่มี user id ใน arr_user_id แล้ว
                    if (class_i_btn_select == "far") {
                        document.querySelector('#div_result_content_count_' + i).click();
                    }else{
                        amount = parseInt(amount) + 1 ;
                    }
                }
            }
        }
    }else{
        document.querySelector('#warn_BC_by_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
        document.querySelector('#warn_BC_by_check_in_max').classList.remove('d-none');
        document.querySelector('#tell_BC_by_check_in_max').classList.add('text-danger');

        document.querySelector('#text_check_in_max').innerHTML = "ขออภัย เกินจำนวนที่กำหนด" ;
        document.querySelector('#check_in_max').classList.add('up_down');

        const animated = document.querySelector('.up_down');
        animated.onanimationend = () => {
            document.querySelector('#check_in_max').classList.remove('up_down');
        };
    }

}

// เช็คจำนวน = 0
function remain_it_0(remain){

    document.querySelector("#select_amount").placeholder = "ไม่เกิน " + remain + " คน" ;
    document.querySelector("#select_amount").max = remain  ;
    document.querySelector("#select_amount").value = ""  ;
    document.querySelector("#span_select_from_amount").classList.add("d-none") ;

    arr_user_id = arr_user_id_selected.value ; 

    if (remain <= 0) {
        document.querySelector('#btn_amount_remain_all').disabled = true ;
        document.querySelector('#btn_select_from_amount').disabled = true ;
    }else{
        document.querySelector('#btn_amount_remain_all').disabled = false ;
        document.querySelector('#btn_select_from_amount').disabled = false ;
    }

    // เช็คเพื่อเปิด / ปิด ปุ่มต่อไป
    let count_i = 0 ;
    let arr_check_in_i = document.querySelector('#arr_user_id_selected'); // input array user_id
    if (arr_check_in_i.value) {
        count_i = JSON.parse(arr_check_in_i.value).length ;
    }

    if (count_i != 0) {
        document.querySelector('#btn_next_selected_user').disabled = false ;
        document.querySelector('#amount').value = count_i.toString(); // MODAL
        document.querySelector('#span_amount_send').innerHTML = count_i.toString(); // MODAL
    }else{
        document.querySelector('#btn_next_selected_user').disabled = true ;
    }
}

// ----------------------------- function in modal -----------------------------------

function check_send_content(){
    let name_content = document.querySelector("#name_content").value;
    let link = document.querySelector("#link").value;
    let photo = document.querySelector("#photo").value;

    if (name_content && link && photo) {
        document.querySelector('#btn_send_content').disabled = false ;
    }else{
        document.querySelector('#btn_send_content').disabled = true ;
    }
}

function reset_BC(){
    document.querySelector('#arr_user_id_send_to_user').value = null ;
    document.querySelector('#id_ads').value = null ;
    document.querySelector('#div_user_unique').classList.add('d-none');
    document.querySelector('#send_again').value = null ;
    document.querySelector('#name_content').readOnly = false ;
    document.querySelector('#name_content').value = null;
    document.querySelector('#link').readOnly = false ;
    document.querySelector('#link').value = null;
    document.querySelector('#arr_show_user').value = null;
    document.querySelector('#img_exchange').classList.remove('d-none') ;
    document.querySelector('#send-img').classList.add('sand');
    document.querySelector('#div_img').classList.add('d-none');
    document.querySelector('#div_add_img').classList.remove('d-none');
    // document.querySelector('#img-content').src = null ;
    document.querySelector('#photo').value = null ;
    document.querySelector('#img_add_img').src = "{{ asset('/peddyhub/images/sticker/community.png') }}" ;
    
}

function select_content_again(ads_id){
    let arr_user_id_send_to_user = document.querySelector('#arr_user_id_send_to_user') ;
        arr_user_id_send_to_user.value = arr_user_id_selected.value;

    document.querySelector('#user_unique').checked = false ;
    document.querySelector('#send_again').value = 'Yes' ;
    document.querySelector('#div_user_unique').classList.remove('d-none');

    document.querySelector('#name_content').readOnly = true ;
    document.querySelector('#link').readOnly = true ;
    document.querySelector('#img_exchange').classList.add('d-none') ;
    document.querySelector('#photo').value = null ;

    @foreach($ads_contents as $ads)
        if ({{ $ads->id }} == ads_id) {
            
            let text_show_user = '{{ $ads->show_user }}'.replaceAll('&quot;' , '"');

            document.querySelector('#arr_show_user').value = text_show_user;
            document.querySelector('#name_content').value = '{{ $ads->name_content }}';
            document.querySelector('#id_ads').value = '{{ $ads->id }}';

            let link_url = '{{ $ads->link }}' ; 
                link_url = link_url.split("/api");
            let new_link_url = link_url[0];

            document.querySelector('#link').value = new_link_url ;
            document.querySelector('#detail').value = '{{ $ads->detail }}' ;
            document.querySelector('#img-content').src = '{{ url("/storage") }}' + '/' + '{{ $ads->photo }}' ;

            document.querySelector('#send-img').classList.remove('sand');

            setTimeout(function(){ 
                document.querySelector('#div_img').classList.remove('d-none');
                document.querySelector('#div_add_img').classList.add('d-none');

                document.querySelector('#send-img').classList.add('sand');
            }, 100);

        }
    @endforeach

    document.querySelector('#btn_send_content').disabled = false ;
}

function check_user_unique(){
    let user_unique =  document.querySelector('#user_unique').checked ;
        // console.log(user_unique);
    let arr_selected = JSON.parse(arr_user_id_selected.value) ;      
    let text_arr_show_user = document.querySelector('#arr_show_user') ;
    let arr_user_id_send_to_user = document.querySelector('#arr_user_id_send_to_user') ;
        arr_user_id_send_to_user.value = arr_user_id_selected.value;

    let arr_send_to_user = JSON.parse(arr_user_id_send_to_user.value) ; 

    if (user_unique) {
        if (text_arr_show_user.value) {

            let arr_show_user = JSON.parse(text_arr_show_user.value) ;
                // console.log(arr_show_user);
                // console.log(arr_selected);

            // console.log(arr_send_to_user);
            // console.log(">>>>>>-----------<<<<<<<");

            let delete_at_index = 0 ;
            for (let ii = 0; ii < arr_selected.length; ii++) {
                // console.log(">>>>>> รอบที่ " + ii + " <<<<<<<");

                if ( arr_show_user.includes(arr_selected[ii]) ) {
                    // console.log(">> id ที่ ซ้ำ >> : " + arr_selected[ii]);

                    // console.log(">> ก่อนลบ <<");
                    // console.log(arr_send_to_user);

                    // delete array
                    arr_send_to_user.splice(delete_at_index, 1); 

                    remain = remain + 1 ;
                    text_BC_remain = remain.toString();
                    amount_remain.innerHTML = text_BC_remain ;
                    amount_remain_all.innerHTML = text_BC_remain ;
                    // console.log(">> ลบแล้ว <<");
                    // console.log(arr_send_to_user);

                }else{
                    delete_at_index = delete_at_index + 1 ; 
                    // console.log('ไม่ซ้ำ บวก delete_at_index + 1 = ' + delete_at_index);
                }
            }

            document.querySelector('#span_amount_send').innerHTML = arr_send_to_user.length ;
            document.querySelector('#user_selected').innerHTML = arr_send_to_user.length ;
            // ส่ง content เดิม แบบไม่ซ้ำ user เดิม
            arr_user_id_send_to_user.value = JSON.stringify(arr_send_to_user) ;
            arr_user_id_selected.value = JSON.stringify(arr_send_to_user) ;
            
            remain_it_0(remain);
            search_data();
        }
    }else{
        arr_user_id_send_to_user.value = null ;
        document.querySelector('#span_amount_send').innerHTML = arr_selected.length ;
        document.querySelector('#user_selected').innerHTML = arr_selected.length ;

        remain_it_0(remain);
        search_data();

    }
    
}

// ----------------------------- function in modal -----------------------------------


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

<script>
  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){

        
        document.querySelector('#send-img').classList.remove('sand');

        setTimeout(function(){ 
            document.querySelector('#div_img').classList.remove('d-none');
            document.querySelector('#div_add_img').classList.add('d-none');

            document.querySelector('#send-img').classList.add('sand');
            var img_content = document.getElementById('img-content');
            img_content.src = reader.result;
        }, 100);
        

     
    };
    reader.readAsDataURL(event.target.files[0]);

  };
</script>


@endsection