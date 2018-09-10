<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkExpi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_experience', function (Blueprint $table) {
            $table->increments('work_id');
            $table->integer('uid');
            $table->string('title');
            $table->string('company');
            $table->string('location');
            $table->string('country');
            $table->string('from_month');
            $table->string('from_year');
            $table->string('to_month');
            $table->string('to_year');
            $table->integer('status');
            $table->integer('industry');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_experience');
    }
}
