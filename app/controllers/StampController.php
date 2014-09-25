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
			$stampResponse = json_decode($stampResponseString);

		// stampResponse now contains the JSON data from the stamp request
		// Parse the stampResponse for the id of the stamp and do something based off that data
		if ( array_key_exists('stamp', $stampResponse) ){
			// Store all the stamp response data
			$stampId = $stampResponse['stamp']['serial'];
			$stampReceipt = $stampResponse['receipt'];
			$stampSecure = $stampResponse['secure'];
			$stampCreated = $stampResponse['created'];

			echo $stampId;
		}
		

		// For demo purposes
		$userId = 1;

			// Insert the data into the database
			/* DB::table('stamp_transactions')->insert([
			                                        'user_id' => $userId,
			                                        'serial' => $stampId,
			                                        'receipt' => $stampReceipt,
			                                        'secure' => $stampSecure,
			                                        'created_response' => $stampCreated
			                                        ]); */

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
