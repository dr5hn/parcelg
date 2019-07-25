<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourierProviderUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_provider_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('provider_id')->references(' id')->on('courier_providers');
            $table->foreign('user_id')->references(' id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('courier_provider_users');
    }
}
