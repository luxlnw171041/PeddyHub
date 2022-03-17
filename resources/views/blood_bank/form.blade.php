<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #b8205b;
  width: 70px;
  height: 70px;
  -webkit-animation: spin 2s linear infinite; 
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.checkmark__circle {
    stroke-dasharray: 166;
    stroke-dashoffset: 166;
    stroke-width: 2;
    stroke-miterlimit: 10;
    stroke: #7ac142;
    fill: none;
    animation: stroke 0.6s cubic-bezier(0.65, 0, 0.45, 1) forwards
}

.checkmark {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    display: block;
    stroke-width: 2;
    stroke: #fff;
    stroke-miterlimit: 10;
    margin: 10% auto;
    box-shadow: inset 0px 0px 0px #7ac142;
    animation: fill .4s ease-in-out .4s forwards, scale .3s ease-in-out .9s both
}

.checkmark__check {
    transform-origin: 50% 50%;
    stroke-dasharray: 48;
    stroke-dashoffset: 48;
    animation: stroke 0.3s cubic-bezier(0.65, 0, 0.45, 1) 0.8s forwards
}

@keyframes stroke {
    100% {
        stroke-dashoffset: 0
    }
}

@keyframes scale {

    0%,
    100% {
        transform: none
    }

    50% {
        transform: scale3d(1.1, 1.1, 1)
    }
}

@keyframes fill {
    100% {
        box-shadow: inset 0px 0px 0px 60px #7ac142
    }
}
</style>
<!-- <div class="d-none form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($blood_bank->quantity) ? $blood_bank->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div> -->

<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <div class="faq wow fadeInRight">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="heading">
                            <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                    class="purple"><i class="fas fa-paw"></i> </span></p>
                            <h3>เพิ่มข้อมูล <span class="wow pulse" data-wow-delay="1s"></span></h3>
                        </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'โรงพยาบาล' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <input class="form-control" name="location" type="text" id="location" value="โรงพยาบาลสัตว์เกษตรศาสตร์"  readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-6 col-md-6">
                                        <label  class="control-label"><b>{{ 'รหัสผู้ใช้' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="row">
                                        <div class="col-9">
                                            <div class="form-group">
                                                <input class="form-control" name="user_id" type="text" id="user_id" value="" >
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <i style="width:100%;border-radius: 25%;background-color:#b8205b;" class="fa-solid fa-magnifying-glass btn main-shadow text-white" onclick="search_data_user();"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name_user" type="text" id="name_user" value="" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'สัตว์เลี้ยง' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <select name="pet_id" id="pet_id" class="form-control" required>
                                            <option value="" selected>- เลือกเจ้าตัวแสบ -</option>
                                           
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ปริมาณเลือด' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <input class="form-control" name="quantity" type="text" id="quantity" value="{{ isset($blood_bank->quantity) ? $blood_bank->quantity : ''}}" >
                                        {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq wow fadeInRight">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <button class="btn-11 btn d-none" type="reset" onclick="window.location='{{ url('/blood_bank') }}'">Back</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <div class="d-flex justify-content-end" >
                                <button type="submit" class="btn btn-sm btn-11 form-control d-none" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
                                    Update
                                </button>
                                <a style="border-radius: 10%;background-color:#b8205b;" class="btn main-shadow text-white" onclick="send_data_to_user();">
                                    ส่งข้อมูล
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- modal wait user -->
<button id="btn_wait_user" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#wait_user">
</button>

<!-- Modal -->
<div class="modal fade" id="wait_user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <center>
                    <br><br>
                    <img width="60%" src="{{ url('peddyhub/images/PEDDyHUB sticker line/15.png') }}">
                    <br>
                    <div class="loader"></div>
                    <br>
                    <span>
                        <b>รอการยืนยัน</b>
                    </span>
                    <br><br>
                </center>
            </div>
        </div>
    </div>
</div>

<!-- modal user CF -->
<button id="btn_user_cf" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#user_cf">
</button>

<!-- Modal -->
<div class="modal fade" id="user_cf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <div class="wrapper">
                    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                        <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                    </svg>
                    <h3 style="color: #7ac142;">บันทึกข้อมูลเรียบร้อยแล้ว</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        
    function search_data_user()
    {
        let user_id = document.querySelector('#user_id');

        fetch("{{ url('/') }}/api/search_data_user/" + user_id.value )
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let name_user = document.querySelector('#name_user');
                    name_user.value = result[0]['name']
        });

        fetch("{{ url('/') }}/api/search_data_pet_of_user/" + user_id.value )
            .then(response => response.json())
            .then(result => {
                console.log(result);

                let pet_id = document.querySelector("#pet_id");
                    pet_id.innerHTML = "";

                let option_2 = document.createElement("option");
                    option_2.text = "- เลือกเจ้าตัวแสบ -";
                    option_2.value = "";
                    pet_id.add(option_2); 

                for(let item of result){
                    let option = document.createElement("option");
                    option.text = item.name;
                    option.value = item.name;
                    pet_id.add(option);
                }
        });
    }

    function send_data_to_user()
    {

        // ส่งไลน์

        document.querySelector('#btn_wait_user').click();
    }
</script>
