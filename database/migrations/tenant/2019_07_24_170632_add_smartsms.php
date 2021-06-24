<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSmartsms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $smsGateway = \App\SmsGateway::create([
            'gateway_name'=>'Smart SMS Solutions',
            'url'=>'http://smartsmssolutions.com',
            'code'=>'smartsms'
        ]);

        $smsGateway->smsGatewayFields()->saveMany([
            new \App\SmsGatewayField([
                'key'=>'username',
                'type'=>'text',
            ]),
            new \App\SmsGatewayField([
                'key'=>'password',
                'type'=>'text',
            ])
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
