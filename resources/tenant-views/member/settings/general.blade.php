@extends('layouts.member')
@section('pageTitle',__('admin.department-settings'))

@section('innerTitle')
    @lang('admin.department-settings')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.department-settings')</span>
    </li>
@endsection

@section('content')


    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="POST" action="{{ route('member.settings.save-settings') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">@lang('admin.details')</a></li>
                                <li><a href="#INFORMATION">@lang('admin.cover-photo')</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="product-payment-inner-st">



                                                @include ('member.settings.form', ['formMode' => 'create'])



                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="INFORMATION">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section form-content">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
                                                            <label for="picture" class="control-label">@lang('admin.change') @lang('admin.picture')</label>

                                                            <input  class="form-control-file"  type="file" name="picture"/>

                                                            {!! clean( $errors->first('picture', '<p class="help-block">:message</p>')) !!}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        @if($department->picture)
                                                            <div>
                                                                <img class="img-responsive" src="{{ asset($department->picture) }}" alt=""/>
                                                            </div><br/>
                                                            <a class="btn btn-danger" href="{{ route('member.settings.remove-picture') }}"><i class="fa fa-trash"></i> @lang('admin.delete') @lang('admin.picture')</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-content">
                                <input class="btn btn-primary btn-block btn-lg" type="submit" value="@lang('admin.update')">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



@endsection

@section('footer')
    <script src="{{ asset('themes/main/js/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('themes/main/js/summernote/summernote-active.js') }}"></script>

@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('themes/main/css/summernote/summernote.css') }}">
@endsection