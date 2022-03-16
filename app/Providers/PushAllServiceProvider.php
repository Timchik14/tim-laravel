<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\Pushall;

class PushAllServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Pushall::class, function () {
            return new Pushall(config('app.pushall.api.key'), config('app.pushall.api.id'));
        });
    }

    public function boot()
    {
        //
    }
}
