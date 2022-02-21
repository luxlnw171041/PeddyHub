@extends('layouts.peddyhub')

@section('content')
    <div class="page-wrapper">
        <!--Pets Container-->
        <section class="pets-container">
            <div class="auto-container">
                <!-- <h2>We ‘ve These Great Pets for You, Ready to Adopt ...</h2> -->
                <div class="row clearfix">
                    <!--Sidebar Page Container-->
                    <!--Content Side / Blog Single-->
                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                        <!-- Place somewhere in the <body> of your page -->
                        <div class="card main-shadow main-radius">
                                <div class="card-body">
                                    <h4>รูปภาพ</h4>
                                    <img src="{{ url('storage')}}/{{ $lost_pet->pet->photo }}" style="border-radius: 25px;" draggable="false">
                                </div>
                            </div>
                        
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="name">
                            <div class="card main-shadow main-radius">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 text-center"style="padding:0px;">
                                            @if(!empty($lost_pet->profile->photo))
                                                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('storage')}}/{{ $lost_pet->profile->photo }}" alt="image of client" title="client" class="img-fluid customer">
                                            @else
                                                <img style="border-radius: 50%;object-fit:cover; width:50px;height:50px;"  src="{{ url('peddyhub/images/home_5/icon1.png')}}" alt="image of client" title="client" class="img-fluid customer">
                                            @endif
                                        </div>
                                        <div class="col-7" style="padding:0px;">
                                            @if(!empty($lost_pet->profile->name))
                                                <p class="notranslate" style="padding:0px;margin:0px;"> <b>{{ $lost_pet->profile->name }}</b>  </p>
                                            @endif
                                            <span style="font-size:20px"> <b></b> </span>
                                            <p style="font-size:12px;margin-top:-8px;"> {{ $lost_pet->created_at->diffForHumans() }} </p>
                                        </div>
                                        <div class="col-3">
                                            <a href="tel:{{ $lost_pet->profile->phone }}" class="btn btn-outline-primary" >
                                                <i class="fa-solid fa-phone"></i>  ติดต่อ
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="card main-shadow main-radius">
                                <div class="card-body">
                                    <h4>ชื่อ: <strong>{{ $lost_pet->pet->name }}</strong></h4>
                                    <ul class="petdetails" >
                                        <li style="font-size:15px;">ประเภท: <strong>{{ $lost_pet->pet_category->name }}</strong></li>
                                        <li style="font-size:15px;">ช่วงอายุ: <strong>{{ $lost_pet->pet->age }}</strong></li>
                                        <li style="font-size:15px;">เพศ: <strong>{{ $lost_pet->pet->gender }}</strong></li>
                                        <li style="font-size:15px;">ขนาด: <strong>{{ $lost_pet->pet->size }}</strong></li>
                                        <li style="font-size:15px;">คำอธิบาย <br>
                                            <strong>{{ $lost_pet->detail }}</strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <br>
                            <div class="card main-shadow main-radius">
                                <div class="card-body">
                                    <h4>ตำแหน่ง</h4>
                                    <div id="map_show" class="main-shadow main-radius">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Pets Container-->
    </div>
    
    <br><br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    #map_show {
      height: calc(40vh);
    }
    
</style>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        initMap();
    });
    
    function initMap() { 
        
        let lat = {{ $lost_pet->lat }} ;
        let lng = {{ $lost_pet->lng }} ;

        const map = new google.maps.Map(document.querySelector('#map_show'), {
            zoom: 17,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user });

    }

</script>
@endsection
