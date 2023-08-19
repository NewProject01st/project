<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteContactDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_contact_department', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('department_english_name');
            $table->string('department_marathi_name');
            $table->text('department_english_address');
            $table->text('department_marathi_address');
            $table->string('department_email');
            $table->string('department_english_contact_number');
            $table->string('department_marathi_contact_number');
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
        Schema::dropIfExists('website_contact_department');
    }
}
