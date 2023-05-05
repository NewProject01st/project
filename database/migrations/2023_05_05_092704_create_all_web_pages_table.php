<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllWebPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_web_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('main_menu_id');
            $table->unsignedBigInteger('sub_menu_id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('body');
            $table->boolean('is_active')->default(true);
            $table->foreign('main_menu_id')->references('id')->on('main_menuses')->onDelete('cascade');
            $table->foreign('sub_menu_id')->references('id')->on('main_sub_menuses')->onDelete('cascade');
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
        Schema::dropIfExists('all_web_pages');
    }
}
