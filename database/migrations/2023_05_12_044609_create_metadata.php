<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetadata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metadata', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('english_name');
            $table->string('keywords');
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
        Schema::dropIfExists('metadata');
    }
}
