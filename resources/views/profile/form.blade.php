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
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'UserName' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control"  name="username" type="text" id="username" value="{{ isset($data->username) ? $data->username : ''}}" readonly>
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'Name' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control"  name="name" type="text" id="name" value="{{ isset($data->name) ? $data->name : ''}}" >
                                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'Birthday' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                    <input class="form-control" name="birth" type="date" id="birth" value="{{ isset($data->birth) ? $data->birth : ''}}" >
                                        {!! $errors->first('birth', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'Gender' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
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
                                <div class="col-12 col-md-2">
                                    <label  class="control-label"><b>{{ 'รูปภาพ' }}</b></label>
                                </div>
                                <div class="col-12 col-md-10">
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
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'Email' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="email" type="text" id="email" value="{{ isset($data->email ) ? $data->email  : ''}}" >
                                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'Tel' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="phone" type="number" id="phone" value="{{ isset($data->phone) ? $data->phone : ''}}" >
                                        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="faq wow fadeInRight">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <button class="btn btn-style-two" type="reset" onclick="location.href='{{ url('/profile') }}'">Back</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                        <div class="d-flex justify-content-end" >
                            <button type="submit" class="btn form-control" value="{{ $formMode === 'edit' ? 'Update' : 'ส่งข้อมูล' }}">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
