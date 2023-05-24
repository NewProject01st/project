<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddmoreEmergencyContactNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addmore_emergency_contact_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emergency_contact_id');
            $table->string('english_emergency_contact_title');
            $table->string('marathi_emergency_contact_title');
            $table->string('english_emergency_contact_number');
            $table->string('marathi_emergency_contact_number');
            $table->string('is_deleted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreign('emergency_contact_id')->references('id')->on('emergency_contact_numbers')->onDelete('cascade');
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
        Schema::dropIfExists('addmore_emergency_contact_numbers');
    }
}
