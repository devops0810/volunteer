@extends('layouts.doc')
@section('pageTitle','Search Results: '.$q)
@section('content')
    @if($posts->count()==0)
        <p>
            <h2>@lang('saas.no-results')</h2>
        </p>
        @else
        <ul>
            @foreach($posts as $post)
                <li><h3 style="margin-bottom: 0px; padding-bottom: 0px"><a href="{{ route('docs.post',['id'=>$post->id,'slug'=>safeUrl($post->title)]) }}">{{ $post->title }}</a></h3>

                </li>
                @endforeach
        </ul>

    @endif
    @endsection
{{ $posts->links() }}