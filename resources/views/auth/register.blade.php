@extends('layouts.auth')
@section('pageTitle',__('saas.signup'))

@section('content')

    <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary shadow border-0">
                <div class="card-body px-lg-5 py-lg-5">
                    <div class="text-center text-muted mb-4">
                        <h3>@lang('saas.signup')</h3>
                        <small>

                        </small>
                    </div>
                    <form role="form"  method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                </div>
                                <input required  class="form-control @error('name') is-invalid @enderror" placeholder="@lang('saas.name')" name="name" type="text">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="input-group input-group-alternative">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                </div>
                                <input  required class="form-control @error('email') is-invalid @enderror" placeholder="@lang('saas.email')" name="email" type="email">
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
                                <input required  class="form-control @error('password') is-invalid @enderror" placeholder="@lang('saas.password')" name="password" type="password">
                                @error('password')
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
                                <input required  class="form-control" placeholder="@lang('saas.confirm-password')" name="password_confirmation" type="password">

                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary my-4">@lang('saas.signup')</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mt-3">

                <div class="col-6">
                    <a href="{{ url('/login') }}" class="text-light"><small>@lang('saas.login-msg')</small></a>
                </div>
            </div>
        </div>
    </div>

@endsection