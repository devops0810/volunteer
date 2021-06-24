@extends('admin.billing.checkout')
@section('payment-methods','(Online Payment)')
@section('payment-form')
    <p><small>Click to make payment now. Payments are processed securely by <a
                    target="_blank"         href="https://rave.flutterwave.com">Rave</a></small></p>
    <form>
        <a class="flwpug_getpaid  pull-right"
           data-PBFPubKey="{{ env('RAVE_PK') }}"
           data-txref="rave-{{ $global_invoice->id }}-{{ time() }}"
           data-amount="{{ priceRaw($global_invoice->amount,$global_invoice->currency_id) }}"
           data-customer_email="{{ $user->email }}"
           data-customer_phonenumber="{{ $address->phone }}"
           data-currency="{{ strtoupper($global_invoice->currency->code) }}"
           data-country="{{ strtoupper($global_invoice->currency->country_code) }}"
           data-custom_logo="{{ asset('img/footericon.png') }}"
           data-redirect_url="{{ url('/admin/checkout/callback-rave') }}"></a>

        @if(env('RAVE_MODE')=='sandbox')
            <script type="text/javascript" src="https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
        @else
        <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
            @endif
    </form>
@endsection