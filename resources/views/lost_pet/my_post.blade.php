@extends('layouts.peddyhub')

@section('content')

<style>
    .shadow-card{
        box-shadow: 2px 17px 97px -46px rgba(0,0,0,0.72);
        -webkit-box-shadow: 2px 17px 97px -46px rgba(0,0,0,0.72);
        -moz-box-shadow: 2px 17px 97px -46px rgba(0,0,0,0.72);
        border-radius: 25px ;
    }
    .shadow-btn{
    box-shadow: 10px 10px 12px -8px rgba(242,37,37,0.34) inset;
    -webkit-box-shadow: 10px 10px 12px -8px rgba(242,37,37,0.34) inset;
    -moz-box-shadow: 10px 10px 12px -8px rgba(242,37,37,0.34) inset;
            }
    .shadow-btn-posted{
    box-shadow: 10px 10px 12px -8px rgba(72,188,166,0.34) inset;
    -webkit-box-shadow: 10px 10px 12px -8px rgba(72,188,166,0.34) inset;
    -moz-box-shadow: 10px 10px 12px -8px rgba(72,188,166,0.34) inset;
            }     
    .button-expire {
        background-color: #FFEDED;
        color: #d9534f;
        padding: 5px 28px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: default;
        border: 2px solid #F7DDDD;
        border-radius: 25px;
        font-family: 'Sarabun', sans-serif;
    }
    .button-post-again {
        background: none;
        border: none;
        color: #5FC5B1;
        padding: 0px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 12px;
        cursor: default;
        border-radius: 25px;
        font-family: 'Sarabun', sans-serif;
    }
    .button-posted {
        background-color: #DDF3EF;
        color: #5FC5B1;
        padding: 5px 28px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: default;
        border: 2px solid #5FC5B1;
        border-radius: 25px;
        font-family: 'Sarabun', sans-serif;
    }
    .text-date{
        font-family: 'Sarabun', sans-serif;
        margin:0px;
    }
    .btn-post-one {
    position: relative;
    padding: 3px 13px;
    line-height: 29px;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    border-radius: 50px;
    background-color: #4B4C4E;
    border: 2px solid #393A3C;
}
.btn-post-one:hover {
    color: #ffffff;
    background: #4B4C4E;
}
    .btn-post-two {
        position: relative;
        padding: 3px 13px;
        line-height: 29px;
        color: #4B4C4E;
        font-size: 14px;
        font-weight: 600;
        border-radius: 50px;
        background-color: #ffffff;
        border: 2px solid #4B4C4E;
}
    .btn-post-two:hover {
    color: #ffffff;
    background: #4B4C4E;
}

.checkmark__circle {
            stroke-dasharray: 166;
            stroke-dashoffset: 166;
            stroke-width: 2;
            stroke-miterlimit: 10;
            stroke: #7ac142;
            fill: none;
            animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
        }

        .checkmark {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            stroke-width: 2;
            stroke: #fff;
            stroke-miterlimit: 10;
            margin: 10% auto;
            box-shadow: inset 0px 0px 0px #7ac142;
            animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
        }

        .checkmark__check {
            transform-origin: 50% 50%;
            stroke-dasharray: 48;
            stroke-dashoffset: 48;
            animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
        }

        @keyframes stroke {
            100% {
                stroke-dashoffset: 0
            }
        }

        @keyframes scale {

            0%,
            100% {
                transform: none
            }

            50% {
                transform: scale3d(1.1, 1.1, 1)
            }
        }

        @keyframes fill {
            100% {
                box-shadow: inset 0px 0px 0px 60px #7ac142
            }
        }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="button wow fadeInUp justify-content-end" style="margin-bottom:-50px">  
                <div class="container">
                    <div class="row col-12">
                        @include ('menubar.menu')
                    </div>
                    <br>
                    <div class="row col-12" style="padding:0px;">
                        <div class="col-12 col-md-9  ">
                            @include ('menubar.menu_btn')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="wow fadeInRight" style="margin-top:10px;">
        <a href="{{ url('/lost_pet') }}"  type="button" class="btn-post-two btn-sm"> <b>โพสทั้งหมด</b> </a href="{{ url('/lost_pet') }}">
        <a href="{{ url('/my_post') }}" type="button" class="btn-post-one btn-sm "> <b>โพสของฉัน</b> </a href="{{ url('/lost_pet') }}">
    </div>
    <div class="row">
        @foreach($my_post as $item)
            @if($item->status == "show" or $item->status == "expire")
                <div class="col-sm-12 col-md-4 " >
                    <div class="card shadow-card" >
                        <div class="card-body ">
                            @switch($item->status)
                                @case('show')
                                    <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>กำลังโพสอยู่</b> </button>
                                @break
                                <!-- ไม่รู้ว่าตั้งว่าอะไรนะเคสหมดอายุอะอย่าลืมเปลี่ยนนะ -->
                                <!-- เอาอันนี้แหละ -->
                                @case('expire')
                                    <button type="button" class="button-expire btn-lg shadow-btn"> <b>หมดอายุ</b> </button>
                                    <button type="button" class="button-post-again btn-lg" onclick="modal_check_send_line('{{ $item->id }}');">
                                        <b>โพสอีกครั้ง</b> 
                                    </button>
                                @break
                            @endswitch
                            <p class="text-date">โพสวันที่ {{ $item->updated_at->format('d/m/Y') }} </p>
                            @switch($item->status)
                                @case('show')
                                <p class="text-date">โพสหมดอายุในอีก <b class="text-danger">{{ number_format((strtotime($item->updated_at) - strtotime($date_15)) /  ( 60 * 60 * 24 )) }}</b> วัน</p>
                                @break
                                <!-- ไม่รู้ว่าตั้งว่าอะไรนะเคสหมดอายุอะอย่าลืมเปลี่ยนนะ -->
                                <!-- เอาอันนี้แหละ -->
                                @case('expire')
                                    <p class="text-date">โพสหมดอายุแล้วกรุณาโพสใหม่อีกครั้ง</p>
                                @break
                            @endswitch
                            <h5 class="card-title">{{$item->pet->name}}</h5>
                            <div class="text-center">
                                <img src="{{ url('storage/'.$item->pet->photo )}}" height="200px" height="300px" title="Pet"alt="Image of Pet">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<!-- modal wait user -->
<button id="btn_check_send_line" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#check_send_line">
</button>

<!-- Modal -->
<div class="modal fade" id="check_send_line" tabindex="-1" data-backdrop="static" data-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="close" data-dismiss="modal" >
                    <span id="btn_close_wait_user">&times;</span>
                </button>
                <center>
                    <br><br>
                    <img width="60%" src="{{ url('peddyhub/images/PEDDyHUB sticker line/09.png') }}">
                    <br><br>
                    <p style="font-size:20px;">
                        <b>คุณต้องการที่จะส่งไลน์ให้ผู้ที่อยู่ใกล้เคียงด้วยหรือไม่</b>
                    </p>
                </center>
            </div>
            <div class="modal-footer">
                <button id="btn_no_send_line_near" type="button" class="btn btn-secondary">ไม่ต้องส่อง</button>
                <button id="btn_send_line_near" type="button" class="btn btn-success">ส่งไลน์</button>
            </div>
        </div>
    </div>
</div>

<!-- modal user CF -->
    <button id="btn_data_success" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#data_success">
    </button>

    <!-- Modal -->
    <div class="modal fade" id="data_success" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <div class="wrapper">
                        <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                            <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                            <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                        </svg>
                        <h4 style="color: #7ac142;">บันทึกข้อมูลเรียบร้อยแล้ว</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a id="link_my_post" href="{{ url('/my_post') }}"></a>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        add_color();
        
    });
    function add_color(){
        // console.log("add_color");
        document.querySelector('#btn_a_lost').classList.add('btn-style-ten');
        document.querySelector('#btn_a_lost').classList.remove('btn-outline-ten');
        document.querySelector('#btn_a_lost_pc').classList.add('btn-style-ten');
        document.querySelector('#btn_a_lost_pc').classList.remove('btn-outline-ten');
    }

    function modal_check_send_line(id)
    {
        let btn_no_send_line_near = document.querySelector('#btn_no_send_line_near');
            let onclick_nosend = document.createAttribute("onclick");
                onclick_nosend.value = "no_send('" + id + "');";
                btn_no_send_line_near.setAttributeNode(onclick_nosend);

            let btn_send_line_near = document.querySelector('#btn_send_line_near');
            let onclick_send_line = document.createAttribute("onclick");
                onclick_send_line.value = "send_line('" + id + "');";
                btn_send_line_near.setAttributeNode(onclick_send_line);

        document.querySelector('#btn_check_send_line').click();
    }

    function no_send(id)
    {
        fetch("{{ url('/') }}/api/update_lost_pet/nosend/" + id )
            .then(response => response.json())
            .then(result => {
                // console.log(result);
        });

        document.querySelector('#btn_data_success').click();
        let delayInMilliseconds = 2500; 
        setTimeout(function() {
            document.querySelector('#link_my_post').click();
        }, delayInMilliseconds);
    }

    function send_line(id)
    {
        fetch("{{ url('/') }}/api/update_lost_pet/send_line/" + id )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
        });

        document.querySelector('#btn_data_success').click();
        let delayInMilliseconds = 2500; 
        setTimeout(function() {
            document.querySelector('#link_my_post').click();
        }, delayInMilliseconds);
    }
</script>