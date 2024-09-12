<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        @include('livewire.layout.navigation') <!-- Updated navigation path -->
        
        <main class="main-content">
            <div class="container">
                <div class="card">
                    @yield('content')
                </div>
            </div>
        </main>
        
        <h1>Dashboard</h1>
        <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="logo-class" />
        <livewire:prank-call-simulator />
        
        @livewireScripts
    </body>
</html>
