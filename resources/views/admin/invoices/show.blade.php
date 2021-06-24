@extends('layouts.admin-page')

@section('pageTitle',__('saas.invoice').' #'.$invoice->id)
@section('page-title',__('saas.invoice').' #'.$invoice->id)

@section('page-content')
    <div class="container-fluid">
        <div class="row">


            <div class="col-md-12">
                <div  >
                    <div  >

                        <a href="{{ url('/admin/invoices') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                        <a href="{{ url('/admin/invoices/' . $invoice->id . '/edit') }}" title="Edit invoice"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> @lang('saas.edit')</button></a>

                        <form method="POST" action="{{ url('admin/invoices' . '/' . $invoice->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="@lang('saas.delete') invoice" onclick="return confirm(&quot;@lang('saas.confirm-delete')?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> @lang('saas.delete')</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>@lang('saas.id')</th><td>{{ $invoice->id }}</td>
                                    </tr>
                                    <tr><th> @lang('saas.subscriber') </th><td> {{ $invoice->user->name }} ({{ $invoice->user->email }})</td></tr>
                                    <tr><th> @lang('saas.amount') </th><td> {{ price($invoice->amount,$invoice->currency_id) }} </td></tr>
                                    <tr><th> @lang('saas.item') </th><td> {{ $invoice->invoicePurpose->purpose }} - {{ $controller->getInvoiceItemName($invoice->id) }} </td></tr>
                                <tr>
                                    <th>@lang('saas.status')</th>
                                    <td>{{ ($invoice->paid==1)? __('saas.paid'):__('saas.unpaid') }}</td>
                                </tr>
                                    @if($invoice->paymentMethod()->exists())
                                        <tr>
                                            <th>@lang('saas.payment-method')</th>
                                            <td>{{ $invoice->paymentMethod->name }}</td>
                                        </tr>

                                        @endif
                                <tr>
                                    <th>@lang('saas.currency')</th>
                                    <td>{{ $invoice->currency->country->currency_name }} ({{ $invoice->currency->country->currency_code }})</td>
                                </tr>
                                <tr>
                                    <th>@lang('saas.expires')</th>
                                    <td>{{ showDate('d/M/Y',$invoice->expires) }}</td>
                                </tr>
                                    <tr>
                                        <th>@lang('saas.due-date')</th>
                                        <td>{{ showDate('d/M/Y',$invoice->due_date) }}</td>
                                    </tr>
                                    <tr>
                                        <th>@lang('saas.notes')</th>
                                        <td>{{ $invoice->extra }}</td>
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
