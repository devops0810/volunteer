@extends('layouts.doc')
@section('pageTitle',$category->name)
    @section('content')

        <div class="panel panel-color panel-inverse">

            <div class="panel-body">
                <ul class="list-unstyled">
                    @foreach($category->helpPosts()->where('status',1)->orderBy('sort_order')->get(['title','id']) as $post)
                        <li>{{ $post->sort_order }}. <a href="{{ route('docs.post',['id'=>$post->id,'slug'=>safeUrl($post->title)]) }}">{{ $post->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endsection
@section('breadcrumb')
    <li><a href="{{ route('docs.index') }}">Table Of Contents</a></li>
    <li class="active">{{ $category->name }}</li>

@endsection