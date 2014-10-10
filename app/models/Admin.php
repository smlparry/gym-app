<?php

class Admin {

	public function showUsers()
	{

		// Get all the users contected to this accont
		return DB::table('users')->where('parent_id', Auth::id() ); 

	}

	public function specificUser()
	{



	}

	

}