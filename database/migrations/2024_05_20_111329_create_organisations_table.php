<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_name');
            $table->string('position_title');
            $table->text('organisation_description')->nullable();
            $table->string('organisation_location');
            $table->string('organisation_start_month');
            $table->string('organisation_start_year');
            $table->string('organisation_end_month')->nullable();
            $table->string('organisation_end_year')->nullable();
            $table->boolean('currently_active')->nullable();
            $table->text('role_description');
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
        Schema::dropIfExists('organisations');
    }
}
