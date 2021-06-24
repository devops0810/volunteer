<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSmsGateway extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sms_gateways', function (Blueprint $table) {
            $table->renameColumn('action','active');
        });

        \App\SmsGateway::create(
            [
                'gateway_name'=>'Clickatell',
                'url'=>'https://www.clickatell.com',
                'code'=>'clickatell',
                'active'=>0
            ]
        );
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
