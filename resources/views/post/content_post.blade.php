@foreach($post as $item)
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card" id="id{{ $item->id }}">
            <div style="padding-top:10px;padding-left:20px;">
                <div class="row">
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
                            <a class="dropdown-item" onclick="copy_link('{{ $item->id }}');">
                                <i class="fa-solid fa-copy text-info"></i>&nbsp;&nbsp;คัดลอกลิงก์
                            </a>
                            @if(($id  ==  $item->user_id))
                                <!-- <a class="dropdown-item" href="{{ url('/post/' . $item->id . '/edit') }}"><i class="fa-solid fa-pen-to-square text-warning"></i>&nbsp;&nbsp;แก้ไขโพสต์</a> -->
                                <a class="dropdown-item" onclick="edit_post('{{ $item->id }}');">
                                    <i class="fa-solid fa-pen-to-square text-warning"></i>&nbsp;&nbsp;แก้ไขโพสต์
                                </a>
                                <form method="POST" action="{{ url('/post' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button  type="submit" class="dropdown-item" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)">
                                        <i class="fa-solid fa-trash-can text-danger"></i>&nbsp;&nbsp;ลบโพสต์
                                    </button>
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
            </div>
            <div style="padding:10px;">
                <p style="z-index:1;color: #B8205B;">
                    @php
                        if(!empty($item->like_all)){
                            $like_all_arr = json_decode($item->like_all) ;
                            $count_like = count($like_all_arr) ;
                        }else{
                            $count_like = "ถูกใจเป็นคนแรก" ;
                        }
                    @endphp
                    <span class="like notranslate">
                        <i class="fa-solid fa-heart"></i> <span id="span_count_like_{{ $item->id }}">{{ $count_like }}</span>
                    </span>
                    @php
                        $all_comment = \App\Models\Comment::where(['post_id' => $item->id])->get();
                        if(count($all_comment) == 0){
                            $count_all_comment = "ยังไม่มีความคิดเห็น";
                        }else{
                            $count_all_comment = "ความคิดเห็น " . count($all_comment);
                        }
                    @endphp
                    <span style="float:right;" class="comment" data-toggle="modal" data-target="#exampleModalScrollable{{ $item->id }}" onclick="document.querySelector('#btn_to_top').classList.add('d-none'),show_all_comment('{{ $item->id }}');">
                        {{ $count_all_comment }}&nbsp;
                    </span>
                </p>
            </div>
            <hr style="margin:0px 0px 0px 0px; ">
            <div class="row d-flex justify-content-center" style="padding:10px;">
                <div class="col-3">
                    @if(Auth::check())
                    <div class="d-grid  text-center">
                        @if(!empty($item->like_all))
                            @php
                                $like_all_arr = json_decode($item->like_all) ;
                            @endphp
                            @if(in_array($user->id , $like_all_arr))
                                <button class="btn btn-lg likebtn" id="btn_for_like_{{ $item->id }}" style="color: #B8205B;"
                                        onclick="un_user_like_post('{{ $user->id }}' , '{{ $item->id }}');">
                                    <b>
                                        <i class="far fa-heart"></i>
                                        <br>
                                        ถูกใจ
                                    </b>
                                </button>
                            @else
                                <button class="btn likebtn btn-lg" id="btn_for_like_{{ $item->id }}"
                                        onclick="user_like_post('{{ $user->id }}' , '{{ $item->id }}');">
                                    <b>
                                        <i class="far fa-heart"></i>
                                        <br>
                                        ถูกใจ
                                    </b>
                                </button>
                            @endif
                        @else
                            <button class="btn likebtn btn-lg" id="btn_for_like_{{ $item->id }}"
                                    onclick="user_like_post('{{ $user->id }}' , '{{ $item->id }}');">
                                <b>
                                    <i class="far fa-heart"></i>
                                    <br>
                                    ถูกใจ
                                </b>
                            </button>
                        @endif
                    </div>
                    @else
                        <button class="btn likebtn btn-lg" onclick="user_like_post('0' , '0');">
                            <b>
                                <i class="far fa-heart"></i>
                                <br>
                                ถูกใจ
                            </b>
                        </button>
                    @endif
                </div>
                <div class="col-6 d-grid ">
                    <button type="button" class="btn likebtn btn-lg" data-toggle="modal" data-target="#exampleModalScrollable{{ $item->id }}" onclick="document.querySelector('#btn_to_top').classList.add('d-none'),show_all_comment('{{ $item->id }}');">
                        <b>
                            <i class="fas fa-comment-dots"></i>
                            <br>
                            แสดงความคิดเห็น
                         </b>
                    </button>
                </div>
                <div class="col-3 d-grid ">
                    <button class="btn likebtn btn-lg" >
                        <b>
                            <i class="fa-solid fa-share-all"></i>
                            <br>
                            แชร์
                        </b>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalScrollable{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">ความคิดเห็น</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.querySelector('#btn_to_top').classList.remove('d-none');">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none;padding:15px;margin-top: -5px;">
                    <!-- -------------- ตัวอย่าง -------------- -->
                    @if($id == "1" or $id == "2")
                    <div id="EX_test_comment" class="row d-">
                        <div class="col-2 text-center" style="padding:0px;margin-top:5px;">
                            <center>
                                <img style="border-radius: 50%;object-fit:cover; width:40px;height:40px;"  src="peddyhub/images/home_5/icon1.png" class="img-fluid customer">
                            </center>
                        </div>
                        <div class="col-10">
                            <div class="dropdown" style="z-index: 9999;">
                                <i style="float:right;" class="fa-solid fa-ellipsis-vertical" id="dropdown_delete_comment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                <div class="dropdown-menu" aria-labelledby="dropdown_delete_comment">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#modal_delete_comment">
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
                                        <span id="comment_id_6" onclick="user_like_comment('6' , '{{ $id }}');">ถูกใจ</span> &nbsp;&nbsp; | &nbsp;&nbsp; <span id="count_like_comment_6" style="color: #B8205B;"><i class="far fa-heart"></i> &nbsp;&nbsp; 1</span>
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
                    @endif
                    <!-- ------------ จบตัวอย่าง ------------ -->

                    <!-- ALL COMMENT -->
                    <div class="row" id="content_comment_{{ $item->id }}"></div>
                    <!-- ไปล่างสุด -->
                    <a id="btn_a_last_modal" href="#last_modal" class="d-none"></a>
                    <div id="last_modal"></div>
                </div>
                <div class="modal-footer">
                    <div class="col-12">
                        <div class="row">
                            @if(Auth::check())
                                <div class="col-10" style="padding:0px;">
                                    {{ csrf_field() }}
                                    <input class="d-none" name="user_id_{{ $item->id }}" type="number" id="user_id_{{ $item->id }}" value="{{$id}}" >                                 
                                    <input class="form-control" name="content_{{ $item->id }}" type="text" id="content_{{ $item->id }}" value="" oninput="check_input_content_comment('{{ $item->id }}');">

                                </div>
                                <div class="col-2">
                                    <button id="btn_submit_content_{{ $item->id }}" type="submit" class="btn" style="border-radius: 50%;margin-top: 5px;background-color: #B8205B;" disabled onclick="submit_input_content_comment('{{ $item->id }}');">
                                        <i class="fas fa-arrow-right text-white"></i>
                                    </button>
                                </div>
                            @else
                                <h6 class="text-center">เข้าสู่ระบบเพื่อคอมเมนต์</h6>    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach