<!-- โพส -->
@if(Auth::check())
    <div class="col-12" style="border-bottom: 1px solid pink;border-top: 1px solid pink;">
        <br>
        <div class="row">
            <div class="d-flex flex-row">
                @if(!empty($user->profile->photo))
                    <a href="{{ url('/my_post_peddyshare') }}">
                        <img style="border-radius: 50%;object-fit:cover; min-width:50px;height:50px;"  src="{{ url('storage')}}/{{ $user->profile->photo }}" alt="image of client" title="{{$user->profile->name}}" class="img-fluid customer notranslate">
                    </a>
                @else
                    <a href="{{ url('/my_post_peddyshare') }}">
                        <img style="border-radius: 50%;object-fit:cover; min-width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="{{$user->profile->name}}" class="img-fluid customer notranslate">
                    </a>
                @endif
                <button style="width: 100%;margin-left:10px;border-radius:10px;font-weight: bold;font-family: 'Kanit', sans-serif;" class="btn btn-outline-secondary" onclick="document.querySelector('#btn_modal_pot').click();" >
                    แชร์ความน่ารักเจ้าตัวแสบ
                </button>
            </div>
        </div>
        <br>
        <!-- Button trigger modal -->
        <button id="btn_modal_pot" type="button" data-toggle="modal" data-target="#modal_pot"></button>

        <form id="form_new_or_edit_post" method="POST" action="{{ url('/post') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Modal -->
            <div  class="modal fade" id="modal_pot" tabindex="-1" role="dialog" aria-labelledby="Title_new_post" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Title_new_post" style="font-family: 'Kanit', sans-serif;">สร้างโพสต์</h5>
                    <span class="close notranslate" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="d-flex flex-row">
                            <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;" src="{{ url('storage')}}/{{ $user->profile->photo }}">
                            <div class="ml-2">
                                <h5 style="font-family: 'Kanit', sans-serif;" class="notranslate m-0">{{ $user->profile->name  }}</h5>
                                <span style="font-family: 'Kanit', sans-serif;">ประเภท : <span id="span_cat_pet" class="text-info">ทั่วไป</span></span>
                            </div>
                            
                        </div>
                    </div>
                    <br>
                    <style>
                        .i_xmark{
                            font-size:20px;
                            position: absolute; 
                            z-index:99;
                            right: 30px;
                            top: 155px;
                            padding:10px;
                            border-radius:50%;
                            width:40px ;
                            height:40px;
                            background-color:#ed649a;
                            cursor: pointer;
                        }
                        .i_xmark:hover {
                            background-color:#fa98bf;
                        }
                    </style>
                    <textarea class="col-12 font-kanit" id="detail" name="detail"  placeholder="เล่าถึงความน่ารักของเจ้าตัวแสบ"></textarea>
                    <i id="i_xmark" class="fa-solid fa-xmark text-center d-none i_xmark"onclick="i_xmark_photo();"></i>


                    <div class="col-12" style="padding:0px">
                        <label class="col-12" style="padding:0px; " for="photo" onchange="check();">
                            <div class="fill parent" style="min-height: 170px;border:dotted #B8205B;border-radius:25px;padding:0px;object-fit: cover;">
                                <div class="form-group">
                                <input class="form-control d-none" name="photo" style="margin:20px 0px 10px 0px" type="file" id="photo" value="" accept="image/*" onchange="document.getElementById('show_photo_pot').src = window.URL.createObjectURL(this.files[0]),document.querySelector('#show_photo_pot').classList.remove('d-none'),document.querySelector('#i_xmark').classList.remove('d-none'),document.querySelector('#div_add_img').classList.add('d-none');;">
                                </div>
                                <div class="text-center" id="div_add_img">
                                    <i class="fa-solid fa-file-plus" style="font-size: 25;color:#B8205B;background-color:#EFADC7;padding:15px;border-radius:50%;width:50px ;height:50px"></i><br>
                                    <p style="font-family: 'Kanit', sans-serif;">เพิ่มรูปภาพเจ้าตัวแสบ</p>
                                </div>
                                
                                <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_pot" />
                                <div class="child">
                                    <span>เลือกรูป</span>
                                </div>
                            </div>
                        </label>
                    </div>

                    
                    <br>
                    <div class="row">
                        <!-- <div class="col-6">
                            <span style="width:100%;" class="btn btn-sm btn-info" onclick="document.querySelector('#photo').click();">
                                <i style="font-size:20px;" class="fa-solid fa-rectangle-history-circle-plus" ></i> เพิ่มรูปภาพ
                            </span>
                        </div> -->
                        <div class="col-12">
                            <div style="padding:10px;font-family: 'Kanit', sans-serif;font-size:18px;">
                                หมวดหมู่ : 
                                <select style="font-size:17px;border-radius:10px;border:black 1px solid" name="pet_category_id" id="pet_category_id" class="btn btn-sm" onchange="document.querySelector('#span_cat_pet').innerHTML = document.querySelector('#pet_category_id').value;">
                                <option value="ทั่วไป" selected="selected">ทั่วไป</option>
                                @foreach($select_category as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <!-- <div class="col-12" >
                            <select style="font-size:17px;width: 100%;" name="pet_category_id" id="pet_category_id" class="btn btn-sm btn-success" onchange="document.querySelector('#span_cat_pet').innerHTML = document.querySelector('#pet_category_id').value;">
                                <option value='' selected="selected">เลือกประเภท</option>
                                <option value="ทั่วไป">ทั่วไป</option>
                                @foreach($select_category as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div> -->
                    </div>
                  </div>
                  <div style="border-top: 1px solid pink;">
                    <center>
                        <a class="btn text-white" style="font-family: 'Kanit', sans-serif;background-color: #B8205B;width: 90%;margin-top: 20px;" onclick="click_btn_post();">
                            โพสต์
                        </a>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button id="btn_submit_post_create" type="submit" class="btn text-white d-none" value="{{ 'create' }}"
                            style="background-color: #B8205B;width: 90%;margin-top: 20px;">
                            โพสต์
                        </button>
                    </center>
                    <br>
                  </div>
                </div>
              </div>
            </div>

        </form>
        
    </div>
@endif


<div id="please_add_data" style="position: fixed;
  top: 90%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #242424;padding:15px; 
  border-radius:10px;color:white;
  font-family: 'Kanit', sans-serif;" 
  class="alert alert-primary d-none" role="alert">
    <center>กรุณากรอกข้อมูลก่อนโพสต์</center>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    function click_btn_post(){
        let detail = document.querySelector('#detail');
        let photo = document.querySelector('#photo');

        if (detail.value || photo.value) {
            document.querySelector('#btn_submit_post_create').click();
        }else{
            var please_add_data = document.getElementById("please_add_data");
            please_add_data.className = "show";
            please_add_data.style.zIndex = "9999999";
            setTimeout(function () {
                please_add_data.className = 'hide';
            }, 2000);

            setTimeout(function () {
                please_add_data.style.zIndex = "-9999999";
            }, 3000);
        }

       
    }

    function i_xmark_photo(){
        document.querySelector('#show_photo_pot').classList.add('d-none');
        document.querySelector('#photo').value = null ;
        document.querySelector('#i_xmark').classList.add('d-none');
        document.querySelector('#div_add_img').classList.remove('d-none');

    }
</script>
<script>
    $('#modal_pot').on('shown.bs.modal', function (e) {
        document.querySelector('#btn_to_top').classList.add('d-none');
        document.querySelector('#sticky-header').classList.add('d-none');
    })
    $('#modal_pot').on('hide.bs.modal', function (e) {
        document.querySelector('#btn_to_top').classList.remove('d-none');
        document.querySelector('#sticky-header').classList.remove('d-none');
    })
</script>