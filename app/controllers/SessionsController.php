<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		// This controller is only for functionality
		return Redirect::to('/');
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

		// Check if already logged in
		if ( Auth::check() ){
			// Redirect Logged in user
			return User::loggedInRedirect('/');
		}

		// If they are not already logged in show the login page.
		return View::make("user.login");

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// Log the user in
		// Get all the inputs
		$userData = array(
		                  'email' => Input::get('email'),
		                  'password' => Input::get('password')
		                  );

		// Set some rules
		$rules = array (
		                'email' => 'Required',
		                'password' => 'Required'
		                );

		// validate the login details
		$validation = Validator::make($userData, $rules);

		// Check if the form validates
		if ( $validation->passes() )
		{
			// Try to log the user in 
			// REMEMBER ME IS ON BY DEFAULT
			if ( Auth::attempt($userData, true) )
			{
				// Redirect to homepage
				return Redirect::to('/')->with('success', 'You have been logged in successfully');
			}
			else
			{	
				// Redirect to back to login page with errors
				return Redirect::to('login')->withErrors( array('password' => 'Invalid Password') )->withInput();
			}	
		}
		// Something else went wrong
		return Redirect::to('login')->withErrors($validation)->withInput();

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		//

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		
		// Log the user out
		Auth::logout();

		// Redirect to the homepage
		return Redirect::to('/')->with('success', 'You have been successfully logged out');

	}


}
