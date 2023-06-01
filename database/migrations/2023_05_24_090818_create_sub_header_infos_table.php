<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubHeaderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_header_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo');
            // $table->string('english_tollfree_title');
            // $table->string('marathi_tollfree_title');
            $table->string('english_tollfree_no');
            $table->string('marathi_tollfree_no');
            // $table->string('english_city_title');
            // $table->string('marathi_city_title');
            $table->string('english_city');
            $table->string('marathi_city');
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
        Schema::dropIfExists('sub_header_infos');
    }
}