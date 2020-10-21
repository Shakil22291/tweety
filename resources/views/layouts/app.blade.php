<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Font awesome -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
        }
    </style>j
</head>
<body>
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-6 my-md-auto pt-3 pt-md-0 offset-md-3">
                <a href="/" class="mb-3 d-block">
                    <img 
                        src="/images/logo.svg" 
                        alt="Tweety"
                        width="150"
                    >
                </a>
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
