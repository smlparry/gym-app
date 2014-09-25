<?php


class UserStampTableSeeder extends Seeder {

	public function run()
	{

        // to use non Eloquent-functions we need to unguard
        Eloquent::unguard();

        // All existing users are deleted !!!
        DB::table('stamp_users')->delete();

        // Add the seeded records
		DB::table('stamp_users')->insert([
					            'user_id' => 1,
					            'stamp_id' => "DEV-STAMP-B"
					        ]); 

	}

}