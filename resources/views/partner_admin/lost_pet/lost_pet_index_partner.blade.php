@extends('layouts.partner.theme_partner')

@section('content')
<style>
    .div_alert {
        position: fixed;
        top: 115%;
        bottom: 0;
        left: 0;
        width: 100%;
        text-align: center;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 18px;

    }

    .div_alert span {
        background-color: #2DD284;
        border-radius: 10px;
        color: white;
        padding: 15px;
        font-family: 'Kanit', sans-serif;
        z-index: 9999;
        font-size: 1em;
    }

    .up_down {
        animation: up-down 2s cubic-bezier(0.87, 0, 0.13, 1) 0s 2 alternate-reverse both;
    }

    @keyframes up-down {
        0% {
            opacity: 1;
            transform: translateY(-23vh);
        }

        100% {
            opacity: 0;
            transform: translateY(0px);
        }
    }

    .lost-pet-header {
        border-radius: 20px;
    }

    .lost-pet-header h4,
    a {
        font-family: 'Kanit', sans-serif;
    }

    .token {
        font-family: 'Kanit', sans-serif;
        font-weight: bold;
    }

    .noHover {
        background-color: unset !important;
        color: unset !important;
    }

    .noHover:hover .lost-pet-location {
        overflow: visible;
        white-space: normal;
    }

    .card-lost-pet {
        border-radius: 20px;
    }

    .card-lost-pet img {
        object-fit: cover;
        width: auto;
        height: 12em;
    }

    h4 {
        font-family: 'Kanit', sans-serif;
        padding: 0.5em 0em 0.5em 0em;
    }.phone{
	font-family: 'Kanit', sans-serif;
    }.phone-frame{
    border-radius: 40px;
    border: black 12px solid;
    flex-direction:  column;
    font-family: 'Kanit', sans-serif;
    padding:0px 10px 0px 10px;
    min-width: 300px;
    max-width: 300px;

    }
    .phone-camera{
        padding: 0px;
        border-radius: 0px 0px 15px 15px;
        color: black;
        background-color: black;
    }
    .phone-icon{
        font-size: 10px;


    }
    .phone-header{
        background-color: #8CABD9;
        flex-direction:  row;

    }
    .phone-name{
        padding: 10px 10px 10px 10px;
    }
    .phone-icon-header{
        display: flex;
        align-items: center;
    }
    .phone-footer{
        padding: 10px 10px 10px 20px;
    }
    .richmenu{
        z-index: 99;
        padding: 0;
    }
    .phone-content{
        background-color: #8CABD9;
        padding:0px;
        display: flex;
        align-items: flex-start;
        height: 250px;
        z-index: 1;
    }
    .no-richmenu{
        min-height: 440px !important;
    }
    .sand{
    animation: myAnim 1s ease 0s 1 normal forwards;
    }

    @keyframes myAnim {
        0% {
            transform: translateY(180px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .remove-scrollbar::-webkit-scrollbar {
    display:none;
    }
    .photo_flex_line {
        padding: 5px;
    position: relative;
    }

    .position{
    position: absolute;
    margin: 0;
    padding: 0;
    overflow: hidden;
    text-overflow: ellipsis; 
    /* border: 1px solid #000000;  */
    white-space: nowrap; 
    color: white;
    }

    .photo_flex_line .find-pet {
    /* top: 13%; */
    top: 19.5%;
    left: 8%;
    font-weight: bold;
    font-size: 1.2em;
    width: 14em; 
    }
    .photo_flex_line .img-pet {
    position: absolute;
    /* top: 27.2%; */
    top: 40.2%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 57%; 
    border-radius: 50%;
    height: 29.7%;
    object-fit: contain;
    }



    .photo_flex_line .pet-name {
    position: absolute;
    /* top: 49%; */
    top: 59%;
    left: 50%;
    transform: translate(-50%,-50%);
    font-weight: bold;
    font-size: 2em;
    width: 87%; 
    }

    .photo_flex_line .pet-age{
    position: absolute;
    /* top: 56%; */
    top: 64%;
    left: 50%;
    transform: translate(-50%,-50%);
    font-weight: bold;
    font-size: 1.5em;
    width: 87%; 
    }
    .photo_flex_line .date-lost{
    top: 67%;
    left: 32%;
    font-size: 1em;
    width: 60%; 
    }
    .photo_flex_line .pet-category{
    top: 72%;
    left: 27.5%;
    font-size: 1em;
    width: 25%; 
    }
    .photo_flex_line .pet-gender{
    top: 72%;
    left: 67%;
    font-size: 1em;
    width: 25%; 
    } .photo_flex_line .pet-sub-category{
    top: 76.8%;
    left: 30.5%;
    font-size: 1em;
    width: 62%; 
    }
    .photo_flex_line .see-more {
    top: 81.3%;
    left: 7%;
    font-weight: bold;
    font-size: 1.2em;
    width: 87%; 
    height: 2em;
    cursor: pointer;
    }
    .photo_flex_line .phone {
    top: 88.8%;
    left: 33%;
    font-weight: bold;
    font-size: 0.8em;
    width: 45%; 
    color: #b8205b;
    }.photo_flex_line .tel {
    top: 88%;
    left: 6%;
    font-weight: bold;
    font-size: 0.8em;
    width: 87%; 
    height: 3.5em;
    cursor: pointer;
    z-index: 99999;
    }
    .photo_flex_line .owner-name {
    top: 91.7%;
    left: 40%;
    font-weight: bold;
    font-size: 0.8em;
    width: 39%; 
    color: #b8205b;
    }

    .add-phone{
    position: absolute;
    }
    /*end of Average Styling */
    .tooltip{
    background-color: #333;
    color: white;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    font-size: 12px;
    min-width: 240px;
    padding: 10px 15px;
    top: -5.5em;
    transition: 0.5s;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
    opacity: 0; /* to hide it but still there*/
    border-radius:10px;
    font-family: 'Kanit', sans-serif;
    }
    .tooltip::before{
    content: "";
    position: absolute;
    bottom: -20px ;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    border:10px solid;
    border-color: #333 transparent transparent transparent;

    }
    .add-phone:hover{
    overflow: visible;
    }
    .add-phone:hover .tooltip{
    display: inline;
    opacity: 80%;
    }.sand{
    animation: myAnim 1s ease 0s 1 normal forwards;
    }
    .test{
        height: 2.5em;
        width: 87%;
        top: 10%;
    left: 7%;
    font-weight: bold;
    font-size: 1.2em;
    cursor: pointer;
    z-index: 999999999;
    }
    .test:hover{
    overflow: visible;
    }
    .test:hover .tooltip{
    display: inline;
    opacity: 80%;
    }

    .test .tooltip{
    background-color: #333;
    color: white;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    font-size: 12px;
    min-width: 240px;
    padding: 10px 15px;
    top: 4.5em;
    transition: 0.5s;
    -webkit-transition: 0.5s;
    -moz-transition: 0.5s;
    -ms-transition: 0.5s;
    -o-transition: 0.5s;
    opacity: 0; /* to hide it but still there*/
    border-radius:10px;
    font-family: 'Kanit', sans-serif;
    }

    .test .tooltip::before{
        content: "";
    position: absolute;
    bottom:55px ;
    left: 50%;
    transform: translateX(-50%);
    -webkit-transform: translateX(-50%);
    -moz-transform: translateX(-50%);
    -ms-transform: translateX(-50%);
    -o-transform: translateX(-50%);
    border:10px solid;
    border-color:  transparent transparent #333 transparent;

    }
    .sand{
    animation: myAnim 1s ease 0s 1 normal forwards;
    }
    @keyframes myAnim {
        0% {
            transform: translateY(180px);
        }

        100% {
            transform: translateY(0);
        }
    }.post{
        background-color: #b8205b;
        padding: 5px;
        border-radius: 10px;
        color: #FFFFFF;
        margin: 10px;
    } .logo-partner{
        top: 10%;
        left: 6%;
        font-weight: bold;
        font-size: 0.8em;
        width: 87%; 
        height: 3.5em;
        cursor: pointer;
        z-index: 99999;
        object-fit: contain;
    }
</style>
<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>
<div class="page-content " style="font-family: 'Kanit', sans-serif;">
    <div class="row">
        <div class="col-12">
            <div class="card lost-pet-header">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-6" >
                            <h4 style="font-family: 'Kanit', sans-serif;">ประกาศตามหาสัตว์เลี้ยงหาย</h4>
                        </div>
                        <div class=" col-6 ">
                            <a href="#collapseExample" role="button" aria-expanded="false " data-toggle="collapse" aria-controls="collapseExample" style="margin-left: 10px;" class="float-end btn btn-primary text-white main-shadow main-radius">
                                API
                            </a>
                            &nbsp;
                            <a href="{{ url('/lost_pet_by_partner') }}" class=" float-end btn btn-success text-white main-shadow main-radius">
                                เพิ่มประกาศใหม่
                            </a>
                        </div>
                        <div class="col-12 mt-2 collapse" id="collapseExample">
                            <div class="row row-cols-lg-auto g-2 float-end">
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <span style="width:100%;" class="btn btn-secondary text-white main-shadow main-radius" onclick="CopyToClipboard('gen_token')">
                                            คัดลอก
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <span style="width:100%;" class="btn btn-warning text-white main-shadow main-radius" data-toggle="modal" data-target="#new_token">
                                            สร้างโทเค็น
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group">
                                        
                                        <!-- Button trigger modal -->
                                        <button id="btn_how_to_use_api" type="button" class="btn btn-info text-white main-shadow main-radius" data-toggle="modal" data-target="#how_to_use_api">
                                            วิธีใช้งาน API
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-7"></div>
                                <div class="col-5">
                                    <div class="position-relative">
                                        <input type="text" class="form-control token" name="gen_token" id="gen_token" value="{{ $token }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4>รายละเอียด</h4>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5 product-grid ">

        @foreach($lost_pet as $item)

        <div class="col">
            <div class="card card-lost-pet">
                <a href="{{ url('/lost_pet/' . $item->id) }}" class="unset-hover noHover">
                    @if(!empty($item->photo))
                    <img width="100%" class="img-pet card-img-top" src="{{ url('storage/'.$item->photo )}}" alt="">
                    @else
                    <img width="100%" class="img-pet card-img-top" src="{{ asset('/peddyhub/images/media/all/sticker/23.png') }}" alt="">
                    @endif
                    <div>
                        <div class="position-absolute top-0 end-0 m-3 pet-search">
                            <span class="">
                                @if($item->status == "found")
                                    เจอแล้ว
                                @else
                                    กำลังค้นหา
                                @endif
                            </span>
                        </div>
                        <!-- <div class="position-absolute top-0 end-0 m-3 product-discount">
                                        <span class="">
                                            @switch( $item->pet_gender )
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
                                        </span>
                                    </div> -->
                    </div>
                </a>
                <div class="card-body">
                    <a href="{{ url('/lost_pet/' . $item->id) }}" class="unset-hover noHover">
                        <h6 class="card-title cursor-pointer m-0" style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                            @if(!empty($item->pet_name))
                            <b>{{ $item->pet_name }}</b>
                            @else
                            ไม่ระบุ
                            @endif

                        </h6>
                        <p class="m-0 lost-pet-location">
                            {!! str_replace('จ.', ' ', $item->changwat_th) !!}, {!! str_replace('อ.', ' ', $item->amphoe_th) !!}, {!! str_replace('ต.', ' ', $item->tambon_th) !!}
                        </p>
                        <div class="clearfix">
                            <p class="mb-0 float-start lost-pet-location">
                                <strong>
                                    {{$item->pet_category->name }}
                                    @if($item->sub_category != "ไม่ได้ระบุ")
                                        • {{ $item->sub_category }}
                                    @endif
                                </strong>
                            </p>
                        </div>
                        <div class="clearfix">
                            <p class="mb-0 float-start lost-pet-location"><strong>อายุุ :</strong> {{ $item->pet_age }}</p>
                        </div>
                        <div class="clearfix">
                            <p class="mb-0 float-start lost-pet-location"><strong>เจ้าของ :</strong> {{$item->owner_name }}</p>
                        </div>
                    </a>
                    <div class="text-center">
                        <a data-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                           รายละเอียด ▼
                        </a>
                    </div>
                    <div class="collapse" id="collapseExample{{$item->id}}">
                            {{$item->detail}}
                    </div>
                    <div class="d-grid gap-2 mt-2">
                        @if($item->owner_phone == "ไม่ได้ระบุ")
                        <button class="btn btn-primary phone" style="border-radius:12px" type="button" disabled>ไม่ได้ระบุ
                        </button>
                        @else
                        <a href="tel:{{ $item->owner_phone }}" class="btn btn-primary phone" style="border-radius:12px" type="button">{{ $item->owner_phone }}
                        </a>
                        @endif
                    </div>
                    <div class="mt-2">
                        <div class="row">
                            @if($item->status != "found")
                                <div class="col-6 m-0 d-grid gap-2  " style="padding: 10px 0px 10px 10px;">
                                    <button style="border-radius: 10px 0 0 10px;" type="button" class="btn btn-outline-info btn-sm btn-block" onclick="document.getElementById('found{{$item->id}}').submit();">เจอแล้ว</button>
                                </div>
                                <div class="col-6 m-0 d-grid gap-2 " style="padding: 10px 10px 10px 0px;">
                                    <button style="border-radius: 0px 10px 10px 0px;" type="button" class="btn btn-outline-danger btn-sm btn-block" onclick="document.getElementById('delete{{$item->id}}').submit();">ลบ</button>
                                </div>
                            @else
                            <div class="col-12 m-0 d-grid gap-2 " style="padding: 10px 12px;">
                                    <button style="border-radius: 10px;" type="button" class="btn btn-outline-danger btn-sm btn-block" onclick="document.getElementById('delete{{$item->id}}').submit();"><i class="fa-solid fa-trash"></i>     ลบ</button>
                                </div>
                            @endif
                            
                            <div class="col-6 m-0 p-0 d-none">
                                <form id="found{{$item->id}}" method="POST" action="{{ url('/lost_pet' . '/' . $item->id) }}" accept-charset="UTF-8">
                                    {{ method_field('PATCH') }}
                                    {{ csrf_field() }} 
                                    <input name="status" type="hidden" id="status" value="found" >
                                    <button class="btn btn-md btn-primary btn-block" id="{{ $item->id }}" >เจอแล้ว</button>
                                </form>
                            </div>
                            <div class="col-6 m-0 p-0 d-none">
                                <form id="delete{{$item->id}}" method="POST" action="{{ url('/lost_pet' . '/' . $item->id) }}" accept-charset="UTF-8">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }} 
                                    
                                    <!-- <button   type="submit" class="btn btn-md btn-block btn-danger main-shadow main-radius"onclick="return confirm(&quot;Confirm delete?&quot;)">
                                        ลบ
                                    </button> -->
                                </form>
                            </div>
                        </div>
                        
                       
                        
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--end row-->


</div>

<!-- Modal how_to_use_api -->
<div class="modal fade m-0 p-0" id="how_to_use_api" tabindex="-1" role="dialog" aria-labelledby="how_to_use_apiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="how_to_use_apiLabel">
                วิธีการใช้งาน API Lost Pet
            </h4>
            <button type="button" class="close btn btn-lg" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="card data-api main-shadow">
                        <div class="row">
                            <div class="col-12">
                                <a data-toggle="collapse" href="#api_input" role="button" aria-expanded="false" aria-controls="api_input">
                                    <div class="col">
                                        <h4>ข้อมูลรับเข้า (Input)</h4>
                                    </div>
                                    <div class="col ">
                                        <i class="fa-solid fa-caret-down float-end icon-api"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="api_input" style="overflow-x:auto;">
                                    <div class="col-12" style="margin: 16px 16px 16px 0;">
                                        <span class="post">POST</span><span>https://www.peddyhub.com/api/partner_lost_pet</span>
                                    </div>
                                    
                                    <table class="table table-striped table-bordered .table-responsive" style="border-radius: 20px;">
                                        <thead>
                                            <tr class="text-center">
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>ประเภทข้อมูล</th>
                                            <th>คำอธิบาย</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>Token</td>
                                                <td>"String"</td>
                                                <td class="text-center">โทเค็นสำหรับตรวจสอบ</td>
                                            </tr>         

                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>province</td>
                                                <td>"String"</td>
                                                <td class="text-center">จังหวัด</td>
                                            </tr> 
                                            
                                            <tr>
                                                <td class="text-center">3</td>
                                                <td>amphoe</td>
                                                <td>"String"</td>
                                                <td class="text-center">อำเภอ</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">4</td>
                                                <td>tambon</td>
                                                <td>"String"</td>
                                                <td class="text-center">ตำบล</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">5</td>
                                                <td>owner_name</td>
                                                <td>"String"</td>
                                                <td class="text-center">ชื่อเจ้าของสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">6</td>
                                                <td>owner_phone</td>
                                                <td>"String"</td>
                                                <td class="text-center">เบอร์ติดต่อเจ้าของสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">7</td>
                                                <td>pet_name</td>
                                                <td>"String"</td>
                                                <td class="text-center">ชื่อสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">8</td>
                                                <td>pet_age</td>
                                                <td>"String"</td>
                                                <td class="text-center">อายุสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">9</td>
                                                <td>pet_category</td>
                                                <td>"String"</td>
                                                <td class="text-center">ประเภทสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">10</td>
                                                <td>sub_category</td>
                                                <td>"String"</td>
                                                <td class="text-center">สายพันธุ์สัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">11</td>
                                                <td>pet_gender</td>
                                                <td>"String"</td>
                                                <td class="text-center">เพศสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">12</td>
                                                <td>detail</td>
                                                <td>"String"</td>
                                                <td class="text-center">รายละเอียด / ลักษณะของสัตว์เลี้ยง</td>
                                            </tr>  

                                            <tr>
                                                <td class="text-center">13</td>
                                                <td>photo_link</td>
                                                <td>"String"</td>
                                                <td class="text-center">รูปภาพ (ลิงก์)</td>
                                            </tr>  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card data-api main-shadow">
                        <div class="row">
                            <div class="col-12">
                                <a data-toggle="collapse" href="#api_output" role="button" aria-expanded="false" aria-controls="api_input">
                                    <div class="col">
                                        <h4>ข้อมูลส่งกลับ (Output)</h4>
                                    </div>
                                    <div class="col ">
                                        <i class="fa-solid fa-caret-down float-end icon-api"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="api_output" style="overflow-x:auto;">
                                    <table class="table table-striped table-bordered .table-responsive" style="border-radius: 20px;">
                                        <thead>
                                            <tr class="text-center">
                                            <th>ลำดับ</th>
                                            <th>ชื่อ</th>
                                            <th>ประเภทข้อมูล</th>
                                            <th>คำอธิบาย</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">1</td>
                                                <td>ส่งข้อมูลเรียบร้อยแล้ว ขอบคุณค่ะ</td>
                                                <td>"String"</td>
                                                <td class="text-center">ดำเนินการเรียบร้อย</td>
                                            </tr>         

                                            <tr>
                                                <td class="text-center">2</td>
                                                <td>ไม่สามารถดำเนินการได้ กรุณาติดต่อ PEDDyHUB</td>
                                                <td>"String"</td>
                                                <td class="text-center">พบข้อผิดพลาด</td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card data-api main-shadow">
                        <div class="row">
                            <div class="col-12">
                                <a data-toggle="collapse" href="#usage" role="button" aria-expanded="false" aria-controls="api_input">
                                    <div class="col">
                                        <h4>ตัวอย่างการใช้งาน(Usage)</h4>
                                    </div>
                                    <div class="col ">
                                        <i class="fa-solid fa-caret-down float-end icon-api"></i>
                                    </div>
                                </a>
                                <div class="collapse" id="usage">
                                    <div class="row">
                                        <div class="col-lg-8 col-12">
                                            <form id="test_api" class="row g-3 needs-validation " novalidate onsubmit="return false">
                                                <!-- DATA -->

                                                <div class="row">
                                                    <div class="col-12 col-md-9">
                                                        <label for="Token" class="form-label">Token</label>
                                                        <input class="form-control" type="text" name="Token" id="Token" value="{{ $token }}" readonly>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <label class="form-label"><br class="d-none d-lg-block"></label>
                                                        <!-- <button type="button" id="send_API_Lost_pet1" class="btn btn-info text-white main-shadow main-radius" style="width:100%;" onclick="API_Lost_pet();"> 
                                                            ส่งข้อมูล
                                                        </button> -->
                                                        <button type="button" id="send_API_Lost_pet1" class="btn btn-info text-white main-shadow main-radius" style="width:100%;" onclick="check();"> 
                                                            ส่งข้อมูล
                                                        </button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <label for="select_province" class="form-label">จังหวัด</label>
                                                        <select name="select_province" id="select_province" class="form-control" onchange="select_A();" required>
                                                            <option value="">- เลือกจังหวัด -</option>
                                                        </select>
                                                        <div id="sselect_provinceFeedback" class="invalid-feedback">โปรดระบุจังหวัดที่ถูกต้อง.</div>

                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label for="select_amphoe" class="form-label">อำเภอ</label>
                                                        <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T();"required>
                                                            <option value="">- เลือกอำเภอ -</option>
                                                        </select>
                                                        <div id="sselect_provinceFeedback" class="invalid-feedback">โปรดระบุอำเภอที่ถูกต้อง.</div>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label for="select_tambon" class="form-label">ตำบล</label>
                                                        <select name="select_tambon" id="select_tambon" class="form-control" required>
                                                            <option value="">- เลือกตำบล -</option>
                                                        </select>
                                                        <div id="sselect_provinceFeedback" class="invalid-feedback">โปรดระบุตำบลที่ถูกต้อง.</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="inputLastName2" class="form-label">ชื่อ</label>
                                                        <div class="input-group"> 
                                                            <span class="input-group-text bg-transparent">
                                                                <i class="bx bxs-user"></i>
                                                            </span>
                                                            <input class="form-control" name="owner_name" type="text" id="owner_name" value="" placeholder="ชื่อเจ้าของ">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="inputPhoneNo" class="form-label">เบอร์ติดต่อ</label>
                                                        <div class="input-group"> 
                                                            <span class="input-group-text bg-transparent">
                                                                <i class="fa-solid fa-phone"></i></span>
                                                            <input class="form-control" name="owner_phone" type="text" id="owner_phone" value="" placeholder="หมายเลขโทรศัพท์">
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class=" form-group {{ $errors->has('pet_name') ? 'has-error' : ''}}">
                                                            <label for="pet_name" class="control-label">{{ 'ชื่อสัตว์เลี้ยง' }}</label>
                                                            <input class="form-control" name="pet_name" type="text" id="pet_name" value="{{ isset($lost_pet->pet_name) ? $lost_pet->pet_name : ''}}" required>
                                                                <div id="pet_nameFeedback" class="invalid-feedback">โปรดระบุชื่อสัตว์เลี้ยง.</div>

                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class="form-group {{ $errors->has('pet_age') ? 'has-error' : ''}}">
                                                            <label for="pet_age" class="control-label">{{ 'อายุสัตว์เลี้ยง' }}</label>
                                                            <div class="input-group mb-3">
                                                                <input class="form-control" name="pet_age" type="number" id="pet_age_Y" value="" placeholder="ปี" onchange="input_pet_age();" min="0" required>
                                                                <input class="form-control" name="pet_age" type="number" id="pet_age_M" value="" style="border-radius: 0px 5px 5px 0px;" placeholder="เดือน" onchange="input_pet_age();" min="0">
                                                                <div id="validationServer03Feedback" class="invalid-feedback">โปรดระบุอายุสัตว์เลี้ยงอย่างน้อย 1 เดือน </div>
                                                            </div>
                                                            <input class="form-control d-none" name="pet_age" type="text" id="pet_age" value="" readonly>
                                                            {!! $errors->first('pet_category_id', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class="form-group {{ $errors->has('pet_gender') ? 'has-error' : ''}}">
                                                            <label for="pet_gender" class="control-label">{{ 'เพศ' }}</label>
                                                            <div style="margin-top:8px;" class="form-group">
                                                                <input type="radio" class="form-check-input" id="pet_gender_M" name="pet_gender" required="" value="ชาย">
                                                                <label class="form-check-label" for="pet_gender_M">ชาย</label>
                                                                &nbsp;&nbsp;

                                                                <input type="radio" class="form-check-input" id="pet_gender_w" name="pet_gender" required="" value="หญิง">
                                                                <label class="form-check-label" for="pet_gender_w">หญิง</label>&nbsp;&nbsp;


                                                                <input checked type="radio" class="form-check-input" id="pet_gender_O" name="pet_gender" required="" value="ไม่ระบุ">
                                                                <label class="form-check-label" for="pet_gender_O">ไม่ระบุ</label> &nbsp;&nbsp;
                                                                <div class="invalid-feedback">โปรดระบุเพศสัตว์เลี้ยง.</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class="form-group {{ $errors->has('pet_category_id') ? 'has-error' : ''}}">
                                                            <label for="pet_category_id" class="control-label">{{ 'ประเภทสัตว์เลี้ยง' }}</label>
                                                            <select class="form-select" id="form_select_category" name="pet_category_id" required>
                                                                <option selected disabled value=""> - โปรดเลือก - </option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                โปรดระบุประเภทสัตว์เลี้ยง 
                                                            </div>
                                                            {!! $errors->first('pet_category_id', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class="form-group {{ $errors->has('sub_category') ? 'has-error' : ''}}">
                                                            <label for="sub_category" class="control-label">{{ 'สายพันธุ์' }}</label>
                                                            <input class="form-control" name="sub_category" type="text" id="sub_category" value="" placeholder="ระบุสายพันธุ์">
                                                            {!! $errors->first('sub_category', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-4 form-group">
                                                        <div class="form-group {{ $errors->has('photo_link') ? 'has-error' : ''}}">
                                                            <label for="photo_link" class="control-label">{{ 'รูปภาพ (ลิงก์)' }}</label>
                                                            <input class="form-control" name="photo_link" type="text" id="photo_link" value="" placeholder="กรอกลิงก์รูปภาพ">
                                                            {!! $errors->first('photo_link', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-12 form-group">
                                                        <div class=" form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
                                                            <br>
                                                            <label for="detail" class="control-label">{{ 'รายละเอียด' }}</label>
                                                            <textarea class="form-control" name="detail" type="textarea" rows="4" id="detail" value=""></textarea>
                                                            {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                </form>
                                        </div>
                                        <div class="col-lg-4 col-12 p-0 m-0 mt-2">
                                            <center>
                                                    <!-- มือถือ -->
                                                <div class="col-12 col-md-12 col-lg-12">
                                                    <br class="mt-5 d-block d-md-none">
                                                    <div class="phone-frame ml-5 modal-content" style="padding-top: 0px;">
                                                        <div class="row">
                                                            <div class="col-12 " style="background-color: #FFFFFF;  border-radius:50px 50px 0px 0px;margin-top:-0.5%">
                                                                <div class="row">
                                                                <div class="col-3 text-center">{{ date('H:i') }}</div>
                                                                <div class="col-6 phone-camera"></div>
                                                                <div class="col-3 d-flex align-items-center">
                                                                    <div class="col-12 p-0">
                                                                        <div class="row ">
                                                                            <div class="col p-0 phone-icon"><i class="fa-sharp fa-solid fa-signal-bars"></i></div>
                                                                            <div class="col p-0 phone-icon"><i class="fa-solid fa-wifi"></i></div>
                                                                            <div class="col p-0 phone-icon"><i class="fa-solid fa-battery-full"></i></div></div>
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                            <div class="phone-header">
                                                                <div class="row">
                                                                    <div class="col-7 phone-name ">
                                                                        <div class="row">
                                                                            <div class="col-2 text-center"><i class="fa-solid fa-chevron-left"></i></div>
                                                                            <div class="col-10 text-start p-0"> <img src="{{ asset('/peddyhub/images/icons/โล่.png') }}" alt="" width="8%"> PEDDyHUB</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-5 phone-icon-header">
                                                                        <div class="row ">
                                                                            <div class="col"><img src="{{ asset('/peddyhub/images/icons/search.png') }}" alt="" width="100%"></i></div>
                                                                            <div class="col"><img src="{{ asset('/peddyhub/images/icons/document.png') }}" alt="" width="100%"></div>
                                                                            <div class="col"><img src="{{ asset('/peddyhub/images/icons/more.png') }}" alt="" width="100%"></i></div>
                                                                            


                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div  class="phone-content" >
                                                                <div id="div_flex" class="col-12 remove-scrollbar div_img d-none" style="min-width: 100%;max-height: 100%;overflow:auto;cursor: grab;">
                                                                    <div class="col-12" >
                                                                        <div id="send-img">
                                                                            <img src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#b8205b 1px solid ; background-color:white;margin:5px;width:30px;height:30px;object-fit: contain;" alt="" >

                                                                            <div class="photo_flex_line">
                                                                                <img width="100%" style="border-radius:50px;background-color: #b8205b;" id="img_flex" src="{{ url('/peddyhub/images/more/flex_lost_pet.png') }}">
                                                                                <!-- img logo partner -->
                                                                                @php
                                                                                $user = \Illuminate\Support\Facades\Auth::user();
                                                                                $partner_logo = \App\Models\Partner::where('id' , '=' ,$user->partner)->get();
                                                                                @endphp
                                                                                @foreach($partner_logo as $item)
                                                                                    @if(empty($item->logo))
                                                                                    
                                                                                    <img id="" class="logo-partner position" src="{{ asset('/peddyhub/images/logo/logo-here.png') }}" alt="">
                                                                                    <div  class="test position p-0 m-0">
                                                                                        <span class="tooltip">หากท่านมีโลโก้ โปรดแจ้งผู้ดูแลระบบเราจะแสดงโลโกของท่านไว้ในตำแหน่งนี้</span> 
                                                                                    </div>
                                                                                    @else
                                                                                        <img id="" class="position logo-partner" src="{{ url('storage')}}/{{ $item->logo }}" alt="">
                                                                                    @endif
                                                                                @endforeach
                                                                                <!-- ตามหา pet -->
                                                                                <p class="find-pet position text-center">
                                                                                    <b>
                                                                                        ตามหา <span id="line_pet_category_id"></span> หาย
                                                                                    </b>
                                                                                </p>
                                                                                <!-- date lost -->
                                                                                <p class="date-lost position" id="line_date_now">
                                                                                </p>
                                                                                <!-- img pet -->
                                                                                <img id="img_lot_pet" class="position img-pet" src="{{ url('/peddyhub/images/PEDDyHUB sticker line/35.png')}}" alt="">
                                                                                <!-- pet name -->
                                                                                <p class="pet-name position text-center" id="line_pet_name">
                                                                                </p>
                                                                                <!-- pet age -->
                                                                                <p class="pet-age position text-center" id="line_pet_age">
                                                                                </p>
                                                                                <!-- pet category -->
                                                                                <p class="pet-category position" id="line_pet_category_id_2">
                                                                                    ไม่ระบุ
                                                                                </p>
                                                                                <!-- pet gender -->
                                                                                <p class="pet-gender position" id="line_pet_gender">
                                                                                </p>
                                                                                <!-- pet sub category -->
                                                                                <p class="pet-sub-category position" id="line_sub_category">
                                                                                </p>
                                                                                <!-- see more -->
                                                                                <a class="see-more position" onclick="see_more();"></a>
                                                                                <!-- phone -->
                                                                                <p class="phone position" id="line_owner_phone">
                                                                                    ไม่ระบุ
                                                                                </p>
                                                                                <!-- tel -->
                                                                                <a class="tel position add-phone" href="#" id="tel" >
                                                                                    <span class="tooltip">หากเพิ่มเบอร์เจ้าของจะสามารถกดที่ปุ่มเพื่อติดต่อไปยังเจ้าของได้ทันที</span>
                                                                                </a>
                                                                                <!-- owner name -->
                                                                                <p class="owner-name position" id="line_owner_name">
                                                                                    ไม่ระบุ
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                                                    
                                                                    <div id="div_line_detail" class="row d-none">
                                                                        <div class="d-flex justify-content-end">
                                                                            <div class="d-flex align-items-center">
                                                                                <p class="m-0 p-0 text-right"style="padding-right:10px;font-size:10px;line-height: 13px;margin-top:50px;">อ่านแล้ว <br>{{ date('H:i') }} น.</p>
                                                                            </div>
                                                                            <p class="p-2 m-2 " style="border-radius: 20px;background-color: #2DD284;padding-right:10px;font-size:13px">รายละเอียด</p>
                                                                        </div>
                                                                        
                                                                        <div class="d-flex justify-content-start">
                                                                            <div style="border-radius: 20px;font-size:13px;max-width:50%;">
                                                                            <img src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#b8205b 1px solid ; background-color:white;margin:5px;width:30px;height:30px;object-fit: contain;" alt="" >
                                                                            </div>

                                                                            <p class="p-2 m-2 " style="border-radius: 15px;background-color: #ffffff;padding-right:10px;font-size:13px;max-width:60%;"><span id="line_detail"></span></p>

                                                                            <div class="d-flex align-items-end" style="padding: 8px  8px  8px 0;">
                                                                                <p class="m-0 p-0 text-right mt-2"style="padding-right:10px;font-size:10px;line-height: 13px;">{{ date('H:i') }} น.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    

                                                                </div>
                                                                <div id="div_add_img" class="col-12 remove-scrollbar d-none" style="min-width: 100%;max-height: 250px;overflow:auto;cursor: grab;" onclick="document.querySelector('#photo').click();">
                                                                    <div class="col-12" >
                                                                        <div id="send-img">
                                                                            <img src="{{ asset('/peddyhub/images/logo/logo-2.png') }}" style="float: left;border-radius: 50%; padding:10px 0px; border:#b8205b 1px solid ; background-color:white;margin:5px;width:30px;height:30px;object-fit: contain;" alt="" >

                                                                            <div style="padding: 5px;">
                                                                                <img width="100%" style="border-radius:10px;background-color: #b8205b;" id="img_add_img" src="{{ url('/peddyhub/images/more/sos js100.png') }}">
                                                                            </div>
                                                                            <!-- <img src="{{ asset('/img/more/add_img_2.png') }}" alt="" width="100%" style="padding: 0px 5px;border-radius:10px" id="img_add_img"  > -->
                                                                        </div>
                                                                    </div>
                                                                    <p class="m-0 text-right d-flex justify-content-end"style="padding-right:10px;font-size:10px">{{ date('H:i') }} น.</p>
                                                                </div>
                                                            </div>
                                                            <div class="richmenu text-center" >
                                                                <img src="{{ asset('/peddyhub/images/richmenu/main-richmenu_new/ph_richmenu_th.png') }}" alt="" width="100%">
                                                            </div>
                                                            <div class="row phone-footer d-flex justify-content-start">
                                                                <div class="col d-flex justify-content-start" style="float: left;"><img src="{{ asset('/peddyhub/images/icons/keyboard.png') }}" alt="" width="20%"></div>
                                                                <div class="col d-flex justify-content-start" style="cursor: pointer;float: left;">
                                                                    <span onclick="document.querySelector('.richmenu').classList.toggle('d-none');
                                                                    document.querySelector('.phone-content').classList.toggle('no-richmenu');
                                                                    document.querySelector('#div_add_img').classList.toggle('no-richmenu');">เมนู▾</span>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<!-- Modal new token -->
<div class="modal fade" id="new_token" tabindex="-1" role="dialog" aria-labelledby="new_tokenLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="new_tokenLabel">ยืนยันการสร้างโทเค็น</h5>
            <button id="closs_new_token" type="button" class="close btn btn-lg" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <center>
                        <img width="50%" class="" src="{{ url('/peddyhub/images/PEDDyHUB sticker line/09.png')}}" alt="">
                        <br><br>
                        <h6 class="text-dark">
                            การสร้างโทเค็นใหม่ส่งผลให้โทเค็นก่อนหน้าไม่สามารถใช้งานได้
                        </h6>
                        <h5 class="text-danger">
                            ยืนยันการสร้างใหม่หรือไม่ ?
                        </h5>
                    </center>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button> -->
            <button style="width:100%;" class="btn btn-info text-white main-shadow main-radius" onclick="Create_Token();">
                สร้างโทเค็นใหม่
            </button>
        </div>
    </div>
  </div>
</div>


<input class="d-none" type="text" id="by_partner" name="by_partner" value="{{ Auth::user()->partner }}">

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        color_flex();
        // console.log("START");
        select_province();
        select_category();
        check();
        
        document.querySelector('#btn_how_to_use_api').click();
    });

    function Create_Token() {
        let id_partner = document.querySelector('#by_partner').value;
        let gen_token = document.querySelector('#gen_token');

        fetch("{{ url('/') }}/api/Create_Token/" + id_partner)
            .then(response => response.text())
            .then(result => {

                // console.log(result);
                gen_token.value = result;
            });

        document.querySelector('#alert_text').innerHTML = "สร้างโทเคนใหม่แล้ว";
        document.querySelector('#alert_copy').classList.add('up_down');

        const animated = document.querySelector('.up_down');

        document.querySelector('#closs_new_token').click();

        animated.onanimationend = () => {
            document.querySelector('#alert_copy').classList.remove('up_down');
        };

    }

    function CopyToClipboard(containerid) {
        if (document.selection) {
            var range = document.body.createTextRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
        }

        document.querySelector('#alert_text').innerHTML = "คัดลอกเรียบร้อย";
        document.querySelector('#alert_copy').classList.add('up_down');

        const animated = document.querySelector('.up_down');
        animated.onanimationend = () => {
            document.querySelector('#alert_copy').classList.remove('up_down');
        };
    }
</script>
    
<!-- ตัวอย่างการใช้งาน API LOST PET -->
<script>
    function API_Lost_pet(){
        
        const date_now = new Date().toLocaleDateString();
        // let select_province = document.querySelector('#select_province').value;
        // let select_amphoe = document.querySelector('#select_amphoe').value;
        // let select_tambon = document.querySelector('#select_tambon').value;
        let owner_name = document.querySelector('#owner_name').value;
        let owner_phone = document.querySelector('#owner_phone').value;
        let pet_name = document.querySelector('#pet_name').value;
        let pet_age = document.querySelector('#pet_age').value;
        let pet_gender = document.getElementsByName("pet_gender");
        let select_category = document.querySelector('#form_select_category').value;
        let sub_category = document.querySelector('#sub_category').value;
        let photo_link = document.querySelector('#photo_link').value;
        let detail = document.querySelector('#detail').value;

        document.querySelector('#line_date_now').innerHTML = date_now;
        document.querySelector('#line_pet_name').innerHTML = pet_name;
        document.querySelector('#line_pet_age').innerHTML = pet_age;

        if (owner_phone != "" ) {
            document.querySelector('#line_owner_phone').innerHTML = owner_phone;
            document.querySelector('#tel').href = "tel:" + owner_phone;
            document.querySelector('#tel').classList.remove('add-phone');
        }else{
            document.querySelector('#tel').classList.add('add-phone');
            document.querySelector('#line_owner_phone').innerHTML = "ไม่ระบุ";
            
        }

        if (owner_name != "" ) {
            document.querySelector('#line_owner_name').innerHTML = owner_name;
        }else{
            document.querySelector('#line_owner_name').innerHTML = "ไม่ระบุ";
        }

        for (let f of pet_gender) {
            if (f.checked) {
                document.querySelector('#line_pet_gender').innerHTML = f.value;
            }
        }

        if (select_category != "" ) {
            document.querySelector('#line_pet_category_id').innerHTML = select_category;
            document.querySelector('#line_pet_category_id_2').innerHTML = select_category;

        }else{
            document.querySelector('#line_pet_category_id').innerHTML = "ไม่ระบุ";
            document.querySelector('#line_pet_category_id_2').innerHTML = "ไม่ระบุ";

        }
        
        if (sub_category != "" ) {
            document.querySelector('#line_sub_category').innerHTML = sub_category;

        }else{
            document.querySelector('#line_sub_category').innerHTML = "ไม่ระบุ";
        }

        if (detail != "" ) {
            document.querySelector('#line_detail').innerHTML = detail;

        }else{
            document.querySelector('#line_detail').innerHTML = "ไม่ระบุ";
        }
        
        
        if (photo_link != "" ) {
            document.querySelector('#img_lot_pet').src = photo_link ;
        }else{
            document.querySelector('#img_lot_pet').src = "https://www.peddyhub.com/peddyhub/images/PEDDyHUB%20sticker%20line/35.png" ;
        }
        
        document.querySelector('#send-img').classList.remove('sand');
        document.querySelector('#div_flex').classList.remove('d-none');

        setTimeout(function(){ 
            document.querySelector('#send-img').classList.add('sand');
        }, 100);
        document.querySelector('#div_line_detail').classList.add('d-none');
        document.querySelector('.richmenu').classList.toggle('d-none');
        document.querySelector('.phone-content').classList.toggle('no-richmenu');
        document.querySelector('#div_add_img').classList.toggle('no-richmenu');
    }

    function select_province() {
        let select_province = document.querySelector('#select_province');

        fetch("{{ url('/') }}/api/select_province/")
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_province.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกจังหวัด -";
                option_select.value = "";
                select_province.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.changwat_th;
                    option.value = item.changwat_th;
                    select_province.add(option);
                }
            });
    }

    function select_category() {
        let select_category = document.querySelector('#form_select_category');

        fetch("{{ url('/') }}/api/select_category/")
            .then(response => response.json())
            .then(result => {

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.name;
                    option.value = item.name;
                    select_category.add(option);
                }

            });
    }

    function select_A() {
        let select_province = document.querySelector('#select_province');
        let select_amphoe = document.querySelector('#select_amphoe');

        fetch("{{ url('/') }}/api/select_amphoe" + "/" + select_province.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_amphoe.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกอำเภอ -";
                option_select.value = "";
                select_amphoe.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.amphoe_th;
                    option.value = item.amphoe_th;
                    select_amphoe.add(option);
                }
            });
    }

    function select_T() {
        let select_province = document.querySelector('#select_province');
        let select_amphoe = document.querySelector('#select_amphoe');
        let select_tambon = document.querySelector('#select_tambon');

        fetch("{{ url('/') }}/api/select_tambon" + "/" + select_province.value + "/" + select_amphoe.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                select_tambon.innerHTML = "";

                let option_select = document.createElement("option");
                option_select.text = "- เลือกตำบล -";
                option_select.value = "";
                select_tambon.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.tambon_th;
                    option.value = item.tambon_th;
                    select_tambon.add(option);
                }
            });
    }

    function input_pet_age(){
        let pet_age_Y = document.querySelector('#pet_age_Y').value ;
        let pet_age_M = document.querySelector('#pet_age_M').value ;
        let pet_age = document.querySelector('#pet_age') ;

        // -------- เอา required ออก ----------
        if (pet_age_Y && pet_age_M) {
            pet_age.value = pet_age_Y + " ปี " + pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(pet_age_Y && !pet_age_M){
            pet_age.value = pet_age_Y + " ปี " ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(!pet_age_Y && pet_age_M){
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        if (pet_age_Y == "0" && pet_age_M) {
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        if (pet_age_Y && pet_age_M == "0") {
            pet_age.value = pet_age_Y + " ปี" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        // -------- ใส่ required  ----------
        if (pet_age_M == "0" && pet_age_Y == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && pet_age_M == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (pet_age_Y == "0" && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }
    }
</script>
<script>
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>
<script>
    function input_pet_age(){
        let pet_age_Y = document.querySelector('#pet_age_Y').value ;
        let pet_age_M = document.querySelector('#pet_age_M').value ;
        let pet_age = document.querySelector('#pet_age') ;

        // -------- เอา required ออก ----------
        if (pet_age_Y && pet_age_M) {
            pet_age.value = pet_age_Y + " ปี " + pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(pet_age_Y && !pet_age_M){
            pet_age.value = pet_age_Y + " ปี " ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        else if(!pet_age_Y && pet_age_M){
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }
        if (pet_age_Y == "0" && pet_age_M) {
            pet_age.value = pet_age_M + " เดือน" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        if (pet_age_Y && pet_age_M == "0") {
            pet_age.value = pet_age_Y + " ปี" ;
            document.querySelector('#pet_age_M').required = false ;
            document.querySelector('#pet_age_Y').required = false ;
        }

        // -------- ใส่ required  ----------
        if (pet_age_M == "0" && pet_age_Y == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (!pet_age_Y && pet_age_M == "0") {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }

        if (pet_age_Y == "0" && !pet_age_M) {
            pet_age.value = null ;
            document.querySelector('#pet_age_M').required = true ;
            document.querySelector('#pet_age_Y').required = true ;
        }
    }
</script>
<script>
    function check() {
        let allAreFilled = true;
        document.getElementById("test_api").querySelectorAll("[required]").forEach(function(i) {
            if(!allAreFilled) return;
            if(!i.value) allAreFilled = false;
            if(i.type === "radio") {
                let radioValueCheck = false;				          
                document.getElementById("test_api").querySelectorAll(`[name=${i.name}]`).forEach(function(r) {
                    if(r.checked) radioValueCheck = true;
                })
                    allAreFilled = radioValueCheck;
            }
        })
        if(!allAreFilled) {
            var btn_check = document.getElementById("send_API_Lost_pet1").type = "submit";
        }else{
            API_Lost_pet();
        }
    };
</script>
<script>
    function see_more(){
        const element = document.getElementById("div_line_detail");

        document.querySelector('#div_line_detail').classList.remove('d-none');

        
        ;

        setTimeout(function(){ 
            element.scrollIntoView();

            document.querySelector('#div_line_detail').classList.add('sand');
        }, 100);
    }
</script>
<script>
    function color_flex()
    {

    	let user_organization = document.querySelector('#user_organization').value ;
    	// console.log(user_organization);

    	fetch("{{ url('/') }}/api/check_data_partner/" + user_organization)
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                console.log(result[0]['class_color_menu']);
                let delayInMilliseconds = 200; 
                if(result[0]['color_navbar']){
                    document.querySelector('#img_flex').style = "background: " + result[0]['color_navbar'] + ";border-radius: 5px;" ;
                }else{
                    document.querySelector('#img_flex').style = "background: #B8205B;border-radius: 5px;" ;
                }
                
		});
    }
</script>
@endsection