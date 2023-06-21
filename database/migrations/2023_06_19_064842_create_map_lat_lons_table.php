<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapLatLonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('map_lat_lons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lat');
            $table->string('lon');
            $table->string('location_name_english');
            $table->string('location_name_marathi');
            $table->string('location_address_english');
            $table->string('location_address_marathi');
            $table->string('data_for')->default('police_station');
            $table->boolean('is_deleted')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('map_lat_lons');
    }
}