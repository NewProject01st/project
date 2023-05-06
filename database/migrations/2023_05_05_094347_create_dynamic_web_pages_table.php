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
            $table->unsignedBigInteger('main_menu_id');
            $table->unsignedBigInteger('sub_menu_id');
            $table->string('slug')->unique();
            $table->string('actual_page_name')->unique();
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
