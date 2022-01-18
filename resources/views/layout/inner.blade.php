<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/inner.css') }}" rel="stylesheet">
    <!-- Styles -->
    <style>

    </style>
</head>

<body>
    @include('layout.menu')
    <div class="wrapper">
        @yield('content')
    </div>
</body>

</html>
