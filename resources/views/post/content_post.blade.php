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
                        aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-primary">
                            <a class="dropdown-item" onclick="copy_link('{{ $item->id }}');">
                                <i class="fa-solid fa-copy text-info"></i>&nbsp;&nbsp;คัดลอกลิงก์
                            </a>
                            @if(($id  ==  $item->user_id))
                                <a class="dropdown-item" href="{{ url('/post/' . $item->id . '/edit') }}">
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
                            <p class="mt-1 mb-0">{{ $item->detail }} </p>
                        </a>
                    </div>
                </div>
            </div>
            @if(!empty($item->photo))
            <div class="image">
                <a href="{{ url('/post/' . $item->id) }}" title="">
                    <img class="imgf" src="{{ url('storage/'.$item->photo )}}" width="400px" height="300px" alt="image of pet" title="pet" class="img-fluid customer">
                </a>
            </div>
            @endif
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
                        $all_comment = \App\Models\Comment::where(['post_id' => $item->id])->where('status' , "show")->get();
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
                <div class="col-6 text-center ">
                    @if(Auth::check())
                    <div class="d-grid">
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
                    <button type="button" class="btn likebtn btn-lg" data-toggle="modal" data-target="#exampleModalScrollable{{ $item->id }}" onclick="document.querySelector('#btn_to_top').classList.add('d-none'),document.querySelector('#sticky-header').classList.add('d-none'),show_all_comment('{{ $item->id }}') ;">
                        <b>
                            <i class="fas fa-comment-dots"></i>
                            <br>
                            แสดงความคิดเห็น
                         </b>
                    </button>
                </div>
                <!-- <div class="col-3 d-grid d-none">
                    <button class="btn likebtn btn-lg" >
                        <b>
                            <i class="fa-solid fa-share-all"></i>
                            <br>
                            แชร์
                        </b>
                    </button>
                </div> -->
            </div>
        </div>
    </div>    

    <!-- Modal Comment -->
    <div class="modal fade p-0" id="exampleModalScrollable{{ $item->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">ความคิดเห็น</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="document.querySelector('#btn_to_top').classList.remove('d-none'),document.querySelector('#sticky-header').classList.remove('d-none');;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="border:none;padding:15px;margin-top: -5px;">
                    <!-- -------------- ตัวอย่าง -------------- -->
                    @if($id == "1" or $id == "2")
                    <div id="EX_test_comment" class="row d-none">
                        <div class="col-2 text-center" style="padding:0px;margin-top:5px;">
                            <center>
                                <img style="border-radius: 50%;object-fit:cover; width:40px;height:40px;"  src="{{ url('/peddyhub/images/home_5/icon1.png') }}" class="img-fluid customer">
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
                    <div id="content_comment_{{ $item->id }}"></div>
                    <!-- ไปล่างสุด -->
                    <a id="btn_a_last_comment" href="" class="d-none"></a>
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
                                    <button id="btn_submit_content_{{ $item->id }}" type="submit" class="btn" style="border-radius: 50%;margin-top: 1px;background-color: #B8205B;width:40px;height:40px;" disabled onclick="submit_input_content_comment('{{ $item->id }}');">
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
    <!-- endmodal comment -->

    <!-- Modal delete comment-->
    <div style="z-index: 999999;" class="modal fade modal_delete_comment" id="" tabindex="-1" aria-labelledby="ModalLabeldelete_comment" aria-hidden="true">
      <div class="modal-dialog modal-bottom">
        <div class="modal-content">
          <div class="modal-body">
            ยืนยันการลบความคิดเห็นนี้หรือไม่
            <br><br><br>
              <div style="float: right;">
                <button id="btn_close_delete_comment" type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button id="btn_cf_delete_comment"  type="button" class="btn btn-sm btn-primary" onclick="" >ลบ</button>
              </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal delete comment-->

    <script>
        if($('#exampleModalScrollable{{ $item->id }}').data('bs.modal').isShown == true){
    console.log("Modal is open");
    }
        else{
    console.log("Modal is not open");

        }
    </script>

@endforeach

@if(Auth::check())
    <input class="d-none" type="text" name="id_user" id="id_user" value="{{ $id }}">
@else
    <input class="d-none" type="text" name="id_user" id="id_user" value="0">
@endif

<script>

    function delete_comment(comment_id)
    {
        // console.log(comment_id);

        fetch("{{ url('/') }}/api/delete_comment/"+ comment_id )
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === "ok") {
                    document.querySelector('#div_id_comment_id_' + comment_id).innerHTML = "";
                    document.querySelector('.modal_delete_comment').id = "" ;
                    document.querySelector('#btn_cf_delete_comment').onclick = "" ;
                    document.querySelector('#btn_close_delete_comment').click();
                }

        });
    }

    function click_btn_dot_delete(comment_id)
    {
        let modal_delete_comment = document.querySelector('.modal_delete_comment');

        let id_modal_delete_comment = document.createAttribute("id");
            id_modal_delete_comment.value = "modal_delete_comment_id_" + comment_id ;
        modal_delete_comment.setAttributeNode(id_modal_delete_comment);

        let btn_cf_delete_comment = document.querySelector('#btn_cf_delete_comment');

        let onclick_btn_cf_delete_comment = document.createAttribute("onclick");
            onclick_btn_cf_delete_comment.value = "delete_comment('" + comment_id + "')" ;
        btn_cf_delete_comment.setAttributeNode(onclick_btn_cf_delete_comment);
    }

    function check_input_content_comment(post_id)
    {
        let content = document.querySelector('#content_' + post_id) ;
        let btn_submit_content = document.querySelector('#btn_submit_content_' + post_id) ;

        if (content.value) {
            btn_submit_content.disabled = false ;
        }else{
            btn_submit_content.disabled = true ;
        }
    }

    function submit_input_content_comment(post_id)
    {
        let content = document.querySelector('#content_' + post_id) ;
        let user_id = document.querySelector('#user_id_' + post_id) ;
        let btn_submit_content = document.querySelector('#btn_submit_content_' + post_id) ;

        let id_user = document.querySelector('#id_user').value;

        fetch("{{ url('/') }}/api/submit_input_content_comment/"+ user_id.value + "/" + post_id + "/" + content.value)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_content_comment = document.querySelector('#content_comment_' + post_id) ;
                
                let btn_a_last_comment =  document.querySelector('#btn_a_last_comment') ; 

                let href_btn_a_last_comment = document.createAttribute("href");
                    href_btn_a_last_comment.value = "#div_id_comment_id_" + result.id;
                btn_a_last_comment.setAttributeNode(href_btn_a_last_comment);
        
                // div ใหญ่ของ comment
                let div_id_comment = document.createElement("div");

                let id_div_id_comment = document.createAttribute("id");
                    id_div_id_comment.value = "div_id_comment_id_" + result.id;
                div_id_comment.setAttributeNode(id_div_id_comment);

                let class_div_id_comment = document.createAttribute("class");
                    class_div_id_comment.value = "row";
                div_id_comment.setAttributeNode(class_div_id_comment);

                // col-2 img profile
                let div_col_2 = document.createElement("div");
                let class_div_col_2 = document.createAttribute("class");
                    class_div_col_2.value = "col-2 text-center" ;
                div_col_2.setAttributeNode(class_div_col_2);
                let style_div_col_2 = document.createAttribute("style");
                    style_div_col_2.value = "padding:0px;margin-top:5px;" ;
                div_col_2.setAttributeNode(style_div_col_2);

                // นับ comment
                let count_like_comment = [] ;
                let like_all = [] ;
                if (result.like_all != null) {
                    like_all[result.id] = result.like_all ;

                    let count_like_comment_arr = like_all[result.id].split(",");

                    count_like_comment[result.id] = count_like_comment_arr.length;
                }else{
                    count_like_comment[result.id] = "0" ;
                }

                // ดึงข้อมูลโปรไฟล์
                    fetch("{{ url('/') }}/api/show_data_profile/"+ result.user_id)
                        .then(response => response.json())
                        .then(data_profile => {
                            // console.log(data_profile);
                            // center ครอบ img profile
                            let center_col_2 = document.createElement("center");
                                div_col_2.appendChild(center_col_2);
                            // img profile
                            let img_col_2 = document.createElement("img");
                            let style_img_col_2 = document.createAttribute("style");
                                style_img_col_2.value = "border-radius: 50%;object-fit:cover; width:40px;height:40px;";
                            img_col_2.setAttributeNode(style_img_col_2);
                            let src_img_col_2 = document.createAttribute("src");
                                if (data_profile[0]['photo'] != null) {
                                    src_img_col_2.value = "{{ url('storage')}}/" + data_profile[0]['photo'];
                                }else{
                                    src_img_col_2.value = "peddyhub/images/home_5/icon1.png";
                                }
                            img_col_2.setAttributeNode(src_img_col_2);
                            let class_img_col_2 = document.createAttribute("class");
                                class_img_col_2.value = "img-fluid customer" ;
                            // เพิ่ม img ใน center
                            center_col_2.appendChild(img_col_2);

                            // col-10 name profile
                            let div_col_10 = document.createElement("div");
                            let class_div_col_10 = document.createAttribute("class");
                                class_div_col_10.value = "col-10" ;
                            div_col_10.setAttributeNode(class_div_col_10);
                            
                            // div dropdown delete comment
                            if ( parseInt(id_user) === result.user_id ) {

                                let dropdown_col_10 = document.createElement("div");
                                div_col_10.appendChild(dropdown_col_10);

                                let class_dropdown_col_10 = document.createAttribute("class");
                                    class_dropdown_col_10.value = "dropdown" ;
                                dropdown_col_10.setAttributeNode(class_dropdown_col_10);

                                let style_dropdown_col_10 = document.createAttribute("style");
                                    style_dropdown_col_10.value = "z-index: 9999;" ;
                                dropdown_col_10.setAttributeNode(style_dropdown_col_10);

                                let i_dropdown = document.createElement("i");
                                dropdown_col_10.appendChild(i_dropdown);

                                let style_i_dropdown = document.createAttribute("style");
                                    style_i_dropdown.value = "float:right;" ;
                                i_dropdown.setAttributeNode(style_i_dropdown);

                                let class_i_dropdown = document.createAttribute("class");
                                    class_i_dropdown.value = "fa-solid fa-ellipsis-vertical" ;
                                i_dropdown.setAttributeNode(class_i_dropdown);

                                let id_i_dropdown = document.createAttribute("id");
                                    id_i_dropdown.value = "dropdown_delete_comment_id_" + result.id ;
                                i_dropdown.setAttributeNode(id_i_dropdown);

                                let data_toggle_i_dropdown = document.createAttribute("data-toggle");
                                    data_toggle_i_dropdown.value = "dropdown" ;
                                i_dropdown.setAttributeNode(data_toggle_i_dropdown);

                                let aria_haspopup_i_dropdown = document.createAttribute("aria-haspopup");
                                    aria_haspopup_i_dropdown.value = "true" ;
                                i_dropdown.setAttributeNode(aria_haspopup_i_dropdown);

                                let aria_expanded_i_dropdown = document.createAttribute("aria-expanded");
                                    aria_expanded_i_dropdown.value = "false" ;
                                i_dropdown.setAttributeNode(aria_expanded_i_dropdown);

                                // div dropdown-menu
                                let dropdown_menu_col_10 = document.createElement("div");
                                dropdown_col_10.appendChild(dropdown_menu_col_10);

                                let class_dropdown_menu = document.createAttribute("class");
                                    class_dropdown_menu.value = "dropdown-menu" ;
                                dropdown_menu_col_10.setAttributeNode(class_dropdown_menu);

                                let aria_labelledby_dropdown_menu = document.createAttribute("aria-labelledby");
                                    aria_labelledby_dropdown_menu.value = "dropdown_delete_comment_id_" + result.id ;
                                dropdown_menu_col_10.setAttributeNode(aria_labelledby_dropdown_menu);

                                // btn dropdown-item
                                let btn_dropdown_item = document.createElement("button");
                                dropdown_menu_col_10.appendChild(btn_dropdown_item);

                                let class_btn_dropdown_item = document.createAttribute("class");
                                    class_btn_dropdown_item.value = "dropdown-item" ;
                                btn_dropdown_item.setAttributeNode(class_btn_dropdown_item);

                                let data_toggle_btn_dropdown_item = document.createAttribute("data-toggle");
                                    data_toggle_btn_dropdown_item.value = "modal" ;
                                btn_dropdown_item.setAttributeNode(data_toggle_btn_dropdown_item);

                                let data_target_btn_dropdown_item = document.createAttribute("data-target");
                                    data_target_btn_dropdown_item.value = "#modal_delete_comment_id_" + result.id ;
                                btn_dropdown_item.setAttributeNode(data_target_btn_dropdown_item);

                                // i dropdown-item
                                let i_dropdown_item = document.createElement("i");
                                btn_dropdown_item.appendChild(i_dropdown_item);

                                let class_i_dropdown_item = document.createAttribute("class");
                                    class_i_dropdown_item.value = "fa-solid fa-trash-can text-danger" ;
                                i_dropdown_item.setAttributeNode(class_i_dropdown_item);

                                let onclick_i_dropdown_item = document.createAttribute("onclick");
                                    onclick_i_dropdown_item.value = "click_btn_dot_delete('" + result.id +"')" ;
                                i_dropdown_item.setAttributeNode(onclick_i_dropdown_item);

                                i_dropdown_item.innerHTML = "&nbsp;ลบความคิดเห็น" ;

                            }
                            
                            let p_col_10 = document.createElement("p");
                            div_col_10.appendChild(p_col_10);

                            let b_col_10 = document.createElement("b");
                            p_col_10.appendChild(b_col_10);

                            let class_b_col_10 = document.createAttribute("class");
                                class_b_col_10.value = "notranslate" ;
                            b_col_10.setAttributeNode(class_b_col_10);

                            let name_user = "" ;
                            if (data_profile[0]['name'] != null) {
                                name_user = data_profile[0]['name'];
                            }else{
                                name_user = "Guest";
                            }
                            
                            b_col_10.innerHTML = name_user ;

                            let br_col_10 = document.createElement("br");
                            p_col_10.appendChild(br_col_10);

                            p_col_10.innerHTML = p_col_10.innerHTML + result.content ;

                            // col-12 btn like
                            let div_col_12 = document.createElement("div");
                            let class_div_col_12 = document.createAttribute("class");
                                class_div_col_12.value = "col-12" ;
                            div_col_12.setAttributeNode(class_div_col_12);

                            let div_col_12_row = document.createElement("div");
                            div_col_12.appendChild(div_col_12_row);

                            let class_div_col_12_row = document.createAttribute("class");
                                class_div_col_12_row.value = "row" ;
                            div_col_12_row.setAttributeNode(class_div_col_12_row);

                            let div_col_6_1 = document.createElement("div");
                            div_col_12_row.appendChild(div_col_6_1);

                            let class_div_col_6_1 = document.createAttribute("class");
                                class_div_col_6_1.value = "col-6" ;
                            div_col_6_1.setAttributeNode(class_div_col_6_1);

                            let p_col_6_1 = document.createElement("p");
                            div_col_6_1.appendChild(p_col_6_1);

                            let class_div_col_6_p = document.createAttribute("class");
                                class_div_col_6_p.value = "text-secondary" ;
                            p_col_6_1.setAttributeNode(class_div_col_6_p);

                            let style_div_col_6_p = document.createAttribute("style");
                                style_div_col_6_p.value = "font-size: 14px;" ;
                            p_col_6_1.setAttributeNode(style_div_col_6_p);

                            let span_1_col_6_1 = document.createElement("span");
                            p_col_6_1.appendChild(span_1_col_6_1);

                            let id_span_1_col_6_1 = document.createAttribute("id");
                                id_span_1_col_6_1.value = "comment_id_"+ result.id;
                            span_1_col_6_1.setAttributeNode(id_span_1_col_6_1);

                            if (like_all[result.id]) {
                                let iii = like_all[result.id].includes("{{ $id }}");
                                if (iii) {
                                    let style_span_1_col_6_1 = document.createAttribute("style");
                                        style_span_1_col_6_1.value = "color: #B8205B;" ;
                                    span_1_col_6_1.setAttributeNode(style_span_1_col_6_1);

                                    let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "un_user_like_comment('"+result.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                                }else{
                                    let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "user_like_comment('"+result.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                                }
                            }else{
                                let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "user_like_comment('"+result.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                            }

                            span_1_col_6_1.innerHTML = "ถูกใจ" ;

                            p_col_6_1.innerHTML = p_col_6_1.innerHTML + "&nbsp;&nbsp; | &nbsp;&nbsp;" ;

                            let span_2_col_6_1 = document.createElement("span");
                            p_col_6_1.appendChild(span_2_col_6_1);

                            let style_span_2_col_6_1 = document.createAttribute("style");
                                style_span_2_col_6_1.value = "color: #B8205B;" ;
                            span_2_col_6_1.setAttributeNode(style_span_2_col_6_1);

                            let id_span_2_col_6_1 = document.createAttribute("id");
                                id_span_2_col_6_1.value = "count_like_comment_"+result.id ;
                            span_2_col_6_1.setAttributeNode(id_span_2_col_6_1);

                            let i_span_2_col_6_1 = document.createElement("i");
                            span_2_col_6_1.appendChild(i_span_2_col_6_1);

                            let class_i_span_2_col_6_1 = document.createAttribute("class");
                                class_i_span_2_col_6_1.value = "far fa-heart" ;
                            i_span_2_col_6_1.setAttributeNode(class_i_span_2_col_6_1);

                            span_2_col_6_1.innerHTML = span_2_col_6_1.innerHTML + "&nbsp;&nbsp;" + " " + count_like_comment[result.id]; 

                            let div_col_6_2 = document.createElement("div");
                            div_col_12_row.appendChild(div_col_6_2);

                            let class_div_col_6_2 = document.createAttribute("class");
                                class_div_col_6_2.value = "col-6" ;
                            div_col_6_2.setAttributeNode(class_div_col_6_2);

                            let p_col_6_2 = document.createElement("p");
                            div_col_6_2.appendChild(p_col_6_2);

                            let class_p_col_6_2 = document.createAttribute("class");
                                class_p_col_6_2.value = "text-secondary" ;
                            p_col_6_2.setAttributeNode(class_p_col_6_2);

                            let style_p_col_6_2 = document.createAttribute("style");
                                style_p_col_6_2.value = "font-size: 14px;float: right;" ;
                            p_col_6_2.setAttributeNode(style_p_col_6_2);

                            let past_time = date_diffForHumans(result.created_at);
                            p_col_6_2.innerHTML =  past_time ;

                            
                            // add ใน div_id_comment
                            div_id_comment.appendChild(div_col_2);
                            div_id_comment.appendChild(div_col_10);
                            div_id_comment.appendChild(div_col_12);

                            // add div id_comment to div_content_comment
                            div_content_comment.appendChild(div_id_comment);
                    });

        });

        let delayInMilliseconds = 1500;
        setTimeout(function() {
            document.querySelector('#btn_a_last_comment').click();
        }, delayInMilliseconds);

        content.value = null ;

    }

    function user_like_post(user_id , post_id){
        // console.log(user_id);
        // console.log(post_id);

        fetch("{{ url('/') }}/api/user_like_post/"+ user_id + "/" + post_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === 'ok') {
                    let span_count_like = document.querySelector('#span_count_like_' + post_id);
                        // console.log("span_count_like >>> " + span_count_like.innerText);

                    let sum = 0 ;
                    if (span_count_like.innerText === "ถูกใจเป็นคนแรก") {
                        sum = 1;
                    }else{
                        sum = parseInt(span_count_like.innerText) + 1;
                    }

                    document.querySelector('#span_count_like_' + post_id).innerText = sum.toString();

                    let btn_for_like = document.querySelector('#btn_for_like_'+post_id);

                    let style_btn = document.createAttribute("style");
                        style_btn.value = "color: #B8205B;";
                    btn_for_like.setAttributeNode(style_btn);

                    let onclick_btn = document.createAttribute("onclick")
                        onclick_btn.value = "un_user_like_post('" + user_id +"' , '" + post_id + "');";
                    btn_for_like.setAttributeNode(onclick_btn);
                }else{
                    var please_login = document.getElementById("please_login");
                        please_login.className = "show";
                        please_login.style.zIndex = "9999999";

                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);

                    setTimeout(function () {
                        please_login.style.zIndex = "-9999999";
                    }, 3000);
                }

        });
    }

    function un_user_like_post(user_id , post_id){
        // console.log(user_id);
        // console.log(post_id);

        fetch("{{ url('/') }}/api/un_user_like_post/"+ user_id + "/" + post_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === 'ok') {

                    let span_count_like = document.querySelector('#span_count_like_' + post_id);
                    // console.log(span_count_like.innerText);

                    let sum = 0 ;
                    sum = parseInt(span_count_like.innerText) - 1;
                    
                    if (sum === 0) {
                        document.querySelector('#span_count_like_' + post_id).innerText = "ถูกใจเป็นคนแรก";
                    }else{
                        document.querySelector('#span_count_like_' + post_id).innerText = sum.toString();
                    }

                    let btn_for_like = document.querySelector('#btn_for_like_'+post_id);

                    let style_btn = document.createAttribute("style");
                        style_btn.value = "color: none;";
                    btn_for_like.setAttributeNode(style_btn);

                    let onclick_btn = document.createAttribute("onclick")
                        onclick_btn.value = "user_like_post('" + user_id +"' , '" + post_id + "');";
                    btn_for_like.setAttributeNode(onclick_btn);
                }else{
                    var please_login = document.getElementById("please_login");
                        please_login.className = "show";
                        please_login.style.zIndex = "-9999999";

                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);

                    setTimeout(function () {
                        please_login.style.zIndex = "-9999999";
                    }, 3000);
                }

        });
    }

    function user_like_comment(comment_id , user_id)
    {
        // console.log(comment_id);
        // console.log(user_id);

        fetch("{{ url('/') }}/api/user_like_comment/"+ comment_id + "/" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (result === 'ok') {

                    let count_like_comment = document.querySelector('#count_like_comment_' + comment_id);
                        // console.log(count_like_comment.innerText);
                    let sum = 0 ;

                    if (count_like_comment.innerText === "0") {
                        sum = 1;
                    }else{
                        sum = parseInt(count_like_comment.innerText) + 1;
                    }

                    count_like_comment.innerHTML = "";

                    let i_span_2_col_6_1 = document.createElement("i");
                        count_like_comment.appendChild(i_span_2_col_6_1);

                    let class_i_span_2_col_6_1 = document.createAttribute("class");
                        class_i_span_2_col_6_1.value = "far fa-heart" ;
                    i_span_2_col_6_1.setAttributeNode(class_i_span_2_col_6_1);

                    count_like_comment.innerHTML = count_like_comment.innerHTML + "&nbsp;&nbsp;" + " " + sum.toString();

                    let btn_like_comment = document.querySelector('#comment_id_' + comment_id);

                    let style_btn = document.createAttribute("style");
                        style_btn.value = "color: #B8205B;";
                    btn_like_comment.setAttributeNode(style_btn);

                    let onclick_btn = document.createAttribute("onclick")
                        onclick_btn.value = "un_user_like_comment('" + comment_id +"' , '" + user_id + "');";
                    btn_like_comment.setAttributeNode(onclick_btn);
                }else{
                    var please_login = document.getElementById("please_login");
                        please_login.className = "show";
                        please_login.style.zIndex = "9999999";
                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);

                    setTimeout(function () {
                        please_login.style.zIndex = "-9999999";
                    }, 2000);
                }

        });
    }

    function un_user_like_comment(comment_id , user_id)
    {
        fetch("{{ url('/') }}/api/un_user_like_comment/"+ comment_id + "/" + user_id)
            .then(response => response.text())
            .then(result => {
                // console.log(result);

                if (result === 'ok') {

                    let count_like_comment = document.querySelector('#count_like_comment_' + comment_id);
                        // console.log(count_like_comment.innerText);
                    let sum = 0 ;

                    sum = parseInt(count_like_comment.innerText) - 1;

                    count_like_comment.innerHTML = "";

                    let i_span_2_col_6_1 = document.createElement("i");
                        count_like_comment.appendChild(i_span_2_col_6_1);

                    let class_i_span_2_col_6_1 = document.createAttribute("class");
                        class_i_span_2_col_6_1.value = "far fa-heart" ;
                    i_span_2_col_6_1.setAttributeNode(class_i_span_2_col_6_1);

                    count_like_comment.innerHTML = count_like_comment.innerHTML + "&nbsp;&nbsp;" + " " + sum.toString();

                    let btn_like_comment = document.querySelector('#comment_id_' + comment_id);

                    let style_btn = document.createAttribute("style");
                        style_btn.value = "color: none;";
                    btn_like_comment.setAttributeNode(style_btn);

                    let onclick_btn = document.createAttribute("onclick")
                        onclick_btn.value = "user_like_comment('" + comment_id +"' , '" + user_id + "');";
                    btn_like_comment.setAttributeNode(onclick_btn);
                }else{
                    var please_login = document.getElementById("please_login");
                        please_login.style.zIndex = "9999999";
                        please_login.className = "show";
                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);

                    setTimeout(function () {
                        please_login.style.zIndex = "-9999999";
                    }, 3000);
                }

        });
    }

    function copy_link(post_id) {
        /* Get the text field */
        var copyText = "https://www.peddyhub.com/post/" + post_id;

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText);

        var copy_sucess = document.getElementById("copy_sucess");
        copy_sucess.style.zIndex = "9999999";
        copy_sucess.className = "show";

        setTimeout(function () {
            copy_sucess.className = 'hide';
        }, 2000);

        setTimeout(function () {
            copy_sucess.style.zIndex = "-9999999";
        }, 3000);
    }


    function show_all_comment(post_id)
    {
        let id_user = document.querySelector('#id_user').value;
        // console.log(post_id);
        fetch("{{ url('/') }}/api/show_all_comment/"+ post_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_content_comment = document.querySelector('#content_comment_' + post_id) ;
                    div_content_comment.innerHTML = "" ;

                for (let item of result) {
                    // div ใหญ่ของ comment
                    let div_id_comment = document.createElement("div");

                    let id_div_id_comment = document.createAttribute("id");
                        id_div_id_comment.value = "div_id_comment_id_" + item.id;
                    div_id_comment.setAttributeNode(id_div_id_comment);

                    let class_div_id_comment = document.createAttribute("class");
                        class_div_id_comment.value = "row";
                    div_id_comment.setAttributeNode(class_div_id_comment);

                    // col-2 img profile
                    let div_col_2 = document.createElement("div");
                    let class_div_col_2 = document.createAttribute("class");
                        class_div_col_2.value = "col-2 text-center" ;
                    div_col_2.setAttributeNode(class_div_col_2);
                    let style_div_col_2 = document.createAttribute("style");
                        style_div_col_2.value = "padding:0px;margin-top:5px;" ;
                    div_col_2.setAttributeNode(style_div_col_2);

                    // นับ comment
                    let count_like_comment = [] ;
                    let like_all = [] ;
                    if (item.like_all != null) {
                        like_all[item.id] = item.like_all ;

                        let count_like_comment_arr = like_all[item.id].split(",");

                        count_like_comment[item.id] = count_like_comment_arr.length;
                    }else{
                        count_like_comment[item.id] = "0" ;
                    }
                    
                    // ดึงข้อมูลโปรไฟล์
                    fetch("{{ url('/') }}/api/show_data_profile/"+ item.user_id)
                        .then(response => response.json())
                        .then(data_profile => {
                            // console.log(data_profile);
                            // center ครอบ img profile
                            let center_col_2 = document.createElement("center");
                                div_col_2.appendChild(center_col_2);
                            // img profile
                            let img_col_2 = document.createElement("img");
                            let style_img_col_2 = document.createAttribute("style");
                                style_img_col_2.value = "border-radius: 50%;object-fit:cover; width:40px;height:40px;";
                            img_col_2.setAttributeNode(style_img_col_2);
                            let src_img_col_2 = document.createAttribute("src");
                                if (data_profile[0]['photo'] != null) {
                                    src_img_col_2.value = "{{ url('storage')}}/" + data_profile[0]['photo'];
                                }else{
                                    src_img_col_2.value = "peddyhub/images/home_5/icon1.png";
                                }
                            img_col_2.setAttributeNode(src_img_col_2);
                            let class_img_col_2 = document.createAttribute("class");
                                class_img_col_2.value = "img-fluid customer" ;
                            // เพิ่ม img ใน center
                            center_col_2.appendChild(img_col_2);

                            // col-10 name profile
                            let div_col_10 = document.createElement("div");
                            let class_div_col_10 = document.createAttribute("class");
                                class_div_col_10.value = "col-10" ;
                            div_col_10.setAttributeNode(class_div_col_10);
                            
                            // div dropdown delete comment
                            if ( parseInt(id_user) === item.user_id ) {

                                let dropdown_col_10 = document.createElement("div");
                                div_col_10.appendChild(dropdown_col_10);

                                let class_dropdown_col_10 = document.createAttribute("class");
                                    class_dropdown_col_10.value = "dropdown" ;
                                dropdown_col_10.setAttributeNode(class_dropdown_col_10);

                                let style_dropdown_col_10 = document.createAttribute("style");
                                    style_dropdown_col_10.value = "z-index: 9999;" ;
                                dropdown_col_10.setAttributeNode(style_dropdown_col_10);

                                let i_dropdown = document.createElement("i");
                                dropdown_col_10.appendChild(i_dropdown);

                                let style_i_dropdown = document.createAttribute("style");
                                    style_i_dropdown.value = "float:right;" ;
                                i_dropdown.setAttributeNode(style_i_dropdown);

                                let class_i_dropdown = document.createAttribute("class");
                                    class_i_dropdown.value = "fa-solid fa-ellipsis-vertical" ;
                                i_dropdown.setAttributeNode(class_i_dropdown);

                                let id_i_dropdown = document.createAttribute("id");
                                    id_i_dropdown.value = "dropdown_delete_comment_id_" + item.id ;
                                i_dropdown.setAttributeNode(id_i_dropdown);

                                let data_toggle_i_dropdown = document.createAttribute("data-toggle");
                                    data_toggle_i_dropdown.value = "dropdown" ;
                                i_dropdown.setAttributeNode(data_toggle_i_dropdown);

                                let aria_haspopup_i_dropdown = document.createAttribute("aria-haspopup");
                                    aria_haspopup_i_dropdown.value = "true" ;
                                i_dropdown.setAttributeNode(aria_haspopup_i_dropdown);

                                let aria_expanded_i_dropdown = document.createAttribute("aria-expanded");
                                    aria_expanded_i_dropdown.value = "false" ;
                                i_dropdown.setAttributeNode(aria_expanded_i_dropdown);

                                // div dropdown-menu
                                let dropdown_menu_col_10 = document.createElement("div");
                                dropdown_col_10.appendChild(dropdown_menu_col_10);

                                let class_dropdown_menu = document.createAttribute("class");
                                    class_dropdown_menu.value = "dropdown-menu" ;
                                dropdown_menu_col_10.setAttributeNode(class_dropdown_menu);

                                let aria_labelledby_dropdown_menu = document.createAttribute("aria-labelledby");
                                    aria_labelledby_dropdown_menu.value = "dropdown_delete_comment_id_" + item.id ;
                                dropdown_menu_col_10.setAttributeNode(aria_labelledby_dropdown_menu);

                                // btn dropdown-item
                                let btn_dropdown_item = document.createElement("button");
                                dropdown_menu_col_10.appendChild(btn_dropdown_item);

                                let class_btn_dropdown_item = document.createAttribute("class");
                                    class_btn_dropdown_item.value = "dropdown-item" ;
                                btn_dropdown_item.setAttributeNode(class_btn_dropdown_item);

                                let data_toggle_btn_dropdown_item = document.createAttribute("data-toggle");
                                    data_toggle_btn_dropdown_item.value = "modal" ;
                                btn_dropdown_item.setAttributeNode(data_toggle_btn_dropdown_item);

                                let data_target_btn_dropdown_item = document.createAttribute("data-target");
                                    data_target_btn_dropdown_item.value = "#modal_delete_comment_id_" + item.id ;
                                btn_dropdown_item.setAttributeNode(data_target_btn_dropdown_item);

                                // i dropdown-item
                                let i_dropdown_item = document.createElement("i");
                                btn_dropdown_item.appendChild(i_dropdown_item);

                                let class_i_dropdown_item = document.createAttribute("class");
                                    class_i_dropdown_item.value = "fa-solid fa-trash-can text-danger" ;
                                i_dropdown_item.setAttributeNode(class_i_dropdown_item);

                                let onclick_i_dropdown_item = document.createAttribute("onclick");
                                    onclick_i_dropdown_item.value = "click_btn_dot_delete('" + item.id +"')" ;
                                i_dropdown_item.setAttributeNode(onclick_i_dropdown_item);

                                i_dropdown_item.innerHTML = "&nbsp;ลบความคิดเห็น" ;

                            }
                            
                            let p_col_10 = document.createElement("p");
                            div_col_10.appendChild(p_col_10);

                            let b_col_10 = document.createElement("b");
                            p_col_10.appendChild(b_col_10);

                            let class_b_col_10 = document.createAttribute("class");
                                class_b_col_10.value = "notranslate" ;
                            b_col_10.setAttributeNode(class_b_col_10);

                            let name_user = "" ;
                            if (data_profile[0]['name'] != null) {
                                name_user = data_profile[0]['name'];
                            }else{
                                name_user = "Guest";
                            }
                            
                            b_col_10.innerHTML = name_user ;

                            let br_col_10 = document.createElement("br");
                            p_col_10.appendChild(br_col_10);

                            p_col_10.innerHTML = p_col_10.innerHTML + item.content ;

                            // col-12 btn like
                            let div_col_12 = document.createElement("div");
                            let class_div_col_12 = document.createAttribute("class");
                                class_div_col_12.value = "col-12" ;
                            div_col_12.setAttributeNode(class_div_col_12);

                            let div_col_12_row = document.createElement("div");
                            div_col_12.appendChild(div_col_12_row);

                            let class_div_col_12_row = document.createAttribute("class");
                                class_div_col_12_row.value = "row" ;
                            div_col_12_row.setAttributeNode(class_div_col_12_row);

                            let div_col_6_1 = document.createElement("div");
                            div_col_12_row.appendChild(div_col_6_1);

                            let class_div_col_6_1 = document.createAttribute("class");
                                class_div_col_6_1.value = "col-6" ;
                            div_col_6_1.setAttributeNode(class_div_col_6_1);

                            let p_col_6_1 = document.createElement("p");
                            div_col_6_1.appendChild(p_col_6_1);

                            let class_div_col_6_p = document.createAttribute("class");
                                class_div_col_6_p.value = "text-secondary" ;
                            p_col_6_1.setAttributeNode(class_div_col_6_p);

                            let style_div_col_6_p = document.createAttribute("style");
                                style_div_col_6_p.value = "font-size: 14px;" ;
                            p_col_6_1.setAttributeNode(style_div_col_6_p);

                            let span_1_col_6_1 = document.createElement("span");
                            p_col_6_1.appendChild(span_1_col_6_1);

                            let id_span_1_col_6_1 = document.createAttribute("id");
                                id_span_1_col_6_1.value = "comment_id_"+ item.id;
                            span_1_col_6_1.setAttributeNode(id_span_1_col_6_1);

                            if (like_all[item.id]) {
                                let iii = like_all[item.id].includes("{{ $id }}");
                                if (iii) {
                                    let style_span_1_col_6_1 = document.createAttribute("style");
                                        style_span_1_col_6_1.value = "color: #B8205B;" ;
                                    span_1_col_6_1.setAttributeNode(style_span_1_col_6_1);

                                    let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "un_user_like_comment('"+item.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                                }else{
                                    let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "user_like_comment('"+item.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                                }
                            }else{
                                let onclick_span_1_col_6_1 = document.createAttribute("onclick");
                                        onclick_span_1_col_6_1.value = "user_like_comment('"+item.id+"'" + ",'{{ $id }}');" ;
                                    span_1_col_6_1.setAttributeNode(onclick_span_1_col_6_1);
                            }

                            span_1_col_6_1.innerHTML = "ถูกใจ" ;

                            p_col_6_1.innerHTML = p_col_6_1.innerHTML + "&nbsp;&nbsp; | &nbsp;&nbsp;" ;

                            let span_2_col_6_1 = document.createElement("span");
                            p_col_6_1.appendChild(span_2_col_6_1);

                            let style_span_2_col_6_1 = document.createAttribute("style");
                                style_span_2_col_6_1.value = "color: #B8205B;" ;
                            span_2_col_6_1.setAttributeNode(style_span_2_col_6_1);

                            let id_span_2_col_6_1 = document.createAttribute("id");
                                id_span_2_col_6_1.value = "count_like_comment_"+item.id ;
                            span_2_col_6_1.setAttributeNode(id_span_2_col_6_1);

                            let i_span_2_col_6_1 = document.createElement("i");
                            span_2_col_6_1.appendChild(i_span_2_col_6_1);

                            let class_i_span_2_col_6_1 = document.createAttribute("class");
                                class_i_span_2_col_6_1.value = "far fa-heart" ;
                            i_span_2_col_6_1.setAttributeNode(class_i_span_2_col_6_1);

                            span_2_col_6_1.innerHTML = span_2_col_6_1.innerHTML + "&nbsp;&nbsp;" + " " + count_like_comment[item.id]; 

                            let div_col_6_2 = document.createElement("div");
                            div_col_12_row.appendChild(div_col_6_2);

                            let class_div_col_6_2 = document.createAttribute("class");
                                class_div_col_6_2.value = "col-6" ;
                            div_col_6_2.setAttributeNode(class_div_col_6_2);

                            let p_col_6_2 = document.createElement("p");
                            div_col_6_2.appendChild(p_col_6_2);

                            let class_p_col_6_2 = document.createAttribute("class");
                                class_p_col_6_2.value = "text-secondary" ;
                            p_col_6_2.setAttributeNode(class_p_col_6_2);

                            let style_p_col_6_2 = document.createAttribute("style");
                                style_p_col_6_2.value = "font-size: 14px;float: right;" ;
                            p_col_6_2.setAttributeNode(style_p_col_6_2);

                            let past_time = date_diffForHumans(item.created_at);
                            p_col_6_2.innerHTML =  past_time ;

                            
                            // add ใน div_id_comment
                            div_id_comment.appendChild(div_col_2);
                            div_id_comment.appendChild(div_col_10);
                            div_id_comment.appendChild(div_col_12);

                            // add div id_comment to div_content_comment
                            div_content_comment.appendChild(div_id_comment);
                    });
                    
                    
                }

        });
    }

    function date_diffForHumans(date){

        let new_date = new Date(date);

        let date_sp_1 = date.split("T");
        let date_sp_2 = date_sp_1[0].split("-");

        let date_else = date_sp_2[2] + "-" + date_sp_2[1] + "-" + date_sp_2[0] ;
        // Make a fuzzy time
        var delta = Math.round((+new Date - new_date) / 1000);

        var minute = 60,
            hour = minute * 60,
            day = hour * 24,
            week = day * 7;

        var fuzzy;

        if (delta < 30) {
            fuzzy = 'ขณะนี้';
        } else if (delta < minute) {
            fuzzy = delta + ' วินาทีที่แล้ว';
        } else if (delta < 2 * minute) {
            fuzzy = 'นาทีที่แล้ว'
        } else if (delta < hour) {
            fuzzy = Math.floor(delta / minute) + ' นาทีที่แล้ว';
        } else if (Math.floor(delta / hour) == 1) {
            fuzzy = '1 ชั่วโมงที่แล้ว'
        } else if (delta < day) {
            fuzzy = Math.floor(delta / hour) + ' ชั่วโมงที่แล้ว';
        } else if (delta < day * 2) {
            fuzzy = 'เมื่อวาน';
        } else{
            fuzzy = date_else;
        }

        return fuzzy ;
    }

</script>