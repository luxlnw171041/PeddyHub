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
        background-color: #feffed;
        color: #d9d94f;
        padding: 5px 28px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: default;
        border: 2px solid #f7f7dd;
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
        margin:8px;
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
            <div class="col-sm-12 col-md-4 " >
                <div class="card shadow-card" >
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-6">
                                @if($item->status == "found")
                                    <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>เจอแล้ว</b> </button>
                                @else
                                    <button type="button" class="button-expire btn-lg shadow-btn"> <b>กำลังค้นหา</b> </button>
                                @endif
                            </div>
                            <div class="col-6">
                                 @php
                                    $text_num = number_format((strtotime($item->updated_at) - strtotime($date_7)) /  ( 60 * 60 * 24 ))  ;
                                @endphp

                                @if($item->status != "found")
                                    @if($text_num < "0" )
                                        <button style="float: right;margin-top: 10px;" type="button" class="button-post-again btn-lg" onclick="send_line('{{ $item->id }}');">
                                            <b>ส่งข้อความอีกครั้ง</b> 
                                        </button>
                                    @else
                                        <button class="button-post-again btn-lg"  style="float: right;margin-top: -2px;">
                                            <b>ส่งข้อความอีกครั้งใน {{ $text_num }} วัน</b>
                                        </button>
                                    @endif
                                @endif
                            </div>
                            <div class="col-12">
                                <p class="text-date">โพสวันที่ : {{ $item->created_at->format('d/m/Y') }} </p>
                                <p style="margin-top:-10px!important;" class="text-date">อัพเดทล่าสุด : {{ $item->updated_at->format('d/m/Y') }} </p>
                            </div>
                            <div class="col-12">
                                <h5 class="card-title notranslate">{{$item->pet->name}}</h5>
                                <div class="text-center">
                                    <img class="main-shadow main-radius" src="{{ url('storage/'.$item->pet->photo )}}" height="200px" height="300px" title="Pet"alt="Image of Pet">
                                </div>
                            </div>
                            <div class="col-12">
                                <br>
                                <i style="float:right;margin-top: -15px;" data-toggle="collapse" data-target="#collapseExample_{{ $item->id }}" aria-expanded="false" aria-controls="collapseExample_{{ $item->id }}" class="fas fa-sort-down text-secondary"></i>

                                <div class="collapse" id="collapseExample_{{ $item->id }}">
                                    <div class="row">
                                        <div class="col-8">
                                            @if($item->status != "found")
                                            <button style="width:100%;" class="btn btn-sm btn-success main-shadow main-radius" onclick="found_pet('{{ $item->id }}');">
                                                เจอแล้ว
                                            </button>
                                            @endif
                                        </div>
                                        <div class="col-4">
                                            <form method="POST" action="{{ url('/lost_pet' . '/' . $item->id) }}" accept-charset="UTF-8">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button  style="width:100%;" type="submit" class="btn btn-sm btn-danger main-shadow main-radius"onclick="return confirm(&quot;Confirm delete?&quot;)">
                                                    ลบ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<br>

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
                        <h4 style="color: #7ac142;">ส่งข้อความเรียบร้อยแล้ว</h4>
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

    function found_pet(id)
    {
        fetch("{{ url('/') }}/api/update_lost_pet/found_pet/" + id )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
        });

        let delayInMilliseconds = 1000; 
        setTimeout(function() {
            document.querySelector('#link_my_post').click();
        }, delayInMilliseconds);
    }

</script>