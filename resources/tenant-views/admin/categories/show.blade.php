@extends('layouts.admin')
@section('pageTitle',__('admin.categories'))

@section('innerTitle')
     @lang('admin.category') #{{ $category->id }}
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin.dashboard') }}">@lang('admin.dashboard')</a> <span class="bread-slash">/</span>
    </li>
    <li><a href="{{ url('/admin/categories') }}">@lang('admin.categories')</a> <span class="bread-slash">/</span>
    </li>
    <li><span class="bread-blod">@lang('admin.category')</span>
    </li>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">


        <div class="container-fluid">
            <div class="product-payment-inner-st form-content">


            <div class="card">
                <div class="card-body">

                    <a href="{{ url('/admin/categories') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('admin.back')</button></a>
                    <a href="{{ url('/admin/categories/' . $category->id . '/edit') }}" title="Edit category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('admin.edit')</button></a>

                    <form method="POST" action="{{ url('admin/categories' . '/' . $category->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete category" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('admin.delete')</button>
                    </form>
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th>@lang('admin.id')</th><td>{{ $category->id }}</td>
                            </tr>
                            <tr><th> @lang('admin.name') </th><td> {{ $category->name }} </td></tr><tr><th> @lang('admin.description') </th><td> {!! clean( $category->description) !!} </td></tr><tr><th> @lang('admin.sort-order') </th><td> {{ $category->sort_order }} </td></tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            </div>
        </div>


    </div>
@endsection