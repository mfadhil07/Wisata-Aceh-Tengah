<div class="min-h-screen hidden lg:flex flex-col flex-shrink-0 antialiased bg-gray-50 text-gray-800 relative w-64">
    <div class="flex-col flex bg-gray-100 h-full border-r fixed w-64">
        <div class="flex items-start justify-between">
            <div class="h-screen my-4 shadow-lg relative w-80">
                <div class="bg-gray-100 h-full rounded-2xl dark:bg-gray-700">
                    @auth
                        @if (auth()->user()->role == 1)
                            <div class="flex ml-8 pt-6">
                                <a href="/dashboard">
                                    <h1 class="font-sans font-bold text-5xl tracking-tighter leading-tight text-green-600">
                                        WEBGIS
                                    </h1>
                                </a>
                            </div>
                            <nav class="mt-6">
                                <td><a href="#" role="button" data-toggle="modal" data-target="#myModal"></a></td>
                                <div class="flex flex-wrap">
                                    <button
                                        class="flex items-center w-64 h-12 pl-3 focus:outline-none bg-gray-300 hover:bg-gray-300 hover:rounded-md
                                                type="button"
                                        onclick="openDropdown(event,'dropdown-example-1')">
                                        <div class="avatar">
                                            <div class=" rounded-box w-10 h-10">
                                                <img src="https://www.hyperui.dev/photos/man-5.jpeg ">
                                            </div>
                                        </div>
                                        <div>
                                            <p class="flex ml-3 font-bold">Admin</p>
                                        </div>
                                        {{-- <span class=" ml-4 text-2sm hidden md:inline-block">
                                            {{ auth()->user()->username }}
                                        </span> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 ml-24 w-full flex items-end"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                                        </svg>
                                    </button>
                                    <div class="hidden bg-white w-full text-base z-50 float-right py-2 list-none dropdown-right text-right rounded shadow-lg mt-1"
                                        style="min-width: 12rem" id="dropdown-example-1">
                                        <ul class="bg-gray-400 w-full">
                                            <li class="px-2 py-3 border-b hover:bg-green-400"><a href="dashboard/profile">My
                                                    Profile</a>
                                            </li>
                                            </li>
                                            <li class="px-2 py-3 hover:bg-green-400"><a href="/logout">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'dashboard' ? 'active: bg-green-600' : ' ' }} "
                                    href="/dashboard">
                                    <span class="text-left">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Home
                                    </span>
                                </a>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'a_maps' ? 'active: bg-green-600' : ' ' }} "
                                    href="/a_maps">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Maps
                                    </span>
                                </a>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'a_daftar' ? 'active: bg-green-600' : ' ' }} "
                                    href="/a_daftar">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Objek Wisata
                                    </span>
                                </a>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'a_info' ? 'active: bg-green-600' : ' ' }} "
                                    href="/a_info">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Info Wisata
                                    </span>
                                </a>
                        @endif
                        @if (auth()->user()->role == 2)
                            <div class="flex ml-8 pt-6">
                                <a href="/dashboard">
                                    <h1 class="font-sans font-bold text-5xl tracking-tighter leading-tight text-green-600">
                                        WEBGIS
                                    </h1>
                                </a>
                            </div>
                            <nav class="mt-6">
                                <td><a href="#" role="button" data-toggle="modal" data-target="#myModal"></a></td>
                                <div class="flex flex-wrap">
                                    <button
                                        class="flex items-center w-full h-12 pl-3 focus:outline-none bg-gray-300 hover:bg-gray-300 hover:rounded-md
                                            type="button"
                                        onclick="openDropdown(event,'dropdown-example-1')">
                                        <div class="avatar">
                                            <span class="ml-4 text-2sm font-bold hidden md:inline-block">
                                                {{ auth()->user()->name }} </span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 ml-40 w-full flex items-end" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                                            </svg>
                                    </button>
                                    <div class="hidden bg-gray-100 w-full text-base z-50 float-right py-2 list-none dropdown-right text-right rounded shadow-lg mt-1"
                                        style="min-width: 12rem" id="dropdown-example-1">
                                        <ul class="bg-gray-400 w-full">
                                            <li class="px-2 py-3 hover:bg-green-400"><a href="/logout">Log out</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'dashboard' ? 'active: bg-green-600' : ' ' }} "
                                    href="/dashboard">
                                    <span class="text-left">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                            </path>
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Home
                                    </span>
                                </a>
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'a_maps' ? 'active: bg-green-600' : ' ' }} "
                                    href="/a_maps">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Maps
                                    </span>
                                </a>
                                {{-- <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'daftar' ? 'active: bg-green-600' : ' ' }} "
                                    href="/daftar">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Objek Wisata
                                    </span>
                                </a> --}}
                                <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'a_info' ? 'active: bg-green-600' : ' ' }} "
                                    href="/a_info">
                                    <span class="text-left">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </span>
                                    <span class="mx-4 text-sm font-normal">
                                        Info Wisata
                                    </span>
                                </a>
                        @endif

                        {{-- Navbar User --}}
                    @else
                        <ul>
                            <li>
                                <div class="flex ml-8 pt-6">
                                    <a href="/">
                                        <h1
                                            class="font-sans font-bold text-5xl tracking-tighter leading-tight text-green-600">
                                            WEBGIS
                                        </h1>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'home' ? 'active: bg-green-600' : ' ' }} "
                                        href="/">
                                        <span class="text-left">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                </path>
                                            </svg>
                                        </span>
                                        <span class="mx-4 text-sm font-normal">
                                            Home
                                        </span>
                                    </a>
                                    <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'maps' ? 'active: bg-green-600' : ' ' }} "
                                        href="/maps">
                                        <span class="text-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                        </span>
                                        <span class="mx-4 text-sm font-normal">
                                            Maps
                                        </span>
                                    </a>

                                    {{-- <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'daftar' ? 'active: bg-green-600' : ' ' }} "
                                        href="/daftar">
                                        <span class="text-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </span>
                                        <span class="mx-4 text-sm font-normal">
                                            Objek Wisata
                                        </span>
                                    </a> --}}
                                    <a class="w-full font-thin uppercase text-black dark:text-gray-200 flex items-center p-4 my-2 border-transparent transition-colors duration-200 justify-start hover:text-black hover:bg-green-300 bg-gradient-to-r hover:from-white to-green-600 border-r-4 hover:border-green-500 {{ $active === 'info' ? 'active: bg-green-600' : ' ' }} "
                                        href="/info">
                                        <span class="text-left">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        <span class="mx-4 text-sm font-normal">
                                            Info Wisata
                                        </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    @endauth
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
