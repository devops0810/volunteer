<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('pageTitle',setting('general_homepage_title'))</title>

    <meta name="description" content="@yield('pageMetaDesc',setting('general_homepage_meta_desc'))">
     
    @if(!empty(setting('image_icon')))
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(setting('image_icon')) }}">
    @endif

    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/linericon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/owl-carousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/parason/vendors/owl-carousel/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('themes/parason/css/style.css') }}">
    @yield('header')

    {!! setting('general_header_scripts') !!}

</head>
<body>
<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="{{ url('/') }}">
                    @if(!empty(setting('image_logo')))
                        <img src="{{ asset(setting('image_logo')) }}"   >
                    @else
                        <h1>{{ setting('general_site_name') }}</h1>
                    @endif
                
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-end">
                        <li class="nav-item active"><a class="nav-link" href="{{ route('homepage') }}">@lang('saas.home')</a></li>

                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false">@lang('saas.features')</a>
                            <ul class="dropdown-menu">
                                @foreach(\App\Models\Feature::orderBy('sort_order')->get() as $feature)
                                <li class="nav-item"><a class="nav-link" href="{{ route('site.feature',['feature'=>$feature->id,'slug'=>safeUrl($feature->page_title)]) }}">{{ $feature->menu_title }}</a></li>
                                 @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('site.pricing') }}">@lang('saas.pricing')</a>
                        <li class="nav-item"><a class="nav-link" href="{{ route('docs.index') }}">@lang('saas.docs')</a>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog.listing') }}">@lang('saas.blog')</a>

                        <li class="nav-item"><a class="nav-link" href="{{ route('site.contact') }}">@lang('saas.contact')</a></li>
                        @guest
                        <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">@lang('saas.login')</a>
                        @else
                            <li class="nav-item"><a class="nav-link"   href="#"
                                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">@lang('saas.logout')</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        @endguest
                    </ul>

                    <ul class="navbar-right">
                        <li class="nav-item">
                            @guest
                            <a  class="button button-header bg" href="{{ url('/register') }}">@lang('saas.signup')</a>
                            @else
                                <a  class="button button-header bg" href="{{ route('home') }}">@lang('saas.my-account')</a>
                                @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->



@yield('content')



<!-- ================ start footer Area ================= -->
<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">

            @foreach(\App\Models\ArticleCategory::orderBy('sort_order')->get() as $category)
            <div class="col-xl-2 col-sm-6 mb-4 mb-xl-0 single-footer-widget">
                <h4>{{ $category->name }}</h4>
                <ul>
                    @foreach($category->articles()->orderBy('sort_order')->get() as $article)
                    <li><a href="{{ route('site.article',['article'=>$article->id,'slug'=>safeUrl($article->page_title)]) }}">{{ $article->menu_title }}</a></li>
                    @endforeach
                </ul>
            </div>
            @endforeach

            <div class="col-xl-4 col-md-8 mb-4 mb-xl-0 single-footer-widget">
                <h4>@lang('saas.newsletter')</h4>
                <p>@lang('saas.trust-us')</p>
                <div class="form-wrap" id="mc_embed_signup_">
                    <form  action="{{ route('site.save-email') }}"
                          method="post" class="form-inline">
                        @csrf
                        <input class="form-control" name="email" placeholder="@lang('saas.your-email-add')" onfocus="this.placeholder = ''" onblur="this.placeholder = '@lang('saas.your-email-add') '"
                               required="" type="email">
                        <button class="click-btn btn btn-default">@lang('saas.subscribe')</button>


                        <div class="info"></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer-bottom row align-items-center text-center text-lg-left">
            <p class="footer-text m-0 col-lg-8 col-md-12">
                @lang('saas.copyright') &copy;{{ date('Y') }} {{ setting('general_site_name') }}. @lang('saas.all-rights')
                </p>
            <div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">

              @if(!empty(setting('social_facebook')))
                <a href="{{ setting('social_facebook') }}"><i class="fab fa-facebook-f"></i></a>
                @endif
                  @if(!empty(setting('social_facebook')))
                <a href="{{ setting('social_twitter') }}"><i class="fab fa-twitter"></i></a>
                  @endif
                  @if(!empty(setting('social_instagram')))
                <a href="{{ setting('social_instagram') }}"><i class="fab fa-instagram"></i></a>
                  @endif
                  @if(!empty(setting('social_linkedin')))
                <a href="{{ setting('social_linkedin') }}"><i class="fab fa-linkedin-in"></i></a>
                  @endif
                  @if(!empty(setting('social_youtube')))
                      <a href="{{ setting('social_youtube') }}"><i class="fab fa-youtube"></i></a>
                  @endif


            </div>
        </div>
    </div>
</footer>
<!-- ================ End footer Area ================= -->
<div class="modal fade"  id="currencyModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="currencyModalLabel">@lang('saas.change-currency')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach(\App\Models\Currency::get() as $currency)

                        <li class="list-group-item"><a href="{{ route('set.currency',['currency'=>$currency->id]) }}">{{$currency->country->currency_name}} ({!! clean( $currency->country->currency_code) !!})</a></li>

                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('saas.close')</button>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('themes/parason/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('themes/parason/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('themes/parason/js/main.js') }}"></script>
@yield('footer')

{!! setting('general_footer_scripts') !!}

</body>
</html>