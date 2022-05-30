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
</style>
<div class="container mt-3">
    <div class="profile">
        <div class="profile_header">
            <div class="profile_picture">
                @if(!empty($user->profile->photo))
                <img class="profile_img" src="{{ url('storage')}}/{{ $user->profile->photo }}">

                @else
                <img src="{{ url('/peddyhub/images/icons/user.png') }}">
                @endif
            </div>

            <div class="account">
                <b style="font-family: 'Kanit', sans-serif;font-size:18px">
                    @if(!empty($user->profile->real_name))
                    {{$user->profile->real_name}}
                    @else
                    {{$user->profile->name}}
                    @endif
                </b>
                <a style="margin-left:12px;font-size:20px" href="tel:{{$user->profile->phone}}"><i class="fa-regular fa-phone-flip text-success"></i></a>
            </div>

            <!-- <div class="tel">
                <a href="tel:{{$user->profile->phone}}" class="tel-button">tel</a>
            </div> -->
        </div>
        <div class="infos">
            <div class="info">
                <b style="font-family: 'Kanit', sans-serif;font-size:20px">
                    @if(!empty($user->profile->changwat_th))
                    ทีอยู่: {{$user->profile->tambon_th}} {{$user->profile->amphoe_th}} {{$user->profile->changwat_th}}
                    @else
                    ที่อยู่: ไม่ระบุ
                    @endif
                </b>
            </div>
        </div>
    </div>
    <h5>สัตว์เลี้ยง</h5>
    <hr style="margin-top: 5px;">
    @if($petuser->isNotEmpty())
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
                    <img  style="font-size:18px;" width="29px" src="{{ asset('/peddyhub/images/img-icon/birthday.png') }}" alt="">&nbsp;: {{ thaidate("F Y" , strtotime($item->birth)) }}
                    </b>
                </div>
            </div>
        </div>
        <br><br>
        @endforeach
    @else
    <br><br>
    <h5 class="text-center">ไม่พบสัตว์เลี้ยง</h5>
    <br>
    <br><br>
    @endif
</div>
@endsection