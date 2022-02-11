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
