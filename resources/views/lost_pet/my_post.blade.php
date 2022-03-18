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
    <div class="row">
        @foreach($my_post as $item)
            <div class="col-sm-12 col-md-4 " >
                <div class="card shadow-card" >
                    <div class="card-body ">
                        @switch($item->status)
                            @case('show')
                                <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>กำลังโพสอยู่</b> </button>
                            @break
                            <!-- ไม่รู้ว่าตั้งว่าอะไรนะเคสหมดอายุอะอย่าลืมเปลี่ยนนะ -->
                            @case('expire')
                                <button type="button" class="button-expire btn-lg shadow-btn"> <b>หมดอายุ</b> </button>
                                <button type="button" class="button-post-again btn-lg"> <b>โพสอีกครั้ง</b> </button>
                            @break
                        @endswitch
                        <p class="text-date">โพสวันที่ {{ $item->created_at->format('d/m/Y') }} </p>
                        @switch($item->status)
                            @case('show')
                            <p class="text-date">โพสหมดอายุในอีก <b>10</b> วัน</p>
                            @break
                            <!-- ไม่รู้ว่าตั้งว่าอะไรนะเคสหมดอายุอะอย่าลืมเปลี่ยนนะ -->
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
        @endforeach
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
        document.querySelector('#btn_a_mypost').classList.add('btn-style-five');
        document.querySelector('#btn_a_mypost').classList.remove('btn-outline-five');
        document.querySelector('#btn_a_mypost_pc').classList.add('btn-style-five');
        document.querySelector('#btn_a_mypost_pc').classList.remove('btn-outline-five');
    }
</script>