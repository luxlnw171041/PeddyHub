@extends('layouts.peddyhub')

@section('content')
<style>
        .btn-outline-peddyhub {
            position: relative;
            line-height: 29px;
            color: #cd628c;
            font-size: 16px;
            font-weight: 700;
            border: #B81F5B;
            background: none;
            font-size:18px;
        }

        .btn-outline-peddyhub:hover {
            background: #B81F5B;
            color: #ffffff;
        }
        .text-b {
            font-family: 'Mitr', sans-serif;
            font-size:18px;
        }
        .icon-menu{
            font-size:40px;
        }
        .nav-pills >  a.active {
            background-color: #B81F5B ;
            color: #ffffff;
        }
        p.text-ins{
            font-family: 'Sarabun', sans-serif;
            font-size:15px;
            line-height: 1.5;
            font-weight: bold;
        }
        </style>
    <div class="card text-center " style="border:none;">
        <div class="container nav nav-pills d-flex justify-content-around"style="padding:10px;">
            <a data-toggle="pill" class="btn btn-outline-peddyhub col-md-3 col-6 active" href="#menu4">
                <i class="fa-solid fa-paw-simple" style="font-size:46px;"></i><br>
               ประกันสัตว์เลี้ยง
            </a>
            <a data-toggle="pill" class="btn btn-outline-peddyhub col-md-3 col-6 " href="#menu1">
                <img src="{{ asset('peddyhub/images/logo_insurance/tip.png') }}"width="50px" alt="Image">
                <br>
                ทิพยประกันภัย
            </a>
            <a data-toggle="pill" class="btn btn-outline-peddyhub col-md-3 col-6" href="#menu2">
                <img src="{{ asset('peddyhub/images/logo_insurance/falcon.png') }}"width="70px" alt="Image">
                <br>
                ฟอลคอนประกันภัย</a>
            <a data-toggle="pill" class="btn btn-outline-peddyhub col-md-3 col-6" href="#menu3">
                <img src="{{ asset('peddyhub/images/logo_insurance/mt.png') }}"width="50px" alt="Image">
                    <br>
                เมืองไทยประกันภัย</a>
            
            
        </div>
    </div>

  
    <div class="tab-content container" style="margin-top:50px;">
        <div id="menu1" class="tab-pane fade ">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5>ประกันภัยสัตว์เลี้ยง TIP PET LOVER </h5>
                                <div style="text-indent:20px;font-size:17px;">
                                    <p class="text-ins">1.ค่ารักษาพยาบาลอุบัติเหตุหรือเจ็บป่วย</p>
                                    <p class="text-ins">2.ไม่ต้องตรวจสุขภาพ</p>
                                    <p class="text-ins">3.ไม่ต้องฝังไมโครชิพ</p>
                                    <p class="text-ins">4.ต่ออายุได้สูงสุดถึง 9 ปี</p>
                                    <p class="text-ins">5.ชดใช้เงินแก่ชีวิตและทรัพย์สินบุคคลภายนอก</p>
                                    <p class="text-ins">6.เบี้ยเริ่มต้นเพียง 500 บาทต่อปี</p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                        <h5>สิทธิประโยชน์เพิ่มเติม</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1.ค่าวัคซีนป้องกันโรคในสัตว์เลี้ยง</p>
                                <p class="text-ins">2.ค่าใช้จ่ายการประกาศเพื่อติดตามสัตว์เลี้ยงสูญหาย</p>
                                <p class="text-ins">3.ค่ารับฝากเลี้ยง กรณีเจ้าของไปต่างประเทศ</p>
                                <p class="text-ins">4.คุ้มครองเพิ่มกรณีเสียชีวิตจากอุบัติเหตุ</p>
                                <p class="text-ins">5.คุ้มครองเพิ่มกรณีเสียชีวิตจากการเจ็บป่วย</p>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">เงื่อนไขในการรับประกัน</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. สัตว์เลี้ยงที่มีอายุตั้งแต่ อายุ 3 เดือน – 7 ปี</p>
                                <p class="text-ins">2. สัตว์เลี้ยงต้องมีสุขภาพสมบูรณ์ ไม่มีอาการบาดเจ็บ พิการ เจ็บป่วย และต้องไม่เคยมีการผ่าตัดจากการเจ็บป่วย มาก่อน</p>
                                <p class="text-ins">3. สัตว์เลี้ยงต้องอยู่ภายในประเทศไทยเท่านั้น</p>
                                <p class="text-ins">4. กรมธรรม์ประกันภัยสูงสุด 1 ฉบับ ต่อ สัตว์เลี้ยง 1 ตัว</p>
                                <p class="text-ins">5. กรมธรรม์ไม่คุ้มครองการเจ็บป่วยภายในระยะเวลา 60 วัน (Waiting Period) และเสียชีวิตภายในระยะเวลา 90 วัน หลังจากกรมธรรม์มีผลบังคับเป็นครั้งแรก * ในกรณีขาดต่ออายุให้เริ่มนับ Waiting Period ใหม่</p>
                                <p class="text-ins">6. กรมธรรม์ไม่คุ้มครองการรักษาพยาบาลจาก</p>
                                <p class="text-ins" style="text-indent:45px;">6.1 โรคที่เป็นมาก่อน หรือโรคทางพันธุกรรม หรือโรคระบาดของสัตว์เลี้ยงชนิดนั้น</p>
                                <p class="text-ins" style="text-indent:45px;">6.2 พยาธิ เห็บ หมัด ไร เล็น โรคเรื้อนหรือโรคผิวหนังทุกชนิด</p>
                                <p class="text-ins" style="text-indent:45px;">6.3 การถูกวางยาพิษ, ยาโด๊ป หรือการกลั่นแกล้ง</p>
                                <p class="text-ins" style="text-indent:45px;">6.4 การผ่าตัด หรือฉีดวัคซีนปลูกฝี เพื่อป้องกันการเจ็บป่วยจากโรค</p>
                                <p class="text-ins" style="text-indent:45px;">6.5 การขนส่ง หรือภาวะโรคขาดอาหาร หรือการผสมอาหารไม่เป็นไปตามสัดส่วนที่เหมาะสม หรือที่อยู่อาศัย ไม่ถูกสุขลักษณะ</p>
                                <p class="text-ins">7. กรมธรรม์ไม่คุ้มครองการตรวจสุขภาพทั่วไป การรักษาหรือการผ่าตัดซึ่งไม่เกี่ยวกับการบาดเจ็บ</p>
                                <p class="text-ins">8. การถูกฆ่าโดยเจตนา การเจตนาทำร้ายการรักษาหรือการผ่าตัดซึ่งไม่เกี่ยวกับการบาดเจ็บ</p>
                                <p class="text-ins">9. กรมธรรม์ไม่คุ้มครองนอกอาณาเขตประเทศไทย</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        
        <div id="menu2" class="tab-pane fade">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5>ประกันสุขภาพและอุบัติเหตุสำหรับสุนัขและแมว </h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. คุ้มครองอุบัติเหตุและเจ็บป่วย</p>
                                <p class="text-ins">2. ครอบคลุมค่ารักษา เห็บ หมัด และโรคผิวหนัง</p>
                                <p class="text-ins">3. คุ้มครองชีวิตและทรัพย์สินบุคคลภายนอก</p>
                                <p class="text-ins">4. ค่าลงสื่อโฆษณาเมื่อสัตว์เลี้ยงหาย</p>
                                <p class="text-ins">5. ค่าจัดการงานศพ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5>เงื่อนไขการรับประกันภัย</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. การถูกฆ่าโดยเจตนา การถูกวางยาพิษ</p>
                                <p class="text-ins">2. การเสียชีวิตหรือรักษาพยาบาลจากการเจ็บป่วยในช่วง 60 วันแรกนับจากวันที่กรมธรรม์ประกันภัยมีผลบังคับเป็นครั้งแรก (ระยะเวลารอคอย 60 วัน)</p>
                                <p class="text-ins">3. การเสียชีวิต การบาดเจ็บหรือเจ็บป่วยที่เป็นมาก่อนการเอาประกันภัย (Pre-existing condition) ภาวะที่เป็นมาแต่เกิด โรคกรรมพันธ์ โรคระบาดของสัตว์เลี้ยง</p>
                                <p class="text-ins">4. การเสียชีวิต บาดเจ็บหรือเจ็บป่วยที่สืบเนื่องมาจากการขนส่ง ภาวะโรคขาดสารอาหาร การขาดอากาศหายใจเนื่องจากคลื่นความร้อน</p>
                                <p class="text-ins">5. การเสียชีวิต การบาดเจ็บที่อยู่นอกอาณาเขตประเทศไทย</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">ความคุ้มครอง</h5>
                            <div style="font-size:17px;">
                                <img src="{{ asset('peddyhub/images/logo_insurance/ความคุ้มครอง/falcon.png') }}"width="100%" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">ข้อยกเว้นสำคัญ</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. การถูกฆ่าโดยเจตนา การถูกวางยาพิษ</p>
                                <p class="text-ins">2. การเสียชีวิตหรือรักษาพยาบาลจากการเจ็บป่วยในช่วง 60 วันแรกนับจากวันที่กรมธรรม์ประกันภัยมีผลบังคับเป็นครั้งแรก (ระยะเวลารอคอย 60 วัน)</p>
                                <p class="text-ins">3. การเสียชีวิต การบาดเจ็บหรือเจ็บป่วยที่เป็นมาก่อนการเอาประกันภัย (Pre-existing condition) ภาวะที่เป็นมาแต่เกิด โรคกรรมพันธ์ โรคระบาดของสัตว์เลี้ยง</p>
                                <p class="text-ins">4. การเสียชีวิต บาดเจ็บหรือเจ็บป่วยที่สืบเนื่องมาจากการขนส่ง ภาวะโรคขาดสารอาหาร การขาดอากาศหายใจเนื่องจากคลื่นความร้อน</p>
                                <p class="text-ins">5. การเสียชีวิต การบาดเจ็บที่อยู่นอกอาณาเขตประเทศไทย</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">หมายเหตุ</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. รับประกันภัยโดย บริษัท ฟอลคอนประกันภัย จำกัด (มหาชน) บริษัทประกันภัยขอสงวนสิทธิ์ในการพิจารณารับประกันภัย</p>
                                <p class="text-ins">2. สามารถซื้อกรมธรรม์สูงสุด 1 ฉบับ/สัตว์เลี้ยง 1 ตัว และผู้ซื้อควรทำความเข้าใจในรายละเอียดความคุ้มครองและเงื่อนไขก่อนการตัดสินใจทำประกันภัยทุกครั้ง</p>
                                <p class="text-ins">3. เอกสารนี้ไม่ใช่สัญญาประกันภัย ความคุ้มครองและผลประโยชน์ที่ผู้เอาประกันภัยจะได้รับขึ้นอยู่กับคำจำกัดความ เงื่อนไข และข้อยกเว้นที่ระบุไว้ภายใต้กรมธรรม์ประกันภัยและแผนความคุ้มครองที่ได้ซื้อไว้</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
        <div id="menu3" class="tab-pane fade">
            <div class="row">
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">เงื่อนไขในการรับประกันภัย </h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. สัตว์เลี้ยงต้องมีอายุระหว่าง 3 เดือน ถึง 7 ปี</p>
                                <p class="text-ins">2. สัตว์เลี้ยงต้องมีสุขภาพสมบูรณ์ ไม่มีอาการบาดเจ็บ พิการหรือเจ็บป่วย (ดูจากใบรับรองตรวจสุขภาพสัตว์เลี้ยง)</p>
                                <p class="text-ins">3. สัตว์เลี้ยงต้องอยู่ในอาณาเขตประเทศไทยเท่านั้น</p>
                                <p class="text-ins">4. สัตว์เลี้ยงต้องได้รับการฉีดวัคซีนครบตามประเภทโรคและกำหนดเวลาตามมาตรฐาน</p>
                                <p class="text-ins">5. จำนวนกรมธรรม์สูงสุด 1 ฉบับ/ สัตว์เลี้ยง 1 ตัว</p>
                                <p class="text-ins">6. ต้องมีไมโครชิพ (กรณีทำประกันแบบฝังไมโครชิพ)</p>
                                <p class="text-ins">7. ค่าฝังไมโครชิพให้ความคุ้มครองเฉพาะเมื่อกรมธรรม์มีผลบังคับเป็นครั้งแรก</p>
                                <p class="text-ins">8. กรณีทำประกันแบบฝั่งไมโครชิพ สัตว์เลี้ยงจะต้องได้รับการฝั่งไมโครชิพมาแล้วไม่เกินกว่า 30 วัน</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                        <h5 class="text-center">ข้อยกเว้นสำคัญ</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. กรมธรรม์ไม่คุ้มครองการเจ็บป่วยภายในระยะเวลา 60 วัน (Waiting Period)ในกรณีขาดต่ออายุให้เริ่มนับ Waiting Period ใหม่</p>
                                <p class="text-ins">2. ไม่คุ้มครองการเสียชีวิต การบาดเจ็บ หรือการเจ็บป่วยที่เป็นสภาพที่เป็นมาก่อนการเอาประกันภัย การตรวจรักษาภาวะที่เป็นมาแต่เกิด หรือโรคทางพันธุกรรม</p>
                                <p class="text-ins">3. ไม่คุ้มครองการเสียชีวิต ที่มีสาเหตุมาจากพยาธิ เห็บ หมัด ไร เล็น โรคเรื้อน หรือโรคผิวหนังทุกชนิด</p>
                                <p class="text-ins">4. ไม่คุ้มครองการเสียชีวิตหรือการเจ็บป่วยที่มีสาเหตุมาจาก</p>
                                <p class="text-ins" style="text-indent:45px;">4.1 การถูกฆ่าโดยเจตนา ถูกวางยาพิษ ยาโด๊ป หรือถูกกลั่นแกล้ง</p>
                                <p class="text-ins" style="text-indent:45px;">4.2 โรคระบาดของสัตว์เลี้ยง</p>
                                <p class="text-ins" style="text-indent:45px;">4.3 ภาวะโรคขาดอาหาร การอยู่รวมกันที่แออัด การขาดอากาศหายใจเนื่องจากคลื่นความร้อน</p>
                                <p class="text-ins" style="text-indent:45px;">4.4 การผ่าตัด หรือฉีดวัคซีนปลูกฝี เพื่อป้องกันการเจ็บป่วยจากโรค</p>
                                <p class="text-ins" style="text-indent:45px;">4.5 ขณะการขนส่ง</p>
                                <p class="text-ins">5. ไม่คุ้มครองนอกอาณาเขตประเทศไทย</p>
                                <p class="text-ins">6. ไม่คุ้มครองการตรวจสุขภาพทั่วไป การรักษาหรือการผ่าตัดซึ่งไม่เกี่ยวกับการบาดเจ็บ</p>
                                <p class="text-ins" style="color:red">**รายละเอียดและข้อยกเว้นความคุ้มครองเป็นไปตามที่ระบุไว้ในกรมธรรม์ประกันภัย</p>
                                
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">เงื่อนไขในการรับประกัน</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. สัตว์เลี้ยงที่มีอายุตั้งแต่ อายุ 3 เดือน – 7 ปี</p>
                                <p class="text-ins">2. สัตว์เลี้ยงต้องมีสุขภาพสมบูรณ์ ไม่มีอาการบาดเจ็บ พิการ เจ็บป่วย และต้องไม่เคยมีการผ่าตัดจากการเจ็บป่วย มาก่อน</p>
                                <p class="text-ins">3. สัตว์เลี้ยงต้องอยู่ภายในประเทศไทยเท่านั้น</p>
                                <p class="text-ins">4. กรมธรรม์ประกันภัยสูงสุด 1 ฉบับ ต่อ สัตว์เลี้ยง 1 ตัว</p>
                                <p class="text-ins">5. กรมธรรม์ไม่คุ้มครองการเจ็บป่วยภายในระยะเวลา 60 วัน (Waiting Period) และเสียชีวิตภายในระยะเวลา 90 วัน หลังจากกรมธรรม์มีผลบังคับเป็นครั้งแรก * ในกรณีขาดต่ออายุให้เริ่มนับ Waiting Period ใหม่</p>
                                <p class="text-ins">6. กรมธรรม์ไม่คุ้มครองการรักษาพยาบาลจาก</p>
                                <p class="text-ins" style="text-indent:45px;">6.1 โรคที่เป็นมาก่อน หรือโรคทางพันธุกรรม หรือโรคระบาดของสัตว์เลี้ยงชนิดนั้น</p>
                                <p class="text-ins" style="text-indent:45px;">6.2 พยาธิ เห็บ หมัด ไร เล็น โรคเรื้อนหรือโรคผิวหนังทุกชนิด</p>
                                <p class="text-ins" style="text-indent:45px;">6.3 การถูกวางยาพิษ, ยาโด๊ป หรือการกลั่นแกล้ง</p>
                                <p class="text-ins" style="text-indent:45px;">6.4 การผ่าตัด หรือฉีดวัคซีนปลูกฝี เพื่อป้องกันการเจ็บป่วยจากโรค</p>
                                <p class="text-ins" style="text-indent:45px;">6.5 การขนส่ง หรือภาวะโรคขาดอาหาร หรือการผสมอาหารไม่เป็นไปตามสัดส่วนที่เหมาะสม หรือที่อยู่อาศัย ไม่ถูกสุขลักษณะ</p>
                                <p class="text-ins">7. กรมธรรม์ไม่คุ้มครองการตรวจสุขภาพทั่วไป การรักษาหรือการผ่าตัดซึ่งไม่เกี่ยวกับการบาดเจ็บ</p>
                                <p class="text-ins">8. การถูกฆ่าโดยเจตนา การเจตนาทำร้ายการรักษาหรือการผ่าตัดซึ่งไม่เกี่ยวกับการบาดเจ็บ</p>
                                <p class="text-ins">9. กรมธรรม์ไม่คุ้มครองนอกอาณาเขตประเทศไทย</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">เอกสารที่ใช้ในการขอทำประกัน ต้องครบทุกข้อดังนี้</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">1. ใบคำขอเอาประกันภัย ที่กรอกรายละเอียดครบถ้วนสมบูรณ์</p>
                                <p class="text-ins">2. ใบรับรองการตรวจสุขภาพของสัตว์เลี้ยง</p>
                                <p class="text-ins">3. สำเนาใบรับรองการฉีดวัคซีน  </p>
                                <p class="text-ins">4. หลักฐานในการฝังไมโครชิพ (สำหรับสัตว์เลี้ยงที่ได้รับการฝังไมโครชิพมาแล้ว) สำหรับแบบที่ 1 รับประกันภัยแบบมีไมโครชิพ</p>
                                <p class="text-ins" style="text-indent:45px;">4.1. สำเนาบัตรประจำตัวประชาชนของเจ้าของสัตว์เลี้ยง</p>
                                <p class="text-ins" style="text-indent:45px;">4.2. รูปถ่ายของสัตว์เลี้ยง รวมถึงรูปถ่ายที่แสดงจุดเด่น (ตำหนิ) ของสัตว์เลี้ยงนั้น ไม่เกิน 2 สัปดาห์ ครบทุกรูปดังนี้</p>
                                <p class="text-ins" style="text-indent:65px;">- หน้าตรง</p>
                                <p class="text-ins" style="text-indent:65px;">- เต็มตัวด้านหน้า</p>
                                <p class="text-ins" style="text-indent:65px;">- ด้านข้าง (ซ้ายและขวา)</p>
                                <p class="text-ins" style="text-indent:65px;">- ท้อง</p>
                                <p class="text-ins" style="text-indent:65px;">- ตำหนิ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">ความคุ้มครองสำหรับสัตว์เลี้ยงไม่ได้ฝังไมโครชิพ</h5>
                            <div style="font-size:17px;">
                                <img src="{{ asset('peddyhub/images/logo_insurance/ความคุ้มครอง/mt1.png') }}"width="100%" alt="Image">                           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">ความคุ้มครองสำหรับสัตว์เลี้ยงที่ฝังไมโครชิพ</h5>
                            <div style="font-size:17px;">
                                <img src="{{ asset('peddyhub/images/logo_insurance/ความคุ้มครอง/mt2.png') }}"width="100%" alt="Image">                           
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div id="menu4" class="tab-pane fade active show">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">ประกันสัตว์เลี้ยงคืออะไร</h5>
                                <div style="text-indent:20px;font-size:17px;">
                                    <p class="text-ins">"ประกันสัตว์เลี้ยง" เป็นประกันภัยที่เจ้าของสัตว์เลี้ยงทำไว้เพื่อให้ความคุ้มครองค่ารักษาพยาบาลแก่สัตว์เลี้ยงของผู้เอาประกัน ทั้งกรณีเกิดอุบัติเหตุได้รับบาดเจ็บ หรือค่ารักษาสุขภาพกรณีเจ็บไข้ได้ป่วย รวมถึงกรณีสัตว์เลี้ยงเสียชีวิตด้วย</p>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                        <h5 class="text-center">ประกันสัตว์เลี้ยงคุ้มครองอะไรบ้าง?</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">ในปัจจุบัน "ประกันสัตว์เลี้ยง" ส่วนใหญ่จะมีความคุ้มครองหลักๆ ดังนี้</p>
                                <p class="text-ins">1. ชดเชยกรณสัตว์เลี้ยงเสียชีวิต</p>
                                <p class="text-ins">2. ค่ารักษาจากอุบัติเหตุ</p>
                                <p class="text-ins">3. ค่ารักษาจากการเจ็บป่วย</p>
                                <p class="text-ins">4. ค่าคุ้มครองบุคคลภายนอก</p>
                                <p class="text-ins">5. ค่าพิธีศพ(เผา หรือฝัง)</p>
                                <p class="text-ins">6. ค่าฝากเลี้ยง</p>
                                <p class="text-ins">7. ค่าวัคซีน</p>
                                <p class="text-ins">8. ค่าประกาศตามหา (กรณีสัตว์เลี้ยงหาย)</p>
                                
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="card main-shadow main-radius">
                        <div class="card-body">
                            <h5 class="text-center">เงื่อนไขในการรับประกัน</h5>
                            <div style="text-indent:20px;font-size:17px;">
                                <p class="text-ins">สิ่งแรกที่ทางบริษัทประกันทั้งหลายจะต้องดูและพิจารณาก่อนการรับทำประกันนั่นก็คือ สัตว์เลี้ยงจะต้องมีสุขภาพแข็งแรงสมบูรณ์ ไม่เจ็บป่วย ไม่พิการ และจะต้องอาศัยอยู่ในประเทศไทย โดยจะสามารถทำ "ประกันสัตว์เลี้ยง" ได้ 1 ตัวต่อ 1 ฉบับ พร้อมกับมีเอกสารครบในการฉีดวัคซีนตามกำหนดค่ะ แต่ที่ต้องจำไว้เลยนั่นก็คือ บริษัทประกันส่วนใหญ่จะไม่จ่ายในกรณีที่สัตว์เลี้ยงถูกฆ่าโดยเจตนา ถูกวางยา หรือถูกแกล้ง และรวมไปถึงกรณีการเสียชีวิตหรือเจ็บป่วยจากการเลี้ยงที่ไม่ถูกสุขลักษณะ หรือการขนส่ง เช่น ภาวะความร้อน ภาวะขาดอาหาร และบริษัทประกันจะไม่คุ้มครองโรคที่สัตว์เลี้ยงเป็นมาก่อนเอาประกันภัย โรคระบาดในสัตว์เลี้ยง หรือโรคทางกรรมพันธุ์ และที่สำคัญความคุ้มครองจะไม่ครอบคลุมการเสียชีวิตหรือเจ็บป่วยในช่วงระยะเวลารอคอย 60 วันก่อนที่ประกันจะมีผล</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
@endsection