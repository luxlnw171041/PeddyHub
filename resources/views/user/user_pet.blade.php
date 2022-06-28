@extends('layouts.peddyhub')

@section('content')
<style>
    .profile {
        background: white;
        border-radius: 25px;
        box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        -webkit-box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        -moz-box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        padding: 28px 30px 30px 35px;
        position: relative;
        width: 100%;
        top: -20px;
    }

    .profile_picture {
        background: white;
        border-radius: 50%;
        border: 10px solid white;
        height: 100px;
        position: absolute;
        top: -20px;
        width: 100px;
    }

    .profile_img {
        border-radius: 50%;
        height: 100%;
        width: 100%;
    }

    .account {
        align-self: center;
        display: flex;
        flex: 1;
        justify-content: flex-start;
        padding-left: 100px;
    }

    .tel {
        flex: none;
        margin-left: 30px;
        width: 140px;
    }

    .tel-button {
        border-radius: 50px;
        border: 1px solid black;
        color: black;
        display: block;
        font-size: 13px;
        padding: 10px;
        text-align: center;
        text-decoration: none;
    }

    .profile_header {
        display: flex;
        margin-bottom: 20px;
    }

    .infos {
        display: flex
    }

    .info {
        border-right: 1px solid #e9e9e9;
        display: flex;
        flex: 1;
        justify-content: center;
        padding: 10px 4px;
    }

    .pet_profile {
        background: white;
        border-radius: 25px;
        box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        -webkit-box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        -moz-box-shadow: 1px 1px 81px -42px rgba(0, 0, 0, 0.72);
        padding: 20px 15px 15px 15px;
        position: relative;
        width: 100%;
        top: 20px;
    }

    .pet_picture {
        background: white;
        border-radius: 50%;
        border: 8px solid white;
        height: 86px;
        position: absolute;
        top: -20px;
        width: 86px;
    }

    .userpet_img {
        border-radius: 50%;
        height: 70px;
        width: 70px;
        display: flex;
        justify-content: center;

    }

    .pet_header {
        display: flex;
        margin-bottom: 20px;
    }

    .pet_name {
        align-self: center;
        display: flex;
        flex: 1;
        justify-content: flex-start;
        padding-left: 100px;
    }

    .pet_infos {
        display: flex
    }

    .pet_info {
        border-right: 1px solid #e9e9e9;
        display: flex;
        flex: 1;
        justify-content: center;
        padding: 10px 4px;
    }

    .pet_type {
        text-align: right;
        text-decoration: none;
    }

    .shadow {
        box-shadow: 1px 4px 41px 0px rgba(0, 0, 0, 0.72);
        -webkit-box-shadow: 1px 4px 41px 0px rgba(0, 0, 0, 0.72);
        -moz-box-shadow: 1px 4px 41px 0px rgba(0, 0, 0, 0.72);
    }

    .img_name {
        background-color: white;
        color: black;
        padding: 10px 25px 25px;
        border: 5px;
        margin-bottom: -5px;
        border-radius: 25px 25px 0px 0px;
        font-size: 20px;
        z-index: 1;
    }

    .img_cer {
        color: white;
        border: 5px;
        border-radius: 0px 25px 25px 25px;
        z-index: 92;
    }

    .grid-container {
        columns: 3 200px;
        column-gap: 1.5rem;
        width: 100%;
        margin: 0 auto;
    }.lightbox {
        /* Default to hidden */
        display: none;

        /* Overlay entire screen */
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        /* A bit of padding around image */
        padding: 1em;

        /* Translucent background */
        background: rgba(0, 0, 0, 0.8);
    }

    /* Unhide the lightbox when it's the target */
    .lightbox:target {
        display: block;
    }

    .lightbox span {
        /* Full width and height */
        display: block;
        width: 100%;
        height: 100%;

        /* Size and position background image */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
<div class="container mt-3">
    @foreach($user as $item)
    <div class="profile">
        <div class="profile_header">
            <div class="profile_picture">
                @if(!empty($item->profile->photo))
                <img class="profile_img" src="{{ url('storage')}}/{{ $item->profile->photo }}">

                @else
                <img src="{{ url('/peddyhub/images/icons/user.png') }}">
                @endif
            </div>

            <div class="account">
                <b style="font-family: 'Kanit', sans-serif;font-size:18px" class="notranslate">
                    @if(!empty($item->profile->real_name))
                    {{$item->profile->real_name}}
                    @else
                    {{$item->profile->name}}
                    @endif
                </b>
                <a style="margin-left:12px;font-size:20px" href="tel:{{$item->profile->phone}}"><i class="fa-regular fa-phone-flip text-success"></i></a>
            </div>
        </div>
        <div class="infos">
            <div class="info">
                <b style="font-family: 'Kanit', sans-serif;font-size:20px">
                    @if(!empty($item->profile->changwat_th))
                    ทีอยู่: {{$item->profile->tambon_th}} {{$item->profile->amphoe_th}} {{$item->profile->changwat_th}}
                    @else
                    ที่อยู่: ไม่ระบุ
                    @endif
                </b>
            </div>
        </div>
    </div>
    <div class="row">
        @if(!empty($item->profile->photo_passport))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">พาสสปอต</span>
            <a href="#photo-passport">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->profile->photo_passport }}">
            </a>
            <a href="#img-photo-passport" class="lightbox" id="photo-passport">
                <span style="background-image: url('{{ url('storage')}}/{{ $item->profile->photo_passport }}')"></span>
            </a>
        </div>
        @endif
        @if(!empty($item->profile->photo_id_card))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">บัตรประชาชน</span>
            <a href="#photo-id-card">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->profile->photo_id_card }}">
            </a>
            <a href="#img-photo-id-card" class="lightbox" id="photo-id-card">
                <span style="background-image: url('{{ url('storage')}}/{{ $item->profile->photo_id_card }}')"></span>
            </a>
        </div>
        @endif
    </div>
    @endforeach
    <br><br>
    <h5>สัตว์เลี้ยง</h5>
    <hr style="margin-top: 5px;">
    @foreach($petuser as $item)
    <div class="pet_profile">
        <div class="pet_header">
            <div class="pet_picture">
                <img class="userpet_img" src="{{ url('storage')}}/{{ $item->photo }}">

            </div>
            <div class="pet_name">
                <b style="font-family: 'Kanit', sans-serif;font-size:18px">
                    {{$item->name}}
                    @switch($item->gender)
                    @case ('ชาย')
                    <i style="color:#62DBFB" class="fa-solid fa-mars"></i>
                    @break
                    @case ('หญิง')
                    <i style="color:#FE7AB6" class="fa-solid fa-venus"></i>
                    @break
                    @case ('ไม่ระบุ')
                    <i style="color:#F3AA0D" class="fa-solid fa-venus-mars"></i>
                    @break
                    @endswitch
                </b>

            </div>
            <div class="pet_type">
                @switch($item->pet_category_id)
                @case (1)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/dog_c.png') }}" alt="">
                @break
                @case (2)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/cat_c.png') }}" alt="">
                @break
                @case (3)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/bird_c.png') }}" alt="">
                @break
                @case (4)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/fish_c.png') }}" alt="">
                @break
                @case (5)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/rabbit_c.png') }}" alt="">
                @break
                @case (6)
                <img class="text-cecnter" width="30px" src="{{ asset('/peddyhub/images/img-icon/snake_c.png') }}" alt="">
                @break
                @endswitch

            </div>
        </div>
        <div class="pet_infos">
            <div class="pet_info">
                <b class="d-flex align-items-end" style="font-family: 'Kanit', sans-serif;font-size:18px;">
                    <img style="font-size:18px;" width="29px" src="{{ asset('/peddyhub/images/img-icon/birthday.png') }}" alt="">&nbsp;: {{ thaidate("F Y" , strtotime($item->birth)) }}
                </b>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- <br>
    <div class="row">
        @if(!empty($item->photo_medical_certificate))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">ใบรับรองแพทย์</span>
            <img style="z-index:  5;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->photo_medical_certificate }}">
        </div>
        @endif
        @if(!empty($item->photo_vaccine))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  -1;position: static;" class="img_name shadow">ใบฉีดวัคฉีน 1</span>
            <img style="z-index:  9;position: static;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->photo_vaccine }}">
        </div>
        @endif
        @if(!empty($item->photo_vaccine_2))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">ใบฉีดวัคฉีน 2</span>
            <img style="z-index:  5;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->photo_vaccine_2 }}">
        </div>
        @endif
        @if(!empty($item->photo_vaccine_3))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">ใบฉีดวัคฉีน 3</span>
            <img style="z-index:  5;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->photo_vaccine_3 }}">
        </div>
        @endif
        @if(!empty($item->certificate))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  -1;position: static;" class="img_name shadow">เอกสารอื่นๆ 1</span>
            <img style="z-index:  9;position: static;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->certificate }}">
        </div>
        @endif
        @if(!empty($item->certificate_2))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">เอกสารอื่นๆ 2</span>
            <img style="z-index:  5;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->certificate_2 }}">
        </div>
        @endif
        @if(!empty($item->certificate_3))
        <div class="col-12 col-md-4 col-lg-4" style="margin-top:25px;">
            <span style="z-index:  1;" class="img_name shadow">เอกสารอื่นๆ 3</span>
            <img style="z-index:  5;" class="shadow img_cer" src="{{ url('storage')}}/{{ $item->certificate_3 }}">
        </div>
        @endif
    </div> -->
    <div class="container">
        <div class="grid-container">
            @if(!empty($item->photo_medical_certificate))
                <div style="margin-top:25px;"> 
                    <span style="z-index:  1;" class="img_name shadow">ใบรับรองแพทย์</span>
                    <a href="#photo-1">
                        <img style="z-index:  5;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->photo_medical_certificate }}">
                    </a>
                    <a href="#img-photo-1" class="lightbox" id="photo-1">
                        <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_medical_certificate }}')"></span>
                    </a>
                </div>
            @endif
            @if(!empty($item->photo_vaccine))
            <div style="margin-top:25px;">
                <span style="z-index:  -1;position: static;" class="img_name shadow">ใบฉีดวัคฉีน 1</span>
                <a href="#photo-2">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->photo_vaccine }}">
                </a>
                <a href="#img-photo-2" class="lightbox" id="photo-2">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine }}')"></span>
                </a>
            </div>
            @endif
            @if(!empty($item->photo_vaccine_2))
            <div style="margin-top:25px;">
                <span style="z-index:  1;" class="img_name shadow">ใบฉีดวัคฉีน 2</span>
                <a href="#photo-3">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->photo_vaccine_2 }}">
                </a>
                <a href="#img-photo-3" class="lightbox" id="photo-3">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine_2 }}')"></span>
                </a>
            </div>
            @endif
            @if(!empty($item->photo_vaccine_3))
            <div style="margin-top:25px;">
                <span style="z-index:  1;" class="img_name shadow">ใบฉีดวัคฉีน 3</span>
                <a href="#photo-4">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->photo_vaccine_3 }}">
                </a>
                <a href="#img-photo-4" class="lightbox" id="photo-4">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine_3 }}')"></span>
                </a>
            </div>
            @endif
            @if(!empty($item->certificate))
            <div style="margin-top:25px;">
                <span style="z-index:  -1;position: static;" class="img_name shadow">เอกสารอื่นๆ 1</span>
                <a href="#photo-5">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->certificate }}">
                </a>
                <a href="#img-photo-5" class="lightbox" id="photo-5">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate }}')"></span>
                </a>
            </div>
            @endif
            @if(!empty($item->certificate_2))
            <div style="margin-top:25px;">
                <span style="z-index:  1;" class="img_name shadow">เอกสารอื่นๆ 2</span>
                <a href="#photo-6">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->certificate_2 }}">
                </a>
                <a href="#img-photo-6" class="lightbox" id="photo-6">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate_2 }}')"></span>
                </a>
            </div>
            @endif
            @if(!empty($item->certificate_3))
            <div style="margin-top:25px;">
                <span style="z-index:  1;" class="img_name shadow">เอกสารอื่นๆ 3</span>
                <a href="#photo-7">
                    <img style="z-index:  9;position: static;" class="shadow img_cer grid-item " src="{{ url('storage')}}/{{ $item->certificate_3 }}">
                </a>
                <a href="#img-photo-7" class="lightbox" id="photo-7">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate_3 }}')"></span>
                </a>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
<br><br>
@endsection