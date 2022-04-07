@extends('layouts.admin')

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
.btn-peddyhub{
    background-color:#B8205B;
    color:white;
    
}
.btn-peddyhub:hover {
    color:white;
      }
</style>
    <div class="card radius-10">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-lg-flex align-items-center">
                <div>
                    <h3 class="font-weight-bold mb-2 mb-lg-0">QR-Code and Logo</h3>
                </div>
                <div class="ms-lg-auto mb-2 mb-lg-0">
                    <div class="btn-group-round">
                    </div>
                </div>
                <div>
                    <a type="button" class="btn btn-peddyhub radius-15 ms-lg-3">ดาวน์โหลดทั้งหมด</a>
                </div>
            </div>
        </div>
        <div class="card-body" style="position: relative;">
            <div class="row mt-3">
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                    <a type="button" class="btn radius-10 btn-peddyhub"  href="{{ asset('/peddyhub/images/media/all/logo-1.png') }}" download >
                                        <i class="fa-regular fa-download"></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">Logo 1</h5>
                            
                            <div>
                                <a href="#logo1">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/logo-1.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="logo1">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/logo-1.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                <a type="button" class="btn  radius-10 btn-peddyhub" href="{{ asset('/peddyhub/images/media/all/logo-2.png') }}" download ><i class="fa-regular fa-download"></i></a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">Logo 2</h5>
                            
                            <div >
                                <a href="#logo2">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/logo-2.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="logo2">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/logo-2.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                <a type="button" class="btn  radius-10 btn-peddyhub" href="{{ asset('/peddyhub/images/media/all/logo-3.png') }}" download ><i class="fa-regular fa-download"></i></a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">Logo 3</h5>
                            
                            <div >
                                <a href="#logo3">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/logo-3.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="logo3">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/logo-3.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                <a type="button" class="btn  radius-10 btn-peddyhub" href="{{ asset('/peddyhub/images/media/all/poster.png') }}" download ><i class="fa-regular fa-download"></i></a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">Poster Service</h5>
                        </div>
                        <div class="card-body" style="padding:0px 0px 15px 0px;">
                            <div >
                                <a href="#poster">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/poster.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="poster">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/poster.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                <a type="button" class="btn  radius-10 btn-peddyhub" href="{{ asset('/peddyhub/images/media/all/qr_code_line.png') }}" download ><i class="fa-regular fa-download"></i></a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">QR Code Line OA</h5>
                        </div>
                        <div class="card-body" style="padding:0px 0px 15px 0px;">
                            <div >
                                <a href="#qrcode_line">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/qr_code_line.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="qrcode_line">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/qr_code_line.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                <a type="button" class="btn  radius-10 btn-peddyhub" href="{{ asset('/peddyhub/images/media/all/qr_code_facebook.png') }}" download ><i class="fa-regular fa-download"></i></a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">QR Code Facebook</h5>
                        </div>
                        <div class="card-body" style="padding:0px 0px 15px 0px;">
                            <div >
                                <a href="#qrcode_facebook">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/qr_code_facebook.png') }}">
                                </a>
                                <a href="#" class="lightbox" id="qrcode_facebook">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/qr_code_facebook.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card radius-10">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-lg-flex align-items-center">
                <div>
                    <h3 class="font-weight-bold mb-2 mb-lg-0">LINE Sticker</h3>
                </div>
                <div class="ms-lg-auto mb-2 mb-lg-0">
                    <div class="btn-group-round">
                    </div>
                </div>
                <div>
                    <a  type="button" class="btn btn-peddyhub radius-15 ms-lg-3" href="{{ asset('/peddyhub/images/media/all/sticker/sticker.zip') }}" download>ดาวน์โหลดทั้งหมด</a>
                </div>
            </div>
        </div>
        <div class="card-body" style="position: relative;">
            <div class="row mt-3">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="4000">
                    <!-- slide 1 -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/01.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/02.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/03.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/04.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                        <!-- slide 2 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/05.png') }}" alt="First slide">

                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/06.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/07.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/08.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                        <!-- slide 3 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/09.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/10.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/11.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/12.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                        <!-- slide 4 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/13.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/14.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/15.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/16.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                        <!-- slide 5 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/17.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/18.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/19.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/20.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                        <!-- slide 5 -->
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-12 col-md-3">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/21.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/22.png') }}" alt="First slide">
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/23.png') }}" alt="First slide">  
                                </div>
                                <div class="col-3 d-none d-md-block">
                                    <img class="d-block w-100" src="{{ asset('/peddyhub/images/media/all/sticker/24.png') }}" alt="First slide">  
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card radius-10" id="present">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-lg-flex align-items-center">
                <div>
                    <h3 class="font-weight-bold mb-2 mb-lg-0">การนำเสนอ</h3>
                </div>
                <div class="ms-lg-auto mb-2 mb-lg-0">
                    <div class="btn-group-round">
                    </div>
                </div>
                <div>
                    <a type="button" class="d-none btn btn-peddyhub radius-15 ms-lg-3">ดาวน์โหลดทั้งหมด</a>
                </div>
            </div>
        </div>
        <div class="card-body" style="position: relative;">
            <div class="row mt-3">
                <div class="col-12 col-lg-6">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                    <a type="button" class="d-none btn radius-10 btn-peddyhub"  href="https://docs.google.com/presentation/d/1JtMgWe0OUg6aIfhp30-grghNkgH2q96MzhFAc7sBKvk/export/pptx') }}" download >
                                        <i class="fa-regular fa-download"></i>
                                    </a>
                                    <br>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">วีดีโอนำเสนอ PEDDyHUB</h5>
                            
                            <div>
                                <a href="#empty">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/sticker/23.png') }}">
                                </a>
                                <a href="#present" class="lightbox" id="empty">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/sticker/23.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                    <a type="button" class="btn radius-10 btn-peddyhub"  href="https://docs.google.com/presentation/d/1JtMgWe0OUg6aIfhp30-grghNkgH2q96MzhFAc7sBKvk/edit#slide=id.g1163471a04e_0_126') }}"target="bank">
                                        ดูสไลด์
                                    </a>
                                    <a type="button" class="btn radius-10 btn-peddyhub"  href="https://docs.google.com/presentation/d/1JtMgWe0OUg6aIfhp30-grghNkgH2q96MzhFAc7sBKvk/export/pptx') }}" download >
                                        <i class="fa-regular fa-download"></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">สไลด์นำเสนอ PEDDyHUB</h5>
                            
                            <div>
                                <a href="#slide">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/all/slide.png') }}">
                                </a>
                                <a href="#present" class="lightbox" id="slide">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/all/slide.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card radius-10" id="checkin">
        <div class="card-header border-bottom-0 bg-transparent">
            <div class="d-lg-flex align-items-center">
                <div>
                    <h3 class="font-weight-bold mb-2 mb-lg-0">เช็คอิน</h3>
                </div>
                <div class="ms-lg-auto mb-2 mb-lg-0">
                    <div class="btn-group-round">
                    </div>
                </div>
                <div>
                    <a type="button" class="d-none btn btn-peddyhub radius-15 ms-lg-3">ดาวน์โหลดทั้งหมด</a>
                </div>
            </div>
        </div>
        <div class="card-body" style="position: relative;">
            <div class="row mt-3">
                <div class="col-12 col-lg-12">
                    <div class="card shadow-none border radius-15">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="ms-auto font-24">
                                    <a type="button" class="btn radius-10 btn-peddyhub"  href="{{ asset('/peddyhub/images/media/เช็คอิน/checkin.png') }}" download >
                                        <i class="fa-regular fa-download"></i>
                                    </a>
                                </div>
                            </div>
                            <h5 class="mt-3 mb-0">ภาพตัวอย่างโปสเตอร์เช็คอิน</h5>
                            
                            <div>
                                <a href="#imgcheckin">
                                    <img class="card-img-top" style="width: 100%;height: 300px;object-fit: contain;" src="{{ asset('/peddyhub/images/media/เช็คอิน/checkin.png') }}">
                                </a>
                                <a href="#checkin" class="lightbox" id="imgcheckin">
                                    <span style="background-image: url('{{ asset('/peddyhub/images/media/เช็คอิน/checkin.png') }}')"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection