@extends('layouts.partner.theme_partner')

@section('content')

<div class="card radius-10" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
    <div class="card-header border-bottom-0 bg-transparent">
            <div class="row col-12">
                <div class="col-12" style="padding-right:0px;">
                    <div class="row col-12">
                        <div class="col-12 col-lg-9 col-md-9">
                            <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                                สร้าง QR-Code
                            </h3>
                        </div>
                        <div class="col-12 col-lg-3 col-md-3">
                            <a style="float: right;" type="button" data-toggle="modal" data-target="#add_new_area">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fas fa-info-circle"></i>วิธีใช้
                                </button>
                            </a>
                        </div>
                    </div>
                    <hr>

                    <div id="div_select_theme_qr" class="row">
                        <div class="col-12">
                            <br>
                            <h4>เลือกรูปแบบที่ต้องการ</h4>
                            <br>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 text-center" style="padding-right:0px"> 
                            <img class="main-shadow main-radius" src="{{ url('peddyhub/images/check_in/theme/artwork_1-0.png') }}" width="80%">
                            <br><br>
                            <p style="width:30%;background-color: #B8205B;" class="btn text-white main-shadow main-radius" onclick="select_theme_qr('1')">
                                เลือก
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 text-center" style="padding-right:0px" >
                            <img class="main-shadow main-radius" src="{{ url('peddyhub/images/check_in/theme/artwork_2-0.png') }}" width="80%">
                            <br><br>
                            <p style="width:30%;background-color: #B8205B;" class="btn text-white main-shadow main-radius" onclick="select_theme_qr('2')">
                                เลือก
                            </p>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 text-center" style="padding-right:0px" >
                            <img class="main-shadow main-radius" src="{{ url('peddyhub/images/check_in/theme/promotion/22.png') }}" width="80%">
                            <br><br>
                            <p style="width:30%;background-color: #B8205B;" class="btn text-white main-shadow main-radius" onclick="select_theme_qr('3')">
                                เลือก
                            </p>
                        </div>
                    </div>

                    <div id="add_area_ok" class="col-12 d-none">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-lg-2 col-md-2">
                                        <img class="d-none" id="img_str_load" src="{{ url('peddyhub\images\PEDDyHUB sticker line/04.png') }}" width="100%">
                                    </div>
                                    <div class="col-12 col-lg-10 col-md-10">
                                        <h3 class="text-success" style="margin-top:20px;">
                                            เพิ่มจุด Check in/out เรียบร้อยแล้ว
                                        </h3>
                                        <p>คุณสามารถดาวน์โหลดรูปภาพและเริ่มใช้งานได้ทันที</p>
                                    </div>
                                    <!-- รูป QR theme -->
                                    <!-- <div class="col-3">
                                        <center>
                                            <br><br><br><br><br><br><br>
                                            <img class="d-none" id="img_qr_code" src="" width="100%">
                                            <br>
                                            <a id="download_img_qr_code" href="" class="btn btn-danger text-white d-none" download="">
                                                ดาวน์โหลด
                                            </a>
                                        </center>
                                    </div> -->
                                    <div class="col-12">
                                        <center>
                                            <br><br>
                                            <img id="img_theme_new" class="d-none main-shadow main-radius"  src="" width="65%">
                                            <br><br>
                                            <a style="background-color:#B8205B;" id="download_img_theme_new" href="" class="btn text-white d-none" download="">
                                                ดาวน์โหลด
                                            </a>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="div_data_qr" class="row col-12 d-none" >
                        <div id="div_create_qr" class="col-12 col-lg-6 col-md-6">
                            <div id="have_area" class="d-none">
                                <h3 class="text-danger" style="margin-top:20px;">มีพื้นที่นี้แล้ว</h3>
                                <p>หากมีข้อสงสัยกรุณาติดต่อทีมงาน PEDDyHUB</p>
                            </div>

                            <div id="div_input_data_qr" class="">
                                <input type="text" class="form-control d-none" id="name_partner" name="name_partner" value="{{ $data_partners->name }}">

                                <label class="control-label" for="name_new_check_in">พื้นที่ Check in</label><span class="text-danger">*</span>
                                <input type="text" class="form-control" id="name_new_check_in" name="name_new_check_in" placeholder="กรอกชื่อจุด Check in เช่น ชื่ออาคารหรือพื้นที่ย่อย" onchange="document.querySelector('#tag_a_qr').classList.remove('d-none');">

                                <br>
                                <div id="select_color">
                                    <label class="control-label" for="name_new_check_in">เลือกสีรูปภาพ</label>
                                    <input type="text" class="form-control d-" id="color_theme" name="color_theme" value="" placeholder="กรอกโค้ดสี เช่น #B8205B" >
                                    <br>
                                </div>

                                <div>
                                    <label class="control-label">รูปแบบที่เลือก</label>
                                    <input class="form-control" type="text" name="num_theme_qr" id="num_theme_qr" value="" readonly>
                                    <br>
                                </div>

                                <div style="float:right;margin-bottom:15px;">
                                    <span id="qr_spinner" class="text-success d-none">
                                       <div class="spinner-border text-success"></div> &nbsp; กรุณารอสักครู่..
                                    </span>

                                    <button id="tag_a_qr" class="btn btn-info text-white d-none" onclick="gen_qr_code();">
                                    สร้าง QR-Code
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6 col-md-6">
                            <center>
                                <img id="img_theme_old" class="main-shadow main-radius" src="" width="80%">
                            </center>
                        </div>
                    </div>
                    <br>
                 </div>
            </div>
   
    </div>
</div>
    <br>
</div>
<div class="modal fade" id="add_new_area" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">การสร้าง QR-Code พื้นที่ย่อย</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกรูปแบบที่ต้องการสร้าง</h5>
                <center><img src="{{ asset('/peddyhub/images/how_to_use/add_area_checkin/1.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.เลือกรูปแบบที่ต้องการสร้าง</h5>
                <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.1 พื้นที่Check in : กรอกชื่อของพื้นที่ เช่น ชื่ออาคารหรือพื้นที่ย่อย</h5>
                <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.2 เลือกสีรูปภาพ : กรอกโค้ดสีที่ต้องการ เช่น #B8205B หากไม่ได้ทำการกรอกโค้ดสี จะได้สีดังภาพตัวอย่าง</h5>
                <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.3 สร้าง QR-Code : เมื่อกรอกข้อมูลเรียบร้อยแล้วให้กดที่ปุ่มสร้าง QR-Code</h5>
                <center><img src="{{ asset('/peddyhub/images/how_to_use/add_area_checkin/2.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">&nbsp;3.รายชื่อ Check In/Out</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="Social_login">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/3.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ : แสดงชื่อผู้ใช้</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.เวลาเข้าออก : แสดงวันที่และเวลาที่เข้าออก </h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.เบอร์ : แสดงเบอร์ผู้ใช้บริการ</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">4.แจ้งติดโควิด</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="sos_detail">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/8.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกโรคติดต่อ</h5>
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/4.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.ค้นหาผู้ใช้ที่ติดโรค : พิมพ์ชื่อผู้ใช้พื่อค้นหา</h5>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/5.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.ติดโควิด : เมื่อเจอผู้ใช้ที่ติดโควิดแล้วให้กดปุ่มติดโควิด </h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 3.1 รายชื่อกลุ่มเสี่ยง : ระบบจะแสดงรายชื่อกลุ่มเสี่ยงทั้งหมดขึ้นมา</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 3.2 แจ้งเตือนกลุ่มเสี่ยง : ให้ทำการกดปุ่ม ส่งข้อความเตือน เพื่อแจ้งไปยังกลุ่มเสี่ยงทั้งหมด</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 

<script>

    function select_theme_qr(num_of_theme){
        let num_theme_qr = document.querySelector('#num_theme_qr') ;
            num_theme_qr.value = num_of_theme ;

        let img_theme_old = document.querySelector('#img_theme_old') ;

            if (num_of_theme === '1') {
                img_theme_old.src = "{{ url('peddyhub/images/check_in/theme/artwork_1-0.png') }}" ;
            }
            if (num_of_theme === '2'){
                img_theme_old.src = "{{ url('peddyhub/images/check_in/theme/artwork_2-0.png') }}" ;
            }
            if (num_of_theme === '3'){
                img_theme_old.src = "{{ url('peddyhub/images/check_in/theme/promotion/22.png') }}" ;
            }

        document.querySelector('#div_select_theme_qr').classList.add('d-none');
        document.querySelector('#div_data_qr').classList.remove('d-none');
    }


    function gen_qr_code(){

        document.querySelector('#qr_spinner').classList.remove('d-none');
        
        let result = document.querySelector('#name_new_check_in') ;
        let name_new_check_in = result.value.replaceAll(' ' , '_');

        let name_partner = document.querySelector('#name_partner') ;
        let name_partner_re = name_partner.value.replaceAll(' ' , '_');

        fetch("{{ url('/') }}/api/create_new_area_check_in/"+name_partner_re+"/"+name_new_check_in )
            .then(response => response.text())
            .then(id_latest => {
                console.log(id_latest);

                let url = "" ;
                url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.peddyhub.com/welcome_check_in_line?location=" + id_latest + "&chs=500x500&choe=UTF-8" ;

                console.log(url);

                let data = {
                    'url' : url,
                    'name_partner' : name_partner.value,
                    'name_new_check_in' : name_new_check_in,
                };

                fetch("{{ url('/') }}/api/save_img_url", {
                    method: 'post',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(function (response){
                    return response.text();
                }).then(function(text){
                    // console.log(text);
                    let url_img = "{{ url('storage') }}/" + "check_in/" + text;
                    // console.log(url_img);

                    // let img_qr_code = document.querySelector('#img_qr_code') ;
                    //     img_qr_code.src = url_img;
                    //     // img_qr_code.classList.remove('d-none');

                    // let download_img_qr_code = document.querySelector('#download_img_qr_code') ;
                    //     download_img_qr_code.href = url_img;
                    //     // download_img_qr_code.classList.remove('d-none');

                    change_color_theme("check_in/" + text);


                }).catch(function(error){
                    // console.error(error);
                });
        });

    }

    function change_color_theme(url_img)
    {
        // console.log('change_color_theme');

        let num_theme_qr = document.querySelector('#num_theme_qr') ;

        let img_theme_new = document.querySelector('#img_theme_new') ;

        let color_theme = document.querySelector('#color_theme') ;

        let name_partner = document.querySelector('#name_partner') ;
        let name_new_check_in = document.querySelector('#name_new_check_in') ;

        let data = {
            'color_theme' : color_theme.value,
            'name_partner' : name_partner.value,
            'name_new_check_in' : name_new_check_in.value,
            'url_img' : url_img,
            'num_theme_qr' : num_theme_qr.value,
        };

        fetch("{{ url('/') }}/api/create_img_check_in", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            document.querySelector('#qr_spinner').classList.add('d-none');

            if (text === "already have this area") {
                document.querySelector('#div_input_data_qr').classList.add('d-none');
                document.querySelector('#have_area').classList.remove('d-none');
            }else{

                document.querySelector('#div_input_data_qr').classList.add('d-none');
                document.querySelector('#add_area_ok').classList.remove('d-none');

                document.querySelector('#img_theme_old').classList.add('d-none');

                // let url_img_theme_new = "{{ url('/') }}/img/check_in/theme/test_1.png" ;
                let url_img_theme_new = "{{ url('storage') }}/" + "check_in"+ "/" + "artwork_" +  name_partner.value + '_' + name_new_check_in.value + '.png';

                let img_theme_new = document.querySelector('#img_theme_new');
                    img_theme_new.src = url_img_theme_new ;

                let download_img_theme_new = document.querySelector('#download_img_theme_new');
                    download_img_theme_new.href = url_img_theme_new ;

                
                // img_qr_code.classList.remove('d-none');
                img_theme_new.classList.remove('d-none');
                download_img_theme_new.classList.remove('d-none');
                document.querySelector('#img_str_load').classList.remove('d-none');
            }


        }).catch(function(error){
            console.error(error);
        });

    }

</script>

@endsection