<div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
    <label for="country_id" class="control-label">@lang('saas.country')/@lang('saas.currency')</label>
   <select required  class="form-control select2" name="country_id" id="country_id">
        <option value=""></option>
        @foreach(\App\Models\Country::get() as $country)
            <option @if(old('country_id',isset($currency->country_id) ? $currency->country_id : '')==$country->id) selected @endif value="{{ $country->id }}">{{ $country->name }} / {{ $country->currency_name }}</option>
        @endforeach
    </select>


    {!! clean( $errors->first('country_id', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group {{ $errors->has('exchange_rate') ? 'has-error' : ''}}">
    <label for="exchange_rate" class="control-label">@lang('saas.exchange-rate')</label>
    <input class="form-control digit" name="exchange_rate" type="text" id="exchange_rate" value="{{ old('exchange_rate',isset($currency->exchange_rate) ? $currency->exchange_rate : '') }}" >
    {!! clean( $errors->first('exchange_rate', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('is_default') ? 'has-error' : ''}}">
    <label for="is_default" class="control-label">@lang('saas.is-default')</label>
    <select name="is_default" class="form-control" id="is_default" >
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('is_default',@$currency->is_default)) && old('currency',@$currency->is_default) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('is_default', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
