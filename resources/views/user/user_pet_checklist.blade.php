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
    }

    .lightbox {
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

    .chechlist {
        color: white;
        border: 5px;
        border-radius: 25px;
        z-index: 92;
    }

    .header-checklist {
        padding: 20px;
    }

    .content-checklist {
        padding: 0px 20px 10px 20px;
    }

    .pet-profile {
        padding-top: 20px;
    }

    .photo-pet {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
    }

    .photo-qrcode {
        width: 50px;
        height: 50px;
        border-radius: 10%;
    }

    .icon-checklist {
        padding: 10px;
        border-radius: 50%;
        color: white;
        font-size: 18px;
    }

    .text-checklist {
        font-family: 'Kanit', sans-serif;
        color: black;
        margin-left: 10px;
        font-size: 18px;
        font-weight: 600;
    }

    .text-header-checklist {
        font-family: 'Kanit', sans-serif;
        color: black;
        margin-left: 10px;
        font-size: 18px;
        font-weight: 600;
        display: flex;
        flex-direction: row;
        padding-bottom: 15px;
    }

    .text-header-checklist:before,
    .text-header-checklist:after {
        content: "";
        flex: 1 1;
        border-bottom: 2px solid #e9e9e9;
        margin: auto;
        padding-left: 10px;
    }

    .text-header-checklist:before {
        margin-right: 20px
    }

    .text-header-checklist:after {
        margin-left: 20px
    }

    .check {
        border-left: 2px solid #e9e9e9;
        padding: 0px 20px 10px 30px;
        color: black;
        margin: 10px 0px 10px 35px;
    }
</style>

<div class="container">
    <div class="shadow chechlist col-12 col-lg-4">
        @foreach($user as $key)
            @foreach($petuser as $item)
                <div class="d-flex justify-content-end" style="padding-top:10px;margin-bottom:-70px;">
                    <a href="#photo-qr_code">
                        <img class="photo-qrcode" src="{{ url('storage')}}/{{ $item->qr_code_checklist }}" alt="">
                    </a>
                    <a href="#img-photo-qr_code" class="lightbox" id="photo-qr_code">
                        <span style="background-image: url('{{ url('storage')}}/{{ $item->qr_code_checklist }}')"></span>
                    </a>

                </div>
                <div class="pet-profile">
                    <div class="row">
                        <div class="col-4" style="padding:0px 10px;">
                            <img class="photo-pet" style="margin-top:10px" src="{{ url('storage')}}/{{ $item->photo }}" alt="">
                        </div>
                        <div class="col " style="padding:0px;margin-top:30px;">
                            <span class="text-checklist" style="font-size: 27px;line-height: 0.5;">{{$item->name}}</span><br>
                            <span class="text-checklist">เจ้าของ : {{$key->profile->name}}</span>
                        </div>
                        

                    </div>

                </div>
            @endforeach
            <div class="header-checklist">
                <h4>Check List</h4>
            </div>
            <div class="text-center">
                <span class="text-header-checklist">เอกสารเจ้าของ</span>
            </div>

            <div class="content-checklist">
                @if(!empty($key->profile->photo_id_card))
                <a href="#photo-id_card">
                    <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
                    <span class="text-checklist">บัตรประชาชน</span>
                    <i class="fa-light fa-eye" style="color:blue;"></i>
                </a>
                <a href="#img-photo-id_card" class="lightbox" id="photo-id_card">
                    <span style="background-image: url('{{ url('storage')}}/{{ $key->profile->photo_id_card }}')"></span>
                </a>
                @else
                <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
                <span class="text-checklist">บัตรประชาชน</span>
                @endif
            </div>
            <div class="content-checklist">
                @if(!empty($key->profile->photo_passport))
                <a href="#photo-passport">
                    <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
                    <span class="text-checklist">พาสปอร์ต</span> <i class="fa-light fa-eye" style="color:blue;"></i>
                </a>
                <a href="#img-photo-passport" class="lightbox" id="photo-passport">
                    <span style="background-image: url('{{ url('storage')}}/{{ $key->profile->photo_passport }}')"></span>
                </a>
                @else
                <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
                <span class="text-checklist">พาสปอร์ต</span>
                @endif
            </div>
        @endforeach
        <div class="text-center">
            <div class="row"></div>
            <span class="text-header-checklist">เอกสารสัตว์เลี้ยง</span>
        </div>

        <div class="content-checklist">
            @if($birth_month >= 2 )
                <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
                <span class="text-checklist">อายุ</span>
                <span class="text-checklist">
                    @if($birth_year != '0' )
                    {{$birth_year}} ขวบ
                    @endif
                    @if($birth_month != '0' )
                    {{$birth_month}} เดือน
                    @endif
                </span>
            @else
                <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
                <span class="text-checklist">อายุ</span>
                <span class="text-checklist" style="color:red;">
                    {{$birth_day}} วัน
            @endif
            </span>
        </div>

        <div class="content-checklist">
            @if(!empty($item->photo_medical_certificate))
            <a href="#photo-medical_certificate">
                <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
                <span class="text-checklist">ใบรับรองแพทย์</span> <i class="fa-light fa-eye" style="color:blue;"></i>
            </a>
            <a href="#img-photo-medical_certificate" class="lightbox" id="photo-medical_certificate">
                <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_medical_certificate }}')"></span>
            </a>
            @else
            <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
            <span class="text-checklist">
                ใบรับรองแพทย์
            </span>
            @endif
        </div>
        <div class="content-checklist">
            <i class="icon-checklist fa-light fa-syringe bg-secondary" style="padding:10px 11px 10px 11px;"></i>
            <span class="text-checklist">วัคซีน</span>
        </div>
        <div class="check">

            <div class="row" style="margin-bottom: 10px;">
                @if((strtotime($item->date_next_rabies) - strtotime($now))/ ( 60 * 60 * 24 ) <= 0) <div class="col-2 d-flex align-items-center">
                    <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
            </div>
            <div class="col">
                <span class="text-checklist">
                    วัคซีนพิษสุนัขบ้า
                    @if(!empty($item->photo_vaccine))
                    <a href="#photo-vaccine">
                        <i class="fa-light fa-eye" style="color:blue;"></i>
                    </a>
                    <a href="#img-photo-vaccine" class="lightbox" id="photo-vaccine">
                        <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine }}')"></span>
                    </a>
                    @else
                    <i class="fa-light fa-eye-slash text-danger"></i>
                    @endif
                </span>
                <br>
                @if(!empty($item->date_next_rabies))
                <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งล่าสุด : {{ thaidate("j/m/Y" , strtotime($item->date_vaccine_rabies)) }}</span><br>
                <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งถัดไป : {{ thaidate("j/m/Y" , strtotime($item->date_next_rabies)) }}</span>
                @else
                <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ไม่มีข้อมูล</span>
                @endif
            </div>
            @else
            <div class="col-2 d-flex align-items-center">
                <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
            </div>
            <div class="col">
                <span class="text-checklist">
                    วัคซีนพิษสุนัขบ้า
                    @if(!empty($item->photo_vaccine))
                    <a href="#photo-vaccine">
                        <i class="fa-light fa-eye" style="color:blue;"></i>
                    </a>
                    <a href="#img-photo-vaccine" class="lightbox" id="photo-vaccine">
                        <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine }}')"></span>
                    </a>
                    @else
                    <i class="fa-light fa-eye-slash text-danger"></i>
                    @endif
                </span>
                <br>
                <span class="text-success" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งล่าสุด : {{ thaidate("j/m/Y" , strtotime($item->date_vaccine_rabies)) }}</span><br>
                <span class="text-success" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งถัดไป : {{ thaidate("j/m/Y" , strtotime($item->date_next_rabies)) }}</span>
            </div>
            @endif
        </div>



        <div class="row" style="margin-bottom: 10px;">
            @if((strtotime($item->date_next_flea) - strtotime($now))/ ( 60 * 60 * 24 ) <= 0) <div class="col-2 d-flex align-items-center">
                <i class="icon-checklist fa-solid fa-exclamation" style="border:#F9371C 1px solid;color:#F9371C;background-color: #FFE8EA;padding:10px 18px 10px 18px;font-weight: 1000;"></i>
        </div>
        <div class="col">
            <span class="text-checklist">
                วัคซีนเห็บหมัด
                @if(!empty($item->photo_vaccine_2))
                <a href="#photo-vaccine_2">
                    <i class="fa-light fa-eye" style="color:blue;"></i>
                </a>
                <a href="#img-photo-vaccine_2" class="lightbox" id="photo-vaccine_2">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine_2 }}')"></span>
                </a>
                @else
                <i class="fa-light fa-eye-slash text-danger"></i>
                @endif
            </span>
            <br>
            @if(!empty($item->date_next_flea))
            <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งล่าสุด : {{ thaidate("j/m/Y" , strtotime($item->date_vaccine_flea)) }}</span><br>
            <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งถัดไป : {{ thaidate("j/m/Y" , strtotime($item->date_next_flea)) }}</span>
            @else
            <span class="text-danger" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ไม่มีข้อมูล</span>
            @endif
        </div>
        @else
        <div class="col-2 d-flex align-items-center">
            <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
        </div>
        <div class="col">
            <span class="text-checklist">
                วัคซีนเห็บหมัด
                @if(!empty($item->photo_vaccine_2))
                <a href="#photo-vaccine_2">
                    <i class="fa-light fa-eye" style="color:blue;"></i>
                </a>
                <a href="#img-photo-vaccine_2" class="lightbox" id="photo-vaccine_2">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine_2 }}')"></span>
                </a>
                @else
                <i class="fa-light fa-eye-slash text-danger"></i>
                @endif
            </span>
            <br>
            <span class="text-success" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งล่าสุด : {{ thaidate("j/m/Y" , strtotime($item->date_next_flea)) }}</span><br>
            <span class="text-success" style="margin-left:10px;font-family: 'Kanit', sans-serif;">ครั้งถัดไป : {{ thaidate("j/m/Y" , strtotime($item->date_next_flea)) }}</span>
        </div>
        @endif
    </div>
    <div class="row">
        @if(!empty($item->photo_vaccine_3))
        <div class="col-2" style="margin-top: 2px;">
            <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
        </div>
        <div class="col" style="margin-top:10px;">
            <span class="text-checklist">
                วัคซีนอื่นๆ
                <a href="#photo-vaccine_3">
                    <i class="fa-light fa-eye" style="color:blue;"></i>
                </a>
                <a href="#img-photo-vaccine_3" class="lightbox" id="photo-vaccine_3">
                    <span style="background-image: url('{{ url('storage')}}/{{ $item->photo_vaccine_3 }}')"></span>
                </a>

            </span>
        </div>
        @endif
    </div>
</div>

@if(!empty($item->certificate))
<div class="content-checklist">
    <i class="icon-checklist fa-light fa-file-certificate bg-secondary" style="padding:10px 11px 10px 11px;"></i>
    <span class="text-checklist">เอกสารอื่นๆ</span>
</div>
<div class="check">
    <a href="#certificate">
        <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;"></i>
        @if(!empty($item->name_certificate))
        <span class="text-checklist">{{$item->name_certificate}}</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @else
        <span class="text-checklist">เอกสาร 1</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @endif
    </a>
    <a href="#img-photo-certificate" class="lightbox" id="certificate">
        <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate }}')"></span>
    </a>

    @if(!empty($item->certificate_2))
    <br>
    <a href="#certificate_2">
        <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;margin-top:10px;"></i>
        @if(!empty($item->name_certificate_2))
        <span class="text-checklist">{{$item->name_certificate_2}}</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @else
        <span class="text-checklist">เอกสาร 2</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @endif
    </a>
    <a href="#img-photo-certificate_2" class="lightbox" id="certificate_2">
        <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate_2 }}')"></span>
    </a>
    @endif

    @if(!empty($item->certificate_3))
    <br>
    <a href="#certificate_3">
        <i class="icon-checklist fa-solid fa-check" style="border:#2FC8AC 1px solid;color:#2FC8AC;background-color: #E6F9F5;padding:10px 12px 10px 12px;font-weight: 1000;margin-top:10px;"></i>
        @if(!empty($item->name_certificate_3))
        <span class="text-checklist">{{$item->name_certificate_3}}</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @else
        <span class="text-checklist">เอกสาร 3</span> <i class="fa-light fa-eye" style="color:blue;"></i>
        @endif
    </a>
    <a href="#img-photo-certificate_3" class="lightbox" id="certificate_3">
        <span style="background-image: url('{{ url('storage')}}/{{ $item->certificate_3 }}')"></span>
    </a>
    @endif
</div>
@endif
<br>
</div>
<!-- </div> -->

</div>
<br><br>
@endsection