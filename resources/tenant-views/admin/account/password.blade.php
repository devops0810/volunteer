@extends('layouts.site')
@section('pageTitle',__('admin.change-password'))

@section('innerTitle')
    @lang('admin.change-password')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.change-password')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


                <form id="sendForm" method="post" action="{{ route('account.save-password') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
                        <label for="password" class="control-label">@lang('admin.password')

                        </label>
                        <input  required class="form-control" name="password" type="password" id="password" value="{{ old('password')  }}" >
                        {!! clean( $errors->first('password', '<p class="help-block">:message</p>')) !!}
                    </div>



                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
                        <label for="password_confirmation" class="control-label">@lang('admin.confirm-password')

                        </label>
                        <input  required  class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ old('password_confirmation')  }}" >
                        {!! clean( $errors->first('password_confirmation', '<p class="help-block">:message</p>')) !!}
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="{{  __('site.update') }}">
                    </div>


                </form>




            </div>
        </div>


    </div>

@endsection
