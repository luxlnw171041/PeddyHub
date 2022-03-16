<div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
    <label for="location" class="control-label">{{ 'Location' }}</label>
    <select name="location" id="location" class="form-control" required>
        <option value="" selected>- เลือกโรงพยาบาล -</option>
        <option value="เกษตรศาสตร์">โรงพยาบาลสัตว์เกษตรศาสตร์</option>
    </select>
</div>
<div class="form-group {{ $errors->has('pet_id') ? 'has-error' : ''}}">
    <label for="pet_id" class="control-label">{{ 'Pet Id' }}</label>
    <select name="pet_id" id="pet_id" class="form-control" required>
        <option value="" selected>- เลือกเจ้าตัวแสบ -</option>
        @foreach($pet as $item)
            <option value="{{ $item->id }}" 
            {{ request('name') == $item->name ? 'selected' : ''   }} >
            {{ $item->name }} 
            </option>
        @endforeach  
    </select>
</div>
<div class="d-none form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($blood_bank->user_id) ? $blood_bank->user_id : Auth::user()->id}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<!-- <div class="d-none form-group {{ $errors->has('quantity') ? 'has-error' : ''}}">
    <label for="quantity" class="control-label">{{ 'Quantity' }}</label>
    <input class="form-control" name="quantity" type="number" id="quantity" value="{{ isset($blood_bank->quantity) ? $blood_bank->quantity : ''}}" >
    {!! $errors->first('quantity', '<p class="help-block">:message</p>') !!}
</div> -->

<div class="form-group {{ $errors->has('total_blood') ? 'has-error' : ''}}">
    <label for="total_blood" class="control-label">{{ 'Total Blood' }}</label>
    <input class="form-control" name="total_blood" type="text" id="total_blood" value="{{ isset($blood_bank->total_blood) ? $blood_bank->total_blood : ''}}" >
    {!! $errors->first('total_blood', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
