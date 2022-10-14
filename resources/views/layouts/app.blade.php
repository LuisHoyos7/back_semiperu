<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="PORTAL SEMIPERU">
    <meta name="author" content="SEMIPERU">
    <link rel="shortcut icon" href="/icon.svg">
    <link rel="stylesheet" href="/css/app.css">
    @stack('styles')
    <style>
        .bg-validation{
            background-color: #8c68cd !important;
        }
    </style>
</head>
<body>
    @yield('content')
    @stack('scripts')
</body>
</html>
