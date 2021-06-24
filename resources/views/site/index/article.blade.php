@extends('layouts.site-page')
@section('pageTitle',empty($article->meta_title)? $article->page_title:$article->meta_title)
@section('page-title',$article->page_title)
@section('pageMetaDesc',$article->meta_description)

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ $article->menu_title }}</li>
@endsection


@section('page-content')
    {!! clean($article->content) !!}


@endsection
