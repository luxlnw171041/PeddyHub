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
        min-width: 100%!important;
        
    }
    .select2-container .select2-selection--single .select2-selection__rendered {
        display: block;
        margin-top:-15px!important;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap
    }
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <!-- ข้อมูล USER -->
                @if(empty(Auth::user()->profile->tambon_th) or empty(Auth::user()->profile->phone))
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
                                        <select name="select_province" id="select_province" class="form-control" onchange="select_A();" required>
                                            <option value="" selected>- เลือกจังหวัด -</option>

                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->amphoe_th))
                                        <input class="form-control" type="text" value="{{ Auth::user()->profile->amphoe_th }}" readonly>
                                        @else
                                        <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T();" required>
                                            <option value="" selected>- เลือกอำเภอ -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">


                                        @if(!empty(Auth::user()->profile->tambon_th))
                                        <input class="form-control" type="text" value="{{ Auth::user()->profile->tambon_th }}" readonly>
                                        @else
                                        <select name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng();" required>
                                            <option value="" selected>- เลือกตำบล -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-3" style="margin-top:12px;">
                                        <input type="text" name="phone_user" id="phone_user" class="form-control" placeholder="เบอร์ติดต่อ" required value="{{ Auth::user()->profile->phone }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- จบข้อมูล USER -->

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="heading">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                            </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                        <h3>ข้อมูลสัตว์เลี้ยง <span class="wow pulse" data-wow-delay="1s"></span></h3>
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
                                        <input style="margin:0px;" class="form-control" name="name" type="text" id="name" value="{{ isset($pet->name) ? $pet->name : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'รูป' }} <span style="color: #B8205B;">* <span style="font-size:13px;">อย่างน้อย 1 รูป</span> </span></b></label><br>
                                    </div>
                                </div>
                                <div class="row col-12 m-0 p-0 text-center d-flex justify-content-center">
                                    <label class="col-4" style="padding:0px;" for="photo">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" style="margin:20px 0px 10px 0px" name="photo" type="file" id="photo" value="{{ isset($pet->photo) ? $pet->photo : ''}}" accept="image/*" onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0])" required>
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_photo_2" for="photo_2" class="col-4 d-none" style="padding:0px;">
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
                                    <label id="div_photo_3" for="photo_3" class="col-4 d-none" style="padding:0px;">
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
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ใบรับรอง' }}</b></label><br>
                                    </div>
                                </div>
                                <div class="row col-12 m-0 p-0 text-center d-flex justify-content-center">
                                    <label class="col-4" style="padding:0px;" for="certificate">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate" style="margin:20px 0px 10px 0px" type="file" id="certificate" value="{{ isset($pet->certificate) ? $pet->certificate : ''}}" accept="image/*" onchange="document.getElementById('show_certificate').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_certificate_2" class="col-4 d-none" style="padding:0px;" for="certificate_2">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate_2" style="margin:20px 0px 10px 0px" type="file" id="certificate_2" value="{{ isset($pet->certificate_2) ? $pet->certificate_2 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate2').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate2" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                    <label id="div_certificate_3" class="col-4 d-none" style="padding:0px;" for="certificate_3">
                                        <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                            <div class="form-group">
                                                <input class="form-control" name="certificate_3" style="margin:20px 0px 10px 0px" type="file" id="certificate_3" value="{{ isset($pet->certificate_3) ? $pet->certificate_3 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate3').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate3" />
                                            <div class="child">
                                                <span>เลือกรูป</span>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-6 col-md-12 order-2">
                                    <label class="control-label"><b>{{ 'เพศ' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <select style="margin:0px;" name="gender" class="form-control" id="gender" required>
                                            <option value='' selected> - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e0a\u0e32\u0e22":"\u0e0a\u0e32\u0e22","\u0e2b\u0e0d\u0e34\u0e07":"\u0e2b\u0e0d\u0e34\u0e07","\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38":"\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($pet->gender) && $pet->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-12 col-lg-12 order-3">
                                    <label class="control-label"><b>{{ 'วันเกิด' }} <span style="color: #B8205B;">*</span></b></label>
                                    <div class="form-group">
                                        <input style="margin:0px;" class="form-control" name="birth" type="date" id="birth" value="{{ isset($pet->birth) ? $pet->birth : ''}}">
                                    </div>
                                </div>

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
                                        <select style="margin:0px;" id="select_category" name="pet_category_id" class="form-control" onchange="sub_cat(); species_select();" required>
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>

                                        <select style="margin:10px 0px 0px 0px;" id="select_sub_category" name="sub_category" class="form-control d-none">
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>
                                        <select style="margin:10px 0px 0px 0px;" id="select_species" name="species" class="form-control d-none" onchange="sub_size();">
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>
                                        <select style="margin:10px 0px 0px 0px;" id="select_size" name="size" class="form-control d-none">
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>

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
                            <button class="btn btn-11 " type="reset" onclick="location.href='{{ url('/pet') }}'">Back</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-11 form-control" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
<input type="text" class="d-none" name="language_user" id="language_user" value="{{ Auth::user()->profile->language }}">
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
    document.getElementById("photo_3").addEventListener("input", function() {
        if (photo_3.value) {
            document.querySelector('#show_photo3').classList.remove('d-none');
            document.querySelector('#photo_3').classList.add('d-none');


        }
    });
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
                // console.log(result);
                select_category.innerHTML = "";

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
            document.querySelector('#btn-submit').click();
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