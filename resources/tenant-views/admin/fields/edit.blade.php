@extends('layouts.admin')
@section('pageTitle',__('admin.field'))

@section('innerTitle')
    @lang('site.edit') @lang('admin.field') : {{ $field->name }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/fields') }}">@lang('admin.fields')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.edit') @lang('admin.field')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/admin/fields/' . $field->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.fields.form', ['formMode' => 'edit'])

            </form>




        </div>
    </div>


    </div>

@endsection

@include('admin.fields.formlogic')