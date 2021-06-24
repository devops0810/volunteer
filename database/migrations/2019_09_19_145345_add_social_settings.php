<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\Setting::create([
            'key'=>'social_facebook',
            'type'=>'text'
        ]);
        \App\Models\Setting::create([
            'key'=>'social_instagram',
            'type'=>'text'
        ]);

        \App\Models\Setting::create([
            'key'=>'social_twitter',
            'type'=>'text'
        ]);

        \App\Models\Setting::create([
            'key'=>'social_linkedin',
            'type'=>'text'
        ]);

        \App\Models\Setting::create([
            'key'=>'social_youtube',
            'type'=>'text'
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
