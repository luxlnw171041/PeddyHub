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
                                        <h3>adoptpet <span class="wow pulse" data-wow-delay="1s"></span></h3>
                                    </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'ชื่อ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="titel" type="text" id="titel" value="{{ isset($adoptpet->titel) ? $adoptpet->titel : ''}}" required>
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
                                        <label  class="control-label"><b>{{ 'รูปภาพ' }}</b>
                                        
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11">
                                    <div class="form-group">
                                        <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($adoptpet->photo) ? $adoptpet->photo : ''}}" required >
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1">
                                    <a style="float:right;margin-right: 10px;margin-bottom: 10px;" data-toggle="collapse" data-target="#photomore" aria-expanded="false" aria-controls="photomore">
                                        <i class="fas fa-sort-down"></i>
                                    </a>
                                </div>
                                <div  class="collapse col-12" id="photomore" style="padding:0px">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="col-12 col-md-12">
                                        <label  class="control-label"><b>{{ 'เพศ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <select name="gender" class="form-control" id="gender" >
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
                                        <label  class="control-label"><b>{{ 'ขนาด' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                    <select name="size" class="form-control" id="size" >
                                        @foreach (json_decode('{"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01":"\u0e40\u0e25\u0e47\u0e01\u0e21\u0e32\u0e01","\u0e40\u0e25\u0e47\u0e01":"\u0e40\u0e25\u0e47\u0e01","\u0e01\u0e25\u0e32\u0e07":"\u0e01\u0e25\u0e32\u0e07","\u0e43\u0e2b\u0e0d\u0e48":"\u0e43\u0e2b\u0e0d\u0e48","\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01":"\u0e43\u0e2b\u0e0d\u0e48\u0e21\u0e32\u0e01"}', true) as $optionKey => $optionValue)
                                            <option value="{{ $optionKey }}" {{ (isset($adoptpet->size) && $adoptpet->size == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
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
                                        <label  class="control-label"><b>{{ 'ช่วงอายุ' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                    <select name="age" class="form-control" id="age" >
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
                            <button type="submit" class="btn btn-11 form-control" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">โพส</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
