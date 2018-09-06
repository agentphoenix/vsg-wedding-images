<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $comment = $post->comments()->create(array_merge(
            $request->all(),
            ['user_id' => auth()->id()]
        ));

        return response()->json($comment->fresh(), Response::HTTP_CREATED);
    }
}
