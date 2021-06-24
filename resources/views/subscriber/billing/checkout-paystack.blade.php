@extends('admin.billing.checkout')
@section('payment-methods','(Debit Cards/Funds Transfer)')
@section('payment-form')
    <div>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" style="font-size: 10px">Online Payment</a></li>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" style="font-size: 10px">Bank Deposit/Funds Transfer</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
                <p>
                    <small>Pay securely using your credit or debit cards, internet banking or bank account</small>
                </p>
                <div style="text-align: center">
                    <form action="{{ url('/admin/checkout/callback-paystack') }}" method="POST" >
                        <script
                                src="https://js.paystack.co/v1/inline.js"
                                data-key="{{ env('PAYSTACK_PK') }}"
                                data-email="{{ $user->email }}"
                                data-ref="{{ $global_invoice->id.'-'.time() }}"
                        @if(false)
                                data-amount="{{ priceRaw($global_invoice->amount,$global_invoice->currency_id) * 100 }}"
                                @endif
                                data-plan="{{ $item['record']->paystack_code }}"


                                >
                        </script>
                    </form>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="profile">

                <p>Please pay the sum of {!! clean( price($global_invoice->amount,$global_invoice->currency_id)) !!} into any of the following accounts. Please quote your invoice number in the narration of the transfer/deposit. Your invoice number is <b>{!! clean( $global_invoice->id) !!} </b> </p>

                <div class="box box-underline">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Bank 1<strong></strong></h4></header>

                    </div>
                    <div class="box-body">

                        <div>
                            <table class="table table-hover table-striped no-margin">

                                <tbody>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td>Guaranty Trust Bank</td>

                                </tr>

                                <tr>
                                    <td>Account Name:</td>
                                    <td>Intermatics Software Services</td>

                                </tr>

                                </tr>

                                <tr>
                                    <td>Account Number:</td>
                                    <td>0014199885</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>




                    </div>
                </div>



                <div class="box box-underline">
                    <div class="box-head">
                        <header>
                            <h4 class="text-light">Bank 2<strong></strong></h4></header>

                    </div>
                    <div class="box-body">

                        <div>
                            <table class="table table-hover table-striped no-margin">

                                <tbody>
                                <tr>
                                    <td>Bank Name:</td>
                                    <td>Access Bank PLC</td>

                                </tr>

                                <tr>
                                    <td>Account Name:</td>
                                    <td>Intermatics Software Services</td>

                                </tr>

                                </tr>

                                <tr>
                                    <td>Account Number:</td>
                                    <td>0013519618</td>

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