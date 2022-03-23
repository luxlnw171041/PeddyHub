
@extends('layouts.peddyhub')

 @section('content')


</section>
<div class="pet about main-wrapper pet tm_profile">
        <section class="featured">
            <div class="crumb">
                <div class="container notranslate">
                    <h4>
                        My <span class="wow pulse" data-wow-delay="1s"> Profile </span>
                    </h4>
                </div>
            </div>
        </section>
        <section class="team" style="margin-top:-20px;padding-bottom:0px;">
            <div class="row">
                <div class="col-md-5 d-flex justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="member">
                            <div class="image">
                                @if(!empty($data->profile->photo))
                                    <img style="width:350px; " src="{{ url('storage')}}/{{ $data->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                  
                                @else 
                                    <img src="{{ url('/peddyhub/images/home_5/team-1.png') }}"  alt="image of client" title="client" class="img-fluid customer">
                                @endif
                                <!-- @if(!empty($data->photo))
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{ url('storage')}}/{{ $data->photo }}" data-original-title="Usuario"> 
                                            @else
                                                <img alt="" style="width:600px; border-radius: 50%;" title="" class="img-circle img-thumbnail isTooltip" src="{{$data->avatar}}" data-original-title="Usuario"> 
                                            @endif -->
                            </div>
                            <!-- @foreach($data->pets as $pet)
                            {{ $pet->name }}
                            <div class="d-flex justify-content-around">
                            <img src="{{ url('storage/'.$pet->photo )}}" width="295px" alt="image of pet" title="pet" class="img-fluid customer">
</div>
                            @endforeach -->
                            <div class="content">
                                <div class="name wow fadeInDown">
                                    <a title="name">{{ $data->profile->name }}</a>
                                    @switch($data->profile->sex)
                                        @case('ผู้หญิง')
                                           <i style="font-size:28px;color:#F06491;margin-left:10px" class="fas fa-venus"></i>
                                        @break
                                        @case('ผู้ชาย')
                                            <i style="font-size:28px;color:#00ADEF;margin-left:10px" class="fas fa-mars"></i>
                                        @break
                                        @case('ไม่ต้องการตอบ')
                                            <i style="font-size:28px;color:#88C550;margin-left:10px" class="fas fa-venus-mars"></i>
                                        @break
                                    @endswitch
                                    
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
                                            <div class="spec card">
                                                <ul>
                                                    <li>
                                                        <h5>ข้อมูลส่วนตัว &nbsp;
                                                        @switch($data->profile->language)
                                                            @case('en')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" height="26px" src="{{ asset('/peddyhub/images/national-flag/en.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('zh-TW')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/cn.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('hi')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/in.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('ar')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/ar.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('ru')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/ru.png') }}" style= "border-radius: 5px;border: 1px solid; color:#8C8C8C;">
                                                                </a>
                                                            @break
                                                            @case('es')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/es.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('de')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px"  height="26px" src="{{ asset('/peddyhub/images/national-flag/de.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('ja')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/jp.png') }}" style= "border-radius: 5px;border: 1px solid; color:#8C8C8C;">
                                                                </a>
                                                            @break
                                                            @case('ko')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/ko.png') }}" style= "border-radius: 5px;border: 1px solid; color:#8C8C8C;">
                                                                </a>
                                                            @break
                                                            @case('th')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/th.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('lo')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/la.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                            @case('mr')
                                                                <a class="btn" href="#" data-toggle="modal" data-target="#exampleModal" style="padding:0px">
                                                                    <img width="40px" src="{{ asset('/peddyhub/images/national-flag/my.png') }}" style= "border-radius: 5px;">
                                                                </a>
                                                            @break
                                                        @endswitch
                                                            
                                                            
                                                            
                                                            <a href="{{ url('/user/' . $data->id . '/edit') }}" class="text-white float-right btn btn-warning " >
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                        </h5>
                                                    </li>
                                                    <li style="font-size:22px;"><i class="fas fa-paw yellow me-2"></i> <span> username: </span>  {{ $data->username }}</li>
                                                    <li style="font-size:22px;"><i class="fas fa-paw yellow me-2"></i> <span> วันเกิด: </span>  {{ $data->profile->birth }}</li>
                                                    <li style="font-size:22px;"><i class="fas fa-paw yellow me-2"></i> <span> อีเมล: </span> {{ $data->email }}</li>
                                                    <li style="font-size:22px;"><i class="fas fa-paw yellow me-2"></i> <span> เบอร์: </span>{{ $data->profile->phone }}</li>
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
    <div class="main-wrapper pet buy">
        <section class="featured">
            <div class="crumb">
                <div class="container notranslate">
                    <h4>
                        My <span class="wow pulse" data-wow-delay="1s"> Pet </span>
                    </h4>
                </div>
            </div>
        </section>
        
        <div class="button wow fadeInUp ">
            <div class="container  d-flex justify-content-end">
                <a style="font-size:15px;" href="{{ url('/pet/create') }}" class="btn main" title="contact">
                    เพิ่มสัตว์เลี้ยง <i class="fas fa-paw"></i>
                </a>
            </div>
        </div>
        <div class="pet about second" >
            <section class="team">
                <div class="container">
                    <!-- <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown">Ready to Adopt <span class="wow pulse" data-wow-delay="1s">
                                Pets</span>
                        </h2>
                    </div> -->
                    <div class="row">
                        @foreach($petuser as $item)
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div class="member">
                                    <div class="image">
                                    @if(!empty($item->photo))
                                        <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="295px" alt="image of pet" title="pet" class="img-fluid customer">
                                    @else 
                                        <img src="{{ url('/peddyhub/images/home_5/team-1.png') }}"  alt="image of client" title="client" class="img-fluid customer">
                                    @endif
                                    </div>
                                    <div class="content">
                                        <h4 class="wow fadeInDown text-conter notranslate">
                                        @php
                                            $pet_category = $item->pet_category_id ;
                                        @endphp
                                        @include ('menubar.icon_categorie')
                                        {{ $item->name }}
                                        @switch($item->gender)
                                            @case('หญิง')
                                            <i style="font-size:28px;color:#F06491;margin-left:1px" class="fas fa-venus"></i>
                                            @break
                                            @case('ชาย')
                                                <i style="font-size:28px;color:#00ADEF;margin-left:1px" class="fas fa-mars"></i>
                                            @break
                                            @case('ไม่ระบุ')
                                                <i style="font-size:28px;color:#88C550;margin-left:1px" class="fas fa-venus-mars"></i>
                                            @break
                                        @endswitch
                                        </h4>
                                        <ul style="font-size:20px;">
                                            <li><i class="fas fa-paw"></i>วันเกิด : {{ $item->birth }}</li>
                                            <li><i class="fas fa-paw"></i>ช่วงอายุ : {{ $item->age }}</li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-md-6 col-6 col-lg-6">
                                                <div class="button wow fadeInUp d-flex justify-content-start " >
                                                    <a  href="{{ url('/pet/' . $item->id . '/edit') }} " class="btn main d-flex align-items-end" title="contact">
                                                        Edit &nbsp;<i class="fas fa-paw"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-6 col-lg-6" >
                                                <div class="button wow fadeInUp d-flex justify-content-end" >
                                                    <form id="myform" method="POST" action="{{ url('/pet' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline" >
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <a  href="javascript:;" type="submit" class="btn main" title="Delete Pet" onclick="this.parentNode.submit();">ลบ</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
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