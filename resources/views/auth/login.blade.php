@extends('layouts.auth')
@section('pageTitle',__('saas.login'))

@section('content')

    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7">

            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h3>@lang('saas.login')</h3>
                        <small>

                        </small>

                    </div>
                    <form role="form"  method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input id="login_email" required class="form-control" placeholder="@lang('saas.email')" name="email" type="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                </div>
                                <input id="login_password" required  class="form-control" placeholder="@lang('saas.password')" name="password" type="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="custom-control custom-control-alternative custom-checkbox">
                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="custom-control-label" for=" customCheckLogin">
                                <span class="text-muted">@lang('saas.remember-me')</span>
                            </label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">@lang('saas.signin')</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-light"><small>@lang('saas.forgot-password')</small></a>
                    @endif
                </div>
                <div class="col-6 text-right">
                    <a href="{{ url('/register') }}" class="text-light"><small>@lang('saas.create-account')</small></a>
                </div>
            </div>
        </div>
    </div>

@endsection