@extends('layouts.site')

@section('content')
    <main class="side-main">
    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner mb-30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="hero-banner__img">
                        <img class="img-fluid" src="{{ asset('themes/parason/img/banner/team.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-5 pt-5">
                    <div class="hero-banner__content">
                        <h1>@lang('saas.hp-vms')</h1>
                        <p>@lang('saas.hp-vms-msg')</p>
                        <a class="button bg" href="{{ url('/register') }}">@lang('saas.get-started')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->

    <!--================ Feature section start =================-->
    <section class="section-margin">
        <div class="container">
            <div class="section-intro pb-85px text-center">
                <h2 class="section-intro__title">@lang('saas.welcome-header')</h2>
                <p class="section-intro__subtitle">@lang('saas.welcome-msg')</p>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-users"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.dept-members')</h3>
                            <p class="card-feature__subtitle">@lang('saas.dept-mem-msg')</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-calendar-alt"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.event-roster')</h3>
                            <p class="card-feature__subtitle">@lang('saas.event-roster-msg')</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-download"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.resource-sharing')</h3>
                            <p class="card-feature__subtitle">@lang('saas.resource-sharing-msg')</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-envelope-square"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.internal-messaging')</h3>
                            <p class="card-feature__subtitle">@lang('saas.internal-msg-text')</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-sms"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.sms-messaging')</h3>
                            <p class="card-feature__subtitle">@lang('saas.sms-text')</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-feature text-center text-lg-left mb-4 mb-lg-0">
                <span class="card-feature__icon">
                  <i class="fa fa-comments"></i>
                </span>
                            <h3 class="card-feature__title">@lang('saas.department-forums')</h3>
                            <p class="card-feature__subtitle">@lang('saas.department-forum-text')</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Feature section end =================-->

    <!--================ about section start =================-->
    <section class="section-padding--small bg-magnolia">
        <div class="container">
            <div class="row no-gutters align-items-center">
                <div class="col-md-5 mb-5 mb-md-0">
                    <div class="about__content">
                        <h2>@lang('saas.easy-setup')</h2>
                        <p>@lang('saas.easy-setup-msg')</p>
                        <a class="button button-light" href="{{ url('/register') }}">@lang('saas.get-started')</a>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about__img">
                        <img class="img-fluid" src="{{ asset('themes/parason/img/home/about.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ about section end =================-->

    <!--================ Pricing section start =================-->
    <section class="section-margin">
        <div class="container">
            <div class="section-intro pb-85px text-center">
                <h2 class="section-intro__title">@lang('saas.choose-plan')</h2>
                <p class="section-intro__subtitle">@lang('saas.choose-plan-msg')</p>
            </div>

            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">@lang('saas.monthly-plans')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#menu1">@lang('saas.annual-plans')</a>
                    </li>

                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane container active" id="home" style="padding-top: 30px">

                        <div class="row">

                            @foreach($packages as $package)

                                @foreach($package->packageDurations()->where('type','m')->get() as $plan)
                                    <div class="col-md-4" style=" margin-bottom: 20px">
                                        <div class="card" style="text-align: center; " >
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 20px">{{ $plan->package->name }}</h5>
                                                <p class="card-text">
                                                <h1 style="text-align: center; font-size: 60px; margin-top: -30px;">@if(empty($package->is_free)){!! clean(price($plan->price)) !!}@else @lang('saas.free') @endif</h1>
                                                <div style="margin-bottom: 20px" ><small>@lang('saas.monthly')</small></div>

                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">{{ !empty($package->user_limit)? $package->user_limit:__('saas.unlimited')  }} @lang('saas.users')</li>
                                                    <li class="list-group-item">{{ !empty($package->department_limit)? $package->department_limit:__('saas.unlimited')  }} @lang('admin.departments')</li>
                                                    <li class="list-group-item">{{ !empty($package->storage_space)? $package->storage_space.$package->storage_unit:__('saas.unlimited')  }} @lang('saas.disk-space')</li>

                                                </ul>
                                                </p>

                                                <a class="btn btn-primary" href="{{ url('/register') }}">@lang('saas.select-plan')</a>

                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endforeach
                        </div>

                    </div>
                    <div class="tab-pane container fade" id="menu1"  style="padding-top: 30px">

                        <div class="row">

                            @foreach($packages as $package)

                                @foreach($package->packageDurations()->where('type','a')->get() as $plan)
                                    <div class="col-md-4" style=" margin-bottom: 20px">
                                        <div class="card" style="text-align: center; " >
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-size: 20px">{{ $plan->package->name }}</h5>
                                                <p class="card-text">
                                                <h1 style="text-align: center; font-size: 60px; margin-top: -30px;">@if(empty($package->is_free)){!! clean(price($plan->price)) !!}@else @lang('saas.free') @endif</h1>
                                                <div style="margin-bottom: 20px" ><small>@lang('saas.yearly')</small></div>

                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">{{ !empty($package->user_limit)? $package->user_limit:__('saas.unlimited')  }} @lang('saas.users')</li>
                                                    <li class="list-group-item">{{ !empty($package->department_limit)? $package->department_limit:__('saas.unlimited')  }} @lang('admin.departments')</li>
                                                    <li class="list-group-item">{{ !empty($package->storage_space)? $package->storage_space.$package->storage_unit:__('saas.unlimited')  }} @lang('saas.disk-space')</li>

                                                </ul>
                                                </p>

                                                <a class="btn btn-primary" href="{{ url('/register') }}">@lang('saas.select-plan')</a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endforeach
                        </div>

                    </div>


                </div>


                <div class="container">
                    <a style="margin-top: 30px" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#currencyModal" href="#">@lang('saas.change-currency')</a>

                </div>
            </div>
        </div>

    </section>
    <!--================ Pricing section end =================-->

 </main>
@endsection
