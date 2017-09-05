<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i = 0; $i <= 500; $i++) {
            $post = new \App\Models\Post();
            $post->url = $faker->url;
            $post->title = $faker->catchPhrase;
            $post->content = $faker->bs;
            $post->created_by = \App\User::all()->random()->id;
            $post->save();
        }
    }
}
