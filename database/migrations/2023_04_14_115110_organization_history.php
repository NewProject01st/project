<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrganizationHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_chart', function (Blueprint $table) {
            $table->id();
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_image');
            $table->string('marathi_image');
            $table->string('is_Deleted');
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
