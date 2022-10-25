@extends('layouts.partner.theme_partner')

@section('content')
<div class="container-fluid translate">
    <div class="row">
        <div class="col-md-12">
            <div class="card radius-10" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="padding-right:0px;">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h2 style="margin-top: 10px;">ประกาศตามหาสัตว์เลี้ยงหาย</h2>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="{{ url('/lost_pet_by_partner') }}" class="btn btn-success text-white main-shadow main-radius" style="width:20%;float: right;margin-right: 20px;margin-top: 10px;">
                                เพิ่มประกาศใหม่
                            </a>
                        </div>
                    </div>

                    <div class="main-wrapper pet check" style="padding: 10px;">
                        <div class="pet service">
                            <section class="contact" style="margin-top:10px;">
                                <div class="row d-flex justify-content-end">
                                    <hr>
                                    <div class="col-12 col-md-12">
                                        <div style="margin-top: 10px;" class="row">
                                            <div class="col-12 col-md-7">
                                                <input type="text" class="form-control" name="gen_token" id="gen_token" value="{{ $token }}" readonly>
                                            </div>
                                            <div class="col-12 col-md-1">
                                                <span style="width:100%;" class="btn btn-secondary text-white main-shadow main-radius" onclick="CopyToClipboard('gen_token')">
                                                    Copy
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <span style="width:100%;" class="btn btn-warning text-white main-shadow main-radius" onclick="Create_Token();">
                                                    Create Token
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <span style="width:100%;" class="btn btn-info text-white main-shadow main-radius">
                                                    วิธีใช้งาน API
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>

                    <div class="main-wrapper pet check" style="padding: 10px;">
                        <div class="pet service">
                            <section class="contact" style="margin-top:10px;">
                                <div class="row">
                                    <hr>
                                    <div class="col-12 col-md-12">
                                        <div class="row">
                                            @foreach($lost_pet as $item)
                                                <div class="col-lg-3 col-md-6 col-sm-12 m-0 p-2">
                                                    <a href="{{ url('/lost_pet/' . $item->id) }}" class="unset-hover">
                                                        <div class="card-lost-pet">
                                                            @if(!empty($item->photo_link))
                                                                <img width="100%" class="img-lost-pet"src="{{ url('storage/'.$item->photo_link )}}" alt="" >
                                                            @else
                                                                <img width="100%" class="img-lost-pet"src="{{ url('storage/'.$item->photo )}}" alt="" >
                                                            @endif
                                                            <div class="container-lost-pet">
                                                                <div class="about-lost-pet ">
                                                                    <div class="column pt-1 pb-1 text-center">
                                                                        <div >
                                                                            <span class="name">
                                                                                {{ $item->pet_name }}
                                                                            </span>
                                                                            
                                                                        </div>
                                                                        <div>
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
                                                                        </div>
                                                                        <div>
                                                                            <span class="location">
                                                                                {{ $item->changwat_th }} {{ $item->amphoe_th }} {{ $item->tambon_th }}
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <hr class="p-0 m-0">
                                                                    <div class="detail-lost-pet">
                                                                        <span class="text"> 
                                                                            • {{ $item->pet_category->name }}
                                                                            @if(!empty($item->sub_category))
                                                                                • {{ $item->sub_category }}
                                                                            @endif
                                                                            <br>
                                                                            <b>อายุ : </b>{{ $item->pet_age }}
                                                                        </span>
                                                                    </div>
                                                                    <hr class="p-0 m-0">
                                                                    <div class="div-tag">
                                                                        <div>
                                                                            <b>สถานะ : </b>
                                                                            @if($item->status == "found")
                                                                                <span class="tag-found">เจอแล้ว</span>
                                                                            @else
                                                                                <span class="tag-lost">กำลังค้นหา</span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="contacts">
                                                                            @if(!empty( $item->owner_name ))
                                                                                <span>
                                                                                    <b>เจ้าของ : </b>{{ $item->owner_name }}
                                                                                </span> 
                                                                            @endif
                                                                            <br>
                                                                            @if(!empty( $item->owner_phone ))
                                                                                <a href="tel:{{ $item->owner_phone }}" class="btn-lost-pet ml-2">
                                                                                    <i class="fa-solid fa-phone"></i> {{ $item->owner_phone }}
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>    
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input class="d-none" type="text" id="by_partner" name="by_partner" value="{{ Auth::user()->partner }}" >

<script>
    function Create_Token(){
        let id_partner = document.querySelector('#by_partner').value ;
        let gen_token = document.querySelector('#gen_token') ;

        fetch("{{ url('/') }}/api/Create_Token/" + id_partner)
            .then(response => response.text())
            .then(result => {

                // console.log(result);
                gen_token.value = result ;
            });
    }

    function CopyToClipboard(containerid) {
        var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
    }
</script>
@endsection
