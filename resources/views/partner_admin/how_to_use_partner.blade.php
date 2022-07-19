@extends('layouts.partner.theme_partner')

@section('content')
<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="fa-solid fa-users-gear" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">การจัดการผู้ใช้</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#Partner_user">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="fa-regular fa-location-dot" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">Check In/Out</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#how_to_use_covid">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="fas fa-qrcode" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">เพิ่มจุด Check In</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#add_new_area">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="far fa-images" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">คลังภาพ Check In</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#gallery">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="fa-solid fa-hand-holding-box" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">จัดการสินค้า</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#product">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card radius-15">
            <div class="card-body text-center">
                <div class="p-4 border radius-15">
                    <i class="fa-solid fa-cart-shopping" style="font-size:110px;color:#b8205b;" class="rounded-circle shadow" alt=""></i>
                    <h5 class="mb-0 mt-1" style="font-family: 'Kanit', sans-serif;">จัดการรายการสั่งซื้อ</h5>
                    <div class="d-grid mt-2"> <a href="#" class="btn btn-outline-primary radius-15" data-toggle="modal" data-target="#order">วิธีใช้</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!------------------------------------------------ gellaly ------------------------------------------------>
<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">คลังภาพ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/gallery/1.png') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.หากมีพื้นที่แล้วแต่ยังไม่มี QR-Code ของพื้นที่ หรือต้องการเปลี่ยนสีของ QR-Code ให้กดที่ปุ่มสร้าง QR-Code</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.กรอกโค้ดสี : กรอกโค้ดสีที่ต้องการ เช่น #B8205B</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เมื่อกรอกโค้ดสีแล้วให้กดที่ปุ่มยืนยันเพื่อสร้าง QR-Code ใหม่</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.กดที่ปุ่มดาวน์โหลดเพื่อโหลดเป็นไฟล์ภาพ</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.กดที่ปุ่มแว่นขยายเพื่อดูรูปภาพขนาดใหญ่</h5>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-------------------------------------------- add new area -------------------------------------------->
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
<!------------------------------------------- Modal จัดการผู้ใช้ ------------------------------------------->
<div class="modal fade"  id="Partner_user" tabindex="-1" role="dialog" aria-labelledby="Partner_userTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" >
      <div class="modal-content" >
        <div class="modal-header" >
          <h5 class="modal-title" style="font-family: 'Prompt', sans-serif;" id="Partner_userTitle">จัดการผู้ใช้</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <center><img src="{{ asset('/peddyhub/images/how_to_use/user/1.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center><br>
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">1.ค้นหาผู้ใช้</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">ค้นหารายการจากชื่อผู้ใช้ตามคำที่กำหนด </h5>
                  </div>
              </div>
            </div>
          
          <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.ตารางสมาชิก</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="Social_login">
                    <br>
                    <center><img src="{{ asset('/peddyhub/images/how_to_use/user/3.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ :  แสดงชื่อผู้ใช้</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.ประเภท : แสดงประเภทการเข้าสู้ระบบ มีดังนี้ 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-line text-success"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี LINE </h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-facebook-square text-primary"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Facebook</h5>
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fab fa-google text-danger"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชี Google </h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-" <i class="fas fa-globe" style="color: #5F9EA0"></i> " หมายถึง เข้าสู่ระบบด้วยบัญชีที่สมัครสมาชิกผ่านหน้าเว็บ</h5>
                    </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.เบอร์ : แสดงเบอร์ผู้ใช้</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 4.สถานะ : แสดงสถานะบทบาทของบัญชี</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 5.สถานะการใช้งาน : แสดงสถานะการใช้งานของบัญชี</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 6.ผู้สร้าง : แสดงชื่อผู้สร้างบัญชี</h5> 
                  </div>
              </div>
            </div>
            <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
              <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                  <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                      <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.สร้างบัญชีผู้ใช้ใหม่</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                      <i class="fas fa-angle-down"></i>
                  </div>
                  <div class="col-12 collapse" id="login">
                      <br>
                      <center><img src="{{ asset('/peddyhub/images/how_to_use/user/2.png') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center>
                      <br>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.สถานะสมาชิก
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.1 Admin : สามารถใช้ระบบ PEDDyHUB PARTNER และมีสิทธิ์จัดการข้อมูลภายในองค์กรได้</h5> 
                      <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 1.2 Member : สามารถใช้ระบบ PEDDyHUB PARTNER แต่ไม่มีสิทธิ์ในการจัดการข้อมูลภายในองค์กร</h5>
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  2.ปิด : หากไม่ต้องการเพิ่มสมาชิกให้คลิกที่ปุ่มปิด</h5> 
                      <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  3.ยืนยัน : เมื่อกำหนดสถานะสมาชิกแล้วให้คลิกที่ปุ่มยืนยัน</h5> 
                      
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
  <!--------------------------- modal how to use covid --------------------------->
<div class="modal fade" id="how_to_use_covid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">การใช้งานระบบจัดการ Check In/Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/6.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#select_area" aria-expanded="false" aria-controls="select_area">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">&nbsp;1.เลือกพื้นที่</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#select_area" aria-expanded="false" aria-controls="select_area">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="select_area">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/7.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">เลือกพื้นที่ ที่ต้องการดูข้อมูลการเข้า-ออกพื้นที่</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">&nbsp;2.ค้นหา</h5>
                        </div>
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="login">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/2.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกวัน : เลือกวันที่ต้องการค้นหารายการบุคคลเข้าออก
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 2.เลือกช่วงเวลา : สามารถระบุช่วงเวลาที่บุคคลเข้าออกได้ โดยระบุในช่องค้นหา เพื่อเลือกเวลาที่ที่ต้องการค้นหา</h5>
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 3.ชื่อ : ค้นหารายการจากชื่อผู้ใช้ตามคำที่กำหนด</h5>
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 4.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนแล้วให้กดที่ปุ่มค้นหาเพื่อทำการค้นหาข้อมูล</h5>
                                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;"> 5.ล้างการค้นหา : หากต้องการยกเลิกการค้นหาให้กดที่ปุ่มล้างการค้นหา เพื่อยกเลิกการค้นหา</h5>
                        </div>
                    </div>
                </div>
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

<!-- product -->
<div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/product/1.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ค้นหารายการสินค้าจากชื่อสินค้าตามคำที่กำหนด</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.Product Title : กรอกชื่อสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.Description : กรอกรายละเอียดสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.Product Images : เพิ่มรูปสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.Product Tags : เลือกป้ายสินค้า เช่น สินค้าใหม่ หรือสินค้าโปรโมชั่น</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.Price : กรอกราคาสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.Compare Price : กรอกราคาสินค้าก่อนลดราคา</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">8.animal Type : เลือกประเภทสัตว์ที่ใช้สินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">9.Product Type : เลือกประเภทสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">10.Save Product : เมื่อกรอกข้อมูลครบถ้วนแล้วให้กดที่ปุ่มSave Product</h5>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- order -->
<div class="modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">รายการสั่งซื้อ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/order/1.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.photo : ภาพสินค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.Product Name : ชื่อสินค้าที่ต้องจัดส่ง</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.Customer : ชื่อลูกค้า</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.Address : ที่อยู่จัดส่ง</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.Quantity : จำนวนที่ต้องจัดส่ง</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">6.Total : ราคา</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">7.Status : สถานะการจัดส่ง หากจัดส่งสินค้าแล้วให้กดที่ปุ่มจัดส่งสินค้าและกรอกหมายเลขพัสดุเพื่อให้ลูกค้าติดตามพัสดุได้</h5>

                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection