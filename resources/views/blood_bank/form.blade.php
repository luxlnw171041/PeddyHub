

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
                            <h3>Post <span class="wow pulse" data-wow-delay="1s"></span></h3>
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
                                    <div class="form-group">
                                        <select name="location" id="location" class="form-control" required>
                                            <option value="" selected>- เลือกโรงพยาบาล -</option>
                                            <option value="เกษตรศาสตร์">โรงพยาบาลสัตว์เกษตรศาสตร์</option>
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
                                    <div class="col-6 col-md-6">
                                        <label  class="control-label"><b>{{ 'รหัสผู้ใช้' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="user_id" type="number" id="user_id" value="" >
                                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name_user" type="text" id="name_user" value="" readonly>
                                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
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
                            <button class="btn-11 btn" type="reset" onclick="window.location='{{ url('/blood_bank') }}'">Back</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <div class="d-flex justify-content-end" >
                            <button type="submit" class="btn btn-11 form-control" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
