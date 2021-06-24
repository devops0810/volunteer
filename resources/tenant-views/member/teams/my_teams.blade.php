@extends('layouts.member')
@section('pageTitle',__('admin.my-teams'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ route('member.my-teams') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.my-teams')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>@lang('admin.my-teams')
                            @if(Request::get('search'))
                                : {{ Request::get('search') }}
                            @endif
                        </h4>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('admin.name')</th>
                                    <th>@lang('admin.members')</th>
                                    <th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teams as $item)
                                    <tr>
                                        <td>{{  $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->users()->count() }}</td>
                                        <td>
                                            @can('dept_allows','show_members')
                                            <a href="{{ url('/member/teams/' . $item->id) }}" title="@lang('site.view') team"><button class="btn btn-info btn-sm"><i class="fa fa-users" aria-hidden="true"></i> @lang('admin.members')</button></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $teams->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection