<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBulksms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $smsGateway = \App\SmsGateway::create([
            'gateway_name'=>'Bulk SMS',
            'url'=>'https://www.bulksms.com',
            'code'=>'bulksms'
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
