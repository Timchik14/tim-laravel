<?php

namespace App\Models;

use App\Events\ArticleCreated;

class Article extends Model
{
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
        return $this->belongsToMany(Tag::class);
    }
}
