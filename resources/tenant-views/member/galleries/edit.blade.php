@extends('layouts.member')
@section('pageTitle',__('admin.gallery'))

@section('innerTitle')
    @lang('site.edit') gallery #{{ $gallery->id }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/galleries') }}">@lang('admin.gallery')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.edit') @lang('admin.gallery')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/member/galleries/' . $gallery->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('member.galleries.form', ['formMode' => 'edit'])

            </form>




        </div>
    </div>


    </div>

@endsection