<?php

namespace Tests\Feature;

use App\Post;
use App\Favorite;
use Tests\TestCase;
use Tests\WithAuthenticatedUser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Comment;

class UsersCanInteractWithPostsTest extends TestCase
{
    use RefreshDatabase, WithAuthenticatedUser;

    protected $post;

    public function setUp()
    {
        parent::setUp();

        $this->post = factory(Post::class)->create([
            'user_id' => $this->user->id
        ]);
    }

    /** @test **/
    public function a_user_can_favorite_a_post()
    {
        $this->post(route('favorites.store', $this->post))
            ->assertSuccessful();

        $this->assertCount(1, $this->post->favorites->fresh());
    }

    /** @test **/
    public function a_user_can_unfavorite_a_post()
    {
        factory(Favorite::class)->create([
            'post_id' => $this->post->id,
            'user_id' => $this->user->id,
        ]);

        $this->delete(route('favorites.destroy', $this->post))
            ->assertSuccessful();

        $this->assertCount(0, $this->post->favorites->fresh());
    }

    /** @test **/
    public function a_user_can_comment_on_a_post()
    {
        $comment = factory(Comment::class)->make();

        $this->postJson(route('comments.store', $this->post), $comment->toArray())
            ->assertJson($comment->toArray());

        $this->assertCount(1, $this->post->comments->fresh());
    }
}
