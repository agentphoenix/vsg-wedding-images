<?php

namespace Tests\Feature;

use App\Post;
use App\User;
use Tests\TestCase;
use Tests\WithAuthenticatedUser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostListTest extends TestCase
{
    use RefreshDatabase, WithAuthenticatedUser;

    /** @test **/
    public function an_unauthenticated_user_cannot_view_posts()
    {
        $this->signOut();

        $this->get(route('posts.index'))
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function the_post_list_shows_all_posts()
    {
        $post = factory(Post::class)->create(['user_id' => auth()->id()]);

        $response = $this->get(route('posts.index'))
            ->assertSuccessful()
            ->assertViewHas('posts');

        $this->assertCount(1, $response->data('posts'));
    }

    /** @test **/
    public function the_post_list_can_be_filtered_by_author()
    {
        factory(Post::class)->create(['user_id' => auth()->id()]);
        factory(Post::class)->create(['user_id' => factory(User::class)->create()->id]);

        $response = $this->get(route('posts.index', ['by' => $this->user->name]));

        $this->assertCount(1, $response->data('posts'));
    }
}
