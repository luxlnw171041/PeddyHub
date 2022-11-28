<div class="form-group {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($partner_premium->name_partner) ? $partner_premium->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('id_partner') ? 'has-error' : ''}}">
    <label for="id_partner" class="control-label">{{ 'Id Partner' }}</label>
    <input class="form-control" name="id_partner" type="number" id="id_partner" value="{{ isset($partner_premium->id_partner) ? $partner_premium->id_partner : ''}}" >
    {!! $errors->first('id_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('level') ? 'has-error' : ''}}">
    <label for="level" class="control-label">{{ 'Level' }}</label>
    <input class="form-control" name="level" type="text" id="level" value="{{ isset($partner_premium->level) ? $partner_premium->level : ''}}" >
    {!! $errors->first('level', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_car_max') ? 'has-error' : ''}}">
    <label for="BC_by_car_max" class="control-label">{{ 'Bc By Car Max' }}</label>
    <input class="form-control" name="BC_by_car_max" type="text" id="BC_by_car_max" value="{{ isset($partner_premium->BC_by_car_max) ? $partner_premium->BC_by_car_max : ''}}" >
    {!! $errors->first('BC_by_car_max', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_car_sent') ? 'has-error' : ''}}">
    <label for="BC_by_car_sent" class="control-label">{{ 'Bc By Car Sent' }}</label>
    <input class="form-control" name="BC_by_car_sent" type="text" id="BC_by_car_sent" value="{{ isset($partner_premium->BC_by_car_sent) ? $partner_premium->BC_by_car_sent : ''}}" >
    {!! $errors->first('BC_by_car_sent', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_check_in_max') ? 'has-error' : ''}}">
    <label for="BC_by_check_in_max" class="control-label">{{ 'Bc By Check In Max' }}</label>
    <input class="form-control" name="BC_by_check_in_max" type="text" id="BC_by_check_in_max" value="{{ isset($partner_premium->BC_by_check_in_max) ? $partner_premium->BC_by_check_in_max : ''}}" >
    {!! $errors->first('BC_by_check_in_max', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_check_in_sent') ? 'has-error' : ''}}">
    <label for="BC_by_check_in_sent" class="control-label">{{ 'Bc By Check In Sent' }}</label>
    <input class="form-control" name="BC_by_check_in_sent" type="text" id="BC_by_check_in_sent" value="{{ isset($partner_premium->BC_by_check_in_sent) ? $partner_premium->BC_by_check_in_sent : ''}}" >
    {!! $errors->first('BC_by_check_in_sent', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_user_max') ? 'has-error' : ''}}">
    <label for="BC_by_user_max" class="control-label">{{ 'Bc By User Max' }}</label>
    <input class="form-control" name="BC_by_user_max" type="text" id="BC_by_user_max" value="{{ isset($partner_premium->BC_by_user_max) ? $partner_premium->BC_by_user_max : ''}}" >
    {!! $errors->first('BC_by_user_max', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('BC_by_user_sent') ? 'has-error' : ''}}">
    <label for="BC_by_user_sent" class="control-label">{{ 'Bc By User Sent' }}</label>
    <input class="form-control" name="BC_by_user_sent" type="text" id="BC_by_user_sent" value="{{ isset($partner_premium->BC_by_user_sent) ? $partner_premium->BC_by_user_sent : ''}}" >
    {!! $errors->first('BC_by_user_sent', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
