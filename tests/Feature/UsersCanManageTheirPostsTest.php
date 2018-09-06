<?php

namespace Tests\Feature;

use App\Post;
use Tests\TestCase;
use Tests\WithAuthenticatedUser;
use Illuminate\Http\UploadedFile;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Http\Response;

class UsersCanManageTheirPostsTest extends TestCase
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
    public function users_can_delete_one_of_their_posts()
    {
        $post = factory(Post::class)->create(['user_id' => $this->user->id]);

        $media = UploadedFile::fake()->image('media.jpg');

        $post->addMedia($media)->toMediaCollection(auth()->user()->mediaCollectionName);

        $this->delete(route('posts.destroy', $post));

        $this->assertDatabaseMissing('posts', [
            'id' => $post->id
        ]);

        $this->assertDatabaseMissing('media', [
            'model_id' => $post->id,
            'model_type' => Post::class,
        ]);
    }

    /** @test **/
    public function users_cannot_delete_someone_elses_post()
    {
        $user = factory(User::class)->create();

        $post = factory(Post::class)->create([
            'user_id' => $user->id
        ]);

        $media = UploadedFile::fake()->image('media.jpg');

        $post->addMedia($media)->toMediaCollection($user->mediaCollectionName);

        $this->delete(route('posts.destroy', $post))
            ->assertStatus(Response::HTTP_FORBIDDEN);

        $this->assertDatabaseHas('posts', [
            'id' => $post->id
        ]);

        $this->assertDatabaseHas('media', [
            'model_id' => $post->id,
            'model_type' => Post::class,
        ]);
    }
}
