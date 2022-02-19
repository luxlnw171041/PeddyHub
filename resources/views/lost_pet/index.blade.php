
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

                    <div class="row mt-5">
                        @foreach($lost_pet as $item)
                            <div class="col-lg-4 col-md-6 col-sm-12">
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
                                                @if(!empty($item->profile->name))
                                                    <p class="notranslate" style="padding:0px;margin:0px;"> <b>{{ $item->profile->name }}</b>  </p>
                                                @endif
                                                <span style="font-size:20px"> <b></b> </span>
                                                <p style="font-size:12px;margin-top:-8px;"> {{ $item->created_at->diffForHumans() }} </p>
                                            </div>
                                            <div class="col-12" style="padding:8px;">
                                                @php
                                                    $pet_category = $item->pet_category_id ;
                                                @endphp

                                                <!-- icon_categorie -->
                                                @include ('menubar.icon_categorie')

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
                                                <b class="text-secondary">ขนาด : {{ $item->pet->size }}</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="image" style="margin-top:8px;">
                                        <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="400px" height="300px" class="img-fluid customer">
                                    </div>
                                    <div style="padding-top:10px;padding-left:20px;">
                                        <div class="row col-12">
                                            <!-- <a href="{{ url('/lost_pet/' . $item->id) }}" class="col-6 main-shadow main-radius btn btn-info">
                                                รายละเอียด
                                            </a>
                                            <a href="tel:{{ $item->profile->phone }}" class="col-6 main-shadow main-radius btn btn-info" >
                                                ติดต่อ
                                            </a> -->
                                            <div class="card-body d-flex justify-content-around"style="padding:10px;">
                                                <a href="{{ url('/lost_pet/' . $item->id) }}" class="btn btn-outline-peddyhub">
                                                    <b class="text-b-lost_pet"><i class="fa-solid fa-file-lines icon-menu-lost_pet"></i>  <br>
                                                        รายละเอียด
                                                    </b>
                                                </a>
                                                <a href="tel:{{ $item->profile->phone }}" class="btn btn-outline-peddyhub-call">
                                                    <b class="text-b-lost_pet"> <i class="fa-solid fa-phone icon-menu-lost_pet"></i> <br> 
                                                        ติดต่อ
                                                    </b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        document.querySelector('#btn_a_lost').classList.add('btn-primary');
        document.querySelector('#btn_a_lost').classList.remove('btn-outline-primary');
        document.querySelector('#btn_a_lost_pc').classList.add('btn-style-ten');
        document.querySelector('#btn_a_lost_pc').classList.remove('btn-outline-ten');
    }
</script>