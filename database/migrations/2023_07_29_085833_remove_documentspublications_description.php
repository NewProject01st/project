<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveDocumentspublicationsDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table exists
        if (Schema::hasTable('documentspublications')) {

            // Remove the unnecessary columns
            Schema::table('documentspublications', function (Blueprint $table) {
                $table->dropColumn('english_description');
                $table->dropColumn('marathi_description');
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
        Schema::table('documentspublications', function (Blueprint $table) {
            $table->text('english_description')->nullable();
            $table->text('marathi_description')->nullable();
        });
    }
}
