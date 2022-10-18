
@extends('layouts.peddyhub')

@section('content')

<style>
    .btn-outline-peddyhub-call {
        position: relative;
        line-height: 29px;
        color: #28a745;
        font-size: 16px;
        font-weight: 700;
        border: none;
        background: none;
        font-size:18px;
    }

    .btn-outline-peddyhub-call:hover {
        background: #28a745;
        color: #ffffff;
    }
    .text-b-lost_pet {
        font-family: 'Mitr', sans-serif;
        font-size:16px;
    }
    .icon-menu-lost_pet{
        font-size:28px;
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
                        <div class="col-12 col-md-3 order-first order-md-2">
                            @if(Auth::check())
                                <a href="{{ url('/lost_pet/create') }}" style="margin-top:8px" class="btn main float-right" title="contact">
                                    <span style="">ประกาศหา</span>  
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ------------------------------- -->
    <div class="pet event">
        <div class="pet job">
            <section class="job">
                <div class="container">
                    <div class="row" >
                        <div class="col-12 mt-5 wow fadeInRight mb-2" >
                            <div class="d-block d-md-none">
                                <div class="row  ">
                                    <div class="col-6">
                                        <a href="{{ url('/lost_pet') }}"  type="button" class="btn-post-one btn-sm"> <b>โพสทั้งหมด</b> </a>
                                    </div>
                                    <div class="col-6" style="padding-left:0px;">
                                        <a href="{{ url('/my_post') }}" type="button" class="btn-post-two btn-sm "> <b>โพสของฉัน</b> </a>
                                    </div>
                                </div>
                            </div>    
                            <div class="d-none d-lg-block">
                                <a href="{{ url('/lost_pet') }}"  type="button" class="btn-post-one btn-sm"> <b>โพสทั้งหมด</b> </a href="{{ url('/lost_pet') }}">
                                <a href="{{ url('/my_post') }}" type="button" class="btn-post-two btn-sm"> <b>โพสของฉัน</b> </a href="{{ url('/lost_pet') }}">
                            </div>
                        </div>

                        <style>
                            .card-lost-pet{
                                border-radius: 20px;
                                background-color: #ffffff;
                                background-color: #4B4C4E;
                            }
                            .img-lost-pet{
                                border-radius: 20px;
                                height: 300px;
                                width: 100%;
                                object-fit: cover;
                            }
                            .about-lost-pet{
                            border-radius: 10px;
                            background-color: #fff;
                            align-items: center;
                            flex-direction:  column;
                            margin-top: -65px;
                            z-index: 99;
                            position: relative;

                            }
                            .about-lost-pet .name{
                                font-size: 17px;
                                font-family: 'Mitr', sans-serif;
                                font-weight: bold;

                            }
                            .about-lost-pet .location{
                                font-size: 15px;
                                font-family: 'Mitr', sans-serif;
                            }
                            .detail-lost-pet .text{
                                white-space: nowrap; 
                                width: 100%; 
                                overflow: hidden;
                                text-overflow: ellipsis; 
                                display: flex;
                                padding: 0 10px;
                            }
                            .container-lost-pet{
                                padding: 5px 5px 5px 5px;
                            }
                            .about-lost-pet .icon-gender{
                                position: absolute;
                                margin-left:39%;
                                margin-top:-10%;

                            }
                            .tag-found{
                                background-color: #25548F;
                                padding: 5px;
                                border-radius: 10px;
                                color: white;
                                font-family: 'Mitr', sans-serif;
                                font-size: 12px;
                                
                            }
                            .tag-lost{
                                background-color: #b8205b;
                                padding: 5px;
                                border-radius: 10px;
                                color: white;
                                font-family: 'Mitr', sans-serif;
                                font-size: 12px;
                                
                            }
                            .tag-js100{
                                background-color: #0A4424;
                                padding: 5px;
                                border-radius: 10px;
                                color: white;
                                font-family: 'Mitr', sans-serif;
                                font-size: 12px;
                                
                            }
                            .div-tag{
                                padding: 10px;
                                justify-content: space-between;
                                align-items: flex-start;
                                flex-direction:  row;
                                display: flex;
                            }
                            .unset-hover{
                                background-color: unset !important;
                                color: unset !important;
                            }
                            .card-lost-pet:hover{
                                transform: translateY(-10px)!important;
                                transition: 1s!important;
                            }
                            .btn-lost-pet{
                                background-color: #F6F6F6;
                                color: #828081;
                                padding: 10px;
                                border-radius: 50%;
                                font-size: 12px;
                            }
                            .btn-lost-pet:hover{
                                background-color: #b8205b;
                                color: #fff;
                                font-size: 12px;
                            }
                            .contacts{
                                display: flex;
                                align-items: center;
                                justify-content: space-around;

                            }
                        </style>
                        


                        @foreach($lost_pet as $item)
                        <div class="col-lg-3 col-md-6 col-sm-12 m-0 p-2">
                            <a href="{{ url('/lost_pet/' . $item->id) }}" class="unset-hover">
                                <div class="card-lost-pet">
                                    <img  class="img-lost-pet"src="{{ url('storage/'.$item->photo )}}" alt="" >
                                    <div class="container-lost-pet">
                                        <div class="about-lost-pet ">
                                            <div class="column pt-1 pb-1 text-center">
                                                <div >
                                                    <span class="name">
                                                        {{$item->pet->name}}
                                                    </span>
                                                    
                                                </div>
                                                <div>
                                                    @switch( $item->pet->gender )
                                                        @case ('ชาย')
                                                            <i class="fa-solid fa-mars text-info icon-gender" style="font-size:20px;"></i> 
                                                        @break
                                                        @case ('หญิง')
                                                            <i class="fa-solid fa-venus icon-gender" style="font-size:20px;color: pink;"></i> 
                                                        @break
                                                        @case ('ไม่ระบุ')
                                                            <i class="fa-solid fa-genderless text-secondary icon-gender" style="font-size:20px;"></i> 
                                                        @break
                                                    @endswitch
                                                </div>
                                                <div>
                                                    <span class="location">{{ $item->changwat_th }} {{ $item->tambon_th }}</span>
                                                </div>
                                            </div>
                                            <hr class="p-0 m-0">
                                            <div class="detail-lost-pet">
                                                <span class="text"> 
                                                    @if(\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%y') != 0 )
                                                        {{\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%y')}} ขวบ 
                                                    @endif
                                                    @if(\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%m') != 0 )
                                                        {{\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} เดือน
                                                    @endif

                                                    @if(!empty($item->pet->species))
                                                        • {{$item->pet->species}}
                                                    @endif
                                                </span>
                                            </div>
                                            <hr class="p-0 m-0">
                                            <div class="div-tag">
                                                <div>
                                                    @if($item->status == "found")
                                                        <span class="tag-found">เจอแล้ว</span>
                                                    @else
                                                        <span class="tag-lost">กำลังค้นหา</span>
                                                    @endif
                                                    &nbsp;
                                                    <span class="tag-js100">จส.100</span>
                                                </div>
                                                <div class="contacts">
                                                    @if(!empty( $item->user->email ))
                                                   <a href="mailto:{{$item->user->email}}" class="btn-lost-pet "><i class="fa-solid fa-envelope"></i></a>
                                                   @endif
                                                   @if(!empty( $item->profile->phone ))
                                                    <a href="tel:{{$item->profile->phone}}" class="btn-lost-pet ml-2"><i class="fa-solid fa-phone"></i></a>
                                                   @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>    
                        </div>
                            <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div style="padding-top:10px;padding-left:20px;">
                                        <div class="row">
                                            <div class="col-2" style="padding:0px;">
                                                @if(!empty($item->profile->photo))
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $item->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                @else
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                                @endif
                                            </div>
                                            <div class="col-9" style="padding:0px">
                                                @if($item->status == "found")
                                                    <span class="text-success" style="float: right;"><b>เจอแล้ว</b></span>
                                                @else
                                                    <span class="text-warning" style="float: right;"><b>กำลังค้นหา</b></span>
                                                @endif

                                                @if(!empty($item->profile->name))
                                                    <p class="notranslate" style="padding:0px;margin:0px;"> 
                                                        <b>{{ $item->profile->name }}</b>
                                                    </p>
                                                @endif
                                                <span style="font-size:20px"> <b></b> </span>
                                                <p style="font-size:12px;margin-top:-8px;"> {{ $item->created_at->diffForHumans() }} </p>
                                            </div>
                                            <div class="col-12" style="padding:8px;">
                                                @php
                                                    $pet_category = $item->pet_category_id ;
                                                @endphp
                                                
                                                @include ('menubar.icon_categorie') 
                                                <span class="notranslate" style="font-size: 17px;">{{$item->pet->name}}</span>
                                                @switch( $item->pet->gender )
                                                    @case ('ชาย')
                                                        <i class="fa-solid fa-mars text-info" style="font-size:20px;"></i> &nbsp;&nbsp;&nbsp;
                                                    @break
                                                    @case ('หญิง')
                                                        <i class="fa-solid fa-venus" style="font-size:20px;color: pink;"></i> &nbsp;&nbsp;&nbsp;
                                                    @break
                                                    @case ('ไม่ระบุ')
                                                        <i class="fa-solid fa-genderless text-secondary" style="font-size:20px;"></i> &nbsp;&nbsp;&nbsp;
                                                    @break
                                                @endswitch
                                                <b class="text-secondary">อายุ : 
                                                @if(\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%y') != 0 )
                                                    {{\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%y')}} ขวบ 
                                                @endif
                                                @if(\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%m') != 0 )
                                                    {{\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} เดือน
                                                @endif
                                                @if( \Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%y') == 0 & \Carbon\Carbon::parse($item->birth)->diff(\Carbon\Carbon::now())->format('%m')== 0)
                                                    {{\Carbon\Carbon::parse($item->pet->birth)->diff(\Carbon\Carbon::now())->format('%d')}} วัน
                                                @endif
                                                </b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image" style="margin-top:8px;">
                                        <img class="imgf" src="{{ url('storage/'.$item->photo )}}" style="object-fit: scale-down;" width="400px" height="300px" class="img-fluid customer">
                                    </div>
                                    <div style="padding-top:10px;padding-left:20px;">
                                        <div class="row col-12">
                                            <div class="card-body d-flex justify-content-between"style="padding:10px;">
                                                <a href="{{ url('/lost_pet/' . $item->id) }}" class="btn btn-outline-peddyhub">
                                                    <b class="text-b-lost_pet"><i class="fa-solid fa-file-lines icon-menu-lost_pet"></i>  <br>
                                                        รายละเอียด
                                                    </b>
                                                </a>
                                                @if(!empty( $item->profile->phone ))
                                                <a href="tel:{{ $item->profile->phone }}" class="btn btn-outline-peddyhub-call">
                                                    <b class="text-b-lost_pet"> <i class="fa-solid fa-phone icon-menu-lost_pet"></i> <br> 
                                                        ติดต่อ
                                                    </b>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        @endforeach
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
        document.querySelector('#btn_a_lost').classList.add('btn-style-ten');
        document.querySelector('#btn_a_lost').classList.remove('btn-outline-ten');
        document.querySelector('#btn_a_lost_pc').classList.add('btn-style-ten');
        document.querySelector('#btn_a_lost_pc').classList.remove('btn-outline-ten');
    }
</script>