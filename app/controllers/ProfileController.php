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


}