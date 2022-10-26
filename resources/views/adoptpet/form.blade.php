<style>
.adopt-pet-img{
    border:#B8205B 2px solid;
    border-radius: 20px;
    height: 120px;
    object-fit: cover;
    cursor: pointer;
}
.adopt-pet-img:hover{
    color: #B8205B;
}
</style>
<div class="main-wrapper pet check">
    <div class="pet service">
        <section class="contact">
            <div class="container">
                <div class="faq wow fadeInRight">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3>ข้อมูลติดต่อ</h3>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <label  class="control-label"><b>{{ 'เบอร์ติดต่อ' }}</b><span style="color: #B8205B;">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="phone_user" id="phone_user" class="form-control" placeholder="เบอร์ติดต่อ" required value="{{ Auth::user()->profile->phone }}" onchange="check();">
                                </div>
                            </div>
                            @if( !empty(Auth::User()->partner) )
                                <div class="col-12 col-md-6">
                                    <label  class="control-label"><b>{{ 'LINK LINE' }}</b><span style="color: #B8205B;">*</span></label>
                                    <div class="form-group">
                                        <input class="form-control" name="link_line" type="text" id="link_line" value="{{ $link_line }}" onchange="check();">
                                    </div>
                                </div>
                            @else
                                <div class="col-12 col-md-6">
                                    <!--  -->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="faq wow fadeInRight">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="heading">
                            <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                    class="purple"><i class="fas fa-paw"></i> </span></p>
                            <h3>adoptpet <span class="wow pulse" data-wow-delay="1s"></span></h3>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ชื่อ' }}</b><span style="color: #B8205B;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($adoptpet->titel) ? $adoptpet->titel : ''}}" required onchange="check();">
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
                                        <label  class="control-label"><b>{{ 'รูปภาพ' }}</b><span style="color: #B8205B;">* <span style="font-size:13px;">อย่างน้อย 1 รูป</span> </span>
                                        </label>
                                    </div>
                                </div>
                               
                                <div class="col-12">
                                    <div class="row">
                                        @if(!empty($adoptpet->photo))
                                            <div class="col-3">
                                                <label  class="control-label" for="photo" on>
                                                <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_1" src="{{ url('storage')}}/{{ $adoptpet->photo }}" />
                                                    <input class="form-control d-none" name="photo" type="file" id="photo" value="{{ isset($adoptpet->photo) ? $adoptpet->photo : ''}}" onchange="document.getElementById('show_photo_1').src = window.URL.createObjectURL(this.files[0])">
                                                    
                                                </label>
                                            </div>
                                        @endif
                                        @if(!empty($adoptpet->photo2))
                                            <div class="col-3">
                                                <label  class="control-label" for="photo2">
                                                    <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_2" src="{{ url('storage')}}/{{ $adoptpet->photo2 }}" />
                                                    <input class="form-control d-none" name="photo2" type="file" id="photo2" value="{{ isset($adoptpet->photo2) ? $adoptpet->photo2 : ''}}" onchange="document.getElementById('show_photo_2').src = window.URL.createObjectURL(this.files[0])">
                                                </label>
                                            </div>
                                        @endif
                                        @if(!empty($adoptpet->photo3))
                                            <div class="col-3">
                                                <label  class="control-label" for="photo3">
                                                    <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_3" src="{{ url('storage')}}/{{ $adoptpet->photo3 }}" />
                                                    <input class="form-control d-none" name="photo3" type="file" id="photo3" value="{{ isset($adoptpet->photo3) ? $adoptpet->photo3 : ''}}" onchange="document.getElementById('show_photo_3').src = window.URL.createObjectURL(this.files[0])">

                                                </label>
                                            </div>
                                        @endif
                                        @if(!empty($adoptpet->photo4))
                                            <div class="col-3">
                                                <label  class="control-label" for="photo4">
                                                    <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_4" src="{{ url('storage')}}/{{ $adoptpet->photo4 }}" />
                                                    <input class="form-control d-none" name="photo4" type="file" id="photo4" value="{{ isset($adoptpet->photo4) ? $adoptpet->photo4 : ''}}" onchange="document.getElementById('show_photo_4').src = window.URL.createObjectURL(this.files[0])">

                                                </label>
                                            </div>
                                        @endif
                                        @if(!empty($adoptpet->photo5))
                                            <div class="col-3">
                                                <label  class="control-label" for="photo5">
                                                    <img class="adopt-pet-img" style="padding:0px ;" width="100%" alt="your image" id="show_photo_5" src="{{ url('storage')}}/{{ $adoptpet->photo5 }}" />
                                                    <input class="form-control d-none" name="photo5" type="file" id="photo5" value="{{ isset($adoptpet->photo5) ? $adoptpet->photo5 : ''}}" onchange="document.getElementById('show_photo_5').src = window.URL.createObjectURL(this.files[0])">

                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if(empty($adoptpet->photo))
                                <div class="col-lg-12 col-md-12 col-sm-2">
                                        <div class="col-12 col-md-12">
                                            <label  class="control-label"><b>{{ 'รูปภาพ 1' }}</b>
                                            
                                            </label>
                                        </div>
                                    </div>
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($adoptpet->photo) ? $adoptpet->photo : ''}}" required onchange="check();" >
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                    <a style="margin-right: 10px;margin-bottom: 10px;" data-toggle="collapse" data-target="#photomore" aria-expanded="false" aria-controls="photomore">
                                        เพิ่มรูปภาพ <i class="fas fa-sort-down"></i>
                                    </a>
                                </div>
                                <div  class="collapse col-12" id="photomore" style="padding:0px">
                                     @if(empty($adoptpet->photo2))
                                        <div class="col-lg-12 col-md-12 col-sm-2">
                                            <div class="col-12 col-md-12">
                                                <label  class="control-label"><b>{{ 'รูปภาพ 2' }}</b>
                                                
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-11 col-md-11 col-sm-11">
                                            <div class="form-group">
                                                <input class="form-control" name="photo2" type="file" id="photo2" value="{{ isset($adoptpet->photo2) ? $adoptpet->photo2 : ''}}" >
                                            </div>
                                        </div>
                                    @endif
                                    @if(empty($adoptpet->photo3))
                                        <div class="col-lg-12 col-md-12 col-sm-2">
                                            <div class="col-12 col-md-12">
                                                <label  class="control-label"><b>{{ 'รูปภาพ 3' }}</b>
                                                
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-11 col-md-11 col-sm-11">
                                            <div class="form-group">
                                                <input class="form-control" name="photo3" type="file" id="3" value="{{ isset($adoptpet->photo3) ? $adoptpet->photo3 : ''}}" >
                                            </div>
                                        </div>
                                        @endif
                                    @if(empty($adoptpet->photo4))
                                    <div class="col-lg-12 col-md-12 col-sm-2">
                                        <div class="col-12 col-md-12">
                                            <label  class="control-label"><b>{{ 'รูปภาพ 4' }}</b>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 col-sm-11">
                                        <div class="form-group">
                                            <input class="form-control" name="photo4" type="file" id="photo4" value="{{ isset($adoptpet->photo4) ? $adoptpet->photo4 : ''}}" >
                                        </div>
                                    </div>
                                    @endif
                                    @if(empty($adoptpet->photo5))
                                    <div class="col-lg-12 col-md-12 col-sm-2">
                                        <div class="col-12 col-md-12">
                                            <label  class="control-label"><b>{{ 'รูปภาพ 5' }}</b>
                                            
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-11 col-sm-11">
                                        <div class="form-group">
                                            <input class="form-control" name="photo5" type="file" id="photo5" value="{{ isset($adoptpet->photo5) ? $adoptpet->photo5 : ''}}" >
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ประเภท' }}</b><span style="color: #B8205B;">*</span></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <select name="pet_category_id" id="pet_category_id" class="form-control" required onchange="check();">
                                        @if(!empty($adoptpet->pet_category_id))
                                            <option value='{{ $adoptpet->pet_category_id }}' selected="selected">
                                                {{ $adoptpet->pet_category->name }}
                                            </option>
                                        @else
                                            <option value='' selected="selected">โปรดเลือก</option>
                                        @endif
                                        
                                        @foreach($category as $item)
                                            <option value="{{ isset($item->id) ? $item->id : ''}}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'เพศ' }}</b></label><span style="color: #B8205B;">*</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <select name="gender" class="form-control" id="gender" required onchange="check();">
                                            <option value='' selected > - โปรดเลือก - </option>
                                            @foreach (json_decode('{"\u0e0a\u0e32\u0e22":"\u0e0a\u0e32\u0e22","\u0e2b\u0e0d\u0e34\u0e07":"\u0e2b\u0e0d\u0e34\u0e07","\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38":"\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38"}', true) as $optionKey => $optionValue)
                                                <option value="{{ $optionKey }}" {{ (isset($adoptpet->gender) && $adoptpet->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ขนาด' }}</b></label><span style="color: #B8205B;">*</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                    <select name="size" class="form-control" id="size" required onchange="check();">
                                        <option value='' selected > - โปรดเลือก - </option>
                                        @foreach (json_decode('{"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01":"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01","\u0e40\u0e25\u0e47\u0e01":"\u0e40\u0e25\u0e47\u0e01","\u0e01\u0e25\u0e32\u0e07":"\u0e01\u0e25\u0e32\u0e07","\u0e43\u0e2b\u0e0d\u0e48":"\u0e43\u0e2b\u0e0d\u0e48","\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01":"\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($adoptpet->size) && $adoptpet->size == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ช่วงอายุ' }}</b></label><span style="color: #B8205B;">*</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                    <select name="age" class="form-control" id="age" required onchange="check();">
                                        <option value='' selected >
                                                - โปรดเลือก - 
                                        </option>
                                        @foreach (json_decode('{"\u0e41\u0e23\u0e01\u0e40\u0e01\u0e34\u0e14":"\u0e41\u0e23\u0e01\u0e40\u0e01\u0e34\u0e14","\u0e40\u0e14\u0e47\u0e01":"\u0e40\u0e14\u0e47\u0e01","\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19":"\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19","\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48":"\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48","\u0e0a\u0e23\u0e32":"\u0e0a\u0e23\u0e32"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($adoptpet->age) && $adoptpet->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'รายละเอียด' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="detail" type="text" id="detail" value="{{ isset($adoptpet->detail) ? $adoptpet->detail : ''}}" ></textarea>
                                        {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
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
                            <button class="btn-11 btn" type="reset" onclick="location.href='{{ url('/adoptpet') }}'">กลับ</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <div class="d-flex justify-content-end" >
                            <button disabled id="modal_submit" type="button" class="btn  btn-11 " data-toggle="modal" data-target="#modal_get_information" onclick="submit_form_lost_pet();">
                                โพส
                                </button>
                            <button id="lost_pet_submit" type="submit" class="btn btn-11 form-control d-none" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="modal fade"  id="modal_thx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body text-center">
          <h3>ได้รับข้อมูลเรียบร้อยแล้ว</h3>
            <img width="60%" src="{{ asset('peddyhub/images/PEDDyHUB sticker line/03.png') }}">
            <br><br>
            <h5>สนับสนุนโดย</h5>
            <div class="col-12 owl-carousel-two align-self-center" style="padding:0px;">
                    <div class="owl-carousel">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                            @if($item->id % 2 == 0)
                            <div class="item" style="padding:0px;z-index:-1;">
                                <div class="testimon">
                                    <a href="{{$item->link}}" target="bank">
                                        <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                    </a>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="owl-carousel">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                            @if($item->id % 2 != 0)
                                <div class="item" style="padding:0px;z-index:-1;">
                                    <div class="testimon">
                                        <a href="{{$item->link}}" target="bank">
                                            <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

      </div>
    </div>
  </div>
</div>
<div class="form-group d-none display-none {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User id' }} </label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($adoptpet->user_id) ? $adoptpet->user_id : Auth::id() }}" readonly>
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="form-group {{ $errors->has('titel') ? 'has-error' : ''}}">
    <label for="titel" class="control-label">{{ 'Titel' }}</label>
    <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($adoptpet->titel) ? $adoptpet->titel : ''}}" >
    {!! $errors->first('titel', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('detail') ? 'has-error' : ''}}">
    <label for="detail" class="control-label">{{ 'Detail' }}</label>
    <textarea class="form-control" name="detail" type="text" id="detail" value="{{ isset($adoptpet->detail) ? $adoptpet->detail : ''}}" ></textarea>
    {!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($adoptpet->user_id) ? $adoptpet->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($adoptpet->photo) ? $adoptpet->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">{{ 'Gender' }}</label>
    <select name="gender" class="form-control" id="gender" >
    @foreach (json_decode('{"\u0e0a\u0e32\u0e22":"\u0e0a\u0e32\u0e22","\u0e2b\u0e0d\u0e34\u0e07":"\u0e2b\u0e0d\u0e34\u0e07","\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38":"\u0e44\u0e21\u0e48\u0e23\u0e30\u0e1a\u0e38"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($adoptpet->gender) && $adoptpet->gender == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'Size' }}</label>
    <select name="size" class="form-control" id="size" >
    @foreach (json_decode('{"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01":"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01","\u0e40\u0e25\u0e47\u0e01":"\u0e40\u0e25\u0e47\u0e01","\u0e01\u0e25\u0e32\u0e07":"\u0e01\u0e25\u0e32\u0e07","\u0e43\u0e2b\u0e0d\u0e48":"\u0e43\u0e2b\u0e0d\u0e48","\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01":"\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($adoptpet->size) && $adoptpet->size == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('age') ? 'has-error' : ''}}">
    <label for="age" class="control-label">{{ 'Age' }}</label>
    <select name="age" class="form-control" id="age" >
    @foreach (json_decode('{"\u0e41\u0e23\u0e01\u0e40\u0e01\u0e34\u0e14":"\u0e41\u0e23\u0e01\u0e40\u0e01\u0e34\u0e14","\u0e40\u0e14\u0e47\u0e01":"\u0e40\u0e14\u0e47\u0e01","\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19":"\u0e27\u0e31\u0e22\u0e23\u0e38\u0e48\u0e19","\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48":"\u0e1c\u0e39\u0e49\u0e43\u0e2b\u0e0d\u0e48","\u0e0a\u0e23\u0e32":"\u0e0a\u0e23\u0e32"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($adoptpet->age) && $adoptpet->age == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div> -->

<!-- 
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div> -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        check();
    });
</script>
<script>
    function submit_form_lost_pet(){
    setTimeout(function(){ 
          document.getElementById("lost_pet_submit").click(); 
        }, 3000);
    }
</script>
<script>
      function check() {
        let titel = document.querySelector('#titel');
        let gender = document.querySelector('#gender');
        let age = document.querySelector('#age');
        let size = document.querySelector('#size');
        let phone = document.querySelector('#phone_user');

        let pet_category_id = document.querySelector('#pet_category_id');

        if (phone.value !== "" && titel.value !== ""  && gender.value !== "" && age.value !== ""  && size.value !== "" && pet_category_id.value !== "") {
        
                document.getElementById("modal_submit").disabled = false;
        }


    }
</script>