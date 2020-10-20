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
    
</head>
<body>
    {{$slot}}
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{asset('js/app.js')}}"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.2.0/turbolinks.js" integrity="sha512-G3jAqT2eM4MMkLMyQR5YBhvN5/Da3IG6kqgYqU9zlIH4+2a+GuMdLb5Kpxy6ItMdCfgaKlo2XFhI0dHtMJjoRw==" crossorigin="anonymous"></script> --}}
    <script src="{{asset('js/burger.js')}}"></script>
</body>
</html>
