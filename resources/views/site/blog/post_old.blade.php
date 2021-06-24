@extends('layouts.site')

@section('pageTitle','Blog')
@section('title',$blogPost->title)
@section('pageSummary',$blogPost->title)
@section('header')
    <meta property="og:image" content="{{ $blogPost->cover_image }}">
@endsection


@section('content')

    <!-- ==============================================
                              **BLOG LIST**
         =============================================== -->
    <section class="blog blog-style-1 ptb-80">
        <div class="container">
            <div class="row">

                <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
                    <div class="blog-post-wrapper ptb-20">
                        <div class="blog-post">
                            @if(!empty($blogPost->cover_image))
                            <figure class="blog-post-image">
                                <img src="{{ $blogPost->cover_image }}" alt="image" />
                            </figure>
                            @endif

                            <div class="blog-post-description">
                                <h4>{{ $blogPost->title }}</h4>
                                {!! clean( iconv("UTF-8","ISO-8859-1//IGNORE",iconv("UTF-8","ISO-8859-1//IGNORE",iconv("UTF-8","ISO-8859-1//IGNORE",$blogPost->content)))) !!}
                            </div>
                            <div class="blog-post-tools">
                                <i class="icon">
                                    <span><i class="fa fa-calendar"></i> {{ date('d M Y',$blogPost->published_on) }}</span>
                                </i>

                            </div>
                            <div class="clearfix"></div>

                            <hr>
                            <!-- comments -->
                            <section class="comment-list">

                                <div id="disqus_thread"></div>
                                <script>

                                    /**
                                     *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                     *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                    /*
                                     var disqus_config = function () {
                                     this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                     this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                     };
                                     */
                                    (function() { // DON'T EDIT BELOW THIS LINE
                                        var d = document, s = d.createElement('script');
                                        s.src = 'https://traineasy.disqus.com/embed.js';
                                        s.setAttribute('data-timestamp', +new Date());
                                        (d.head || d.body).appendChild(s);
                                    })();
                                </script>
                                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                            </section><!-- end comments -->


                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Container -->
    </section><!-- End Section -->
@endsection