<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteerCitizenSupportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_citizen_supports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('english_title');
            $table->text('marathi_title');
            $table->text('english_description');
            $table->text('marathi_description');
            $table->string('url')->default('null');
            $table->string('english_image');
            $table->string('marathi_image');
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
        Schema::dropIfExists('volunteer_citizen_supports');
    }
}