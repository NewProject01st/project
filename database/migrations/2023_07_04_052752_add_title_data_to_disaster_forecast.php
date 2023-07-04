<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleDataToDisasterForecast extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disaster_forecast', function (Blueprint $table) {
            $table->text('english_title')->nullable();
            $table->text('marathi_title')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disaster_forecast', function (Blueprint $table) {
            $table->dropColumn('english_title');
            $table->dropColumn('marathi_title');
        });
    }
}
