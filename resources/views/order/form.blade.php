<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($order->user_id) ? $order->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('total') ? 'has-error' : ''}}">
    <label for="total" class="control-label">{{ 'Total' }}</label>
    <input class="form-control" name="total" type="number" id="total" value="{{ isset($order->total) ? $order->total : ''}}" >
    {!! $errors->first('total', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">{{ 'Status' }}</label>
    <input class="form-control" name="status" type="text" id="status" value="{{ isset($order->status) ? $order->status : ''}}" >
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('checking_at') ? 'has-error' : ''}}">
    <label for="checking_at" class="control-label">{{ 'Checking At' }}</label>
    <input class="form-control" name="checking_at" type="datetime-local" id="checking_at" value="{{ isset($order->checking_at) ? $order->checking_at : ''}}" >
    {!! $errors->first('checking_at', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tracking') ? 'has-error' : ''}}">
    <label for="tracking" class="control-label">{{ 'Tracking' }}</label>
    <input class="form-control" name="tracking" type="text" id="tracking" value="{{ isset($order->tracking) ? $order->tracking : ''}}" >
    {!! $errors->first('tracking', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
