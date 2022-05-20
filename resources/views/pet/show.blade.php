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
  width: 449px;
    }
</style>
<div class="container rotatea d-block d-md-none notranslate" width="999px" style="margin-left:-45px;">
    <div class="card col-lg-5 col-12 " style="border: 2px solid #B8205B;padding:2px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
        <div class="card-body" style="padding:5px;">
            <div class="row">
                <div class="col-2 text-center d-flex align-items-center">
                    @php
                    $pet_category = $pet->pet_category_id ;
                    @endphp
                    @switch( $pet_category )
                    @case (1)
                    <i class="fas fa-dog" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (2)
                    <i class="fas fa-cat " style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (3)
                    <i class="fas fa-dove" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (4)
                    <i class="fas fa-fish" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (5)
                    <i class="fas fa-rabbit" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (6)
                    <i class="fas fa-spider" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @endswitch
                </div>
                <div class="col-10" style="padding-left: 2px;">
                    <p style="font-size: 21px;margin:0px;">
                        บัตรประจำตัว
                    </p>
                    <div class="row" style="margin-left:2px;">
                        <div class="col-4" style="font-size: 12px;padding: 0px;margin-top:-10px;">
                            <span> <b> เลขประจำตัว</b></span><br>
                            <span style="color:#B8205B"> <b> indentification Number</b></span>
                        </div>
                        <div class="col-6" style="padding: 0px;margin-top:-7px;">
                            <span> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div style="font-size: 12px;">
                        <span> <b> ชื่อตัวและชื่อสกุล</b></span>
                        <span style="font-size:20px;">
                            <b>
                                @switch( $pet->gender )
                                @case ("ชาย")
                                เด็กชาย
                                @break
                                @case ("หญิง")
                                เด็กหญิง
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
                            <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt="">
                        </div>
                        <div class="div2">
                            <span style="font-size: 12px;"> <b> เกิดวันที่ </b></span> <span> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;color:#B8205B"> <b> Date Of Birth </b></span> <span style="color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;"> <b> เบอร์ </b></span> <span> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span>
                        </div>
                        <div class="div3 d-flex align-items-end">
                            <img src="{{ url('storage/'.$pet->photo )}}" width="100%" alt="image of pet" title="pet" class="fluid customer">
                        </div>
                        <div class="div4">
                            <span style="font-size: 14px;"> <b> ที่อยู่</b></span> <span style="font-size: 18px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                        </div>
                        <div class="div5">
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;"> <b>วันออกบัตร</b></p>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>Date of Issue</b></p>
                        </div>
                        <div class="div6 text-center ">
                            <br>
                            @if(!empty($pet->profile->real_name))
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>({{ $pet->profile->real_name }})</b></p>
                            @else
                            <p style="font-size: 13px; margin:0px;"> <b>({{ $pet->profile->name }})</b></p>
                            @endif
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>เจ้าของ</b></p>
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
<div class="container d-none d-lg-block notranslate" >
    <div class="card col-lg-5 col-12 " style="border: 2px solid #B8205B;padding:2px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
        <div class="card-body" style="padding:5px;">
            <div class="row">
                <div class="col-2 text-center d-flex align-items-center">
                    @php
                    $pet_category = $pet->pet_category_id ;
                    @endphp
                    @switch( $pet_category )
                    @case (1)
                    <i class="fas fa-dog" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (2)
                    <i class="fas fa-cat " style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (3)
                    <i class="fas fa-dove" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (4)
                    <i class="fas fa-fish" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (5)
                    <i class="fas fa-rabbit" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @case (6)
                    <i class="fas fa-spider" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                    @break
                    @endswitch
                </div>
                <div class="col-10" style="padding-left: 2px;">
                    <p style="font-size: 21px;margin:0px;">
                        บัตรประจำตัว
                    </p>
                    <div class="row" style="margin-left:2px;">
                        <div class="col-4" style="font-size: 12px;padding: 0px;margin-top:-10px;">
                            <span> <b> เลขประจำตัว</b></span><br>
                            <span style="color:#B8205B"> <b> indentification Number</b></span>
                        </div>
                        <div class="col-6" style="padding: 0px;margin-top:-7px;">
                            <span> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div style="font-size: 12px;">
                        <span> <b> ชื่อตัวและชื่อสกุล</b></span>
                        <span style="font-size:20px;">
                            <b>
                                @switch( $pet->gender )
                                @case ("ชาย")
                                เด็กชาย
                                @break
                                @case ("หญิง")
                                เด็กหญิง
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
                            <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt="">
                        </div>
                        <div class="div2">
                            <span style="font-size: 12px;"> <b> เกิดวันที่ </b></span> <span> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;color:#B8205B"> <b> Date Of Birth </b></span> <span style="color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                            <span style="font-size: 12px;"> <b> เบอร์ </b></span> <span> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span>
                        </div>
                        <div class="div3 d-flex align-items-end">
                            <img src="{{ url('storage/'.$pet->photo )}}" width="100%" alt="image of pet" title="pet" class="fluid customer">
                        </div>
                        <div class="div4">
                            <span style="font-size: 14px;"> <b> ที่อยู่</b></span> <span style="font-size: 18px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                        </div>
                        <div class="div5">
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;"> <b>วันออกบัตร</b></p>
                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>Date of Issue</b></p>
                        </div>
                        <div class="div6 text-center ">
                            <br>
                            @if(!empty($pet->profile->real_name))
                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>({{ $pet->profile->real_name }})</b></p>
                            @else
                            <p style="font-size: 13px; margin:0px;"> <b>({{ $pet->profile->name }})</b></p>
                            @endif
                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>เจ้าของ</b></p>
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
<br><br>
<button type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#exampleModalCenter">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="container">
                    <div class="card col-lg-12 col-12 " style="border: 2px solid #B8205B;padding:2px;background-image: url('{{ asset('/peddyhub/images/background/pattern-4.png') }}');background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
                        <div class="card-body" style="padding:5px;">
                            <div class="row">
                                <div class="col-2 text-center d-flex align-items-center">
                                    @php
                                    $pet_category = $pet->pet_category_id ;
                                    @endphp
                                    @switch( $pet_category )
                                    @case (1)
                                    <i class="fas fa-dog" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @case (2)
                                    <i class="fas fa-cat " style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @case (3)
                                    <i class="fas fa-dove" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @case (4)
                                    <i class="fas fa-fish" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @case (5)
                                    <i class="fas fa-rabbit" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @case (6)
                                    <i class="fas fa-spider" style="font-size:25px;background-color: white;  border-radius: 25px;border: 1px solid black;padding:10px;"></i>
                                    @break
                                    @endswitch
                                </div>
                                <div class="col-10" style="padding-left: 2px;">
                                    <p style="font-size: 21px;margin:0px;">
                                        บัตรประจำตัว
                                    </p>
                                    <div class="row" style="margin-left:2px;">
                                        <div class="col-4" style="font-size: 12px;padding: 0px;margin-top:-10px;">
                                            <span> <b> เลขประจำตัว</b></span><br>
                                            <span style="color:#B8205B"> <b> indentification Number</b></span>
                                        </div>
                                        <div class="col-6" style="padding: 0px;margin-top:-7px;">
                                            <span> <b> {{ $pet->pet_category_id}} {{ date_format($pet->created_at,"Y") }} {{ str_pad($pet->id, 5, '0', STR_PAD_LEFT) }} 52 1</b></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div style="font-size: 12px;">
                                        <span> <b> ชื่อตัวและชื่อสกุล</b></span>
                                        <span style="font-size:20px;">
                                            <b>
                                                @switch( $pet->gender )
                                                @case ("ชาย")
                                                เด็กชาย
                                                @break
                                                @case ("หญิง")
                                                เด็กหญิง
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
                                            <img height="80px" src="{{ asset('/peddyhub/images/check_in/catsanova/qr_code_check_in_catsanova.png') }}" alt="">
                                        </div>
                                        <div class="div2">
                                            <span style="font-size: 12px;"> <b> เกิดวันที่ </b></span> <span> <b>{{ thaidate("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                                            <span style="font-size: 12px;color:#B8205B"> <b> Date Of Birth </b></span> <span style="color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->birth)) }}</b></span><br>
                                            <span style="font-size: 12px;"> <b> เบอร์ </b></span> <span> <b> {{ preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', '$1-$2-$3', $pet->profile->phone)  }} </b></span>
                                        </div>
                                        <div class="div3 d-flex align-items-end">
                                            <img src="{{ url('storage/'.$pet->photo )}}" width="100%" alt="image of pet" title="pet" class="fluid customer">
                                        </div>
                                        <div class="div4">
                                            <span style="font-size: 14px;"> <b> ที่อยู่</b></span> <span style="font-size: 18px;"> <b>{{ $pet->profile->tambon_th }} {{ $pet->profile->amphoe_th }} {{ $pet->profile->changwat_th }}</b></span><br>
                                        </div>
                                        <div class="div5">
                                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>{{ thaidate("j M Y" , strtotime($pet->created_at)) }}</b></p>
                                            <p style="font-size: 13px;margin:0px;"> <b>วันออกบัตร</b></p>
                                            <p style="font-size: 13px;margin:0px;line-height: 0.5;color:#B8205B"> <b>{{ date("j M Y" , strtotime($pet->created_at)) }}</b></p>
                                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>Date of Issue</b></p>
                                        </div>
                                        <div class="div6 text-center ">
                                            <br>
                                            @if(!empty($pet->profile->real_name))
                                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>({{ $pet->profile->real_name }})</b></p>
                                            @else
                                            <p style="font-size: 13px; line-height: 0.5;margin:0px;"> <b>({{ $pet->profile->name }})</b></p>
                                            @endif
                                            <p style="font-size: 13px;margin:0px;color:#B8205B"> <b>เจ้าของ</b></p>
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
            
        
    </div>
</div>
<div class="row d-none">
    @include('admin.sidebar')

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Pet {{ $pet->id }}</div>
            <div class="card-body">

                <a href="{{ url('/pet') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                <a href="{{ url('/pet/' . $pet->id . '/edit') }}" title="Edit Pet"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                <form method="POST" action="{{ url('pet' . '/' . $pet->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Pet" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                </form>
                <br />
                <br />

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th> User Id </th>
                                <td> {{ $pet->user_id }} </td>
                            </tr>
                            <tr>
                                <th> Name </th>
                                <td> {{ $pet->name }} </td>
                            </tr>
                            <tr>
                                <th> Birth </th>
                                <td> {{ $pet->birth }} </td>
                            </tr>
                            <tr>
                                <th> Photo </th>
                                <td> {{ $pet->photo }} </td>
                            </tr>
                            <tr>
                                <th> Gender </th>
                                <td> {{ $pet->gender }} </td>
                            </tr>
                            <tr>
                                <th> Size </th>
                                <td> {{ $pet->size }} </td>
                            </tr>
                            <tr>
                                <th> Age </th>
                                <td> {{ $pet->age }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</div>
@endsection