<?php
class ProfileController extends BaseController {

	public function user($username) {
		$user = User::where('username', '=', $username); //query

		if($user->count()) { //if exist in DB
			$user = $user->first(); //first record returned from query

			return View::make('profile.user')
				->with('user', $user);
		}

		return App::abort(404);
	}

	public function getUserHome() {

		$user_id 	= Auth::user()->id; //get id of user logged in
		$user 		= User::where('id', '=', $user_id)->first();

		return View::make('profile.user-home')->with('user', $user);

	}

	public function myFavourites() {

		$user_id 	= Auth::user()->id; //get id of user logged in
		$favourites = Favourite::where('user_id', '=', $user_id);

		return View::make('profile.user-favourites')->with('favourites', $favourites);

	}

	public function favourited() {

		//this function checks for if favourite already exists

		//get relevant data for DB insert
		$spot_id = Input::get('spot_id');
		$user_id = Auth::user()->id;

		//query DB if favourite exists
		$query = Favourite::where('spot_id', '=', $spot_id)
		    ->where('user_id', '=', $user_id);

		$check_favourites = $query->first();

		if (is_null($check_favourites)) {
		    //return ajax true
		    return json_encode(true);			    

		} else {
		    //return ajax false
		    return json_encode(false);	    
		}


	}

	public function favourites() {

			//this function adds or deleted favourite on click

			//get relevant data for DB insert
			$spot_id	= Input::get('spot_id');
			$spot_name 	= Input::get('spot_name');
			$user_id 	= Auth::user()->id;

			//query DB if favourite exists
			$query = Favourite::where('spot_id', '=', $spot_id)
			    ->where('user_id', '=', $user_id);

			$check_favourites = $query->first();

			if (is_null($check_favourites)) {
			    //doesnt exist - create record
			    $favourite 				= new Favourite;
			    $favourite->spot_id 	= $spot_id;
			    $favourite->spot_name 	= $spot_name;
			    $favourite->user_id 	= $user_id;
			    $favourite->save();

			    //return ajax true
			    return json_encode(true);			    

			} else {
			    // exists - delete record
			    $check_favourites->delete();
			    //return ajax false
			    return json_encode(false);	    
			}

	}



}