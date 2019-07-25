<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCourierProvidersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('business_name');
            $table->string('gst_number')->nullable();
            $table->string('pan_number')->nullable();
            $table->integer('owner_user_id')->unsigned();
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('owner_user_id')->references(' id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courier_providers');
    }
}
