<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('cates', function (Blueprint $table) {
	        $table->increments('id');
	        $table->string('name')->unique();
	        $table->string('slug');
	        $table->string('icon');
	        $table->string('image');
	        $table->integer('order');
	        $table->integer('parent_id');
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
        Schema::drop('cates');
    }
}
