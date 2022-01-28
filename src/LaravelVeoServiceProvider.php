<?php

namespace Nanuc\LaravelVeo;

use Illuminate\Support\ServiceProvider;

class LaravelVeoServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/laravel-veo.php' => config_path('laravel-veo.php'),
        ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-veo.php', 'laravel-veo'
        );

        $this->app->singleton('veo-api', fn() => new LaravelVeoFactory());
    }
}
