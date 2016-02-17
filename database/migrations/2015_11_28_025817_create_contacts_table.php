<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contacts', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('your_name'); 
	        $table->string('email');
	        $table->longText('content');
	        $table->string('seen');
	        $table->string('answer');
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
         Schema::drop('contacts');
    }
}
