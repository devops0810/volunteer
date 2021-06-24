@extends('layouts.admin-page')

@section('pageTitle',__('saas.feature').' #'.$feature->id)
@section('page-title',__('saas.feature').' #'.$feature->id)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/features') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/features/' . $feature->id . '/edit') }}" title="Edit feature"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/features' . '/' . $feature->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') feature" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $feature->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.menu-title') </th><td> {{ $feature->menu_title }} </td></tr><tr><th> @lang('saas.page-title') </th><td> {{ $feature->page_title }} </td></tr><tr><th> @lang('saas.content') </th><td> {!! clean( $feature->content) !!} </td></tr>
                                <tr>
                                    <th>@lang('saas.sort-order')</th>
                                    <td>{{ $feature->sort_order }}</td>
                                </tr>
                                <tr>
                                    <th>@lang('saas.meta-title')</th>
                                    <td>{{ $feature->meta_title }}</td>
                                </tr>
                                    <tr>
                                        <th>@lang('saas.meta-description')</th>
                                        <td>{{ $feature->meta_description }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
