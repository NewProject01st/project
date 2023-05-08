<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StateDisasterManagementAuthority  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_disaster_management _authority', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_image');
            $table->string('marathi_image');
            $table->string('is_deleted')->default(true);
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
        //
    }
}
