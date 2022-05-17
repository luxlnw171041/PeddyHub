@extends('layouts.peddyhub')

@section('content')

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
    <div class="button wow fadeInUp justify-content-end" style="margin-bottom:-50px">  
        <div class="container">
            <!-- <div class="row ">
                @include ('menubar.menu') 
                <div class="col-6 col-md-6  d-flex justify-content-end" style="margin-top:15px;">
                <div class="col-12">
                    @if(Auth::check())
                        <a href="{{ url('/post/create') }}" class="btn main " title="contact">
                           <span style="">โพสต์</span>  
                        </a>
                    @endif
                </div>
                </div>
            </div> -->

            <div class="row col-12">
                @include ('menubar.menu')
            </div>
            <br>
            <div class="row col-12" style="padding:0px;">
                <div class="col-12 col-md-9  ">
                    @include ('menubar.menu_btn')
                </div>
                <div class="col-12 col-md-3 order-first order-md-2">
                    @if(Auth::check())
                        <a href="{{ url('/post/create') }}" style="margin-top:8px" class="btn main float-right" title="contact">
                           <span >โพสต์</span>  
                        </a>
                    @endif
                </div>
            </div>
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
                                    <div class="card" id="id{{ $item->id }}">
                                        <div  style="padding-top:10px;padding-left:20px;">
                                            <div class="row">
                                                <!-- <span class="category">Pet Care</span> -->
                                                <div class="col-2" style="padding:0px;">
                                                @if(!empty($item->profile->photo))
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $item->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                @else
                                                    <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                                @endif
                                                </div>
                                                <div class="col-9" style="padding:0px">
                                                @if(!empty($item->profile->name))
                                                <p class="notranslate" style="padding:0px;margin:0px;"> <b>{{ $item->profile->name }}</b>  </p>
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
                                                        <a class="dropdown-item" href="#" ><i class="fa-solid fa-copy"></i>&nbsp;&nbsp;คัดลอก</a>
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
                                                @foreach($LIKE->take(1) as $asd)
                                                    @if(($asd->post_id  ==  $item->id))
                                                            <form method="POST" action="{{ url('/like' . '/' . $asd->id) }}" accept-charset="UTF-8" style="display:inline">
                                                                {{ method_field('DELETE') }}
                                                                {{ csrf_field() }}
                                                                <div class="col-5 d-grid gap-2 text-center"><button type="submit" class="btn likebtn btn-lg" ><b> <i class="far fa-heart" style="color:#B8205B;"></i>  &nbsp;ถูกใจแล้ว</b></button></div>
                                                            </form> 
                                                    @else
                                                    @endif
                                                @endforeach
                                                <div class="col-5">
                                                    <form method="POST" action="{{ url('/like') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                        {{ csrf_field() }}
                                                        <div class="d-grid  text-center"><button type="submit" class="btn likebtn btn-lg" ><b> <i class="far fa-heart"></i>  &nbsp;ถูกใจ</b></button></div>
                                                        <input class="d-none" name="user_id" type="number" id="user_id" value="{{$id}}" >                                
                                                        <input class="d-none" name="post_id" type="number" id="post_id" value="{{ $item->id }}" >     
                                                    </form> 
                                                </div>
                                                <!-- <div class="col-4 d-grid gap-2">
                                                    <button type="button" class="btn likebtn btn-lg" ><b> <i class="far fa-heart"></i>  &nbsp;ถูกใจ</b></button>
                                                </div> -->
                                                <!-- <div class="col-4 d-grid gap-2">
                                                    <button type="button" class="btn likebtn btn-lg" ><b> <i class="fas fa-heart"></i>  &nbsp;ถูกใจ</b></button>
                                                </div> -->
                                                <div class="col-7 d-grid ">
                                                    <button type="button" class="btn likebtn btn-lg" data-toggle="modal" data-target="#exampleModalScrollable{{ $item->id }}"><b><i class="fas fa-comment-dots"></i> แสดงความคิดเห็น</b></button>
                                                </div>
                                            </div>
                                    </div>
                                </div>

                                <!-- modal -->
                                <div class="modal fade" id="exampleModalScrollable{{ $item->id }}" style="z-index: index 9;00000;" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">ความคิดเห็น</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <!-- <span class="category">Pet Care</span> -->
                                                @foreach($comment as $data)
                                                    @if(($data->post_id  ==  $item->id))
                                                        <div class="col-2 text-center" style="padding:0px;margin-top:10px;">
                                                            @if(!empty($data->profile->photo))
                                                                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $data->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                                            @else
                                                            <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="peddyhub/images/home_5/icon1.png" alt="image of client" title="client" class="img-fluid customer">
                                                            @endif
                                                            </div>
                                                            <div class="col-9" style="padding:0px">
                                                                <p style="margin-bottom:-25px;">
                                                                    @if(!empty($item->profile->name))
                                                                        {{ $item->profile->name }}
                                                                    @else
                                                                        Guest
                                                                    @endif
                                                                </p> 
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        {{$data->content}}
                                                                    </div>
                                                                </div> 
                                                            
                                                            </div>
                                                            <div class="col-1"></div>
                                                            <div class="col-1"></div>
                                                            <div class="col-10 d-flex justify-content-end">{{ $data->created_at->diffForHumans() }}</div>
                                                    @endif
                                                            
                                                @endforeach
                                            </div>  
                                        </div>
                                        
                                        <form method="POST" action="{{ url('/comment') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                            <div class="modal-footer" style="padding:5px;">

                                                <div class="row col-12" style="padding:5px;">
                                                    @if(Auth::check())
                                                        <div class="col-10" style="padding:0px;">
                                                            {{ csrf_field() }}
                                                            <input class="d-none" name="user_id" type="number" id="user_id" value="{{$id}}" >                                
                                                            <input class="d-none" name="post_id" type="number" id="post_id" value="{{ $item->id }}" >  
                                                            <input class="form-control" name="content" type="text" id="content" value="" >

                                                        </div>
                                                        <div class="col-2">
                                                            <button type="submit" class="btn btn-primary" style="border-radius: 50%;"><i class="fas fa-arrow-right"></i></button>
                                                        </div>
                                                    @else
                                                    <h6 class="text-center">เข้าสู่ระบบเพื่อคอมเมนต์</h6>    
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                                <!-- endmodal -->
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
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        console.log("START");
        add_color();
        
    });
    function add_color(){
        console.log("add_color");
        document.querySelector('#btn_a_all').classList.add('btn-style-two');
        document.querySelector('#btn_a_all').classList.remove('btn-outline-two');
        document.querySelector('#btn_a_all_pc').classList.add('btn-style-two');
        document.querySelector('#btn_a_all_pc').classList.remove('btn-outline-two');
        
    }
</script>