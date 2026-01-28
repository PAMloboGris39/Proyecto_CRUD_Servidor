<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-950 text-gray-100">
<x-header />

<div class="mx-auto max-w-6xl px-4">
    <x-nav />

    <main class="py-8">
        {{ $slot }}
    </main>
</div>

<x-footer />
</body>
</html>
