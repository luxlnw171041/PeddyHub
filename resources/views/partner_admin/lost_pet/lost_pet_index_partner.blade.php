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
}.font-kanit{
    font-family: 'Kanit', sans-serif;
}
</style>
<div id="alert_copy" class="div_alert" role="alert">
    <span id="alert_text">
        คัดลอกเรียบร้อย
    </span>
</div>

<div class="page-content font-kanit">
    <div class="row">
        <div class="col-12">
            <div class="card lost-pet-header">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h4>ประกาศตามหาสัตว์เลี้ยงหาย</h4>
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
                                    <div class="position-relative">
                                        <input type="text" class="form-control token" name="gen_token" id="gen_token" value="{{ $token }}" readonly>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <span style="width:100%;" class="btn btn-secondary text-white main-shadow main-radius" onclick="CopyToClipboard('gen_token')">
                                            Copy
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <span style="width:100%;" class="btn btn-warning text-white main-shadow main-radius" onclick="Create_Token();">
                                            Create Token
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="btn-group" role="group">
                                        
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info text-white main-shadow main-radius" data-toggle="modal" data-target="#exampleModal">
                                            วิธีใช้งาน API
                                        </button>
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
                           ดูเพิ่มเติม ▼
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">วิธีใช้งาน API</h5>
        <button type="button" class="close btn btn-lg" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<input class="d-none" type="text" id="by_partner" name="by_partner" value="{{ Auth::user()->partner }}">

<script>
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
        animated.onanimationend = () => {
            document.querySelector('#alert_copy').classList.remove('up_down');
        };
    }

    function CopyToClipboard(containerid) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("copy");

        document.querySelector('#alert_text').innerHTML = "คัดลอกเรียบร้อย";
        document.querySelector('#alert_copy').classList.add('up_down');

        const animated = document.querySelector('.up_down');
        animated.onanimationend = () => {
            document.querySelector('#alert_copy').classList.remove('up_down');
        };
    }
</script>

@endsection