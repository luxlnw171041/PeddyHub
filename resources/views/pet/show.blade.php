@extends('layouts.peddyhub')

@section('content')
<style>
    .parent {
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
        margin-left: -68px;
        margin-top: 50px;
        margin-bottom: 50px;
    }
</style>
<div id="card_pet" class="container rotatea card-pet d-flex justify-content-center">
    <div id="htmltoimage" class="card col-lg-5 col-12 " style="border: 2px solid #B8205B;padding:2px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
        <div class="card-body" style="padding:5px;">
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
                    <p style="font-size: 21px;margin:0px;">
                        บัตรประจำตัว {{ $pet->pet_category->name}}
                    </p>

                    <div class="row" style="margin-left:2px;">
                        <div class="col-6" style="font-size: 12px;padding: 0px;margin-top:-10px;">
                            <span> <b> เลขประจำตัว{{ $pet->pet_category->name}}</b></span><br>
                            <span style="color:#B8205B"> <b> indentification Number</b></span>
                        </div>
                        <div class="col-6" style="padding: 0px;margin-top:-7px;">
                            <span> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-3 ">
                    <img style="float: right;" src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" width="80%" alt="">
                </div>
                <div class="col-12">
                    <div style="font-size: 12px;">
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

                    <div class="parent">
                        <div class="div1 text-center">
                            <a href="{{ url('/user_pet/' . $pet->user_id) }}">
                                <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt="">
                            </a>
                            <!-- <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt=""> -->
                        </div>
                        <div class="div2">
                            <span style="font-size: 12px;"> <b> เกิดวันที่ </b></span> <span> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;color:#B8205B"> <b> Date Of Birth </b></span> <span style="color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;"> <b> เบอร์ </b></span> <span> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span>
                        </div>
                        <div class="div3 d-flex align-items-end">
                            <img src="{{ url('storage/'.$pet->photo )}}" width="100%" alt="image of pet" title="pet" class="fluid customer">
                        </div>
                        <div class="div4" style="margin-bottom:15px;">
                            <span style="font-size: 14px;"> <b> ที่อยู่</b></span> <span style="font-size: 14px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                        </div>
                        <div class="div5">
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;"> <b>วันออกบัตร</b></p>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>Date of Issue</b></p>
                        </div>
                        <div class="div6 text-center ">
                            @if(!empty($pet->profile->real_name))
                            <p style="font-size: 13px; line-height: 0.5;margin:21px 0px 0px 0px;"> <b>({{ $pet->profile->real_name }})</b></p>
                            @else
                            <p style="font-size: 13px; margin:21px 0px 0px 0px;"> <b>({{ $pet->profile->name }})</b></p>
                            @endif
                            <p style="font-size: 13px;line-height: 0.5;margin:0px;color:#B8205B"> <b>เจ้าของ</b></p>
                        </div>
                        <div class="div7 text-center">
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>ตลอดชีพ</b></p>
                            <p style="font-size: 13px;margin:0px;"> <b>วันบัตรหมดอายุ</b></p>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b>Lift Time</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>Date of Expiry</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container d-flex justify-content-center">
<button onclick="downloadimage()" class="btn btn-success">Download</button>
</div>
<br><br>
<script>
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        document.querySelector('#card_pet').classList.add('rotatea');
        document.querySelector('#card_pet').classList.add('card-pet');
        console.log("mobile device");
    } else {
        document.querySelector('#card_pet').classList.remove('rotatea');
        document.querySelector('#card_pet').classList.remove('card-pet');
    }
</script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script type="text/javascript">
    function downloadimage() {
        //var container = document.getElementById("image-wrap"); //specific element on page
        var container = document.getElementById("htmltoimage");; // full page 
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
@endsection