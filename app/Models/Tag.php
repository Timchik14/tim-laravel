<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public static function tagsCLoud()
    {
        return (new static)->has('articles')->get();
    }
}
