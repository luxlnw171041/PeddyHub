<!-- โพส -->
@if(Auth::check())
    <div class="col-12" style="border-bottom: 1px solid pink;border-top: 1px solid pink;">
        <br>
        <div class="row">
            <div class="col-3">
                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;" src="{{ url('storage')}}/{{ $user->profile->photo }}">
            </div>
            <div class="col-9">
                <button style="margin-top:8px;width: 100%;" class="btn btn-outline-secondary" onclick="document.querySelector('#btn_modal_pot').click();">แชร์ความน่ารักเจ้าตัวแสบ</button>
            </div>
        </div>
        <br>
        <!-- Button trigger modal -->
        <button id="btn_modal_pot" type="button" data-toggle="modal" data-target="#modal_pot" onclick="document.querySelector('#btn_submit_post_create').classList.remove('d-none'),document.querySelector('#btn_submit_post_edit').classList.add('d-none');"></button>

        <form method="POST" action="{{ url('/post') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <!-- Modal -->
            <div class="modal fade" id="modal_pot" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle_new_post" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle_new_post">สร้างโพสต์</h5>
                    <span class="close notranslate" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </span>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                        <div class="col-3">
                            <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;" src="{{ url('storage')}}/{{ $user->profile->photo }}">
                        </div>
                        <div class="col-9">
                            <h5 class="notranslate">{{ $user->profile->name  }}</h5>
                            <span>ประเภท : <span id="span_cat_pet" class="text-info">ทั้งหมด</span></span>
                        </div>
                    </div>
                    <br>
                    <textarea class="col-12" id="detail" name="detail"  placeholder="เล่าถึงความน่ารักของเจ้าตัวแสบ"></textarea>
                    <i id="i_xmark" class="fa-solid fa-xmark text-white d-none" style="position: absolute; z-index:99;right: 30px;top: 155px;" onclick="i_xmark_photo();"></i>

                    <div class="fill parent">
                        <div class="form-group">
                            <input class="form-control d-none" name="photo" style="margin:20px 0px 10px 0px" type="file" id="photo" value="" accept="image/*" onchange="document.getElementById('show_photo_pot').src = window.URL.createObjectURL(this.files[0]),document.querySelector('#show_photo_pot').classList.remove('d-none'),document.querySelector('#i_xmark').classList.remove('d-none');">
                        </div>
                        <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_pot"/>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <span style="width:100%;" class="btn btn-sm btn-info" onclick="document.querySelector('#photo').click();">
                                <i style="font-size:20px;" class="fa-solid fa-rectangle-history-circle-plus" ></i> เพิ่มรูปภาพ
                            </span>
                        </div>
                        <div class="col-6">
                            <select style="font-size:17px;width: 100%;" name="pet_category_id" id="pet_category_id" class="btn btn-sm btn-success" onchange="document.querySelector('#span_cat_pet').innerHTML = document.querySelector('#pet_category_id').value;">
                                <option value='' selected="selected">เลือกประเภท</option>
                                @foreach($select_category as $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <div style="border-top: 1px solid pink;">
                    <center>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button id="btn_submit_post_create" type="submit" class="btn text-white" value="{{ 'create' }}"
                            style="background-color: #B8205B;width: 90%;margin-top: 20px;">
                            โพสต์
                        </button>
                        <button id="btn_submit_post_edit" type="submit" class="btn text-white d-none" value="{{ 'edit' }}"
                            style="background-color: #B8205B;width: 90%;margin-top: 20px;">
                            แก้ไขโพสต์
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