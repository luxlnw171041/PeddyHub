<div class="form-group {{ $errors->has('name_partner') ? 'has-error' : ''}}">
    <label for="name_partner" class="control-label">{{ 'Name Partner' }}</label>
    <input class="form-control" name="name_partner" type="text" id="name_partner" value="{{ isset($partner_token->name_partner) ? $partner_token->name_partner : ''}}" >
    {!! $errors->first('name_partner', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('partner_id') ? 'has-error' : ''}}">
    <label for="partner_id" class="control-label">{{ 'Partner Id' }}</label>
    <input class="form-control" name="partner_id" type="number" id="partner_id" value="{{ isset($partner_token->partner_id) ? $partner_token->partner_id : ''}}" >
    {!! $errors->first('partner_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('token') ? 'has-error' : ''}}">
    <label for="token" class="control-label">{{ 'Token' }}</label>
    <input class="form-control" name="token" type="text" id="token" value="{{ isset($partner_token->token) ? $partner_token->token : ''}}" >
    {!! $errors->first('token', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
