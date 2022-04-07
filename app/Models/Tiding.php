<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tiding extends Model
{
    use HasFactory;

    public function scopePublished($query)
    {
        return $query->where('created_at', '!=', null);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
