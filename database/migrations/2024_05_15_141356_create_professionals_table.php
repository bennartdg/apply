<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('role_title');
            $table->string('company_location');
            $table->text('company_description')->nullable();
            $table->string('start_month');
            $table->string('start_year');
            $table->string('end_month')->nullable();
            $table->string('end_year')->nullable();
            $table->boolean('currently_work')->nullable();
            $table->text('work_achievement');
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
        Schema::dropIfExists('professionals');
    }
}
