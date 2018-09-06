<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function store(Post $post)
    {
        $post->favorite();
    }

    public function destroy(Post $post)
    {
        $post->unfavorite();
    }
}
