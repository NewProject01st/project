<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHazardVulnerabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazard_vulnerabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('english_title');
            $table->text('marathi_title');
            $table->text('english_description');
            $table->text('marathi_description');
            $table->string('english_image')->default('null');
            $table->string('marathi_image')->default('null');
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
        Schema::dropIfExists('hazard_vulnerabilities');
    }
}