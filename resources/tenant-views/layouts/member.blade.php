<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('pageTitle',$department->name)</title>
    <meta name="description" content="">
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
        <link rel="stylesheet" href="{{ asset('themes/main/style.css') }}">
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
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<!-- Start Left menu area -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
        <div class="sidebar-header">
            @if($logo)
                <a href="{{ route('site.home') }}"><img style="max-width:200px;max-height: 200px" class="main-logo" src="{{ asset($logo) }}"  /></a>
            @else
                <div style="margin-top:20px; margin-bottom: 15px" ><a href="{{ route('site.home') }}">{{ $siteName }}</a></div>
            @endif

        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1" style="margin-bottom: 300px">

                    <li>
                        <a title="@lang('member.dashboard')" href="{{ route('member.dashboard') }}" aria-expanded="false"><span class="fa fa-dashboard"></span> <span class="mini-click-non">@lang('admin.dashboard')</span></a>
                    </li>


                   @if($department->enable_roster==1)
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-calendar"></span> <span class="mini-click-non">@lang('admin.roster')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ route('member.events.roster') }}"><span class="mini-sub-pro">@lang('admin.view-roster')</span></a></li>

                            @can('administer')
                            <li><a  href="{{ url('member/events') }}"><span class="mini-sub-pro">@lang('admin.manage-events')</span></a></li>
                            @endcan

                            <li><a  href="{{ route('member.events.shifts') }}"><span class="mini-sub-pro">@lang('admin.my-shifts')</span></a></li>
                        </ul>
                    </li>
                    @endif

                    @if($department->enable_announcements==1)
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-bullhorn"></span> <span class="mini-click-non">@lang('admin.announcements')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ url('member/announcements') }}"><span class="mini-sub-pro">@lang('admin.view-all')</span></a></li>
                            @can('administer')
                            <li><a  href="{{ url('member/announcements/create') }}"><span class="mini-sub-pro">@lang('admin.add-new')</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif

                    @if($department->enable_resources==1)
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-download"></span> <span class="mini-click-non">@lang('admin.downloads')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ route('member.downloads.browse') }}"><span class="mini-sub-pro">@lang('admin.view-downloads')</span></a></li>

                            @can('dept_allows','allow_members_upload')
                            <li><a  href="{{ url('member/downloads/create') }}"><span class="mini-sub-pro">@lang('admin.upload-files')</span></a></li>
                            <li><a  href="{{ url('member/downloads') }}"><span class="mini-sub-pro">@lang('admin.manage-files')</span></a></li>
                            @endcan
                        </ul>
                    </li>
                    @endif

                    @if($department->enable_forum==1)
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-comments-o"></span> <span class="mini-click-non">@lang('admin.forum')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ url('member/forum-topics') }}"><span class="mini-sub-pro">@lang('admin.view-topics')</span></a></li>
                            <li><a  href="{{ url('member/forum-topics/create') }}"><span class="mini-sub-pro">@lang('admin.create-topic')</span></a></li>

                        </ul>
                    </li>
                    @endif

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-users"></span> <span class="mini-click-non">@lang('admin.members')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">


                            @can('dept_allows','show_members')
                            <li><a  href="{{ url('member/members') }}"><span class="mini-sub-pro">@lang('admin.view-all')</span></a></li>
                            @endcan

                            @can('administer')
                            <li><a  href="{{ url('member/members/create') }}"><span class="mini-sub-pro">@lang('admin.add-new')</span></a></li>
                            <li><a  href="{{ route('member.members.applications') }}"><span class="mini-sub-pro">@lang('admin.applications')</span></a></li>
                            <li><a  href="{{ route('member.members.import') }}"><span class="mini-sub-pro">@lang('admin.import') @lang('admin.members')</span></a></li>
                            <li><a  href="{{ url('member/teams') }}"><span class="mini-sub-pro">@lang('admin.manage-teams')</span></a></li>
                            @endcan

                            <li><a  href="{{ route('member.my-teams') }}"><span class="mini-sub-pro">@lang('admin.my-teams')</span></a></li>

                        </ul>
                    </li>

                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-envelope"></span> <span class="mini-click-non">@lang('admin.messages')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            @can('dept_allows','allow_members_communicate')
                            <li><a  href="{{ url('member/emails/create') }}"><span class="mini-sub-pro">@lang('admin.new-message')</span></a></li>
                            @endcan
                            <li><a  href="{{ route('member.emails.inbox') }}"><span class="mini-sub-pro">@lang('admin.inbox')</span></a></li>
                            @can('dept_allows','allow_members_communicate')
                            <li><a  href="{{ url('member/emails') }}"><span class="mini-sub-pro">@lang('admin.sent-messages')</span></a></li>
                            @endcan
                        </ul>
                    </li>

                    @if($department->enable_sms==1)
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-mobile"></span> <span class="mini-click-non">@lang('admin.sms')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            @if(\Illuminate\Support\Facades\Auth::user()->can('administer'))
                            <li><a  href="{{ url('member/sms/create') }}"><span class="mini-sub-pro">@lang('admin.new-message')</span></a></li>
                            @endif
                            <li><a  href="{{ route('member.sms.inbox') }}"><span class="mini-sub-pro">@lang('admin.inbox')</span></a></li>
                                @if(\Illuminate\Support\Facades\Auth::user()->can('administer'))
                            <li><a  href="{{ url('member/sms') }}"><span class="mini-sub-pro">@lang('admin.sent-messages')</span></a></li>
                                @endif
                        </ul>
                    </li>
                    @endif
                    @can('administer')
                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-picture-o"></span> <span class="mini-click-non">@lang('admin.gallery')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ url('member/galleries/create') }}"><span class="mini-sub-pro">@lang('admin.upload-image')</span></a></li>

                            <li><a  href="{{ url('member/galleries') }}"><span class="mini-sub-pro">@lang('admin.manage-gallery')</span></a></li>
                        </ul>
                    </li>


                    <li>
                        <a class="has-arrow" href="#" aria-expanded="false"><span class="fa fa-cogs"></span> <span class="mini-click-non">@lang('admin.settings')</span></a>
                        <ul class="submenu-angle" aria-expanded="false">
                            <li><a  href="{{ route('member.settings.general')  }}"><span class="mini-sub-pro">@lang('admin.general')</span></a></li>
                            <li><a  href="{{ url('member/fields') }}"><span class="mini-sub-pro">@lang('admin.application-form')</span></a></li>
                        </ul>
                    </li>
                    @endcan


                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Left menu area -->


<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="{{ route('site.home') }}"><h1>{{ limitLength($department->name,18) }}</h1></a>
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
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="educate-icon educate-nav"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n">



                                        <ul class="nav navbar-nav mai-top-nav">
                                            <li class="nav-item">
                                                <a class="navbar-brand header-dept" href="{{ route('member.dashboard')}}"><h1>{{ limitLength($department->name,15) }}</h1></a>
                                            </li>
                                            <li class="nav-item"><a href="{{ route('site.home') }}" class="nav-link">@lang('site.home')</a>
                                            </li>

                                            @if($userDepartments->count()>0)
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">@lang('site.my-departments') <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a class="dropdown-item" href="{{ route('site.select-department') }}">@lang('site.view-all')</a>
                                                        @foreach($userDepartments as $department)
                                                            <a href="{{ route('site.department-login',['department'=>$department]) }}" class="dropdown-item">{{ $department->name }}</a>
                                                        @endforeach

                                                    </div>
                                                </li>
                                            @endif


                                            <li class="nav-item dropdown res-dis-nn">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">@lang('site.all-departments') <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                <div role="menu" class="dropdown-menu animated zoomIn">
                                                    <a href="{{ route('site.departments') }}" class="dropdown-item">@lang('admin.all-departments')</a>
                                                    @foreach($categories as $category)
                                                        <a href="{{ route('site.departments') }}?category={{ $category->id }}" class="dropdown-item">{{ $category->name }}</a>
                                                    @endforeach
                                                </div>
                                            </li>

                                            @if(\Illuminate\Support\Facades\Auth::user()->role_id==1)
                                                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link">@lang('site.admin-section')</a>
                                                </li>

                                            @endif

                                            @if(false)
                                                <li class="nav-item"><a href="#" class="nav-link">@lang('site.contact')</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item dropdown">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i></a>
                                               @if(false)
                                                <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                    <div class="message-single-top">
                                                        <h1>@lang('admin.messages')</h1>
                                                    </div>

                                                    <ul class="message-menu">
                                                        @foreach($emails as $email)
                                                            <li>
                                                                <a href="{{ route('member.email.view-inbox',['email'=>$email->id]) }}">
                                                                    <div class="message-img">
                                                                        <img src="{{ asset(userPic($email->user_id)) }}" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">{{ \Illuminate\Support\Carbon::parse($email->created_at)->format('d/M/y') }}</span>
                                                                        <h2>{{ $email->user->name }}</h2>
                                                                        <p style="min-width: 257px;"><strong>{{ $email->subject }}</strong>
                                                                            <br/>{{ limitLength(strip_tags($email->message),250) }}</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>

                                                    <div class="message-view">
                                                        <a href="{{ route('member.emails.inbox') }}">@lang('admin.all-messages')</a>
                                                    </div>
                                                </div>
                                                @endif
                                                <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                    <ul class="nav nav-tabs custon-set-tab">
                                                        <li class="active"><a data-toggle="tab" href="#Notes">@lang('admin.messages')</a>
                                                        </li>
                                                        @if($department->enable_sms==1)
                                                        <li><a data-toggle="tab" href="#Projects">@lang('admin.sms')</a>
                                                        </li>
                                                            @endif
                                                    </ul>

                                                    <div class="tab-content custom-bdr-nt">
                                                        <div id="Notes" class="tab-pane fade in active">
                                                            <ul class="message-menu">
                                                                @foreach($emails as $email)
                                                                    <li>
                                                                        <a href="{{ route('member.email.view-inbox',['email'=>$email->id]) }}">
                                                                            <div class="message-img">
                                                                                <img src="{{ asset(userPic($email->user_id)) }}" alt="">
                                                                            </div>
                                                                            <div class="message-content">
                                                                                <span class="message-date">{{ \Illuminate\Support\Carbon::parse($email->created_at)->format('d/M/y') }}</span>
                                                                                <h2>{{ $email->user->name }}</h2>
                                                                                <p style="min-width: 257px;"><strong>{{ $email->subject }}</strong>
                                                                                    <br/>{{ limitLength(strip_tags($email->message),250) }}</p>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>

                                                            <div class="message-view">
                                                                <a href="{{ route('member.emails.inbox') }}">@lang('admin.all-messages')</a>
                                                            </div>
                                                        </div>
                                                        @if($department->enable_sms==1)
                                                        <div id="Projects" class="tab-pane fade">
                                                            <ul  class="message-menu">


                                                                @foreach($sms as $msg)
                                                                    <li>
                                                                        <a href="#">
                                                                            <div class="message-img">
                                                                                <img src="{{ asset(userPic($msg->user_id)) }}" alt="">
                                                                            </div>
                                                                            <div class="message-content">
                                                                                <span class="message-date">{{ \Illuminate\Support\Carbon::parse($msg->created_at)->format('d/M/y') }}</span>
                                                                                <h2>{{ $msg->user->name }}</h2>
                                                                                <p style="min-width: 257px;">{{ $msg->message }}</p>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                @endforeach

                                                            </ul>
                                                            <div class="notification-view">
                                                                <a href="{{ route('member.sms.inbox')}}">@lang('admin.all-sms')</a>
                                                            </div>
                                                        </div>
                                                            @endif
                                                    </div>
                                                </div>

                                            </li>
                                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i></a>
                                                <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                    <div class="notification-single-top">
                                                        <h1>@lang('admin.announcements')</h1>
                                                    </div>
                                                    <ul  class="message-menu">


                                                        @foreach($announcements as $msg)
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="{{ asset(userPic($msg->user_id)) }}" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">{{ \Illuminate\Support\Carbon::parse($msg->created_at)->format('d/M/y') }}</span>
                                                                        <h2>{{ $msg->user->name }}</h2>
                                                                        <p style="min-width: 257px;"><strong>{{ $msg->title }}</strong>
                                                                            <br/>{{ limitLength(strip_tags($msg->content),250) }}</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                    <div class="notification-view">
                                                        <a href="{{ url('member/announcements') }}">@lang('admin.view-all')</a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="nav-item">
                                                <a id="profile_dropdown" href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <img src="{{ asset($picture) }}" alt="" />
                                                    <span class="admin-name">{{ $name }}</span>
                                                    <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                </a>
                                                <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
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
                                    <li><a href="{{ route('member.dashboard') }}">@lang('member.dashboard')</a></li>
                                    @if($department->enable_roster==1)
                                    <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul class="collapse dropdown-header-top">
                                            <li><a  href="{{ route('member.events.roster') }}">@lang('admin.view-roster')</a></li>

                                            @can('administer')
                                            <li><a  href="{{ url('member/events') }}">@lang('admin.manage-events')</a></li>
                                            @endcan

                                            <li><a  href="{{ route('member.events.shifts') }}">@lang('admin.my-shifts')</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                    @if($department->enable_announcements==1)
                                    <li><a data-toggle="collapse" data-target="#demoevent" href="#">@lang('admin.announcements') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demoevent" class="collapse dropdown-header-top">
                                            <li><a  href="{{ url('member/announcements') }}">@lang('admin.view-all')</a></li>
                                            @can('administer')
                                            <li><a  href="{{ url('member/announcements/create') }}">@lang('admin.add-new')</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endif

                                    @if($department->enable_resources==1)
                                    <li><a data-toggle="collapse" data-target="#demopro" href="#">@lang('admin.downloads') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demopro" class="collapse dropdown-header-top">
                                            <li><a  href="{{ route('member.downloads.browse') }}">@lang('admin.view-downloads')</a></li>

                                            @can('dept_allows','allow_members_upload')
                                            <li><a  href="{{ url('member/downloads/create') }}">@lang('admin.upload-files')</a></li>
                                            <li><a  href="{{ url('member/downloads') }}">@lang('admin.manage-files')</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @endif
                                    @if($department->enable_forum==1)
                                    <li><a data-toggle="collapse" data-target="#democrou" href="#">@lang('admin.forum') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="democrou" class="collapse dropdown-header-top">
                                            <li><a  href="{{ url('member/forum-topics') }}">@lang('admin.view-topics')</a></li>
                                            <li><a  href="{{ url('member/forum-topics/create') }}">@lang('admin.create-topic')</a></li>
                                        </ul>
                                    </li>
                                    @endif
                                    <li><a data-toggle="collapse" data-target="#demolibra" href="#">@lang('admin.members') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demolibra" class="collapse dropdown-header-top">
                                            @can('dept_allows','show_members')
                                            <li><a  href="{{ url('member/members') }}">@lang('admin.view-all')</a></li>
                                            @endcan

                                            @can('administer')
                                            <li><a  href="{{ url('member/members/create') }}">@lang('admin.add-new')</a></li>
                                            <li><a  href="{{ route('member.members.applications') }}">@lang('admin.applications')</a></li>
                                            <li><a  href="{{ route('member.members.import') }}">@lang('admin.import') @lang('admin.members')</a></li>
                                            <li><a  href="{{ url('member/teams') }}">@lang('admin.manage-teams')</a></li>
                                            @endcan

                                            <li><a  href="{{ route('member.my-teams') }}">@lang('admin.my-teams')</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#demodepart" href="#">@lang('admin.messages') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demodepart" class="collapse dropdown-header-top">
                                            @can('dept_allows','allow_members_communicate')
                                            <li><a  href="{{ url('member/emails/create') }}">@lang('admin.new-message')</a></li>
                                            @endcan
                                            <li><a  href="{{ route('member.emails.inbox') }}">@lang('admin.inbox')</a></li>
                                            @can('dept_allows','allow_members_communicate')
                                            <li><a  href="{{ url('member/emails') }}">@lang('admin.sent-messages')</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    @if($department->enable_sms==1)
                                    <li><a data-toggle="collapse" data-target="#demo" href="#">@lang('admin.sms') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="demo" class="collapse dropdown-header-top">
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('administer'))
                                                <li><a  href="{{ url('member/sms/create') }}">@lang('admin.new-message')</a></li>
                                            @endif
                                            <li><a  href="{{ route('member.sms.inbox') }}">@lang('admin.inbox')</a></li>
                                            @if(\Illuminate\Support\Facades\Auth::user()->can('administer'))
                                                <li><a  href="{{ url('member/sms') }}">@lang('admin.sent-messages')</a></li>
                                            @endif
                                        </ul>
                                    </li>
                                    @endif
                                    @can('administer')
                                    <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">@lang('admin.gallery') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                            <li><a  href="{{ url('member/galleries/create') }}">@lang('admin.upload-image')</a></li>

                                            <li><a  href="{{ url('member/galleries') }}">@lang('admin.manage-gallery')</a></li>
                                        </ul>
                                    </li>
                                    <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">@lang('admin.settings') <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                        <ul id="Chartsmob" class="collapse dropdown-header-top">
                                            <li><a  href="{{ route('member.settings.general')  }}">@lang('admin.general')</a></li>
                                            <li><a  href="{{ url('member/fields') }}">@lang('admin.application-form')</a></li>
                                        </ul>
                                    </li>
                                    @endcan


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
@if(false)
    <!-- morrisjs JS
        ============================================ -->
    <script src="{{ asset('themes/main/js/morrisjs/raphael-min.js') }}" ></script>
    <script src="{{ asset('themes/main/js/morrisjs/morris.js') }}" ></script>
    <script src="{{ asset('themes/main/js/morrisjs/morris-active.js') }}" ></script>
    <!-- morrisjs JS
        ============================================ -->
@endif
<script src="{{ asset('themes/main/js/sparkline/jquery.sparkline.min.js') }}" ></script>
<script src="{{ asset('themes/main/js/sparkline/jquery.charts-sparkline.js') }}" ></script>
<script src="{{ asset('themes/main/js/sparkline/sparkline-active.js') }}" ></script>
<!-- calendar JS
    ============================================ -->
<script src="{{ asset('themes/main/js/calendar/moment.min.js') }}" ></script>
<script src="{{ asset('themes/main/js/calendar/fullcalendar.min.js') }}" ></script>
<script src="{{ asset('themes/main/js/calendar/fullcalendar-active.js') }}" ></script>
<!-- plugins JS
    ============================================ -->
<script src="{{ asset('themes/main/js/plugins.js') }}" ></script>
<!-- main JS
    ============================================ -->
<script src="{{ asset('themes/main/js/main.js') }}" ></script>
<!-- tawk chat JS
    ============================================ -->

@yield('footer')
{!! clean( setting('general_footer_scripts')) !!}
</body>

</html>