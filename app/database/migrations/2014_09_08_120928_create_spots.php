<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpots extends Migration {

	public function up()
	{
		Schema::create('spots', function($table)
	    {
	        $table->increments('spot_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->decimal('latitude');
			$table->decimal('longitude');
			$table->string('spot_name');
			$table->string('location_notes');
			$table->string('comments');
			$table->float('ratings')->nullable();
			$table->timestaps();
	       
	    });
	}

	public function down()
	{
		Schema::drop('spots');
	}

}
