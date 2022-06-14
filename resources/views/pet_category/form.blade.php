<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($pet_category->name) ? $pet_category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sub_category') ? 'has-error' : ''}}">
    <label for="sub_category" class="control-label">{{ 'sub_category' }}</label>
    <input class="form-control" name="sub_category" type="text" id="sub_category" value="{{ isset($pet_category->sub_category) ? $pet_category->sub_category : ''}}" >
    {!! $errors->first('sub_category', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('size') ? 'has-error' : ''}}">
    <label for="size" class="control-label">{{ 'size' }}</label>
    <input class="form-control" name="size" type="text" id="size" value="{{ isset($pet_category->size) ? $pet_category->size : ''}}" >
    {!! $errors->first('size', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('species') ? 'has-error' : ''}}">
    <label for="species" class="control-label">{{ 'species' }}</label>
    <input class="form-control" name="species" type="text" id="species" value="{{ isset($pet_category->species) ? $pet_category->species : ''}}" >
    {!! $errors->first('species', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
