<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelevantLawsRegulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relevant_laws_regulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('english_title');
            $table->text('marathi_title');
            $table->string('policies_year');
            $table->string('url')->default('null');
            $table->string('english_pdf')->default('null');
            $table->string('marathi_pdf')->default('null'); 
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
        Schema::dropIfExists('relevant_laws_regulations');
    }
}