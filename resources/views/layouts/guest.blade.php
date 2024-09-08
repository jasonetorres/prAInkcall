<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'prAInk Call Simulator') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex flex-col items-center min-h-screen bg-gray-500 sm:justify-center">
            <div class="w-full overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
                <div class="flex justify-center">
                    <x-application-logo class="w-[300px] h-[300px]" />
                </div>
                <div class="px-6 py-4">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
