<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <h1>Dashboard</h1>
    <img src="{{ asset('public/images/prAInkcall.png') }}" alt="Logo" class="logo-class" />
    <livewire:prank-call-simulator />
</body>
</html>
