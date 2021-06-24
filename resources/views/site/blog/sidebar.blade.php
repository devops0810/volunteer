<div class="blog_right_sidebar">
    <aside class="single_sidebar_widget search_widget">
        <form action="{{ route('blog.listing') }}" class="search-box" method="get">
            <div class="input-group">
                <input name="q" type="text" class="form-control" placeholder="@lang('saas.search')">
                              <span class="input-group-btn">
                                  <button  class="btn btn-default" type="submit">
                                      <i class="lnr lnr-magnifier"></i>
                                  </button>
                              </span>
            </div>
            <!-- /input-group -->
            <div class="br"></div>
        </form>
    </aside>
    <aside class="single_sidebar_widget popular_post_widget">
        <h3 class="widget_title">@lang('saas.recent-posts')</h3>
        @foreach($recent as $post)
            <div class="media post_item">
                @if(!empty($post->cover_image))
                    <img style="max-width: 100px" src="{{ asset($post->cover_image) }}" alt="image" />
                @endif
                <div class="media-body">
                    <a href="{{ route('blog.post',['blogPost'=>$post->id,'slug'=>safeUrl($post->title)]) }}">
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <p>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
        <div class="br"></div>
    </aside>

    <aside class="single_sidebar_widget post_category_widget">
        <h4 class="widget_title">@lang('saas.categories')</h4>
        <ul class="list cat-list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('blog.listing') }}?category={{ $category->id }}" class="d-flex justify-content-between">
                        <p>{{ $category->category }}</p>
                        <p>{{ $category->blogPosts()->whereDate('published_on','<=',\Carbon\Carbon::now()->toDateTimeString())->count() }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="br"></div>
    </aside>
    <form id="nlform" action="{{ route('site.save-email') }}"
          method="post"  >
        @csrf
        <aside class="single-sidebar-widget newsletter_widget">
            <h4 class="widget_title">@lang('saas.newsletter')</h4>
            <p>
                @lang('saas.upto-date')
            </p>

            <div class="form-group d-flex flex-row">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input required name="email" type="text" class="form-control" id="inlineFormInputGroup" placeholder="@lang('saas.email')" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = '@lang('saas.your-email')'">
                </div>
                <a  href="#nlform" onclick="return $('#nlform').submit()" class="bbtns">@lang('saas.subscribe')</a>

            </div>

            <p class="text-bottom">@lang('saas.unsubscribe-text')</p>
            <div class="br"></div>
        </aside>
    </form>
</div>