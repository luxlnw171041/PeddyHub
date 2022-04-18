@extends('layouts.empty')

@section('content')
  <div class="text-center">
    <div class="row">
        <div class="col-12">
            <br>
            <img  width="60%" src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/24.png') }}">
            <br><br>
            
            @if($type == "CHECK IN")
              <h2 class="text-success notranslate" style="font-family: 'Days One', sans-serif;"><b>{{ $type }}</b></h2>
            @endif
            @if($type == "CHECK OUT")
              <h2 class="text-danger notranslate" style="font-family: 'Days One', sans-serif;"><b>{{ $type }}</b></h2>
            @endif
            <h4>คุณ : <b>{{ Auth::user()->profile->real_name }}</b></h4>
            <h4 style="color:blue;font-family: 'Sarabun', sans-serif;"><b><u>วัน{{ thaidate("l j F Y" , strtotime($time)) }}</u></b></h4>
            <h4 style="color:blue;font-family: 'Sarabun', sans-serif;"><b><u>เวลา {{ thaidate("H:i" , strtotime($time)) }}</u></b></h4>
            <br>
            <h5 style="font-family: 'Sarabun', sans-serif;font-weight:600;">ประวัติการเข้าออก {{ $check_in_at }}</h5>
            @foreach($data_in_out as $item)
              @if(!empty($item->time_in))
              <p style="margin-bottom:0px;font-family: 'Sarabun', sans-serif;font-size:17px">
                <b class="text-success" style="font-family: 'Sarabun', sans-serif;font-weight:600;" >เข้า :</b> {{ thaidate("l j F Y H:i" , strtotime($item->time_in)) }}
              </p>
              @endif
              @if(!empty($item->time_out))
              <p style="margin-bottom:0px;font-family: 'Sarabun', sans-serif;font-size:17px">
                <b class="text-danger" style="font-family: 'Sarabun', sans-serif;font-weight:600;" >ออก :</b> {{ thaidate("l j F Y H:i" , strtotime($item->time_out)) }}
              </p>
              @endif
            @endforeach
            <br>
        </div>
    </div>

    <a class="button-three btn-md shadow-btn-checkin" onclick="check_add_line();">
      เสร็จสิ้น
    </a>
  </div>
  <br>
  <h6 class="col-10 d-flex justify-content-start" style="left:10px;padding:0px;margin:0px;font-family: 'Sarabun', sans-serif;font-weight:600;">สนับสนุนโดย</h6>
  <hr class="col-10" style="margin-top:10px;padding:19;left:10px;">
    <div class="col-12" style="margin-bottom:-20px;">
      <div class="row text-center">
        <div class="col-3" >
            <a href="https://manoonpetshop.co.th/" target="bank">
                <img width="100%" src="{{ asset('peddyhub/images/logo-partner/logomanoonpetshop2.png') }}">
            </a>
        </div>
        <div class="col-3" >
            <a href="https://facebook.com/DogInTownCafeEkkamai/?_rdc=1&_rdr" target="bank">
                <img width="100%" src="{{ asset('peddyhub/images/logo-partner/dogintown.jpg') }}">
            </a>
        </div>
        <div class="col-3" style="top:3px;">
            <a href="https://facebook.com/catsanovabkk/" target="bank">
                <img width="80%" src="{{ asset('peddyhub/images/logo-partner/Catsanova.png') }}">
            </a>
        </div>
        <div class="col-3" >
            <a href="https://www.facebook.com/neverlandsiberians/" target="bank">
                <img width="60%" src="{{ asset('peddyhub/images/logo-partner/turelove.jpg') }}">
            </a>
        </div>
        <div class="col-12" style="top:7px;">
              <a href="https://www.facebook.com/caturdaycatcafe/" target="bank">
                  <img width="13%" src="{{ asset('peddyhub/images/logo-partner/Caturday.png') }}">
              </a>
          </div>
      </div>
    </div>
  <br><br>
<input class="d-none" type="text" name="uesr_add_line" id="uesr_add_line" value="{{ Auth::user()->add_line }}">

<!-- Button trigger modal -->
<button id="btn_modal_addline" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_addline">
</button>

<!-- Modal -->
<div class="modal fade" id="modal_addline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body" style="padding:10px;">
        <center>
          <a href="https://line.me/R/ti/p/@746tisvc">
            <img width="100%" src="{{ asset('peddyhub/images/poster/poster dog.png') }}">
          </a>
        </center>
        <br>
        <a id="btn_add_line" href="https://line.me/R/ti/p/@746tisvc">
          <button  style="width:100% ;font-size: 22px; background-color: #28A745;" type="button" class="btn btn-lg btn-success text-white" ><b>
            <i class="fab fa-line "></i> เพิ่มเพื่อน</b>
          </button>
        </a>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START"); 

    });

    function check_add_line(){

      let uesr_add_line = document.querySelector("#uesr_add_line");

        if (uesr_add_line.value != "Yes") {
          document.querySelector("#btn_modal_addline").click();
        }else{
          document.querySelector("#btn_add_line").click();

        }
    }
</script>
@endsection