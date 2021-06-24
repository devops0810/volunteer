<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($field->name) ? $field->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
    <label for="type" class="control-label">@lang('admin.type')</label>
    <select required name="type" class="form-control" id="type" >
        <option value=""></option>
        @foreach (json_decode('{"text":"Text","textarea":"Textarea","select":"Select","radio":"Radio","checkbox":"Checkbox"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ (isset($field->type) && $field->type == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('type', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('sort_order') ? 'has-error' : ''}}">
    <label for="sort_order" class="control-label">@lang('admin.sort-order')</label>
    <input required class="form-control" name="sort_order" type="text" id="sort_order" value="{{ old('sort_order',isset($field->sort_order) ? $field->sort_order : '') }}" >
    {!! clean( $errors->first('sort_order', '<p class="help-block">:message</p>')) !!}
</div>
<div id="option-container" class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    <label for="options" class="control-label">@lang('admin.options') </label>
    <textarea placeholder="@lang('admin.option-placeholder')" class="form-control" rows="5" name="options" type="textarea" id="options" >{{ isset($field->options) ? $field->options : ''}}</textarea>
    {!! clean( $errors->first('options', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('required') ? 'has-error' : ''}}">
    <label for="required" class="control-label">@lang('admin.required')</label>
    <select name="required" class="form-control" id="required" >
    @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($field->required) && $field->required == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('required', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('placeholder') ? 'has-error' : ''}}">
    <label for="placeholder" class="control-label">@lang('admin.hint')</label>
    <input class="form-control" name="placeholder" type="text" id="placeholder"  value="{{ isset($field->placeholder) ? $field->placeholder : ''}}" >

     {!! clean( $errors->first('placeholder', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="control-label">@lang('admin.enabled')</label>
    <select name="enabled" class="form-control" id="enabled" >
    @foreach (json_decode('{"1":"'.__('admin.yes').'","0":"'.__('admin.no').'"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($field->enabled) && $field->enabled == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('enabled', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>