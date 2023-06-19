<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAPGISDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_a_p_g_i_s_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('english_police_station');
            $table->string('marathi_police_station');
            $table->string('english_address');
            $table->string('marathi_address');
            $table->string('is_deleted')->default(false);
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
        Schema::dropIfExists('m_a_p_g_i_s_data');
    }
}