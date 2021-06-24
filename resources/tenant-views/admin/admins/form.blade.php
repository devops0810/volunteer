<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('admin.name')</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ old('admin',isset($admin->name) ? $admin->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">@lang('admin.email')</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ old('admin',isset($admin->email) ? $admin->email : '') }}" >
    {!! clean( $errors->first('email', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">@lang('admin.password')</label>
    <input class="form-control" name="password" type="password" id="password" value="{{ old('admin',isset($admin->password) ? $admin->password : '') }}" >
    {!! clean( $errors->first('password', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
    <label for="gender" class="control-label">@lang('admin.gender')</label>
    <select name="gender" class="form-control" id="gender" >
    @foreach (json_decode('{"m":"Male","f":"Female"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('admin',@$admin->gender)) && old('admin',@$admin->gender) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('gender', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
    <label for="status" class="control-label">@lang('admin.status')</label>
    <select name="status" class="form-control" id="status" >
    @foreach (json_decode('{"1":"'.__('admin.enabled').'","2":"'.__('admin.disabled').'"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('admin',@$admin->status)) && old('admin',@$admin->status) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('status', '<p class="help-block">:message</p>')) !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('site.update') : __('site.create') }}">
</div>