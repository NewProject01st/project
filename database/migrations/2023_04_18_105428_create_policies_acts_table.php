<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoliciesActsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('policies_acts', function (Blueprint $table) {
            $table->id();
            $table->string('english_title');
            $table->string('marathi_title');
            $table->string('english_description');
            $table->string('marathi_description');
            $table->string('english_pdf');
            $table->string('marathi_pdf');
            // $table->enum('status', ['active', 'inactive']); 
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
        Schema::dropIfExists('policies_acts');
    }
}
