<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'first_name' => 'Bennart',
                'last_name' => 'Dem Gunawan',
                'email' => 'bennart.dgunawan@gmail.com',
                'password' => '$2y$10$1CR8g9EDPtb8ySifGq1fa.axUVJTxaDqBrLUyDziywrZ1aPoQWmA6',
                'username' => 'bennartdg',
                'status' => 'student',
            )
        );

        DB::table('users')->insert(
            array(
                'first_name' => 'R Moh Fahri',
                'last_name' => 'Aqila Putra',
                'email' => 'fahri@gmail.com',
                'password' => '$2y$10$PwmLo7zlZqZz4jbAR.grCeDf7/8eRWyeMy0.YyTaukVKDy926HKEy',
                'username' => 'fahrikun',
                'status' => 'student',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
