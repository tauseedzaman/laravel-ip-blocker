<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') . '-' . __('Restricted IPs') }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col shadow rounded py-3 text-center">
                <h2>{{ __("Restriced IP's") }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
