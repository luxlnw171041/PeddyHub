@extends('layouts.partner.theme_partner')

@section('content')
<style>
    .lightbox {
        /* Default to hidden */
        display: none;

        /* Overlay entire screen */
        position: fixed;
        z-index: 999;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;

        /* A bit of padding around image */
        padding: 1em;

        /* Translucent background */
        background: rgba(0, 0, 0, 0.8);
    }

    /* Unhide the lightbox when it's the target */
    .lightbox:target {
        display: block;
    }

    .lightbox span {
        /* Full width and height */
        display: block;
        width: 100%;
        height: 100%;

        /* Size and position background image */
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>
<div class="col-12">
    <a style="float: right;" type="button" data-toggle="modal" data-target="#gallery">
        <button class="btn btn-primary btn-sm">
            <i class="fas fa-info-circle"></i>วิธีใช้
        </button>
    </a>
    <br>
    <br>
</div>
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 ">
    
    @foreach($all_areas as $all_area)
    @php
        $img_name_area = str_replace(" ","_" ,$all_area->name_area) ;

        if(empty($all_area->name_area)){
            $text_name_area = 'รวม' ;
        }else{
            $text_name_area = $all_area->name_area ;
        }
    @endphp
    <div class="col">
        <div class="card radius-10">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-8">
                                @if(!empty($all_area->name_area))
                                    <h5 class="mb-1">พื้นที่ : <b class="text-info">{{ $all_area->name_area }}</b></h5>
                                @else
                                    <h5 class="mb-1">พื้นที่ : <b class="text-info">รวม</b></h5>
                                @endif
                            </div>
                            <div class="col-4">
                                <span class="btn btn-sm btn-primary main-shadow main-radius" style="float: right;width: 100%;" data-toggle="collapse" href="#coll_gen_qr_{{ $all_area->id }}" role="button" aria-expanded="false" aria-controls="coll_gen_qr_{{ $all_area->id }}">
                                    สร้าง QR-Code
                                </span>
                            </div>
                            <div class="col-12">
                                <br>
                                <div class="collapse" id="coll_gen_qr_{{ $all_area->id }}">
                                    <div class="row">
                                        <div class="col-4">
                                            <!--  -->
                                        </div>
                                        <div class="col-6">
                                            <div class="">
                                                <input type="text" class="form-control" id="color_theme_{{ $all_area->id }}" name="color_theme_{{ $all_area->id }}" value="" placeholder="กรอกโค้ดสี เช่น #B8205B" style="float: right;">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <span class="btn btn-sm btn-success main-shadow main-radius" style="float: right;width: 100%;margin-top: 5px;" onclick="gen_qr_code('{{ $all_area->name_area }}' , '{{ $all_area->name }}','{{ $all_area->id }}');">
                                                ยืนยัน
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row text-center">
                    <div class="col-12">
                        
                       <!-- link to light box -->
                       <a href="#artwork_{{ $loop->iteration }}" class="btn-outline-dark">
                            <img class="main-shadow main-radius" src="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png" style="background-color: red;width: 100%;">
                        </a>

                        <!-- light box -->
                        <a href="##" class="lightbox" id="artwork_{{ $loop->iteration }}">
                            <span style="background-image: url(' {{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png')"></span>
                        </a>
                        <br>
                        <!-- download btn -->
                        <a class="btn btn-outline-danger px-3 radius-30 mt-3" href="{{ url('storage') }}/check_in/artwork_{{ $all_area->name }}_{{ $text_name_area }}.png" download><i class="fa-solid fa-download"></i> ดาวน์โหลด</a>
                        <a class="btn btn-outline-warning px-3 radius-30 mt-3" href="#artwork_{{ $loop->iteration }}" ><img  src="{{ asset('peddyhub/images/icons/zoom-in.png') }}" width="18px" alt=""></a>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="modal fade" id="gallery" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">คลังภาพ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><img src="{{ asset('/peddyhub/images/how_to_use/gallery/1.png') }}" style="border: 2px solid #555;" width="60%" alt="Card image cap"></center><br>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">1.หากมีพื้นที่แล้วแต่ยังไม่มี QR-Code ของพื้นที่ หรือต้องการเปลี่ยนสีของ QR-Code ให้กดที่ปุ่มสร้าง QR-Code</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">2.กรอกโค้ดสี : กรอกโค้ดสีที่ต้องการ เช่น #B8205B</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">3.เมื่อกรอกโค้ดสีแล้วให้กดที่ปุ่มยืนยันเพื่อสร้าง QR-Code ใหม่</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">4.กดที่ปุ่มดาวน์โหลดเพื่อโหลดเป็นไฟล์ภาพ</h5>
                <h5 style="text-indent:20px;font-family: 'Prompt', sans-serif; margin-bottom: 10px;">5.กดที่ปุ่มแว่นขยายเพื่อดูรูปภาพขนาดใหญ่</h5>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    
    function gen_qr_code(name_area, name , id){
        
        let url = "" ;

        let name_partner = name ;
        let name_partner_re = name_partner.replaceAll(' ' , '_');

        let result = name_area ;
        let name_new_check_in = result.replaceAll(' ' , '_');

        if (name_new_check_in) {
            name_new_check_in = name_new_check_in ;
        }else{
            name_new_check_in = null ;
        }
        // console.log(name_new_check_in);
        // console.log(type_partner);

        url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.peddyhub.com/welcome_check_in_line?location=" + id + "&chs=500x500&choe=UTF-8" ;

        // console.log(url);

        let data = {
            'url' : url,
            'name_partner' : name_partner,
            'name_new_check_in' : name_new_check_in,
        };

        fetch("{{ url('/') }}/api/save_img_url", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            let url_img = "{{ url('storage') }}/" + "check_in/" + text;

            change_color_theme("check_in/" + text, name_area, name , id);

        }).catch(function(error){
            // console.error(error);
        });

    }

    function change_color_theme(url_img, name_area, name, id)
    {
        let color_theme = document.querySelector('#color_theme_'+id) ;

        let name_partner = name ;
        let name_new_check_in = name_area ;

        if (name_new_check_in) {
            name_new_check_in = name_new_check_in ;
        }else{
            name_new_check_in = null ;
        }

        let data = {
            'color_theme' : color_theme.value,
            'name_partner' : name_partner,
            'name_new_check_in' : name_new_check_in,
            'url_img' : url_img,
        };

        fetch("{{ url('/') }}/api/admin_create_img_check_in", {
            method: 'post',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function (response){
            return response.text();
        }).then(function(text){
            // console.log(text);
            window.location.reload(true);

        }).catch(function(error){
            console.error(error);
        });

    }

</script>

@endsection