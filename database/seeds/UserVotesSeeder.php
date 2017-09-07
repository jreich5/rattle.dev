<?php

use Illuminate\Database\Seeder;

class UserVotesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = range(1, \App\User::all()->count());
        $posts = range(1, \App\Models\Post::all()->count());

        foreach($users as $user) {
            foreach($posts as $post) {
                $votePercentage = rand(0, 7);
                if ($votePercentage === 3) {
                    continue;    
                } else {
                    \DB::table('userVotes')->insert([
                        [
                            'user_id'   => $user,
                            'post_id'   => $post,
                            'upVote'    => rand(0, 1)
                        ]
                    ]);
                }
            }
        }
    }

}
