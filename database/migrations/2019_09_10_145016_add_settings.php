<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('label');
        });

        \App\Models\Setting::insert(
            [
                ['key'=>'general_site_name','type'=>'text','options'=>''],
                ['key'=>'general_homepage_title','type'=>'text','options'=>''],
                ['key'=>'general_homepage_meta_desc','type'=>'textarea','options'=>''],
                ['key'=>'general_admin_email','type'=>'text','options'=>''],
                ['key'=>'general_address','type'=>'textarea','options'=>''],
                ['key'=>'general_tel','type'=>'text','options'=>''],
                ['key'=>'general_contact_email','type'=>'text','options'=>''],
                ['key'=>'general_enable_registration','type'=>'radio','options'=>'1=Yes,0=No'],
                ['key'=>'general_header_scripts','type'=>'textarea','options'=>''],
                ['key'=>'general_footer_scripts','type'=>'textarea','options'=>''],
                ['key'=>'image_logo','type'=>'image','options'=>''],
                ['key'=>'image_icon','type'=>'image','options'=>''],
                ['key'=>'mail_protocol','type'=>'select','options'=>'mail=Mail,smtp=SMTP'],
                ['key'=>'mail_smtp_host','type'=>'text','options'=>''],
                ['key'=>'mail_smtp_username','type'=>'text','options'=>''],
                ['key'=>'mail_smtp_password','type'=>'text','options'=>''],
                ['key'=>'mail_smtp_port','type'=>'text','options'=>''],
                ['key'=>'mail_smtp_timeout','type'=>'text','options'=>''],
                ['key'=>'trial_enabled','type'=>'text','options'=>''],
                ['key'=>'trial_package_duration_id','type'=>'text','options'=>''],
                ['key'=>'trial_days','type'=>'text','options'=>'']
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
