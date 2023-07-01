<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNgoDataToCitizenVolunteerModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_volunteer_modals', function (Blueprint $table) {
            $table->boolean('is_ngo')->default(false);
            $table->text('ngo_name');
            $table->text('ngo_email');
            $table->text('ngo_contact_number');
            $table->text('ngo_photo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('citizen_volunteer_modals', function (Blueprint $table) {
            $table->dropColumn('is_ngo');
            $table->dropColumn('ngo_name');
            $table->dropColumn('ngo_email');
            $table->dropColumn('ngo_contact_number');
            $table->dropColumn('ngo_photo');
        });
    }
}
