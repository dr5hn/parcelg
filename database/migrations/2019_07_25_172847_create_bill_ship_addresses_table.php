<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBillShipAddressesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_ship_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('flat_no')->nullable();
            $table->string('building')->nullable();
            $table->string('street');
            $table->string('pincode');
            $table->string('area');
            $table->integer('city')->unsigned();
            $table->integer('state')->unsigned();
            $table->integer('country')->unsigned();
            $table->unsignedBigInteger('user');
            $table->string('type');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('city')->references('id')->on('cities');
            $table->foreign('state')->references('id')->on('states');
            $table->foreign('country')->references('id')->on('countries');
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
        Schema::dropIfExists('bill_ship_addresses');
    }
}
