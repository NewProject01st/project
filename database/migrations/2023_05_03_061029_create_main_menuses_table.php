<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainMenusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_menuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu_name_marathi')->unique();
            $table->string('menu_name_english')->unique();
            $table->string('order_no');
            $table->string('url');
            $table->boolean('is_active')->default(true);
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
        Schema::dropIfExists('main_menuses');
    }
}