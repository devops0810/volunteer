@extends('layouts.admin')
@section('pageTitle',__('admin.language'))

@section('innerTitle')
    @lang("admin.language")
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.language')</span>
    </li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('admin.set-language')</h3>
                        </div>
                        <div class="panel-body">



                            <form class="form-inline_" method="post" action="{{ route('settings.save-language') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="config_language">@lang('admin.language')</label>
                                    <select class="form-control" name="config_language" id="sms_max_pages">
                                        @foreach($languages as $value)
                                            <option @if(old('config_language',setting('config_language'))==$value) selected @endif value="{{ $value }}">{{ $controller->languageName($value) }} ({{ $value }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </form>


                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection
@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('select').select2();
        });
    </script>
@endsection

