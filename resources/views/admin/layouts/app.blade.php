<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
