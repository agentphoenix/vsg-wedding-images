<?php

namespace Tests;

use App\User;
use PHPUnit\Framework\Assert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->setupLocalTraits();
        $this->setupHelperMacros();
    }

    protected function createUser()
    {
        return factory(User::class)->create();
    }

    protected function setupHelperMacros()
    {
        TestResponse::macro('data', function ($key) {
            if (is_array($this->original)) {
                return data_get($this->original, $key);
            }

            return $this->original->getData()[$key];
        });

        Collection::macro('assertContains', function ($model) {
            Assert::assertTrue($this->contains(function ($data) use ($model) {
                return $data instanceof Model
                    ? $data->is($model)
                    : $data['id'] == $model->id;
            }), 'Failed asserting that the collection contains the specified value.');
        });
    }

    protected function setupLocalTraits()
    {
        $uses = array_flip(class_uses_recursive(static::class));

        if (isset($uses[WithAuthenticatedUser::class])) {
            $this->setupWithAuthenticatedUser();
        }
    }

    protected function signIn($user = null)
    {
        $this->user = $user ?? $this->createUser();

        $this->actingAs($this->user);
    }

    protected function signOut()
    {
        auth()->logout();
    }
}
