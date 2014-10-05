<?php

class StampController extends \BaseController {


	public function stampScreen() 
	{

		// Set app key
		$appKey = "d0a4e3f2fdafb449594a";
		// Redirect to the stamp screen
		header("Location: https://beta.snowshoestamp.com/applications/client/" . $appKey . "/");

	}

	public function callback()
	{

		// Set app and secret keys
		$appKey		= "d0a4e3f2fdafb449594a";
		$appSecret  = "7c4399e97cd4b6d2bec73884d69773e95dfb600b";

			// Get the data as posted from SnowShoe
			$data =	$_POST['data'];

			// Initialise the API client
			$client = new SSSApiClient($appKey, $appSecret);
			$stampResponseString = $client->processData($data);

			// Because for some reason it is returned as a string
			$stampResponse = json_decode($stampResponseString, true);

		// Check if user is logged in 
		if ( Auth::check() ){
			// User is logged in
			// If it is a valid response do something with the data
			if ( array_key_exists('stamp', $stampResponse) ){
				
				// Store all the stamp response data
				$stampId = $stampResponse['stamp']['serial'];
				$stampReceipt = $stampResponse['receipt'];
				$stampSecure = $stampResponse['secure'];
				$stampCreated = $stampResponse['created'];

				// Check if this stamp exsists, if not give add it if there are proper permissions
				$stampExists = DB::table('stamp_users')->where('stamp_id', $stampId)->first();

				if ( ! is_null($stampExists) ){
					// The stamp exists, add the instance to the transactions database
					DB::table('stamp_transactions')->insert([
					                    'stamp_user_id' => $stampExists->stamp_user_id,
					           			'user_id' => Auth::id(),
					           			'user_name' => Auth::user()->name,
					                    'stamp_id' => $stampId,
					                    'receipt' => $stampReceipt,
					                    'secure' => $stampSecure,
					                    'created_response' => $stampCreated
					                ]); 

						// Instance has been added successfully to the database,
						// Redirect to a success view
						return View::make('stamp.success');
				} else {
					// The stamp does not yet exist yet
					// Check if the user has the correct permissions and if so add the stamp to their account
					// Check if they have proper permissions
					if ( Auth::user()->group_id == 2 ){
						// User is ready to add the stamp
						// Add the stamp to the user
						DB::table('stamp_users')->insert([
					        			'stamp_user_id' => Auth::id(),
					                    'stamp_id' => $stampId,
					                    'created_response' => $stampCreated
					                ]); 

							// Tell the user the stamp has been successfully added
							return View::make( 'stamp.addedSuccess', ['stampId' => $stampId] );
					} else {
						// User does not have the correct permissions for this action
						return View::make('stamp.permissionDenied');
					}
				}
			} else {
				// There was an error from the stamp
				return View::make('stamp.error');
			}
		} else {
			// tell the user that they need to be logged in
			return View::make('stamp.loggedOut');
		}
	}

	public function error()
	{

		// Set app and secret keys
		$appKey		= "d0a4e3f2fdafb449594a";
		$appSecret  = "7c4399e97cd4b6d2bec73884d69773e95dfb600b";

			// Get the data as posted from SnowShoe
			$data =	$_POST['data'];

			// Initialise the API client
			$client = new SSSApiClient($appKey, $appSecret);
			$stampResponseString = $client->processData($data);

			// Because for some reason it is returned as a string
			$stampResponse = json_decode($stampResponseString, true);
			
		// stampResponse now contains the JSON data from the stamp request error
		// Parse the stampResponse for the error message of the stamp request
		$stampErrorMessage = $stampResponse['error']['message'];
		$stampErrorCode = $stampResponse['error']['code'];

			// Return to the view with the error message
			return View::make( 'stamp.errorMessage', 
			                  ['errorMessage' => $stampErrorMessage, 'errorCode' => $stampErrorCode] 
			                );
			
	}

}
