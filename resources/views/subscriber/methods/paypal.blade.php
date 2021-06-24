@extends('subscriber.billing.checkout')
@section('payment-form')
    @if($invoice->invoice_purpose_id==1 && \App\Models\PackageDuration::find($invoice->item_id))
         <a class="btn btn-block btn-lg btn-success" href="{{ route('user.paypal.setup') }}"><i class="fa fa-credit-card"></i> @lang('saas.make-payment')</a>
    @endif
@endsection



