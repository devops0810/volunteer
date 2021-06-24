@extends('layouts.site-page')
@section('pageTitle',$title)
@section('page-title',$title)

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
@endsection


@section('page-content')

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">

                        @foreach($posts as $post)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        @foreach($post->blogCategories as $category)
                                        <a href="{{ route('blog.listing') }}?category={{ $category->id }}">{{ $category->category }},</a>
                                            @endforeach
                                    </div>
                                    <ul class="blog_meta list">
                                        @if($post->user()->exists())
                                        <li>
                                            <a href="#">{{ $post->user->name }}
                                                <i class="lnr lnr-user"></i>
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="#">{{  \Carbon\Carbon::parse($post->published_on)->format('d M, Y') }}
                                                <i class="lnr lnr-calendar-full"></i>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    @if(!empty($post->cover_image))
                                    <img src="{{ asset($post->cover_image) }}" alt="">
                                    @endif
                                    <div class="blog_details">
                                        <a href="{{ route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)]) }}">
                                            <h2>{{ $post->title }}</h2>
                                        </a>
                                        <p>{{ limitLength(strip_tags($post->content),300) }}</p>
                                        <a class="button button-blog" href="{{ route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)]) }}">@lang('saas.view-more')</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach



                        <nav class="blog-pagination justify-content-center d-flex">

                            {!! clean($posts->appends(['q' => Request::get('q'),'category' => Request::get('category')])->render()) !!}
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('site.blog.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection
