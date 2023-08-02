<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveVacanciesUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('vacancies_headers')) {

            // Remove the unnecessary columns
            Schema::table('vacancies_headers', function (Blueprint $table) {
                $table->dropColumn('url');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert the changes made in the 'up' method
        Schema::table('vacancies_headers', function (Blueprint $table) {
            $table->text('url')->nullable();
        });
    }
}
