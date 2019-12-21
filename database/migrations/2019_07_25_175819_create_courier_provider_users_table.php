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
            $table->integer('provider')->unsigned();
            $table->unsignedBigInteger('user');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('provider')->references('id')->on('courier_providers');
            $table->foreign('user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courier_provider_users');
    }
}
