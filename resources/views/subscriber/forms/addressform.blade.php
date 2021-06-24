@extends('layouts.account-page')
@section('page-content')
    <a href="{{ url('/account/billing-address') }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
    <br />
    <br />
    <div class="card-box">

        <form method="post" class="form"  action="@yield('route')">
            {{ csrf_field() }}
            @yield('method')

            <div class="form-group">
                <label for="name">@lang('saas.name')</label>
                <input name="name" required="required" type="text"  class="form-control" value="{{ old('name',@$name) }}"/>
            </div>
            <div class="form-group">
                <label for="phone">@lang('saas.telephone')</label>
                <input placeholder="@lang('saas.max-tel')" name="phone" required="required" type="text"  class="form-control" value="{{ old('name',@$phone) }}"/>
            </div>

            <div class="form-group">
                <label for="address">@lang('saas.address')</label>
                <input name="address" required="required"  class="form-control" type="text" value="{{ old('address',@$address) }}"/>
            </div>
            <div class="form-group">
                <label for="address2">@lang('saas.address_2')</label>
                <input name="address2"   class="form-control" type="text" value="{{ old('address2',@$address2) }}"/>
            </div>

            <div class="form-group">
                <label for="city">@lang('saas.city')</label>
                <input name="city" required="required" type="text"  class="form-control" value="{{ old('city',@$city) }}"/>
            </div>

            <div class="form-group">
                <label for="state">@lang('saas.state')</label>
                <input name="state" required="required" type="text"  class="form-control" value="{{ old('state',@$state) }}"/>
            </div>
            <div class="form-group">
                <label for="zip">@lang('saas.zip')</label>
                <input name="zip" type="text"  class="form-control" value="{{ old('zip',@$zip) }}"/>
            </div>
            <div class="form-group">
                <label for="country_id">@lang('saas.country')</label>
                {{ Form::select('country_id', $countries,@$country_id,['placeholder' => 'Select an option...','class'=>'form-control','required'=>'required','id'=>'country_id']) }}

            </div>

            <div class="form-group">
                <label for="default">@lang('saas.default')</label>
                {{ Form::select('is_default', [1=>'Yes',0=>'No'],@$default,['class'=>'form-control','required'=>'required','id'=>'default']) }}

            </div>

            <button type="submit" class="btn btn-primary">@lang('saas.submit')</button>
        </form>

    </div>
@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('#country_id').select2();
        });
    </script>
@endsection
