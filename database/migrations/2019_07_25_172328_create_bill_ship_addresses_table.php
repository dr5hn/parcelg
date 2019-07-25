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
            $table->string('flat_no');
            $table->string('building');
            $table->string('street');
            $table->string('pincode');
            $table->string('area');
            $table->integer('city')->unsigned();
            $table->integer('state')->unsigned();
            $table->integer('country')->unsigned();
            $table->string('type');
            $table->decimal('latitude');
            $table->decimal('longitude');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('city')->references(' id')->on('cities');
            $table->foreign('state')->references(' id')->on('states');
            $table->foreign('country')->references(' id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bill_ship_addresses');
    }
}
