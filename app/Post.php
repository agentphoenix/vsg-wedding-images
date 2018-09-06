<?php

namespace App;

use App\Filters\PostFilters;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Post extends Model implements HasMedia
{
    use HasMediaTrait, Favoritable;

    protected $appends = ['created', 'isFavorited', 'commentsCount', 'favoritesCount', 'allMedia'];
    protected $fillable = ['user_id', 'caption'];
    protected $with = ['author', 'media', 'favorites', 'comments'];

    /**
     * The author of the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * The post's comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    /**
     * Apply all relevant post filters.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \App\Filters\PostFilters  $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, PostFilters $filters)
    {
        return $filters->apply($query);
    }

    public function getCommentsCountAttribute()
    {
        return $this->comments->count();
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getAllMediaAttribute()
    {
        return $this->media->map(function ($media) {
            return $media->img();
        });
    }
}
