@extends('layouts.site')


@section('content')


    <!--================ Hero sm Banner start =================-->
    <section class="hero-banner hero-banner--sm mb-30px">
        <div class="container">
            <div class="hero-banner--sm__content">
                <h1>@yield('page-title')</h1>
                @hasSection('breadcrumb')
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('homepage') }}">@lang('saas.home')</a></li>
                        @yield('breadcrumb')


                    </ol>
                </nav>
                @endif
            </div>
        </div>
    </section>
    <!--================ Hero sm Banner end =================-->


    <!--================ Offer section start =================-->
    <section class="section-margin">
        <div class="container">

            @yield('page-content')

        </div>
    </section>
    <!--================ Offer section end =================-->


@endsection