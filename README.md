# Laravel-ip-blocker

Package blacking/restricting IP's in laravel application

# Demo

List of Restricted IP's
![List of restriced ips](/Demo/Screenshot1.png)
Add New IP
![add new ip to list](/Demo/Screenshot2.png)

## Installation

You can install the package via composer:

```
composer require tauseedzaman/laravel-ip-location-block
```

## Configuratoin

first publish the views

```
php artisan vendor:publish
```

then look for

```
tauseedzaman\LaravelIpLocationBlock\LaravelIpLocationBlockServiceProvider
```

and choose that number and hit enter

Now add run the migrations

```
php artisan migrate
```

Now add the following to App\Http\Kernel.php in the $middleware group at first position

```
        \tauseedzaman\LaravelIpLocationBlock\Middleware\RestrictIpMiddleware::class
```

Now thats's set you can view the GUI in

```
yourDoman.test/restricted-ips
```

## Leave a start if you like this
