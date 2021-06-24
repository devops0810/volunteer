@extends('admin.billing.checkout')
@section('payment-methods','(Credit Card/Paypal)')
@section('payment-form')
    <p><small>Click to make payment with your Credit Card or Paypal account. Payments are processed securely by <a
                    target="_blank"         href="https://2checkout.com">2checkout</a></small></p>
    <form id="2checkoutform" action='{{ config('2co.url') }}' method='post'>
        <input type='hidden' name='sid' value='{{ config('2co.id') }}' />
        <input type='hidden' name='mode' value='2CO' />
        <input type="hidden" name="currency_code" value="USD"/>
        <input type='hidden' name='li_0_type' value='product' />
        <input type='hidden' name='li_0_name' value='{{ $description }}' />
        <input type='hidden' name='li_0_price' value='{{ $global_invoice->amount }}' />
        <input type='hidden' name='li_0_tangible' value='N' />
        <input type='hidden' name='li_0_product_id' value='{{ $global_invoice->invoice_purpose_id }}-{{ $global_invoice->item_id }}' />
        <input type='hidden' name='x_receipt_link_url' value='{{ url('/admin/checkout/callback') }}' />
        <input type='hidden' name='card_holder_name' value='{{ $address->name }}' />
        <input type='hidden' name='street_address' value='{{ $address->address }}' />
        <input type='hidden' name='street_address2' value='{{ $address->address2 }}' />
        <input type='hidden' name='city' value='{{ $address->city }}' />
        <input type='hidden' name='state' value='{{ $address->state }}' />
        <input type='hidden' name='zip' value='{{ $address->zip }}' />
        <input type='hidden' name='country' value='{{ strtoupper($address->country->iso_code_3) }}' />
        <input type='hidden' name='email' value='{{ $user->email }}' />
        <input type='hidden' name='phone' value='{{ $address->phone }}' />
        <input type='hidden' name='merchant_order_id' value='{{ $global_invoice->id }}' />

        <input type="hidden" name="li_0_recurrence" value="{{ $item['record']->duration }}">
        <input type="hidden" name="li_0_duration" value="Forever">

        <button class="btn btn-success btn-block btn-lg">Make Payment</button>
    </form>
    <script src="https://www.2checkout.com/static/checkout/javascript/direct.min.js"></script>
@endsection