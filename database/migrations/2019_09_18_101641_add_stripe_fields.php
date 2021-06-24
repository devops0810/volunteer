<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStripeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            \App\Models\PaymentMethodField::create([
                'key'=>'secret_key',
                'payment_method_id'=>2,
                'type'=>'text'
            ]);

            \App\Models\PaymentMethodField::create([
                'key'=>'publishable_key',
                'payment_method_id'=>2,
                'type'=>'text'
            ]);

            \App\Models\PaymentMethodField::create([
                'key'=>'endpoint_secret',
                'payment_method_id'=>2,
                'type'=>'text'
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
