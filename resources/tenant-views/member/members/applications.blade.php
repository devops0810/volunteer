@extends('layouts.member')
@section('pageTitle',__('site.applications'))
@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.applications')</span>
    </li>
@endsection

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ route('member.members.applications') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
        <input type="hidden" name="status" value="{{ request('status') }}"/>
    </form>
@endsection

@section('content')

    <div class="container_fluid mg-b-15" style="min-height: 400px">

        <div class="row" style="margin-left: 0px;margin-right: 0px; margin-bottom: 50px">

            <div class="col-md-12 ">
                <div class="single-pro-review-area mt-t-30 mg-b-15">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="product-payment-inner-st">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <h4>@lang('site.applications')@if(Request::get('search'))
                                                    : {{ Request::get('search') }}
                                                @endif</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <form class="form-inline" method="GET" action="{{ route('member.members.applications') }}" >
                                                <input type="hidden" name="search" value="{{ request('search') }}"/>
                                                <div class="form-group">
                                                    <select style="max-width: 300px" class="form-control" name="status" id="status">
                                                        <option value="">@lang('admin.view-all')</option>
                                                        @foreach(['p'=>__('site.pending'),'a'=>__('site.approved'),'d'=>__('site.denied')] as $key=>$status)
                                                            <option @if(request('status')==$key) selected @endif value="{{ $key }}">{{ $status }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary">@lang('site.filter')</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>

                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>@lang('admin.date')</th><th>@lang('admin.name')</th>
                                            <th>@lang('admin.picture')</th>
                                            <th>@lang('admin.gender')</th><th>@lang('admin.email')</th><th>@lang('admin.status')</th><th>@lang('site.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($applications as $application)
                                            <tr>
                                                <td>{{ \Illuminate\Support\Carbon::parse($application->created_at)->format('d/M/Y') }}</td>
                                                <td>{{ $application->user->name }}</td>
                                                <td>
                                                    @if(!empty($application->user->picture))
                                                        <img src="{{ asset($application->user->picture) }}" class="img-responsive img-circle m-b" style="max-width: 200px"/>
                                                    @else
                                                        <img src="{{ avatar($application->user->gender) }}" class="img-responsive img-circle m-b"  style="max-width: 200px" />
                                                    @endif
                                                </td>
                                                <td>{{ gender($application->user->gender) }}</td><td>
                                                    {{ $application->user->email }}

                                                </td>
                                                <td>
                                                    @if($application->status=='p')
                                                        @lang('site.pending')
                                                    @elseif($application->status=='a')
                                                        @lang('site.approved')
                                                    @elseif($application->status=='d')
                                                        @lang('site.denied')
                                                    @endif

                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-lg" href="{{ route('member.members.application',['application'=>$application->id]) }}">@lang('admin.details')</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>









                                    <div class="custom-pagination">
                                        {!! clean( $applications->appends(['search' => Request::get('search'),'status'=>Request::get('status')])->render()) !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>


@endsection