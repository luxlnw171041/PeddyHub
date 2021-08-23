
@extends('layouts.peddyhub')

 @section('content')


</section>
<div class="pet about main-wrapper pet tm_profile">
        <section class="featured">
            <div class="crumb">
                <div class="container">
                    <h1>
                        My <span class="wow pulse" data-wow-delay="1s"> Profile </span>
                    </h1>
                    <div class="bg_tran">
                        My Pfofile
                    </div>
                    <p>
                        <a href="{{ url('/') }}" title="Home">HOME</a>
                        || <span> profile </span>
                    </p>
                </div>
            </div>
        </section>
        <section class="team" style="margin-top:-20px">
            <div class="row">
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="member">
                            <div class="image">
                                @if(!empty($data->photo))
                                    <img style="width:350px; hight: 292px;" src="{{ url('storage')}}/{{ $data->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                @else 
                                    <img src="{{ url('/peddyhub/images/home_5/team-1.png') }}"  alt="image of client" title="client" class="img-fluid customer">
                                @endif
                                <!-- @if(!empty($data->photo))
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario"> 
                                            @else
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
                                            @endif -->
                            </div>
                            <div class="content">
                                <div class="name wow fadeInDown">
                                    <a title="name">{{ $data->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="main-wrapper pet tm_profile">
                        <section class="profile team">
                                <div class="slide">
                                    <div class="row">
                                        <div class="col-lg-11 col-md-11 col-sm-12" >
                                            <br>
                                            <div class="spec card">
                                                <ul>
                                                    <li>
                                                        <h5>ข้อมูลส่วนตัว &nbsp;
                                                            <a href="{{ url('/profile/' . $data->id . '/edit') }}" class="text-white float-right btn btn-warning " >
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </h5>
                                                    </li>
                                                    <li><i class="fas fa-paw yellow me-2"></i> <span> username: </span>  {{ $data->username }}</li>
                                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Birthday: </span>  {{ $data->birth }}</li>
                                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Gender: </span> {{ $data->sex }}</li>
                                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Email: </span> {{ $data->email }}</li>
                                                    <li><i class="fas fa-paw yellow me-2"></i> <span> tel: </span>{{ $data->phone }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<!-- <div class="main-wrapper pet tm_profile">
        <section class="profile">
            <div class="container">
                <div class="slide">
                    <div class="row">
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="images">
                                <img src="images/home_5/team-1.png" alt="Image of Member" title="Member"
                                    class="img-fluid">
                            </div>
                            <div class="card">
                                <ul>
                                    <li>
                                        <h4>Contact Info</h4>
                                    </li>

                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Email: </span>
                                        <a href="mailto: example@example.com">example@example.com</a> </li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Phone: </span>  <a href="tel: 9328475899"> +9328475899</a>
                                    </li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Emergency: </span>
                                        <a href="tel: (08000) 5439 980"> (08000) 5439 980</a>
                                    </li>
                                    <li class="links mt-3 text-center">
                                        <a href="#" title="facebook"><i class="fas fa-facebook"></i></a>
                                        <a href="#" title="twitter">asd</a>
                                        <a href="#" title="instagram"><i class="fas fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 col-sm-12" >
                            <br>
                            <div class="spec card">
                                <ul>
                                    <li>
                                        <h5>ข้อมูลส่วนตัว</h5>
                                    </li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> username: </span>  {{ $data->username }}</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> name: </span> {{ $data->name }}</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Email: </span> {{ $data->email }}</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> tel: </span>{{ $data->tel }}</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> <span> Availablity: </span> Mon -
                                        Sat 9:00 am To 6:00 pm</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div> -->