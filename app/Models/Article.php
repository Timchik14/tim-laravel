<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model implements Taggable
{
    use HasFactory;
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::updating(function (Article $article) {
            $changes = implode(', ', array_keys($article->getDirty()));
            $article->history()->attach(auth()->id(), ['changes' => $changes]);
        });
    }

    public function scopePublished($query)
    {
        return $query->where('created_at', '!=', null);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function history()
    {
        return $this
            ->belongsToMany(User::class, 'article_histories')
            ->withPivot(['changes'])->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
