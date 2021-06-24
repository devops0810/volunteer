<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartmentFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
        public function up()
        {
            Schema::create('department_fields', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->string('name');
                $table->string('type');
                $table->integer('sort_order')->nullable();
                $table->text('options')->nullable();
                $table->text('required')->nullable();
                $table->text('placeholder')->nullable();
                $table->boolean('enabled')->default(1);

            });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_fields');
    }
}
