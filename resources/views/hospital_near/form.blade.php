<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($hospital_near->name) ? $hospital_near->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
    <label for="lat" class="control-label">{{ 'Lat' }}</label>
    <input class="form-control" name="lat" type="text" id="lat" value="{{ isset($hospital_near->lat) ? $hospital_near->lat : ''}}" >
    {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lng') ? 'has-error' : ''}}">
    <label for="lng" class="control-label">{{ 'Lng' }}</label>
    <input class="form-control" name="lng" type="text" id="lng" value="{{ isset($hospital_near->lng) ? $hospital_near->lng : ''}}" >
    {!! $errors->first('lng', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_1') ? 'has-error' : ''}}">
    <label for="photo_1" class="control-label">{{ 'Photo 1' }}</label>
    <input class="form-control" name="photo_1" type="file" id="photo_1" value="{{ isset($hospital_near->photo_1) ? $hospital_near->photo_1 : ''}}" >
    {!! $errors->first('photo_1', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_2') ? 'has-error' : ''}}">
    <label for="photo_2" class="control-label">{{ 'Photo 2' }}</label>
    <input class="form-control" name="photo_2" type="file" id="photo_2" value="{{ isset($hospital_near->photo_2) ? $hospital_near->photo_2 : ''}}" >
    {!! $errors->first('photo_2', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_3') ? 'has-error' : ''}}">
    <label for="photo_3" class="control-label">{{ 'Photo 3' }}</label>
    <input class="form-control" name="photo_3" type="file" id="photo_3" value="{{ isset($hospital_near->photo_3) ? $hospital_near->photo_3 : ''}}" >
    {!! $errors->first('photo_3', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_4') ? 'has-error' : ''}}">
    <label for="photo_4" class="control-label">{{ 'Photo 4' }}</label>
    <input class="form-control" name="photo_4" type="file" id="photo_4" value="{{ isset($hospital_near->photo_4) ? $hospital_near->photo_4 : ''}}" >
    {!! $errors->first('photo_4', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('photo_5') ? 'has-error' : ''}}">
    <label for="photo_5" class="control-label">{{ 'Photo 5' }}</label>
    <input class="form-control" name="photo_5" type="file" id="photo_5" value="{{ isset($hospital_near->photo_5) ? $hospital_near->photo_5 : ''}}" >
    {!! $errors->first('photo_5', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="address" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($hospital_near->address) ? $hospital_near->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('business_hours') ? 'has-error' : ''}}">
    <label for="business_hours" class="control-label">{{ 'Business Hours' }}</label>
    <input class="form-control" name="business_hours" type="text" id="business_hours" value="{{ isset($hospital_near->business_hours) ? $hospital_near->business_hours : ''}}" >
    {!! $errors->first('business_hours', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    <label for="phone" class="control-label">{{ 'Phone' }}</label>
    <input class="form-control" name="phone" type="text" id="phone" value="{{ isset($hospital_near->phone) ? $hospital_near->phone : ''}}" >
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
