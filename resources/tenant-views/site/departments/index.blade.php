@extends('layouts.site')
@section('pageTitle',__('site.departments'))
@section('innerTitle',__('site.departments'))

@section('breadcrumb')
    <li><a href="{{ route('site.home') }}">@lang('site.home')</a> <span class="bread-slash">/</span>
    </li>
    @if(request('search') || request('category'))
        <li><a href="{{ route('site.departments') }}">@lang('site.departments')</a> <span class="bread-slash">/</span>
        </li>
            @if(request('category'))
                <li><a href="{{ route('site.departments') }}?category={{ request('category') }}">{{ $categoryName }}</a> @if(request('search')) <span class="bread-slash">/</span> @endif
                </li>
            @endif

        @if(request('search'))
            <li><span class="bread-blod">@lang('site.search-results')</span></li>
            @endif

        @else
    <li><span class="bread-blod">@lang('site.departments')</span>
    </li>
    @endif

@endsection

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">

        <div class="row"  style="margin-left: 0px;margin-right: 0px;">
            <div class="col-md-12">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert-title dropzone-custom-sys">
                        <h2>
                            @if(isset($categoryName))
                                {{ $categoryName }}
                            @else
                                @lang('site.departments')
                            @endif

                            @if(request('search')): {{ request('search') }} @endif</h2>
                        <p>@lang('site.dept-info')</p>
                        @if(false)
                            <div style="text-align: right">

                            </div>
                        @endif

                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9" style="padding-top: 10px">
                            <form class="form-inline" method="GET" action="{{ route('site.departments') }}" >
                                <input type="hidden" name="search" value="{{ request('search') }}"/>
                                <div class="form-group">
                                    <select style="max-width: 300px" class="form-control" name="category" id="category">
                                        <option value="">@lang('site.all-departments')</option>
                                        @foreach(\App\Category::orderBy('name')->get() as $category)
                                            <option @if(request('category')==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary">@lang('site.filter')</button>
                                </div>

                            </form>
                        </div>
                        <div class="col-md-3" style="padding-left: 50px; padding-top: 10px;padding-bottom: 10px">
                            <form role="search" class="sr-input-func" method="get" action="{{ route('site.departments') }}">
                                <input value="{{ request('search') }}" type="text" placeholder="Search..." class="search-int form-control" name="search">
                                <a href="#"><i class="fa fa-search"></i></a>
                                <input type="hidden" name="category" value="{{ request('category') }}"/>
                            </form>
                        </div>
                    </div>

                    <div class="row">

                        @foreach($departments as $department)
                           @include('site.partials.department')
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