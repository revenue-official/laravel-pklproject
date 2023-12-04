{{-- Navigasi Bar --}}
<div id="navbar" class="absolute top-0 flex justify-center w-full font-sans duration-300">
    <div id="animation" class="flex justify-center w-full font-sans swipe-down-1">
        <nav class="dark: fg-dark flex justify-between fixed w-3/4 py-3 px-10 bg-white text-black duration-300 transform shadow-md mt-3 rounded-md z-10">
            <h1 class="font-bold text-blue-500 text-xl lg:text-sm lg:my-2 cursor-default">
                <i class="ri-box-3-line"></i> Laravel Project <span class="animated-foremoji drop-shadow-sm text-2xl lg:text-sm">👋</span>
            </h1>
            <ul class="flex gap-5 text-xs items-center">
                <li><a class=" {{ $title === 'Home' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/"><i class="ri-home-3-fill text-lg"></i>
                        <span class="lg:hidden">HOME</span></a></li>
                <li><a class="{{ $title === 'Dashboard' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/dashboard"><i class="ri-dashboard-2-fill text-lg"></i>
                        <span class="lg:hidden">DASHBOARD</span></a></li>
                <li><a class="{{ $title === 'Project' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/changes"><i class="ri-mind-map text-lg"></i>
                        <span class="lg:hidden">PROJECT</span></a></li>
                {{-- Search button --}}
                <li class="relative p-0 m-0">
                    <input class="inputSearch dark:text-white dark:bg-zinc-800 w-4 h-7 px-4 py-1 rounded-full duration-300 cursor-pointer bg-inherit outline-blue-400  border-none outline-none opacity-0" type="input" name="searching" href="/project" placeholder=" Input Text . . ." pattern="[a-zA-Z0-9].{1,20}" required>
                    <i class="ri-search-line text-lg absolute top-0 left-[.6rem] pointer-events-none cursor-pointer"></i>
                    <select id="categoryItem" class="absolute top-[.1rem] right-1 bg-inherit rounded-full p-1 duration-300 hidden outline-none">
                        <option class="text-black dark: bg-dark dark:text-white" value="kode_aset">KODE</option>
                        <option class="text-black dark: bg-dark dark:text-white" value="nama_aset">NAMA</option>
                        <option class="text-black dark: bg-dark dark:text-white" value="harga_aset">HARGA</option>
                        <option class="text-black dark: bg-dark dark:text-white" value="id_jenis">JENIS</option>
                        <option class="text-black dark: bg-dark dark:text-white" value="id_lokasi">LOKASI</option>
                        <option class="text-black dark: bg-dark dark:text-white" value="id_status">STATUS</option>
                    </select>
                </li>
                {{-- Toogle button darkmode --}}
                <li>
                    <label for="darkModeToggle" class="cursor-pointer">
                        <input type="checkbox" id="darkModeToggle" class="hidden">
                        <i class="ri-sun-line text-black text-lg"></i>
                        <i class="ri-moon-line text-blue-400 moon-neon text-lg"></i>
                    </label>
                </li>
                {{-- Profile --}}
                <li class="relative cursor-pointer">
                    <div class="w-9 min-h-max rounded-full border-2 border-blue-500 bg-gray-200 flex items-center justify-center relative overflow-hidden">
                        {{-- PROFILE --}}
                        @if(isset($_COOKIE['avatar']))
                        @php
                        $decUserName = decrypt(request()->cookie('userName'));
                        $decUserId = decrypt(request()->cookie('userId'));
                        $decAvatar = decrypt(request()->cookie('avatar'));
                        @endphp
                        {{-- modern profile --}}
                        <img id="profileThumbnail" src="{{ isset($_COOKIE['avatar']) && $decAvatar != 'undefined'
                        ? $decAvatar
                        : "https://api.multiavatar.com/" . ( !isset($_COOKIE['userName'])
                        ? ''
                        : $decUserName ) ."1.svg"}}" alt="Error" class="object-cover w-full h-full">
                        @else
                        {{-- OLD PROFILE --}}
                        <img id="profileThumbnail" src="{{ isset($_COOKIE['avatar']) && $decAvatar != 'undefined'
                        ? $decAvatar
                        : "https://ui-avatars.com/api/?name=" . ( !isset($_COOKIE['userName'])
                        ? ''
                        : $decUserName ) . "&size=200&background=random"}}" alt="Error" class="object-cover w-full h-full">
                        @endif
                    </div>
                    <div id="dropProfile" class="absolute w-40 min-h-full block bg-white dark: fg-dark rounded-md shadow-md top-[-.7rem] left-20 overflow-hidden translate-x-[110%] hidden duration-300">
                        @if(isset($_COOKIE['userId']))
                        <div>
                            <a class="relative flex w-full h-10 text-black dark:text-white gap-3 px-4 hover:bg-blue-500 duration-300 rounded-md" href="">
                                <i class="ri-profile-line text-lg py-2"></i>
                                <span class="text-xs py-3 uppercase font-bold overflow-x-hidden">Profile : {{ isset($_COOKIE['userName'])
                                    ? $decUserName
                                    : '' }}
                                </span>
                            </a>
                        </div>
                        <div>
                            <a class="relative flex w-full h-10 text-black dark:text-white gap-3 px-4 hover:bg-blue-500 duration-300 rounded-md" href="{{route('logout')}}">
                                <i class="ri-logout-box-r-line text-lg py-2"></i>
                                <span class="text-xs py-3 uppercase font-bold">Logout</span>
                            </a>
                        </div>
                        @else
                        <div>
                            <a class="relative flex w-full h-10 text-black dark:text-white gap-3 px-4 hover:bg-blue-500 duration-300 rounded-md" href="{{route('login')}}">
                                <i class="ri-login-box-line text-lg py-2"></i>
                                <span class="text-xs py-3 uppercase font-bold">Login</span>
                            </a>
                        </div>
                        @endif
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
