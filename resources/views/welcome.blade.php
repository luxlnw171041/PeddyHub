@extends('layouts.peddyhub')

@section('content')

<style>
    .svg-white {
        filter: invert(100%) sepia(0%) saturate(0%) hue-rotate(246deg) brightness(87%) contrast(156%);
    }
</style>
<a href="#descript">
      <div class="scroll-down"></div>
    </a>
            <div class="slider">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="text">
                                <div class="heading">
                                    <h1 style="font-family: 'Kanit', sans-serif;">
                                        ยินดีต้อนรับสู่
                                        <span class="wow pulse" data-wow-delay="1s" style="font-family: 'Laila', sans-serif !important;">
                                            PeddyHub</span>
                                    </h1>
                                </div>
                                <p class="wow fadeInDown" style="font-family: 'Kanit', sans-serif;">
                                PeddyHub 
                                ศูนย์รวมบริการ ข้อมูล และ community สำหรับคนรักสัตว์ 
                                peddy hub ครบจบในที่เดียว !!!</p>
                                <div class="button wow fadeInUp" >
                                    @if(Auth::check())
                                        <a style="font-family: 'Kanit', sans-serif;" href="{{ url('/pet/create') }}" class="btn main" title="contact">
                                            Register pet <i class="fas fa-paw"></i>
                                        </a>
                                    @else
                                        <a style="font-family: 'Kanit', sans-serif;" href="{{'login'}}?redirectTo={{ url('/') }}/pet/create" class="btn main" title="contact">
                                            Register pet <i class="fas fa-paw"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <style>
                             .video {
                                aspect-ratio: 4/3;
                                max-height: calc(100vh - 6rem);
                                max-width: 95%;
                                width: fit-content;
                                height: fit-content;
                                display: block;
                                background-color: black;
                                border-radius: 1.28rem;
                                object-fit: cover;
                                align-self: center;
                            }
                            .slogan{
                                font-size: 15px;
                                background-color: #B8205B;
                                padding: 10px 5px;
                                border-radius: 15px;
                                color: #fff;
                                font-weight: bold;
                                font-family: 'Kanit', sans-serif !important;
                                animation: slogan 2s ease 0s 1 normal forwards;
                                opacity: 0;
                                justify-content: center;
                            }
                            .slogan img{ 
                                width: 50px !important;
                                height: 50px !important;
                                display: block;
                                margin-bottom: 5px;
                            }
                            @keyframes slogan {
                                0%, 20%, 40%, 60%, 80%, 100% {
                                -webkit-transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                                transition-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                                }
                                0% {
                                opacity: 0;
                                -webkit-transform: scale3d(.3, .3, .3);
                                transform: scale3d(.3, .3, .3);
                                }
                                20% {
                                -webkit-transform: scale3d(1.1, 1.1, 1.1);
                                transform: scale3d(1.1, 1.1, 1.1);
                                }
                                40% {
                                -webkit-transform: scale3d(.9, .9, .9);
                                transform: scale3d(.9, .9, .9);
                                }
                                60% {
                                opacity: 1;
                                -webkit-transform: scale3d(1.03, 1.03, 1.03);
                                transform: scale3d(1.03, 1.03, 1.03);
                                }
                                80% {
                                -webkit-transform: scale3d(.97, .97, .97);
                                transform: scale3d(.97, .97, .97);
                                }
                                100% {
                                opacity: 1;
                                -webkit-transform: scale3d(1, 1, 1);
                                transform: scale3d(1, 1, 1);
                                }
                                
                            }   
                            
                            @media only screen and (max-width: 600px) {
                                .slogan-mobile{
                                    padding: 0 20px;
                                }
                                .an_image_image{
                                    margin-top: 55px;
                                }
                            }
                        </style>
                       
                        <div class="col-lg-5 col-md-12 col-sm-12 method" style="margin-top:-20px;">
                            <div class="image">
                                <div class="an_image an_image_hz_ps_right_end an_image_vt_ps_top an_image_anime_delay_300 an_image_anime_duration_1500 an_image_anime_style_ease_out_sine"
                                    data-speed="1.2">
                                    <div class="an_image_image" data-speed="1.2">
                                        <!-- <div class="pt_image"><span><img src="peddyhub/images/home_5/icon1.png" title="Pet"
                                                    alt="Image of Pet"></span>
                                        </div> -->
                                        <center>
                                            <video class="video" loop autoplay controls>
                                                <source src="https://www.peddyhub.com/peddyhub/images/video/PEDDyHUB.mp4" />
                                            </video>
                                        </center>
                                        <div class="row text-center mt-3 slogan-mobile">
                                            <div class="col-6 col-md-3 p-1" >
                                                <div class="wow slogan"style="animation-delay: 0s;">
                                                    <center>
                                                        <img src="{{ url('/peddyhub/images/PEDDyHUB sticker line/30.png') }}"  alt="">
                                                    </center>
                                                    ช่วยเหลือ
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-1" >
                                            <div class="wow slogan"style="animation-delay: 0.2s;">
                                                    <center>
                                                        <img src="{{ url('/peddyhub/images/PEDDyHUB sticker line/33.png') }}"  alt="">
                                                    </center>
                                                    ปลอดภัย
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-1" >
                                                <div class="wow slogan"style="animation-delay: 0.4s;">
                                                    <center>
                                                        <img src="{{ url('/peddyhub/images/PEDDyHUB sticker line/11.png') }}"  alt="">
                                                    </center>
                                                    สุขใจ
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-3 p-1" >
                                                <div class="wow slogan"style="animation-delay: 0.6s;">
                                                    <center>
                                                        <img src="{{ url('/peddyhub/images/logo/logo-5.png') }}"  alt="">
                                                    </center>
                                                    ไปกับเพ็ทดี้ฮับ
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
        </section>


        <section id="descript" class="descript" >
            <div class="context">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h4 class="wow fadeInDown" style="font-family: 'Kanit', sans-serif;">เพ็ทดี้ฮับ ร่วมมือกับ นกแอร์ พาเจ้าตัวแสบขึ้นเครื่องได้รวดเร็วกว่าเดิมเพียงลงทะเบียนสัตว์เลี้ยงและเพิ่มเอกสารที่จำเป็น <span class="wow pulse" data-wow-delay="1s" style="color: #b8205b;">ลงทะเบียนเลย!!</span></h4>
                    </div>
                    <br>
                    <div class="col-12 owl-carousel-3 align-self-center" style="padding:0px;">
                        <div class="owl-carousel"> 
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-2 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/9.png') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/9.png') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('/peddyhub/images/pet_on_board/1.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                <div class="item " style="padding:5px;z-index:-1;">
                                    <div class="gallery-item-1 col-12">
                                        <div class="inner-box">
                                            <figure class="image-box">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/1.jpg') }}" style="object-fit: cover;" alt="image of pet"  class="img-fluid customer">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-2 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/2.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/2.jpg') }}" style="object-fit: cover;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-3 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/3.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/3.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-4 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/4.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/4.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-5 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/5.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/5.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-6 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/6.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/6.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-7 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/7.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/7.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                            <div class="item" style="padding:5px;z-index:-1;">
                                <div class="gallery-item-8 col-12">
                                    <div class="inner-box">
                                        <figure class="image-box">
                                            <a href="{{ url('/peddyhub/images/pet_on_board/8.jpg') }}" data-fancybox="images" data-caption="" class="link">
                                                <img class="imgf" src="{{ url('/peddyhub/images/pet_on_board/8.jpg') }}" style="object-fit: contain;" alt="image of pet"  class="img-fluid customer">
                                            </a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="row">
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
                    </div> -->
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
        <section class="method" >
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-md-12 col-sm-12">
                        <div class="text">
                            <div class="counter-portion">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="box borded">
                                                <img  class="icon" width="80px;" src="peddyhub/images/home_5/svg/home.svg"  alt="Kiwi standing on oval">

                                            <div class="num">
                                                <span class="font-family: 'Kanit', sans-serif;counting-value" style="font-size: 35px;">{{ 100 + ($count_pet * 3) }}</span>
                                                <span style="font-family: 'Kanit', sans-serif;font-size: 35px;">+</span>
                                            </div>
                                            <div class="description" style="font-family: 'Kanit', sans-serif;font-size: 15px;margin-top:5px;">สัตว์เลี้ยงลงทะเบียน</div>
                                        </div>
                                        <div class="box happy">
                                                <img class="svg-white icon" width="80px;" src="peddyhub/images/home_5/svg/cat-dog.svg"  alt="Kiwi standing on oval">
                                                
                                            <div class="num">
                                                <span class="counting-value" style="font-family: 'Kanit', sans-serif;font-size: 35px;">24</span>
                                                <span style="font-family: 'Kanit', sans-serif;font-size: 35px;">ชม.</span>
                                            </div>
                                            <div class="description" style="font-size: 15px;margin-top:5px;font-family: 'Kanit', sans-serif;">ให้การช่วยเหลือ</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="box user">
                                                <img class="icon" width="80px;" src="peddyhub/images/home_5/svg/user.svg"  alt="Kiwi standing on oval">
                                            <div class="num">
                                                <span class="counting-value" style="font-size: 35px;font-family: 'Kanit', sans-serif;">{{ $count_user + 300 }}</span>
                                                <span style="font-size: 35px;">+</span>
                                            </div>
                                            <div class="description" style="font-size: 15px;margin-top:5px;font-family: 'Kanit', sans-serif;">ผู้ใช้</div>
                                        </div>
                                        <div class="box thai text-center">
                                            <img  class="icon" width="80px;" src="peddyhub/images/home_5/svg/thai.svg"  alt="Kiwi standing on oval">

                                            <div class="num" >
                                                <span class="counting-value" style="font-size: 35px;font-family: 'Kanit', sans-serif;">77</span>
                                                <span style="font-size: 35px;font-family: 'Kanit', sans-serif;">+</span>
                                            </div>
                                            <div class="description" style="font-size: 15px;margin-top:5px;font-family: 'Kanit', sans-serif;">จังหวัดที่คลอบคลุม</div>
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
                        <h3 style="color:white;font-family: 'Kanit', sans-serif;">แสดงเจ้าตัวแสบของคุณให้ทุกคนได้เห็น</h3>
                        <!-- <div class="text">For professional dog and cat grooming needs</div> -->
                    </div>
                    <div class="row clearfix">
                        @foreach($data_post as $item)
                            <div class="gallery-item col-md-4 col-sm-6 col-xs-12">
                                <div class="inner-box">
                                    <figure class="image-box">
                                        <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid customer">
                                        <!--Overlay Box-->
                                        <div class="overlay-box"style="padding:0px 20px;">
                                            <div class="card" >
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-2" style="padding:0px;">
                                                            @if(!empty($item->profile->photo))
                                                                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $item->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                            @else
                                                                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                                            @endif
                                                        </div>
                                                        <div class="col-9" style="padding:0px 10px">
                                                            @if(!empty($item->profile->name))
                                                                <p class="notranslate d-flex justify-content-start" style="padding:0px;margin:0px;font-family: 'Kanit', sans-serif;"> <b>{{ $item->profile->name }}</b>  </p>
                                                            @else
                                                                <p class="notranslate d-flex justify-content-start" style="padding:0px;margin:0px;font-family: 'Kanit', sans-serif;"> <b>Guest</b>  </p>
                                                            @endif
                                                            <p class="d-flex justify-content-start" style="font-size:12px;margin-top:-8px;font-family: 'Kanit', sans-serif;"> {{ $item->created_at->diffForHumans() }} </p>
                                                        </div>
                                                        <div class="col-12" style="padding:0px 0px 0px 20px">
                                                            <a href="{{ url('/post/' . $item->id) }}" title="">
                                                            
                                                                <p class="head mt-1 mb-0 notranslate" style="font-family: 'Kanit', sans-serif;">{{ $item->detail }} </p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="overlay-inner" style="top:90px;">
                                                <div class="content">
                                                    <a href="{{ url('post' )}}/#id{{ $item->id }}"  class=" link"><span class="icon fa fa-search"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </div>
                        @endforeach
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
<br>
        <div class="about pet">
            <section class="service">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown" >บริการ <span class="wow pulse" data-wow-delay="1s" >
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
                                        <h5 class="purple" style="font-family: 'Kanit', sans-serif;">
                                            ตามหาเจ้าตัวแสบ
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
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
                                        <h5 class="orange" style="font-family: 'Kanit', sans-serif;">
                                            ตัดขนเสริมสวยแต่งหล่อ
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
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
                                        <h5 class="orange" style="font-family: 'Kanit', sans-serif;">
                                            อาหารเจ้าซุกซน 
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
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
                                        <h5 class="orange" style="font-family: 'Kanit', sans-serif;">
                                            โรงพยาบาลสัตว์
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
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
                                        <h5 class="purple" style="font-family: 'Kanit', sans-serif;">
                                            อุปการะน้องๆ
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
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
                                        <h5 class="purple" style="font-family: 'Kanit', sans-serif;">
                                            โรงแรมสัตว์เลี้ยง
                                        </h5>
                                        <p style="font-family: 'Kanit', sans-serif;">
                                        เมื่อทาสชอบเที่ยว แต่ทาสก็ไม่สามารถที่จะพาเจ้าตัวแสบไปได้ทุกที่ จึงจำเป็นอย่างยิ่งที่ต้องหาสถานที่รับฝากน้องๆ สำหรับโรงแรมสัตว์เลี้ยงที่มีมาตรฐานสามารถค้นหาได้ที่นี่เลยจ้า
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <br><br>
            <section class="services-section-four"  style="background-color: #ffefef;padding-top:20px;padding-bottom:20px;border-top: 2px solid red;border-bottom: 2px solid red;;">
            <div class="auto-container">
                <h4 class="text-center" style="font-family: 'Kanit', sans-serif;">บริการดีๆจาก <br class="d-block d-md-none"> ViiCHECK</h4>
                <br>
                <div class="row clearfix">
                    <!--Services Block-->
                    <div class="services-block col-md-6 col-sm-6 col-xs-12" style="border-color:#B8205B;"> 
                        <a href="https://lin.ee/y3gA8A3">
                            <div class="inner-box">
                                <div id="ewan" class="content">
                                    <div class="icon-box d-none d-lg-block">
                                        <img  width="18%" src="{{ asset('/peddyhub/images/sticker_vc/2.png') }}" class="img-fluid "  alt="">
                                    </div>
                                    <div class="icon-box d-flex justify-content-center d-block d-md-none">
                                        <img  width="50%" src="{{ asset('/peddyhub/images/sticker_vc/2.png') }}" class="img-fluid text-center " alt="">
                                    </div>
                                    <h3 style="margin-left:15px;font-family: 'Kanit', sans-serif;">ติดต่อเจ้าของรถ</h3>
                                    <div style="margin-left:15px;font-family: 'Kanit', sans-serif;" class="text">ติดต่อเจ้าของรถได้ง่ายๆ โดยผ่าน Line Official: @Viicheck เพียงแค่สแกน QR-CODE บนสติ๊กเกอร์</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--Services Block-->
                    <div class="services-block col-md-6 col-sm-6 col-xs-12">
                        <div class="inner-box">
                            <a href="https://lin.ee/y3gA8A3">
                                <div id="ewan" class="content">
                                    <div class="icon-box d-none d-lg-block">
                                        <img width="25%" src="{{ asset('/peddyhub/images/sticker_vc/1.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="icon-box d-flex justify-content-center d-block d-md-none">
                                        <img width="50%" src="{{ asset('/peddyhub/images/sticker_vc/1.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <h3 style="margin-left:15px;font-family: 'Kanit', sans-serif;">ติดต่อแจ้งเหตุฉุกเฉิน</h3>
                                    <div style="margin-left:15px;font-family: 'Kanit', sans-serif;" class="text">ติดต่อแจ้งเหตุฉุกเฉิน 24 ชั่วโมงเพียงแค่กดปุ่มก็จะมีเบอร์ที่จำเป็นแสดงขึ้นมา</div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!--Services Block-->
                    <div class="services-block col-md-6 col-sm-6 col-xs-12">
                        <a href="https://lin.ee/y3gA8A3">
                            <div class="inner-box">
                                <div id="ewan" class="content">
                                    <div class="icon-box d-none d-lg-block">
                                        <img width="25%" src="{{ asset('/peddyhub/images/sticker_vc/4.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="icon-box d-flex justify-content-center d-block d-md-none">
                                        <img width="50%" src="{{ asset('/peddyhub/images/sticker_vc/4.png') }}" class="img-fluid" alt="">
                                    </div>
                                    <h3 style="margin-left:15px;font-family: 'Kanit', sans-serif;">แจ้งเตือน พรบ./ประกัน</h3>
                                    <div style="margin-left:15px;font-family: 'Kanit', sans-serif;" class="text">หายห่วงเรื่องลืมต่ออายุ พรบ./ประกันระบบจะแจ้งเตือนเมื่อใกล้วันครบกำหนด</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!--Services Block-->
                    <div class="services-block col-md-6 col-sm-6 col-xs-12">
                        <a href="https://lin.ee/y3gA8A3">
                            <div class="inner-box">
                                <div id="ewan" class="content">
                                    <div class="icon-box d-none d-lg-block">
                                        <img width="18%" src="{{ asset('/peddyhub/images/sticker_vc/6.png') }}" class="img-fluid" alt="">   
                                    </div>
                                    <div class="icon-box d-flex justify-content-center d-block d-md-none">
                                        <img width="50%" src="{{ asset('/peddyhub/images/sticker_vc/6.png') }}" class="img-fluid" alt="">   
                                    </div>
                                    <h3 style="margin-left:15px;font-family: 'Kanit', sans-serif;">โปรโมชั่นเกี่ยวกับยานพาหนะ</h3>
                                    <div style="margin-left:15px;font-family: 'Kanit', sans-serif;" class="text">โปรโมชั่นของยานพาหนะมากมายที่รอเสนอให้คุณใช้บริการรีบเลยก่อนหมดเวลา !</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        </div>

    @endsection