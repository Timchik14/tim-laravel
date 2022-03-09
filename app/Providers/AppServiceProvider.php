<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('layout.sidebar', function ($view) {
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
        //
    }
}
