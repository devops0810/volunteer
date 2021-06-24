@extends('layouts.admin')
@section('pageTitle',__('admin.categories'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/admin/categories') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="@lang('admin.search')..." class="search-int form-control">
        <a onClick="$('nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.categories')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">
                        <h4>@lang('admin.categories')@if(Request::get('search'))
                                : {{ Request::get('search') }}
                            @endif</h4>
                        <div class="add-product">
                            <a  title="@lang('admin.add-new') @lang('admin.category')" href="{{ url('/admin/categories/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                        </div>
                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th><th>@lang('admin.name')</th><th>@lang('admin.sort-order')</th><th>@lang('admin.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->sort_order }}</td>
                                        <td>
                                            <a href="{{ url('/admin/categories/' . $item->id) }}" title="@lang('admin.view') @lang('admin.category')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('admin.view')</button></a>
                                            <a href="{{ url('/admin/categories/' . $item->id . '/edit') }}" title="@lang('admin.edit') @lang('admin.category')"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                                            <form method="POST" action="{{ url('/admin/categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('admin.delete') @lang('admin.category')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $categories->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection