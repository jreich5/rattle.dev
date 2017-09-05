<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // factory(App\User::class, 50)->create();
        // factory(App\Models\Post::class, 50)->create();

        $this->command->info('Deleting post rows...');
        DB::table('posts')->delete();
        $this->command->info('Deleting user rows...');
        DB::table('users')->delete();
        $this->command->info('Seeding users table...');
        $this->call('UsersTableSeeder');
        $this->command->info('Seeding posts table...');
        $this->call('PostsTableSeeder');

        Model::reguard();
    }
}
