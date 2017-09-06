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

        // $this->command->info('Deleting post rows...');

        DB::table('votes')->delete();
        DB::table('posts')->delete();
        DB::table('users')->delete();

        factory(App\User::class, 50)->create();
        $this->call('UsersTableSeeder');
        factory(App\Models\Post::class, 100)->create();
        factory(App\Models\Vote::class, 700)->create();


        Model::reguard();
    }
}
