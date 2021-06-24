@extends('layouts.admin-page')

@section('pageTitle',__('saas.help-category').' #'.$helpcategory->name)
@section('page-title',__('saas.help-category').' #'.$helpcategory->name)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/help-categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/help-categories/' . $helpcategory->id . '/edit') }}" title="Edit helpCategory"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/helpcategories' . '/' . $helpcategory->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') helpCategory" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $helpcategory->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.name') </th><td> {{ $helpcategory->name }} </td></tr><tr><th> @lang('saas.sort-order') </th><td> {{ $helpcategory->sort_order }} </td></tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
