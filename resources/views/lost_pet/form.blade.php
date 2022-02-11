
<div class="col-12 main-shadow main-radius" style="margin-top:15px; margin-bottom:10px;" id="map" >
    <img style=" object-fit: contain; " width="280 px" src="{{ asset('/peddyhub/images/PEDDyHUB sticker line/15.png') }}" class="card-img-top center" style="padding: 10px;">
    <div style="position: relative; z-index: 5">
        <div style="padding-top: 8px;"class="translate">
            <h4 style="font-family: 'Sarabun', sans-serif;">ขออภัยครับ</h4>
            <h6 style="font-family: 'Sarabun', sans-serif;">ดำเนินการไม่สำเร็จ กรุณาเปิดตำแหน่งที่ตั้ง และลองใหม่อีกครั้งครับ</h6>
        </div>
    </div>
</div>
<br>

<div id="div_form" class="d-none">
    
    <div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'User Id' }}</label>
        <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($lost_pet->user_id) ? $lost_pet->user_id : Auth::user()->id }}" >
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="form-group {{ $errors->has('select_pet') ? 'has-error' : ''}}">
        <label for="user_id" class="control-label">{{ 'เลือกสัตว์เลี้ยง' }}</label>
        <select name="select_pet" id="select_pet" class="form-control" onchange="select_pet_id();" required>
            <option value="" selected>- เลือกสัตว์เลี้ยง -</option>
            @foreach($select_pet as $item)
                <option value="{{ $item->id }}" 
                {{ request('name') == $item->name ? 'selected' : ''   }} >
                {{ $item->name }} 
                </option>
            @endforeach  
        </select>
    </div>

    <img id="img_pet" class="main-shadow main-radius" width="100%" src="">
    <br>

    <div class="d-none form-group {{ $errors->has('pet_id') ? 'has-error' : ''}}">
        <label for="pet_id" class="control-label">{{ 'Pet Id' }}</label>
        <input class="form-control" name="pet_id" type="number" id="pet_id" value="{{ isset($lost_pet->pet_id) ? $lost_pet->pet_id : ''}}" >
        {!! $errors->first('pet_id', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
        <label for="photo" class="control-label">{{ 'Photo' }}</label>
        <input class="form-control" name="photo" type="text" id="photo" value="{{ isset($lost_pet->photo) ? $lost_pet->photo : ''}}" >
        {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
        <label for="lat" class="control-label">{{ 'Let' }}</label>
        <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($lost_pet->lat) ? $lost_pet->lat : ''}}" >
        {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="d-none form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
        <label for="lng" class="control-label">{{ 'Long' }}</label>
        <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($lost_pet->lng) ? $lost_pet->lng : ''}}" >
        {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
    </div>

    <input class="d-none" type="text" id="latlng" name="latlng" readonly> 

    <br>

    <div class="row ">
        <div class="col-1"></div>
        <input class="col-10 btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'แจ้งน้องหาย' : 'แจ้งน้องหาย' }}">
        <div class="col-1"></div>
    </div>

</div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgrxXDgk1tgXngalZF3eWtcTWI-LPdeus&language=th" ></script>
<style type="text/css">
    #map {
      height: calc(45vh);
    }
    
</style>

<script>

    document.addEventListener('DOMContentLoaded', (event) => {
        // console.log("START");
        getLocation();
    });

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(initMap);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    
    function initMap(position) { 

        let lat_text = document.querySelector("#lat");
        let lng_text = document.querySelector("#lng");
        let latlng = document.querySelector("#latlng");

        lat_text.value = position.coords.latitude ;
        lng_text.value = position.coords.longitude ;
        latlng.value = position.coords.latitude+","+position.coords.longitude ;
        
        let lat = parseFloat(lat_text.value) ;
        let lng = parseFloat(lng_text.value) ;

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 15,
            center: { lat: lat, lng: lng },
            mapTypeId: "terrain",
        });

        // ตำแหน่ง USER
        const user = { lat: lat, lng: lng };
        const marker_user = new google.maps.Marker({ map, position: user });

        document.querySelector('#div_form').classList.remove('d-none');

    }

    function select_pet_id(){
        let select_pet = document.querySelector('#select_pet');
        let pet_id = document.querySelector('#pet_id');
            pet_id.value = select_pet.value ;

        fetch("{{ url('/') }}/api/select_img_pet/" + pet_id.value )
            .then(response => response.json())
            .then(result => {
                // console.log(result);
                let photo = document.querySelector('#photo');
                    photo.value = result[0]['photo'];

                let img_pet = document.querySelector('#img_pet');
                    img_pet.src = "{{ url('storage')}}" + "/" + result[0]['photo'];

            });
    }

</script>
