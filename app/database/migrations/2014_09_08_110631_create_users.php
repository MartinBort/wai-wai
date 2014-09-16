<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	public function up()
	{
		Schema::create('users', function($table)
	    {
	        $table->increments('id');
	        $table->string('email');
	        $table->string('username', 20);
	        $table->string('password', 60);
	        $table->string('password_temp', 60);
	        $table->string('code');
	        $table->string('remember_token', 100)->nullable()
	        $table->integer('active');
	        $table->timestamps();
	       
	    });
	}

	public function down()
	{
		Schema::drop('users');
	}

}
