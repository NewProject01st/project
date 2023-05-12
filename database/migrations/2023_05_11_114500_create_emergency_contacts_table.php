<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emergency_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('english_name');
            $table->string('marathi_name');
            $table->string('english_address');
            $table->string('marathi_address');
            $table->string('email');
            $table->bigInteger('english_number');
            $table->bigInteger('marathi_number');
            $table->bigInteger('english_landline_no');
            $table->bigInteger('marathi_landline_no');
            $table->string('is_deleted')->default(true);
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
        Schema::dropIfExists('emergency_contacts');
    }
}