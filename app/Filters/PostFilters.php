<?php

namespace App\Filters;

use App\User;

class PostFilters extends Filters
{
    protected $filters = ['by', 'popular', 'liked'];

    /**
     * Filter the query by a given username.
     *
     * @param  string  $username
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function by($name)
    {
        $user = User::where('name', $name)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the query according to most popular posts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->whereHas('comments');
    }

    /**
     * Filter the query according to most liked posts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function liked()
    {
        $this->builder->getQuery()->orders = [];

        return $this->builder->whereHas('favorites');
    }
}
