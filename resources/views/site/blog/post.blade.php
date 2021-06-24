@extends('layouts.site-page')
@section('pageTitle',$post->title)
@section('page-title',$post->title)
@section('header')
    @if(!empty($post->cover_image))
    <meta property="og:image" content="{{ asset($post->cover_image) }}">
    @endif
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('blog.listing') }}">@lang('saas.blog')</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
@endsection


@section('page-content')

    <!--================Blog Area =================-->
    <section class="blog_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                @if(!empty($post->cover_image))
                                    <img class="img-fluid"  src="{{ asset($post->cover_image) }}" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3">
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
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $post->title }}</h2>
                            <p>
                                {!! clean($post->content) !!}
                            </p>
                        </div>
                    </div>
                    @if(!empty(setting('general_disqus_shortcode')))
                    <div class="comments-area">
                        <script type="text/javascript">
                            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                            var disqus_shortname = '{{ setting('general_disqus_shortcode') }}'; // required: replace example with your forum shortname

                            /* * * DON'T EDIT BELOW THIS LINE * * */
                            (function () {
                                var s = document.createElement('script'); s.async = true;
                                s.type = 'text/javascript';
                                s.src = '//' + disqus_shortname + '.disqus.com/count.js';
                                (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
                            }());
                        </script>
                    </div>
                    @endif

                </div>
                <div class="col-lg-4">
                    @include('site.blog.sidebar')
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->


@endsection
