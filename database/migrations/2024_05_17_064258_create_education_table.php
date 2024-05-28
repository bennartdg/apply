<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('school_location');
            $table->string('education_start_month');
            $table->string('education_start_year');
            $table->string('education_end_month');
            $table->string('education_end_year');
            $table->string('education_level')->nullable();
            $table->string('education_description');
            $table->string('gpa')->nullable();
            $table->string('max_gpa')->nullable();
            $table->text('education_achievement');
            $table->foreignId('c_v_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('education');
    }
}
