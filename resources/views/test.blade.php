@extends('layouts.peddyhub')

@section('content')

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
                                        <h3>ข้อมูลสัตว์เลี้ยง <span class="wow pulse" data-wow-delay="1s"></span></h3>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'PetName' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($pet->name) ? $pet->name : ''}}" >
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="faq wow fadeInRight">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="col-12 col-md-2">
                                        <label  class="control-label"><b>{{ 'PetName' }}</b></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="form-group">
                                        <input class="form-control" name="name" type="text" id="name" value="{{ isset($pet->name) ? $pet->name : ''}}" >
                                        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
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
                            <button class="btn btn-style-two" type="reset" onclick="location.href='{{ url('/profile') }}'">Back</button>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-6"> 
                            <div class="d-flex justify-content-end" >
                                <button type="submit" class="btn form-control" >Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>



    @endsection