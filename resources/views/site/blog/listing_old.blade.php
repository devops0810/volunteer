@extends('layouts.site')

@section('pageTitle','Blog')
@section('title','Blog')
@section('pageSummary',$title)

@section('content')

    <!-- ==============================================
                      **BLOG LIST**
 =============================================== -->
    <section class="blog blog-style-1 ptb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    @foreach($posts as $post)
                    <div class="blog-post-wrapper ptb-20">
                        <div class="blog-post">
                            @if(!empty($post->cover_image))
                            <figure class="blog-post-image">
                                <img src="{{ $post->cover_image }}" alt="image" />
                            </figure>
                            @endif
                            <div class="blog-post-description">
                                <h4>{{ $post->title }}</h4>
                                <p>{!! clean( substr(strip_tags($post->content),0,250)) !!}@if(strlen(strip_tags($post->content))>250)...
                                    @endif</p>
                                <a href="{{ route('blog.post',['blogPost'=>$post->id]) }}" class="btn btn-theme-color">Read More</a>
                            </div>
                                <div class="blog-post-tools">
                                    <i class="icon">
                                        <i class="ti-calendar"></i>
                                        <span>{{  \Carbon\Carbon::parse($post->published_on)->format('d M Y') }}</span>
                                    </i>

                                </div>

                        </div>
                    </div>
                    @endforeach
                    <nav class="pagination-container">
                        {{ $posts->links() }}
                    </nav>


                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="sidebar mt-20">
                        <h2 class="sidebar-heading">Search</h2>
                        <form action="{{ route('blog.search') }}" class="search-box" method="get">
                            <div class="input-group">
                                <input type="text" name="q" class="form-control" placeholder="Search blog..." value="{{ @$_GET['q'] }}">
                                    <span class="input-group-btn">
                                        <button class="btn btn-theme-color" type="submit"><i class="ti-search"></i></button>
                                    </span>
                            </div><!-- /input-group -->
                        </form>
                        <h2 class="sidebar-heading">Recent Posts</h2>
                        <ul>
                            @foreach($recent as $post)
                            <li>
                                <a href="{{ route('blog.post',['blogPost'=>$post->id]) }}">
                                    @if(!empty($post->cover_image))
                                    <img src="{{ $post->cover_image }}" alt="image" />
                                    @endif
                                    <h3>{{ $post->title }}</h3>
                                    <span><i class="fa fa-calendar"></i> {{  \Carbon\Carbon::parse($post->published_on)->format('d M Y') }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </div>

                </div>
            </div>
        </div><!-- End Container -->
    </section><!-- End Section -->
@endsection