<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicWebPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_web_pages', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('menu_type')->default('null');
            $table->unsignedBigInteger('menu_id')->default(0);
            $table->string('menu_name')->default('null');
            $table->string('slug')->unique();
            $table->string('actual_page_name_marathi')->unique();
            $table->string('actual_page_name_english')->unique();
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
        Schema::dropIfExists('dynamic_web_pages');
    }
}
