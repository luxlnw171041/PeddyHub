@extends('layouts.partner.theme_partner')

@section('content')
<div class="container-fluid translate">
    <div class="row">
        <div class="col-md-12">
            <div class="card radius-10" style="font-family: 'Baloo Bhaijaan 2', cursive;font-family: 'Prompt', sans-serif;">
                <div class="card-header border-bottom-0 bg-transparent" style="padding-right:0px;">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h2 style="margin-top: 10px;">ประกาศตามหาสัตว์เลี้ยงหาย</h2>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="{{ url('/lost_pet_by_partner') }}" class="btn btn-success text-white main-shadow main-radius" style="width:20%;float: right;margin-right: 20px;margin-top: 10px;">
                                เพิ่มประกาศใหม่
                            </a>
                        </div>
                    </div>

                    <div class="main-wrapper pet check" style="padding: 10px;">
                        <div class="pet service">
                            <section class="contact" style="margin-top:10px;">
                                <div class="row d-flex justify-content-end">
                                    <hr>
                                    <div class="col-12 col-md-12">
                                        <div style="margin-top: 10px;" class="row">
                                            <div class="col-12 col-md-7">
                                                <input type="text" class="form-control" name="gen_token" id="gen_token" value="{{ $token }}" readonly>
                                            </div>
                                            <div class="col-12 col-md-1">
                                                <span style="width:100%;" class="btn btn-secondary text-white main-shadow main-radius" onclick="CopyToClipboard('gen_token')">
                                                    Copy
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <span style="width:100%;" class="btn btn-warning text-white main-shadow main-radius" onclick="Create_Token();">
                                                    Create Token
                                                </span>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <span style="width:100%;" class="btn btn-info text-white main-shadow main-radius">
                                                    วิธีใช้งาน API
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<input class="d-none" type="text" id="by_partner" name="by_partner" value="{{ Auth::user()->partner }}" >

<script>
    function Create_Token(){
        let id_partner = document.querySelector('#by_partner').value ;
        let gen_token = document.querySelector('#gen_token') ;

        fetch("{{ url('/') }}/api/Create_Token/" + id_partner)
            .then(response => response.text())
            .then(result => {

                // console.log(result);
                gen_token.value = result ;
            });
    }

    function CopyToClipboard(containerid) {
        var range = document.createRange();
            range.selectNode(document.getElementById(containerid));
            window.getSelection().addRange(range);
            document.execCommand("copy");
    }
</script>
@endsection
