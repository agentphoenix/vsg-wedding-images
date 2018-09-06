<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Tests\WithAuthenticatedUser;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersCanCreatePostsTest extends TestCase
{
    use RefreshDatabase, WithAuthenticatedUser;

    public function setUp()
    {
        parent::setUp();

        Media::all()->each->delete();
    }

    public function tearDown()
    {
        Media::all()->each->delete();

        parent::tearDown();
    }

    /** @test **/
    public function an_unauthenticated_user_cannot_create_a_post()
    {
        $this->signOut();

        $this->post(route('posts.store'))
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function an_authenticated_user_can_see_the_create_post_page()
    {
        $this->get(route('posts.index'))->assertSuccessful();
    }

    /** @test **/
    public function a_post_can_be_created_with_a_single_media_file()
    {
        $post = factory(Post::class)->make();

        $media = UploadedFile::fake()->image('media.jpg');

        $response = $this->followingRedirects()
            ->post(route('posts.store'), array_merge($post->toArray(), ['media' => [$media]]))
            ->assertSuccessful();

        $newPost = Post::first();

        $this->assertDatabaseHas('posts', [
            'user_id' => $this->user->id,
            'caption' => $post->caption,
        ]);

        $this->assertDatabaseHas('media', [
            'model_id' => $newPost->id,
            'model_type' => Post::class,
        ]);
    }

    /** @test **/
    public function a_post_can_be_created_with_multiple_media_files()
    {
        $post = factory(Post::class)->make();

        $media1 = UploadedFile::fake()->image('media1.jpg');
        $media2 = UploadedFile::fake()->image('media2.jpg');

        $response = $this->followingRedirects()
            ->post(route('posts.store'), array_merge($post->toArray(), ['media' => [$media1, $media2]]))
            ->assertSuccessful();

        $this->assertDatabaseHas('posts', [
            'user_id' => $this->user->id,
            'caption' => $post->caption,
        ]);

        $postId = Post::first()->id;

        $this->assertDatabaseHas('media', [
            'model_id' => $postId,
            'model_type' => Post::class,
            'file_name' => 'media1.jpg',
        ]);

        $this->assertDatabaseHas('media', [
            'model_id' => $postId,
            'model_type' => Post::class,
            'file_name' => 'media2.jpg',
        ]);
    }
}
