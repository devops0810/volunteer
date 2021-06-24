@extends('layouts.site-page')
@section('pageTitle',__('saas.pricing'))
@section('page-title',__('saas.pricing'))

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">@lang('saas.pricing')</li>
@endsection


@section('page-content')

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
                                    <h1 style="text-align: center; font-size: 60px; margin-top: -30px;">@if(empty($package->is_free)){!! clean( price($plan->price)) !!}@else @lang('saas.free') @endif</h1>
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
                                    <h1 style="text-align: center; font-size: 60px; margin-top: -30px;">@if(empty($package->is_free)){!! clean( price($plan->price)) !!}@else @lang('saas.free') @endif</h1>
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

@endsection
