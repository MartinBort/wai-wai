<?php

class HomeController extends BaseController {


	public function home()
	{
		/* SEND OFF EMAIL
		Mail::send('emails.auth.test', array('name' => 'Dave'), function($message){
			$message->to('martinbortagaray@gmail.com','Martin Bortagaray')->subject('Test email');

		});
		*/

		return View::make('home');
	}

}
