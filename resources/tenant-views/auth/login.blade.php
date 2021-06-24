<!doctype html>
<html class="no-js') }}" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@lang('site.login')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    @if($icon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($icon) }}">
        @endif
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/bootstrap.min.css') }}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/font-awesome.min.css') }}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/css/owl.transitions.css') }}">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/animate.css') }}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/normalize.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/main.css') }}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/morrisjs/morris.css') }}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/scrollbar/jquery.mCustomScrollbar.min.css') }}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/metisMenu/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/css/metisMenu/metisMenu-vertical.css') }}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/calendar/fullcalendar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/main/css/calendar/fullcalendar.print.min.css') }}">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/form/all-type-forms.css') }}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/style.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('themes/main/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        {!! clean( setting('general_header_scripts')) !!}

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">@lang('site.upgrade-browser')</p>
<![endif]-->
<div class="error-pagewrap">
    <div class="error-page-int">
        <div class="text-center m-b-md custom-login">
            @if($logo)
                <a href="{{ route('site.home') }}"><img style="max-width:200px; max-height: 55px;" class="main-logo" src="{{ asset($logo) }}"  /></a>
            @endif
            <h3 style="margin-top: 30px">@lang('site.login')</h3>

            <p></p>
        </div>
        <div>
            <div class="hpanel">
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div style="padding-left:50px; padding-right:50px">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                    <form  method="POST" action="{{ route('login') }}" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <input id="login_email" type="text" placeholder="Email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                        </div>
                        <div class="form-group">
                            <input id="login_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                            <p class="help-block" >
                                <strong>{{ $message }}</strong>
                            </p>
                            @enderror
                        </div>

                        <div class="checkbox login-checkbox">
                            <label>
                                <input type="checkbox" class="i-checks" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> @lang('site.remember-me')</label>

                        </div>

                        <button class="btn btn-success btn-block loginbtn" type="submit">@lang('site.login')</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                @lang('site.forgot-password')
                            </a>
                        @endif
                        @if(setting('general_enable_registration')==1)
                        <a class="btn btn-default btn-block" href="{{ route('register') }}">@lang('site.register')</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center login-footer">
            <p><a href="{{ route('site.home') }}">{{ setting('general_site_name') }}</a></p>
        </div>
    </div>
</div>
<!-- jquery
    ============================================ -->
<script src="{{ asset('themes/main/js/vendor/jquery-1.12.4.min.js') }}"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="{{ asset('themes/main/js/bootstrap.min.js') }}"></script>
<!-- wow JS
    ============================================ -->
<script src="{{ asset('themes/main/js/wow.min.js') }}"></script>
<!-- price-slider JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="{{ asset('themes/main/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="{{ asset('themes/main/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="{{ asset('themes/main/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('themes/main/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- metisMenu JS
    ============================================ -->
<script src="{{ asset('themes/main/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('themes/main/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- tab JS
    ============================================ -->
<script src="{{ asset('themes/main/js/tab.js') }}"></script>
<!-- icheck JS
    ============================================ -->
<script src="{{ asset('themes/main/js/icheck/icheck.min.js') }}"></script>
<script src="{{ asset('themes/main/js/icheck/icheck-active.js') }}"></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ asset('themes/main/js/plugins.js') }}"></script>
<!-- main JS
    ============================================ -->
<script src="{{ asset('themes/main/js/main.js') }}"></script>
{!! clean( setting('general_footer_scripts')) !!}
</body>

</html>