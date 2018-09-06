<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $appends = ['fullName'];
    protected $fillable = ['first_name', 'last_name', 'nicknames', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    /**
     * The user's posts.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getFullNameAttribute()
	{
		return "{$this->first_name} {$this->last_name}";
	}

    /**
     * Get the name used for the user's uploads.
     *
     * @return string
     */
    public function getMediaCollectionNameAttribute()
    {
        return Str::slug($this->name);
    }

    /**
     * Get an array of possible first names.
     *
     * @return array
     */
    public function getPossibleFirstNamesAttribute()
    {
        return array_merge([$this->first_name], explode(',', $this->nicknames));
    }
}
