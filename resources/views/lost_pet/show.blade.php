@extends('layouts.peddyhub')

@section('content')
<style>
    .img-pet img{
        object-fit: cover;
        height: 300px;
        width: 100%;
    }
    .img-pet-pc img{
        object-fit: contain;
        height: 300px;
        width: 100%;
        padding: 20px;
    }
    .card-lost-pet{
            border-radius: 20px;
            background-color: #F8F9FE;
            padding: 10px;
        }
        .about-lost-pet{
        border-radius: 10px;
        background-color: #fff;
        align-items: center;
        flex-direction:  column;
        margin-top: -23%;
        z-index: 99;
        position: relative;

        }
        .about-lost-pet-pc{
        border-radius: 10px;
        background-color: #fff;
        align-items: start;
        flex-direction:  column;
        z-index: 99;
        position: relative;

        }
        .about-lost-pet .name{
            font-size: 17px;
            font-family: 'Mitr', sans-serif;
            font-weight: bold;

        }
        .about-lost-pet-pc .name{
            font-size: 17px;
            font-family: 'Mitr', sans-serif;
            font-weight: bold;

        }
        .about-lost-pet .location{
            font-size: 15px;
            font-family: 'Mitr', sans-serif;
        }
        .about-lost-pet-pc .location{
            font-size: 15px;
            font-family: 'Mitr', sans-serif;
        }
        .detail-lost-pet {
            flex-direction:  column;
            white-space: nowrap; 
            width: 100%; 
            overflow: hidden;
            text-overflow: ellipsis; 
            display: flex;
            padding: 10px;
        }
        .detail-lost-pet span{
            font-family: 'Mitr', sans-serif;
            
        }
        .container-lost-pet{
            padding: 15px;
            background-color: #fff;

        }
        .container-lost-pet-pc{
            padding: 50px;
            background-color: #fff;
        }
        .about-lost-pet .icon-gender{
            position: absolute;
            margin-left:40%;
            margin-top:-6%;

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
        .btn-lost-pet{
            background-color: #fff;
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
        .lost-pet-detail{
            background-color: #fff;
        }.map{
            padding: 10px;
        }
        .map span{
            font-family: 'Mitr', sans-serif;

        }
        .user{
            white-space: nowrap; 
            width: 100%; 
            overflow: hidden;
            text-overflow: ellipsis; 
            display: flex;
            padding: 10px;
            justify-content: space-between;

        }
        .img-user{
            font-family: 'Mitr', sans-serif;
            font-weight: bold;
        }
        .img-user img{
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }
        .contacts{
            align-self: center;
        }
        
</style>
    <div class="page-wrapper lost-pet-detail">
        <div class="d-block d-md-none">
            <div class="img-pet">
                <a href="#photo-pet-mobile">
                    <img  src="{{ url('storage')}}/{{ $lost_pet->photo }}" alt="">
                </a>
                <a href="#img-photo-pet" class="lightbox" id="photo-pet-mobile">
                    <span style="background-image: url('{{ url('storage')}}/{{ $lost_pet->photo }}')"></span>
                </a>
            </div>
            <div class="container-lost-pet">
                <div class="about-lost-pet ">
                    <div class="column pt-1 pb-1 text-center">
                        <div >
                            <span class="name">
                                {{$lost_pet->pet->name}}
                            </span>
                            
                        </div>
                        <div>
                            @switch( $lost_pet->pet->gender )
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
                            <span class="location">{{ $lost_pet->changwat_th }} {{ $lost_pet->tambon_th }}</span>
                        </div>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="div-tag">
                        <div>
                            @if($lost_pet->status == "found")
                                <span class="tag-found">เจอแล้ว</span>
                            @else
                                <span class="tag-lost">กำลังค้นหา</span>
                            @endif
                            &nbsp;
                            <span class="tag-js100">จส.100</span>
                        </div>
                        <div class="contacts">
                            @if(!empty( $lost_pet->user->email ))
                            <a href="mailto:{{$lost_pet->user->email}}" class="btn-lost-pet "><i class="fa-solid fa-envelope"></i></a>
                            @endif
                            @if(!empty( $lost_pet->profile->phone ))
                            <a href="tel:{{$lost_pet->profile->phone}}" class="btn-lost-pet ml-2"><i class="fa-solid fa-phone"></i></a>
                            @endif
                        </div>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="detail-lost-pet">
                        <div>
                            <span>ประเภท : </span>
                            <span>{{$lost_pet->pet_category->name}}</span>
                        </div>
                        @if(!empty($lost_pet->pet->species))
                            <div>
                                <span>สายพันธุ์ :</span>
                                <span>{{$lost_pet->pet->species}}</span>
                            </div>
                        @endif
                        <div>
                            <span>อายุ :</span>
                            <span>
                                @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%y') != 0 )
                                    {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%y')}} ขวบ 
                                @endif
                                @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m') != 0 )
                                    {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} เดือน
                                @endif
                                @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%d') != 0 )
                                    {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} วัน
                                @endif
                            </span>
                        </div>
                        <div>
                            <span>เพศ :</span>
                            <span>{{$lost_pet->pet->gender}}</span>
                        </div>
                    </div>
                    <hr class="p-0 m-0">
                    <div class="map">
                        <span><i class="fa-solid fa-location-dot"></i> <b>{{$lost_pet->pet->name}}</b> หายที่ {{ $lost_pet->changwat_th }} {{ $lost_pet->amphoe_th }} {{ $lost_pet->tambon_th }} </span>
                
                    </div>
                    <div id="map_show" class="map_show" style="border-radius: 0px 0px 10px 10px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="d-none d-lg-block ">
            <div class="row container-lost-pet-pc">
                <div class="col-8 p-3">
                    <div class="card-lost-pet">
                        <div class="img-pet-pc">
                            <a href="#photo-pet">
                                <img  src="{{ url('storage')}}/{{ $lost_pet->photo }}" alt="">
                            </a>
                            <a href="#img-photo-pet" class="lightbox" id="photo-pet">
                                <span style="background-image: url('{{ url('storage')}}/{{ $lost_pet->photo }}')"></span>
                            </a>
                           
                        </div>
                        <div class="about-lost-pet-pc ">
                            <div class="row  p-3">
                                <div >
                                    <span class="name">
                                        {{$lost_pet->pet->name}}
                                    </span>
                                    @switch( $lost_pet->pet->gender )
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
                                    <span class="location">{{ $lost_pet->changwat_th }} {{ $lost_pet->tambon_th }}</span>
                                </div>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="div-tag">
                                <div>
                                    @if($lost_pet->status == "found")
                                        <span class="tag-found">เจอแล้ว</span>
                                    @else
                                        <span class="tag-lost">กำลังค้นหา</span>
                                    @endif
                                    &nbsp;
                                    <span class="tag-js100">จส.100</span>
                                </div>
                            </div>
                            <hr class="p-0 m-0">
                            <div class="detail-lost-pet">
                                <div>
                                    <span>ประเภท : </span>
                                    <span>{{$lost_pet->pet_category->name}}</span>
                                </div>
                                @if(!empty($lost_pet->pet->species))
                                    <div>
                                        <span>สายพันธุ์ :</span>
                                        <span>{{$lost_pet->pet->species}}</span>
                                    </div>
                                @endif
                                <div>
                                    <span>อายุ :</span>
                                    <span>
                                        @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%y') != 0 )
                                            {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%y')}} ขวบ 
                                        @endif
                                        @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m') != 0 )
                                            {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} เดือน
                                        @endif
                                        @if(\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%d') != 0 )
                                            {{\Carbon\Carbon::parse($lost_pet->pet->birth)->diff(\Carbon\Carbon::now())->format('%m')}} วัน
                                        @endif
                                    </span>
                                </div>
                                <div>
                                    <span>เพศ :</span>
                                    <span>{{$lost_pet->pet->gender}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 p-3">
                    <div class="card-lost-pet">
                        <div class="user column">
                            <div class="img-user">
                                @if(!empty($lost_pet->profile->photo))
                                    <img  src="{{ url('storage')}}/{{ $lost_pet->profile->photo }}" alt="">
                                @else
                                    <img  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="">
                                @endif
                                {{ $lost_pet->profile->name }}
                            </div>
                            <div class="contacts">
                                @if(!empty( $lost_pet->user->email ))
                                <a href="mailto:{{$lost_pet->user->email}}" class="btn-lost-pet "><i class="fa-solid fa-envelope"></i></a>
                                @endif
                                @if(!empty( $lost_pet->profile->phone ))
                                <a href="tel:{{$lost_pet->profile->phone}}" class="btn-lost-pet ml-2"><i class="fa-solid fa-phone"></i></a>
                                @endif
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="card-lost-pet">
                        <div class="map">
                            <span><i class="fa-solid fa-location-dot"></i> <b>{{$lost_pet->pet->name}}</b> หายที่ {{ $lost_pet->changwat_th }} {{ $lost_pet->amphoe_th }} {{ $lost_pet->tambon_th }} </span>
                    
                        </div>
                        <div id="map_show_pc" class="map_show_pc" style="border-radius: 0px 0px 10px 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br><br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    .map_show {
      height: calc(40vh);
    }
    .map_show_pc {
      height: calc(40vh);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
        initMappc();

    });
    
    function initMap() { 
        
        let lat = {{ $lost_pet->lat }} ;
        let lng = {{ $lost_pet->lng }} ;

        const map = new google.maps.Map(document.querySelector('.map_show'), {
            zoom: 10,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });

        var image = {
            url: "https://www.peddyhub.com/peddyhub/images/icons/location.png",
            scaledSize: new google.maps.Size(25, 33)
        };

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user , icon: image});

        const circle = new google.maps.Circle( {
        map           : map,
        center        : new google.maps.LatLng( lat, lng ),
        radius        : 15000,
        strokeColor   : '#B8205B',
        strokeOpacity : 1,
        strokeWeight  : 2,
        fillColor     : '#B8205B',
        fillOpacity   : 0.2
        } );
    }

    function initMappc() { 
        
        let lat = {{ $lost_pet->lat }} ;
        let lng = {{ $lost_pet->lng }} ;

        const map = new google.maps.Map(document.querySelector('.map_show_pc'), {
            zoom: 10,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
 
        var image = {
            url: "https://www.peddyhub.com/peddyhub/images/icons/location.png",
            scaledSize: new google.maps.Size(25, 33)
        };

        const marker_user = new google.maps.Marker({ map, position: user, icon: image});

        const circle = new google.maps.Circle( {
        map           : map,
        center        : new google.maps.LatLng( lat, lng ),
        radius        : 15000,
        strokeColor   : '#B8205B',
        strokeOpacity : 1,
        strokeWeight  : 2,
        fillColor     : '#B8205B',
        fillOpacity   : 0.2
    } );

    }
</script>
@endsection
