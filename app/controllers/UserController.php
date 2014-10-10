<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		// Show all the contected users
		$allUsers = Admin::showUsers();
		return View::make("logged_in.users", ['dashboardObject' => $allUsers] );


	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Check if the user is logged in
		if ( Auth::check() )
		{
			return User::loggedInRedirect('/');
		}

		// else show register page
		return View::make('user.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function forgotPassword() 
	{

		// Show the forgot password page
		return View::make('user.forgotPassword');

	}

}

