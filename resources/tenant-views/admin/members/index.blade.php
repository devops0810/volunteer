@extends('layouts.admin')
@section('pageTitle',__('admin.members'))

@section('titleForm')
    <form id="nav-search" method="GET" action="{{ url('/admin/members') }}" role="search" class="sr-input-func">
        <input name="search" value="{{ request('search') }}" type="text" placeholder="{{ ucfirst(__('site.search')) }}..." class="search-int form-control">
        <a onClick="$('#nav-search').submit()" href="#"><i class="fa fa-search"></i></a>
        <input type="hidden" name="department" value="{{ request('department') }}"/>
    </form>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.members')</span>
    </li>
@endsection

@section('content')
    <div class="product-status mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-status-wrap">


                        <div class="row">
                            <div class="col-md-5">
                                <h4>@if($deptName) {{ $deptName }} @endif @lang('admin.members') ({{ $members->count() }}) @if(Request::get('search'))
                                        : {{ Request::get('search') }}
                                    @endif</h4>
                            </div>
                            <div class="col-md-3">
                                <form  method="POST" action="{{ route('members.export') }}" >
                                    @csrf
                                    <input name="search" value="{{ request('search') }}" type="hidden"  >
                                    <button class="btn btn-primary"><i class="fa fa-download"></i> @lang('admin.export')</button>
                                    <input type="hidden" name="department" value="{{ request('department') }}"/>
                                </form>
                            </div>
                            <div class="col-md-3" >
                                <form class="form-inline" method="GET" action="{{ url('/admin/members') }}" >
                                    <input type="hidden" name="search" value="{{ request('search') }}"/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <select style="max-width: 300px" class="form-control" name="department" id="department">
                                                    <option value="">@lang('admin.all-departments')</option>
                                                    @foreach(\App\Department::orderBy('name')->get() as $department)
                                                        <option @if(request('department')==$department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="col-md-4">

                                                <button type="submit" class="btn btn-primary">@lang('admin.filter')</button>

                                            </div>
                                        </div>


                                    </div>

                                </form>

                            </div>
                            <div class="col-md-1">
                                <div class="add-product_">
                                    <a class="btn btn-primary pull-right" title="@lang('site.create-new')  @lang('site.member')" href="{{ url('/admin/members/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> @lang('site.add-new')</a>
                                </div>

                            </div>
                        </div>




                        <div class="asset-inner">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th><th>@lang('admin.name')</th>
                                    <th>@lang('admin.picture')</th>
                                    <th>@lang('admin.email')</th> <th>@lang('admin.status')</th><th>@lang('site.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($members as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            @if(!empty($item->picture))
                                                <img src="{{ asset($item->picture) }}" class="img-responsive img-circle m-b" style="max-width: 200px"/>
                                                @else
                                                <img src="{{ avatar($item->gender) }}" class="img-responsive img-circle m-b"  style="max-width: 200px" />
                                                @endif
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if($item->status==1)
                                                @lang('admin.enabled')
                                            @else
                                                @lang('admin.disabled')
                                            @endif

                                        </td>
                                        <td>

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-cogs" aria-hidden="true"></i>    @lang('admin.actions') <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ url('/admin/members/' . $item->id) }}" title="@lang('site.view') @lang('admin.member')">@lang('site.view')</a></li>
                                                    <li> <a href="{{ url('/admin/members/' . $item->id . '/edit') }}" title="@lang('site.edit') @lang('admin.member')">@lang('site.edit')</a></li>

                                                </ul>
                                            </div>




                                            <div class="btn-group">
                                                <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-envelope" aria-hidden="true"></i>    @lang('admin.contact') <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu">

                                                    <li><a href="{{ url('admin/emails/create') }}?user={{ $item->id }}" >@lang('admin.email')</a></li>
                                                    <li> <a href="{{ url('admin/sms/create') }}?user={{ $item->id }}" >@lang('admin.sms')</a></li>
                                                </ul>
                                            </div>

                                            <form method="POST" action="{{ url('/admin/members' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('site.delete') @lang('admin.member')" onclick="return confirm(&quot;@lang('admin.delete-prompt')&quot;)"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="custom-pagination">
                            {!! clean( $members->appends(['search' => Request::get('search')])->render()) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('header')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

@endsection

@section('footer')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('select').select2();
        });
    </script>
@endsection

