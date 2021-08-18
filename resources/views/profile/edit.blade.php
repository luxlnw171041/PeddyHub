@extends('layouts.peddyhub')

@section('content')


<div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 ">
                <div class="card">
                    <div class="card-header">แก้ไขข้อมูลส่วนตัว</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/profile/' . $data->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                           

                            @include ('profile.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <br>
</section >




    <!-- <div class="main-wrapper pet check">
        <div class="pet service">
            <section class="contact">
                <div class="container">
                    <form method="POST">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="faq wow fadeInRight">
                                    <div class="heading">
                                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i>
                                            </span><span class="orange"><i class="fas fa-paw"></i> </span><span
                                                class="purple"><i class="fas fa-paw"></i> </span></p>
                                        <h3>Billing <span class="wow pulse" data-wow-delay="1s"> Address </span></h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="f_name" class="form-control"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="l_name" class="form-control"
                                                    placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" placeholder="Email"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="number" id="number" class="form-control"
                                                    placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>Country</option>
                                                    <option value="usa">United States of America</option>
                                                    <option value="india">India</option>
                                                    <option value="bangladesh">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>City</option>
                                                    <option value="bristol">Bristol</option>
                                                    <option value="washington">Washington</option>
                                                    <option value="salem">Salem</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>State</option>
                                                    <option value="albama">Albama</option>
                                                    <option value="alaska">Alaska</option>
                                                    <option value="lowa">Lowa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="number" name="service" id="zip" placeholder="Zip-Code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea name="msg" id="msg" class="form-control"
                                                    placeholder="Address" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn form-control">Place Order</button>
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
                                        <h3>Billing <span class="wow pulse" data-wow-delay="1s"> Address </span></h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="f_name" class="form-control"
                                                    placeholder="First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="l_name" class="form-control"
                                                    placeholder="Last Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" placeholder="Email"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="number" id="number" class="form-control"
                                                    placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>Country</option>
                                                    <option value="usa">United States of America</option>
                                                    <option value="india">India</option>
                                                    <option value="bangladesh">Bangladesh</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>City</option>
                                                    <option value="bristol">Bristol</option>
                                                    <option value="washington">Washington</option>
                                                    <option value="salem">Salem</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <select class="form-select" id="pet">
                                                    <option value="" selected>State</option>
                                                    <option value="albama">Albama</option>
                                                    <option value="alaska">Alaska</option>
                                                    <option value="lowa">Lowa</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <input type="number" name="service" id="zip" placeholder="Zip-Code"
                                                    class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <textarea name="msg" id="msg" class="form-control"
                                                    placeholder="Address" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn form-control">Place Order</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div> -->


@endsection
 