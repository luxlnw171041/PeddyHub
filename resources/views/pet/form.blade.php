<style>
    .fill {
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden
    }

    .full_img {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .parent {
        position: relative;
        /* define context for absolutly positioned children */
        /* size set by image in this case */
        background-image: url('https://placehold.it/400');
        background-size: cover;
        background-position: center center;
    }

    .parent img {
        display: block;
    }

    .parent:after {
        content: '';
        /* :after has to have a content... but you don't want one */

        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;

        background: rgba(0, 0, 0, 0);

        transition: 1s;
    }

    .parent:hover:after {
        background: rgba(0, 0, 0, .5);
    }

    .parent:hover .child {
        opacity: 1;
    }

    .child {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);

        z-index: 5;
        /* only works when position is defined */
        /* think of a stack of paper... this element is now 5 higher than the bottom */

        color: white;

        opacity: 0;
        transition: .5s;
    }

    .btn-file {
        position: relative;
        overflow: hidden;
    }

    .btn-peddyhub {
        background: #B8205B;
        color: white;
        font-family: 'Sarabun', sans-serif;
        width: 100%;
    }

    .btn-nosubmit {
        background: none;
        color: #B8205B;
        font-family: 'Sarabun', sans-serif;
        width: 100%;
        text-decoration: underline;
        font-weight: bold;
    }

    .btn-peddyhub:hover {
        color: white;
        background: #BE3A6D;
    }

    .btn-nosubmit:hover {
        background: none;
        color: #B8205B;
    }

    .select2-selection--single {
        border-radius: 25px 0px 25px 25px !important;
        padding: 20px !important;
        width: 100% !important;
    }

    .selection {
        margin-top: 0px !important;
    }

    .select2-container {
        box-sizing: border-box;
        margin-top: 10px !important;
        position: relative;
        vertical-align: middle;
        min-width: 100% !important;

    }

    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        margin-top: -15px !important;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }
    
.input-wrapper input {
  height: 100%;
  text-overflow: ellipsis;
  font-family: inherit;
  background: none;
  color: inherit;
  top: 0;
  left: 0;
  font-size: inherit;
  line-height: inherit;
  padding: inherit;
  position: absolute;
  box-sizing: border-box;
  width: 100%;
}

.size-span {
  font-family: inherit;
  white-space: pre;
  height: 1em;
  display: inline-block;
  font-size: inherit;
  line-height: inherit;
  box-sizing: border-box;
  position: relative;
  opacity: 0;
  min-width: 60px;
  user-select: none;
  vertical-align: top;
}

.input-wrapper {
  position: relative;
  box-sizing: border-box;
  line-height: 1em;
  font-size: 14px;
  padding: 4px 8px;
  display: inline-block;
  max-width: 100%;
  text-overflow: ellipsis;
  overflow: hidden;
}
</style>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <!-- ข้อมูล USER -->
                @if(empty(Auth::user()->profile->tambon_th)
                or empty(Auth::user()->profile->phone) )
                <div id="data_user" class="faq wow fadeInRight">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="heading">
                            <p class="wow fadeInUp">
                                <span class="purple"><i class="fas fa-paw"></i></span>
                                <span class="orange"><i class="fas fa-paw"></i> </span>
                                <span class="purple"><i class="fas fa-paw"></i> </span>
                            </p>
                            <h3>
                                ข้อมูลของคุณ
                                <span class="wow pulse" data-wow-delay="1s"></span>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @if(empty(Auth::user()->profile->tambon_th) or empty(Auth::user()->profile->phone))
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ที่อยู่ปัจจุบันของคุณ' }}</b></label>
                                        <span class="text-danger">*</span>
                                        @if(!empty(Auth::user()->profile->changwat_th))
                                        <a class="text-secondary" href="{{ url('/user/' . Auth::user()->id . '/edit') }}">
                                            แก้ไขข้อมูล
                                        </a>
                                        @endif
                                    </div>
                                    <input class="d-none" type="text" id="check_changwat_th" value="{{ Auth::user()->profile->changwat_th }}">
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->changwat_th))
                                        <input class="form-control" type="text" value="{{ Auth::user()->profile->changwat_th }}" readonly>
                                        @else
                                        <select name="select_province" id="select_province" class="form-control" onchange="select_A(); check();" required>
                                            <option value="" selected>- เลือกจังหวัด -</option>

                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->amphoe_th))
                                        <input class="form-control" type="text" value="{{ Auth::user()->profile->amphoe_th }}" readonly>
                                        @else
                                        <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T(); check();" required>
                                            <option value="" selected>- เลือกอำเภอ -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->tambon_th))
                                        <input class="form-control" type="text" value="{{ Auth::user()->profile->tambon_th }}" readonly>
                                        @else
                                        <select name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng(); check();" required>
                                            <option value="" selected>- เลือกตำบล -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        <input type="text" name="phone_user" id="phone_user" class="form-control" placeholder="เบอร์ติดต่อ" required value="{{ Auth::user()->profile->phone }}" onchange="check();">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if( request()->get('edit') == 'airplane')
                @if(empty(Auth::user()->profile->photo_passport)
                or empty(Auth::user()->profile->photo_id_card))
                <div id="data_user" class="faq wow fadeInRight">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="heading">
                            <p class="wow fadeInUp">
                                <span class="purple"><i class="fas fa-paw"></i></span>
                                <span class="orange"><i class="fas fa-paw"></i> </span>
                                <span class="purple"><i class="fas fa-paw"></i> </span>
                            </p>
                            <h3 class="text-capitalize">
                                เอกสารเดินทาง
                                <span class="wow pulse" data-wow-delay="1s"></span>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    @if(empty(Auth::user()->profile->photo_id_card))
                                    <div class="col-12 col-md-4">
                                        <label class="control-label"><b>{{ 'บัตรประชาชน' }}</b></label>
                                        <label class="col-12" style="padding:0px;" for="photo_id_card" onchange="check();">
                                            <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                                <div class="form-group">
                                                    <input class="form-control" name="photo_id_card" style="margin:20px 0px 10px 0px" type="file" id="photo_id_card" value="{{ Auth::user()->profile->photo_id_card }}" accept="image/*" onchange="document.getElementById('show_photo_id_card').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_id_card" />
                                                <div class="child">
                                                    <span>เลือกรูป</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @endif
                                    @if(empty(Auth::user()->profile->photo_passport))
                                    <div class="col-12 col-md-4">
                                        <label class="control-label"><b>{{ 'พาสปอร์ต' }}</b></label>
                                        <label class="col-12" style="padding:0px;" for="photo_passport" onchange="check();">
                                            <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                                <div class="form-group">
                                                    <input class="form-control" name="photo_passport" style="margin:20px 0px 10px 0px" type="file" id="photo_passport" value="{{ Auth::user()->profile->photo_passport}}" accept="image/*" onchange="document.getElementById('show_photo_passport').src = window.URL.createObjectURL(this.files[0])">
                                                </div>
                                                <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_passport" />
                                                <div class="child">
                                                    <span>เลือกรูป</span>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
                <!-- จบข้อมูล USER -->
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="heading">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                            </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                        <h3 class="text-capitalize">ข้อมูลสัตว์เลี้ยง <span class="wow pulse" data-wow-delay="1s"></span></h3>
                        @if( request()->get('edit') != 'airplane')
                        <div class="faq wow fadeInRight">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-11 text-capitalize" onclick="location.href='?edit=airplane'">เพิ่มเอกสารเดินทาง</button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-12 ">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ชื่อสัตว์เลี้ยง' }} <span style="color: #B8205B;">*</span></b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10 ">
                                    <div class="form-group">
                                        <input style="margin:0px;" class="form-control" name="name" type="text" id="name" value="{{ isset($pet->name) ? $pet->name : ''}}" required onchange="check();">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'รูป' }} <span style="color: #B8205B;">* <span style="font-size:13px;">อย่างน้อย 1 รูป</span> </span></b></label><br>
                                    </div>
                                </div>
                                <div class="row col-12 m-0 p-0 text-center ">
                                    @if(!empty($pet->photo))
                                    <label class="col-4" style="padding:0px;" for="photo" onchange="check();">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="d-none form-control" style="margin:20px 0px 10px 0px" name="photo" type="file" id="photo" value="{{ isset($pet->photo) ? $pet->photo : ''}}" accept="image/*" onchange="document.getElementById('show_photo_1').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_1" src="{{ url('storage')}}/{{ $pet->photo }}" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @else
                                    <label class="col-4" style="padding:0px;" for="photo" onchange="check();">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" style="margin:20px 0px 10px 0px" name="photo" type="file" id="photo" value="{{ isset($pet->photo) ? $pet->photo : ''}}" accept="image/*" onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @endif
                                    @if(!empty($pet->photo_2))
                                    <label id="div_photo_2" for="photo_2" class="col-4" style="padding:0px;" onchange="check();">
                                        <div class=" fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="d-none form-control" name="photo_2" style="margin:20px 0px 10px 0px" type="file" id="photo_2" value="{{ isset($pet->photo_2) ? $pet->photo_2 : ''}}" accept="image/*" onchange="document.getElementById('show_photo_2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo_2" alt="your image" src="{{ url('storage')}}/{{ $pet->photo_2 }}" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @elseif(!empty($pet->photo))
                                    <label id="div_photo_2" for="photo_2" class="col-4 " style="padding:0px;" onchange="check();">
                                        <div class=" fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_2" style="margin:20px 0px 10px 0px" type="file" id="photo_2" value="{{ isset($pet->photo_2) ? $pet->photo_2 : ''}}" accept="image/*" onchange="document.getElementById('show_photo_2_1').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo_2_1" alt="your image" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @else
                                    <label id="div_photo_2" for="photo_2" class="col-4 d-none" style="padding:0px;" onchange="check();">
                                        <div class=" fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_2" style="margin:20px 0px 10px 0px" type="file" id="photo_2" value="{{ isset($pet->photo_2) ? $pet->photo_2 : ''}}" accept="image/*" onchange="document.getElementById('show_photo2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo2" alt="your image" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @endif


                                    @if(!empty($pet->photo_3))
                                    <label id="div_photo_3" for="photo_3" class="col-4" style="padding:0px;" onchange="check();">
                                        <div class="fill  parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="d-none form-control" name="photo_3" style="margin:20px 0px 10px 0px" type="file" id="photo_3" value="{{ isset($pet->photo_3) ? $pet->photo_3 : ''}}" accept="image/*" onchange="document.getElementById('show_photo3_1').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo3_1" alt="your image" src="{{ url('storage')}}/{{ $pet->photo_3 }}" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @elseif(!empty($pet->photo_2))
                                    <label id="div_photo_3" for="photo_3" class="col-4" style="padding:0px;" onchange="check();">
                                        <div class="fill  parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_3" style="margin:20px 0px 10px 0px" type="file" id="photo_3" value="{{ isset($pet->photo_3) ? $pet->photo_3 : ''}}" accept="image/*" onchange="document.getElementById('show_photo3').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo3" alt="your image" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @else
                                    <label id="div_photo_3" for="photo_3" class="col-4 d-none" style="padding:0px;" onchange="check();">
                                        <div class="fill  parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_3" style="margin:20px 0px 10px 0px" type="file" id="photo_3" value="{{ isset($pet->photo_3) ? $pet->photo_3 : ''}}" accept="image/*" onchange="document.getElementById('show_photo3').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo3" alt="your image" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @endif
                                </div>
                                @if( request()->get('edit') == 'airplane')
                                <div class="row col-4 m-0 p-0 text-center ">
                                    @if(!empty($pet->photo_medical_certificate))
                                    <label class="col-12" style="padding:0px;" for="photo_medical_certificate" onchange="check();">
                                        <label class="control-label"><b>{{ 'ใบตรวจสุขภาพสัตว์เลี้ยง' }}</b></label>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="d-none form-control" name="photo_medical_certificate" style="margin:20px 0px 10px 0px" type="file" id="photo_medical_certificate" value="{{ isset($pet->photo_medical_certificate) ? $pet->photo_medical_certificate : ''}}" accept="image/*" onchange="document.getElementById('show_photo_medical_certificate_2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_medical_certificate_2" src="{{ url('storage')}}/{{ $pet->photo_medical_certificate }}" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @else
                                    <label class="control-label"><b>{{ 'ใบตรวจสุขภาพสัตว์เลี้ยง' }}</b></label>
                                    <label class="col-12" style="padding:0px;" for="photo_medical_certificate" onchange="check();">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_medical_certificate" style="margin:20px 0px 10px 0px" type="file" id="photo_medical_certificate" value="{{ isset($pet->photo_medical_certificate) ? $pet->photo_medical_certificate : ''}}" accept="image/*" onchange="document.getElementById('show_photo_medical_certificate').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_medical_certificate" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    @endif
                                </div>


                                <!-- <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ใบฉีดวัคฉีน' }}</b></label><br>
                                    </div>
                                </div> -->
                                <div class="row col-12 m-0 p-0 text-center ">
                                    <label class="col-4" style="padding:0px;" for="photo_vaccine" onchange="check(); document.querySelector('#date_vaccine_rabies').focus();">
                                        <label class="control-label"><b>{{ 'วัคซีนพิษสุนัขบ้า' }}</b></label><br>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_vaccine" style="margin:20px 0px 10px 0px" type="file" id="photo_vaccine" value="{{ isset($pet->photo_vaccine) ? $pet->photo_vaccine : ''}}" accept="image/*" onchange="document.getElementById('show_vaccine').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->photo_vaccine))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine" src="{{ url('storage')}}/{{ $pet->photo_vaccine }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_vaccine_2" class="col-4" style="padding:0px;" for="photo_vaccine_2" onchange="check(); document.querySelector('#date_vaccine_flea').focus();">
                                        <label class="control-label"><b>{{ 'วัคซีนเห็บหมัด' }}</b></label><br>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_vaccine_2" style="margin:20px 0px 10px 0px" type="file" id="photo_vaccine_2" value="{{ isset($pet->photo_vaccine_2) ? $pet->photo_vaccine_2 : ''}}" accept="image/*" onchange="document.getElementById('show_vaccine2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->photo_vaccine_2))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine2" src="{{ url('storage')}}/{{ $pet->photo_vaccine_2 }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine2" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_vaccine_3" class="col-4" style="padding:0px;" for="photo_vaccine_3" onchange="check();">
                                        <label class="control-label"><b>{{ 'ใบฉีดวัคฉีนอื่นๆ' }}</b></label><br>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="photo_vaccine_3" style="margin:20px 0px 10px 0px" type="file" id="photo_vaccine_3" value="{{ isset($pet->photo_vaccine_3) ? $pet->photo_vaccine_3 : ''}}" accept="image/*" onchange="document.getElementById('show_vaccine3').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->photo_vaccine_3))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine3" src="{{ url('storage')}}/{{ $pet->photo_vaccine_3 }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_vaccine3" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="row col-12 m-0 p-0 text-center ">
                                    <label class="col-4" style="padding:0px;" for="certificate" onchange="check();">
                                        <div class="col-12 text-center" style="margin-bottom:10px;padding:0px;">
                                            <div class="col-12 d-flex justify-content-center" style="padding: 0px;">
                                                <!-- <label class="control-label"><b>{{ 'เอกสารอื่นๆ' }}</b></label> -->
                                                @if(!empty($pet->name_certificate))
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;width:auto" class="form-control" name="name_certificate" type="text" id="name_certificate" value="{{ isset($pet->name_certificate) ? $pet->name_certificate : '' }}" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen " style="vertical-align: text-bottom;"></i>
                                                @else
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;" class="form-control" name="name_certificate" type="text" id="name_certificate" placeholder="เอกสารอื่นๆ1" value="" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen"></i>
                                                @endif
                                                <br>
                                            </div>
                                        </div>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate" style="margin:20px 0px 10px 0px" type="file" id="certificate" value="{{ isset($pet->certificate) ? $pet->certificate : ''}}" accept="image/*" onchange="document.getElementById('show_certificate').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->certificate))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate" src="{{ url('storage')}}/{{ $pet->certificate }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_certificate_2" class="col-4 d-none" style="padding:0px;" for="certificate_2" onchange="check();">
                                        <div class="col-12 text-center" style="margin-bottom:10px;padding:0px;">
                                            <div class="col-12 d-flex justify-content-center" style="padding: 0px;">
                                                <!-- <label class="control-label"><b>{{ 'เอกสารอื่นๆ' }}</b></label> -->
                                                @if(!empty($pet->name_certificate_2))
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;width:auto" class="form-control" name="name_certificate_2" type="text" id="name_certificate_2" value="{{ isset($pet->name_certificate_2) ? $pet->name_certificate_2 : '' }}" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen " style="vertical-align: text-bottom;"></i>
                                                @else
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;" class="form-control" name="name_certificate_2" type="text" id="name_certificate_2"  placeholder="เอกสารอื่นๆ2" value="" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen"></i>
                                                @endif
                                                <br>
                                            </div>
                                        </div>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate_2" style="margin:20px 0px 10px 0px" type="file" id="certificate_2" value="{{ isset($pet->certificate_2) ? $pet->certificate_2 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->certificate_2))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate2" src="{{ url('storage')}}/{{ $pet->certificate_2 }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate2" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_certificate_3" class="col-4 d-none" style="padding:0px;" for="certificate_3" onchange="check();">
                                        <div class="col-12 text-center" style="margin-bottom:10px;padding:0px;">
                                            <div class="col-12 d-flex justify-content-center" style="padding: 0px;">
                                                <!-- <label class="control-label"><b>{{ 'เอกสารอื่นๆ' }}</b></label> -->
                                                @if(!empty($pet->name_certificate_3))
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;width:auto" class="form-control" name="name_certificate_3" type="text" id="name_certificate_3" value="{{ isset($pet->name_certificate_3) ? $pet->name_certificate_3 : '' }}" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen " style="vertical-align: text-bottom;"></i>
                                                @else
                                                <div class="input-wrapper">
                                                    <span class="size-span"></span>
                                                    <input oninput="updateChange(event)" style="margin:0px;padding: 0px;border:none;background:none;border-radius:0px;" class="form-control" name="name_certificate_3" type="text" id="name_certificate_3"  placeholder="เอกสารอื่นๆ3" value="" onchange="check();">
                                                </div>
                                                <i class="fa-light fa-pen"></i>
                                                @endif
                                                <br>
                                            </div>
                                        </div>
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate_3" style="margin:20px 0px 10px 0px" type="file" id="certificate_3" value="{{ isset($pet->certificate_3) ? $pet->certificate_3 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate3').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @if(!empty($pet->certificate_3))
                                            <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate3" src="{{ url('storage')}}/{{ $pet->certificate_3 }}" />
                                            @else
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate3" />
                                            @endif
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-6 col-md-12 order-2">
                                    <label class="control-label"><b>{{ 'เพศ' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <select style="margin:0px;" name="gender" class="form-control" id="gender" required onchange="check();">
                                            <option value='' selected> - โปรดเลือก - </option>
                                            <!-- <option value='ชาย'>Male</option>
                                            <option value='หญิง'>Female</option>
                                            <option value='ไม่ระบุ'>Not Specified</option> -->

                                            @foreach (json_decode('{
                                                "ชาย":"เพศชาย",
                                                "หญิง":"เพศหญิง",
                                                "ไม่ระบุ":"ไม่ระบุ"}',
                                            true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($pet->gender) && $pet->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-12 order-3">
                                    <label class="control-label"><b>{{ 'วันเกิด' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <input style="margin:0px;" class="form-control" name="birth" type="date" id="birth" value="{{ isset($pet->birth) ? $pet->birth : ''}}" required onchange="check();">
                                    </div>
                                </div>
                                @if( request()->get('edit') == 'airplane')
                                <div class="col-12 col-md-12 col-lg-12 order-5">
                                    <label class="control-label"><b>{{ 'วัคซีนพิษสุนัขบ้า' }} </b></label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <input style="margin:0px;" class="form-control" name="date_vaccine_rabies" type="text" id="date_vaccine_rabies" value="{{ isset($pet->date_vaccine_rabies) ? $pet->date_vaccine_rabies : ''}}" placeholder="ฉีดครั้งล่าสุด" onMouseOver="(this.type='date')" onMouseOut="(this.type='text')" onchange="check();">
                                            </div>
                                            <div class="col-6">
                                                <input style="margin:0px;" class="form-control" name="date_next_rabies" type="text" id="date_next_rabies" value="{{ isset($pet->date_next_rabies) ? $pet->date_next_rabies : ''}}" placeholder="ฉีดครั้งถัดไป" onMouseOver="(this.type='date')" onMouseOut="(this.type='text')" onchange="check();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-12 order-6">
                                    <label class="control-label"><b>{{ 'วัคซีนเห็บหมัด' }} </b></label>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <input style="margin:0px;" class="form-control" name="date_vaccine_flea" type="text" id="date_vaccine_flea" value="{{ isset($pet->date_vaccine_flea) ? $pet->date_vaccine_flea : ''}}" placeholder="ฉีดครั้งล่าสุด" onMouseOver="(this.type='date')" onMouseOut="(this.type='text')" onchange="check();">
                                            </div>
                                            <div class="col-6">
                                                <input style="margin:0px;" class="form-control" name="date_next_flea" type="text" id="date_next_flea" value="{{ isset($pet->date_next_flea) ? $pet->date_next_flea : ''}}" placeholder="ฉีดครั้งถัดไป" onMouseOver="(this.type='date')" onMouseOut="(this.type='text')" onchange="check();">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <!-- <div class="col-lg-12 col-md-12 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ช่วงอายุ ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <select name="age" class="form-control" id="age" required>
                                            <option value='' selected > - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e40\u0e14\u0e47\u0e01":"\u0e40\u0e14\u0e47\u0e01","\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19":"\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19","\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48":"\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48"}', true) as $optionKey => $optionValue)
                                                <option value="{{ $optionKey }}" {{ (isset($pet->age) && $pet->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->


                                <div class="col-12 col-md-12 order-1">
                                    <label class="control-label"><b>{{ 'ประเภท' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <select style="margin:0px;" id="select_category" name="pet_category_id" class="form-control" onchange="sub_cat(); species_select(); check();" required>
                                            @if(!empty($pet->pet_category_id))
                                            <option class="translate" value="{{ $pet->pet_category_id }}" selected>{{$pet->pet_category->name}}</option>
                                            @else
                                            <option class="translate" value="" selected> - โปรดเลือก - </option>
                                            @endif
                                        </select>

                                        <select style="margin:10px 0px 0px 0px;" id="select_sub_category" name="sub_category" class="form-control d-none">
                                            @if(!empty($pet->size))
                                            <option class="translate" value="{{ $pet->size }}" selected>{{$pet->size}}</option>
                                            @elseif(!empty($pet->sub_category))
                                            <option class="translate" value="{{ $pet->sub_category }}" selected>{{$pet->sub_category}}</option>
                                            @else
                                            <option class="translate" value="" selected> - โปรดเลือก - </option>
                                            @endif
                                        </select>
                                        <select style="margin:10px 0px 0px 0px;" id="select_species" name="species" class="form-control d-none" onchange="sub_size();">
                                            @if(!empty($pet->species))
                                            <option class="translate" value="{{ $pet->species }}" selected>{{$pet->species}}</option>
                                            @else
                                            <option class="translate" value="" selected> - โปรดเลือก - </option>
                                            @endif
                                        </select>
                                        <select style="margin:10px 0px 0px 0px;" id="select_size" name="size" class="form-control d-none">
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-12 col-md-12 order-4">
                                    <label class="control-label"><b>{{ 'กรุ๊ปเลือด' }} </label>
                                    <div class="form-group">
                                        <input style="margin:0px;" class="form-control" name="blood_type" type="text" id="blood_type" value="{{ isset($pet->blood_type) ? $pet->blood_type : ''}}" onchange="check();">

                                    </div>
                                </div>
                                <!-- <div class="col-6 col-md-12 order-4">
                                    <label class="control-label"><b>{{ 'ขนาดสัตว์เลี้ยง' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <select style="margin:0px;" name="size" class="form-control" id="size" required>
                                            <option value='' selected> - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e40\u0e25\u0e47\u0e01":"\u0e40\u0e25\u0e47\u0e01","\u0e01\u0e25\u0e32\u0e07":"\u0e01\u0e25\u0e32\u0e07","\u0e43\u0e2b\u0e0d\u0e48":"\u0e43\u0e2b\u0e0d\u0e48"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($pet->size) && $pet->size == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12"></div>
                </div>
            </div>
            <div class="faq wow fadeInRight">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <button class="btn btn-11 " type="reset" onclick="history.back()">Back</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-end">
                                <button id="btn-modal" type="button" class="btn btn-11" data-toggle="modal" data-target="#modal_loadning" onclick="submitform()" disabled>
                                    Update
                                </button>

                                <button id="btn-modal_emptyalert_lost_pet" type="button" class="btn btn-11" onclick="document.querySelector('#btn_modal_alert_lost_pet').click();" disabled>
                                    Update
                                </button>

                                <button id="btn-submit-form" type="submit" class="btn btn-11 form-control d-none" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- Button modal_alert_lost_pet -->
<button type="button" class="btn btn-primary d-none" id="btn_modal_alert_lost_pet" data-toggle="modal" data-target="#modal_alert_lost_pet">
</button>

<input class="form-control d-none" type="text" name="input_alert_lost_pet" id="input_alert_lost_pet" value="{{ Auth::user()->profile->alert_lost_pet }}">

<!-- Modal -->
<div class="modal fade" id="modal_alert_lost_pet" tabindex="-1" role="dialog" aria-labelledby="examplemodal_alert_lost_pet" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center">
                    <img src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/15.png') }}" alt="" width="50%">
                    <br><br>
                    <h5 style="font-family: 'Sarabun', sans-serif;"> <b>ยินยอมให้ส่งข้อความตามหาสัตว์เลี้ยง</b> </h5>
                    <br>
                    <p style="font-family: 'Sarabun', sans-serif;">
                        ท่านมีความยินยอมที่จะให้เว็บไซต์ PEDDyHUB ส่งข้อความประกาศตามหาสัตว์เลี้ยงประเภทใดบ้าง
                        <br>
                        <span class="text-danger">* เลือกได้มากกว่า 1 ข้อ</span>
                    </p>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div style="padding: 7px;float: right;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_all_alert" id="check_all_alert" onclick="click_check_all_alert();">&nbsp;&nbsp;ทั้งหมด
                        </div>
                    </div>
                    <br>
                    <div class="col-6">
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_1" id="check_categories_1" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-dog"  style="font-size:20px;color:#F7B000;"></i>&nbsp;&nbsp;สุนัข
                        </div>
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_2" id="check_categories_2" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-cat " style="font-size:20px;color:#02DBFF;"></i>&nbsp;&nbsp;แมว
                        </div>
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_3" id="check_categories_3" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-dove" style="font-size:20px;color:#49AED9;"></i>&nbsp;&nbsp;นก
                        </div>
                    </div>
                    <div class="col-6">
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_4" id="check_categories_4" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-fish" style="font-size:20px;color:#63AB86;"></i>&nbsp;&nbsp;ปลา
                        </div>
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_5" id="check_categories_5" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-rabbit" style="font-size:20px;color:#DB4C75;"></i>&nbsp;&nbsp;สัตว์เล็ก
                        </div>
                        <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                            <input checked type="checkbox" name="check_categories_6" id="check_categories_6" onclick="click_check();">
                            &nbsp;&nbsp;<i class="fas fa-spider" style="font-size:20px;color:black;"></i>&nbsp;&nbsp;Exotic
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-peddyhub" data-dismiss="modal" onclick="submitform()">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary d-none" id="btn-submit" data-toggle="modal" data-target="#exampleModalCenter">
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/11.png') }}" alt="" width="35%">
                <h5 style="font-family: 'Sarabun', sans-serif;"> <b>ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง</b> </h5>
                <p style="font-family: 'Sarabun', sans-serif;">ท่านมีความยินยอมที่จะให้เว็บไซต์ PEDDyHUB นำสัตว์เลี้ยงของท่านไปใช้ในระบบหาคู่สัตว์เลี้ยง</p>
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-peddyhub" data-dismiss="modal" onclick="petdating()">ยินยอม</button>
                    </div>
                    <div class="col-6">
                        <a href="{{ url('/')}}" style="font-family: 'Sarabun', sans-serif;" type="button" class="btn btn-nosubmit"> <u> ไม่ยินยอม</u></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<input class="form-control" name="provider_id" type="hidden" id="provider_id" value="{{ isset($pet->provider_id) ? $pet->provider_id : Auth::user()->provider_id}}"  readonly>
<input type="text" class="d-none" name="language_user" id="language_user" value="{{ Auth::user()->profile->language }}">
<input type="text" class="d-none" name="certificate" id="input_certificate" value="{{ isset($pet->certificate) ? $pet->certificate : ''}}">
<input type="text" class="d-none" name="certificate_2" id="input_certificate_2" value="{{ isset($pet->certificate_2) ? $pet->certificate_2 : ''}}">
<input type="text" class="d-none" name="certificate_3" id="input_certificate_3" value="{{ isset($pet->certificate_3) ? $pet->certificate_3 : ''}}">
<input type="text" class="d-none" name="photo_vaccine" id="input_vaccine" value="{{ isset($pet->photo_vaccine) ? $pet->photo_vaccine : ''}}">
<input type="text" class="d-none" name="photo_vaccine_2" id="input_vaccine_2" value="{{ isset($pet->photo_vaccine_2) ? $pet->photo_vaccine_2 : ''}}">
<input type="text" class="d-none" name="photo_vaccine_3" id="input_vaccine_3" value="{{ isset($pet->photo_vaccine_3) ? $pet->photo_vaccine_3 : ''}}">
<input type="text" class="d-none" name="input_photo" id="input_photo" value="{{ isset($pet->photo) ? $pet->photo : ''}}">

<input type="text" name="login" class="d-none" id="login" value="{{request()->get('login')}}">
<a id="btn_change_language" class="d-none" href=""></a>



<script>
    document.getElementById("photo").addEventListener("input", function() {
        if (this.value) {
            document.querySelector('#div_photo_2').classList.remove('d-none');
            document.querySelector('#show_photo').classList.remove('d-none');
            document.querySelector('#photo').classList.add('d-none');

        }
    });
    document.getElementById("photo_2").addEventListener("input", function() {
        if (photo_2.value) {
            document.querySelector('#div_photo_3').classList.remove('d-none');
            document.querySelector('#show_photo2').classList.remove('d-none');
            document.querySelector('#photo_2').classList.add('d-none');
        }
    });
    document.getElementById("photo_2").addEventListener("input", function() {
        if (photo_2.value) {
            document.querySelector('#div_photo_3').classList.remove('d-none');
            document.querySelector('#photo_2').classList.add('d-none');
            document.querySelector('#show_photo_2_1').classList.remove('d-none');
        }
    });


    document.getElementById("photo_3").addEventListener("input", function() {
        if (photo_3.value) {
            document.querySelector('#show_photo3').classList.remove('d-none');
            document.querySelector('#photo_3').classList.add('d-none');
        }
    });
</script>

<script>
    document.getElementById("photo_passport").addEventListener("input", function() {
        if (photo_passport.value) {
            document.querySelector('#show_photo_passport').classList.remove('d-none');
            document.querySelector('#photo_passport').classList.add('d-none');
        }
    });
    document.getElementById("photo_id_card").addEventListener("input", function() {
        if (photo_id_card.value) {
            document.querySelector('#show_photo_id_card').classList.remove('d-none');
            document.querySelector('#photo_id_card').classList.add('d-none');
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        let input_alert_lost_pet = document.querySelector('#input_alert_lost_pet').value;

        if (input_alert_lost_pet) {
            document.querySelector('#btn-modal_emptyalert_lost_pet').classList.add('d-none');
            document.querySelector('#btn-modal').classList.remove('d-none');
        }else{
            document.querySelector('#btn-modal_emptyalert_lost_pet').classList.remove('d-none');
            document.querySelector('#btn-modal').classList.add('d-none');
        }

        let certificate_1 = document.querySelector('#input_certificate');
        let certificate_2 = document.querySelector('#input_certificate_2');
        let certificate_3 = document.querySelector('#input_certificate_3');
        let vaccine_1 = document.querySelector('#input_vaccine');
        let vaccine_2 = document.querySelector('#input_vaccine_2');
        let vaccine_3 = document.querySelector('#input_vaccine_3');


        if (certificate_1.value) {
            document.querySelector('#certificate').classList.add('d-none');
            document.querySelector('#div_certificate_2').classList.remove('d-none');
        }
        if (certificate_2.value) {
            document.querySelector('#certificate_2').classList.add('d-none');
            document.querySelector('#div_certificate_3').classList.remove('d-none');

        }
        if (certificate_3.value) {
            document.querySelector('#certificate_3').classList.add('d-none');
        }
        if (vaccine_1.value) {
            document.querySelector('#photo_vaccine').classList.add('d-none');
            document.querySelector('#div_vaccine_2').classList.remove('d-none');

        }
        if (vaccine_2.value) {
            document.querySelector('#photo_vaccine_2').classList.add('d-none');
            document.querySelector('#div_vaccine_3').classList.remove('d-none');

        }
        if (vaccine_3.value) {
            document.querySelector('#photo_vaccine_3').classList.add('d-none');

        }

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {

        // console.log("START");
        let check_changwat_th = document.querySelector('#check_changwat_th');
        select_category();

        if (!check_changwat_th.value) {
            select_province();
        }
        
    });

    var language_user = document.querySelector('#language_user').value;
    // console.log(language_user);


    function select_province() {
        let select_province = document.querySelector('#select_province');

        fetch("{{ url('/') }}/api/select_province/")
            .then(response => response.json())
            .then(result => {
                //console.log(result);

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

    function select_A() {
        let select_province = document.querySelector('#select_province');
        let select_amphoe = document.querySelector('#select_amphoe');

        fetch("{{ url('/') }}/api/select_amphoe" + "/" + select_province.value)
            .then(response => response.json())
            .then(result => {
                //console.log(result);

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

        change_language_user();
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

        change_language_user();

    }

    function select_category() {
        let select_category = document.querySelector('#select_category');

        fetch("{{ url('/') }}/api/select_category/")
            .then(response => response.json())
            .then(result => {
                // if (!{{$pet_category_id}}) {
                //     select_category.innerHTML = "";
                // }
                let option_select = document.createElement("option");
                option_select.text = "- เลือกประเภท -";
                option_select.value = "";
                select_category.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.name;
                    option.value = item.id;
                    select_category.add(option);
                }

            });
            
    }

    function sub_cat() {
        let select_category = document.querySelector('#select_category');
        let select_sub_category = document.querySelector('#select_sub_category');

        let counter = 0;
        fetch("{{ url('/') }}/api/select_sub_category" + "/" + select_category.value)
            .then(response => response.json())
            .then(result => {

                select_sub_category.innerHTML = "";

                let option_select = document.createElement("option");


                option_select.text = "- เลือกประเภทย่อย -";
                
                option_select.value = "";
                select_sub_category.add(option_select);

                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.sub_category;
                    option.value = item.sub_category;
                    select_sub_category.add(option);
                    counter++;
                }
                if (counter >= 1) {
                    document.querySelector('#select_sub_category').classList.remove('d-none');
                } else {
                    document.querySelector('#select_sub_category').classList.add('d-none');
                }
            });
            change_language_user();

    }

    function sub_size() {
        let select_category = document.querySelector('#select_category');
        let select_size = document.querySelector('#select_size');
        let counter = 0;

        var e = document.getElementById("select_category");
        var value = e.options[e.selectedIndex].value;
        var text = e.options[e.selectedIndex].text;

        fetch("{{ url('/') }}/api/select_size" + "/" + select_category.value)
            .then(response => response.json())
            .then(result => {

                select_size.innerHTML = "";

                let option_select = document.createElement("option");

                if (text === 'สุนัข') {
                    option_select.text = "- เลือกขนาด -";
                } else if (text === 'แมว') {
                    option_select.text = "- เลือกขน -";
                } else {
                    option_select.text = "- เลือกประเภทย่อย -";
                }
                option_select.value = "";

                select_size.add(option_select);
                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.size;
                    option.value = item.size;
                    select_size.add(option);
                    counter++;

                }
                if (counter >= 1) {
                    document.querySelector('#select_size').classList.remove('d-none');
                } else {
                    document.querySelector('#select_size').classList.add('d-none');
                }
            });
            change_language_user();
    }

    function species_select() {
        let select_category = document.querySelector('#select_category');
        let select_species = document.querySelector('#select_species');
        let counter = 0;

        fetch("{{ url('/') }}/api/select_species" + "/" + select_category.value)
            .then(response => response.json())
            .then(result => {

                select_species.innerHTML = "";

                let option_select = document.createElement("option");

                option_select.text = "- เลือกสายพันธุ์ -";
                option_select.value = "";

                select_species.add(option_select);
                for (let item of result) {
                    let option = document.createElement("option");
                    option.text = item.species;
                    option.value = item.species;
                    select_species.add(option);
                    counter++;
                }
                if (counter >= 1) {
                    document.querySelector('.select2-container').classList.remove('d-none');

                } else {
                    document.querySelector('.select2-container').classList.add('d-none');

                }
            });
    }

    function change_language_user() {
        let btn_change_language = document.querySelector('#btn_change_language');
        btn_change_language.href = "javascript:trocarIdioma('" + language_user + "')";

        var delayInMilliseconds = 1000; //1.5 second

        setTimeout(function() {
            document.querySelector('#btn_change_language').click();
        }, delayInMilliseconds);
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        checkCookie();
    });

    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        let expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        let name = cname + "=";
        let decodedCookie = decodeURIComponent(document.cookie);
        let ca = decodedCookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function checkCookie() {
        let accept = getCookie("ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง");
        if (accept != "ยินยอม") {
            // document.querySelector('#btn-submit').click();
        }
    }

    function petdating() {
        setCookie("ยินยอมใช้ระบบหาคู่สัตว์เลี้ยง", "ยินยอม", 999);
    }
</script>
<script type="text/javascript">
    $('#select_species').select2();
    document.querySelector('.select2-container').classList.add('d-none');
</script>
<script>
    document.getElementById("certificate").addEventListener("input", function() {
        if (this.value) {
            document.querySelector('#div_certificate_2').classList.remove('d-none');
            document.querySelector('#show_certificate').classList.remove('d-none');
            document.querySelector('#certificate').classList.add('d-none');

        }
    });
    document.getElementById("certificate_2").addEventListener("input", function() {
        if (certificate_2.value) {
            document.querySelector('#div_certificate_3').classList.remove('d-none');
            document.querySelector('#show_certificate2').classList.remove('d-none');
            document.querySelector('#certificate_2').classList.add('d-none');

        }
    });
    document.getElementById("certificate_3").addEventListener("input", function() {
        if (certificate_3.value) {
            document.querySelector('#show_certificate3').classList.remove('d-none');
            document.querySelector('#certificate_3').classList.add('d-none');
        }
    });
    document.getElementById("photo_vaccine").addEventListener("input", function() {
        if (this.value) {
            document.querySelector('#div_vaccine_2').classList.remove('d-none');
            document.querySelector('#show_vaccine').classList.remove('d-none');
            document.querySelector('#photo_vaccine').classList.add('d-none');

        }
    });
    document.getElementById("photo_vaccine_2").addEventListener("input", function() {
        if (photo_vaccine_2.value) {
            document.querySelector('#div_vaccine_3').classList.remove('d-none');
            document.querySelector('#show_vaccine2').classList.remove('d-none');
            document.querySelector('#photo_vaccine_2').classList.add('d-none');

        }
    });
    document.getElementById("photo_vaccine_3").addEventListener("input", function() {
        if (photo_vaccine_3.value) {
            document.querySelector('#show_vaccine3').classList.remove('d-none');
            document.querySelector('#photo_vaccine_3').classList.add('d-none');
        }
    });
    document.getElementById("photo_medical_certificate").addEventListener("input", function() {
        if (photo_medical_certificate.value) {

            document.querySelector('#show_photo_medical_certificate').classList.remove('d-none');
            document.querySelector('#photo_medical_certificate').classList.add('d-none');
        }
    });
</script>
<script>
    function submitform() {
        document.querySelector('#btn-submit-form').click();
    }
</script>
<script>
    function check() {
        // console.log("aa");
        let name = document.querySelector('#name');
        let photo = document.querySelector('#photo');
        let gender = document.querySelector('#gender');
        let birth = document.querySelector('#birth');
        let select_category = document.querySelector('#select_category');
        if (name.value !== "" && gender.value !== "" && birth.value !== "" && birth.value !== "" && select_category.value !== "") {
            if ("{{$photo}}" !== '0' || photo.value) {
                document.getElementById("btn-modal").disabled = false;
                document.getElementById("btn-modal_emptyalert_lost_pet").disabled = false;
            }
        }


    }
</script>
<script>
    const spanElement = document.querySelector('.size-span');
    function updateChange(event) {
    const value = event.target.value;
    spanElement.innerText = value;}
</script>
<script>
    function click_check_all_alert(){
        let check_all_alert = document.querySelector('#check_all_alert');
        // console.log(check_all_alert.checked);
        if (check_all_alert.checked) {
            document.querySelector('#check_categories_1').checked = true ;
            document.querySelector('#check_categories_2').checked = true ;
            document.querySelector('#check_categories_3').checked = true ;
            document.querySelector('#check_categories_4').checked = true ;
            document.querySelector('#check_categories_5').checked = true ;
            document.querySelector('#check_categories_6').checked = true ;
        }else{
            document.querySelector('#check_categories_1').checked = false ;
            document.querySelector('#check_categories_2').checked = false ;
            document.querySelector('#check_categories_3').checked = false ;
            document.querySelector('#check_categories_4').checked = false ;
            document.querySelector('#check_categories_5').checked = false ;
            document.querySelector('#check_categories_6').checked = false ;
        }
    }

    function click_check(){
        if ( document.querySelector('#check_categories_1').checked && document.querySelector('#check_categories_2').checked && document.querySelector('#check_categories_3').checked && document.querySelector('#check_categories_4').checked && document.querySelector('#check_categories_5').checked && document.querySelector('#check_categories_6').checked ) {
            document.querySelector('#check_all_alert').checked = true ;
        }else{
            document.querySelector('#check_all_alert').checked = false ;
        }
    }
</script>