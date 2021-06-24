<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('pageTitle',setting('general_site_name'))</title>
    <meta name="description" content="{{ setting('general_homepage_meta_desc') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon
		============================================ -->
    @if($icon)
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset($icon) }}">
        @endif
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
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
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/meanmenu.min.css') }}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/main.css') }}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/educate-custon-icon.css') }}">
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
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/site.css') }}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{ asset('themes/main/css/responsive.css') }}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{ asset('themes/main/js/vendor/modernizr-2.8.3.min.js') }}"></script>
        @yield('header')

        {!! clean( setting('general_header_scripts')) !!}
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">@lang('site.upgrade-browser')</p>
<![endif]-->

            <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        @if(false) @endif
        <div class="container-fluid visible-xs">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        @if($logo)
                            <a href="{{ route('site.home') }}"><img style="max-width:200px; max-height: 55px;" class="main-logo" src="{{ asset($logo) }}"  /></a>
                        @endif
                     </div>
                </div>
            </div>
        </div>


        <div class="header-advance-area">



            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro imgv-box">
                                            @if($logo)
                                                <a href="{{ route('admin.dashboard') }}"><img style="max-width:200px; max-height: 55px;" class="main-logo imgv" src="{{ asset($logo) }}"  /></a>
                                              @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="{{ route('site.home') }}" class="nav-link">@lang('site.home')</a>
                                                </li>

                                               @auth

                                                    <li class="nav-item dropdown res-dis-nn">
                                                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">@lang('site.my-departments') <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                        <div role="menu" class="dropdown-menu animated zoomIn">

                                                            @if($userDepartments->count()>0)
                                                            <a class="dropdown-item" href="{{ route('site.select-department') }}">@lang('site.view-all')</a>
                                                            @foreach($userDepartments as $department)
                                                                <a href="{{ route('site.department-login',['department'=>$department]) }}" class="dropdown-item">{{ $department->name }}</a>
                                                            @endforeach
                                                            @endif

                                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id==2)
                                                                    @if($userDepartments->count()>0)
                                                            <a style="padding: 0px;" href="#" role="separator" class="divider"></a>
                                                                    @endif

                                                            <a href="{{ route('site.my-applications') }}">@lang('site.my-applications')</a>
                                                            @endif
                                                        </div>
                                                    </li>

                                                 @endauth

                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">@lang('site.browse-departments') <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="{{ route('site.departments') }}" class="dropdown-item">@lang('admin.all-departments')</a>
                                                        @foreach($categories as $category)
                                                            <a href="{{ route('site.departments') }}?category={{ $category->id }}" class="dropdown-item">{{ $category->name }}</a>
                                                        @endforeach
                                                    </div>
                                                </li>

                                                @auth
                                                @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                                                    <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">@lang('site.admin-section')</a>
                                                    </li>

                                                @endif
                                                @endauth

                                                @if(false)
                                                    <li class="nav-item"><a href="#" class="nav-link">@lang('site.contact')</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">

                                                @auth
                                                <li class="nav-item">
                                                    <a  id="profile_dropdown"  href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="{{ asset($picture) }}" alt="" />
                                                        <span class="admin-name">{{ $name }}</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                                                            <li  ><a href="{{ route('admin.dashboard') }}"  ><span class="edu-icon edu-home-admin author-log-ic"></span>@lang('site.admin-section')</a>
                                                            </li>

                                                        @endif
                                                        <li><a href="{{ route('account.profile') }}"><span class="edu-icon edu-home-admin author-log-ic"></span>@lang('admin.profile')</a>
                                                        </li>
                                                        <li><a href="{{ route('account.password') }}"><span class="edu-icon edu-money author-log-ic"></span>@lang('admin.change-password')</a>
                                                        </li>
                                                        <li><a  href="{{ route('logout') }}"
                                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" ><span class="edu-icon edu-locked author-log-ic"></span>@lang('admin.logout')</a>
                                                        </li>
                                                    </ul>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                                @endauth

                                                @guest
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="{{ asset(avatar('m')) }}" alt="" />
                                                        <span class="admin-name">@lang('site.my-account')</span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="{{ route('login') }}"><span class="edu-icon edu-home-admin author-log-ic"></span>@lang('site.login')</a>
                                                        </li>
                                                        @if(setting('general_enable_registration')==1)
                                                        <li><a href="{{ route('register') }}"><span class="edu-icon edu-user-rounded author-log-ic"></span>@lang('site.register')</a>
                                                        </li>
                                                            @endif

                                                    </ul>
                                                </li>

                                                @endguest




                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a href="{{ route('site.home') }}">@lang('site.home') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>

                                        </li>
                                        @auth
                                        <li><a data-toggle="collapse" data-target="#demoevent3" href="#">@lang('site.my-departments') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent3" class="collapse dropdown-header-top">
                                                @if($userDepartments->count()>0)
                                                <li><a href="{{ route('site.select-department') }}">@lang('site.view-all')</a></li>
                                                    @foreach($userDepartments as $department)
                                                <li><a href="{{ route('site.department-login',['department'=>$department]) }}">{{ $department->name }}</a> </li>
                                                    @endforeach
                                                @endif
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role_id==2)
                                                        @if($userDepartments->count()>0)
                                                <li  style="padding: 0px;" class="divider" >
                                                </li>
                                                        @endif
                                                <li><a href="{{ route('site.my-applications') }}">@lang('site.my-applications')</a>
                                                </li>
                                                    @endif
                                            </ul>
                                        </li>
                                        @endauth


                                        <li><a data-toggle="collapse" data-target="#demoevent2" href="#">@lang('site.browse-departments') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent2" class="collapse dropdown-header-top">
                                                <li><a href="{{ route('site.departments') }}" >@lang('admin.all-departments')</a>
                                                </li>
                                                @foreach($categories as $category)
                                                   <li><a href="{{ route('site.departments') }}?category={{ $category->id }}" >{{ $category->name }}</a></li>
                                                @endforeach

                                            </ul>
                                        </li>
                                        @auth
                                        @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                                        <li><a href="{{ route('admin.dashboard') }}">@lang('site.admin-section')</a></li>
                                        @endif
                                        @endauth


                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            @hasSection('innerTitle')
                                            <h3 style="margin: 0 0 0px;">@yield('innerTitle')</h3>
                                            @endif
                                            @yield('titleForm')

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">

                                            @yield('breadcrumb')
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



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

            <!-- START SIMPLE MODAL MARKUP -->
            <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="generalModalLabel"></h4>
                        </div>
                        <div class="modal-body" id="genmodalinfo">

                        </div>
                        <div class="modal-footer">

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- END SIMPLE MODAL MARKUP -->
            <script>
                function openModal(title,url){
                    $('#genmodalinfo').html(' <img  src="{{ asset('img/loader.gif') }}">');
                    $('#generalModalLabel').text(title);
                    $('#genmodalinfo').load(url);
                    $('#generalModal').modal();
                }
                function openPopup(url){
                    window.open(url, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
                    return false;
                }
            </script>
            <div class="footer-copyright-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-copy-right">
                                <p>{!! clean( __('site.credits',['name'=>setting('general_site_name')])) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- jquery
        ============================================ -->
    <script src="{{ asset('themes/main/js/vendor/jquery-1.12.4.min.js') }}" ></script>
    <!-- bootstrap JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/bootstrap.min.js') }}" ></script>
    <!-- wow JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/wow.min.js') }}" ></script>
    <!-- price-slider JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/jquery-price-slider.js') }}" ></script>
    <!-- meanmenu JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/jquery.meanmenu.js') }}" ></script>
    <!-- owl.carousel JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/owl.carousel.min.js') }}" ></script>
    <!-- sticky JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/jquery.sticky.js') }}" ></script>
    <!-- scrollUp JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/jquery.scrollUp.min.js') }}" ></script>
    <!-- counterup JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/counterup/jquery.counterup.min.js') }}" ></script>
    <script src="{{ asset('themes/main/js/counterup/waypoints.min.js') }}" ></script>
    <script src="{{ asset('themes/main/js/counterup/counterup-active.js') }}" ></script>
    <!-- mCustomScrollbar JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}" ></script>
    <script src="{{ asset('themes/main/js/scrollbar/mCustomScrollbar-active.js') }}" ></script>
    <!-- metisMenu JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/metisMenu/metisMenu.min.js') }}" ></script>
    <script src="{{ asset('themes/main/js/metisMenu/metisMenu-active.js') }}" ></script>



    <!-- plugins JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/plugins.js') }}" ></script>
    <!-- main JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/main.js') }}" ></script>
    @yield('footer')

{!! clean( setting('general_footer_scripts')) !!}
</body>

</html>