<?php

class Spot extends eloquent
{
	protected $primaryKey = "spot_id"; //change primary key from "id" to "spot_id"

	//define relationship between tables
	public function tags() {

		return $this->hasMany('Tag'); 
	}

}