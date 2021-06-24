<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSendernameCg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $gateway = \App\SmsGateway::where('code','cheapglobal')->first();

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
