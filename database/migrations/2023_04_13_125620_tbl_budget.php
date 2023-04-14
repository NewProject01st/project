<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBudget extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_budget', function (Blueprint $table) {
            $table->id();
            $table->string('fld_english_title');
            $table->string('fld_marathi_title');
            $table->string('fld_english_description');
            $table->string('fld_marathi_description');
            $table->string('fld_isDeleted');
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
