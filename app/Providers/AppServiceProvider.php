<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layouts.sidebar', function ($view) {
            $view->with('tagsCloud', Tag::tagsCloud());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->user() && auth()->user()->isAdmin();
        });
        Blade::if('notadmin', function () {
            return auth()->user() && !auth()->user()->isAdmin();
        });
    }
}
