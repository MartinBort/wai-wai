<?php

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));


/*=========================*/
//	authenticated group    //
/*=========================*/
Route::group(array('before' => 'auth'), function() {

	//CSRF protection group
	Route::group(array('before' => 'csrf'), function() {

		//change password (POST)
		Route::post('/account/change-password', array(
		'as' 	=> 'account-change-password-post',
		'uses'	=> 'AccountController@postChangePassword'
		));

	});

	//change password (GET)
	Route::get('/account/change-password', array(
		'as' 	=> 'account-change-password',
		'uses'	=> 'AccountController@getChangePassword'
		));

	//sign out (GET)
	Route::get('/account/sign-out', array(
		'as' 	=> 'account-sign-out',
		'uses'	=> 'AccountController@getSignOut'
		));

});


/*=========================*/
//	unauthenticated group  //
/*=========================*/

Route::group(array('before' => 'guest'), function() {

	//Cross-site Request Forgery group --LOOK INTO THIS--
	Route::group(array('before' => 'csrf'), function() {

		//create account (POST)
		Route::post('/account/create', array(

			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		//sign in (POST)
		Route::post('account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		//forgot password (POST)
		Route::post('account/forgot-password', array(
			'as' 	=> 'account-forgot-password-post',
			'uses'	=> 'AccountController@postForgotPassword'
		));

	});


	//forgot password (GET)
	Route::get('account/forgot-password', array(
		'as' 	=> 'account-forgot-password',
		'uses'	=> 'AccountController@getForgotPassword'
	));

	//link route from email to recover p-word
	Route::get('/account/recover/{code}', array(
		'as' 	=> 'account-recover',
		'uses' 	=> 'AccountController@getRecover'
	));


	//sign in (GET)
	Route::get('account/sign-in', array(
			'as' => 'account-sign-in',
			'uses' => 'AccountController@getSignIn'
	));


	//create account (GET)
	Route::get('/account/create', array(

		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));


	//activate user account
	Route::get('/account/activate/{code}', array(
			'as' 	=> 'account-activate',
			'uses' 	=> 'AccountController@getActivate'

		));
});