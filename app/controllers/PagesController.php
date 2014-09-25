<?php

class PagesController extends BaseController {

	public function index() {

		if ( Auth::check() )
		{
			// Redirect to dash
			return View::make('logged_in.dash');
		}
		
		// Else redirect to index page
		return Redirect::to('/s/');


	}

}