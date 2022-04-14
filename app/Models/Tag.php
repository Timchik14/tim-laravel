<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'taggable');
    }

    public function tidings()
    {
        return $this->morphedByMany(Tiding::class, 'taggable');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCLoud()
    {
        return (new static)->all();
    }
}
