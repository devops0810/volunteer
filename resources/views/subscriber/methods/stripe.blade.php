@extends('subscriber.billing.checkout')
@section('payment-form')
    @if($invoice->invoice_purpose_id==1 && \App\Models\PackageDuration::find($invoice->item_id))
        <button type="button" id="paymentbtn" class="btn btn-block btn-lg btn-success"><i class="fa fa-credit-card"></i> @lang('saas.make-payment')</button>

    @endif
@endsection

@section('header')
    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('footer')
    @if($invoice->invoice_purpose_id==1 && \App\Models\PackageDuration::find($invoice->item_id))
         <script>
            $(function(){
                var stripe = Stripe('{{ paymentSetting($invoice->payment_method_id,'publishable_key') }}');

                $('#paymentbtn').click(function(e){
                    console.log('button clicked');
                    e.preventDefault();

                    stripe.redirectToCheckout({
                        items: [{
                            plan: '{{ \App\Models\PackageDuration::find($invoice->item_id)->stripe_plan  }}',
                            quantity: 1
                        }],
                        successUrl: '{{ route('user.invoice.payment-complete')  }}',
                        cancelUrl: '{{ route('user.invoice.cart') }}',
                        clientReferenceId: '{{ $invoice->id }}'
                    }).then(function (result) {
                        // If `redirectToCheckout` fails due to a browser or network
                        // error, display the localized error message to your customer
                        // using `result.error.message`.
                        alert(result.error.message);
                    });

                });

                            });
        </script>
    @endif

@endsection
