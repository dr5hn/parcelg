<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsignmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('provider_id')->unsigned();
            $table->integer('consignment_type_id')->unsigned();
            $table->integer('delivery_type_id')->unsigned();
            $table->double('rate');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('provider_id')->references('id')->on('courier_providers');
            $table->foreign('consignment_type_id')->references('id')->on('consignment_types');
            $table->foreign('delivery_type_id')->references('id')->on('delivery_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('consignments');
    }
}
