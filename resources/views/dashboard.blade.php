<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('livewire.layout.navigation') <!-- Updated navigation path -->
    
    <h1>Dashboard</h1>
    <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="logo-class" />
    <livewire:prank-call-simulator />
</body>
</html>
