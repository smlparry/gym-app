<?php

class PagesController extends BaseController {

	public function index() {

		if ( Auth::check() )
		{
			// Redirect to dash
			return View::make('logged_in.dash');
		}
		
		// Else redirect to index page
		return Redirect::to('/');


	}

	public function style() {

		// Just a simple page to style a random page
		return View::make('stamp.addedSuccess', ['stampId' => "190-23"]);

	}

}