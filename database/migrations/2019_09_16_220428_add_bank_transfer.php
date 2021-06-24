<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBankTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
             $table->boolean('translate')->default(0);
        });

        \App\Models\PaymentMethod::create([
            'name'=>'Bank Transfer',
            'status'=>1,
            'code'=>'bank',
            'translate'=>1,
            'method_label'=>'Bank Transfer',
            'sort_order'=>1
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            //
        });
    }
}
