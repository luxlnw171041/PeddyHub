@if(Auth::user()->role == "admin-partner" )
    @extends('layouts.partner.theme_partner')

    @section('content')
    <div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-flex align-items-center">
                <div class="row col-12">
                    <div class="col-12">
                        <div class="row col-12">
                            <div class="col-9">
                                <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                                    ค้นหา
                                </h3>
                            </div>
                            <div class="col-3">
                                <a style="float: right;margin-top: 15px;" type="button" data-toggle="modal" data-target="#covid">
                                    <button class="btn btn-warning btn-sm">
                                        <i class="fas fa-head-side-virus"></i> แจ้งติดโควิด!
                                    </button>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="row col-12">
                            <center>
                                <form style="float: left;" method="GET" action="{{ url('/check_in_admin') }}" accept-charset="UTF-8" class="col-12 form-inline float-right" role="search">
                                    <div class="row col-12">
                                        <div class="col-md-2">
                                            <label  class="control-label">{{ 'วันที่' }}</label>
                                            <input class="form-control" type="date" name="select_date" id="select_date" value="{{ request('select_date') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label  class="control-label">{{ 'เวลา' }}</label>
                                            <input class="form-control" type="time" name="select_time_1" id="select_time_1" value="{{ request('select_time_1') }}" onchange="document.querySelector('#select_time_2').required = true,document.querySelector('#select_date').required = true;">
                                        </div>
                                        <div class="col-1">
                                            <center>
                                                <br>
                                                <label style="margin-top:7px;" class="control-label">{{ 'ถึง' }}</label>
                                            </center>
                                        </div>
                                        <div class="col-md-2">
                                            <label  class="control-label">{{ 'เวลา' }}</label>
                                            <input class="form-control" type="time" name="select_time_2" id="select_time_2" value="{{ request('select_time_2') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label  class="control-label">{{ 'ชื่อ' }}</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="select_name" id="select_name" placeholder="ค้นหาชื่อ..." value="{{ request('select_name') }}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <br>
                                            <span class="input-group-append">
                                                <button class="btn btn-info text-white" type="submit">
                                                    <i class="fa fa-search"></i>ค้นหา
                                                </button>
                                            </span>
                                            <a class="btn btn-danger "href="{{ url('/check_in_admin') }}" >
                                                ล้างการค้นหา
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>

    <br>
    <div class="card radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
        <div class="card-body">
            <div class="table-responsive">
                <div class="row col-12">
                    <div class="col-9">
                        <h3 style="margin-top: 8px;" class="font-weight-bold mb-0">
                            รายชื่อ Check in / out
                        </h3>
                    </div>
                    <div class="col-3">
                        <a style="float: right;" type="button" data-toggle="modal" data-target="#how_to_use_covid">
                            <button class="btn btn-primary btn-sm">
                                 <i class="fas fa-info-circle"></i>วิธีใช้
                            </button>
                        </a>
                    </div>
                </div>
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr class="text-center">
                            <th>ชื่อ</th>
                            <th>เวลาเข้า - ออก</th>
                            <th>เบอร์</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($check_in as $item)
                            <tr>
                                <td>
                                    @if(!empty($item->profile->real_name))
                                        {{ $item->profile->real_name }}
                                    @else
                                        {{ $item->profile->name }}
                                    @endif
                                </td>

                                <td>
                                    @if(!empty($item->time_in))
                                        <b class="text-success">เข้า : {{ date("d/m/Y H:i" , strtotime($item->time_in)) }}</b>
                                    @endif


                                    @if(!empty($item->time_out))
                                        <b class="text-danger">ออก : {{ date("d/m/Y H:i" , strtotime($item->time_out)) }}</b>
                                    @endif

                                </td>

                                <td>
                                    @if(!empty($item->profile->phone))
                                        <b>{{ $item->profile->phone}}</b>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination round-pagination " style="margin-top:10px;"> {!! $check_in->appends(['search' => Request::get('search')])->render() !!} </div>
            </div>
    </div>

    <!--------------------------- modal how to use covid --------------------------->
    <div class="modal fade" id="how_to_use_covid" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">การใช้งานระบบจัดการ Check In/Out</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/1.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center><br>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;" >
                    <div class="row col-12 card-body" style="padding: 15px 0px 15px 0px ;">
                        <div class="col-10" style="margin-bottom:0px" data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login">
                            <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">&nbsp;1.ค้นหา</h5>
                        </div> 
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;"  data-toggle="collapse" data-target="#login" aria-expanded="false" aria-controls="login" >
                            <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="col-12 collapse" id="login">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/2.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.เลือกวัน : เลือกวันที่ต้องการค้นหารายการบุคคลเข้าออก
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  2.เลือกช่วงเวลา : สามารถระบุช่วงเวลาที่บุคคลเข้าออกได้ โดยระบุในช่องค้นหา เพื่อเลือกเวลาที่ที่ต้องการค้นหา</h5> 
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  3.ชื่อ : ค้นหารายการจากชื่อผู้ใช้ตามคำที่กำหนด</h5> 
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  4.ค้นหา : เมื่อกรอกข้อมูลครบถ้วนแล้วให้คลิกที่ปุ่มค้นหาเพื่อทำการค้นหาข้อมูล</h5>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif;">  5.ล้างการค้นหา : หากต้องการยกเลิกการค้นหาให้คลิกที่ปุ่มล้างการค้นหา เพื่อยกเลิกการค้นหา</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
                    <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                        <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login">
                                <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">2.รายชื่อ Check In/Out</h5>
                        </div> 
                        <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#Social_login" aria-expanded="false" aria-controls="Social_login" >
                            <i class="fas fa-angle-down" ></i>
                            </div>
                        <div class="col-12 collapse" id="Social_login">
                            <br>
                            <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/3.png') }}" style="border: 2px solid #555;" width="100%" alt="Card image cap"></center>
                            <br>
                            <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ชื่อ :  แสดงชื่อผู้ใช้</h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.เวลาเข้าออก : แสดงวันที่และเวลาที่เข้าออก </h5>
                            <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 3.เบอร์ : แสดงเบอร์ผู้ใช้บริการ</h5>
                        </div>
                    </div>
                </div>
                <div class="card col-12" style="font-family: 'Prompt', sans-serif; margin-bottom: 10px;">
              <div class="row col-12 card-body" style="padding:15px 0px 15px 0px ;" >
                  <div class="col-10" style="margin-bottom:0px"data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail">
                          <h5 style="margin-bottom:0px;font-family: 'Prompt', sans-serif;">3.แจ้งติดโควิด</h5>
                  </div> 
                  <div class="col-2 align-self-center text-center" style="vertical-align: middle;" data-toggle="collapse" data-target="#sos_detail" aria-expanded="false" aria-controls="sos_detail" >
                      <i class="fas fa-angle-down" ></i>
                      </div>
                  <div class="col-12 collapse" id="sos_detail">
                    <br>
                    <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/4.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center>
                    <br>
                    <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.ค้นหาผู้ใช้ติดโควิด :  พิมพ์ชื่อผู้ใช้พื่อค้นหา</h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:20px;"> 2.ติดโควิด : เมื่อเจอผู้ใช้ที่ติดโควิดแล้วให้กดปุ่มติดโควิด </h5>
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.1 รายชื่อกลุ่มเสี่ยง : ระบบจะแสดงรายชื่อกลุ่มเสี่ยงทั้งหมดขึ้นมา</h5> 
                    <h5 style="font-family: 'Prompt', sans-serif;text-indent:40px;"> 2.2 แจ้งเตือนกลุ่มเสี่ยง : ให้ทำการกดปุ่ม ส่งข้อความเตือน เพื่อแจ้งไปยังกลุ่มเสี่ยงทั้งหมด</h5> 

                    <center><img src="{{ asset('/peddyhub/images/how_to_use/checkin/5.png') }}" style="border: 2px solid #555;" width="80%" alt="Card image cap"></center>

                  </div>
              </div>
          </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    <!--------------------------- end modal how to use covid --------------------------->

    <!-- Modal -->
    <div class="modal fade" id="covid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">แจ้งเตือนกลุ่มเสี่ยง</h5>
                        </div>
                        <div class="modal-body">
                            <div class=" radius-10 d-none d-lg-block" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                                    <div class="d-flex align-items-center" >
                                        <div class="row col-12" style="background:none;">
                                            <input type="text" name="text_array"  id="text_array" class="form-control d-none">
                                            <div class="col-9">
                                                <h5>ค้นหาชื่อ</h5>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="ค้นหาจากชื่อ..." oninput="search_name('{{ $check_in_at }}');">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <br>
                            <div class="row col-12">
                                <div id="div_content_search_name">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button id="close_madal_main" type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <!-- <button type="button" class="btn btn-primary">ยืนยัน</button> -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal send_finish -->
            <!-- Button trigger modal -->
            <button id="btn_modal_send_finish" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#madal_send_finish">
            </button>
            <!-- Modal -->
            <div class="modal fade" id="madal_send_finish" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <div class="wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                            <h3 style="color: #7ac142;">แจ้งเตือนกลุ่มเสี่ยงเรียบร้อยแล้ว</h3>
                        </div>
                    </div>
                    <div class="modal-footer d-none">
                        <button id="close_madal_send_finish" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
    </div>
        <!-- <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Check_in</div>
                        <div class="card-body">
                            <a href="{{ url('/check_in/create') }}" class="btn btn-success btn-sm" title="Add New Check_in">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>

                            <form method="GET" action="{{ url('/check_in') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                            <th>#</th><th>User Id</th><th>Time In</th><th>Time Out</th><th>Check In At</th><th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($check_in as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user_id }}</td><td>{{ $item->time_in }}</td><td>{{ $item->time_out }}</td><td>{{ $item->check_in_at }}</td>
                                            <td>
                                                <a href="{{ url('/check_in/' . $item->id) }}" title="View Check_in"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                                <a href="{{ url('/check_in/' . $item->id . '/edit') }}" title="Edit Check_in"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                                <form method="POST" action="{{ url('/check_in' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Check_in" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> {!! $check_in->appends(['search' => Request::get('search')])->render() !!} </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<script>
    function search_name(check_in_at){

        let name = document.querySelector('#name');

        fetch("{{ url('/') }}/api/search_name/"+ name.value + "/" + check_in_at)
            .then(response => response.json())
            .then(result => {
                // console.log(result);

                let div_content_search_name = document.querySelector('#div_content_search_name');
                    div_content_search_name.textContent = "" ;

                    let div_header = document.createElement("div");
                    let class_div_header = document.createAttribute("class");
                        class_div_header.value = "row col-12";
                        div_header.setAttributeNode(class_div_header); 

                        // titel name
                        let div_header_name = document.createElement("div");
                        let class_div_header_name = document.createAttribute("class");
                            class_div_header_name.value = "col-4 text-center";
                            div_header_name.setAttributeNode(class_div_header_name);
                            let para_name = document.createElement("P");
                                para_name.innerHTML = "ชื่อ";
                                div_header_name.appendChild(para_name);
                        div_header.appendChild(div_header_name);

                        // titel phone
                        let div_header_phone = document.createElement("div");
                        let class_div_header_phone = document.createAttribute("class");
                            class_div_header_phone.value = "col-4 text-center";
                            div_header_phone.setAttributeNode(class_div_header_phone);
                            let para_phone = document.createElement("P");
                                para_phone.innerHTML = "เบอร์โทร";
                                div_header_phone.appendChild(para_phone);
                        div_header.appendChild(div_header_phone);

                        // titel btn
                        let div_header_btn = document.createElement("div");
                        let class_div_header_btn = document.createAttribute("class");
                            class_div_header_btn.value = "col-4 text-center";
                            div_header_btn.setAttributeNode(class_div_header_btn);
                        div_header.appendChild(div_header_btn);

                    let hr = document.createElement("hr");
                        div_header.appendChild(hr);

                    div_content_search_name.appendChild(div_header);

                    // div_data
                    let div_data = document.createElement("div");
                    let class_div_data = document.createAttribute("class");
                        class_div_data.value = "row col-12";
                        div_data.setAttributeNode(class_div_data);

                for(let item of result){

                    // data name
                        let div_data_name = document.createElement("div");
                        let class_div_data_name = document.createAttribute("class");
                            class_div_data_name.value = "col-4";
                            div_data_name.setAttributeNode(class_div_data_name);
                            let para_data_name = document.createElement("P");
                            let style_para_name = document.createAttribute("style");
                                style_para_name.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                para_data_name.setAttributeNode(style_para_name); 

                                if (item.real_name) {
                                    para_data_name.innerHTML = item.real_name
                                }else{
                                    para_data_name.innerHTML = item.name
                                }

                                div_data_name.appendChild(para_data_name);
                                div_data.appendChild(div_data_name);

                    // data phone
                        let div_data_phone = document.createElement("div");
                        let class_div_data_phone = document.createAttribute("class");
                            class_div_data_phone.value = "col-4 text-center";
                            div_data_phone.setAttributeNode(class_div_data_phone);
                            let para_data_phone = document.createElement("P");
                            let style_para_phone = document.createAttribute("style");
                                style_para_phone.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                                para_data_phone.setAttributeNode(style_para_phone); 
                                para_data_phone.innerHTML = item.phone

                                div_data_phone.appendChild(para_data_phone);
                                div_data.appendChild(div_data_phone);

                    // data btn
                        let div_data_btn = document.createElement("div");
                        let class_div_data_btn = document.createAttribute("class");
                            class_div_data_btn.value = "col-4 text-center";
                            div_data_btn.setAttributeNode(class_div_data_btn);

                            let btn_data = document.createElement("button");
                            btn_data.innerHTML = '<i class="fas fa-viruses"></i> ติดโควิด !'
                            let class_btn_data = document.createAttribute("class");
                                class_btn_data.value = "btn btn-danger";
                                btn_data.setAttributeNode(class_btn_data); 
                            let style_btn_data = document.createAttribute("style");
                                style_btn_data.value = "margin-top: 20px;";
                                btn_data.setAttributeNode(style_btn_data);

                            let btn_data_onclick = document.createAttribute("onclick");
                                btn_data_onclick.value = "show_group_risk("+ item.id +",'" + check_in_at + "');";
                                btn_data.setAttributeNode(btn_data_onclick);  
                                
                                div_data_btn.appendChild(btn_data);
                                div_data.appendChild(div_data_btn);

                    let div_data_hr = document.createElement("hr");
                        div_data.appendChild(div_data_hr);



                    div_content_search_name.appendChild(div_data);

                }

        });
    }

    function show_group_risk(id , check_in_at){
        let div_content_search_name = document.querySelector('#div_content_search_name');
            div_content_search_name.textContent = "" ;

        fetch("{{ url('/') }}/api/show_group_risk/" + id + "/" + check_in_at)
            .then(response => response.json())
            .then(result => {
            // console.log(result);

            let text_array = document.querySelector('#text_array');
                text_array.value = JSON.stringify(result);

            let div_btn_send = document.createElement("div");

            let class_div_btn_send = document.createAttribute("class");
                    class_div_btn_send.value = "row col-12";
                    div_btn_send.setAttributeNode(class_div_btn_send);

            // data col-9
                let div_btn_col_9 = document.createElement("div");
                let class_div_btn_col_9 = document.createAttribute("class");
                    class_div_btn_col_9.value = "col-9 text-center";
                    div_btn_col_9.setAttributeNode(class_div_btn_col_9);

                    div_btn_send.appendChild(div_btn_col_9);

            // data col-3 btn
                let div_btn_col_3 = document.createElement("div");
                let class_div_btn_col_3 = document.createAttribute("class");
                    class_div_btn_col_3.value = "col-3 text-center";
                    div_btn_col_3.setAttributeNode(class_div_btn_col_3);

                    let btn_send = document.createElement("button");
                        btn_send.innerHTML = '<i class="fas fa-share-square"></i> ส่งข้อความเตือน !'
                    let class_btn_send = document.createAttribute("class");
                        class_btn_send.value = "btn btn-info text-white";
                        btn_send.setAttributeNode(class_btn_send); 
                    let style_btn_send = document.createAttribute("style");
                        style_btn_send.value = "margin-top: 15px;";
                        btn_send.setAttributeNode(style_btn_send);

                    let btn_send_onclick = document.createAttribute("onclick");
                        btn_send_onclick.value = "send_risk_group();";
                        btn_send.setAttributeNode(btn_send_onclick);  
                        
                        div_btn_col_3.appendChild(btn_send);
                        div_btn_send.appendChild(div_btn_col_3);

                div_content_search_name.appendChild(div_btn_send);

            // ----------------------------------------

                let div_header = document.createElement("div");
                let class_div_header = document.createAttribute("class");
                    class_div_header.value = "row col-12";
                    div_header.setAttributeNode(class_div_header); 

                    // titel name
                    let div_header_name = document.createElement("div");
                    let class_div_header_name = document.createAttribute("class");
                        class_div_header_name.value = "col-4 text-center";
                        div_header_name.setAttributeNode(class_div_header_name);
                        let para_name = document.createElement("P");
                            para_name.innerHTML = "ชื่อ";
                            div_header_name.appendChild(para_name);
                    div_header.appendChild(div_header_name);

                    // titel phone
                    let div_header_phone = document.createElement("div");
                    let class_div_header_phone = document.createAttribute("class");
                        class_div_header_phone.value = "col-4 text-center";
                        div_header_phone.setAttributeNode(class_div_header_phone);
                        let para_phone = document.createElement("P");
                            para_phone.innerHTML = "เบอร์โทร";
                            div_header_phone.appendChild(para_phone);
                    div_header.appendChild(div_header_phone);

                    // titel btn
                    let div_header_btn = document.createElement("div");
                    let class_div_header_btn = document.createAttribute("class");
                        class_div_header_btn.value = "col-4 text-center";
                        div_header_btn.setAttributeNode(class_div_header_btn);
                    div_header.appendChild(div_header_btn);

                let hr = document.createElement("hr");
                    div_header.appendChild(hr);

                div_content_search_name.appendChild(div_header);

                // div_data
                let show_div_data = document.createElement("div");
                let class_div_data = document.createAttribute("class");
                    class_div_data.value = "row col-12";
                    show_div_data.setAttributeNode(class_div_data);

            for(let item of result){
                // data name
                    let show_div_data_name = document.createElement("div");
                    let show_class_div_data_name = document.createAttribute("class");
                        show_class_div_data_name.value = "col-4";
                        show_div_data_name.setAttributeNode(show_class_div_data_name);
                        let show_para_data_name = document.createElement("P");
                        let show_style_para_name = document.createAttribute("style");
                            show_style_para_name.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                            show_para_data_name.setAttributeNode(show_style_para_name); 
                            show_para_data_name.innerHTML = item.real_name

                            show_div_data_name.appendChild(show_para_data_name);
                            show_div_data.appendChild(show_div_data_name);

                // data phone
                    let show_div_data_phone = document.createElement("div");
                    let show_class_div_data_phone = document.createAttribute("class");
                        show_class_div_data_phone.value = "col-4 text-center";
                        show_div_data_phone.setAttributeNode(show_class_div_data_phone);
                        let show_para_data_phone = document.createElement("P");
                        let show_style_para_phone = document.createAttribute("style");
                            show_style_para_phone.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;";
                            show_para_data_phone.setAttributeNode(show_style_para_phone); 
                            show_para_data_phone.innerHTML = item.phone

                            show_div_data_phone.appendChild(show_para_data_phone);
                            show_div_data.appendChild(show_div_data_phone);

                // data text
                    let show_div_data_text = document.createElement("div");
                    let show_class_div_data_text = document.createAttribute("class");
                        show_class_div_data_text.value = "col-4 text-center";
                        show_div_data_text.setAttributeNode(show_class_div_data_text);
                        let show_para_data_text = document.createElement("P");
                        let show_style_para_text = document.createAttribute("style");
                            show_style_para_text.value = "position: relative;margin-top: 20px; z-index: 5; font-size:18px;color:red;";
                            show_para_data_text.setAttributeNode(show_style_para_text); 
                            show_para_data_text.innerHTML = "กลุ่มเสี่ยง"

                            show_div_data_text.appendChild(show_para_data_text);
                            show_div_data.appendChild(show_div_data_text);

                let show_hr = document.createElement("hr");
                    show_div_data.appendChild(show_hr);

                div_content_search_name.appendChild(show_div_data);

            }

        });
    }

    function send_risk_group(){
        let text_array = document.querySelector('#text_array');

        // console.log(text_array.value);

        fetch("{{ url('/') }}/api/send_risk_group", {
            method: 'post',
            body: text_array.value,
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            document.querySelector('#close_madal_main').click();
            let div_content_search_std = document.querySelector('#div_content_search_std');
                div_content_search_std.textContent = "" ;

            document.querySelector('#btn_modal_send_finish').click();
            
                var delayInMilliseconds = 3000; 
                    setTimeout(function() {
                      document.querySelector('#close_madal_send_finish').click();
                    }, delayInMilliseconds);

        }).catch(function(error){
            // console.error(error);
        });
    }

</script>


    @endsection
@endif
