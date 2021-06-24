<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateMemberCount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $prefix = \Illuminate\Support\Facades\DB::getTablePrefix();
        \Illuminate\Support\Facades\DB::statement("UPDATE {$prefix}settings SET sort_order=1 where {$prefix}settings.key='general_member_count'");

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
