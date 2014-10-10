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
                $user->password = Hash::make('123');
                $user->group_id = 2;
                $user->name = 'Example Name';
                $user->gym = 'Crossfit Geelong';
                $user->save();

                $user = new User;
                $user->email = 'samuel@zaprri.com';
                $user->password = Hash::make('123');
                $user->group_id = 1;
                $user->parent_id = 1;
                $user->name = 'Samuel Parry';
                $user->save();

                $user = new User;
                $user->email = 'samuel@example.com';
                $user->password = Hash::make('123');
                $user->group_id = 1;
                $user->parent_id = 1;
                $user->name = 'Karen Parry';
                $user->save();

	}


}