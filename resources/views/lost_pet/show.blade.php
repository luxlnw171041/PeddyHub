@extends('layouts.peddyhub')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header text-info">ประกาศหา  {{ $lost_pet->pet->name }}</h5>
                    <div class="card-body">
                        <div class="row col-12">
                            <div class="col-12 col-md-6">
                                <b style="font-size:22px;">ข้อมูลน้อง</b>
                                <br><br>
                                <div class="row col-12">
                                    <div class="col-12 col-md-6">
                                        <img width="100%" src="{{ url('storage')}}/{{ $lost_pet->pet->photo }}" class="main-shadow main-radius">
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <br class="d-block d-md-none">
                                        ชื่อ : {{ $lost_pet->pet->name }} <br>
                                        ประเภท : {{ $lost_pet->pet_category->name }} <br>
                                        เพศ : {{ $lost_pet->pet->gender }} <br>
                                        ขนาดตัว : {{ $lost_pet->pet->size }} <br>
                                        ช่วงวัย : {{ $lost_pet->pet->age }} <br>
                                        <br>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <br>
                                        คำอธิบาย : <br>
                                        {{ $lost_pet->detail }}
                                    </div>
                                </div>
                                <br class="d-block d-md-none">
                            </div>
                            <div class="col-12 col-md-6">
                                <div id="map_show">
                                    
                                </div>
                                <span style="margin-top: 8px;" class="text-secondary float-right">ตำแหน่งที่แจ้งน้องหาย</span>
                            </div>                            
                            <div class="col-12 col-md-6">
                                <br><br>
                                <a href="tel:{{ $lost_pet->profile->phone }}" class="col-12 col-md-6 main-shadow main-radius btn btn-info" >
                                    <i class="fa-solid fa-phone"></i> &nbsp;&nbsp; ติดต่อเจ้าของ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    #map_show {
      height: calc(30vh);
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
