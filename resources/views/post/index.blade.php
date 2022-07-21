@extends('layouts.peddyhub')

@section('content')

<style>
   .likebtn{
        background-color: transparent;
        color:#53565B;
        font-family: 'Sarabun', sans-serif;
        font-size:14px;
    }

    .show {
        -o-transition: opacity 1s;
        -moz-transition: opacity 1s;
        -webkit-transition: opacity 1s;
        transition: opacity 1s;
        opacity:1;
    }

    .hide {
        opacity:0;
        -o-transition: opacity 1s;
        -moz-transition: opacity 1s;
        -webkit-transition: opacity 1s;
        visibility: hidden  opacity 1s; 
        transition: visibility 1s, opacity 1s ;
    }

    .likebtn:hover {
        background-color: #F2F2F2; color:black ;
    }
    
    .modal-bottom {
        position:fixed;
        width: 90%;
        right: auto;
        left: auto;
        top:auto;
        bottom:0;
        z-index:999999;
    }
    
/* .likebtn:active {
  background-color: #3e8e41 !important;;
  box-shadow: 0 5px #666 !important;;
  transform: translateY(4px) !important;;
} */
</style>

<div id="copy_sucess" style="position: fixed;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999; 
  background-color: #242424;padding:15px; 
  border-radius:10px;color:white;
  font-family: 'Kanit', sans-serif;" 

  class="alert alert-primary hide" role="alert">
    <center>คัดลอกลิงก์แล้ว</center>
</div>
<div id="please_login" style="position: fixed;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999; 
  background-color: #242424;padding:15px; 
  border-radius:10px;color:white;
  font-family: 'Kanit', sans-serif;" 

  class="alert alert-primary hide" role="alert">
    <center>เข้าสู่ระบบเพื่อใช้งาน</center>
</div>

<div class="main-wrapper pet blog">
    <div class="button wow fadeInUp justify-content-end" style="margin-bottom:-50px">  
        <div class="container">
            <div class="row col-12">
                @include ('menubar.menu')
            </div>
            <div class="row col-12" style="padding:0px;">
                <div class="col-12 col-md-9  ">
                    @include ('menubar.menu_btn')
                </div>
            </div>
            <br>
            <!-- modal post -->
            @include ('post.modal_create_post')
        </div>
    </div>
    <div class="pet event">
        <div class="pet job">
            <section class="job">
                <div class="container">
                    <div class="row mt-5">
                        <!-- content post -->
                        @include ('post.content_post')
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        add_color();
    });

    function add_color(){
        // console.log("add_color");
        document.querySelector('#btn_a_all').classList.add('btn-style-two');
        document.querySelector('#btn_a_all').classList.remove('btn-outline-two');
        document.querySelector('#btn_a_all_pc').classList.add('btn-style-two');
        document.querySelector('#btn_a_all_pc').classList.remove('btn-outline-two');
        
    }

</script>