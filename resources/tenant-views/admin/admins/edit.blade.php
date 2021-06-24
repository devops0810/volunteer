@extends('layouts.admin')
@section('pageTitle','Admins')

@section('innerTitle')
    @lang('site.edit') admin #{{ $admin->id }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/admins') }}">Admins</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.edit') admin</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/admin/admins/' . $admin->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('admin.admins.form', ['formMode' => 'edit'])

            </form>




        </div>
    </div>


    </div>

@endsection