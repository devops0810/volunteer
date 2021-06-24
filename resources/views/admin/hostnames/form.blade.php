<div class="form-group {{ $errors->has('fqdn') ? 'has-error' : ''}}">
    <label for="fqdn" class="control-label">@lang('saas.domain')</label>
    <input placeholder="user.example.com" class="form-control" name="fqdn" type="text" id="fqdn" value="{{ old('fqdn',isset($hostname->fqdn) ? $hostname->fqdn : '') }}" >
    {!! clean( $errors->first('fqdn', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('redirect_to') ? 'has-error' : ''}}">
    <label for="redirect_to" class="control-label">{{ 'Redirect To' }}</label>
    <input class="form-control" name="redirect_to" type="text" id="redirect_to" value="{{ old('redirect_to',isset($hostname->redirect_to) ? $hostname->redirect_to : '') }}" >
    {!! clean( $errors->first('redirect_to', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('force_https') ? 'has-error' : ''}}">
    <label for="force_https" class="control-label">{{ 'Force Https' }}</label>
    <select name="force_https" class="form-control" id="force_https" >
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('force_https',@$hostname->force_https)) && old('hostname',@$hostname->force_https) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('force_https', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
