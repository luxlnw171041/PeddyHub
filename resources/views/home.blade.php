@extends('layouts.peddyhub')

@section('content')
            <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="text">
                                <div class="heading">
                                    <h1>
                                        ยินดีต้อนรับสู่ <span class="wow pulse" data-wow-delay="1s">
                                            PeddyHub</span>
                                    </h1>
                                </div>
                                <p class="wow fadeInDown">
                                PeddyHub 
                                ศูนย์รวมบริการ ข้อมูล และ community สำหรับคนรักสัตว์ 
                                peddy hub ครบจบในที่เดียว !!!</p>
                                <div class="button wow fadeInUp">
                                    <a href="{{'pet/create'}}" class="btn main" title="contact">
                                        Register <i class="fas fa-paw"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-5 col-md-12 col-sm-12 method" style="margin-top:-20px;">
                            <div class="image">
                                <div class="an_image an_image_hz_ps_right_end an_image_vt_ps_top an_image_anime_delay_300 an_image_anime_duration_1500 an_image_anime_style_ease_out_sine"
                                    data-speed="1.2">
                                    <div class="an_image_image" data-speed="1.2">
                                        <div class="pt_image"><span><img src="peddyhub/images/home_5/icon1.png" title="Pet"
                                                    alt="Image of Pet"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="descript">
            <div class="context">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown">ประเภทอาหารสุนัขใดเหมาะสมที่สุดกับ<span class="wow pulse" data-wow-delay="1s">
                                สุนัขของคุณ</span></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="content">
                                <div class="image text-center wow fadeInLeft">
                                    <img src="peddyhub/images/home_5/bowl1.png" alt="image of product" title="product"
                                        class="img-fluid rounded-circle">
                                    <h4>Kibble/Dry Food</h4>
                                    <p>
                                        ลักษณะของการเป็นอาหารเม็ดที่สามารถผสมผสานหลายวัตถุดิบและสารอาหารอันมีประโยชน์อยู่ภายในชุดเดียวกันได้อย่างง่ายดาย ทำให้น้องหมาได้สารอาหารอย่างครบถ้วนที่สุดภายใต้ข้อกำจัดด้านเวลาและงบประมาณของตนเอง ตลอดจนช่วยเสริมสร้างสุขภาพฟันของน้องหมาในทางอ้อมจากการหมั่นเคี้ยว 
                                    </p>
                                </div>
                                <div class="image text-center wow fadeInRight">
                                    <img src="peddyhub/images/home_5/bowl2.png" alt="image of product" title="product"
                                        class="img-fluid rounded-circle">
                                    <h4>Semi-Moist Food</h4>
                                    <p>
                                    อาหารประเภทนี้จะมีคล้ายอาหารแห้งแต่จะมีสารเพิ่มความชื้น เข้าไปเพื่อเพิ่มความน่ากินและช่วยถนอมอาหาร นอกจากนี้ยังมีการเพิ่มสารอาหารที่ป้องกันการเติบโตของเชื้อจุลินทรีย์ เพื่อยืดอายุของอาหารอีกด้วย อาหารชนิดนี้ส่วนมากอยู่ในรูปของห่อ(Foilwrapped sachets packed) เพื่อป้องกันไม่ให้แห้งเมื่อถูกอากาศ จึงมักจะบรรจุเป็นห่อเดี่ยวๆ (Single package)และหากตั้งทิ้งไว้นานๆ จะทำให้ความน่ากินจะลดลงได้เนื่องจากการระเหยออกของน้ำและมีกลิ่นลดลง
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="dog text-center">
                                <img src="peddyhub/images/home_5/a.png" alt="image of pet" title="pet"
                                    class="at_upDown">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="context">
                                <div class="image text-center wow fadeInLeft">
                                    <img src="peddyhub/images/home_5/bowl3.png" alt="image of product" title="product"
                                        class="img-fluid rounded-circle">
                                    <h4>Canned Food</h4>
                                    <p>
                                        สำหรับน้องหมาที่มีปัญหาสุขภาพฟัน ไม่สามารถเคี้ยวอาหารเม็ดแข็ง ๆ ได้ดีมากนัก ตลอดจนอาจจะไม่ชอบรสชาติของอาหารเม็ด ตัวเลือกอาหารประเภทกึ่งเปียกจึงอาจกลายเป็นตัวเลือกที่ใช่กว่าขึ้นมาได้เช่นกัน โดยสำหรับอาหารประเภทกึ่งเปียกนี้ ส่วนใหญ่ก็จะอยู่ในรูปเม็ดเหมือนกัน แต่จะมีองค์ประกอบของน้ำมากกว่าหน่อยราว 60% เพื่อให้น้องหมาเคี้ยวง่ายขึ้น 
                                    </p>
                                </div>
                                <div class="image text-center wow fadeInRight">
                                    <img src="peddyhub/images/home_5/bowl44.png" alt="image of product" title="product"
                                        class="img-fluid rounded-circle">
                                    <h4>Home Cooked Food</h4>
                                    <p>
                                        การเลือกทำอาหารด้วยตนเองให้น้องหมานั้นส่วนใหญ่จะควบคุมโภชนาการและปริมาณที่เหมาะสมได้ยาก ผู้เลี้ยงอาจมักเลือกวัตถุดิบที่เหลือ ๆ มาผสมรวมกัน หรือเลือกเฉพาะที่น้องหมาชื่นชอบเป็นพิเศษตลอดเวลา แนะนำว่าอาจจะควรจัดให้เป็นเฉพาะในโอกาสพิเศษหรือในช่วงที่เรามีเวลาจริง ๆ เท่านั้น ส่วนมื้ออาหารหลักปกตินั้นก็ให้เลือกเป็นแบบเม็ดสำเร็จรูป หรือประเภทอื่น ๆ ที่สามารถให้โภชนาการครบถ้วนได้อย่างสม่ำเสมอกว่า
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        

        <!-- <section class="new_custom">
            <div class="container">
                <div class="heading text-center">
                    <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                            class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                class="fas fa-paw"></i> </span></p>
                    <h2 class="wow fadeInDown">See What Our <span class="wow pulse" data-wow-delay="1s"> Client
                            Say</span></h2>
                </div>
                <div class="owl-carousel">
                    <div class="item">
                        <div class="testimon">
                            <div class="image">
                                <img src="peddyhub/images/home_5/customer-1.png" alt="image of client" title="client"
                                    class="img-fluid customer">
                                <img src="peddyhub/images/home_5/cta-2-dot-1.png" alt="Image of Dot" title="Dot"
                                    class="img-fluid dots">
                            </div>
                            <div class="content">
                                <h3 class="wow fadeInDown">Jessica Johnson</h3>
                                <span class="open">❝</span>
                                <p class="wow fadeInUp">
                                    My boxer is spoiled rotten and needs a lot of human interaction which he always
                                    receives. PAWREX is the best!!
                                </p>
                                <span class="close">❞</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimon">
                            <div class="image">
                                <img src="peddyhub/images/home_5/customer-2.png" alt="image of client" title="client"
                                    class="img-fluid customer">
                                <img src="peddyhub/images/home_5/cta-2-dot-1.png" alt="Image of Dot" title="Dot"
                                    class="img-fluid dots">
                            </div>
                            <div class="content">
                                <h3>Alina Calrk</h3>
                                <span class="open">❝</span>
                                <p>
                                    Just wanted to let you know how blessed I have been to have you guys care for me
                                    over the past few years.
                                </p>
                                <span class="close">❞</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimon">
                            <div class="image">
                                <img src="peddyhub/images/home_5/customer-3.png" alt="image of client" title="client"
                                    class="img-fluid customer">
                                <img src="peddyhub/images/home_5/cta-2-dot-1.png" alt="Image of Dot" title="Dot"
                                    class="img-fluid dots">
                            </div>
                            <div class="content">
                                <h3>Alison Bella</h3>
                                <span class="open">❝</span>
                                <p>
                                    We love bring Lexi to PAWREX! The staff is always so friendly and it’s so
                                    convenient for our busy schedules!
                                </p>
                                <span class="close">❞</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="an_image an_image_hz_ps_right an_image_vt_ps_middle an_image_anime_delay_300 an_image_anime_duration_1500 an_image_anime_style_ease_out_sine"
                    data-speed="1.2">
                    <div class="an_image_image" data-speed="1.2">
                        <div class="pt_image">
                            <span>
                                <img src="peddyhub/images/home_5/frisbee.png" title="Frisbee" alt="Image of Frisbee"
                                    class="frisbee">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <section class="method">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="text">
                            <div class="counter-portion">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="box borded">
                                            <div class="icon">
                                                <span class="icon flaticon-easter-bunny"></span>
                                            </div>
                                            <div class="num">
                                                <span class="counting-value">1500</span>
                                                <span>+</span>
                                            </div>
                                            <div class="description">PET BORDED</div>
                                        </div>
                                        <div class="box happy">
                                            <div class="icon">
                                                <span class="icon flaticon-brush"></span>
                                            </div>
                                            <div class="num">
                                                <span class="counting-value">900</span>
                                                <span>+</span>
                                            </div>
                                            <div class="description">HAPPY CLIENTS</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="box project">
                                            <div class="icon">
                                                <span class="icon flaticon-money-bag"></span>
                                            </div>
                                            <div class="num">
                                                <span class="counting-value">500</span>
                                                <span>+</span>
                                            </div>
                                            <div class="description">PROJECT DONE</div>
                                        </div>
                                        <div class="box event">
                                            <div class="icon">
                                                <span class="icon flaticon-award"></span>
                                            </div>
                                            <div class="num">
                                                <span class="counting-value">300</span>
                                                <span>+</span>
                                            </div>
                                            <div class="description">EVENT DONE</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="house floated">
                            <div class="an_image an_image_hz_ps_left an_image_vt_ps_middle an_image_anime_delay_300 an_image_anime_duration_1500 an_image_anime_style_ease_out_sine"
                                data-speed="1.2">
                                <div class="an_image_image" data-speed="1.2">
                                    <div class="pt_image">
                                        <span>
                                            <img src="peddyhub/images/home_5/ball.png" title="Pet" alt="Image of Pet"
                                                class="ball">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="images">
                                    <div class="icon">
                                        <div class="svg-icon back" id="svg"
                                            data-svg-icon="peddyhub/images/home_5/svg/blob (3).svg">
                                        </div>
                                    </div>
                                    <img src="peddyhub/images/home_5/4.png" alt="Image of Animal" title="Animal"
                                        class="img-fluid" id="animal">
                                    <img src="peddyhub/images/home_5/dots.png" alt="" class="dots rotate">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<!--Gallery Section-->
        <section class="gallery-section" style="background-color: #B8205B;margin-top:20px;">
            <div class="auto-container">
                <!--Sec Title Two-->
                <div class="sec-title-two centered">
                    <div class="title-icon">
                        <img src="peddyhub/images/icons/title-icon.png" alt="" />
                </div>
                        <h3 style="color:white;">แสดงเจ้าตัวแสบของคุณให้ทุกคนได้เห็น</h3>
                        <!-- <div class="text">For professional dog and cat grooming needs</div> -->
                    </div>
                    <div class="row clearfix">
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re1.1.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re1.1.jpg" data-fancybox="images" data-caption="" class="lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re2.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re2.jpg" data-fancybox="images" data-caption="" class=" lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re3.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re3.jpg" data-fancybox="images" data-caption="" class="lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re4.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re4.jpg" data-fancybox="images" data-caption="" class="lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re5.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re5.jpg" data-fancybox="images" data-caption="" class="lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <!--Gallery Item-->
                        <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="peddyhub/images/gallery/re6.jpg" alt="">
                                    <!--Overlay Box-->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <a href="peddyhub/images/gallery/re6.jpg" data-fancybox="images" data-caption="" class="lightbox-image link"><span class="icon fa fa-search"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!--End Gallery Section-->

        

        <!-- <section class="steps">
            <div class="container">
                <div class="heading text-center">
                    <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                            class="orange"><i class="fas fa-paw"></i> </span><span class="purple">
                            <i class="fas fa-paw"></i> </span></p>
                    <h2 class="wow fadeInDown">We Love to <span class="wow pulse" data-wow-delay="1s"> Serve
                            You</span></h2>
                </div> -->
                <!-- <div class="service">
                    <div class="cards">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card orange">
                                    <div class="icon">
                                        <div class="svg-icon" id="svg-1"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_health.svg"></div>
                                    </div>
                                    <div class="content">
                                        <h5>Health Care</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur,
                                            exercitationem ipsum beatae esse nisi vitae!
                                        </p>
                                        <div class="more">
                                            <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card yellow">
                                    <div class="icon">
                                        <div class="svg-icon" id="svg-2" data-svg-icon="peddyhub/images/home_5/svg/pet_food.svg">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5>Healthy Food</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur,
                                            exercitationem ipsum beatae esse nisi vitae!
                                        </p>
                                        <div class="more">
                                            <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card purple">
                                    <div class="icon">
                                        <div class="svg-icon" id="svg-3"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_training.svg">
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h5>Daily Exersize</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur,
                                            exercitationem ipsum beatae esse nisi vitae!
                                        </p>
                                        <div class="more">
                                            <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="button text-center">
                        <a href="#" class="btn main" title="Services">
                            More Services <i class="fas fa-paw"></i>
                        </a>
                    </div>
                </div> -->
            </div>
        </section>

        <div class="about pet">
            <section class="service">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown">บริการ <span class="wow pulse" data-wow-delay="1s">
                                ของพวกเรา</span></h2>
                    </div>
                    <div class="cards">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon purple"><br>
                                        <div class="svg-icon" id="svg-9"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_location.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="purple">
                                            ตามหาเจ้าตัวแสบ
                                        </h5>
                                        <p>
                                        เมื่อเจ้าตัวแสบเดินเล่น สำรวจสิ่งต่าง ๆ รอบตัว อย่างเพลิดเพลิน จนบางครั้งอาจเกิดการพลัดหลง เพียงท่านลงทะเบียนสัตว์เลี้ยงกับ  ระบบของเรา จากนั้นระบบก็จะช่วยส่งข้อมูลให้ชุมชนคนรักสัตว์ ในบริเวณใกล้เคียงได้รับทราบและช่วยกันตามหาเจ้าตัวแสบของท่านในทันที
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon orange"><br>
                                        <div class="svg-icon" id="svg-4"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_grooming.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="orange">
                                            ตัดขนเสริมสวยแต่งหล่อ
                                        </h5>
                                        <p>
                                            หากเราอยากหล่ออยากสวยเรื่องเสริมความสวยความงามก็เป็นเรื่องที่เข้าใจได้ การจัดแต่งทรงให้สวยหล่อนั้นสำหรับสัตว์เลี้ยงของเราก็เหมือนกัน เพราะไม่ว่าจะเป็นแมวสุนัขหรือน้องสัตว์ทั้งหลายที่มีขนสั้นบ้างยาวบ้าง ก็เป็นหน้าที่ของเจ้าของที่จะต้องดูแลเพื่อความสวยงามและสุขอนามัย
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon orange"><br>
                                        <div class="svg-icon" id="svg-6"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_food.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="orange">
                                            อาหารเจ้าซุกซน 
                                        </h5>
                                        <p>
                                        อาหารที่มีคุณภาพและได้มาตรฐานจะช่วยให้ลูกๆของคุณร่างกายแข็งแรงและมีสุขภาพที่ดียิ่งขึ้น เราจึงสรรหาและมอบสิ่งดีๆเพื่อเจ้าแสนซน เราบริการส่งแบบรวดเร็วภายใน 24 ชม. และโปรโมชั่นลดราคาสุดพิเศษเตรียมไว้เพื่อคุณแล้ว
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon orange"><br>
                                        <div class="svg-icon" id="svg-8"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_care.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="orange">
                                            โรงพยาบาลสัตว์
                                        </h5>
                                        <p>
                                            เวลาที่เพื่อนคู่ชีวิตป่วยท่านคงจะอยากได้โรงพยาบาลสัตว์ที่ดี อยู่ใกล้และค่ารักษาไม่แพงจนเกินไป เพื่อทำการตรวจรักษา ซึ่งเรามีโรงพยาบาลที่มีมาตรฐานที่พร้อมสัตวแพทย์ที่มีความเชี่ยวชาญให้บริการครอบคลุมในทุกพื้นเลยค่ะ
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon purple"><br>
                                        <div class="svg-icon" id="svg-7"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_shelter.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="purple">
                                            อุปการะน้องๆ
                                        </h5>
                                        <p>
                                        ถ้าหากต้องการหาบ้านพักพิงหลังใหม่ให้น้องๆ เราก็มีบริการรองรับเพียงแค่เข้าไปประกาศในคอมมูนิตี้ของเรา หรือถ้าหากท่านต้องการหาเพื่อนคู่ชีวิต ก็สามารถเข้าไปค้นหาในคอมมูนิตี้ของเราได้เลยจ้า
                                        </p>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="icon purple"><br>
                                        <div class="svg-icon" id="svg-5"
                                            data-svg-icon="peddyhub/images/home_5/svg/pet_adoption.svg">
                                        </div>
                                    </div>
                                    <div class="context">
                                        <h5 class="purple">
                                            โรงแรมสัตว์เลี้ยง
                                        </h5>
                                        <p>
                                        เมื่อทาสชอบเที่ยว แต่ทาสก็ไม่สามารถที่จะพาเจ้าตัวแสบไปได้ทุกที่ จึงจำเป็นอย่างยิ่งที่ต้องหาสถานที่รับฝากน้องๆ สำหรับโรงแรมสัตว์เลี้ยงที่มีมาตรฐานสามารถค้นหาได้ที่นี่เลยจ้า
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>

    @endsection