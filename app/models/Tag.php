<?php

class Tag extends eloquent
{
	//allow mass-assignment (see more: http://stackoverflow.com/questions/22280136/massassignmentexception-in-laravel )
	protected $fillable = array('user_id', 'tag_name');

	protected $primaryKey = "tag_id";	//change primary key from just "id"
}