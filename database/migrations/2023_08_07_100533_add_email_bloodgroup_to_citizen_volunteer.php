<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailBloodgroupToCitizenVolunteer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('citizen_volunteer_modals', function (Blueprint $table) {
            $table->string('email_id')->default('null');
            $table->string('blood_group')->default('null');
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
            $table->dropColumn('email_id');
            $table->dropColumn('blood_group');
        });
    }
}
