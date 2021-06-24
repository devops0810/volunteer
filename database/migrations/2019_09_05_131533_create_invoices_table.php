<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('invoice_purpose_id');
            $table->foreign('invoice_purpose_id')->references('id')->on('invoice_purposes')->onDelete('cascade');
            $table->float('amount');
            $table->boolean('paid');
            $table->integer('item_id')->nullable();
            $table->text('extra')->nullable();
            $table->boolean('auto')->default(0);
            $table->text('hash')->nullable();
            $table->integer('expires')->nullable();
            $table->integer('due_date')->nullable();
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
