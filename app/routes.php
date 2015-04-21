<?php

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@getHome'
));

//see user profile
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

		//tag spot (POST)
		Route::post('/account/new-spot', array(
		'as' 	=> 'create-spot',
		'uses'	=> 'SpotController@postCreateSpot'
		));

		//edit-spot (POST)
		Route::post('/spot', array(
			'as' => 'edit-spot-post',
			'uses' => 'SpotController@postEditSpot'
		));

	});

	//search by tags
	Route::get('/search/tags', array(
		'as'	=> 'search-tags',
		'uses'	=> 'SearchController@searchTags'
	));

	//search by spots
	Route::get('/search/spots', array(
		'as'	=> 'search-spots',
		'uses'	=> 'SearchController@searchSpots'
	));

	//search near me
	Route::get('/near-me', array(
		'as'	=> 'search-near-me',
		'uses'	=> 'SearchController@searchNearMe'
	));

	//favourited
	Route::get('/favourited', array(
		'as'	=> 'favourited',
		'uses'	=> 'ProfileController@favourited'
	));

	//favourites
	Route::get('/favourites', array(
		'as'	=> 'favourites',
		'uses'	=> 'ProfileController@favourites'
	));

	//favourites (GET)
	Route::get('/my-favourites', array(
		'as'	=> 'user-favourites',
		'uses'	=> 'ProfileController@myFavourites'
	));

	//main map AJAX REQUEST /*not used?*/
		Route::get('/location/ajax', array(
			'as' => 'home-map-ajax',
			'uses' => 'HomeController@ajaxHomeMap'
		));

	//main map (GET) /*not used?*/
	Route::get('/location/home', array(
		'as' => 'home-map',
		'uses' => 'HomeController@getHomeMap'
	));

	//User home (GET)
	Route::get('/user', array(
		'as' => 'user-home',
		'uses' => 'ProfileController@getUserHome'
	));


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

	//tag spot (GET)
	Route::get('/tag/current-location', array(
		'as'	=>'tag-current-location',
		'uses' 	=>'SpotController@tagCurrentLocation'
		));

	//view spot(GET)
	Route::get('/spot-view/{spot_id}', array(
		'as' 	=> 'view-spot',
		'uses' 	=> 'SpotController@getViewSpot'
	));

	//view directions to spot(GET) GET THIS WORKING
	Route::get('/spot-directions/{lat}/{lng}', array(
		'as' 	=> 'view-directions',
		'uses' 	=> 'SpotController@spotDirectionsGet'
	));


	//edit spot(GET)
	Route::get('/spot/{spot_id}', array(
		'as' 	=> 'edit-spot',
		'uses'	=> 'SpotController@getEditSpot'
	));

	//delete spot
	Route::get('/spot-delete/{spot_id}', array(
		'as' 	=> 'delete-spot',
		'uses' 	=> 'SpotController@deleteSpot'
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