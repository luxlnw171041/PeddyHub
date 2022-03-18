@extends('layouts.peddyhub')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,200;1,800&display=swap" rel="stylesheet">
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
        <div class="col-sm-12 col-md-4 " >
            <div class="card shadow-card" >
                <div class="card-body ">
                    <button type="button" class="button-expire btn-lg shadow-btn"> <b>หมดอายุ</b> </button>
                    <button type="button" class="button-post-again btn-lg"> <b>โพสอีกครั้ง</b> </button>
                    <p class="text-date">โพสวันที่ 18/3/2022 </p>
                    <p class="text-date">โพสหมดอายุแล้วกรุณาโพสใหม่อีกครั้ง</p>
                    <h5 class="card-title">พริกแกง</h5>
                    <div class="text-center">
                        <img src="peddyhub/images/home_5/a.png" height="200px" height="300px" title="Pet"alt="Image of Pet">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card shadow-card" >
                <div class="card-body ">
                    <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>กำลังโพสอยู่</b> </button>
                    <p class="text-date">โพสวันที่ 18/3/2022</p>
                    <p class="text-date">โพสหมดอายุในอีก 10 วัน</p>
                    <h5 class="card-title  text-date">ลูก้า</h5>
                    <div class="text-center">
                        <img src="peddyhub/images/home_5/cat.png" height="200px" title="Pet"alt="Image of Pet">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-4">
            <div class="card shadow-card" >
                <div class="card-body ">
                    <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>กำลังโพสอยู่</b> </button>
                    <p class="text-date">โพสวันที่ 18/3/2022</p>
                    <p class="text-date">โพสหมดอายุในอีก 10 วัน</p>
                    <h5 class="card-title">โบ้</h5>
                    <div class="text-center">
                        <img src="peddyhub/images/home_5/f.png" height="200px" title="Pet"alt="Image of Pet">
                    </div>
                </div>
            </div>
        </div><div class="col-sm-12 col-md-4">
            <div class="card shadow-card" >
                <div class="card-body ">
                    <button type="button" class="button-posted btn-lg shadow-btn-posted"> <b>กำลังโพสอยู่</b> </button>
                    <p class="text-date">โพสวันที่ 18/3/2022</p>
                    <p class="text-date">โพสหมดอายุในอีก 10 วัน</p>
                    <h5 class="card-title">จี้</h5>
                    <div class="text-center">
                        <img src="peddyhub/images/home_5/f.png" height="200px" title="Pet"alt="Image of Pet">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection