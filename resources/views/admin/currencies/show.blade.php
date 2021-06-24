@extends('layouts.admin-page')

@section('pageTitle',__('saas.currency').' :'.$currency->country->currency_name)
@section('page-title',__('saas.currency').' :'.$currency->country->currency_name)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/currencies') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/currencies/' . $currency->id . '/edit') }}" title="Edit currency"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/currencies' . '/' . $currency->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') currency" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $currency->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.currency') </th><td> {{ $currency->country->currency_name }} ({{ $currency->country->currency_code }}) </td></tr><tr><th> @lang('saas.exchange-rate') </th><td> {{ $currency->exchange_rate }} </td></tr><tr><th> @lang('saas.is-default') </th><td> {{ boolToString($currency->is_default) }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
