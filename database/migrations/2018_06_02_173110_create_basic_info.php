<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasicInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_basic_info', function (Blueprint $table) {
            $table->increments('info_id');
            $table->string('profile_pic')->nullable();
            $table->integer('uid');
            $table->longText('headline');
            $table->integer('position_id');
            $table->integer('educ_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('loc_id');
            $table->string('zipcode');
            $table->integer('industry_id');
            $table->string('tel_no');
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
        Schema::dropIfExists('users_basic_info');
    }
}
