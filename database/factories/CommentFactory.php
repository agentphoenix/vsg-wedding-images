<?php

use App\Post;
use App\User;
use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'body' => $faker->paragraph,
    ];
});
