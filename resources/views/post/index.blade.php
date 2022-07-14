@extends('layouts.peddyhub')

@section('content')

<style>
   .likebtn{
        background-color: transparent;
        color:#53565B;
        font-family: 'Sarabun', sans-serif;
        font-size:14px;
    }

    .show {
        -o-transition: opacity 1s;
        -moz-transition: opacity 1s;
        -webkit-transition: opacity 1s;
        transition: opacity 1s;
        opacity:1;
    }

    .hide {
        display: none;
        opacity:0;
        -o-transition: opacity 1s;
        -moz-transition: opacity 1s;
        -webkit-transition: opacity 1s;
        transition: opacity 1s;
    }

    .likebtn:hover {
        background-color: #F2F2F2; color:black ;
    }
    
    .modal-bottom {
        position:fixed;
        width: 100%;
        top:auto;
        bottom:0;
        z-index:999999;
    }

/* .likebtn:active {
  background-color: #3e8e41 !important;;
  box-shadow: 0 5px #666 !important;;
  transform: translateY(4px) !important;;
} */
</style>
<div id="copy_sucess" style="position: fixed;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999; 
  background-color: #242424;padding:15px; 
  border-radius:10px;color:white;
  font-family: 'Kanit', sans-serif;" 

  class="alert alert-primary hide" role="alert">
    <center>คัดลอกลิงก์แล้ว</center>
</div>
<div id="please_login" style="position: fixed;
  top: 80%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 999; 
  background-color: #242424;padding:15px; 
  border-radius:10px;color:white;
  font-family: 'Kanit', sans-serif;" 

  class="alert alert-primary hide" role="alert">
    <center>เข้าสู่ระบบเพื่อใช้งาน</center>
</div>

<div class="main-wrapper pet blog">
    <div class="button wow fadeInUp justify-content-end" style="margin-bottom:-50px">  
        <div class="container">
            <div class="row col-12">
                @include ('menubar.menu')
            </div>
            <div class="row col-12" style="padding:0px;">
                <div class="col-12 col-md-9  ">
                    @include ('menubar.menu_btn')
                </div>
            </div>
            <br>
            <!-- modal post -->
            @include ('post.modal_create_post')
        </div>
    </div>
    <div class="pet event">
        <div class="pet job">
            <section class="job">
                <div class="container">
                    <div class="row mt-5">
                        <!-- content post -->
                        @include ('post.content_post')
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        add_color();
    });

    function add_color(){
        // console.log("add_color");
        document.querySelector('#btn_a_all').classList.add('btn-style-two');
        document.querySelector('#btn_a_all').classList.remove('btn-outline-two');
        document.querySelector('#btn_a_all_pc').classList.add('btn-style-two');
        document.querySelector('#btn_a_all_pc').classList.remove('btn-outline-two');
        
    }

    function i_xmark_photo()
    {
        document.querySelector('#show_photo_pot').classList.add('d-none');
        document.querySelector('#photo').value = null ;
        document.querySelector('#i_xmark').classList.add('d-none');
    }

    function edit_post(post_id)
    {
        console.log(post_id);

        document.querySelector('#btn_modal_pot').click();
        document.querySelector('#btn_submit_post_create').classList.add('d-none');
        document.querySelector('#btn_submit_post_edit').classList.remove('d-none');

        fetch("{{ url('/') }}/api/edit_post/"+ post_id)
            .then(response => response.json())
            .then(result => {
                console.log(result);

                for(let item of result){
                    console.log(item.id)
                    document.querySelector('#exampleModalScrollableTitle_new_post').innerHTML = "แก้ไขโพสต์" ;
                }

        });

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

        fetch("{{ url('/') }}/api/submit_input_content_comment/"+ user_id.value + "/" + post_id + "/" + content.value)
            .then(response => response.text())
            .then(result => {
                // console.log(result);
                if (result === 'ok') {
                    content.value = null ;
                    let div_content_comment = document.querySelector('#content_comment_' + post_id) ;
                        div_content_comment.innerHTML = "" ;
                    show_all_comment(post_id);

                    var delayInMilliseconds = 1500;
                    setTimeout(function() {
                        document.querySelector('#btn_a_last_modal').click();
                    }, delayInMilliseconds);
                }

        });

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
                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);
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
                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);
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
                    setTimeout(function () {
                        please_login.className = 'hide';
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
                        please_login.className = "show";
                    setTimeout(function () {
                        please_login.className = 'hide';
                    }, 2000);
                }

        });
    }

    function copy_link(post_id) {
        /* Get the text field */
        var copyText = "https://www.peddyhub.com/post/" + post_id;

        /* Copy the text inside the text field */
        navigator.clipboard.writeText(copyText);

        var copy_sucess = document.getElementById("copy_sucess");
        copy_sucess.className = "show";
        setTimeout(function () {
            copy_sucess.className = 'hide';
        }, 2000);
    }

    function show_all_comment(post_id)
    {
        // console.log(post_id);
        fetch("{{ url('/') }}/api/show_all_comment/"+ post_id)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_content_comment = document.querySelector('#content_comment_' + post_id) ;
                    div_content_comment.innerHTML = "" ;
                for (let item of result) {

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

                            // add ใน div_content_comment
                            div_content_comment.appendChild(div_col_2);
                            div_content_comment.appendChild(div_col_10);
                            div_content_comment.appendChild(div_col_12);
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