@extends('layouts.admin-page')

@section('search-form')
    <!-- Form -->
    <form  method="GET" action="{{ url('/admin/help-posts') }}"  class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input value="{{ request('search') }}" name="search"  class="form-control" placeholder="@lang('admin.search')" type="text">
            </div>
        </div>
    </form>
@endsection

@section('pageTitle',__('saas.documentation'))
@section('page-title',__('saas.documentation'))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="{{ url('/admin/help-posts/create') }}" class="btn btn-success btn-sm" title="@lang('saas.add-new') helpPost">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('saas.add-new')
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@lang('saas.title')</th><th>@lang('saas.sort-order')</th><th>@lang('saas.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($helpposts as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td>{{ $item->sort_order }}</td>
                                        <td>
                                            <a href="{{ url('/admin/help-posts/' . $item->id) }}" title="@lang('saas.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                            <a href="{{ url('/admin/help-posts/' . $item->id . '/edit') }}" title="@lang('saas.edit')"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                                            <form method="POST" action="{{ url('/admin/help-posts' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete')" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean( $helpposts->appends(['search' => Request::get('search')])->render()) !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
