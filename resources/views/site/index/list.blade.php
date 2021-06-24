@extends('layouts.site-page')
@section('pageTitle',__('saas.mailing-list'))
@section('page-title',__('saas.mailing-list'))

    @section('breadcrumb')
        <li class="breadcrumb-item active" aria-current="page">@lang('saas.mailing-list')</li>
        @endsection


@section('page-content')
    @if(Session::has('flash_message'))
        {{ Session::get('flash_message') }}
        @else
    @lang('saas.email-saved')
    @endif


@endsection
