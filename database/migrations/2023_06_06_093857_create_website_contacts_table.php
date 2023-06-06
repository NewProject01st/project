<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('address_english_title');
            $table->string('address_marathi_title');
            $table->string('english_address');
            $table->string('marathi_address');
            $table->string('email_title');
            $table->string('email');
            $table->string('contact_english_title');
            $table->string('contact_marathi_title');
            $table->string('english_contact');
            $table->string('marathi_contact');
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
        Schema::dropIfExists('website_contacts');
    }
}