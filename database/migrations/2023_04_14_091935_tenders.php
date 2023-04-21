<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('tender_date');
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_description');
            $table->string('marathi_description');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('open_date');
            $table->string('tender_number');
            $table->string('english_pdf');
            $table->string('marathi_pdf');            
            $table->string('is_deleted')->default(false);
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
