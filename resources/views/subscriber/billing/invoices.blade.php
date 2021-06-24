@extends('layouts.account-page')
@section('pageTitle',__('saas.invoices'))
@section('page-title',__('saas.invoices'))

@section('page-content')

<div class="card-box">
    <div class="table-responsive">
    <table class="table-stripped table">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('saas.item')</th>
                <th>@lang('saas.amount')</th>
                <th>@lang('saas.created-on')</th>
                <th>@lang('saas.status')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
        <tr>
            <td>#{{ $invoice->id }}</td>
            <td>{{ $invoice->invoicePurpose->purpose }}</td>
            <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
            <td>{{ $invoice->created_at }}</td>
            <td>
                {{ ($invoice->paid==0)?__('saas.unpaid'):__('saas.paid') }}
            </td>
            <td>
                @if($invoice->paid==0)
                    <a class="btn btn-success" href="{{ route('user.billing.pay',['invoice'=>$invoice->id]) }}"><i class="fa fa-money-check"></i> @lang('saas.pay-now')</a>
                    @endif
                    <a class="btn btn-primary" href="{{ route('user.billing.invoice',['invoice'=>$invoice->id]) }}"><i class="fa fa-eye"></i> @lang('saas.view')</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $invoices->links() }}
</div>

        @endsection