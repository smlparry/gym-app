<?php

class UsersController extends \BaseController {

	public function register() 
	{

		// Check if the user is logged in
		if ( Auth::check() )
		{
			return User::loggedInRedirect('/');
		}

		// else show register page
		return View::make('user.register');

	}

	public function registerNew() 
	{

		// Add a new user
		// Get all the inputs
		$newUserData = [
				'email' => Input::get('email'),
		       	'password' => Input::get('password')
		    ];

		$rules = [
				'email' => 'Required|Email',
				'password' => 'Required'
			];

		// validate the registration details
		$validation = Validator::make($newUserData, $rules);

		// check if it passed validation
		if ( $validation->passes() )
		{
			// Create the new user
			$newUser = new User;
			$newUser->email = $newUserData['email'];
			$newUser->password = Hash::make( $newUserData['password'] );
			$newUser->save();

			// Here you can send the user a confirmation email !

				// Log the user in
				if ( Auth::attempt($newUserData) )
				{
					// Redirect to homepage
					return Redirect::to('/')->with('success', 'You have been registered successfully');
				}
				else
				{	
					// Redirect to back to register page with errors
					return Redirect::to('register')->withErrors($validation)->withInput();
				}	

		}

		// Validation did not pass
		return Redirect::to('register')->withErrors($validation)->withInput();


	}

	public function forgotPassword() 
	{

		// Show the forgot password page
		return View::make('user.forgotPassword');

	}

}
