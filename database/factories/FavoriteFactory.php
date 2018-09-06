<?php

use App\Post;
use App\User;
use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'post_id' => function () {
            return factory(Post::class)->create()->id;
        },
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
    ];
});
