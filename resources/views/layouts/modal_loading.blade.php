@extends('layouts.peddyhub')

@section('content')

<div class="modal fade " data-keyboard="false" id="modal_thx" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="d-flex justify-content-end" style="padding: 15px;">
                <div class="line-spinner"></div>
            </div>
            <div class="modal-body text-center">
                <img width="60%" src="{{ asset('peddyhub/images/home_5/preloader.gif') }}">
                <br>
                <center style="margin-top:15px;">
                    <h6 style="font-family: 'Kanit', sans-serif;">กำลังโหลด โปรดรอสักครู่..</h6>
                </center>
                <br>
                <h5 style="font-family: 'Kanit', sans-serif;">สนับสนุนโดย</h5>
                <div class="col-12 owl-carousel-two align-self-center" style="padding:0px;">
                    <div class="owl-carousel">
                        @php
                        $partner = \App\Models\Partner::where(['show_homepage' => 'show'])->get()
                        @endphp
                        @foreach($partner as $item)
                        <div class="item" style="padding:0px;z-index:-1;">
                            <div class="testimon">
                                <a href="{{$item->link}}" target="bank">
                                    <img class="p-md-3 p-lg-3" style="width: 100%;object-fit: contain;max-height: 112px;" src="{{ url('storage/'.$item->logo )}}">
                                </a>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
