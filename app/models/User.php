<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	// Prevent mass assignment errors
	protected $fillable = ['username', 'email', 'password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	// Check if user is already logged in and if so redirect them to home page
	public static function loggedInRedirect($redirectPage)
	{

		// User is already logged in
		return Redirect::to($redirectPage)->with('success', 'You are already logged in!');

	}

	public static function permissionDenied($redirectPage)
	{

		// User is already logged in
		return Redirect::to($redirectPage)->with('error', 'You do not have sufficient privilages to perform this action');

	}

	public static function isAdmin()
	{

		// Check if the user has admin privilages
		if ( Auth::check() ){
			if ( Auth::user()->group_id == 2 ){
				return true;
			}
		}
		return false;
	}

}
