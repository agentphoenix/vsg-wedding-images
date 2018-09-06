<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Post;

class PostPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Post $post)
    {
        return $post->author->is($user);
    }
}
