@extends('layouts.peddyhub')

@section('content')

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<meta property="og:title" content="{{$pet->name}}" />
<meta property="og:description" content="YOUR DESCRIPTION HERE" />
<meta property="og:image" content="{{ url('storage/'.$pet->photo )}}" />
<style>
    
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

  .pet-card{
        position: relative;
        padding: auto;
        width: min(100% - 2rem , 500px);
    }
    .pet-card .on-img{
    position: absolute;
    transform: translate(-50%,-50%);
    margin: 0;
    padding: 0;
    color: black;
    font-weight: bold;
    font-family: 'Kanit', sans-serif;
    /* border: #B8205B 1px solid; */
    
    white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;    
    }
    .pet-card .icon-pet{
        width: 13%;
        border: black solid 1px;
        border-radius: 50%;
        padding: 2%;
        top:14%;
        left: 11%;
    }
    .pet-card .card-category{
        
        top:10%;
        left: 48%;
        width: 55%;
        text-align-last: left;
        font-size: 1.5vw;
    }.th-number-category{
        top:15%;
        left: 35.5%;
        width: 30%;
        text-align-last: left;
        font-size:0.85vw;
    }
    .en-number-category{
        top:20%;
        left: 35.5%;
        width: 30%;
        text-align-last: left;
        font-size:0.85vw;
    }
    .id-pet{
        top:17.5%;
        left: 71%;
        width: 40%;
        text-align-last: left;
        font-size:1.2vw;
    }
    .name-pet{
        top:30%;
        left: 50%;
        width: 90%;
        text-align-last: left;
        font-size:0.9vw;
    }
    .pet-name{
        font-size:1.5vw;
    }
    .pet-qr{
        top:45%;
        left: 17%;
        width: 17%;
    }
    
    .owl-nav{
        display: none;
    }
    .partner{
        bottom: -6%;
        left:50%;
        width:90%;
        
    }

    @media only screen and (min-width: 0px) and (max-width: 435px) {
        .pet-card .card-category{
            font-size:5vw;
        }
        .id-pet ,.pet-name{
            font-size:4vw;
        }.power , .card-section-1 , .card-section-2,.card-section-3,.card-section-4 ,
        .th-number-category ,.en-number-category ,.pet-card .address ,.name-pet,.pet-card .phone,.pet-card .eng-birth,.pet-card .birth-pet ,.pet-card .eng-birth span,.pet-card .birth-pet span ,.pet-card .phone span{
            font-size:2vw;

        } 
    }   
    @media only screen and (min-width: 436px) and (max-width: 991px) {
        .pet-card .card-category{
            font-size:2.5vw!important;

        }
        .th-number-category ,.en-number-category ,.pet-card .address ,.name-pet,.pet-card .phone,.pet-card .eng-birth,.pet-card .birth-pet ,.pet-card .eng-birth span,.pet-card .birth-pet span ,.pet-card .phone span{
            font-size:2vw;

        } 
        .id-pet ,.pet-name{
            font-size:3vw;
        }
    }
    .birth-pet{
        top:38%;
        left: 50%;
        width: 45%;
        text-align-last: left;
        font-size:0.9vw;
    }
    .birth-pet span{
        font-size:1.2vw;
    }.eng-birth{
        top:45%;
        left: 50%;
        width: 45%;
        text-align-last: left;
        font-size:0.9vw;
        color:#B8205B!important;

    }.eng-birth span{
        font-size:1.2vw;
        color:#B8205B!important;

    }.phone{
        top:52%;
        left: 50%;
        width: 45%;
        text-align-last: left;
        font-size:0.9vw;
    }.phone span{
        font-size:1.2vw;

    }.address{
        top:60%;
        left: 38.7%;
        width: 68%;
        text-align-last: left;
        font-size:0.9vw;
    }.img-pet{
        width: 22%;
        height: 35%;
        top: 62%;
        border-radius: 1vw;
        left: 85%;
        border: #B8205B 2px solid;
        align-items: end;
        object-fit: cover;
    }.power{
        font-size:0.9vw;
    }
    .logo-card-pet{
        width: 20%;
        top: 5%;
        right: -5%;
    }

    .card-section-1{
        top:66.5%;
        width: 18%;
        font-size:0.9vw;
        text-align-last: left;
    }.card-section-2{
        top:70%;
        width: 18%;
        font-size:0.9vw;
        text-align-last: left;
    }.card-section-3{
        top:74%;
        width: 18%;
        font-size:0.9vw;
        text-align-last: left;
        color: #B8205B!important;

    }
    .card-section-4{
        top:78%;
        width: 18%;
        font-size:0.9vw;
        color: #B8205B!important;
        
        text-align-last: left;
    }

    .date-create{
        left: 14%;
    }.th-create{
        left: 14%;
    }.date-en-create{
        left: 14%;
        color: #B8205B!important;

    }
    .en-create{
        left: 14%;                    
        color: #B8205B!important;

    }.owner{
        left: 38.2%;
        width: 30%;
        text-align-last: center;
    }.th-owner{
        left: 38.2%;
        width: 30%;
        text-align-last: center;
        color: #B8205B!important;
    }.card-exp{
        left: 63%;
        text-align-last: right!important;
        
    }.test{
        position: relative!important;
    }


    .img-partner{
                position: absolute;
    transform: translate(-50%,-50%);
    margin: 0;
    padding: 0;
    color: black;
    font-weight: bold;
    font-family: 'Kanit', sans-serif;
    left: 50%;
    top:87.5%
            }
</style>
 @php
    $pet_category = $pet->pet_category_id ;
    $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->inRandomOrder()->get()

@endphp
    <center>
        <div class="pet-card " id="div-pet-card">
            <img src="{{ asset('/peddyhub/images/home_5/pet_id_card.png') }}" class="bg-card" alt="">
            <img class="logo-card-pet on-img"  src="{{ asset('/peddyhub/images/logo/logo-2.png') }}"  alt="">

            @switch( $pet_category )
                @case (1)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/dog-1.png') }}" alt="">  
                @break
                @case (2)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/cat-1.png') }}" alt="">  
                @break
                @case (3)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/bird-1.png') }}" alt="">  
                @break
                @case (4)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/fish-1.png') }}" alt="">  
                @break
                @case (5)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/rabbit-1.png') }}" alt="">  
                @break
                @case (6)
                    <img class="on-img icon-pet" src="{{ asset('/peddyhub/images/img-icon/spider-1.png') }}" alt="">  
                @break
            @endswitch
            <span class="on-img card-category">บัตรประจำตัว {{ $pet->pet_category->name}}</span>
            <span class="on-img th-number-category"> เลขประจำตัว{{ $pet->pet_category->name}}</span>
            <span class="on-img en-number-category" style="color:#B8205B"> indentification Number</span>
            <span class="on-img id-pet"> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</span>
            <span class="on-img name-pet">
                ชื่อตัวและชื่อสกุล 
                <!-- <span class="pet-name"> -->
                    @switch( $pet->gender )
                        @case ("ชาย")
                            สุดหล่อ
                        @break
                        @case ("หญิง")
                            สุดสวย
                        @break
                    @endswitch
                    {{$pet->name}}
                <!-- </span> -->
            </span>
            <a href="{{ url('/user_pet/' . $pet->id) }}">
                <img class="pet-qr on-img" src="{{ url('storage/'.$pet->qr_code )}}" alt="">
            </a>
            <span class="on-img birth-pet"> เกิดวันที่ {{ thaidate("j M Y" , strtotime($pet->birth)) }}
                <!-- <span>
                    {{ thaidate("j M Y" , strtotime($pet->birth)) }}
                </span> -->
            </span>

            <span class="on-img eng-birth"> Date Of Birth {{ date("j M Y" , strtotime($pet->birth)) }}
                <!-- <span>
                    {{ date("j M Y" , strtotime($pet->birth)) }}
                </span> -->
            </span>
            <span class="on-img phone"> เบอร์ {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }}
                <!-- <span>
                    {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }}
                </span> -->
            </span>
            <span class="on-img address"> ที่อยู่ {{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</span>
  
            <span class="on-img date-create card-section-1">{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</span>
            <span class="on-img th-create card-section-2">วันออกบัตร</span>
            <span class="on-img date-en-create card-section-3">{{ date("j M Y" , strtotime($pet->created_at)) }} </span>
            <span class="on-img en-create card-section-4">Date of Issue </span>


            <span class="on-img owner card-section-3">
                @if(!empty($pet->profile->real_name))
                    ({{ $pet->profile->real_name }})
                @else
                    ({{ $pet->profile->name }})
                @endif 
            </span>
            <span class="on-img th-owner card-section-4" >เจ้าของ</span>

            <span class="on-img card-exp card-section-1">ตลอดชีพ</span>
            <span class="on-img card-exp card-section-2">บัตรหมดอายุ</span>
            <span class="on-img card-exp card-section-3">Life Time</span>
            <span class="on-img card-exp card-section-4">EXP</span>
           
            <!-- <span class="exp on-img ">
                <div class="data-date">
                ตลอดชีพ <br>
                บัตรหมดอายุ <br>
                    <span>
                    Life Time <br>
                    EXP
                    </span>
                </div>
            </span> -->

            <img class="img-pet on-img" src="{{ url('storage/'.$pet->photo )}}" alt="image of pet" title="pet" class="fluid customer">

            <!-- <div class="wer col-12 text-center owl-carousel-pet-card notranslate" style="font-family: 'Kanit', sans-serif;">
            <span class="power">powered by</span>
                    <div class="owl-carousel">
                        @foreach($partner as $item)
                            <div class="item" >
                                <div class="testimon">
                                    <a href="{{$item->link}}" target="bank">
                                        <img class="p-md-3 p-lg-3" style="width: 80%;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div> -->
            <div class="img-partner partner owl-carousel-pet-card " >
                <span class="power">powered by</span>
                    <div class="owl-carousel">
                        @foreach($partner as $item)
                            <div class="item" >
                                    <a href="{{$item->link}}" target="bank">
                                        <img class="p-0 p-md-1 p-lg-2" style="width: 80%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                            </div>
                        @endforeach
                    </div>
                </div>
        </div>
        <div class="col mt-4">
            <button id="btn_swip" onclick="swipsidecard(); namebtnn();" style="margin-top:5%;border-radius: 10px;font-family: 'Kanit', sans-serif;" class="btn-md text-center btn btn-primary ">แนวตั้ง</button>
            <a href="#" style="margin-top:5%;border-radius: 10px;font-family: 'Kanit', sans-serif;" class="text-center btn btn-success btn-md " id="btnDownload">Download</a>
        </div>
    </center>
<br>
@if(Auth::user())
<input class="form-control d-none" name="language" type="text" id="language" value="{{Auth::user()->profile->language}}">
@endif

<div id="fb-root"></div>

<script>
    function swipsidecard() {
        document.getElementById("div-pet-card").classList.toggle('rotatea');
    }
    function namebtnn() {
        var x = document.getElementById("btn_swip");
        if (x.innerHTML === "แนวตั้ง") {
            x.innerHTML = "แนวนอน";

        } else {
            x.innerHTML = "แนวตั้ง";
        }
    }
</script>

<script>
  function download(url){
  var a = $("<a style='display:none' id='js-downloder'>")
  .attr("href", url)
  .attr("download", "test.png")
  .appendTo("body");

  a[0].click();

  a.remove();
}

function saveCapture(element) {
  html2canvas(element).then(function(canvas) {
    download(canvas.toDataURL("image/png"));
  })
}

$('#btnDownload').click(function(){
  var element = document.querySelector("#div-pet-card");
  saveCapture(element)
})
</script>
@endsection