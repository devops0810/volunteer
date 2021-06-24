@extends('layouts.admin')
@section('pageTitle',__('admin.departments'))

@section('innerTitle')
    @lang('site.create-new')  {{  ucfirst(__('admin.department')) }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/departments') }}">@lang('admin.departments')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') {{  ucfirst(__('site.department')) }}</span>
    </li>
@endsection

@section('content')


    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form method="POST" action="{{ url('/admin/departments') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">

                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#description">@lang('admin.details')</a></li>
                            <li><a href="#reviews"> @lang('admin.categories')</a></li>
                            <li><a href="#INFORMATION">@lang('admin.cover-photo')</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="description">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="product-payment-inner-st">

                                                {{ csrf_field() }}

                                                @include ('admin.departments.form', ['formMode' => 'create'])



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="reviews">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 50px">

                                                    @foreach(\App\Category::get() as $category)
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" name="cat_{{ $category->id }}" value="{{ $category->id }}"> {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
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
                                                        <label for="picture" class="control-label">@lang('admin.picture')</label>

                                                        <input  class="form-control-file"  type="file" name="picture"/>

                                                        {!! clean( $errors->first('picture', '<p class="help-block">:message</p>')) !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-content">
                            <input class="btn btn-primary " type="submit" value="@lang('admin.create')">
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