<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObjectiveGoals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objective-goals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_description');
            $table->string('marathi_description');
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
