<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('enroll_open')->default(0);
            $table->boolean('approval_required')->default(1);
            $table->string('picture')->nullable();
            $table->boolean('show_members')->default(1);
            $table->boolean('allow_members_communicate')->default(1);
            $table->boolean('enable_forum')->default(1);
            $table->boolean('allow_members_create_topics')->default(1);
            $table->boolean('enable_roster')->default(1);
            $table->boolean('enable_announcements')->default(1);
            $table->boolean('enable_resources')->default(1);
            $table->boolean('allow_members_upload')->default(1);
            $table->boolean('enable_blog')->default(1);
            $table->boolean('allow_members_post')->default(1);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
