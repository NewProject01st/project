<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGovtHospitals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('govt_hospitals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hospital_english_type');
            // $table->string('hospital_marathi_type');
            $table->string('english_name');
            $table->string('marathi_name');
            $table->string('english_area');
            $table->string('marathi_area');
            $table->text('english_address');
            $table->text('marathi_address');
            $table->string('marathi_phone');
            $table->string('english_phone');
            $table->string('email');
            $table->string('marathi_pincode');
            $table->string('english_pincode');
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
        Schema::dropIfExists('govt_hospitals');
    }
}
