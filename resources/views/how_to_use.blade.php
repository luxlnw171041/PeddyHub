@extends('layouts.peddyhub')
@section('content')
<style>
    .radius-15 {
        border-radius: 15px;
    }

    .btn-outline-peddyhub {
        border: #b8205b 1px solid;
        background-color: white;
        color: #b8205b;
    }

    .btn-outline-peddyhub:hover {
        background-color: #b8205b;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <!------------------------------------------------ ลงทะเบียน ------------------------------------------------>
        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class="text-center">
                    <div class="p-4 radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/29.png')}}" class="img-fluid customer notranslate">
                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">การลงทะเบียน</h6>
                        <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#register">วิธีใช้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--------------------- Modal ลงทะเบียน ---------------->
        <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">การลงทะเบียน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center ">
                        <img width="60%" src="{{ url('peddyhub/images/how_to_use/register/1.png')}}" class="text-center img-fluid customer notranslate">
                    </div>
                    <div style="padding: 0px 15px;">
                        <div class="card col-12" style="font-family: 'Kanit', sans-serif; margin-bottom: 10px;">
                            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register_1" aria-expanded="true" aria-controls="sos1">
                                    <h5 style="margin-bottom:0px;font-family: 'Kanit', sans-serif;font-size:25px">1.เข้าสู่ระบบ</h5>
                                </div>
                                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register_1" aria-expanded="true" aria-controls="sos1">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="col-12 collapse" id="register_1" >
                                    <br>
                                    <center><img src="{{ url('peddyhub/images/how_to_use/register/2.png')}}"  width="60%" alt="Card image cap"></center>
                                    <br>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.ชื่อผู้ใช้ : สำหรับกรอกชื่อผู้ใช้ที่สมัครด้วยE-mail</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.รหัสผ่าน : สำหรับกรอกรหัสผ่านที่สมัครด้วยE-mail</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">3.เข้าสู่ระบบ : เมื่อกรอกชื่อผู้ใช้และรหัสผ่านแล้วให้คลิกที่ปุ่มเข้าสู่ระบบเพื่อทำการเข้าสู่ระบบ</h5>
                                </div>
                            </div>
                        </div>


                        <div class="card col-12" style="font-family: 'Kanit', sans-serif; margin-bottom: 10px;">
                            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#register_2" aria-expanded="true" aria-controls="sos1">
                                    <h5 style="margin-bottom:0px;font-family: 'Kanit', sans-serif;font-size:25px">1.สมัครสมาชิกด้วย E-mail</h5>
                                </div>
                                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#register_2" aria-expanded="true" aria-controls="sos1">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="col-12 collapse" id="register_2" >
                                    <br>
                                    <center><img src="{{ url('peddyhub/images/how_to_use/register/3.png')}}"  width="60%" alt="Card image cap"></center>
                                    <br>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.ชื่อ : สำหรับกรอกชื่อที่ต้องการให้ระบบแสดง</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.ชื่อผู้ใช้ : สำหรับกรอกชื่อผู้ใช้ที่ใช้ในการเข้าสู่ระบบ</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">3.อีเมล : สำหรับกรอกอีเมลที่เชื่อมต่อกับบัญชีนี้</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">4.รหัสผ่าน : สำหรับกรอกรหัสผ่านที่ใช้ในการเข้าสู่ระบบ</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">5.ยืนยันรหัสผ่าน : สำหรับกรอกรหัสผ่านอีกครั้ง</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">6.ฉันยอมรับ : กดคลิกที่ช่องสี่เหลี่ยมเพื่อเป็นการยอมรับนโยบายเกี่ยวกับข้อมูลส่วนบุคคลและข้อกำหนดและเงื่อนไขการใช้บริการ</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">7.สมัครสมาชิก : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มสมัครสมาชิกเพื่อทำการสมัครสมาชิก</h5>
                                </div>
                            </div>
                        </div>


                        <div class="card col-12" style="font-family: 'Kanit', sans-serif; margin-bottom: 10px;">
                            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login_social" aria-expanded="true" aria-controls="sos1">
                                    <h5 style="margin-bottom:0px;font-family: 'Kanit', sans-serif;font-size:25px">3.เข้าสู่ระบบด้วย Social</h5>
                                </div>
                                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#login_social" aria-expanded="true" aria-controls="sos1">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="col-12 collapse" id="login_social" >
                                    <br>
                                    <center><img src="{{ url('peddyhub/images/how_to_use/register/4.png')}}"  width="60%" alt="Card image cap"></center>
                                    <br>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.Login GOOGLE : ใช้สำหรับเข้าสู่ระบบด้วยบัญชีกูเกิ้ล</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.Login With LINE : ใช้สำหรับเข้าสู่ระบบด้วยบัญชีไลน์</h5>
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
        <!---------------------end Modal ลงทะเบียน ---------------->
        <!------------------------------------------------end ลงทะเบียน ------------------------------------------------>
        
        <!----------------------------------------------- ลงทะเบียนสัตว์เลี้ยง ----------------------------------------------->
        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class="text-center">
                    <div class="p-4  radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/33.png')}}" class="img-fluid customer notranslate">
                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">ลงทะเบียนสัตว์เลี้ยง</h6>
                        <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#register_pet">วิธีใช้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!--------------------- Modal ลงทะเบียนสัตว์เลี้ยง ---------------->
         <div class="modal fade" id="register_pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">การลงทะเบียนสัตว์เลี้ยง</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center ">
                        <img width="100%" src="{{ url('peddyhub/images/how_to_use/register_pet/1.png')}}" class="text-center img-fluid customer notranslate">
                    </div>
                    <br>
                    <div style="padding: 0px 15px;">
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.ชื่อสัตว์เลี้ยง : สำหรับกรอกชื่อสัตว์เลี้ยงที่ลงทะเบียน</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.รูป : สำหรับเพิ่มรูปสัตว์เลี้ยง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">3.ประเภท : สำหรับเลือกประเภทของสัตว์เลี้ยง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">4.เพศ : สำหรับเลือกเพศของสัตว์เลี้ยง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">5.วันเกิด : สำหรับกรอกวันเกิดของสัตว์เลี้ยง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">6.กรุ๊ปเลือด : สำหรับกรอกกรุ๊ปเลือดของสัตว์เลี้ยง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">7.อัปเดต : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มอัปเดตเพื่อลงทะเบียนสัตว์เลี้ยง</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------end Modal ลงทะเบียนสัตว์เลี้ยง ---------------->

        <!----------------------------------------------- end ลงทะเบียนสัตว์เลี้ยง ----------------------------------------------->

        <!--------------------------------------------------- ตามหาเจ้าตัวแสบ --------------------------------------------------->
        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class=" text-center">
                    <div class="p-4  radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/30.png')}}" class="img-fluid customer notranslate">

                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">ตามหาเจ้าตัวแสบ</h6>
                        <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#find_pet">วิธีใช้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------- Modal ตามหาเจ้าตัวแสบ ---------------->
        <div class="modal fade" id="find_pet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">การลงทะเบียนสัตว์เลี้ยง</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center ">
                        <img width="100%" src="{{ url('peddyhub/images/how_to_use/find_pet/1.png')}}" class="text-center img-fluid customer notranslate">
                    </div>
                    <br> 
                    <div style="padding: 0px 15px;">
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.บ้านของฉัน : กดที่ปุ่มบ้านของฉันหากต้องการเลือกตำแหน่งที่สัตว์หายเป็นตำแหน่งเดียวกับบ้าน</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.เลือกตำแหน่ง : เลือกตำแหน่งที่สัตว์หายด้วยตนเอง</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">3.เบอร์ติดต่อ : สำหรับกรอกเบอร์ติดต่อ สำหรับการติดต่อกลับ</h5>
                        <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">4.เลือกเจ้าตัวแสบ : สำหรับเลือกเสัตว์เลี้ยงที่หาย</h5>
                    
                        <div class="alert alert-danger" role="alert" > 
                            <h6 style="font-family: 'Kanit', sans-serif;" ><i class="fas fa-exclamation-circle"></i>
                                หมายเหตุ <br><br>
                                &nbsp;&nbsp;&nbsp;1.ต้องทำการเพิ่มเพื่อนในบัญชีไลน์เพื่อรับการแจ้งเตือน เพิ่มเพื่อน<a style="font-family: 'Kanit', sans-serif;" href="https://lin.ee/QRPGdf7" class="alert-link" target="_blank">คลิก</a><br>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------end Modal ตามหาเจ้าตัวแสบ ---------------->

        <!---------------------------------------------------End ตามหาเจ้าตัวแสบ --------------------------------------------------->

        <!--------------------------------------------------------- สถานที่ใกล้ฉัน --------------------------------------------------------->
        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class=" text-center">
                    <div class="p-4  radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/31.png')}}" class="img-fluid customer notranslate">
                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">สถานที่ใกล้ฉัน</h6>
                        <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#near_me">วิธีใช้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------- Modal สถานที่ใกล้ฉัน ---------------->
        <div class="modal fade" id="near_me" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle" style="font-family: 'Kanit', sans-serif;">สถานที่ใกล้ฉัน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div style="padding: 0px 15px;">
                        <div class="card col-12" style="font-family: 'Kanit', sans-serif; margin-bottom: 10px;">
                            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#hospital_near_me" aria-expanded="true" aria-controls="sos1">
                                    <h5 style="margin-bottom:0px;font-family: 'Kanit', sans-serif;font-size:25px">1.โรงพยาบาลใกล้ฉัน</h5>
                                </div>
                                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#hospital_near_me" aria-expanded="true" aria-controls="sos1">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="col-12 collapse" id="hospital_near_me" >
                                    <br>
                                    <center><img src="{{ url('peddyhub/images/how_to_use/near_me/1.png')}}"  width="100%" alt="Card image cap"></center>
                                    <br>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.เลือกจากตำแหน่งของฉัน : กดปุ่มเลือกจากตำแหน่งของฉัน หากต้องการค้นหาโรงพยาบาลสัตว์จากตำแหน่งของคุณ</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.เลือกตำแหน่งด้วยตนเอง : สำหรับกรอกตำแหน่งที่ต้องการ</h5>
                                </div>
                            </div>
                        </div>

                        <div class="card col-12" style="font-family: 'Kanit', sans-serif; margin-bottom: 10px;">
                            <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                                <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#pet_friendly" aria-expanded="true" aria-controls="sos1">
                                    <h5 style="margin-bottom:0px;font-family: 'Kanit', sans-serif;font-size:25px" class="notranslate">1.PetLand</h5>
                                </div>
                                <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#pet_friendly" aria-expanded="true" aria-controls="sos1">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                                <div class="col-12 collapse" id="pet_friendly">
                                    <br>
                                    <center><img src="{{ url('peddyhub/images/how_to_use/near_me/2.png')}}"  width="100%" alt="Card image cap"></center>
                                    <br>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.เลือกจากตำแหน่งของฉัน : กดปุ่มเลือกจากตำแหน่งของฉัน หากต้องการค้นหาสถานที่ท่องเที่ยว ที่สามารถนำสัตว์เลี้ยงเข้าได้จากตำแหน่งของคุณ</h5>
                                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.เลือกตำแหน่งด้วยตนเอง : สำหรับกรอกตำแหน่งที่ต้องการ</h5>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-danger" role="alert" > 
                            <h6 style="font-family: 'Kanit', sans-serif;" ><i class="fas fa-exclamation-circle"></i>
                                หมายเหตุ <br><br>
                                &nbsp;&nbsp;&nbsp; 1.สำหรับบริการสถานที่ใกล้ฉัน จำเป็นต้องเปิดตำแหน่งที่ตั้งเพื่อใช้บริการ<br>
                            </h6>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------end Modal สถานที่ใกล้ฉัน ---------------->
        <!--------------------------------------------------------- End สถานที่ใกล้ฉัน --------------------------------------------------------->
        <!----------------------------------------------------------- หาบ้านให้น้อง ----------------------------------------------------------->

        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class=" text-center">
                    <div class="p-4  radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/32.png')}}" class="img-fluid customer notranslate">
                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">หาบ้านให้น้อง</h6>
                        <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#adopt">วิธีใช้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------- Modal ตามหาเจ้าตัวแสบ ---------------->
        <div class="modal fade" id="adopt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">หาบ้านให้น้อง</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center ">
                        <img width="100%" src="{{ url('peddyhub/images/how_to_use/adopt/1.png')}}" class="text-center img-fluid customer notranslate">
                    </div>
                    <br>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">1.ชื่อ : สำหรับกรอกชื่อ</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">2.ประเภท : สำหรับเลือกประเภทสัตว์</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">3.เพศ : สำหรับเลือกเพศสัตว์</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">4.รายละเอียด : สำหรับกรอกรายละเอียดเพิ่มเติม</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">5.รูปภาพ : สำหรับเพิ่มรูปภาพ</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">6.ขนาด : สำหรับเลือกขนาดของสัตว์</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">7.ช่วงอายุ : สำหรับเลือกช่วงอายุของสัตว์</h5>
                    <h6 style="text-indent:20px;font-family: 'Kanit', sans-serif; margin-bottom: 10px;">8.โพส : เมื่อกรอกข้อมูลครบถ้วนและถูกต้องให้คลิกที่ปุ่มโพส</h5>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!---------------------end Modal ตามหาเจ้าตัวแสบ ---------------->
        <!-----------------------------------------------------------End หาบ้านให้น้อง ----------------------------------------------------------->

        <div class="col-12 col-md-3">
            <div class=" radius-15">
                <div class=" text-center">
                    <div class="p-4  radius-15">
                        <img style="max-height: 122px;" src="{{ url('peddyhub/images/PEDDyHUB sticker line/34.png')}}" class="img-fluid customer notranslate">
                        <h6 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">หาคู่ให้น้อง</h6>
                        <div class="d-grid mt-2"> <button href="#" style="cursor: not-allowed;" class="btn btn-outline-peddyhub radius-15" data-toggle="modal" data-target="#gallery" disabled>กำลังมา</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<br><br>
@endsection