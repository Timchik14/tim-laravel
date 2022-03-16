<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\Pushall;

class PushAllServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Pushall::class, function () {
            return new Pushall(config('pushall.api.key'), config('pushall.api.id'));
        });
    }

    public function boot()
    {
        //
    }
}
