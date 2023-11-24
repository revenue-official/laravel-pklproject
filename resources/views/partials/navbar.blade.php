{{-- Navigasi Bar --}}
<div id="navbar" class="absolute top-0 flex justify-center w-full font-sans">
    <nav class="dark: fg-dark flex justify-between fixed w-3/4 py-3 px-10 bg-neutral-100 text-black duration-300 transform shadow-md mt-3 rounded-md z-10">
        <h1 class="font-bold text-blue-500 text-xl cursor-default">
            <i class="ri-box-3-line"></i> Laravel Project <span class="animated-foremoji drop-shadow-sm text-2xl">👋</span>
        </h1>
        <ul class="flex gap-5 text-xs items-center">
            <li><a class=" {{ $title === 'Home' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/"><i class="ri-home-3-fill text-lg"></i> HOME</a></li>
            <li><a class="{{ $title === 'Dashboard' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/dashboard"><i class="ri-dashboard-2-fill text-lg"></i> DASHBOARD</a></li>
            <li><a class="{{ $title === 'Project' ? 'text-blue-500' : 'text-gray-600 dark:text-zinc-400 hover:text-black dark:hover:text-zinc-300' }}" href="/changes"><i class="ri-mind-map text-lg"></i> PROJECT</a></li>
            {{-- Search button --}}
            <li class="relative p-0 m-0">
                <input class="inputSearch dark:text-white dark:bg-zinc-800 w-4 h-7 px-4 py-1 rounded-full duration-300 cursor-pointer bg-inherit outline-blue-400  border-none outline-none opacity-0" type="input" name="searching" href="/project" placeholder=" Input Text . . ." pattern="[a-zA-Z0-9].{1,20}" required>
                <i class="ri-search-line text-lg absolute top-0 left-[.6rem] pointer-events-none cursor-pointer"></i>
                <select id="categoryItem" class="absolute top-[.1rem] right-1 bg-inherit rounded-full p-1 duration-300 hidden">
                    <option value="kode_aset">KODE</option>
                    <option value="nama_aset">NAMA</option>
                    <option value="harga_aset">HARGA</option>
                    <option value="id_jenis">JENIS</option>
                    <option value="id_lokasi">LOKASI</option>
                    <option value="id_status">STATUS</option>
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
                <div class="w-9 min-h-max rounded-full border border-blue-500 bg-gray-200 flex items-center justify-center relative overflow-hidden">
                    <img id="profileThumbnail" src="{{$getUser['google_picture']}}" alt="Profile Picture" class="object-cover w-full h-full">
                </div>
                <div id="dropMenu" class="absolute w-40 min-h-full block bg-white dark: fg-dark rounded-md shadow-md top-[-.7rem] left-20 overflow-hidden opacity-0 duration-300">
                    <div>
                        <a class="relative flex w-full h-6 text-black dark:text-white gap-3 px-4 py-1 hover:bg-blue-500 rounded-md" href="">
                            <i class="ri-profile-line"></i>
                            <span class="text-xs overflow-x-hidden">Profile : {{ $_COOKIE['userName'] }}</span>
                        </a>
                    </div>
                    <div>
                        <a class="relative flex w-full h-6 text-black dark:text-white gap-3 px-4 py-1 hover:bg-blue-500 rounded-md" href="{{route('logout')}}">
                            <i class="ri-logout-box-r-line"></i>
                            <span class="text-xs">Logout</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>
</div>
