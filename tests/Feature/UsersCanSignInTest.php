<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsersCanSignInTest extends TestCase
{
    use RefreshDatabase;

    /** @test **/
    public function a_user_can_sign_in_with_their_name()
    {
        $user = factory(User::class)->create();

        $this->followingRedirects()
            ->post(route('authenticate'), [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ])
            ->assertSuccessful();
    }

    /** @test **/
    public function only_invited_guests_can_sign_in()
    {
        $this->from(route('login'))
            ->post(route('authenticate'), [
                'first_name' => 'Jack',
                'last_name' => 'Sparrow',
            ])
            ->assertRedirect(route('login'));
    }

    /** @test **/
    public function a_user_can_sign_in_with_a_nickname()
    {
        $user = factory(User::class)->create([
            'first_name' => 'Robert',
            'last_name' => 'Smith',
            'nicknames' => 'Bob,Bobby'
        ]);

        $this->followingRedirects()
            ->post(route('authenticate'), [
                'first_name' => 'Bob',
                'last_name' => $user->last_name,
            ])
            ->assertSuccessful();

        $this->followingRedirects()
            ->post(route('authenticate'), [
                'first_name' => 'Bobby',
                'last_name' => $user->last_name,
            ])
            ->assertSuccessful();
    }
}
