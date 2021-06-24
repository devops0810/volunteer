@extends('layouts.account-page')
@section('pageTitle',__('saas.cart'))
@section('page-title',__('saas.cart'))
@section('page-content')
    <div class="card-box">
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>@lang('saas.invoice-no')</th>
                <th>@lang('saas.item')</th>
                <th>@lang('saas.amount')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>#{{ $invoice->id }} </td>
                <td>{{ $description }} </td>
                <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
                <td><a  title="@lang('saas.delete')"  href="{{ route('user.invoice.cancel') }}"><i class="fa fa-trash"></i></a></td>
            </tr>


            </tbody>
        </table>
        </div>
        <form action="{{ route('user.invoice.set-method') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-4 offset-md-8">
                    <br/>
                    <ul class="list-group">
                        <li class="list-group-item active">@lang('saas.payment-methods')</li>
                        @foreach($paymentMethods as $method)
                        <li class="list-group-item" style="padding-left: 40px">

                            <input class="form-check-input" type="radio" name="method" id="method{{ $method->id }}" value="{{ $method->id }}">
                            <label style="width: 100%;" class="form-check-label" for="method{{ $method->id }}">
                                {{ $method->method_label }}
                            </label>


                        </li>
                            @endforeach

                    </ul>
                    <br/>
                </div>
            </div>
            <button class="btn btn-primary btn-lg float-right">@lang('saas.proceed-payment')</button>
        </form>

        <a style="margin-top: 30px" class="btn btn-sm" data-toggle="modal" data-target="#currencyModal" href="#">@lang('saas.change-currency')</a>
    </div>
    @endsection