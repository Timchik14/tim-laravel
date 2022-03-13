<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
         'App\Models\Article' => 'App\Policies\ArticlePolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
