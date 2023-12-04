@extends('layouts.main')
@section('container')
@include('partials.alert')
<div class="dark: bg-dark bg-neutral-100 flex items-center justify-center h-screen duration-300">
    @if ($title == 'login')
    {{-- sign in --}}
    <div id="animation" class="elastic-down w-full">
        <div class="dark: fg-dark max-w-md w-full mx-auto p-8 bg-white rounded shadow-md duration-300">
            <span class="flex justify-end">
                <label for="darkModeToggle" class="cursor-pointer">
                    <input type="checkbox" id="darkModeToggle" class="hidden">
                    <i class="ri-sun-line text-black text-lg"></i>
                    <i class="ri-moon-line text-blue-400 moon-neon text-lg"></i>
                </label>
            </span>
            <h2 class="text-black dark:text-white text-3xl font-semibold text-center mb-8">Login</h2>
            {{-- LOGIN PLATFORM --}}
            <div class="flex items-center justify-around my-6">
                <div class="text-sm bg-inherit w-full rounded-md p-1 mx-2 border border-neutral-400 dark:border-neutral-600 hover:bg-neutral-300 dark:hover:border-neutral-700 dark:hover:bg-neutral-700 hover:border-neutral-300 duration-200">
                    <a href="{{ route('google') }}" class="flex items-center justify-around font-medium text-blue-600 hover:text-blue-500">
                        <svg class="p-1" width="30" height="30" viewBox="-0.5 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Color-" transform="translate(-401.000000, -860.000000)">
                                    <g id="Google" transform="translate(401.000000, 860.000000)">
                                        <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" id="Fill-1" fill="#FBBC05">
                                        </path>
                                        <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" id="Fill-2" fill="#EB4335">
                                        </path>
                                        <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" id="Fill-3" fill="#34A853">
                                        </path>
                                        <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" id="Fill-4" fill="#4285F4">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="text-lg text-neutral-500 dark:text-neutral-400">with Google</span>
                    </a>
                </div>
                <div class="text-sm bg-inherit w-full rounded-md p-1 mx-2 border border-neutral-400 dark:border-neutral-600 hover:bg-neutral-300 dark:hover:border-neutral-700 dark:hover:bg-neutral-700 hover:border-neutral-300 duration-200">
                    <a href="{{ route('github') }}" class="flex items-center justify-around font-medium text-blue-600 hover:text-blue-500">
                        <svg class="p-1" width="30" height="30" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-140.000000, -7559.000000)" class="fill-black dark:fill-white duration-300">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path d="M94,7399 C99.523,7399 104,7403.59 104,7409.253 C104,7413.782 101.138,7417.624 97.167,7418.981 C96.66,7419.082 96.48,7418.762 96.48,7418.489 C96.48,7418.151 96.492,7417.047 96.492,7415.675 C96.492,7414.719 96.172,7414.095 95.813,7413.777 C98.04,7413.523 100.38,7412.656 100.38,7408.718 C100.38,7407.598 99.992,7406.684 99.35,7405.966 C99.454,7405.707 99.797,7404.664 99.252,7403.252 C99.252,7403.252 98.414,7402.977 96.505,7404.303 C95.706,7404.076 94.85,7403.962 94,7403.958 C93.15,7403.962 92.295,7404.076 91.497,7404.303 C89.586,7402.977 88.746,7403.252 88.746,7403.252 C88.203,7404.664 88.546,7405.707 88.649,7405.966 C88.01,7406.684 87.619,7407.598 87.619,7408.718 C87.619,7412.646 89.954,7413.526 92.175,7413.785 C91.889,7414.041 91.63,7414.493 91.54,7415.156 C90.97,7415.418 89.522,7415.871 88.63,7414.304 C88.63,7414.304 88.101,7413.319 87.097,7413.247 C87.097,7413.247 86.122,7413.234 87.029,7413.87 C87.029,7413.87 87.684,7414.185 88.139,7415.37 C88.139,7415.37 88.726,7417.2 91.508,7416.58 C91.513,7417.437 91.522,7418.245 91.522,7418.489 C91.522,7418.76 91.338,7419.077 90.839,7418.982 C86.865,7417.627 84,7413.783 84,7409.253 C84,7403.59 88.478,7399 94,7399" id="github-[#142]">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        <span class="text-lg text-neutral-500 dark:text-neutral-400">with Github</span>
                    </a>
                </div>
            </div>
            <div class="flex justify-between text-neutral-500">
                <div class="border-b border-neutral-500 w-full mt-1 mb-7 mx-2"></div>
                <span class="mx-2 mb-5">or</span>
                <div class="border-b border-neutral-500 w-full mt-1 mb-7 mx-2"></div>
            </div>
            <form action="{{ route('login.go') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4 relative">
                    <label for="email" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Email</label>
                    <input type="email" name="email" id="email" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" autocomplete="off" required>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Password</label>
                    <input type="password" name="password" id="password" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{3,32}" required>
                    <i class="ri-eye-off-line absolute top-7 right-2 cursor-pointer"></i>
                </div>
                <div class="flex items-center justify-end mb-6">
                    <div class="text-sm">
                        <a href="{{ route('forgot') }}" class="font-medium text-blue-600 hover:text-blue-500">Forgot
                            password?</a>
                    </div>
                </div>
                <button type="submit" class="w-full py-2 px-4 mt-5 bg-blue-600 text-white rounded-md focus:outline-none focus:bg-blue-700">Sign
                    In</button>
            </form>
            <p class="mt-8 text-sm text-center">
                Don't have an account? <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign up</a>
            </p>
        </div>
    </div>
    @endif
    {{-- sign up --}}
    @if ($title == 'register')
    <div id="animation" class="elastic-down w-full">
        <div class="dark: fg-dark max-w-md w-full mx-auto p-8 bg-white rounded shadow-md duration-300">
            <span class="flex justify-end">
                <label for="darkModeToggle" class="cursor-pointer">
                    <input type="checkbox" id="darkModeToggle" class="hidden">
                    <i class="ri-sun-line text-black text-lg"></i>
                    <i class="ri-moon-line text-blue-400 moon-neon text-lg"></i>
                </label>
            </span>
            <h2 class="text-black dark:text-white text-3xl font-semibold text-center mb-8">Register</h2>
            <form action="{{ route('register.go') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4 relative">
                    <label for="email" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Email</label>
                    <input type="email" name="email" id="email" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,32}$" autocomplete="off" required>
                </div>
                <div class="mb-4 relative">
                    <label for="user" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Username</label>
                    <input type="text" name="user" id="user" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9].{3,16}" required>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Password</label>
                    <input type="password" name="password" id="password" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{3,32}" required>
                    <i class="ri-eye-off-line absolute top-7 right-2 cursor-pointer"></i>
                </div>
                <div class="mb-4 relative">
                    <label for="re-password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Re-Password</label>
                    <input type="password" name="re-password" id="password" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{3,32}" required>
                    <i class="ri-eye-off-line absolute top-7 right-2 cursor-pointer"></i>
                </div>
                <button type="submit" class="w-full mt-5 py-2 px-4 bg-blue-600 text-white rounded-md focus:outline-none focus:bg-blue-700">Sign
                    Up</button>
            </form>
            <p class="mt-8 text-sm text-center">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
            </p>
        </div>
    </div>
    @endif
    {{-- sign up --}}
    @if ($title == 'forgot')
    <div id="animation" class="elastic-down w-full">
        <div class="dark: fg-dark max-w-md w-full mx-auto p-8 bg-white rounded shadow-md duration-300">
            <span class="flex justify-end">
                <label for="darkModeToggle" class="cursor-pointer">
                    <input type="checkbox" id="darkModeToggle" class="hidden">
                    <i class="ri-sun-line text-black text-lg"></i>
                    <i class="ri-moon-line text-blue-400 moon-neon text-lg"></i>
                </label>
            </span>
            <h2 class="text-black dark:text-white text-3xl font-semibold text-center mb-8">{{ $getHeader }}</h2>
            <form action="{{ route('forgot.go') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-4 relative">
                    <label for="email" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Email</label>
                    <input type="email" name="email" id="email" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" placeholder="example@domain.com" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" autocomplete="off" required>
                </div>
                @if (session()->has('error'))
                <div class="mb-4 relative">
                    <label for="user" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Username</label>
                    <input type="text" name="user" id="user" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{2,16}" required>
                </div>
                <div class="mb-4 relative">
                    <label for="user" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">No-Phone</label>
                    <input type="text" name="user" id="user" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{2,16}" required>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Password</label>
                    <input type="password" name="password" id="password" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{3,32}" required>
                    <i class="ri-eye-off-line absolute top-7 right-2 cursor-pointer"></i>
                </div>
                <div class="mb-4 relative">
                    <label for="re-password" class="block text-sm font-medium text-neutral-700 dark:text-neutral-300 px-2">Re-Password</label>
                    <input type="password" name="re-password" id="password" class="dark: bg-dark mt-1 block w-full rounded-md border-neutral-300 shadow-sm outline-none bg-neutral-200 h-8 px-2 duration-300" pattern="[a-zA-Z0-9]{3,32}" required>
                    <i class="ri-eye-off-line absolute top-7 right-2 cursor-pointer"></i>
                </div>
                @endif
                <button type="submit" class="w-full mt-5 py-2 px-4 bg-blue-600 text-white rounded-md focus:outline-none focus:bg-blue-700">{{ $getButton }}</button>
            </form>
            <p class="mt-8 text-sm text-center">
                Already have an account? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Sign in</a>
            </p>
        </div>
    </div>
    <script type="text/javascript"></script>
    @endif
</div>
@endsection
