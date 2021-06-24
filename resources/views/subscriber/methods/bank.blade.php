@extends('subscriber.billing.checkout')
@section('payment-form')
{!! clean( nl2br(clean(paymentSetting(4,'details')))) !!}
@endsection



