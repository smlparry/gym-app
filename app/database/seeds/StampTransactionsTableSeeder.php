<?php


class StampTransactionsTableSeeder extends Seeder {

	public function run()
	{

        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('stamp_transactions')->delete();

        // Add the seeded records
		DB::table('stamp_transactions')->insert([
		                          'stamp_user_id' => 1,
		                          'user_id' => 2,
		                          'stamp_id' => 'DEV-STAMP-B',
		                          'receipt' => 'Example Receipt',
		                          'secure' => 'false'
					        ]); 

	}

}