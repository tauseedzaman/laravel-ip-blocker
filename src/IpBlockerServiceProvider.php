<?php

namespace tauseedzaman\LaravelIpBlocker;

use GuzzleHttp\Middleware;
use Illuminate\Support\ServiceProvider;

class IpBlockerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->make('wisdmLabs\todolist\TodolistController');
        $this->app->make('tauseedzaman\LaravelIpBlocker\IpBlockerController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        $this->loadMigrationsFrom(__DIR__ . '/migrations');

        $this->loadViewsFrom(__DIR__ . '/views', 'LaravelIpBlocker');

        /** \Illuminate\Routing\Router $router */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', Middleware\IpBlockerMiddleware::class);

        $this->publishes([
            __DIR__ . '/views' => base_path('resources/views/'),
            __DIR__ . '/migrations' => base_path('database/migrations'),
        ]);
    }
}
