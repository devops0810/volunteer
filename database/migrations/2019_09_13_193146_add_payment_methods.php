<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaymentMethods extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\PaymentMethod::create([
            'name'=>'Paypal',
            'code'=>'paypal',
            'sort_order'=>1,
            'method_label'=>'Paypal'
        ]);

        \App\Models\PaymentMethod::create([
            'name'=>'Stripe',
            'code'=>'stripe',
            'sort_order'=>1,
            'method_label'=>'Stripe'
        ]);

        \App\Models\PaymentMethod::create([
            'name'=>'2Checkout',
            'code'=>'2checkout',
            'sort_order'=>1,
            'method_label'=>'2Checkout'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
