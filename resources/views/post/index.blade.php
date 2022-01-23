@extends('layouts.peddyhub')

@section('content')

<link href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css" rel="stylesheet">
<style>
   .likebtn{
    background-color: transparent;
    color:#53565B;
    font-family: 'Sarabun', sans-serif;
    font-size:14px;

   }

.likebtn:hover {background-color: #F2F2F2; color:black ;}

/* .likebtn:active {
  background-color: #3e8e41 !important;;
  box-shadow: 0 5px #666 !important;;
  transform: translateY(4px) !important;;
} */
</style>
<div class="main-wrapper pet blog">
    <div class="button wow fadeInUp " style="margin-bottom:-50px">  
        <div class="container  d-flex justify-content-end">
            @if(Auth::check())
                    <a href="{{ url('/post/create') }}" class="btn main" title="contact">
                        โพสต์ 
                    </a>
             @endif
        </div>
    </div>
        <div class="pet event">
            <div class="pet job">
                <section class="job">
                    <div class="container">
                        <!-- <div class="heading text-center">
                            <p class="wow fadeInUp"><span class="purple"><i class="fas fa-paw"></i> </span><span
                                    class="orange"><i class="fas fa-paw"></i> </span><span class="purple"><i
                                        class="fas fa-paw"></i> </span></p>
                            <h2 class="wow fadeInDown">Find The Most <span class="wow pulse" data-wow-delay="1s">
                                    Exciting News</span></h2>
                        </div> -->
                       
                        
                        <div class="row mt-5">
                            @foreach($post as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <div class="card">
                                    <div  style="padding-top:10px;padding-left:20px;">
                                            <div class="row">
                                                <!-- <span class="category">Pet Care</span> -->
                                                <div class="col-2" style="padding:0px;">
                                                @if(!empty($item->user->photo))
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $item->user->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                @else
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="peddyhub/images/sticker/1.png" alt="image of client" title="client" class="img-fluid customer">
                                                @endif
                                                </div>
                                                <div class="col-9" style="padding:0px">
                                                @if(!empty($item->user->name))
                                                <p class="notranslate" style="padding:0px;margin:0px;"> <b>{{ $item->user->name }}</b>  </p>
                                                    
                                                @else
                                                    Guest
                                                @endif
                                                    <span style="font-size:20px"> <b></b> </span>
                                                    <p style="font-size:12px;margin-top:-8px;"> {{ $item->created_at->diffForHumans() }} </p>
                                                </div>
                                                <div class="col-1" style="padding:0px;">
                                                    <a  type="button dropdown-toggle" id="dropdownMenu2" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i></a>
                                                    <div class="dropdown-menu dropdown-primary">
                                                        <a class="dropdown-item" href="#"><i class="fab fa-apple-pay"></i>&nbsp;&nbsp;คัดลอก</a>
                                                        @if(($id  ==  $item->user_id))
                                                            <a class="dropdown-item" href="{{ url('/post/' . $item->id . '/edit') }}"><i class="fas fa-pen-square" aria-hidden="true"></i>&nbsp;&nbsp;แก้ไขโพสต์</a>
                                                            <form method="POST" action="{{ url('/post' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <button  type="submit" class="dropdown-item" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="" aria-hidden="true"></i>&nbsp;&nbsp;ลบโพสต์</button>
                                                            </form>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-12" style="padding:0px 0px 0px 20px">
                                                    <a href="{{ url('/post/' . $item->id) }}" title="">
                                                        <p class="head mt-1 mb-0">{{ $item->detail }} </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="image">
                                                <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid customer">
<!--                                                 
                                            <div class="label">
                                                <ul>
                                                    <li class="date">{{ $item->created_at->format('d') }}</li>
                                                    <li>{{ $item->created_at->format('M') }}</li>
                                                    
                                                </ul>
                                            </div> -->
                                        </div>
                                        <div class="desc" style="padding-bottom:0px;">
                                            <p class="mb-0 col-md-10 col-10" style="z-index:1;">
                                                <!-- <span class="category">Pet Care</span> -->
                                                <span class="comment">20 Comments</span>
                                                <span class="like">192 Likes</span>
                                            </p>
                                            
                                                
                                            <!-- <a href="{{ url('/post/' . $item->id) }}" title="">
                                                <p class="head mt-1 mb-0">{{ $item->detail }}
                                                </p>
                                            </a> -->
                                            <!-- <p class="mt-1 mb-4">
                                                Broadcast neglectful and poignantly well until and some listlessly amidst
                                                cessful...
                                            </p> -->
                                            <!-- <div class="button text-end">
                                                <a href="{{ url('/post/' . $item->id) }}" class="btn main register">Read More</a><br>
                                            </div> -->
                                        </div>
                                       
                                            <hr style="margin:0px 0px 0px 0px; ">
                                            <div class="row d-flex justify-content-center" style="padding:10px;">
                                                <div class="col-4 d-grid gap-2">
                                                    <button type="button" class="btn likebtn btn-lg" ><b> <i class="far fa-heart"></i>  &nbsp;ถูกใจ</b></button>
                                                </div>
                                                <!-- <div class="col-4 d-grid gap-2">
                                                    <button type="button" class="btn likebtn btn-lg" ><b> <i class="fas fa-heart"></i>  &nbsp;ถูกใจ</b></button>
                                                </div> -->
                                                <div class="col-8 d-grid gap-2">
                                                    <button type="button" class="btn likebtn btn-lg" ><b><i class="fal fa-comments-alt"></i> แสดงความคิดเห็น</b></button>
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
   

    <!-- <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Post</div>
                    <div class="card-body">
                        <a href="{{ url('/post/create') }}" class="btn btn-success btn-sm" title="Add New Post">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/post') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User Id</th><th>Detail</th><th>Photo</th><th>Video</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($post as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user_id }}</td><td>{{ $item->detail }}</td><td><img src="{{ url('storage/'.$item->photo )}}" width="295px" alt="image of pet" title="pet" class="img-fluid customer"></td><td>{{ $item->video }}</td>
                                        <td>
                                            <a href="{{ url('/post/' . $item->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/post/' . $item->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/post' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button  type="submit" class="asText" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $post->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->
@endsection
