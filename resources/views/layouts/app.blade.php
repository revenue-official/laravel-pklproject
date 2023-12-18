<!DOCTYPE html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PKL Projects | {{ strtoupper($title) }}</title>
    {{-- icon --}}
    <link rel="icon" href="https://laravel.com/img/logomark.min.svg" type="image/icon">
    <script src="https://kit.fontawesome.com/2434aed004.js" crossorigin="anonymous"></script>
    {{-- font style --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- poppins --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    {{-- source css --}}
    @vite('resources/css/app.css')
    @vite('resources/css/home.css')
    @vite('resources/css/navbar.css')
    {{-- source js --}}
    @vite('resources/js/app.js')
    @vite('resources/js/home.js')
    @vite('resources/js/navbar.js')
    @vite('resources/js/other.js')
</head>

<body>
    <div class="navigasi-bar">
        @include('partials.navbar')
    </div>
    <div id="app">
        @yield('content')
    </div>
</body>

</html>
