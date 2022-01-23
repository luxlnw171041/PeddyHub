<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                        class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ข้อมูลพื้นฐาน <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ชื่อผู้ใช้' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control"  name="username" type="text" id="username" value="{{ isset($data->username) ? $data->username : ''}}" readonly>
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'ชื่อ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control"  name="name" type="text" id="name" value="{{ isset($data->name) ? $data->name : ''}}" >
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'วันเกิด' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                    <input class="form-control" name="birth" type="date" id="birth" value="{{ isset($data->birth) ? $data->birth : ''}}" >
                                        {!! $errors->first('birth', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'เพศ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group {{ $errors->has('sex') ? 'has-error' : ''}}">
                                        <select name="sex" class="form-control"  id="sex" onchange="if(this.value=='3'){ 
                                                document.querySelector('#masseng_label').classList.remove('d-none'),
                                                document.querySelector('#masseng_input').classList.remove('d-none'),
                                                document.querySelector('#masseng').focus();
                                            }else{ 
                                                document.querySelector('#masseng_label').classList.add('d-none'),
                                                document.querySelector('#masseng_input').classList.add('d-none')
                                            }">
                                            <option value="" selected >
                                                - โปรดเลือก - 
                                            </option>  
                                                @foreach (json_decode('{"ผู้ชาย":"ผู้ชาย","ผู้หญิง":"ผู้หญิง","ไม่ต้องการตอบ":"ไม่ต้องการตอบ"}', true) as $optionKey => $optionValue)
                                            <option  ption value="{{ $optionKey }}"  {{ (isset($data->sex) && $data->sex == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                                @endforeach
                                        </select>
                                        {!! $errors->first('massengbox', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12 col-md-2">
                                    <label  class="control-label"><b>{{ 'รูปภาพ' }}</b></label>
                                </div>
                                <div class="col-lg-12 col-12 col-md-10">
                                    <div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
                                    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($data->photo) ? $data->photo : ''}}" accept="image/*" multiple="multiple">
                                        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-0 col-sm-0"></div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                        class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ข้อมูลติดต่อ <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'อีเมล' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}" >
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'เบอร์โทร' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                
                            </div>
                            <div class="heading">
                                <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                    </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                        class="purple"><i class="fas fa-paw"></i> </span></p>
                                <h3>ภาษา <span class="wow pulse" data-wow-delay="1s"></span></h3>
                            </div>
                            <div class="row d-flex align-items-center" style="margin-top:-20px;">
                                <!-- <div class="col-md-4 col-lg-2 col-4">
                                    <img class="btn" id="img_flag_en" style="filter: grayscale(100%);"  width="85" src="{{ url('/peddyhub/images/national-flag/flex-en.png') }}" onclick="change_language('en' , '{{ $data->id }}');">
                                </div>
                                <div class="col-md-4 col-lg-2 col-4" style="top:2px">
                                    <img class="btn" id="img_flag_zh_TW" style="filter: grayscale(100%);"  width="85" src="{{ url('/peddyhub/images/national-flag/flex-zh-TW.png') }}" onclick="change_language('zh-TW' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2" style="top:4px">
                                    <img class="btn" id="img_flag_in" style="filter: grayscale(100%); " width="82" src="{{ url('/peddyhub/images/national-flag/flex-in.png') }}" onclick="change_language('hi' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2" style="top:5px;right:-2px;">
                                    <img class="btn" id="img_flag_ae" style="filter: grayscale(100%);"  width="79" src="{{ url('/peddyhub/images/national-flag/flex-ar.png') }}" onclick="change_language('ar' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2" style="top:5px;right:-2px;">
                                    <img class="btn" id="img_flag_ru" style="filter: grayscale(100%); " width="79"  src="{{ url('/peddyhub/images/national-flag/flex-ru.png') }}" onclick="change_language('ru' , '{{ $data->id }}');">
                                </div>
                                <div class="col-md-4 col-lg-2 col-4" style="top:2px">
                                    <img class="btn" id="img_flag_es" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                </div>
                                <div class="col-md-4 col-lg-2 col-4" style="top:2px">
                                    <img class="btn" id="img_flag_de" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-de.png') }}" onclick="change_language('de' , '{{ $data->id }}');">
                                </div>
                                <div class="col-md-4 col-lg-2 col-4">
                                    <img class="btn" id="img_flag_ja" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-ja.png') }}" onclick="change_language('ja' , '{{ $data->id }}');">
                                </div>
                                <div class="col-md-4 col-lg-2 col-4">
                                    <img class="btn" id="img_flag_ko" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-ko.png') }}" onclick="change_language('ko' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2" >
                                    <img class="btn" id="img_flag_th" style="filter: grayscale(100%); " width="85" src="{{ url('/peddyhub/images/national-flag/flex-th.png') }}" onclick="change_language('th' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2">
                                    <img class="btn" id="img_flag_lo" style="filter: grayscale(100%);"  width="85" src="{{ url('/peddyhub/images/national-flag/flex-la.png') }}" onclick="change_language('lo' , '{{ $data->id }}');">
                                </div>
                                <div class="col-4 col-md-4 col-lg-2 " >
                                    <img class="btn" id="img_flag_my" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-mm.png') }}" onclick="change_language('my' , '{{ $data->id }}');">
                                </div> -->
                                <div class="row d-flex align-items-end">
                                    <div class="col-md-4 col-lg-3 col-4" style="top:2px">
                                        <img class="btn" id="img_flag_en" style="filter: grayscale(100%);"  src="{{ url('/peddyhub/images/national-flag/pet-en.png') }}" onclick="change_language('en' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4" >
                                        <img class="btn" id="img_flag_zh_TW" style="filter: grayscale(100%);" src="{{ url('/peddyhub/images/national-flag/pet-zh-TW.png') }}" onclick="change_language('zh-TW' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_ko" style="filter: grayscale(100%); "   src="{{ url('/peddyhub/images/national-flag/pet-ko.png') }}" onclick="change_language('ko' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3" >
                                        <img class="btn" id="img_flag_th" style="filter: grayscale(100%); "  src="{{ url('/peddyhub/images/national-flag/pet-th.png') }}" onclick="change_language('th' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3" style="top:5px;right:-2px;">
                                        <img class="btn" id="img_flag_ae" style="filter: grayscale(100%);"  src="{{ url('/peddyhub/images/national-flag/pet-ar.png') }}" onclick="change_language('ar' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-3" style="top:4px">
                                        <img class="btn" id="img_flag_in" style="filter: grayscale(100%);"  src="{{ url('/peddyhub/images/national-flag/pet-in.png') }}" onclick="change_language('hi' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-4">
                                        <img class="btn" id="img_flag_ja" style="filter: grayscale(100%); "   src="{{ url('/peddyhub/images/national-flag/pet-jp.png') }}" onclick="change_language('ja' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2 d-none" style="top:5px;right:-2px;">
                                        <img class="btn" id="img_flag_ru" style="filter: grayscale(100%); " width="79"  src="{{ url('/peddyhub/images/national-flag/flex-ru.png') }}" onclick="change_language('ru' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-4 d-none" style="top:2px">
                                        <img class="btn" id="img_flag_es" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-es.png') }}" onclick="change_language('es' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-md-4 col-lg-2 col-4 d-none" style="top:2px">
                                        <img class="btn" id="img_flag_de" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-de.png') }}" onclick="change_language('de' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2 d-none">
                                        <img class="btn" id="img_flag_lo" style="filter: grayscale(100%);"  width="85" src="{{ url('/peddyhub/images/national-flag/flex-la.png') }}" onclick="change_language('lo' , '{{ $data->id }}');">
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2  d-none" >
                                        <img class="btn" id="img_flag_my" style="filter: grayscale(100%); " width="85"  src="{{ url('/peddyhub/images/national-flag/flex-mm.png') }}" onclick="change_language('my' , '{{ $data->id }}');">
                                    </div>
                                </div>
                                <input class="form-control" name="language" type="hidden" id="language" value="{{ isset($data->language) ? $data->language : ''}}">
                                            {!! $errors->first('language', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq wow fadeInRight">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <button class="btn btn-11" type="reset" onclick="location.href='{{ url('/profile') }}'">กลับ</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <div class="d-flex justify-content-end" >
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

        let input_language = document.querySelector('#language');
        change_color_img(input_language.value);

        // console.log("START");
        add_color();
        
        
    });
    function add_color(){
        // console.log("add_color");
        document.querySelector('#btn_profile').classList.add('btn-danger');
        document.querySelector('#btn_profile').classList.remove('btn-outline-danger');
        document.querySelector('#btn_a_profile').classList.add('text-white');
        document.querySelector('#btn_a_profile').classList.remove('text-danger');
    }

    function change_language(language , user_id)
    {
        let input_language = document.querySelector('#language');
            input_language.value = language ;
            change_color_img(language);

            fetch("{{ url('/') }}/api/change_language/" + language + "/"  + user_id);

            switch(language) {
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

    function change_color_img(language)
    {
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

        let style_gray_th= document.createAttribute("style");
            style_gray_th.value = "filter: grayscale(100%);";

        let style_gray_en= document.createAttribute("style");
            style_gray_en.value = "filter: grayscale(100%);";

        let style_gray_zh_TW= document.createAttribute("style");
            style_gray_zh_TW.value = "filter: grayscale(100%);";

        let style_gray_ja= document.createAttribute("style");
            style_gray_ja.value = "filter: grayscale(100%);";

        let style_gray_ko= document.createAttribute("style");
            style_gray_ko.value = "filter: grayscale(100%);";

        let style_gray_es= document.createAttribute("style");
            style_gray_es.value = "filter: grayscale(100%);";

        let style_gray_lo= document.createAttribute("style");
            style_gray_lo.value = "filter: grayscale(100%);";

        let style_gray_my= document.createAttribute("style");
            style_gray_my.value = "filter: grayscale(100%);";
        
        let style_gray_de= document.createAttribute("style");
            style_gray_de.value = "filter: grayscale(100%);";

        let style_gray_in= document.createAttribute("style");
            style_gray_in.value = "filter: grayscale(100%);";

        let style_gray_ae= document.createAttribute("style");
            style_gray_ae.value = "filter: grayscale(100%);";

        let style_gray_ru= document.createAttribute("style");
            style_gray_ru.value = "filter: grayscale(100%);";

        switch(language) {
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
</script>