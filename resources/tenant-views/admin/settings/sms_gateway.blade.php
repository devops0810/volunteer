@extends('layouts.admin')
@section('pageTitle',__('admin.sms-settings'))

@section('innerTitle')
    @lang("admin.sms-settings")
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.sms-settings')</span>
    </li>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('admin.sms') @lang('admin.settings')</h3>
                        </div>
                        <div class="panel-body">



                            <form class="form-inline_" method="post" action="{{ route('settings.save-sms-setting') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="sms_max_pages">@lang('admin.sms-pages')</label>
                                    <select class="form-control" name="sms_max_pages" id="sms_max_pages">
                                        @foreach(range(1,6) as $value)
                                            <option @if(old('sms_max_pages',setting('sms_max_pages'))==$value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                            </form>


                        </div>
                    </div>



                    <div class="panel panel-default regular-panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">@lang('admin.sms-gateways')
                            @if(\App\SmsGateway::where('active',1)->count()>0)
                                : {{ \App\SmsGateway::where('active',1)->first()->gateway_name }}
                                @endif
                                </h3>
                        </div>
                        <div class="panel-body  admin-panel-content animated bounce">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>@lang('admin.name')</th>
                                        <th>
                                            @lang('admin.active')
                                        </th>
                                        <th>@lang('admin.url')</th>
                                        <th>@lang('admin.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($smsGateways as $gateway)
                                <tr>
                                    <td>{{ $gateway->gateway_name }}</td>
                                    <td>{{ boolToString($gateway->active) }}</td>
                                    <td><a target="_blank" href="{{ $gateway->url }}">{{ $gateway->url }}</a></td>
                                    <td>  @if($gateway->active==0)
                                        <a  class="btn btn-primary" href="{{ route('settings.sms-status',['smsGateway'=>$gateway->id,'status'=>1]) }}">@lang('admin.install')</a>
                                        @else
                                            <a class="btn btn-success" href="{{ route('settings.edit-sms-gateway',['smsGateway'=>$gateway->id]) }}">@lang('admin.edit')</a>
                                        <a  class="btn btn-danger" href="{{ route('settings.sms-status',['smsGateway'=>$gateway->id,'status'=>0]) }}">@lang('admin.uninstall')</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div>{!! clean( $smsGateways->links()) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection