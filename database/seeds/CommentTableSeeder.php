<?php

use App\User;
use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::all()->each(function($user) {
            factory(App\Comment::class)->create(['user_id' => $user->id]);
        });
    }
}
