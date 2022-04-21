<style>
  
   
</style>
<div class="d-none">
    <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($check_in->user_id) ? $check_in->user_id : Auth::user()->id }}"  readonly>
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('time_in') ? 'has-error' : ''}}">
        <label for="time_in" class="control-label">{{ 'Time In' }}</label>
        <input class="form-control" name="time_in" type="datetime" id="time_in" value="{{ $date_now }}" >
        {!! $errors->first('time_in', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('time_out') ? 'has-error' : ''}}">
        <label for="time_out" class="control-label">{{ 'Time Out' }}</label>
        <input class="form-control" name="time_out" type="datetime" id="time_out" value="{{ $date_now }}" >
        {!! $errors->first('time_out', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('check_in_at') ? 'has-error' : ''}}">
        <label for="check_in_at" class="control-label">{{ 'Check In At' }}</label>
        <input class="form-control" name="check_in_at" type="text" id="check_in_at" value="{{ isset($check_in->check_in_at) ? $check_in->check_in_at : $location}}" readonly>
        {!! $errors->first('check_in_at', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="text-center">
    <img style="margin-top:10px;" class="wow fadeInUp" width="60%" src="{{ url('peddyhub/images/PEDDyHUB sticker line/25.png') }}">
</div>
    <!-- ชื่อ นามสกุล -->
<br>
    @if(!empty($real_name))
        <h4 id="text_real_name" class="text-center wow fadeInLeft">
            คุณ:{{$real_name}}
            <a class="btn text-white" style="border-radius:25px;background-color:#B81F5B;font-size:5px;" onclick="edit_real_name();">
                <i class="fa-light fa-pencil"> แก้ไขข้อมูล</i>
            </a>
        </h4>
        
    @else
        <div  class="faq form-group {{ $errors->has('real_name') ? 'has-error' : ''}}">
            <label for="real_name" class="control-label translate">{{ 'First name - Surname' }} </label>
            <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" name="real_name" type="text" id="real_name" value="{{ $real_name }}" required >
            {!! $errors->first('real_name', '<p class="help-block">:message</p>') !!}
        </div>
    @endif
        <div  id="div_real_name" class="d-none faq form-group {{ $errors->has('real_name') ? 'has-error' : ''}}">
            <label for="real_name" class="control-label translate">{{ 'First name - Surname' }} </label>
            <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" type="text" id="real_name" value="{{ $real_name }}"  >
            {!! $errors->first('real_name', '<p class="help-block">:message</p>') !!}
        </div>
    <!-- เบอร์ -->
    @if(!empty($phone_user))
        <h6 id="text_phone_user" class="text-center wow fadeInRight">เบอร์โทร:{{$phone_user}}</h6>
    @else
        <div class="faq form-group {{ $errors->has('phone_user') ? 'has-error' : ''}}">
            <label for="phone_user" class="control-label translate">{{ 'Phone Number' }}</label>
            <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" name="phone_user" type="text" id="phone_user" value="{{ $phone_user }}" pattern="[0-9]{10}">
            {!! $errors->first('phone_user', '<p class="help-block">:message</p>') !!}
        </div>
    @endif

    <div id="div_phone_user" class="d-none faq form-group {{ $errors->has('phone_user') ? 'has-error' : ''}}">
        <label for="phone_user" class="control-label translate">{{ 'Phone Number' }}</label>
        <input style="border-radius: 25px 0px 25px 25px ;" class="form-control" type="text" id="phone_user" value="{{ $phone_user }}" pattern="[0-9]{10}">
        {!! $errors->first('phone_user', '<p class="help-block">:message</p>') !!}
    </div>
<br>

<input class="form-control d-none" name="check_in_out" type="text" id="check_in_out" value="" >
<div class="text-center wow fadeInDown">
<a id="btn_click_check_in" class="button-checkin btn-lg shadow-btn-checkin notranslate" onclick="check_in_or_out('check_in');" data-toggle="modal" data-target="#exampleModalCenter"> <b>Check In</b> </a>
<a id="btn_click_check_out" class="button-checkout btn-lg shadow-btn notranslate" onclick="check_in_or_out('check_out');" data-toggle="modal" data-target="#exampleModalCenter"> <b>Check Out</b> </a>
</div>
<br>
<br>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
                    @foreach($data_partner as $partner)
                        <input class="d-none" name="input_name_partner" type="text" id="input_name_partner" value="{{ $partner->name }}">
                        <div id="data_partner" class="col-12" style="padding:0px;">
                            <img id="logo_partner" width="55px" height="55px;" src="{{ url('storage/'.$partner->logo )}}">
                            <span id="name_partner" class="text-info notranslate" style="font-size:28px;vertical-align: middle;">&nbsp;{{$partner->name}}</span>
                        </div>
                    @endforeach
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h3 id="text_check_in" class="text-success d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;"><b>Check in</b></h3>
                <h3 id="text_check_out" class="text-danger d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;"><b>Check out</b></h3>
                <h5 id="text_time" class="d-none" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">วัน{{ thaidate("l j F Y" , strtotime($date_now)) }}
                <br>
                เวลา {{ thaidate("H:i" , strtotime($date_now)) }}
                </h5>
            </div>
            <div id="div_submit_form" class="form-group d-none modal-footer" style="margin-bottom:0px;">
                <input class="button-three btn-md shadow-btn-checkin" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'ยืนยัน' }}">
            </div>
        </div>
    </div>
</div>



<script>
    function edit_real_name(){
        document.querySelector("#text_real_name").classList.add('d-none');
        document.querySelector("#div_real_name").classList.remove('d-none');
        document.querySelector("#real_name").name = "real_name";
        document.querySelector("#real_name").required = "true";


        document.querySelector("#text_phone_user").classList.add('d-none');
        document.querySelector("#div_phone_user").classList.remove('d-none');
        document.querySelector("#phone_user").name = "phone_user";
    }

    function check_in_or_out(data){

        if (data === "check_in") {
            document.querySelector("#text_check_out").classList.add('d-none');
            document.querySelector("#text_check_in").classList.remove('d-none');
            document.querySelector("#text_time").classList.remove('d-none');

            let check_in_out = document.querySelector("#check_in_out");
                check_in_out.value = "check_in";

            // let time_out = document.querySelector("#time_out");
            //     time_out.value = "";
        }else if(data === "check_out"){
            document.querySelector("#text_check_in").classList.add('d-none');
            document.querySelector("#text_check_out").classList.remove('d-none');
            document.querySelector("#text_time").classList.remove('d-none');

            let check_in_out = document.querySelector("#check_in_out");
                check_in_out.value = "check_out";

            // let time_in = document.querySelector("#time_in");
            //     time_in.value = "";
        }

        // document.querySelector("#btn_submit_form").click();
        document.querySelector("#div_submit_form").classList.remove('d-none');

    };
</script>
