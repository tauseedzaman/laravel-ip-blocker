<?php

namespace tauseedzaman\LaravelIpLocationBlock;

use GuzzleHttp\Middleware;
use Illuminate\Support\ServiceProvider;

class LaravelIpLocationBlockServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make('wisdmLabs\todolist\TodolistController');
        $this->app->make('tauseedzaman\LaravelIpLocationBlock\RestrictedIpsController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__.'/migrations');

        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-ip-location-block');

        /** \Illuminate\Routing\Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', Middleware\RestrictIpLocationBlock::class);

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/'),
        ]);
    }

}
