@extends('layouts.peddyhub')

@section('content')
<div class="main-wrapper pet profile col-12">
        <section class="profile col-12">
            <div class="container">
                <div class="slide">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12">
                            <div class="new_custom images">
                                <div class="owl-carousel">
                                    <div class="item">
                                        <div class="testimon">
                                            <div class="image">
                                                <img src="{{ url('storage/'.$adoptpet->photo )}}" alt="image of pet" title="pet"
                                                    class="img-fluid customer">
                                            </div>
                                        </div>
                                    </div>
                                    @if(!empty($adoptpet->photo2))
                                        <div class="item">
                                            <div class="testimon">
                                                <div class="image">
                                                    <img src="{{ url('storage/'.$adoptpet->photo2 )}}" alt="image of pet" title="pet"
                                                        class="img-fluid customer">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($adoptpet->photo3))
                                        <div class="item">
                                            <div class="testimon">
                                                <div class="image">
                                                    <img src="{{ url('storage/'.$adoptpet->photo3 )}}" alt="image of pet" title="pet"
                                                        class="img-fluid customer">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($adoptpet->photo4))
                                        <div class="item">
                                            <div class="testimon">
                                                <div class="image">
                                                    <img src="{{ url('storage/'.$adoptpet->photo4 )}}" alt="image of pet" title="pet"
                                                        class="img-fluid customer">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(!empty($adoptpet->photo5))
                                        <div class="item">
                                            <div class="testimon">
                                                <div class="image">
                                                    <img src="{{ url('storage/'.$adoptpet->photo5 )}}" alt="image of pet" title="pet"
                                                        class="img-fluid customer">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="card" style="padding:10px">
                                <div class="row">
                                    <div class="col-2 text-center"style="padding:0px;">
                                        @if(!empty($adoptpet->user->photo))
                                            <img style="border-radius: 50%;object-fit:cover; width:70px;height:70px;"  src="{{ url('storage')}}/{{ $adoptpet->user->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                        @else
                                            <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                        @endif
                                    </div>
                                    @php
                                        $profile = $adoptpet->user;
                                    @endphp
                                    <div class="col-5">
                                        <h6 class="notranslate">{{$profile->profile->name}}</h6>
                                        <p style="margin:0px;">{{ $adoptpet->user->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="col-5">
                                    
                                    <a href="tel: {{$profile->profile->phone}}"  type="button" class="btn btn-outline-primary">ติดต่อ</a>
                                    </div>
                                </div>
                                
                            </div>
                            <br>
                            <div class="spec">
                                <div class="name">
                                    <h3>ชื่อ: <span> {{$adoptpet->titel}} </span>
                                        @switch($adoptpet->gender)
                                            @case('หญิง')
                                            <i style="font-size:28px;color:#F06491;margin-left:10px" class="fas fa-venus"></i>
                                            @break
                                            @case('ชาย')
                                                <i style="font-size:28px;color:#00ADEF;margin-left:10px" class="fas fa-mars"></i>
                                            @break
                                            @case('ไม่ระบุ')
                                                <i style="font-size:28px;color:#88C550;margin-left:10px" class="fas fa-venus-mars"></i>
                                            @break
                                        @endswitch
                                    </h3>
                                </div>
                                <ul>
                                    <li><i class="fas fa-paw yellow me-2"></i> ช่วงอายุ: {{$adoptpet->age}}</li>
                                    <!-- <li><i class="fas fa-paw yellow me-2"></i> Hollywood, FL</li> -->
                                    <li><i class="fas fa-paw yellow me-2"></i> ขนาด: {{$adoptpet->size}}</li>
                                    <!-- <li><i class="fas fa-paw yellow me-2"></i> Weight: 6</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> Color: White</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> Breed: Dongu</li>
                                    <li><i class="fas fa-paw yellow me-2"></i> Location: Florida</li> -->
                                </ul>
                                @if(!empty($adoptpet->detail))
                                    <h5>
                                        รายละเอียด
                                    </h5>
                                    <p>
                                    {{$adoptpet->detail}}
                                    </p>
                                @endif
                                <div class="button">
                                    <a href="tel: {{$profile->profile->phone}}" class="btn main" >
                                        ติดต่อสอบถาม <i class="fas fa-paw"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- <div class="pet service">

            <section class="steps">
                <div class="container">
                    <div class="heading text-center">
                        <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                    class="fas fa-paw"></i> </span></p>
                        <h2 class="wow fadeInDown">More <span class="wow pulse" data-wow-delay="1s">
                                Pets</span>
                        </h2>
                    </div>
                    <div class="services">
                        <div class="cards">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card orange s_one wow fadeInLeft">
                                        <div class="icon">
                                            <img src="images/home_5/pet-profile3.png" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="#" title="Pet Grooming">
                                                <h5>Scooby</h5>
                                            </a>
                                            <p>
                                                Due thanks blissfully reverent that outside pled along some goldfish did
                                                chromatic gosh sloth sedas instead coincident
                                            </p>
                                            <div class="more">
                                                <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card yellow s_two wow fadeInUp">
                                        <div class="icon">
                                            <img src="images/home_5/pet-profile.png" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="#" title="Pet Adoption">
                                                <h5>Shawn</h5>
                                            </a>
                                            <p>
                                                Due thanks blissfully reverent that outside pled along some goldfish did
                                                chromatic gosh sloth sedas instead coincident
                                            </p>
                                            <div class="more">
                                                <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card purple s_three wow fadeInRight">
                                        <div class="icon">
                                            <img src="images/home_5/pet-profile6.png" alt="">
                                        </div>
                                        <div class="content">
                                            <a href="#" title="Pet Training">
                                                <h5>Rosy</h5>
                                            </a>
                                            <p>
                                                Due thanks blissfully reverent that outside pled along some goldfish did
                                                chromatic gosh sloth sedas instead coincident
                                            </p>
                                            <div class="more">
                                                <a href="#" title="Read More"><i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div> -->
    </div>

    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Adoptpet {{ $adoptpet->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/adoptpet') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/adoptpet/' . $adoptpet->id . '/edit') }}" title="Edit Adoptpet"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('adoptpet' . '/' . $adoptpet->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Adoptpet" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $adoptpet->id }}</td>
                                    </tr>
                                    <tr><th> Titel </th><td> {{ $adoptpet->titel }} </td></tr><tr><th> Detail </th><td> {{ $adoptpet->detail }} </td></tr><tr><th> User Id </th><td> {{ $adoptpet->user_id }} </td></tr><tr><th> Photo </th><td> {{ $adoptpet->photo }} </td></tr><tr><th> Gender </th><td> {{ $adoptpet->gender }} </td></tr><tr><th> Size </th><td> {{ $adoptpet->size }} </td></tr><tr><th> Age </th><td> {{ $adoptpet->age }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection

    