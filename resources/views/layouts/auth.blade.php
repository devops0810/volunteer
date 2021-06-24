<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
       @yield('pageTitle')
    </title>
    <!-- Favicon -->
    @if(!empty(setting('image_icon')))
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(setting('image_icon')) }}">
        @endif
                <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('themes/argon/assets/js/plugins/nucleo/css/nucleo.css') }}" rel="stylesheet" />
        <link href="{{ asset('themes/argon/assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="{{ asset('themes/argon/assets/css/argon-dashboard.css?v=1.1.0') }}" rel="stylesheet" />
        @yield('header')

        {!! setting('general_header_scripts') !!}

</head>

<body class="bg-default">
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
        <div class="container px-4">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                @if(!empty(setting('image_logo')))
                    <img     src="{{ asset(setting('image_logo')) }}"   >
                @else
                    <h1>{{ setting('general_site_name') }}</h1>
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse-main">
                <!-- Collapse header -->
                <div class="navbar-collapse-header d-md-none">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{ route('homepage') }}">
                                @if(!empty(setting('image_logo')))
                                    <img     src="{{ asset(setting('image_logo')) }}"   >
                                @else
                                    <h1>{{ setting('general_site_name') }}</h1>
                                @endif
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navbar items -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ route('homepage') }}">
                            <i class="ni ni-planet"></i>
                            <span class="nav-link-inner--text">@lang('saas.home')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ url('/register') }}">
                            <i class="ni ni-circle-08"></i>
                            <span class="nav-link-inner--text">@lang('saas.signup')</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="{{ url('/login') }}">
                            <i class="ni ni-key-25"></i>
                            <span class="nav-link-inner--text">@lang('saas.login')</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        @if (count($errors) > 0)
            <div style="padding-left:50px; padding-right:50px">
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        @yield('content')
    </div>
</div>
<!--   Core   -->
<script src="{{ asset('themes/argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('themes/argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!--   Optional JS   -->
<!--   Argon JS   -->
<script src="{{ asset('themes/argon/assets/js/argon-dashboard.min.js?v=1.1.0') }}"></script>
@yield('footer')


{!! setting('general_footer_scripts') !!}

</body>

</html>