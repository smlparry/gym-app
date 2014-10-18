<?php

class PagesController extends BaseController {

	public function index() {

		if ( Auth::check() )
		{
			if ( User::isAdmin() ){
				// Get the stamp transactions
				$history = DB::table('stamp_transactions')->where('stamp_user_id', Auth::id())->get();

					// Redirect to dash with the history object
					return View::make('logged_in.dash', ['history' => $history]);
			} else {
				// User is not admin just show their history
				// Get the stamp transactions
				$history = DB::table('stamp_transactions')->where('user_id', Auth::id())->get();

					// Redirect to dash with the history object
					return View::make('logged_in.feed', ['history' => $history]);
			}
		}
		
		// Else redirect to index page
		return View::make('index');


	}

	public function style() {

		// Just a simple page to style a random page
		return View::make('stamp.test');

	}

}