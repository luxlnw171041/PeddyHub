@extends('layouts.peddyhub')

@section('content')

@php
    $post =  \App\Models\Post::where(['id' => '1'])->first() ;
    $query = \App\Models\Post::all(['id', 'detail' ,'photo' ,'created_at']);
    $user_id = Illuminate\Support\Facades\Auth::id();
@endphp

<div class="main-wrapper pet b_profile">
        <div class="pet blog_right">
            <section class="job">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="profile mt-4">
                                <div class="details">
                                    <div class="image d-flex justify-content-center">
                                        <img src="{{ url('storage/'.$post->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid main-shadow main-radius">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <span class="tags">
                                                <span class="heading"><b> ประเภท : </b></span>
                                                <span class="text-info"><b>ทั่วไป</b></span>
                                            </span>
                                        </div>
                                        <div class="col-6">
                                            <div style="float: right;">
                                                <i class="fa-solid fa-share-nodes"></i>&nbsp;
                                                <i class="fa-brands fa-facebook-square text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <p class="mt-1 mb-0">{{ $post->detail }} </p>
                                    <br>
                                </div>
                                <div class="elements">
                                    <div class="comments mt-2">
                                        <h6>ความคิดเห็น</h6>
                                        <!-- -------------- ตัวอย่าง -------------- -->
                                        <div id="EX_test_comment" class="row d-none">
                                            <div class="col-2 text-center" style="padding:0px;margin-top:5px;">
                                                <center>
                                                    <img style="border-radius: 50%;object-fit:cover;width:40px;height:40px;"  src="peddyhub/images/home_5/icon1.png" class="img-fluid customer">
                                                </center>
                                            </div>
                                            <div class="col-10">
                                                <div class="dropdown" style="z-index: 9999;">
                                                    <i style="float:right;" class="fa-solid fa-ellipsis-vertical" id="dropdown_delete_comment_id_6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown_delete_comment_id_6">
                                                        <button class="dropdown-item" data-toggle="modal" data-target="#modal_delete_comment_id_6">
                                                            <i class="fa-solid fa-trash-can text-danger"></i> &nbsp;ลบความคิดเห็น
                                                        </button>
                                                    </div>
                                                </div>
                                                <p>
                                                    <b class="notranslate">
                                                        ชื่อคน Comment
                                                    </b>
                                                    <br>
                                                    ตัวอย่างการ Comment
                                                </p>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <p class="text-secondary" style="font-size: 14px;">
                                                            <span id="comment_id_6" onclick="user_like_comment('6' , '{{ $user_id }}');">ถูกใจ</span> &nbsp;&nbsp; | &nbsp;&nbsp; <span id="count_like_comment_6" style="color: #B8205B;"><i class="far fa-heart"></i> &nbsp;&nbsp; 1</span>
                                                        </p>
                                                    </div>
                                                    <div class="col-6">
                                                        <p class="text-secondary" style="font-size: 14px;float: right;">
                                                            เวลาที่ผ่านไป 
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- --------------------------------------------------- -->
                                    </div>
                                    <div class="form mt-4">
                                        @if(Auth::check())
                                            <form method="POST" action="{{ url('/comment') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="row">
                                                    {{ csrf_field() }}
                                                    <input class="d-none" name="user_id" type="number" id="user_id" value="{{$user_id}}" >                                
                                                    <input class="d-none" name="post_id" type="number" id="post_id" value="{{ $post->id }}" >  
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <textarea name="content" id="content" placeholder="แสดงความคิดเห็น..."></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-11">แสดงความคิดเห็น</button>
                                            </form>
                                        @else
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <textarea name="content" id="content" cols="30" rows="5"
                                                        class="form-control"
                                                        placeholder="เข้าสู่ระบบเพื่อแสดงความคิดเห็น..." disabled></textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-11 disabled" >เข้าสู่ระบบเพื่อแสดงความคิดเห็น</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="r_sidebar mt-4">
                                <div class="categories">
                                    <h5>ประกาศหาน้องหาย</h5>
                                    <div class="col-12 owl-carousel-lostpet align-self-center" style="padding:0px;">
                                        <div class="owl-carousel">
                                            @php
                                              $lost_pets = \App\Models\Lost_Pet::where(['status' => 'show'])->inRandomOrder()->get();
                                            @endphp
                                            @foreach($lost_pets as $item)
                                                <div class="item" style="padding:5px;z-index:-1;">
                                                    <div class="testimon">
                                                        <a href="{{ url('/lost_pet/' . $item->id) }}" target="bank">
                                                            <img class="main-shadow" style="border-radius: 50%;object-fit:cover; width:100px;height:100px;" src="{{ url('storage/'.$item->photo )}}">
                                                            <br>
                                                            <center>
                                                                <span class="text-dark">
                                                                    <b>{{ $item->pet->name }}</b>
                                                                </span>
                                                                <br>
                                                                <span>
                                                                    <i class="fa-solid fa-location-dot text-danger"></i> &nbsp;{{ $item->pet->name }}
                                                                </span>
                                                                <br><br>
                                                                <a href="tel:{{ $item->profile->phone }}" class="btn btn-sm btn-outline-success main-shadow main-radius" style="width:100%;">
                                                                    <i class="fa-solid fa-phone"></i> &nbsp;ติดต่อ
                                                                </a>
                                                            </center>

                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <hr class="text-secondary" style="border-width: 1px;border: solid;border-color: pink;">
                            
                                <div class="adopt_gallery">
                                    <h5>For Adoption</h5>
                                    <ul>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="image">
                                                <figure class="imghvr-slide-down">
                                                    <img src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}" alt="Image of pet" title="Pet"
                                                        class="img-fluid">
                                                    <figcaption class="text-center">
                                                        <div class="icon">
                                                            <i class="fas fa-camera"></i>
                                                        </div>
                                                    </figcaption>
                                                    <a href="#"></a>
                                                </figure>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tags">
                                    <h5>Tags</h5>
                                    <p class="mt-3">
                                        <a href="#" title="Pet">Pet Lovers</a>
                                        <a href="#" title="Cat">Cat</a>
                                        <a href="#" title="Grooming">Grooming</a>
                                        <a href="#" title="Pet">Pet Care</a>
                                        <a href="#" title="Pet">Pet Lovers</a>
                                    </p>
                                </div>
                                <div class="recent">
                                    <h5>Recent Posts</h5>
                                    @foreach($query->   random(3) as $data)
                                    
                                    <div class="card">
                                        <div class="post">
                                            <a href="{{ url('/post/' . $data->id) }}" title="Image">
                                                <img src="{{ url('storage/'.$data->photo )}}"  width="100px" height="100px"alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        {{$data->detail}}
                                                    </p>
                                                </a>
                                                <div class="purple date">{{ $data->created_at->thaidate('j M Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

@endsection
