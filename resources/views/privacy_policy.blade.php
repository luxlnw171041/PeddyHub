@extends('layouts.peddyhub')

@section('content')
        <section class="about_us">
            <div class="container">
                <div class="heading text-center">
                    <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                            class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                class="fas fa-paw"></i> </span></p>
                    <h4 class="wow fadeInDown">นโยบายเกี่ยวกับข้อมูลส่วนบุคคล <span class="wow pulse" data-wow-delay="1s">เว็บไซต์  PeddyHub.com</span>
                    </h4>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="text">
                            <ul> <br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 1.การยอมรับนโยบายเกี่ยวกับข้อมูลส่วนบุคคล </b></li>
                                    <li style="font-size: 16px; text-indent:30px;">บริษัท 2บี กรีน จำกัด (“บริษัท”) ให้บริการเว็บไซต์ <span style="color:#B81F5B;"> <b>Peddyhub.com</b> </span>  (“บริการ”) แก่สมาชิก (“ท่าน”) เพื่อให้เป็นไปตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 บริษัทได้มีการปรับปรุงข้อตกลง และเงื่อนไขการให้บริการ โดยเพิ่มเติมสิทธิหน้าที่ของบริษัท และผู้ใช้บริการ ให้เป็นประโยชน์ของผู้ใช้บริการ และ มีความมั่นใจ ปลอดภัย จากการได้รับสิทธิ์คุ้มครองตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 สำหรับ “การเก็บรวบรวม การใช้ และ การเปิดเผย” ข้อมูลส่วนบุคคลของผู้ใช้บริการให้เป็นไปตามกฎหมาย ทั้งนี้ ขอให้ผู้ใช้บริการมั่นใจว่าบริษัท ได้ให้ความสำคัญอย่างมากในการปฏิบัติตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 และเพื่อช่วยให้ผู้ใช้งานได้ทราบถึงแนวทางปฏิบัติเกี่ยวกับนโยบายความเป็นส่วนตัว และทราบถึงทางเลือกเกี่ยวกับความเป็นส่วนตัวเมื่อเข้าใช้เว็บไซต์</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 2.วัตถุประสงค์ของการจัดเก็บข้อมูลส่วนบุคคลของบริษัท </b></li>
                                    <li style="font-size: 16px; text-indent:30px;">บริษัทเก็บข้อมูลส่วนบุคคลของท่าน เพื่อยืนยันตัวตนของสมาชิก, การแจ้งเตือนด้านต่างๆ, โปรโมชั่นประจำเดือน, การลงประกาศขาย และการสืบค้นหาข้อมูลของสัตว์เลี้ยง จากนั้นจึงนำข้อมูลที่ได้มาวิเคราะห์และพัฒนาการให้บริการให้ดีขึ้น สอดคล้องกับความต้องการของผู้ใช้งานมากขึ้น โดยการเก็บรักษาข้อมูลส่วนบุคคลตามวัตถุประสงค์ของกฎหมาย และวัตถุประสงค์ในการดำเนินธุรกิจ</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 3.บริษัทมีการคุ้มครองข้อมูลส่วนบุคคลอย่างไร</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">บริษัทมีมาตรการคุ้มครองความปลอดภัยของข้อมูลส่วนบุคคลของผู้ใช้บริการจากการเข้าถึงข้อมูลโดยไม่ได้รับอนุญาต การสูญหาย การใช้ข้อมูลในทางที่ผิดไปจากวัตถุประสงค์ในการจัดเก็บ การเปิดเผยและการเปลี่ยนแปลงแก้ไข เช่น FireWall, การควบคุมและการอนุญาตให้เข้าถึงข้อมูล แต่ไม่รวมถึงข้อมูลที่บริษัทได้รับอนุญาตจากผู้ใช้บริการให้เปิดเผยแก่บุคคลภายนอก</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 4.ข้อมูลส่วนบุคคลที่บริษัทจัดเก็บ</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">4.1 ข้อมูลเกี่ยวกับการใช้บริการทั่วไป เช่น CooKies, ข้อมูลจราจรทางคอมพิวเตอร์ ซึ่งจัดเก็บเพื่อวิเคราะห์พฤติกรรมการใช้งาน เพื่อตอบสนองความต้องการเฉพาะบุคคลของผู้เข้าเยี่ยมชมหรือบริการเว็บไซต์ และอำนวยความสะดวกแก่ผู้ใช้งานเฉพาะบุคคลในการแสดงผล ซึ่งผู้ใช้งานอาจมีความสนใจเป็นพิเศษ</li><br>
                                    <li style="font-size: 16px; text-indent:30px;">4.2 ข้อมูลที่ผู้เข้าใช้บริการได้ลงทะเบียนสมัครสมาชิก เช่น ชื่อ, นามสกุล, หมายเลขโทรศัพท์, ไปรษณีย์อิเล็กทรอนิกส์,ข้อมูลทะเบียนยานพาหนะ, วันที่สมัครเข้าเป็นสมาชิก หรือเปลี่ยนแปลงแก้ไขข้อมูลสมาชิก รวมไปถึงรายละเอียดอื่นๆตามความจำเป็น โดยจัดเก็บเพื่อวัตถุประสงค์ในการยืนยันตัวบุคคลและป้องกันการปลอมแปลงตัวตน</li><br>
                                    <li style="font-size: 16px; text-indent:30px;">4.3 ข้อมูลที่ผู้เข้าใช้บริการ เลื่อนหรือลงประกาศขายสัตว์เลี้ยง หรือส่งข้อมูลข่าวสาร เช่น ชื่อ, นามสกุล, หมายเลขโทรศัพท์, ชนิดของสัตว์เลี้ยง, สายพันธ์, จังหวัดที่อาศัย รวมไปถึงรายละเอียดอื่นๆตามความจำเป็น และเปลี่ยนแปลงแก้ไขข้อมูลเจ้าของและสัตว์เลี้ยง โดยจัดเก็บเพื่อวัตถุประสงค์ในการแสดงข้อมูลเลื่อนหรือลงประกาศขายสัตว์เลี้ยง หรือส่งข้อมูลข่าวสาร จัดเก็บเพื่อวัตถุประสงค์ในการแสดงตัวตนของเจ้าสัตว์เลี้ยง</li><br>
                                    <li style="font-size: 16px; text-indent:30px;">4.4 ข้อมูลเกี่ยวกับการเข้าใช้บริการอื่น ๆ เช่นข้อมูลข้อมูลจราจรทางคอมพิวเตอร์ ฯลฯ จะจัดเก็บตามข้อบังคับประกาศกระทรวงเทคโนโลยีสารสนเทศ และการสื่อสาร</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b>5.ระยะเวลาในการเก็บรวมรวบข้อมูลส่วนบุคคล </b></li>
                                    <li style="font-size: 16px; text-indent:30px;">บริษัททำการจัดเก็บข้อมูลส่วนบุคคลตามหลักเกณฑ์ของพระราชบัญญัติว่าด้วยการกระทำความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ. 2550 โดยสำหรับข้อมูลเกี่ยวกับผู้เข้าใช้บริการซึ่งได้ลงทะเบียนสมัครสมาชิกจะถูกจัดเก็บไว้ตลอดระยะเวลาการเข้าใช้บริการ และสมาชิกที่ไม่มีการเข้าใช้บริการเกิน 1 ปี บริษัทจะระงับการเป็นสมาชิกโดยไม่ต้องแจ้งให้ทราบ แล้วทำการจัดเก็บข้อมูลไว้เป็นระยะเวลา 2 ปี ตามหลักเกณฑ์ของพระราชบัญญัติว่าด้วยการกระทำความผิดเกี่ยวกับคอมพิวเตอร์ (ฉบับที่ 2) พ.ศ. 2560</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 6.การถอนความยินยอมในการจัดเก็บข้อมูลส่วนบุคคล</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">เจ้าของข้อมูลส่วนบุคคลอาจถอนความยินยอมในการจัดเก็บข้อมูลส่วนบุคคลของตนเมื่อใดก็ได้ โดยการถอนความยินยอมในการจัดเก็บข้อมูลส่วนบุคคลจะมีผลเป็นการ "ระงับ (Deactivate)" สถานะสมาชิกซึ่งอาจทำให้ผู้เข้าใช้บริการไม่ได้รับประโยชน์ในการเข้าใช้บริการบางอย่าง ดังนี้</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">6.1ผู้เข้าใช้บริการจะไม่สามารถเข้าถึงหน้า "ข้อมูลสมาชิก (Profile)" ของตนเองได้</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">6.2ข้อมูลรถที่ลงประกาศขายจะถูกยกเลิก และนำออกจากระบบ</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">6.3ข้อมูลจราจรทางคอมพิวเตอร์ ซึ่งบริษัทจะต้องจัดเก็บตามกฎหมาย ยังคงต้องจัดเก็บอยู่ต่อไปตามข้อกำหนดของกฎหมาย</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">6.4ผู้เข้าใช้บริการสามารถ "ขอเปิดใช้ (Reactivate)" สถานะสมาชิกได้ ซึ่งจะทำให้สามารถเข้าถึงหน้า "ข้อมูลสมาชิก (Profile)" และ ใช้บริการได้ตามปกติ</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 7.การแลกเปลี่ยนข้อมูล</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">บริษัทไม่มีนโยบายเปิดเผยข้อมูลส่วนบุคคลของผู้เข้าใช้บริการในลักษณะเจาะจงเป็นรายบุคคลแก่บุคคลภายนอก เว้นแต่จะต้องปฏิบัติตามข้อกำหนดของกฎหมาย อย่างไรก็ตาม บริษัทมีความจำเป็นต้องเปิดเผยข้อมูลส่วนบุคคล เฉพาะแต่ในกรณีดังต่อไปนี้</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">7.1 กับบริษัทในเครือและพันธมิตรทางธุรกิจ เพื่อดำเนินไปตามธุรกิจของบริษัท ความสะดวกแก่ผู้ใช้บริการในการใช้บริการเว็บไซต์ หรือแอพพลิเคชั่นที่เกี่ยวข้องไปได้ในทันที</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 8.สิทธิของเจ้าของข้อมูลส่วนบุคคล</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">8.1ผู้เข้าใช้บริการทั่วไปมีสิทธิขอรับสำเนาข้อมูลส่วนบุคคลที่เกี่ยวกับตน (CooKies) ได้โดยต้องนําอุปกรณ์ที่ใช้ในการเข้าถึงเว็บไซต์ Peddyhub.com เช่น Notebook, PC, Tablet หรือ โทรศัพท์มือถือ มาที่บริษัทเพื่อขอรับสำเนาข้อมูลส่วนบุคคล</li><br>
                                    <li style="font-size: 16px; text-indent:30px;">8.2 ผู้เข้าใช้บริการที่ได้ลงทะเบียนสมัครสมาชิกมีสิทธิขอรับสำเนาข้อมูลส่วนบุคคลที่เกี่ยวกับตนได้ โดยนำสำเนาบัตรประชาชนและเอกสารยืนยันหมายเลขโทรศัพท์ที่ลงทะเบียนสมาชิก เป็นหลักฐานมาแสดง เพื่อยืนยันตัวตนสมาชิก</li><br>
                                <li><i class="orange fas fa-paw pr-2"></i> <b> 9.ติอต่อบริษัทเกี่ยวกับข้อมูลส่วนบุคคล</b></li>
                                    <li style="font-size: 16px; text-indent:30px;">เจ้าของข้อมูลส่วนบุคคลสามารถติดต่อในเรื่องข้อมูลส่วนบุคคลของตนเองได้ที่</li><br>
                                        <li style="font-size: 16px; text-indent:30px;">1.อีเมล:<a href="mailto:contact.peddyhub@gmail.com"> contact.peddyhub@gmail.com</a></li><br>
                                        <li style="font-size: 16px; text-indent:30px;">2.โทร:<a href="tel:0955565411">095-556-5411 </a></li><br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection