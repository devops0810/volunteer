<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">@lang('saas.subscriber')</label>

    <select required  name="user_id" id="user_id" class="form-control">
        @php
        $userId = old('user_id',isset($invoice->user_id) ? $invoice->user_id : '');
        @endphp

        @if($userId)
            <option selected value="{{ $userId }}">{{ \App\Models\User::find($userId)->name }} ({{ \App\Models\User::find($userId)->email }}) </option>
        @endif
    </select>

    {!! clean( $errors->first('user_id', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('invoice_purpose_id') ? 'has-error' : ''}}">
    <label for="invoice_purpose_id" class="control-label">{{ __('saas.purpose') }}</label>
    <select required  class="form-control" name="invoice_purpose_id" id="invoice_purpose_id">
        @foreach(\App\Models\InvoicePurpose::get() as $invoicePurpose)
            <option @if(old('invoice_purpose_id',isset($invoice->invoice_purpose_id) ? $invoice->invoice_purpose_id : '')==$invoicePurpose->id) selected @endif value="{{ $invoicePurpose->id }}">{{ $invoicePurpose->purpose }}</option>
        @endforeach
    </select>


    {!! clean( $errors->first('invoice_purpose_id', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group item {{ $errors->has('item_id') ? 'has-error' : ''}}">
    <label for="item_id" class="control-label">@lang('saas.item')</label>

    <select required  class="form-control" name="item_id" id="item_id">
        <option value=""></option>
        @foreach(\App\Models\PackageDuration::get() as $package)
            <option @if(old('item_id',isset($invoice->item_id) ? $invoice->item_id : '')==$package->id) selected @endif value="{{ $package->id }}">{{ $package->package->name }} ({{ ($package->type=='m')? __('saas.monthly'):__('saas.annual') }}) - {{ price($package->price) }}</option>
        @endforeach
    </select>

    {!! clean( $errors->first('item_id', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
    <label for="amount" class="control-label">@lang('saas.amount')</label>
    <input required class="form-control digit" name="amount" type="text" id="amount" value="{{ old('amount',isset($invoice->amount) ? $invoice->amount : '') }}" >
    {!! clean( $errors->first('amount', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('paid') ? 'has-error' : ''}}">
    <label for="paid" class="control-label">@lang('saas.paid')</label>
    <select name="paid" class="form-control" id="paid" >
    @foreach (json_decode('{"0":"No","1":"Yes"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ ((null !== old('paid',@$invoice->paid)) && old('invoice',@$invoice->paid) == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! clean( $errors->first('paid', '<p class="help-block">:message</p>')) !!}
</div>

<div class="form-group {{ $errors->has('payment_method_id') ? 'has-error' : ''}}">
    <label for="payment_method_id" class="control-label">@lang('saas.payment-method')</label>
    <select  class="form-control" name="payment_method_id" id="payment_method_id">
        <option value=""></option>
        @foreach(\App\Models\PaymentMethod::get() as $paymentMethod)
            <option @if(old('payment_method_id',isset($invoice->payment_method_id) ? $invoice->payment_method_id : '')==$paymentMethod->id) selected @endif value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
        @endforeach
    </select>

    {!! clean( $errors->first('payment_method_id', '<p class="help-block">:message</p>')) !!}
</div>


<div class="form-group {{ $errors->has('currency_id') ? 'has-error' : ''}}">
    <label for="currency_id" class="control-label">@lang('saas.currency')</label>

    <select required  class="form-control" name="currency_id" id="currency_id">
        @foreach(\App\Models\Currency::get() as $currency)
            <option @if(old('currency_id',isset($invoice->currency_id) ? $invoice->currency_id : '')==$currency->id) selected @endif value="{{ $currency->id }}">{{ $currency->country->currency_name }} ({{ $currency->country->currency_code }})</option>
        @endforeach
    </select>


    {!! clean( $errors->first('currency_id', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('due_date') ? 'has-error' : ''}}">
    <label for="due_date" class="control-label">@lang('saas.due-date')</label>
    <input class="form-control date" name="due_date" type="text" id="due_date" value="{{ old('due_date',isset($invoice->due_date) ? $invoice->due_date : '') }}" >
    {!! clean( $errors->first('due_date', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('expires') ? 'has-error' : ''}}">
    <label for="expires date" class="control-label">@lang('saas.expires')</label>
    <input class="form-control date" name="expires" type="text" id="expires" value="{{ old('expires',isset($invoice->expires) ? $invoice->expires : '') }}" >
    {!! clean( $errors->first('expires', '<p class="help-block">:message</p>')) !!}
</div>
<div class="form-group {{ $errors->has('extra') ? 'has-error' : ''}}">
    <label for="extra" class="control-label">@lang('saas.notes')</label>
    <input class="form-control" name="extra" type="text" id="extra" value="{{ old('extra',isset($invoice->extra) ? $invoice->extra : '') }}" >
    {!! clean( $errors->first('extra', '<p class="help-block">:message</p>')) !!}
</div>
@if($formMode=='create')
    <div class="form-group">
        <input type="checkbox" name="notify" value="1"/> <label for="notify">@lang('saas.notify-user')</label>
    </div>
    
    @endif

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? __('saas.update') : __('saas.create') }}">
</div>
