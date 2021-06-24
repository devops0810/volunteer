<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        @yield('pageTitle',__('saas.admin'))
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
</head>

<body class="">
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ url('/') }}">
            @if(!empty(setting('image_logo')))
                <img src="{{ asset(setting('image_logo')) }}" class="navbar-brand-img" >
                @else
                <h1>{{ setting('general_site_name') }}</h1>
                @endif
        </a>



        <!-- User -->
        <ul class="nav align-items-center d-md-none">

            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img   src="{{ asset('img/man.jpg') }}">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">@lang('saas.welcome')!</h6>
                    </div>
                    <a href="{{ route('admin.profile') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>@lang('saas.my-profile')</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a  href="#"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>@lang('saas.logout')</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ url('/') }}">

                            @if(!empty(setting('image_logo')))
                                <img src="{{ asset(setting('image_logo')) }}"   >
                            @else
                                <h1>{{ setting('general_site_name') }}</h1>
                            @endif
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item  active" >
                <a class=" nav-link active " href="{{ route('admin.dashboard') }}"> <i class="ni ni-tv-2 text-primary"></i> @lang('saas.dashboard')
                </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#nav-subscribers" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="subscribers">
                        <i class="ni ni-single-02 text-orange"></i>
                        <span class="nav-link-text">@lang('saas.subscribers')</span>
                    </a>
                    <div class="collapse" id="nav-subscribers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers/create') }}" class="nav-link">@lang('saas.create-subscriber')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers') }}" class="nav-link">@lang('saas.all-subscribers')</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers') }}?sort=c" class="nav-link">@lang('saas.active-customers')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers') }}?sort=t" class="nav-link">@lang('saas.active-trials')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers') }}?sort=ec" class="nav-link">@lang('saas.expired-customers')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/subscribers') }}?sort=et" class="nav-link">@lang('saas.expired-trials')</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nav-plans" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                        <i class="ni ni-briefcase-24 text-yellow"></i>
                        <span class="nav-link-text">@lang('saas.plans')</span>
                    </a>
                    <div class="collapse" id="nav-plans">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/plans') }}" class="nav-link">@lang('saas.manage-plans')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/plans/create') }}" class="nav-link">@lang('saas.create-plan')</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nav-invoices" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-invoices">
                        <i class="ni ni-money-coins text-blue"></i>
                        <span class="nav-link-text">@lang('saas.invoices')</span>
                    </a>
                    <div class="collapse" id="nav-invoices">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('/admin/invoices') }}" class="nav-link">@lang('saas.view-invoices')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/invoices/create') }}" class="nav-link">@lang('saas.create-invoice')</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#nav-features" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-features">
                        <i class="ni ni-satisfied text-red"></i>
                        <span class="nav-link-text">@lang('saas.features')</span>
                    </a>
                    <div class="collapse" id="nav-features">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.features.index') }}" class="nav-link">@lang('saas.manage-posts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.features.create') }}" class="nav-link">@lang('saas.create-post')</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#nav-articles" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-articles">
                        <i class="ni ni-books text-info"></i>
                        <span class="nav-link-text">@lang('saas.articles')</span>
                    </a>
                    <div class="collapse" id="nav-articles">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.articles.index') }}" class="nav-link">@lang('saas.manage-posts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.articles.create') }}" class="nav-link">@lang('saas.create-post')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.article-categories.index') }}" class="nav-link">@lang('saas.manage-categories')</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#nav-blog" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-blog">
                        <i class="ni ni-book-bookmark text-pink"></i>
                        <span class="nav-link-text">@lang('saas.blog')</span>
                    </a>
                    <div class="collapse" id="nav-blog">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-posts.index') }}" class="nav-link">@lang('saas.manage-posts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-posts.create') }}" class="nav-link">@lang('saas.create-post')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog-categories.index') }}" class="nav-link">@lang('saas.manage-categories')</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="#nav-docs" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-docs">
                        <i class="ni ni-support-16 text-green"></i>
                        <span class="nav-link-text">@lang('saas.documentation')</span>
                    </a>
                    <div class="collapse" id="nav-docs">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.help-posts.index') }}" class="nav-link">@lang('saas.manage-posts')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.help-posts.create') }}" class="nav-link">@lang('saas.create-post')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.help-categories.index') }}" class="nav-link">@lang('saas.manage-categories')</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item" >
                    <a class=" nav-link" href="{{ route('admin.payment-methods') }}"> <i class="ni ni-credit-card text-primary"></i> @lang('saas.payment-methods')
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#nav-settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="nav-settings">
                        <i class="ni ni-settings-gear-65 text-default"></i>
                        <span class="nav-link-text">@lang('saas.settings')</span>
                    </a>
                    <div class="collapse" id="nav-settings">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.settings',['group'=>'general'])  }}" class="nav-link">@lang('saas.general')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.trial') }}" class="nav-link">@lang('saas.free-trial')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.currencies.index') }}" class="nav-link">@lang('saas.currencies')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.language') }}" class="nav-link">@lang('saas.language')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.settings',['group'=>'mail'])  }}" class="nav-link">@lang('saas.email-settings')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.settings',['group'=>'mailchimp'])  }}" class="nav-link">@lang('saas.mailchimp-settings')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.settings',['group'=>'social'])  }}" class="nav-link">@lang('saas.social-settings')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.settings',['group'=>'image'])  }}" class="nav-link">@lang('saas.logo-icon')</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.admins.index') }}" class="nav-link">@lang('saas.administrators')</a>
                            </li>
                        </ul>
                    </div>
                </li>



            </ul>

        </div>
    </div>
</nav>
<div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('admin.dashboard') }}">@yield('pageTitle','Admin')</a>
            @yield('search-form')

            <!-- User -->
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                    <img   src="{{ asset('img/man.jpg') }}">
                </span>
                            <div class="media-body ml-2 d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ \Illuminate\Support\Facades\Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">@lang('saas.welcome')!</h6>
                        </div>
                        <a href="{{ route('admin.profile') }}" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>@lang('saas.my-profile')</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a  href="#"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>@lang('saas.logout')</span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->

                @yield('page-header')

            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">

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


        <div class="flash-message"  style="padding-left:50px; padding-right:50px">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
            @if(Session::has('flash_message'))

                <p class="alert alert-success">{{ Session::get('flash_message') }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
        </div> <!-- end .flash-message -->
        @yield('content')
        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; {{ date('Y') }} {{ setting('general_site_name') }}
                    </div>
                </div>
                <div class="col-xl-6">

                </div>
            </div>
        </footer>
    </div>
</div>




<!--   Core   -->
<script src="{{ asset('themes/argon/assets/js/plugins/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('themes/argon/assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!--   Optional JS   -->
<script src="{{ asset('themes/argon/assets/js/plugins/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('themes/argon/assets/js/plugins/chart.js/dist/Chart.extension.js') }}"></script>
<!--   Argon JS   -->
<script src="{{ asset('themes/argon/assets/js/argon-dashboard.min.js') }}?v=1.1.0"></script>
<script src="{{ asset('js/lib.js') }}" type="text/javascript"></script>
 @yield('footer')
</body>

</html>