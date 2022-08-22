@extends('layouts.peddyhub')

@section('content')
<meta property="og:title" content="{{$pet->name}}" />
<meta property="og:description" content="YOUR DESCRIPTION HERE" />
<meta property="og:image" content="{{ url('storage/'.$pet->photo )}}" />
<style>
    .parent-card {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-template-rows: repeat(3, 0.5fr);
        grid-column-gap: 0px;
        grid-row-gap: 0px;
    }

    .div1 {
        grid-area: 1 / 1 / 2 / 2;
    }

    .div2 {
        grid-area: 1 / 2 / 2 / 4;
    }

    .div3 {
        grid-area: 1 / 4 / 4 / 5;
    }

    .div4 {
        grid-area: 2 / 1 / 3 / 4;
    }

    .div5 {
        grid-area: 3 / 1 / 4 / 2;
    }

    .div6 {
        grid-area: 3 / 2 / 4 / 3;
    }

    .div7 {
        grid-area: 3 / 3 / 4 / 4;
    }

    .rotatea {
        display: block;
        transform: rotate(-270deg);
        width: 500px;
    }

    .card-pet {
        margin-left: -60px;
        margin-top: 50px;
        margin-bottom: 50px;
    }

    .margin-parent {
        margin-bottom: -20px;
    }

    .margin-name {
        margin: 21px 0px 0px 0px !important;
    }
</style>
<div id="card_petswip{{$pet->id}}" class="container d-block d-md-none" width="500px" style="padding:5px;margin-top:100px;">
    <div id="htmltoimage_mobile" class="card col-lg-12 col-12 " style="border: 2px solid #B8205B;padding:2px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
        <div class="card-body" style="padding:5px;">
            <div class="row">
                <div class="col-2 text-center d-flex align-items-center" style="padding-right:0px;">
                    @php
                    $pet_category = $pet->pet_category_id ;
                    @endphp
                    @switch( $pet_category )
                    @case (1)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/dog-1.png') }}" alt="">
                    @break
                    @case (2)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/cat-1.png') }}" alt="">
                    @break
                    @case (3)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/bird-1.png') }}" alt="">
                    @break
                    @case (4)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/fish-1.png') }}" alt="">
                    @break
                    @case (5)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/rabbit-1.png') }}" alt="">
                    @break
                    @case (6)
                    <img id="icon_pet" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/spider-1.png') }}" alt="">
                    @break
                    @endswitch
                </div>
                <div class="col-7" style="padding-left: 2px;">
                    <p style="font-size: 21px;margin:0px;font-family: 'Kanit', sans-serif;">
                        บัตรประจำตัว {{ $pet->pet_category->name}}
                    </p>

                    <div class="row" style="margin-left:2px;">
                        <div class="col-6" style="font-size: 12px;padding: 0px;margin-top:-10px;font-family: 'Kanit', sans-serif;">
                            <span> <b> เลขประจำตัว{{ $pet->pet_category->name}}</b></span><br>
                            <span style="color:#B8205B"> <b> indentification </b></span>
                        </div>
                        <div class="col-6" style="padding: 0px;margin-top:-7px;font-family: 'Kanit', sans-serif;">
                            <span style="font-size: 11px;" id="text_numberswip{{$pet->id}}"> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <img style="float: right;" src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" width="80%" alt="">
                </div>
                <div class="col-12">
                    <div style="font-size: 12px;font-family: 'Kanit', sans-serif;">
                        <span> <b> ชื่อตัวและชื่อสกุล</b></span>
                        <span style="font-size:20px;">
                            <b>
                                @switch( $pet->gender )
                                @case ("ชาย")
                                เด็กชาย
                                @break
                                @case ("หญิง")
                                เด็กหญิง
                                @break
                                @endswitch
                                {{$pet->name}}
                            </b>
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="parent-card">
                        <div class="div1 text-center">
                            <a href="{{ url('/user_pet/' . $pet->id) }}">
                                <img style="position:relative ;" width="80px" src="{{ url('storage/'.$pet->qr_code )}}" alt="">
                            </a>
                        </div>
                        <div class="div2" style="font-family: 'Kanit', sans-serif;">
                            <span style="font-size: 13px;"> <b> เกิดวันที่ </b></span> <span style="font-size:14px"> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 13px;color:#B8205B"> <b> Birth </b></span> <span style="color:#B8205B; font-size:14px"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 13px;"> <b> เบอร์ </b></span> <span style="font-size:14px"> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span>
                            @if(!empty($item->blood_type))
                            <br>
                            <span style="font-size: 13px;"> <b> กรุ๊ปเลือด </b></span> <span style="font-size:14px"> <b> {{ $pet->blood_type  }} </b></span>
                            @endif
                        </div>
                        <div class="div3 d-flex align-items-end">
                            <img src="{{ url('storage/'.$pet->photo )}}" style="border: 2px solid #B8205B;border-radius: 7px;" width="100%" alt="image of pet" title="pet" class="fluid customer">
                        </div>
                        <div class="div4" style="margin-bottom:15px;font-family: 'Kanit', sans-serif;">
                            <span style="font-size: 14px;"> <b> ที่อยู่</b></span> <span style="font-size: 14px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                        </div>
                        <div class="div5">
                            <p id="text_btswip{{$pet->id}}" style="font-family: 'Kanit', sans-serif;font-size: 11px; line-height: 0.5;margin:0px;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p id="text_vswip{{$pet->id}}" style="font-family: 'Kanit', sans-serif;font-size: 11px;margin:0px;"> <b>วันออกบัตร</b></p>
                            <p id="text_beswip{{$pet->id}}" class="notranslate" style="font-family: 'Kanit', sans-serif;font-size: 11px;margin:0px;line-height: 0.5;color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p id="text_doiswip{{$pet->id}}" class="notranslate" style="font-family: 'Kanit', sans-serif;font-size: 11px;margin:0px;color:#B8205B"> <b>Date of Issue</b></p>
                        </div>
                        <div class="div6 text-center ">
                            <br>
                            @if(!empty($pet->profile->real_name))
                            <p style="font-size: 11px; line-height: 0.5;margin:0px;font-family: 'Kanit', sans-serif;" class="notranslate"> <b>({{ $pet->profile->real_name }})</b></p>
                            @else
                            <p style="font-size: 11px; line-height: 0.5;margin:0px;font-family: 'Kanit', sans-serif;" class="notranslate"> <b>({{ $pet->profile->name }})</b></p>
                            @endif
                            <p id="text_jswip{{$pet->id}}" style="font-size: 11px;margin:0px;color:#B8205B;font-family: 'Kanit', sans-serif;"> <b>เจ้าของ</b></p>
                        </div>
                        <div class="div7 text-center text-card">
                            <p id="text_tswip{{$pet->id}}" style="font-family: 'Kanit', sans-serif;font-size: 11px; line-height: 0.5;margin:0px;"> <b>ตลอดชีพ</b></p>
                            <p id="text_wswip{{$pet->id}}" style="font-family: 'Kanit', sans-serif;font-size: 10px;margin:0px;"> <b>วันหมดอายุ</b></p>
                            <p id="text_lswip{{$pet->id}}" class="notranslate" style="font-family: 'Kanit', sans-serif;font-size: 11px;margin:0px;line-height: 0.5;color:#B8205B"> <b>Life Time</b></p>
                            <p id="text_dswip{{$pet->id}}" class="notranslate" style="font-family: 'Kanit', sans-serif;font-size: 11px;margin:0px;color:#B8205B"> <b>EXP</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center owl-carousel-pet-card" style="margin-top:-10px;font-family: 'Kanit', sans-serif;padding-top: 20px;">
                powered by
                    <div class="owl-carousel">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->inRandomOrder()->get()
                        @endphp
                        @foreach($partner as $item)
                            <div class="item" style="padding-top:5px;">
                                <div class="testimon">
                                    <a href="{{$item->link}}" target="bank">
                                        <img class="p-md-3 p-lg-3" style="width: 80%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="card_pet" class="container rotatea card-pet d-flex justify-content-center">
    <div id="htmltoimage" class="d-none d-lg-block card col-lg-5 col-12 " style="border: 2px solid #B8205B;padding:10px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
        <div class="card-body" style="padding:0px;">
            <div class="row">
                <div class="col-2 text-center d-flex align-items-center">
                    @php
                    $pet_category = $pet->pet_category_id ;
                    @endphp
                    @switch( $pet_category )
                    @case (1)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/dog-1.png') }}" alt="">

                    <!-- <i class="fas fa-dog" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid #B8205B;padding:10px;"></i> -->
                    @break
                    @case (2)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/cat-1.png') }}" alt="">

                    <!-- <i class="fas fa-cat " style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i> -->
                    @break
                    @case (3)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/bird-1.png') }}" alt="">

                    <!-- <i class="fas fa-dove" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i> -->
                    @break
                    @case (4)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/fish-1.png') }}" alt="">

                    <!-- <i class="fas fa-fish" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i> -->
                    @break
                    @case (5)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/rabbit-1.png') }}" alt="">

                    <!-- <i class="fas fa-rabbit" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i> -->
                    @break
                    @case (6)
                    <img style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;" src="{{ asset('/peddyhub/images/img-icon/spider-1.png') }}" alt="">
                    @break
                    @endswitch
                </div>
                <div class="col-7" style="padding-left: 2px;">
                    <p style="font-size: 21px;margin:0px;font-family: 'Kanit', sans-serif;">
                        บัตรประจำตัว {{ $pet->pet_category->name}}
                    </p>

                    <div class="row" style="margin-left:2px;">
                        <div class="col-6" style="font-size: 12px;padding: 0px;margin-top:-10px;font-family: 'Kanit', sans-serif;">
                            <span> <b> เลขประจำตัว{{ $pet->pet_category->name}}</b></span><br>
                            <span style="color:#B8205B" class="notranslate"> <b> indentification Number</b></span>
                        </div>
                        <div class="col-6" style="padding: 0px;margin-top:-7px;font-family: 'Kanit', sans-serif;">
                            <span> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <img style="float: right;" src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" width="80%" alt="">
                </div>
                <div class="col-12">
                    <div style="font-size: 12px;font-family: 'Kanit', sans-serif;">
                        <span> <b> ชื่อตัวและชื่อสกุล</b></span>
                        <span style="font-size:20px;">
                            <b>
                                @switch( $pet->gender )
                                @case ("ชาย")
                                สุดหล่อ
                                @break
                                @case ("หญิง")
                                สุดสวย
                                @break
                                @endswitch
                                {{$pet->name}}
                            </b>
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="parent-card" id="parent">
                        <div class="div1 text-center">
                            <a href="{{ url('/user_pet/' . $pet->id) }}">
                                <img style="position:relative ;" width="80px" src="{{ url('storage/'.$pet->qr_code )}}" alt="">
                                
                            </a>
                            <!-- <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt=""> -->
                        </div>
                        <div class="div2">
                            <div id="birth_th">
                                <span style="font-size: 12px;font-family: 'Kanit', sans-serif;"> <b> เกิดวันที่ </b></span> <span> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            </div>
                            <span style="font-size: 12px;color:#B8205B;font-family: 'Kanit', sans-serif;" class="notranslate"> <b> Date Of Birth </b></span> <span style="color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <p style="margin: 0;"><span style="font-size: 12px;font-family: 'Kanit', sans-serif;"> <b> เบอร์ </b></span> <span> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span></p>
                        </div>
                        <div class="div3 d-flex align-items-end">
                            <img src="{{ url('storage/'.$pet->photo )}}" style="border: 2px solid #B8205B;border-radius: 7px; margin-bottom:10px" width="100%" alt="image of pet" title="pet" class="fluid customer">
                        </div>
                        <div class="div4" style="margin-bottom:15px;font-family: 'Kanit', sans-serif;">
                            <span style="font-size: 14px;font-family: 'Kanit', sans-serif;"> <b> ที่อยู่</b></span> <span style="font-size: 14px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                        </div>
                        <div class="div5" style="font-family: 'Kanit', sans-serif;">
                            <div id="create_th">
                                <p style="font-size: 13px; line-height: 0.5;margin:0px;font-family: 'Kanit', sans-serif;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                                <p style="font-size: 13px;margin:0px;font-family: 'Kanit', sans-serif;"> <b>วันออกบัตร</b></p>
                            </div>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B" class="notranslate"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B" class="notranslate"> <b>Date of Issue</b></p>
                        </div>
                        <div class="div6 text-center ">
                            @if(!empty($pet->profile->real_name))
                            <p id="real_name" style="font-size: 13px; margin:0px ;font-family: 'Kanit', sans-serif;" class="notranslate margin-name"> <b>({{ $pet->profile->real_name }})</b></p>
                            @else
                            <p id="name" style="font-size: 13px;margin:0px;font-family: 'Kanit', sans-serif;" class="notranslate  margin-name"> <b>({{ $pet->profile->name }})</b></p>
                            @endif
                            <p style="font-size: 13px;line-height: 0.5;margin:0px;color:#B8205B;font-family: 'Kanit', sans-serif;"> <b id="owner_th">เจ้าของ /</b> <b class="notranslate"> owner</b></p>
                        </div>
                        <div class="div7 text-center">
                            <div id="expiry-th">
                                <p style="font-size: 13px; line-height: 0.5;margin:0px;font-family: 'Kanit', sans-serif;"> <b>ตลอดชีพ</b></p>
                                <p style="font-size: 13px;margin:0px;font-family: 'Kanit', sans-serif;"> <b>วันบัตรหมดอายุ</b></p>
                            </div>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b class="notranslate">Life Time</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b class="notranslate">EXP</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center owl-carousel-pet-card d-none d-lg-block" style="margin-top:-10px;font-family: 'Kanit', sans-serif;padding-top: 20px;">
                    powered by
                    <div class="owl-carousel ">
                        @foreach($partner as $item)
                            <div class="item" style="padding-top:5px;">
                                <div class="testimon">
                                    <a class="d-flex justify-content-center" href="{{$item->link}}" target="bank">
                                        <img class="" style="width: 50%;object-fit: contain;max-height: 112px;"width="50%" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>
<center>
    <div class="d-block d-md-none">
        <div class="row ">
            <div class="col ">
                <button id="btn_swip" onclick="swipside();namebtn();" style="border-radius: 25px;font-family: 'Kanit', sans-serif;" class="text-center btn btn-success ">แนวตั้ง</button>
            </div>
            <div class="col" id="btn_download">
                <button  onclick="downloadimage_mobile()" style="border-radius: 25px;font-family: 'Kanit', sans-serif;" class="btn btn-success">Download</button>
            </div>
        </div>
    </div>
    
    <div class="row d-none d-lg-block">
        <div class="col ">
            <button  onclick="downloadimage()" style="border-radius: 25px;font-family: 'Kanit', sans-serif;" class="btn btn-success">Download</button>
        </div>
    </div>
</center>
<br>
@if(Auth::user())
<input class="form-control d-none" name="language" type="text" id="language" value="{{Auth::user()->profile->language}}">
@endif

<div id="fb-root"></div>
<script>
    function swipside() {
        document.getElementById("htmltoimage").classList.toggle('d-none');
        document.getElementById("htmltoimage_mobile").classList.toggle('d-none');
    }
</script>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
    var language = document.getElementById("language").value;
    if (language === "en") {
        document.querySelector('#birth_th').classList.add('d-none');
        document.querySelector('#create_th').classList.add('d-none');
        document.querySelector('#owner_th').classList.add('d-none');
        document.querySelector('#expiry-th').classList.add('d-none');
        document.querySelector('#real_name').classList.remove('margin-name');
        document.querySelector('#name').classList.remove('margin-name');

    }
</script>
<script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.querySelector('#card_pet').classList.add('d-none');
        document.querySelector('#card_pet').classList.add('rotatea');
        document.querySelector('#card_pet').classList.add('card-pet');
        document.querySelector('#parent').classList.add('margin-parent');

    } else {
        document.querySelector('#card_pet').classList.remove('rotatea');
        document.querySelector('#card_pet').classList.remove('card-pet');
        document.querySelector('#parent').classList.remove('margin-parent');
    }
</script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script type="text/javascript">
    function downloadimage() {
        //var container = document.getElementById("image-wrap"); //specific element on page
        var container = document.getElementById("htmltoimage"); // full page 
        html2canvas(container, {
            allowTaint: true
        }).then(function(canvas) {

            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "บัตรประจำตัว{{$pet->name}}.png";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        });
    }
</script>
<script type="text/javascript">
    function downloadimage_mobile() {
        //var container = document.getElementById("image-wrap"); //specific element on page
        var container = document.getElementById("htmltoimage_mobile"); // full page 
        html2canvas(container, {
            allowTaint: true
        }).then(function(canvas) {

            var link = document.createElement("a");
            document.body.appendChild(link);
            link.download = "บัตรประจำตัว{{$pet->name}}.png";
            link.href = canvas.toDataURL();
            link.target = '_blank';
            link.click();
        });
    }
</script>
<script>
    function namebtn() {
        var x = document.getElementById("btn_swip");
        if (x.innerHTML === "แนวตั้ง") {
            x.innerHTML = "แนวนอน";
            document.getElementById("btn_download").classList.add('d-none');

        } else {
            x.innerHTML = "แนวตั้ง";
            document.getElementById("btn_download").classList.remove('d-none');
        }
    }
</script>
@endsection