@extends('layouts.member')
@section('pageTitle',$title)

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ $route }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('member.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.downloads')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>{{ $title }}
                        @if(Request::get('search'))
                             : {{ Request::get('search') }}
                            @endif
                        </h4>
                        <div class="add-product">
                            <a  title="@lang('site.create-new') download" href="{{ url('/member/downloads/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>@lang('admin.added-on')</th><th>@lang('admin.created-by')</th><th>@lang('admin.name')</th><th>@lang('admin.files')</th><th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($downloads as $item)
                                    <tr>
                                        <td>{{  \Carbon\Carbon::parse($item->created_at)->format('D d/M/Y') }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->downloadFiles()->count() }}</td>
                                        <td>
                                            <a class="btn btn-success btn-sm" href="{{ route('member.download.download-attachments',['download'=>$item->id]) }}"><i class="fa fa-download"></i> @lang('admin.download')</a>
                                            <a href="{{ url('/member/downloads/' . $item->id) }}" title="@lang('site.view') download"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>

                                            @if($manage)
                                            <a href="{{ url('/member/downloads/' . $item->id . '/edit') }}" title="@lang('site.edit') download"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                            <form method="POST" action="{{ url('/member/downloads' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') download" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $downloads->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection