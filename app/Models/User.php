<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class, 'owner_id');
    }

    // return user to role relations
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    // check user is admin, user or guest
    private function hasRole($role)
    {
        if ($this->roles->contains('slug', $role)) {
            return true;
        }
        return false;
    }

    public function isAdmin()
    {
        if ($this->hasRole('admin')) {
            return true;
        }
        return false;
    }

    public function giveRoles($roles)
    {
        $roles = Role::whereIn('slug', $roles)->get();
        if ($roles === null) {
            return $this;
        }

        $this->roles()->saveMany($roles);
        return $this;
    }
}
