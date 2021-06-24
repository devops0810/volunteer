@extends('layouts.member')
@section('pageTitle',__('admin.downloads'))

@section('innerTitle')
    @lang('site.edit') @lang('admin.download') #{{ $download->id }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/member/downloads') }}">@lang('admin.downloads')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.edit') @lang('admin.download')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <form method="POST" action="{{ url('/member/downloads/' . $download->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}

                @include ('member.downloads.form', ['formMode' => 'edit'])

            </form>




        </div>
    </div>


    </div>

@endsection