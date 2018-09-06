<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::get()->each(function ($post) {
            factory(Comment::class)->times(5)->create([
                'post_id' => $post->id
            ]);
        });
    }
}
