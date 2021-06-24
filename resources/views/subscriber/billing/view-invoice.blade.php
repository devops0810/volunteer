@extends('layouts.account-page')
@section('pageTitle',__('saas.invoice'))
    @section('page-content')

        <div class="row">
            <div class="col-md-12">

                <a href="{{ url('/account/billing/invoices') }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
                <br />
                <br />

                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        <h4>Invoice</h4>
                    </div> -->
                    <div class="panel-body">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h3>
                                    @if(!empty(setting('image_logo')))
                                        <img src="{{ asset(setting('image_logo')) }}"  height="44">
                                    @else
                                        <h1>{{ setting('general_site_name') }}</h1>
                                    @endif
                                </h3>
                            </div>
                            <div class="pull-right">
                                <h4>@lang('saas.invoice') # <br>
                                    <strong>{{ $invoice->id }}</strong>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">

                                <div class="pull-left m-t-30">
                                    <address>
                                        <strong>{{ $address->name }}</strong><br>
                                        {{ $address->address }}<br>
                                        {{ $address->address2 }}<br>
                                        <abbr title="Phone">P:</abbr> {{ $address->phone }}
                                    </address>
                                </div>
                                <div class="pull-right m-t-30">
                                    <p><strong>@lang('saas.order-date'): </strong> {{ $invoice->created_at }}</p>
                                    <p><strong>@lang('saas.order-status'): </strong>
                                        @if($invoice->paid==0)
                                        <span class="label label-danger">@lang('saas.unpaid')</span>
                                            @else
                                            <span class="label label-success">@lang('saas.paid')</span>
                                        @endif
                                    </p>
                                    <p><strong>@lang('saas.order-id'): </strong> #{{ $invoice->id }}</p>
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="m-h-50"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table m-t-30">
                                        <thead>
                                        <tr>
                                            <th>@lang('saas.item')</th>
                                            <th>@lang('saas.quantity')</th>
                                            <th>@lang('saas.unit-cost')</th>
                                            <th>@lang('saas.total')</th>
                                        </tr></thead>
                                        <tbody>
                                        <tr>

                                            <td>{{ $invoice->invoicePurpose->purpose }}</td>
                                            <td>1</td>
                                            <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
                                            <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">

                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-6 offset-md-3">
                                <p class="text-right"><b>Sub-total:</b> {{ price($invoice->amount,$invoice->currency_id) }}</p>

                                <hr>
                                <h3 class="text-right">{!! clean(  $invoice->currency->country->symbol_left) !!}  {{ number_format(priceRaw($invoice->amount,$invoice->currency_id),2) }}</h3>
                            </div>
                        </div>
                        <hr>
                        <div class="hidden-print">
                            <div class="float-right">
                                <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                              @if($invoice->paid==0)
                                <a href="{{ route('user.billing.pay',['invoice'=>$invoice->id]) }}" class="btn btn-primary waves-effect waves-light">Pay Now</a>
                          @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endsection
