<?php
class AccountController extends BaseController {

	public function getSignIn() {
		//show sign in form
		return View::make('account.signin');
	}

	public function postSignIn() {
		//process users login after getSignIn form submission
		$validator = Validator::make(input::all(),
				array(
					'email' 	=> 'required|email',
					'password' 	=> 'required'
					)
			);

			if($validator->fails()) {
				//redirect to sign in page
				return 	Redirect::route('account-sign-in')
						->withErrors($validator)
						->withInput();
			} else {
				//success
				$remember = (Input::has('remember')) ? true : false;  //remember user cookie with extended expiry date

				$auth = Auth::attempt(array(
					'email' 	=> Input::get('email'),
					'password'	=> Input::get('password'),
					'active'	=> 1
				), $remember);

				if($auth) {
					//redirect to page user intended to navigate to, prior to signin in (if not signed in)
					return Redirect::intended('/');
				} else {
					return Redirect::route('account-sign-in')
					->with('global', 'Email/password incorrect, or account not activated.');
				}
			}

			return Redirect::route('account-sign-in')
					->with('global', 'There was a problem signing you in.');
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate() {

		//create form
		return View::make('account.create');
	}

	public function postCreate() {

		//submit form    Input::all -> all data from form
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username'			=> 'required|max:20|min:3|unique:users',
				'password' 			=> 'required|min:6',
				'password_confirm'	=> 'required|same:password',
				)
			);

			if($validator->fails()) {

				return Redirect::route('account-create')
						->withErrors($validator)
						->withInput();

			} else {

				//create account
				$email 		= Input::get('email');
				$username 	= Input::get('username');
				$password 	= Input::get('password');

				//activation code for email
				$code		=  str_random(60); 

				$user = User::create(array(
						'email' 	=> $email,
						'username' 	=> $username,
						'password' 	=> Hash::make($password),
						'code' 		=> $code,
						'active' 	=> 0
					));

				if($user)	{

					//send email
					Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Activate your account');
					});
					
					return Redirect::route('home')
							->with('global', 'Your account has been created. An email has been sent to you to activate your account.');
				}

			}
	}

	public function getActivate($code) {

		//search for user where code passed from email matches code from database and only if user record has active field = 0
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first(); //pulls first result from database

			//Update user to active state
			$user->active 	= 1;
			$user->code 	= '';

			if($user->save()) {
				return Redirect::route('home')
				->with('global', 'Account activated, you can now sign in!');
			}
		}

	return Redirect::route('home')
		->with('global', 'We could not activate your account. Try again later.');

	}

	public function getChangePassword() {
		return View::make('account.password');
	}

	public function postChangePassword() {

		$validator = Validator::make(Input::all(),
			array(
				'old_password' 		=> 'required',
				'password' 			=> 'required|min:6',
				'password-confirm'	=> 'required|same:password'
				)
			);

			if($validator->fails()) {
				//redirect on fail
				return Redirect::route('account-change-password')
						->withErrors($validator);
			} else {
				//change password successful
				$user 			= User::find(Auth::user()->id);

				$old_password 	= Input::get('old_password');
				$password 		= Input::get('password');

				//check password user provided matches
				if(Hash::check($old_password, $user->getAuthPassword())) {
					
					$user->password = Hash::make($password);

					if($user->save()) {   //save will store new password in DB
						return Redirect::route('home')
							->with('global', 'Your password has been changed');
					}

				} else {
					return 	Redirect::route('account-change-password') ->with('global', 'Your old password is incorrect.');
				}

			}

			//fallback redirect (in case of database error outside of our control)
			return 	Redirect::route('account-change-password') ->with('global', 'Your password could not be changed.');

	}

	public function getForgotPassword() {
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email'
				)
			);

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')
			->withErrors($validator)
			->withInput();

		} else {
			$user = User::where('email', "=", Input::get('email')); //query DB

			if($user->count()){
				$user = $user->first(); //fetch first user generated by query result

				//generate a new code and password
				$code 					= str_random(60);
				$password 				= str_random(10);

				//assign to user record ready to be saved into DB
				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password);

				if($user->save()) {  //if DB record has been updated successfully

					//     send   this email view      with      activation url + code               &        user's username         &    new generated password      CLOSURE       use user Object        
					Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'username' =>$user->username, 'password' => $password), function($message) use ($user) {
						$message->to($user->email, $user->username)->subject('Your new password');
					});

					return 	Redirect::route('home')
						->with('global', 'We have sent a new password to your email address');
				}

			}

		}

		return Redirect::route('account-forgot-password')
			->with('global', 'Could not request new password');
	}

	public function getRecover($code){
		$user = User::where('code', '=', $code) //find user by code
			->where('password_temp', '!=', ''); //make sure user has a temp password

		if($user->count()) {  //does user exist
			$user = $user->first(); //first result of query

			$user->password 		= $user->password_temp;
			$user->password_temp 	= '';
			$user->code 			= '';

			if($user->save()) {
				return Redirect::route('home')
					->with('global','Your account has been recovered, please sign in with your new password.');
			}
		}

		return Redirect::route('home')
			->with('global','Could not recover your account.');
	}
}