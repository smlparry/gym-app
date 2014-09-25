<?php

class UserTableSeeder extends Seeder {

	public function run()
	{

                // to use non Eloquent-functions we need to unguard
                Eloquent::unguard();

                // All existing users are deleted !!!
                DB::table('users')->delete();

                // add user using Eloquent
                $user = new User;
                $user->email = 'admin@localhost';
                $user->password = Hash::make('password');
                $user->save();

	}


}