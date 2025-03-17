<nav class="w-full bg-white shadow-md xl:shadow-lg z-[100] relative">
    <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-2 lg:p-4">
        <a href="/" class="pacifico-regular text-lg lg:text-2xl text-[#205C9E] hover:text-[#4A90E2] transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">Explore Jember</a></a>
        <style>
            .pacifico-regular {
                font-family: "Pacifico", cursive;
                font-weight: 400;
                font-style: normal;
            }
        </style>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white">
                <ul class="flex flex-col md:flex-row md:space-x-8">
                    <!-- Menu "Home" -->
                    <li>
                        <a href="/"
                            class="block py-2 px-3 rounded md:bg-transparent md:p-0 transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                {{ request()->is('/') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}"
                            aria-current="page">Home</a>
                    </li>

                    <!-- Menu "Wisata" -->
                    <li>
                        <a href="/wisata"
                            class="block py-2 px-3 rounded md:bg-transparent md:p-0 transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                {{ request()->is('wisata*') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}">
                            Wisata
                        </a>
                    </li>

                    <!-- Menu "Peta Wilayah" -->
                    <li>
                        <a href="/petaWilayah"
                            class="block py-2 px-3 rounded md:bg-transparent md:p-0 transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                {{ request()->is('petaWilayah*') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}">
                            Peta Wilayah
                        </a>
                    </li>
                </ul>
                <li>
                    @auth

                        <div class="relative">
                            <!-- Tombol User Menu -->
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95"
                                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                                data-dropdown-placement="bottom">
                                <span class="sr-only font-poppins">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg"
                                    alt="user photo">
                            </button>

                            <!-- Dropdown Menu -->
                            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-sm"
                                id="user-dropdown">
                                <div class="px-4 py-3">
                                    <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span>
                                    <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span>
                                </div>
                                <ul class="py-2" aria-labelledby="user-menu-button">
                                    <!-- Menu "Dashboard" -->
                                    <li>
                                        <a href="{{ route('dashboard') }}"
                                            class="block px-4 py-2 text-sm transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                        {{ request()->is('dashboard') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}">
                                            Dashboard
                                        </a>
                                    </li>

                                    <!-- Menu "Settings" -->
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 text-sm transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                        {{ request()->is('settings') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}">
                                            Settings
                                        </a>
                                    </li>

                                    <!-- Menu "Sign out" -->
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            class="block px-4 py-2 text-sm transition-all duration-300 ease-in-out font-poppins transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                                        {{ request()->is('logout') ? 'text-[#205C9E] font-semibold border-b-2 border-[#205C9E]' : 'text-gray-500 hover:text-[#4A90E2] hover:border-b-2 hover:border-[#4A90E2]' }}">
                                            Sign out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                    @guest
                        <a href="/login"
                            class="block py-2 px-3 rounded md:bg-transparent md:p-0 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                            {{ request()->is('login*') ? 'text-[#205C9E] font-semibold' : 'text-[#205C9E] hover:text-[#4A90E2]' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="25" height="25" x="0" y="0"
                                viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"
                                class="transition-colors duration-300 fill-current">
                                <g>
                                    <g fill-rule="evenodd">
                                        <path
                                            d="M11.55.815a5.25 5.25 0 1 0 0 10.5 5.25 5.25 0 0 0 0-10.5zM15.719 12.09c.485-.55 1.199-.9 1.993-.9h1.908a2.658 2.658 0 0 1 2.658 2.659v6.678a2.658 2.658 0 0 1-2.658 2.658h-1.908c-.794 0-1.508-.35-1.993-.9a.75.75 0 1 1 1.124-.992c.213.241.523.392.869.392h1.908c.64 0 1.158-.519 1.158-1.158v-6.678c0-.64-.518-1.159-1.158-1.159h-1.908c-.346 0-.656.151-.869.393a.75.75 0 0 1-1.125-.993z">
                                        </path>
                                        <path
                                            d="M17.935 16.657a.75.75 0 0 1 0 1.06l-2 2a.75.75 0 0 1-1.061-1.06l2-2a.75.75 0 0 1 1.06 0z">
                                        </path>
                                        <path
                                            d="M17.935 17.718a.75.75 0 0 0 0-1.06l-2-2a.75.75 0 0 0-1.061 1.06l2 2a.75.75 0 0 0 1.06 0z">
                                        </path>
                                        <path
                                            d="M11.154 17.188a.75.75 0 0 1 .75-.75h5a.75.75 0 0 1 0 1.5h-5a.75.75 0 0 1-.75-.75z">
                                        </path>
                                    </g>
                                    <path
                                        d="M13.788 13.622a18.9 18.9 0 0 0-11.17 2.07c-.542.288-.88.85-.88 1.464v3.672c0 .966.783 1.75 1.75 1.75h10.685a2.258 2.258 0 0 1-.02-1.52 2.254 2.254 0 0 1-.985-1.62h-1.264a2.25 2.25 0 1 1 0-4.5h1.264a2.24 2.24 0 0 1 .62-1.316z">
                                    </path>
                                </g>
                            </svg>
                        </a>
                    @endguest

                </li>
            </ul>
        </div>

    </div>
</nav>
