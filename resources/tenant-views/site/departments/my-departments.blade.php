@extends('layouts.site')
@section('pageTitle',__('site.my-departments'))
@section('innerTitle',__('site.my-departments'))

@section('breadcrumb')
    <li><a href="{{ route('site.home') }}">@lang('site.home')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('site.my-departments')</span>
    </li>
@endsection

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">

        <div class="row"  style="margin-left: 0px;margin-right: 0px;">
            <div class="col-md-12">

                <div class="container-fluid">

                    <div class="row">

                        @foreach($departments as $department)
                            <div class="col-md-4 mg-b-15 ">
                                <div style="min-height: 400px" class="courses-inner res-mg-b-30">
                                    <div class="courses-title" style="text-align: center">
                                        @if(!empty($department->picture) && file_exists($department->picture))
                                            <a href="{{ route('site.department',['department'=>$department->id]) }}"><img style="max-height: 200px" src="{{ asset($department->picture) }}"  ></a>
                                        @endif
                                        <h2>{{ $department->name }}</h2>
                                    </div>
                                    <p>
                                        {{ limitLength($department->description,200) }}
                                    </p>

                                    <div class="product-buttons">

                                        <a class="btn btn-success btn-lg btn-block" href="{{ route('site.department-login',['department'=>$department]) }}">@lang('site.login')</a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="custom-pagination">
                        {!! clean( $departments->appends(['search' => Request::get('search'),'category'=>Request::get('category')])->render()) !!}
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection