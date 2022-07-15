
<button id="btn_modal_pot" type="button" data-toggle="modal" data-target="#modal_pot"></button>

<!-- Modal -->
<div class="modal fade" id="modal_pot" tabindex="-1" role="dialog" aria-labelledby="Title_new_post" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Title_new_post">แก้ไขโพส</h5>
        <a class="close notranslate" href="{{ url('/post') . '#id' . $post->id }}">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-3">
                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;" src="{{ url('storage')}}/{{ $user->profile->photo }}">
            </div>
            <div class="col-9">
                <h5 class="notranslate">{{ $user->profile->name  }}</h5>
                <span>ประเภท : <span id="span_cat_pet" class="text-info">{{ $post->pet_category_id }}</span></span>
            </div>
        </div>
        <br>
        <textarea class="col-12" id="detail" name="detail" value="{{ isset($post->detail) ? $post->detail : ''}}">{{ $post->detail }}</textarea>
        <i id="i_xmark" class="fa-solid fa-xmark text-white" style="position: absolute; z-index:99;right: 30px;top: 155px;" onclick="i_xmark_photo();"></i>

        <div class="fill parent">
            <div class="form-group">
                <input class="form-control d-none" name="photo" style="margin:20px 0px 10px 0px" type="file" id="photo" value="{{ isset($post->photo) ? $post->photo : ''}}" accept="image/*" onchange="document.getElementById('show_photo_pot').src = window.URL.createObjectURL(this.files[0]),document.querySelector('#show_photo_pot').classList.remove('d-none'),document.querySelector('#i_xmark').classList.remove('d-none');">
            </div>
            @if(!empty($post->photo))
                <img class="full_img" src="{{ url('storage')}}/{{ $post->photo }}" style="padding:0px ;" width="100%" alt="your image" id="show_photo_pot"/>
            @else
                <img class="d-none full_img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_pot"/>

            @endif
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
                    <option value="ทั่วไป">ทั่วไป</option>
                    @foreach($select_category as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group d-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
                <label for="user_id" class="control-label">{{ 'User Id' }}</label>
                <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($post->user_id) ? $post->user_id : ''}}" >
                {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
      </div>
      <div style="border-top: 1px solid pink;">
        <center>
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            <button id="btn_submit_post_create" type="submit" class="btn text-white" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}" style="background-color: #B8205B;width: 90%;margin-top: 20px;">
                แก้ไขโพส
            </button>
        </center>
        <br>
      </div>
    </div>
  </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        document.querySelector('#btn_modal_pot').click();
    });

    function i_xmark_photo(){
        document.querySelector('#show_photo_pot').classList.add('d-none');
        document.querySelector('#photo').value = null ;
        document.querySelector('#i_xmark').classList.add('d-none');
    }

</script>




<!-- <div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <input class="form-control" name="video" type="text" id="video" value="{{ isset($post->video) ? $post->video : ''}}" >
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<br>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> -->
