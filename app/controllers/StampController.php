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
				           			'user_id' => $stampExists->user_id,
				                    'serial' => $stampId,
				                    'receipt' => $stampReceipt,
				                    'secure' => $stampSecure,
				                    'created_response' => $stampCreated
				                ]); 

			} else {
				// The stamp does not yet exist yet
				// Check if the user has the correct permissions and if so add the stamp to their account
				echo $stampId;

			}

					


		} else {

			return View::make('stamp.error');

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
			$stampResponse = $client->processData($data);
			
		// stampResponse now contains the JSON data from the stamp request error
		// Parse the stampResponse for the error message of the stamp request
		$stampReceipt = $stampResponse['receipt'];
		$stampCreated = $stampResponse['created'];
		$stampSecure = $stampResponse['secure'];
		$stampErrorMessage = $stampResponse['error']['message'];
		$stampErrorCode = $stampResponse['error']['code'];



	}

}
