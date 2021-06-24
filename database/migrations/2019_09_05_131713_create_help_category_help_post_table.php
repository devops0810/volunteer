<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpCategoryHelpPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_category_help_post', function (Blueprint $table) {
            $table->unsignedBigInteger('help_category_id');
            $table->foreign('help_category_id')->references('id')->on('help_categories')->onDelete('cascade');
            $table->unsignedBigInteger('help_post_id');
            $table->foreign('help_post_id')->references('id')->on('help_posts')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_category_help_post');
    }
}
