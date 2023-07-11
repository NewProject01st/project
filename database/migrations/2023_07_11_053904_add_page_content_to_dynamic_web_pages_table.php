<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPageContentToDynamicWebPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dynamic_web_pages', function (Blueprint $table) {
            $table->text('page_content_english')->default('null')->after('slug');
            $table->text('page_content_marathi')->default('null')->after('slug');
            $table->dropColumn('actual_page_name_marathi');
            $table->dropColumn('actual_page_name_english');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dynamic_web_pages', function (Blueprint $table) {
            $table->dropColumn('page_content_english');
            $table->dropColumn('page_content_marathi');
            $table->string('actual_page_name_marathi')->unique();
            $table->string('actual_page_name_english')->unique();
        });
    }
}
