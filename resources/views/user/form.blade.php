<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ข้อมูลพื้นฐาน <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="row">
                                <!-- <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ชื่อผู้ใช้' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control"  name="username" type="text" id="username" value="{{ isset($data->username) ? $data->username : ''}}" readonly>
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div> -->
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'Username' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($data->username) ? $data->username : ''}}" readonly>
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'name' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($data->profile->name) ? $data->profile->name : ''}}">
                                        {!! $errors->first('real_name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'Birthday' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="birth" type="date" id="birth" value="{{ isset($data->profile->birth) ? $data->profile->birth : ''}}">
                                        {!! $errors->first('birth', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'Gender' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                        <select name="sex" class="form-control" id="sex" onchange="if(this.value=='3'){ 
                                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                                document.querySelector('#masseng').focus();
                                            }else{ 
                                                document.querySelector('#masseng_label').classList.add('d-none'),
                                                document.querySelector('#masseng_input').classList.add('d-none')
                                            }">
                                            <option value="" selected>
                                                - โปรดเลือก -
                                            </option>
                                            @foreach (json_decode('{"ผู้ชาย":"ผู้ชาย","ผู้หญิง":"ผู้หญิง","ไม่ต้องการตอบ":"ไม่ต้องการตอบ"}', true) as $optionKey => $optionValue)
                                            <option ption value="{{ $optionKey }}" {{ (isset($data->profile->sex) && $data->profile->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 col-md-12">
                                    <label class="control-label"><b>{{ 'Photo' }}</b></label>
                                </div>
                                <div class="col-lg-12 col-12 col-md-10">
                                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($data->profile->photo) ? $data->profile->photo : ''}}" accept="image/*" multiple="multiple">
                                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="heading">
                                    <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                        </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                                    <h3>ข้อมูลติดต่อ <span class="wow pulse" data-wow-delay="1s"></span></h3>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-2">
                                        <div class="col-12 col-md-12">
                                            <label class="control-label"><b>{{ 'Email' }}</b></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-10 col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}">
                                            {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-2 col-sm-2">
                                        <div class="col-12 12">
                                            <label class="control-label"><b>{{ 'Mobile number' }}</b></label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-10 col-sm-10">
                                        <div class="form-group">
                                            <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->profile->phone) ? $data->profile->phone : ''}}">
                                            {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    @if(!empty($login))
                                    <input class="form-control d-none" name="login" type="text" id="login" value="line">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-0 col-sm-0"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ข้อมูลอื่นๆ <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ชื่อ-นามสกุล' }}</b></label>
                                    </div>
                                    <div class="col-12">
                                        <input class="form-control" name="real_name" type="text" id="real_name" value="{{ isset($data->profile->real_name) ? $data->profile->real_name : ''}}">
                                        {!! $errors->first('real_name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                        <div class="col-6">
                                            <label class="control-label"><b>{{ 'บัตรประชาชน' }}</b></label>
                                            <label class="col-12" style="padding:0px;" for="photo_id_card">
                                                <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                                    @if(!empty($data->profile->photo_id_card))
                                                    <div class="form-group">
                                                        <input class=" d-none form-control" name="photo_id_card" style="margin:20px 0px 10px 0px" type="file" id="photo_id_card" value="{{ $data->profile->photo_id_card }}" accept="image/*" onchange="document.getElementById('show_photo_id_card').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                    <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_id_card" src="{{ url('storage')}}/{{ $data->profile->photo_id_card }}" />
                                                    @else
                                                    <div class="form-group">
                                                        <input class="form-control" name="photo_id_card" style="margin:20px 0px 10px 0px" type="file" id="photo_id_card" value="{{ $data->profile->photo_id_card }}" accept="image/*" onchange="document.getElementById('show_photo_id_card').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                    <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_id_card" />
                                                    @endif
                                                    <div class="child">
                                                        <span>เลือกรูป</span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="col-6">
                                            <label class="control-label"><b>{{ 'พาสปอร์ต' }}</b></label>
                                            <label class="col-12" style="padding:0px;" for="photo_passport">
                                                <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                                    @if(!empty($data->profile->photo_id_card))
                                                    <div class="form-group">
                                                        <input class="d-none form-control" name="photo_passport" style="margin:20px 0px 10px 0px" type="file" id="photo_passport" value="{{ $data->profile->photo_passport}}" accept="image/*" onchange="document.getElementById('show_photo_passport').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                    <img class="full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_passport" src="{{ url('storage')}}/{{ $data->profile->photo_passport }}" />
                                                    <div class="child">
                                                        <span>เลือกรูป</span>
                                                    </div>
                                                    @else
                                                    <div class="form-group">
                                                        <input class="form-control" name="photo_passport" style="margin:20px 0px 10px 0px" type="file" id="photo_passport" value="{{ $data->profile->photo_passport}}" accept="image/*" onchange="document.getElementById('show_photo_passport').src = window.URL.createObjectURL(this.files[0])">
                                                    </div>
                                                    <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_passport" />
                                                    <div class="child">
                                                        <span>เลือกรูป</span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </label>
                                        </div>
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ที่อยู่ปัจจุบันของคุณ' }}</b></label>
                                        <span class="text-danger">*</span>
                                        @if(!empty(Auth::user()->profile->changwat_th))
                                        <a style="color: #b8205b;" onclick="edit_address()">
                                            แก้ไขข้อมูล
                                        </a>
                                        @endif
                                    </div>
                                    <input class="d-none" type="text" id="check_changwat_th" value="{{ Auth::user()->profile->changwat_th }}">
                                    <div class="col-12 col-md-4" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->changwat_th))
                                        <input onclick="edit_province()" class="form-control" type="text" id="input_province" value="{{ Auth::user()->profile->changwat_th }}" >
                                        <select name="select_province" id="select_province" class="d-none form-control" onchange="select_A(); check();">
                                            <option value="" selected>- เลือกจังหวัด -</option>
                                        </select>
                                        @else
                                        <select name="select_province" id="select_province" class="form-control" onchange="select_A(); check();" required>
                                            <option value="" selected>- เลือกจังหวัด -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-4" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->amphoe_th))
                                        <input onclick="edit_amphoe()" class="form-control" type="text" id="input_amphoe" value="{{ Auth::user()->profile->amphoe_th }}" >
                                        <select name="select_amphoe" id="select_amphoe" class="d-none form-control" onchange="select_T(); check();">
                                            <option value="" selected>- เลือกอำเภอ -</option>
                                        </select>
                                        @else
                                        <select name="select_amphoe" id="select_amphoe" class="form-control" onchange="select_T(); check();" required>
                                            <option value="" selected>- เลือกอำเภอ -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-4" style="margin-top:12px;">
                                        @if(!empty(Auth::user()->profile->tambon_th))
                                        <input onclick="edit_tambon()" class="form-control" type="text" id="input_tambon" value="{{ Auth::user()->profile->tambon_th }}" >
                                        <select name="select_tambon" id="select_tambon" class="d-none form-control" onchange="select_lat_lng(); check();">
                                            <option value="" selected>- เลือกตำบล -</option>
                                        </select>
                                        @else
                                        <select name="select_tambon" id="select_tambon" class="form-control" onchange="select_lat_lng(); check();" required>
                                            <option value="" selected>- เลือกตำบล -</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="faq ">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <textarea style="border-radius: 25px 0px 25px 25px ;" name="address" class="form-control" rows="3" type="text" id="address" value="{{ $data->profile->address }}" placeholder="รายละเอียดที่อยู่"></textarea>
                                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-6 faq form-group {{ $errors->has('zip_code') ? 'has-error' : ''}}" style="margin-top:12px;">
                                        <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" name="zip_code" type="tel" id="zip_code" value="{{ $data->profile->zip_code }}" maxlength="5" placeholder="รหัสไปรษณีย์">
                                        {!! $errors->first('zip_code', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ภาษา <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="row d-flex align-items-center" style="margin-top:-20px;">
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_en" width="90%" style="filter: grayscale(100%);" src="{{ url('/peddyhub/images/national-flag/flex/flex-en.png') }}" onclick="change_language('en' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_zh_TW" width="90%" style="filter: grayscale(100%);" src="{{ url('/peddyhub/images/national-flag/flex/flex-cn.png') }}" onclick="change_language('zh-TW' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_ko" width="90%" style="filter: grayscale(100%); " src="{{ url('/peddyhub/images/national-flag/flex/flex-ko.png') }}" onclick="change_language('ko' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3">
                                        <img class="btn" id="img_flag_th" width="90%" style="filter: grayscale(100%); " src="{{ url('/peddyhub/images/national-flag/flex/flex-th.png') }}" onclick="change_language('th' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3" >
                                        <img class="btn" id="img_flag_ae" width="90%" style="filter: grayscale(100%);" src="{{ url('/peddyhub/images/national-flag/flex/flex-ar.png') }}" onclick="change_language('ar' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3" >
                                        <img class="btn" id="img_flag_in" width="90%" style="filter: grayscale(100%);" src="{{ url('/peddyhub/images/national-flag/flex/flex-in.png') }}" onclick="change_language('hi' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_ja" width="90%" style="filter: grayscale(100%); " src="{{ url('/peddyhub/images/national-flag/flex/flex-ja.png') }}" onclick="change_language('ja' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3 " >
                                        <img class="btn" id="img_flag_ru" width="90%" style="filter: grayscale(100%); " src="{{ url('/peddyhub/images/national-flag/flex/flex-ru.png') }}" onclick="change_language('ru' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4 ">
                                        <img class="btn" id="img_flag_es" width="90%" style="filter: grayscale(100%); "  src="{{ url('/peddyhub/images/national-flag/flex/flex-es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4 " >
                                        <img class="btn" id="img_flag_de" width="90%" style="filter: grayscale(100%); "  src="{{ url('/peddyhub/images/national-flag/flex/flex-de.png') }}" onclick="change_language('de' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3 ">
                                        <img class="btn" id="img_flag_lo" width="90%" style="filter: grayscale(100%);"  src="{{ url('/peddyhub/images/national-flag/flex/flex-lo.png') }}" onclick="change_language('lo' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3  ">
                                        <img class="btn" id="img_flag_my" width="90%" style="filter: grayscale(100%); "  src="{{ url('/peddyhub/images/national-flag/flex/flex-mm.png') }}" onclick="change_language('my' , '{{ $data->id }}');">
                                    </div>
                                </div>
                                <input class="form-control" name="language" type="hidden" id="language" value="{{ isset($data->profile->language) ? $data->profile->language : ''}}">
                                {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                            </div>
                            <br>
                            <br>
                            <div class="text-center">
                                <p style="font-family: 'Sarabun', sans-serif;">
                                    ยินยอมให้เว็บไซต์ PEDDyHUB ส่งข้อความประกาศตามหาสัตว์เลี้ยงประเภทใดบ้าง
                                    <br>
                                    <span class="text-danger">* เลือกได้มากกว่า 1 ข้อ</span>
                                </p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div style="padding: 7px;float: right;font-family: 'Sarabun', sans-serif;">
                                        <input type="checkbox" name="check_all_alert" id="check_all_alert" onclick="click_check_all_alert();">&nbsp;&nbsp;ทั้งหมด
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_1" id="check_categories_1" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-dog"  style="font-size:20px;color:#F7B000;"></i>&nbsp;&nbsp;สุนัข
                                    </div>
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_2" id="check_categories_2" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-cat " style="font-size:20px;color:#02DBFF;"></i>&nbsp;&nbsp;แมว
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_3" id="check_categories_3" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-dove" style="font-size:20px;color:#49AED9;"></i>&nbsp;&nbsp;นก
                                    </div>
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_4" id="check_categories_4" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-fish" style="font-size:20px;color:#63AB86;"></i>&nbsp;&nbsp;ปลา
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_5" id="check_categories_5" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-rabbit" style="font-size:20px;color:#DB4C75;"></i>&nbsp;&nbsp;สัตว์เล็ก
                                    </div>
                                    <div style="padding: 7px;font-family: 'Sarabun', sans-serif;">
                                        <input  type="checkbox" name="check_categories_6" id="check_categories_6" onclick="click_check();">
                                        &nbsp;&nbsp;<i class="fas fa-spider" style="font-size:20px;color:black;"></i>&nbsp;&nbsp;Exotic
                                    </div>
                                </div>
                            </div>
                            @php
                                $alert_lost_pet = $data->profile->alert_lost_pet ;
                                $data_alert_lost_pet = json_decode($alert_lost_pet, true);
                            @endphp
                            @if(!empty($data_alert_lost_pet))
                                @for ($i=0; $i < count($data_alert_lost_pet); $i++)
                                    <script>
                                        let check_categories{{ $data_alert_lost_pet[$i] }} = document.querySelector('#check_categories_' + {{ $data_alert_lost_pet[$i] }}) ;

                                        check_categories{{ $data_alert_lost_pet[$i] }}.setAttribute("checked", "checked");
                                    </script>
                                @endfor
                            @endif
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq wow fadeInRight">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        @if( request()->get('login') == 'line')
                        <button class="btn btn-11" type="reset" onclick="location.href='{{ url('https://lin.ee/Bvi9Zr9') }}'">กลับ</button>
                        @else
                        <button class="btn btn-11" type="reset" onclick="location.href='{{ url('/user') }}'">กลับ</button>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-11 form-control" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        click_check();
        let check_changwat_th = document.querySelector('#check_changwat_th');
        select_province();
        let input_language = document.querySelector('#language');
        change_color_img(input_language.value);
        add_color();


    });

    function add_color() {
        // console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }

    function change_language(language, user_id) {
        let input_language = document.querySelector('#language');
        input_language.value = language;
        change_color_img(language);

        fetch("{{ url('/') }}/api/change_language/" + language + "/" + user_id);

        switch (language) {
            case 'th':
                alert("เปลี่ยนภาษาเรียบร้อย");
                document.querySelector('#btn_change_language_th').click();
                break;
            case 'en':
                alert("The language has been changed successfully.");
                document.querySelector('#btn_change_language_en').click();
                break;
            case 'zh-TW':
                alert("語言已成功更改。");
                document.querySelector('#btn_change_language_zh-TW').click();
                break;
            case 'ja':
                alert("言語は正常に変更されました。");
                document.querySelector('#btn_change_language_ja').click();
                break;
            case 'ko':
                alert("언어가 성공적으로 변경되었습니다.");
                document.querySelector('#btn_change_language_ko').click();
                break;
            case 'es':
                alert("El idioma se ha cambiado correctamente.");
                document.querySelector('#btn_change_language_es').click();
                break;
            case 'lo':
                alert("ພາສາໄດ້ຖືກປ່ຽນແປງຢ່າງສໍາເລັດຜົນ.");
                document.querySelector('#btn_change_language_lo').click();
                break;
            case 'my':
                alert("ဘာသာစကားကို အောင်မြင်စွာ ပြောင်းလဲပြီးပါပြီ။.");
                document.querySelector('#btn_change_language_my').click();
                break;
            case 'de':
                alert("Die Sprache wurde erfolgreich geändert.");
                document.querySelector('#btn_change_language_de').click();
                break;
            case 'hi':
                alert("सफलतापूर्वक भाषा बदलें");
                document.querySelector('#btn_change_language_hi').click();
                break;
            case 'ar':
                alert("تغيير اللغة بنجاح");
                document.querySelector('#btn_change_language_ar').click();
                break;
            case 'ru':
                alert("Изменить язык успешно");
                document.querySelector('#btn_change_language_ru').click();
                break;
        }

    }

    function change_color_img(language) {
        let img_th = document.querySelector('#img_flag_th');
        let img_en = document.querySelector('#img_flag_en');
        let img_zh_TW = document.querySelector('#img_flag_zh_TW');
        let img_ja = document.querySelector('#img_flag_ja');
        let img_ko = document.querySelector('#img_flag_ko');
        let img_es = document.querySelector('#img_flag_es');
        let img_lo = document.querySelector('#img_flag_lo');
        let img_my = document.querySelector('#img_flag_my');
        let img_de = document.querySelector('#img_flag_de');
        let img_in = document.querySelector('#img_flag_in');
        let img_ae = document.querySelector('#img_flag_ae');
        let img_ru = document.querySelector('#img_flag_ru');

        let style_gray_th = document.createAttribute("style");
        style_gray_th.value = "filter: grayscale(100%);";

        let style_gray_en = document.createAttribute("style");
        style_gray_en.value = "filter: grayscale(100%);";

        let style_gray_zh_TW = document.createAttribute("style");
        style_gray_zh_TW.value = "filter: grayscale(100%);";

        let style_gray_ja = document.createAttribute("style");
        style_gray_ja.value = "filter: grayscale(100%);";

        let style_gray_ko = document.createAttribute("style");
        style_gray_ko.value = "filter: grayscale(100%);";

        let style_gray_es = document.createAttribute("style");
        style_gray_es.value = "filter: grayscale(100%);";

        let style_gray_lo = document.createAttribute("style");
        style_gray_lo.value = "filter: grayscale(100%);";

        let style_gray_my = document.createAttribute("style");
        style_gray_my.value = "filter: grayscale(100%);";

        let style_gray_de = document.createAttribute("style");
        style_gray_de.value = "filter: grayscale(100%);";

        let style_gray_in = document.createAttribute("style");
        style_gray_in.value = "filter: grayscale(100%);";

        let style_gray_ae = document.createAttribute("style");
        style_gray_ae.value = "filter: grayscale(100%);";

        let style_gray_ru = document.createAttribute("style");
        style_gray_ru.value = "filter: grayscale(100%);";

        switch (language) {
            case 'th':
                let attr_th = img_th.getAttributeNode("style");
                img_th.removeAttributeNode(attr_th);

                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'en':
                let attr_en = img_en.getAttributeNode("style");
                img_en.removeAttributeNode(attr_en);

                img_th.setAttributeNode(style_gray_th);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'zh-TW':
                let attr_zh_TW = img_zh_TW.getAttributeNode("style");
                img_zh_TW.removeAttributeNode(attr_zh_TW);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'ja':
                let attr_ja = img_ja.getAttributeNode("style");
                img_ja.removeAttributeNode(attr_ja);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ko.setAttributeNode(style_gray_ko);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'ko':
                let attr_ko = img_ko.getAttributeNode("style");
                img_ko.removeAttributeNode(attr_ko);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_es.setAttributeNode(style_gray_es);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'es':
                let attr_es = img_es.getAttributeNode("style");
                img_es.removeAttributeNode(attr_es);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'lo':
                let attr_lo = img_lo.getAttributeNode("style");
                img_lo.removeAttributeNode(attr_lo);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_es.setAttributeNode(style_gray_es);
                img_ko.setAttributeNode(style_gray_ko);
                img_my.setAttributeNode(style_gray_my);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'my':
                let attr_my = img_my.getAttributeNode("style");
                img_my.removeAttributeNode(attr_my);

                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;
            case 'de':
                let attr_de = img_de.getAttributeNode("style");
                img_de.removeAttributeNode(attr_de);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;

            case 'hi':
                let attr_in = img_in.getAttributeNode("style");
                img_in.removeAttributeNode(attr_in);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_ae.setAttributeNode(style_gray_ae);
                img_ru.setAttributeNode(style_gray_ru);
                break;

            case 'ar':
                let attr_ae = img_ae.getAttributeNode("style");
                img_ae.removeAttributeNode(attr_ae);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ru.setAttributeNode(style_gray_ru);
                break;


            case 'ru':
                let attr_ru = img_ru.getAttributeNode("style");
                img_ru.removeAttributeNode(attr_ru);

                img_my.setAttributeNode(style_gray_my);
                img_th.setAttributeNode(style_gray_th);
                img_en.setAttributeNode(style_gray_en);
                img_zh_TW.setAttributeNode(style_gray_zh_TW);
                img_ja.setAttributeNode(style_gray_ja);
                img_ko.setAttributeNode(style_gray_ko);
                img_lo.setAttributeNode(style_gray_lo);
                img_es.setAttributeNode(style_gray_es);
                img_de.setAttributeNode(style_gray_de);
                img_in.setAttributeNode(style_gray_in);
                img_ae.setAttributeNode(style_gray_ae);
                break;
        }

    }

    function select_province() {
        let select_province = document.querySelector('#select_province');

        fetch("{{ url('/') }}/api/select_province/")
            .then(response => response.json())
            .then(result => {
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

    function change_language_user() {
        let btn_change_language = document.querySelector('#btn_change_language');
        btn_change_language.href = "javascript:trocarIdioma('" + language_user + "')";

        var delayInMilliseconds = 1000; //1.5 second

        setTimeout(function() {
            document.querySelector('#btn_change_language').click();
        }, delayInMilliseconds);
    }

    function edit_address() {
        document.querySelector('#input_province').classList.add('d-none');
        document.querySelector('#input_amphoe').classList.add('d-none');
        document.querySelector('#input_tambon').classList.add('d-none');

        document.querySelector('#select_province').classList.remove('d-none');
        document.querySelector('#select_amphoe').classList.remove('d-none');
        document.querySelector('#select_tambon').classList.remove('d-none');


    }
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
function edit_province() {
    document.querySelector('#select_province').classList.remove('d-none');
    document.querySelector('#input_province').classList.add('d-none');
}
function edit_amphoe() {
    document.querySelector('#select_amphoe').classList.remove('d-none');
    document.querySelector('#input_amphoe').classList.add('d-none');
}
function edit_tambon() {
    document.querySelector('#select_tambon').classList.remove('d-none');
    document.querySelector('#input_tambon').classList.add('d-none');
}

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