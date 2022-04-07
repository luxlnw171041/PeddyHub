@extends('layouts.app')

@section('content')
<center>
  <div style="margin-top:-40px;" class="card">
    <div class="row">
        <div class="col-12">
            <br>
            <img  width="60%" src="{{ asset('/img/stickerline/PNG/15.png') }}">
            <br><br>
            
            @if($type == "CHECK IN")
              <h1 class="text-success notranslate"><b>{{ $type }}</b></h1>
            @endif
            @if($type == "CHECK OUT")
              <h1 class="text-danger notranslate"><b>{{ $type }}</b></h1>
            @endif

            <h4 style="color:blue;"><b><u>{{ date("d/m/Y H:i" , strtotime($time)) }}</u></b></h4>

            <h4>คุณ : <b>{{ Auth::user()->name }}</b></h4>
            <p>ประวัติการเข้าออก {{ $check_in_at }}</p>
            @foreach($data_in_out as $item)
              @if(!empty($item->time_in))
                <b class="text-success">เข้า :</b> {{ date("d/m/Y H:i" , strtotime($item->time_in)) }}
                <br>
              @endif
              @if(!empty($item->time_out))
                <b class="text-danger">ออก :</b> {{ date("d/m/Y H:i" , strtotime($item->time_out)) }}
                <br>
              @endif
            @endforeach
            <br>
        </div>
    </div>

    <a class="btn btn-lg btn-success" onclick="check_add_line();">
      เสร็จสิ้น
    </a>
  </div>
  <br><br><br>
</center>
<input class="d-none" type="text" name="uesr_add_line" id="uesr_add_line" value="{{ Auth::user()->add_line }}">

<!-- Button trigger modal -->
<button id="btn_modal_addline" type="button" class="btn btn-primary d-none" data-toggle="modal" data-target="#modal_addline">
</button>

<!-- Modal -->
<div class="modal fade" id="modal_addline" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <center>
          <a href="https://line.me/R/ti/p/@746tisvc">
            <!-- รูปภาพ -->
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