<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">@lang('saas.name')</label>
    <input required class="form-control" name="name" type="text" id="name" value="{{ old('name',isset($subscriber->name) ? $subscriber->name : '') }}" >
    {!! clean( $errors->first('name', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">@lang('saas.email')</label>
    <input required  class="form-control" name="email" type="text" id="email" value="{{ old('email',isset($subscriber->email) ? $subscriber->email : '') }}" >
    {!! clean( $errors->first('email', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">@if($formMode=='edit') @lang('saas.change') @endif @lang('saas.password')</label>
    <input @if($formMode=='create')  required @endif class="form-control" name="password" type="password" id="password" value="{{ old('password') }}" >
    {!! clean( $errors->first('password', '<p class="help-block">:message</p>')) !!}
</div>
@if($formMode=='create')
<div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    <label for="username" class="control-label">@lang('saas.username')</label>
    <input required  class="form-control" name="username" type="text" id="username" value="{{ old('username',isset($subscriber->username) ? $subscriber->username : '') }}" >
    {!! clean( $errors->first('username', '<p class="help-block">:message</p>')) !!}
</div>
@endif

@if($formMode=='edit')
<div class="form-group {{ $errors->has('expires') ? 'has-error' : ''}}">
    <label for="expires" class="control-label">@lang('saas.expires')</label>
    <input required  class="form-control date" name="expires" type="text" id="expires" value="{{ old('expires',isset($expires) ? $expires : '') }}" >
    {!! clean( $errors->first('expires', '<p class="help-block">:message</p>')) !!}
</div>
@endif

<div class="form-group {{ $errors->has('package_duration_id') ? 'has-error' : ''}}">
    <label for="package_duration_id" class="control-label">@lang('saas.plan')</label>
    <select required  class="form-control" name="package_duration_id" id="package_duration_id">
        <option value=""></option>
        @foreach($packages as $package)
            <option @if(old('package_duration_id',isset($plan) ? $plan : '')==$package->id) selected @endif value="{{ $package->id }}">{{ $package->package->name }} ({{ ($package->type=='m')? __('saas.monthly'):__('saas.annual') }}) - {{ price($package->price) }}</option>
        @endforeach
    </select>
   
    {!! clean( $errors->first('package_duration_id', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group {{ $errors->has('currency_id') ? 'has-error' : ''}}">
    <label for="currency_id" class="control-label">@lang('saas.currency')</label>
    <select required  class="form-control" name="currency_id" id="currency_id">
        <option value=""></option>
        @foreach(\App\Models\Currency::get() as $currency)
            <option @if(old('currency_id',isset($currencyId) ? $currencyId : '')==$currency->id) selected @endif value="{{ $currency->id }}">{{ $currency->country->currency_name }} ({{ $currency->country->currency_code }})</option>
        @endforeach
    </select>

    {!! clean( $errors->first('currency_id', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group {{ $errors->has('trial') ? 'has-error' : ''}}">
    <label for="trial" class="control-label">@lang('saas.trial')</label>
    <select required  name="trial" class="form-control" id="trial" >
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('trial',@$subscriber->trial)) && old('subscriber',@$subscriber->trial) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('trial', '<p class="help-block">:message</p>')) !!}
</div>





@if($formMode=='create')
    <div class="form-group {{ $errors->has('general_site_name') ? 'has-error' : ''}}">
        <label for="general_site_name" class="control-label">@lang('settings.general_site_name')</label>
        <input required  class="form-control" name="general_site_name" type="text" id="general_site_name" value="{{ old('general_site_name',isset($subscriber->general_site_name) ? $subscriber->general_site_name : '') }}" >
        {!! clean( $errors->first('general_site_name', '<p class="help-block">:message</p>')) !!}
    </div>


    <div class="form-group {{ $errors->has('general_tel') ? 'has-error' : ''}}">
        <label for="general_tel" class="control-label">@lang('settings.general_tel')</label>
        <input required  class="form-control" name="general_tel" type="text" id="general_tel" value="{{ old('general_tel',isset($subscriber->general_tel) ? $subscriber->general_tel : '') }}" >
        {!! clean( $errors->first('general_tel', '<p class="help-block">:message</p>')) !!}
    </div>

@endif

<div class="form-group {{ $errors->has('enabled') ? 'has-error' : ''}}">
    <label for="enabled" class="control-label">@lang('saas.enabled')</label>
    <select required  name="enabled" class="form-control" id="enabled" >
        @foreach (json_decode('{"1":"Yes","0":"No"}', true) as $optionKey => $optionValue)
            <option value="{{ $optionKey }}" {{ ((null !== old('enabled',@$subscriber->enabled)) && old('subscriber',@$subscriber->enabled) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
        @endforeach
    </select>
    {!! clean( $errors->first('enabled', '<p class="help-block">:message</p>')) !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
