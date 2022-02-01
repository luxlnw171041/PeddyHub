@extends('layouts.peddyhub')

@section('content')

<div class="main-wrapper pet b_profile">
        <div class="pet blog_right">
            <section class="job">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12">
                            <div class="profile mt-4">
                                <div class="details">
                                    <div class="image d-flex justify-content-center">
                                        <img src="{{ url('storage/'.$post->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid customer">
                                    </div>
                                    <h4 class="mt-4 mb-2">{{ $post->detail}}
                                    </h4>
                                </div>
                                <div class="elements">
                                    <span class="tags">
                                        <span class="heading"> Post Tags: </span>
                                        <a href="#" title="Pets"> Pets </a> ,
                                        <a href="#" title="Grooming"> Grooming </a> ,
                                        <a href="#" title="Shelter"> Shelter </a> ,
                                        <a href="#" title="Breed"> Breed </a> ,
                                    </span>
                                    <span class="share">
                                        <span class="heading"> Share This Post: </span>
                                        <a href="#" title="facebook"><i class="fas fa-facebook"></i></a>
                                        <a href="#" title="twitter"><i class="fas fa-twitter"></i></a>
                                        <a href="#" title="instagram"><i class="fas fa-instagram"></i></a>
                                    </span>
                                    <div class="comments mt-2">
                                        <h5>
                                            Comments
                                        </h5>
                                        @foreach($comment as $data)
                                                @if(($data->post_id  ==  $post->id))
                                                    <div class="comment">
                                                        <div class="image pr-4 pt-3 col-11" style="margin-top:-10px;"> 
                                                            @if(!empty($data->user->photo))
                                                                <img class="img-fluid" src="{{ url('storage')}}/{{ $data->user->photo }}"alt="Image of Author" title="Author" width="125" height="100">
                                                            @elseif(($data->user->photo  ==  null))
                                                            <img class="img-fluid" src="{{ url('peddyhub/images/home_5/icon1.png')}}"alt="Image of Author" title="Author" width="125" height="100">
                                                            @endif
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-11">
                                                            <div class="context">
                                                            <h5>{{$data->user->name}}</h5>
                                                            <p class="mb-0">
                                                                <span>{{ $data->created_at->thaidate('j M Y') }}</span> 
                                                            </p>
                                                            <p>
                                                            {{$data->content}}
                                                            </p>
                                                        </div>
                                                            </div>
                                                            <div class="col-1">
                                                            @if(($user_id  ==  $data->user_id))
                                                                <a  type="button dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-primary">
                                                                    <a class="dropdown-item" href="{{ url('/comment/' . $data->id . '/edit') }}"><i class="fas fa-pen-square" aria-hidden="true"></i>&nbsp;&nbsp;แก้ไขโพสต์</a>
                                                                    <form method="POST" action="{{ url('/comment' . '/' . $data->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                        {{ method_field('DELETE') }}
                                                                        {{ csrf_field() }}
                                                                        <button  type="submit" class="dropdown-item" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="" aria-hidden="true"></i>&nbsp;&nbsp;ลบโพสต์</button>
                                                                    </form>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                @endif        
                                        @endforeach
                                        <!-- <div class="comment pt-3">
                                            <div class="image pr-4 pt-3">
                                                <img class="img-fluid" src="{{ asset('peddyhub/images/home_5/reviewer-2.png') }}"
                                                    alt="Image of Author" title="Author">
                                            </div>
                                            <div class="context">
                                                <h5>Cindy Cambell</h5>
                                                <p class="mb-0">
                                                    <span>March 2, 2021</span> || <span><a href="#"
                                                            title="Reply">Reply</a> </span>
                                                </p>
                                                <p>
                                                    And one into considering ahead yet tepid far oriole
                                                    pointed wildebeest jeepers contrary circa hello
                                                    rolled
                                                    alas goldfinch less apt wherever suitably.
                                                </p>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="form mt-4">
                                        @if(Auth::check())
                                            <form method="POST" action="{{ url('/comment') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="row">
                                                    <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="name"
                                                                placeholder="Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" name="email"
                                                                placeholder="Email">
                                                        </div>
                                                    </div> -->
                                                    {{ csrf_field() }}
                                                    <input class="d-none" name="user_id" type="number" id="user_id" value="{{$user_id}}" >                                
                                                    <input class="d-none" name="post_id" type="number" id="post_id" value="{{ $post->id }}" >  
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="form-group">
                                                            <textarea name="content" id="content" cols="30" rows="5"
                                                                class="form-control"
                                                                placeholder="แสดงความคิดเห็น..."></textarea>
                                                        </div>
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
                                    {{$likeCtr}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="r_sidebar mt-4">
                                <!-- <form action="" method="post">
                                    <div class="form-group">
                                        <input type="search" name="search" id="search" class="form-control"
                                            placeholder="Search">
                                        <button type="submit" class="form-control"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </form> -->
                                <div class="categories">
                                    <h5>Categories</h5>
                                    <ul>
                                        <li class="py-1"><a href="#" title="Pets Lover"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Lover</a></li>
                                        <li class="py-1"><a href="#" title="Cats & Dog Foods"><i
                                                    class="orange fas fa-paw"></i>Cats
                                                & Dog Foods</a></li>
                                        <li class="py-1"><a href="#" title="Other Pets"><i
                                                    class="orange fas fa-paw"></i>Other
                                                Pets</a></li>
                                        <li class="py-1"><a href="#" title="Pets Health"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Health</a></li>
                                        <li class="py-1"><a href="#" title="Homemade & DIY"><i
                                                    class="orange fas fa-paw"></i>Homemade & DIY</a>
                                        </li>
                                        <li class="py-1"><a href="#" title="Pets Adoption"><i
                                                    class="orange fas fa-paw"></i>Pets
                                                Adoption</a></li>
                                        <li class="py-1"><a href="#" title="Vaccine Care"><i
                                                    class="orange fas fa-paw"></i>Vaccine
                                                Care</a></li>
                                    </ul>
                                </div>
                                
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
                                    <!-- <div class="card">
                                        <div class="post">
                                            <a href="blog-profile.html" title="Image">
                                                <img src="{{ asset('peddyhub/images/home_5/event-3-post.png') }}" alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        Considering At Aesthetic <br> More Some Dreamed
                                                    </p>
                                                </a>
                                                <div class="purple date">Feb 28, 2021</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="post">
                                            <a href="blog-profile.html" title="Image">
                                                <img src="{{ asset('peddyhub/images/home_5/event-3-post.png') }}" alt="Image of Post" title="Post" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="context">
                                            <div class="content">
                                                <a href="blog-profile.html" title="Post">
                                                    <p>
                                                        Considering At Aesthetic <br> More Some Dreamed
                                                    </p>
                                                </a>
                                                <div class="purple date">Feb 28, 2021</div>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Post {{ $post->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/post') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/post/' . $post->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('post' . '/' . $post->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $post->id }}</td>
                                    </tr>
                                    <tr><th> User Id </th><td> {{ $post->user_id }} </td></tr><tr><th> Detail </th><td> {{ $post->detail }} </td></tr><tr><th> Photo </th><td> {{ $post->photo }} </td></tr><tr><th> Video </th><td> {{ $post->video }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
