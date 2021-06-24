@extends('layouts.admin-page')



@section('pageTitle',__('saas.currencies'))
@section('page-title',__('saas.currencies'))

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div >
                    <div  >
                        <a href="{{ url('/admin/currencies/create') }}" class="btn btn-success btn-sm" title="@lang('saas.add-new') currency">
                            <i class="fa fa-plus" aria-hidden="true"></i> @lang('saas.add-new')
                        </a>



                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>@lang('saas.currency')</th><th>@lang('saas.exchange-rate')</th><th>@lang('saas.is-default')</th><th>@lang('saas.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($currencies as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->country->currency_name }} ({{ $item->country->currency_code }})</td><td>{{ $item->exchange_rate }}</td><td>{{ boolToString($item->is_default) }}</td>
                                        <td>
                                            <a href="{{ url('/admin/currencies/' . $item->id) }}" title="@lang('saas.view')"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> @lang('saas.view')</button></a>
                                            <a href="{{ url('/admin/currencies/' . $item->id . '/edit') }}" title="@lang('saas.edit')"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                                            <form method="POST" action="{{ url('/admin/currencies' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete')" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> @lang('saas.delete')</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! clean($currencies->appends(['search' => Request::get('search')])->render()) !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
