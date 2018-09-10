<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobPosting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_postings', function (Blueprint $table) {
            $table->increments('job_id');
            $table->string('position');
            $table->string('company');
            $table->text('job_function');
            $table->string('company_industry');
            $table->string('location');
            $table->enum('employment_type', ['Full-time', 'Part-time', 'Contract' , 'Temporary' , 'Volunteer' , 'Internship']);
            $table->enum('senority_level', ['Internship' , 'Entry Level', 'Associate' , 'Med-Senior level', 'Director', 'Executive']);
            $table->text('job_description');
            $table->string('expi_level');
            $table->string('degree');
            $table->integer('posted_by');
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
        Schema::dropIfExists('job_postings');
    }
}
