<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <!-- App title -->
    <title>@yield('pageTitle',setting('general_homepage_title'))</title>

    <!--Morris Chart CSS -->

    @if(!empty(setting('image_icon')))
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset(setting('image_icon')) }}">
        @endif

    <!-- App css -->
    <link href="{{ asset('themes/cpanel/default/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('themes/cpanel/default/assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('themes/cpanel/plugins/switchery/switchery.min.css') }}">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('themes/cpanel/default/assets/assets/js/modernizr.min.js') }}"></script>
        @yield('header')
        @if(false)
        {!! setting('general_header_scripts') !!}
        @endif
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('homepage') }}" class="logo">
                @if(!empty(setting('image_logo')))
                    <img style="max-width: 100%; max-height: 50px;"  class="logo logo-display"  src="{{ asset(setting('image_logo')) }}"   >
                @else
                    <h1>{{ setting('general_site_name') }}</h1>
                @endif
            </a>


            <!-- Image logo -->
            <!--<a href="index.html" class="logo">-->
            <!--<span>-->
            <!--<img src="assets/images/logo.png" alt="" height="30">-->
            <!--</span>-->
            <!--<i>-->
            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
            <!--</i>-->
            <!--</a>-->
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">

                <!-- Navbar-left -->
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="hidden-xs">
                        <form action="{{ route('docs.search') }}" method="get" role="search" class="app-search">
                            <input value="{{ @$_GET['q'] }}" name="q" type="text" placeholder="@lang('saas.search')..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>


                    <li class="hidden-lg hidden-md hidden-sm">
                       <h4>@lang('saas.documentation')</h4>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right pull-right hidden-xs">
                    <li  >
                        <button  onclick="location.replace('{{ route('docs.offline') }}')" class="button-menu-mobile waves-effect">
                            <i class="fa fa-download"></i> @lang('saas.offline')
                        </button>

                    </li>
                </ul>


            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li class="hidden-lg hidden-md hidden-sm">
                        <form action="{{ route('docs.search') }}" method="get" role="search" class="app-search">
                            <input  value="{{ @$_GET['q'] }}"  style="color: white" name="q" type="text" placeholder="Search docs..."
                                   class="form-control">
                            <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                    <li class="menu-title">@lang('saas.user-guide')</li>

                    @foreach(\App\Models\HelpCategory::orderBy('sort_order')->get() as $category)
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><span> {{ $category->name }} </span> </a>
                        <ul class="list-unstyled">
                            @foreach($category->helpPosts()->where('status',1)->orderBy('sort_order')->get(['title','id']) as $post)
                            <li><a href="{{ route('docs.post',['id'=>$post->id,'slug'=>safeUrl($post->title)]) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <li><a href="{{ route('docs.offline') }}">@lang('saas.offline')</a></li>


                </ul>
            </div>
            <!-- Sidebar -->
            <div class="clearfix"></div>


        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title-box">
                            <h4 class="page-title">@yield('pageTitle')</h4>

                            <ol class="breadcrumb p-0 m-0">
                                @yield('breadcrumb')
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>



            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            {{ date('Y') }} © {{ setting('general_site_name') }}
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->




</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>
<!-- jQuery  -->
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/detect.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/fastclick.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/waves.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.scrollTo.min.js') }}"></script>
<script src="{{ asset('themes/cpanel/plugins/switchery/switchery.min.js') }}"></script>

<!-- Counter js  -->
<script src="{{ asset('themes/cpanel/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('themes/cpanel/plugins/counterup/jquery.counterup.min.js') }}"></script>

<!--Morris Chart-->
<script src="{{ asset('themes/cpanel/plugins/morris/morris.min.js_') }}"></script>
<script src="{{ asset('themes/cpanel/plugins/raphael/raphael-min.js_') }}"></script>

<!-- Dashboard init -->
<script src="{{ asset('themes/cpanel/default/assets/pages/jquery.dashboard.js_') }}"></script>

<!-- App js -->
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.core.js') }}"></script>
<script src="{{ asset('themes/cpanel/default/assets/js/jquery.app.js') }}"></script>
@yield('footer')

{!! setting('general_footer_scripts') !!}

</body>
</html>