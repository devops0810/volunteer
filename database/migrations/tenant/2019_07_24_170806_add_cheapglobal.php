<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCheapglobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $smsGateway = \App\SmsGateway::create([
            'gateway_name'=>'Cheap Global SMS',
            'url'=>'https://cheapglobalsms.com',
            'code'=>'cheapglobal'
        ]);

        $smsGateway->smsGatewayFields()->saveMany([
            new \App\SmsGatewayField([
                'key'=>'sub_account',
                'type'=>'text',
            ]),
            new \App\SmsGatewayField([
                'key'=>'sub_account_pass',
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
