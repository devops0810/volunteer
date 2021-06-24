@extends('layouts.admin')
@section('pageTitle',__('admin.departments'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/admin/departments') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
        <input type="hidden" name="category" value="{{ request('category') }}"/>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.departments')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap" >

                        <div class="row">
                            <div class="col-md-7">
                                <h4>@lang('admin.departments') @if(Request::get('search'))
                                        : {{ Request::get('search') }}
                                    @endif</h4>
                            </div>
                            <div class="col-md-4" >
                                <form class="form-inline" method="GET" action="{{ url('/admin/departments') }}" >
                                    <input type="hidden" name="search" value="{{ request('search') }}"/>
                                    <div class="form-group">
                                        <select style="max-width: 300px" class="form-control" name="category" id="category">
                                            <option value="">@lang('admin.all-categories')</option>
                                            @foreach(\App\Category::orderBy('name')->get() as $category)
                                                <option @if(request('category')==$category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-primary">@lang('site.filter')</button>
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-1">
                                <div class="add-product_">
                                    <a class="btn btn-primary pull-right" title="@lang('site.create-new')  @lang('site.department')" href="{{ url('/admin/departments/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                                </div>

                            </div>
                        </div>













                        <div class="asset-inner"  >
                            <table class="table" >
                                <thead>
                                <tr>
                                    <th>#</th><th>@lang('site.name')</th>
                                    <th>@lang('admin.members')</th>
                                    <th>@lang('site.enroll-open')</th>
                                    <th>@lang('admin.status')</th>
                                    <th>@lang('admin.visibility')</th>
                                    <th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}
                                        </td>
                                        <td>
                                            {{ $item->users()->count() }}
                                        </td>

                                        <td>{{ boolToString($item->enroll_open) }}</td>

                                        <td>
                                            @if($item->enabled==1)
                                                @lang('admin.enabled')
                                                @else
                                            @lang('admin.disabled')
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->visible==1)
                                                @lang('admin.public')
                                                @else
                                                @lang('admin.private')
                                            @endif

                                        </td>

                                        <td>


                                            <a class="btn btn-sm btn-success" href="{{ route('dept.members',['department'=>$item->id]) }}"> <i class="fa fa-users" aria-hidden="true"></i>   @lang('admin.manage-members')</a>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>    @lang('admin.actions') <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ url('/admin/departments/' . $item->id) }}" title="@lang('site.view') @lang('site.department')">@lang('site.view')</a></li>
                                                    <li> <a href="{{ url('/admin/departments/' . $item->id . '/edit') }}" title="@lang('site.edit') @lang('site.department')">@lang('site.edit')</a></li>

                                                </ul>
                                            </div>


                                            <form method="POST" action="{{ url('/admin/departments' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') @lang('site.department')" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('site.delete')</button>
                                            </form>
                                            <a class="btn btn-info" href="{{ route('site.department-login',['department'=>$item->id]) }}"><i class="fa fa-sign-in"></i> @lang('site.login')</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $departments->appends(['search' => Request::get('search'),'category'=>Request::get('category')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection