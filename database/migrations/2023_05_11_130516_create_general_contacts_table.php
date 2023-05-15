<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('english_name');
            $table->text('marathi_name');
            $table->bigInteger('english_number');
            $table->bigInteger('marathi_number');
            $table->string('english_icon');
            $table->string('marathi_icon');
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
        Schema::dropIfExists('general_contacts');
    }
}