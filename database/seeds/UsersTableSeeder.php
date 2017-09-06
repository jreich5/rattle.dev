<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Ryan';
        $user->email = 'ryan@codeup.com';
        $user->password = Hash::make(env('USER_PASSWORD'));
        $user->save();

        $user1 = new \App\User();
        $user1->name = 'Justin';
        $user1->email = 'justin@codeup.com';
        $user1->password = Hash::make(env('USER_PASSWORD'));
        $user1->save();

    }
}
