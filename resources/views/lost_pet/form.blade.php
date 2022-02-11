<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($lost_pet->user_id) ? $lost_pet->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pet_id') ? 'has-error' : ''}}">
    <label for="pet_id" class="control-label">{{ 'Pet Id' }}</label>
    <input class="form-control" name="pet_id" type="number" id="pet_id" value="{{ isset($lost_pet->pet_id) ? $lost_pet->pet_id : ''}}" >
    {!! $errors->first('pet_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo') ? 'has-error' : ''}}">
    <label for="photo" class="control-label">{{ 'Photo' }}</label>
    <input class="form-control" name="photo" type="file" id="photo" value="{{ isset($lost_pet->photo) ? $lost_pet->photo : ''}}" >
    {!! $errors->first('photo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('let') ? 'has-error' : ''}}">
    <label for="let" class="control-label">{{ 'Let' }}</label>
    <input class="form-control" name="let" type="text" id="let" value="{{ isset($lost_pet->let) ? $lost_pet->let : ''}}" >
    {!! $errors->first('let', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('long') ? 'has-error' : ''}}">
    <label for="long" class="control-label">{{ 'Long' }}</label>
    <input class="form-control" name="long" type="text" id="long" value="{{ isset($lost_pet->long) ? $lost_pet->long : ''}}" >
    {!! $errors->first('long', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<input class="form-control" type="text" id="latlng" name="latlng" readonly> 

<div class="col-12 main-shadow main-radius" style="margin-top:15px; margin-bottom:10px;background-color: #ff4544;" id="map" >
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
        initMap();
    });
    
    function initMap(position) { 
        // let lat_text = document.querySelector("#lat");
        // let lng_text = document.querySelector("#lng");
        // let latlng = document.querySelector("#latlng");

        // lat_text.value = position.coords.latitude ;
        // lng_text.value = position.coords.longitude ;
        // latlng.value = position.coords.latitude+","+position.coords.longitude ;
        
        // let lat = parseFloat(lat_text.value) ;
        // let lng = parseFloat(lng_text.value) ;

        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 6,
            center: { lat: 13.7248936, lng: 100.4930264 },
            mapTypeId: "terrain",
        });

        // ตำแหน่ง USER
        // const user = { lat: lat, lng: lng };
        // const marker_user = new google.maps.Marker({ map, position: user });

        // draw_area(map);

        // const geocoder = new google.maps.Geocoder();
        // const infowindow = new google.maps.InfoWindow();

        // document.getElementById("location_user").addEventListener("click", () => {
        //     geocodeLatLng(geocoder, map, infowindow);
        // });

        // marker_user.addListener("click", () => {
        //     geocodeLatLng(geocoder, map, infowindow);
        // });

        // let text_sos = document.querySelector('#text_sos').value;

        // if (text_sos === "insurance") {
        //     document.querySelector('#btn_contact_insurance').click();
        // }
    }

</script>
