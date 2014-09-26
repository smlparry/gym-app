<?php

class PagesController extends BaseController {

	public function index() {

		if ( Auth::check() )
		{
			// Redirect to dash
			return View::make('logged_in.dash');
		}
		
		// Else redirect to index page
		return View::make('index');


	}

	public function style() {

		// Just a simple page to style a random page
		return View::make('stamp.addedSuccess', ['stampId' => "190-23"]);

	}

}