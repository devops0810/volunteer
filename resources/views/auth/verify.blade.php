@extends('layouts.auth')
@section('pageTitle',__('saas.verify-email'))
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('saas.verify-email')</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            @lang('saas.fresh-link')
                        </div>
                    @endif

                    @lang('saas.before-proceeding')
                    @lang('saas.no-mail'), <a href="{{ route('verification.resend') }}">@lang('saas.request-another')</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
