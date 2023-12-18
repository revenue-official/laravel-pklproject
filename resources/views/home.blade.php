@extends('layouts.app')
@section('content')
    <div id="home" class="w-full min-h-screen bg-gradient-to-r from-red-600 from-40% via-red-400 to-red-500">
        <div class="container mx-auto w-full sm:w-4/5 min-h-fit">
            <div class="w-full">
                <div class="text-white text-center pt-14">
                    <h1 class="text-2xl sm:text-3xl font-poppins font-bold tracking-wide py-1 drop-shadow-md swipe-left-1">
                        SMK Negeri 4 Tanjungpinang</h1>
                    <h1
                        class="text-xl sm:text-2xl font-poppins font-semibold tracking-wide py-1 drop-shadow-md swipe-right-2">
                        Field Work Practices</h1>
                    <span class="fade-in-3">DINAS KOMUNIKASI DAN INFORMATIKA PROVINSI KEPULAUAN RIAU</span>
                    <div class="flex justify-center">
                        <div class="w-3/4 min-h-fit">
                            <p class="text-xs text-gray-200 drop-shadow-sm pt-5 fade-in-3">The RPL (Software Engineering)
                                major is a major that studies website and software development <span
                                    class="font-poppins font-semibold text-blue-50">including creation, maintenance,
                                    software development management and quality management.</span></p>
                            <div class="mt-10 fade-in-3">
                                <a href="#learning" type="button"
                                    class="bg-white text-gray-700 dark:text-white dark:bg-gray-800 py-1 px-3 sm:py-2 sm:px-5 rounded-md font-bold tracking-wide hover:bg-gray-300 dark:hover:bg-gray-900 cursor-pointer duration-300">
                                    <i class="fa-regular fa-circle-down"></i> Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 90 1440 180">
                <path class="wave-path duration-300" fill="rgb(249, 250, 251)" fill-opacity="1"
                    d="M0,160L60,144C120,128,240,96,360,112C480,128,600,192,720,202.7C840,213,960,171,1080,154.7C1200,139,1320,149,1380,154.7L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
                </path>
            </svg>
        </div>
        <section id="learning" class="w-full bg-gray-50 dark:bg-gray-800 pt-1 pb-3 duration-300">
            {{-- Card Learning Pages --}}
            <h2
                class="text-xl sm:text-2xl py-3 sm:pt-2 text-center font-poppins font-semibold text-blue-600 dark:text-blue-500 tracking-wide py-5 sm:pb-2 fade-in-2">
                <i class="fa-solid fa-code"></i> Let's Learning
            </h2>
            <div class="container px-2 sm:px-0 sm:w-4/5 min-h-fit mt-5 mb-5 sm:mt-2 sm:mb-3">
                <div class="flex flex-nowrap overflow-x-auto gap-5 justify-start mb-10 swipe-up-3">
                    @include('components.pro-card')
                </div>
            </div>
            <div class="flex justify-center">
                <div class=" flex flex-row relative w-[95%] sm:w-4/5 overflow-hidden py-5">
                    {{-- MARQUEE --}}
                    <div class="relative top-0 left-0 fade-in-5">
                        <div class="animate-marquee">
                            @include('components.pro-lang')
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="w-full min-h-screen bg-gray-200 dark:bg-gray-950 py-3 duration-300">
            <div class="container flex min-h-fit justify-center">
                <div class="w-4/5 h-20">
                    <div class="text-gray-800 text-center">
                        <h2
                            class="text-xl sm:text-2xl font-poppins font-semibold text-blue-600 dark:text-blue-500 tracking-wide py-5 fade-in-3">
                            <i class="fa-solid fa-layer-group"></i> This Project
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
