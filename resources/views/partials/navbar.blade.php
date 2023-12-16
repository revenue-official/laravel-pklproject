<div class="absolute flex w-full max-h-20">
    <nav class="container relative sticky top-0 h-14 flex justify-center items-center drop-shadow-md">
        <div class="absolute bg-white dark:bg-gray-800 w-fit h-10 py-2 px-5 sm:px-10 rounded-full flex justify-center item-center drop-shadow-md">
            <ul class="flex flex-shrink-0 gap-5 sm:gap-10 text-gray-500">
                <li class="text-center flex items-center py-1 px-1 rounded-full bg-blue-500">
                    <a class="font-poppins font-semibold text-sm drop-shadow-sm {{$title == "home" ? "text-gray-50" : ''}}" href="#" title="">
                        <i class="fa-solid fa-house"></i>
                    </a>
                </li>
                <li class="text-center flex items-center">
                    <a class="font-poppins font-semibold text-sm drop-shadow-sm" href="#learning" title="">
                        <i class="fa-solid fa-layer-group"></i>
                    </a>
                </li>
                <li class="text-center flex items-center">
                    <a class="font-poppins font-semibold text-sm drop-shadow-sm" href="" title="">
                        <i class="fa-solid fa-user"></i>
                    </a>
                </li>
                <li class="relative text-center flex items-center">
                    <input type="checkbox" id="dark-mode" class="absolute left-[4px] opacity-0 cursor-pointer font-poppins font-semibold text-sm drop-shadow-sm">
                    <svg class="sun-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun">
                        <circle cx="12" cy="12" r="4" />
                        <path d="M12 2v2" />
                        <path d="M12 20v2" />
                        <path d="m4.93 4.93 1.41 1.41" />
                        <path d="m17.66 17.66 1.41 1.41" />
                        <path d="M2 12h2" />
                        <path d="M20 12h2" />
                        <path d="m6.34 17.66-1.41 1.41" />
                        <path d="m19.07 4.93-1.41 1.41" />
                    </svg>
                    <svg class="moon-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon">
                        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z" />
                    </svg>
                    </input>
                </li>
            </ul>
        </div>
    </nav>
</div>
