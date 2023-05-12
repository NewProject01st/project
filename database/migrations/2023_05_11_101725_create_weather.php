<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeather extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_description');
            $table->string('marathi_description');
            $table->string('weather_date');
            $table->string('expired_date');
            $table->string('url')->default('null');
            $table->string('english_image');
            $table->string('marathi_image');    
            $table->string('english_pdf');
            $table->string('marathi_pdf');    
            $table->string('is_deleted')->default(false);
            $table->boolean('is_active')->default(true);
            // Add more columns here
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
        Schema::dropIfExists('weather');
    }
}
