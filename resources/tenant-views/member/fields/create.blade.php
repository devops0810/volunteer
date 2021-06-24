@extends('layouts.member')
@section('pageTitle','Fields')

@section('innerTitle')
    @lang('site.create-new') @lang('admin.field')
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/fields') }}">@lang('admin.fields')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.create-new') @lang('admin.field')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/member/fields') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include ('member.fields.form', ['formMode' => 'create'])

            </form>




            </div>
        </div>


    </div>

@endsection

@include('member.fields.formlogic')