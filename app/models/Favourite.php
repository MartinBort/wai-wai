<?php

class Favourite extends eloquent
{
	protected $primaryKey = "fave_id"; //change primary key from "id" to "fave_id"

	//define relationship between tables
	public function favourites() {

		return $this->belongsTo('User');
	}

}