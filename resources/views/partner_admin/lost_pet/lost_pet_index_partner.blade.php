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
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!--end row-->


</div>

<!-- Modal how_to_use_api -->
<div class="modal fade" id="how_to_use_api" tabindex="-1" role="dialog" aria-labelledby="how_to_use_apiLabel" aria-hidden="true">
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
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="accordion main-radius main-shadow" id="accordionExample" style="padding: 10px;">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="margin-top:5px;">
                                        ข้อมูลรับเข้า (Input) <i class="fa-solid fa-caret-down"></i>
                                </h5>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            ชื่อ
                                        </div>
                                        <div class="col-4">
                                            ประเภทข้อมูล
                                        </div>
                                        <div class="col-4">
                                            คำอธิบาย
                                        </div>
                                        <hr>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            Token
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            โทเค็นสำหรับตรวจสอบ
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            province
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            จังหวัด
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            amphoe
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            อำเภอ
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            tambon
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            ตำบล
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            owner_name
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            ชื่อเจ้าของสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            owner_phone
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            เบอร์ติดต่อเจ้าของสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            pet_name
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            ชื่อสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            pet_age
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            อายุสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            pet_category
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            ประเภทสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            sub_category
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            สายพันธุ์สัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            pet_gender
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            เพศสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            detail
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            รายละเอียด / ลักษณะของสัตว์เลี้ยง
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            photo_link
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            รูปภาพ (ลิงก์)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    ข้อมูลส่งกลับ (Output) <i class="fa-solid fa-caret-down"></i>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            ข้อมูล
                                        </div>
                                        <div class="col-4">
                                            ประเภทข้อมูล
                                        </div>
                                        <div class="col-4">
                                            หมายเหตุ
                                        </div>
                                        <hr>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            ส่งข้อมูลเรียบร้อยแล้ว ขอบคุณค่ะ
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            ดำเนินการเรียบร้อย
                                        </div>
                                        <!-- ------------------------------ -->
                                        <div class="col-4">
                                            ไม่สามารถดำเนินการได้ กรุณาติดต่อ PEDDyHUB
                                        </div>
                                        <div class="col-4">
                                            "String"
                                        </div>
                                        <div class="col-4">
                                            พบข้อผิดพลาด
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    ตัวอย่างการใช้งาน (Usage) <i class="fa-solid fa-caret-down"></i>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-8">
                                            <!-- DATA -->
                                            <div class="row">
                                                <div class="col-9 col-md-9">
                                                    <label for="Token" class="form-label">Token</label>
                                                    <input class="form-control" type="text" name="Token" id="Token" value="{{ $token }}" readonly>
                                                </div>
                                                <div class="col-3 col-md-3">
                                                    <label class="form-label"><br></label>
                                                    <button id="send_API_Lost_pet" class="btn btn-info text-white main-shadow main-radius" style="width:100%;" onclick="API_Lost_pet();" > <!-- disabled -->
                                                        ส่งข้อมูล
                                                    </button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <label for="select_province" class="form-label">จังหวัด</label>
                                                    <select name="select_province" id="select_province" class="form-control" onchange="select_A();">
                                                        <option value="">- เลือกจังหวัด -</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label for="select_amphoe" class="form-label">อำเภอ</label>
                                                    <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T();">
                                                        <option value="">- เลือกอำเภอ -</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <label for="select_tambon" class="form-label">ตำบล</label>
                                                    <select name="select_tambon" id="select_tambon" class="form-control" >
                                                        <option value="">- เลือกตำบล -</option>
                                                    </select>
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
                                                        <input class="form-control" name="owner_name" type="text" id="owner_name" value="" placeholder="ชื่อเจ้าของ" >
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
                                                        <input class="form-control" name="pet_name" type="text" id="pet_name" value="{{ isset($lost_pet->pet_name) ? $lost_pet->pet_name : ''}}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <div class="form-group {{ $errors->has('pet_age') ? 'has-error' : ''}}">
                                                        <label for="pet_age" class="control-label">{{ 'อายุสัตว์เลี้ยง' }}</label>
                                                        <div class="input-group mb-3">
                                                            <input class="form-control" name="pet_age" type="number" id="pet_age_Y" value="" placeholder="ปี" onchange="input_pet_age();" min="0" >
                                                            <input class="form-control" name="pet_age" type="number" id="pet_age_M" value="" style="border-radius: 0px 5px 5px 0px;" placeholder="เดือน" onchange="input_pet_age();" min="0">
                                                        </div>
                                                        <input class="form-control d-none" name="pet_age" type="text" id="pet_age" value="" readonly>
                                                        {!! $errors->first('pet_category_id', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <div class="form-group {{ $errors->has('pet_gender') ? 'has-error' : ''}}">
                                                        <label for="pet_gender" class="control-label">{{ 'เพศ' }}</label>
                                                        <div style="margin-top:8px;" class="form-group">
                                                            <input type="radio" class="form-check-input" id="pet_gender_M" name="pet_gender" value="ชาย">
                                                            <label class="form-check-label" for="pet_gender_M">ชาย</label>
                                                             &nbsp;&nbsp;

                                                            <input type="radio" class="form-check-input" id="pet_gender_w" name="pet_gender" value="หญิง">
                                                            <label class="form-check-label" for="pet_gender_w">หญิง</label>&nbsp;&nbsp;


                                                            <input checked type="radio" class="form-check-input" id="pet_gender_O" name="pet_gender" value="ไม่ระบุ">
                                                            <label class="form-check-label" for="pet_gender_O">ไม่ระบุ</label> &nbsp;&nbsp;
                                                            <div class="invalid-feedback">โปรดระบุเพศสัตว์เลี้ยง.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4 form-group">
                                                    <div class="form-group {{ $errors->has('pet_category_id') ? 'has-error' : ''}}">
                                                        <label for="pet_category_id" class="control-label">{{ 'ประเภทสัตว์เลี้ยง' }}</label>
                                                        <select style="margin:0px;" id="select_category" name="pet_category_id" class="form-control">
                                                            <option class="translate" value="" selected> - โปรดเลือก - </option>
                                                        </select>
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
                                        </div>
                                        <div class="col-4">
                                            <!-- มือถือ -->

                                            <!-- FLEX LINE -->
                                            <div id="flex_line" class="d-none">
                                                <center>
                                                    <img style="margin-top: 15px;margin-bottom: 15px; width: 90%;background-color: #CCFFFF;" src="{{ url('/peddyhub/images/more/sos js100 (368 × 650px) (4).png') }}">
                                                </center>
                                                <div style="position: absolute;top: 19%;" class="d-">
                                                    <b>ตามหา <span id="line_pet_category_id"></span> หาย</b>
                                                    <center>
                                                        <img id="img_lot_pet" style="width: 55%;border-radius: 50%;border-color: white;" class="" src="{{ url('/peddyhub/images/PEDDyHUB sticker line/35.png')}}" alt="">
                                                        <br>
                                                        <h4><u><span id="line_pet_name"></span></u></h4>
                                                        <span id="line_pet_age"></span>
                                                    </center>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <b>วันที่หาย : </b><span id="line_date_now"></span>
                                                        </div>
                                                        <div class="col-6">
                                                            <b>ประเภท : </b><span id="line_pet_category_id_2"></span>
                                                        </div>
                                                        <div class="col-6">
                                                            <b>เพศ : </b><span id="line_pet_gender"></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <b>สายพันธุ์ : </b><span id="line_sub_category"></span>
                                                        </div>
                                                        <div class="col-12" >
                                                            <b>รายละเอียด : </b><span class="btn" onclick="document.querySelector('#div_line_detail').classList.remove('d-none');"><u>ดูเพิ่มเติม</u>  ↗️</span>
                                                        </div>
                                                        <div class="col-12">
                                                            <b>โทร : </b><span id="line_owner_phone"></span>
                                                        </div>
                                                        <div class="col-12">
                                                            <b>เจ้าของ : </b><span id="line_owner_name"></span>
                                                        </div>
                                                    </div>
                                                    <div id="div_line_detail" class="row d-none">
                                                        <div class="col-12">
                                                            <b>รายละเอียด : </b><span id="line_detail"></span>
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
            <br>
        </div>
        <div class="modal-footer d-none">
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
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
        // console.log("START");
        select_province();
        select_category();
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
        const date_now = new Date();
        // let select_province = document.querySelector('#select_province').value;
        // let select_amphoe = document.querySelector('#select_amphoe').value;
        // let select_tambon = document.querySelector('#select_tambon').value;
        let owner_name = document.querySelector('#owner_name').value;
        let owner_phone = document.querySelector('#owner_phone').value;
        let pet_name = document.querySelector('#pet_name').value;
        let pet_age = document.querySelector('#pet_age').value;
        let pet_gender = document.getElementsByName("pet_gender");
        let select_category = document.querySelector('#select_category').value;
        let sub_category = document.querySelector('#sub_category').value;
        let photo_link = document.querySelector('#photo_link').value;
        let detail = document.querySelector('#detail').value;

        document.querySelector('#line_date_now').innerHTML = date_now;
        document.querySelector('#line_owner_name').innerHTML = owner_name;
        document.querySelector('#line_owner_phone').innerHTML = owner_phone;
        document.querySelector('#line_pet_name').innerHTML = pet_name;
        document.querySelector('#line_pet_age').innerHTML = pet_age;
        for (let f of pet_gender) {
            if (f.checked) {
                document.querySelector('#line_pet_gender').innerHTML = f.value;
            }
        }
        document.querySelector('#line_pet_category_id').innerHTML = select_category;
        document.querySelector('#line_pet_category_id_2').innerHTML = select_category;
        document.querySelector('#line_sub_category').innerHTML = sub_category;
        document.querySelector('#line_detail').innerHTML = detail;
        document.querySelector('#img_lot_pet').src = photo_link ;

        document.querySelector('#flex_line').classList.remove('d-none');
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
        let select_category = document.querySelector('#select_category');

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

@endsection