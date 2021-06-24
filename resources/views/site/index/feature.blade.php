@extends('layouts.site-page')
@section('pageTitle',empty($feature->meta_title)? $feature->page_title:$feature->meta_title)
@section('page-title',$feature->page_title)
    @section('pageMetaDesc',$feature->meta_description)

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ $feature->menu_title }}</li>
@endsection


@section('page-content')
    {!! clean($feature->content) !!}


@endsection
