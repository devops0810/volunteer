@extends('layouts.account-page')
@section('pageTitle',__('saas.checkout'))
@section('page-title',__('saas.checkout'))

@section('page-content')
    <a href="{{ route('user.invoice.cart')  }}" title="@lang('saas.back')"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> @lang('saas.back')</button></a>
    <br />
    <br />

    <div class="row">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('saas.billing-address')</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>@lang('saas.selected-address')</h4>
                        <p><strong>@lang('saas.name'):</strong> {{ $address->name }}</p>
                        <p><strong>@lang('saas.telephone'):</strong> {{ $address->phone }}</p>
                        <p><strong>@lang('saas.street-address'):</strong> {{ $address->address }}</p>
                        @if(!empty($address->address2))
                            <p><strong>@lang('saas.street-address-2'):</strong> {{ $address->address2 }}</p>
                        @endif
                        <p><strong>@lang('saas.city'):</strong> {{ $address->city }}</p>
                        <p><strong>@lang('saas.state'):</strong> {{ $address->state }}</p>
                        <p><strong>@lang('saas.zip'):</strong> {{ $address->zip }}</p>
                        <p><strong>@lang('saas.country'):</strong> {{ $address->country->name }}</p>
                    </div>
                    <div class="col-md-6">
                    <h4>@lang('saas.change-address')</h4>
                        <div  >
                            <div style="margin-bottom: 20px"  >
                                <a class="btn btn-primary btn-sm" href="{{ route('user.invoice.change-address') }}">Select Saved Address</a>

                            </div>
                            <div style="margin-bottom: 20px"    >
                                <a class="btn btn-success btn-sm" href="{{ route('user.billing-address.create') }}">Create New Address</a>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>


    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fa fa-credit-card"></i> @lang('saas.payment'): {{ $invoice->paymentMethod->method_label }}</h3>
            </div>
            <div class="card-body">
                <p>
                    <table class="table table-stripped">
                    <tbody>
                    <tr>
                        <td><strong>@lang('saas.item'):</strong></td>
                        <td>{{ $description }}</td>
                    </tr>
                    <tr>
                        <td><strong>@lang('saas.amount'):</strong></td>
                        <td>{!! clean( price($invoice->amount,$invoice->currency_id)) !!}</td>
                    </tr>
                    </tbody>
                </table>
                </p>
                @yield('payment-form')

            </div>
        </div>
    </div>
</div>

@endsection
