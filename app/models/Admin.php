<?php

class Admin {

	public function showUsers()
	{

		if ( User::isAdmin() ){
			// Get all the users contected to this accont
			return DB::table('users')->where('parent_id', Auth::id())->get(); 
		}

		return "permission_denied";

	}

	public function specificUser($id)
	{

		if ( User::isAdmin() ){
			// Get the details of this account
			$user = User::find($id);
				// only return if user belongs to this one
				if ( $user->parent_id == Auth::id() ){
					// Get user history as well
					$userHistory = DB::table('stamp_transactions')->where('user_id', $id)->get();
					// return with array of data
					return array('userDetails' => $user, 'userHistory' => $userHistory);
				}
			// Else return with permission error
			return "permission_denied";
		}
		return "permission_denied";
	}

	

}