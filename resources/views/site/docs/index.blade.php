@extends('layouts.doc')
@section('pageTitle','Table Of Contents')
@section('content')

    @foreach(\App\Models\HelpCategory::orderBy('sort_order')->get() as $category)

            <div class="panel panel-color panel-inverse">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $category->name }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                        @foreach($category->helpPosts()->where('status',1)->orderBy('sort_order')->get(['title','id']) as $post)
                            <li>{{ $post->sort_order }}. <a href="{{ route('docs.post',['id'=>$post->id,'slug'=>safeUrl($post->title)]) }}">{{ $post->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>



    @endforeach

    @endsection