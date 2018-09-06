<?php

namespace Tests;

trait WithAuthenticatedUser
{
    protected function setupWithAuthenticatedUser()
    {
        $this->signIn();
    }
}
