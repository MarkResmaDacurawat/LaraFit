<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Fitness Tracker' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
    <header>
        @include('partials.navigation')
    </header>

    <main class="container mx-auto mt-[80px] px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    {{-- <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p>&copy; 2025 Fitness Tracker. All rights reserved.</p>
    </footer> --}}
</body>
</html>