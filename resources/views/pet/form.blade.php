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
  position: relative; /* define context for absolutly positioned children */
  /* size set by image in this case */
  background-image: url('https://placehold.it/400');
  background-size: cover;
  background-position: center center;
}

.parent img {
  display: block;
}

.parent:after {
  content: ''; /* :after has to have a content... but you don't want one */
  
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 100%;

  background: rgba(0,0,0,0);

  transition: 1s;
}

.parent:hover:after {
  background: rgba(0,0,0,.5); 
}

.parent:hover .child {
  opacity: 1;
}

.child {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  
  z-index: 5; /* only works when position is defined */ 
  /* think of a stack of paper... this element is now 5 higher than the bottom */

  color: white;

  opacity: 0;
  transition: .5s;
}
</style>
<div class="parent">
  <img src="http://placehold.it/200" alt="">
  <div class="child">
    <span>stuff</span>
  </div>
</div>
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
                                <div class="col-lg-12 col-md-2 col-sm-2 ">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ชื่อสัตว์เลี้ยง' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10 ">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($pet->name) ? $pet->name : ''}}" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'รูป' }}</b></label><br>
                                    </div>
                                </div>
                                <!-- <button class="btn btn-11 " type="reset" 
                                    onclick="
                                        document.getElementById('photo').value = ''; 
                                        document.querySelector('#div_photo_1').classList.remove('d-none');
                                        document.querySelector('#show_photo').classList.add('d-none');
                                       
                                    ">1
                                </button>
                                <button class="btn btn-11 " type="reset" 
                                    onclick="
                                        document.getElementById('photo_2').value = ''; 
                                        document.querySelector('#div_photo_2').classList.remove('d-none');
                                        document.querySelector('#show_photo2').classList.add('d-none');
                                       
                                    ">2
                                </button>
                                <button class="btn btn-11 " type="reset" 
                                    onclick="
                                        document.getElementById('photo_3').value = ''; 
                                        document.querySelector('#div_photo_3').classList.remove('d-none');
                                        document.querySelector('#show_photo3').classList.add('d-none');
                                       
                                    ">3
                                </button> -->
                                <label class="col-4" style="padding:0px;" for="photo">
                                    <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($pet->photo) ? $pet->photo : ''}}" accept="image/*" onchange="document.getElementById('show_photo').src = window.URL.createObjectURL(this.files[0])" required>
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <label id="div_photo_2"for="photo_2" class="col-4 d-none" style="padding:0px;">
                                    <div  class=" fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="photo_2" type="file" id="photo_2" value="{{ isset($pet->photo_2) ? $pet->photo_2 : ''}}" accept="image/*" onchange="document.getElementById('show_photo2').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo2" alt="your image" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <label id="div_photo_3"for="photo_3" class="col-4 d-none" style="padding:0px;">
                                    <div  class="fill  parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="photo_3" type="file" id="photo_3" value="{{ isset($pet->photo_3) ? $pet->photo_3 : ''}}" accept="image/*" onchange="document.getElementById('show_photo3').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;object-fit: cover;" width="100%" id="show_photo3" alt="your image" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ใบรับรอง' }}</b></label><br>
                                    </div>
                                </div>
                                <label class="col-4" style="padding:0px;" for="certificate">
                                    <div class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="certificate" type="file" id="certificate" value="{{ isset($pet->certificate) ? $pet->certificate : ''}}" accept="image/*" onchange="document.getElementById('show_certificate').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <label id="div_certificate_2"class="col-4 d-none" style="padding:0px;" for="certificate_2">
                                    <div   class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="certificate_2" type="file" id="certificate_2" value="{{ isset($pet->certificate_2) ? $pet->certificate_2 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate2').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate2" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <label id="div_certificate_3"class="col-4 d-none" style="padding:0px;" for="certificate_3">
                                    <div  class="fill parent" style="border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                        <div class="form-group">
                                            <input class="form-control" name="certificate_3" type="file" id="certificate_3" value="{{ isset($pet->certificate_3) ? $pet->certificate_3 : ''}}" accept="image/*" onchange="document.getElementById('show_certificate3').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_certificate3" />
                                        <div class="child">
                                            <span>เลือกรูป</span>
                                        </div>
                                    </div>
                                </label>
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label class="control-label"><b>{{ 'ประเภท' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <select id="select_category" name="pet_category_id" class="form-control" onchange="sub_cat();" required>
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>
                                        <select id="select_sub_category" name="sub_category" class="form-control d-none">
                                            <option value='' selected="selected">- โปรดเลือก -</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-2 col-sm-2 ">
                                    <div class="col-12 col-md-2">
                                        <label class="control-label"><b>{{ 'เพศ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10 ">
                                    <div class="form-group">
                                        <select name="gender" class="form-control" id="gender" required>
                                            <option value='' selected> - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e0a\u0e32\u0e22":"\u0e0a\u0e32\u0e22","\u0e2b\u0e0d\u0e34\u0e07":"\u0e2b\u0e0d\u0e34\u0e07","\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38":"\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($pet->gender) && $pet->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'วันเกิด' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="birth" type="date" id="birth" value="{{ isset($pet->birth) ? $pet->birth : ''}}">
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
                                <div class="col-lg-12 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label class="control-label"><b>{{ 'ขนาดสัตว์เลี้ยง' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <select name="size" class="form-control" id="size" required>
                                            <option value='' selected> - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e40\u0e25\u0e47\u0e01":"\u0e40\u0e25\u0e47\u0e01","\u0e01\u0e25\u0e32\u0e07":"\u0e01\u0e25\u0e32\u0e07","\u0e43\u0e2b\u0e0d\u0e48":"\u0e43\u0e2b\u0e0d\u0e48"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($pet->size) && $pet->size == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
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
                }
            });
        if ((select_category.value >= 5))
            document.querySelector('#select_sub_category').classList.remove('d-none');
        else
            document.querySelector('#select_sub_category').classList.add('d-none');
        endif
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