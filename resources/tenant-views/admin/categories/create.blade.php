@extends('layouts.admin')
@section('pageTitle',__('admin.categories'))

@section('innerTitle')
    @lang('site.create-new') @lang('admin.category')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/categories') }}">@lang('admin.categories')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.category')</span>
    </li>
@endsection

@section('content')

    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/admin/categories') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('admin.categories.form', ['formMode' => 'create'])

            </form>




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