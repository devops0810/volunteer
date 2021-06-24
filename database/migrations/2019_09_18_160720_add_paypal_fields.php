<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPaypalFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\PaymentMethodField::create([
            'key'=>'client_id',
            'payment_method_id'=>1,
            'type'=>'text'
        ]);

        \App\Models\PaymentMethodField::create([
            'key'=>'secret',
            'payment_method_id'=>1,
            'type'=>'text'
        ]);

        \App\Models\PaymentMethodField::create([
            'key'=>'mode',
            'payment_method_id'=>1,
            'type'=>'select',
            'options'=>'live=Live,sandbox=Sandbox'
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
