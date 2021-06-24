@extends('layouts.member')
@section('pageTitle',__('admin.gallery'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/member/galleries') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">Galleries</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>Galleries
                        @if(Request::get('search'))
                             : {{ Request::get('search') }}
                            @endif
                        </h4>
                        <div class="add-product">
                            <a  title="@lang('site.create-new') gallery" href="{{ url('/member/galleries/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th><th>@lang('admin.name')</th><th>@lang('admin.picture')</th><th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($galleries as $item)
                                    <tr>
                                        <td>{{  $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            <img src="{{ asset($item->file_path) }}" class="img-responsive img-circle m-b" style="max-width: 200px"/>

                                        </td>
                                        <td>
                                            <a href="{{ url('/member/galleries/' . $item->id) }}" title="@lang('site.view') gallery"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('site.view')</button></a>
                                            <a href="{{ url('/member/galleries/' . $item->id . '/edit') }}" title="@lang('site.edit') gallery"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('site.edit')</button></a>

                                            <form method="POST" action="{{ url('/member/galleries' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') gallery" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $galleries->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection