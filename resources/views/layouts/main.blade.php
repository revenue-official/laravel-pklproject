<!DOCTYPE html>
<html lang="en" class="transition duration-500 ease-in-out" id="htmlElement">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{strtoupper($title)}} | Teguh Ersyarudin</title>
    {{-- icon tittle --}}
    <link rel="icon" href="https://laravel.com/img/favicon/favicon-32x32.png">
    @vite('resources/css/app.css')
    @vite('resources/js/console.js')
    {{-- link for authentification pages --}}
    @if($title === 'login' || $title === 'register' || $title === 'forgot')
    @vite('resources/js/authentication.js')
    @endif
    {{-- remix icon cdn --}}
    {{--
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> --}}
    {{-- font awesome --}}
    {{-- <script src="https://kit.fontawesome.com/2434aed004.js" crossorigin="anonymous"></script> --}}
</head>

<body id="antialiased" class="dark: bg-dark">
    <div class="bg-slate-50">
        {{-- hanya untuk halaman selain login --}}
        @if($title !== 'login' && $title !== 'register' && $title !== 'forgot')
        {{-- default js --}}
        @vite('resources/js/app.js')
        {{-- navbar flexible --}}
        @include('partials.navbar')
        @endif
        <div class="content">
            @yield('container')
        </div>
    </div>
</body>

</html>
