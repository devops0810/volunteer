<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('saas.name')</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($admin->name) ? $admin->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">@lang('saas.email')</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ old('email',isset($admin->email) ? $admin->email : '') }}" >
    {!! clean( $errors->first('email', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">@if($formMode=='edit') @lang('saas.change')  @endif @lang('saas.password')</label>
    <input class="form-control" name="password" type="text" id="password" value="{{ old('password') }}" >
    {!! clean( $errors->first('password', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="control-label">@lang('saas.enabled')</label>
    <select name="enabled" class="form-control" id="enabled" >
    @foreach (json_decode('{"1":"Yes","0":"No"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('enabled',@$admin->enabled)) && old('admin',@$admin->enabled) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('enabled', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
