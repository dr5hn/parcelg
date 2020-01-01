<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProvidersFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courier_providers', function (Blueprint $table) {
            $table->text('logo')->after('pan_number')->nullable()->default(null);
            $table->year('establishment_year')->after('logo')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courier_providers', function (Blueprint $table) {
            //
        });
    }
}
