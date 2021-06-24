<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendername extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $gateway = \App\SmsGateway::where('code','smartsms')->first();

        $gateway->smsGatewayFields()->save(new \App\SmsGatewayField([
            'key'=>'sender_name',
            'type'=>'text'
        ]));
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
