<div class="form-group {{ $errors->has('pet_id') ? 'has-error' : ''}}">
    <label for="pet_id" class="control-label">{{ 'Pet Id' }}</label>
    <input class="form-control" name="pet_id" type="number" id="pet_id" value="{{ isset($blood_bank->pet_id) ? $blood_bank->pet_id : ''}}" >
    {!! $errors->first('pet_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($blood_bank->user_id) ? $blood_bank->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($blood_bank->quantity) ? $blood_bank->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total_blood') ? 'has-error' : ''}}">
    <label for="total_blood" class="control-label">{{ 'Total Blood' }}</label>
    <input class="form-control" name="total_blood" type="text" id="total_blood" value="{{ isset($blood_bank->total_blood) ? $blood_bank->total_blood : ''}}" >
    {!! $errors->first('total_blood', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <input class="form-control" name="location" type="text" id="location" value="{{ isset($blood_bank->location) ? $blood_bank->location : ''}}" >
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
