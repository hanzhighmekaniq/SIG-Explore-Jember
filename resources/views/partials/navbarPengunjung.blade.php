<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>


    {{-- NAVBAR CUSTOMER --}}
    {{-- TAILWIND --}}
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Pacifico&display=swap" rel="stylesheet">
    <link
    href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Arimo:ital,wght@0,700;1,700&family=DM+Serif+Display:ital@0;1&family=DM+Serif+Text:ital@0;1&family=Jersey+25&family=Poetsen+One&family=Ramabhadra&family=Righteous&family=Rubik+Mono+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    {{-- CSS FONT --}}
    <link rel="stylesheet" href="./css/font.css">
    {{-- ALPIN.JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<nav class="fixed xl:top-5 z-40 w-full flex-none">
    <div class="container hidden xl:block">
        <div class="flex xl:h-[60px] shadow-[#656D4A] w-full justify-between rounded-3xl items-center m-auto bg-white"
            style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);">
            <div class="justify-start text-xl pl-10">
                <a href="#beranda" class="scroll-smooth pacifico-regular text-[#656D4A] hover:text-black">Visit
                    Jember</a>
            </div>
            <div>
                <ul class="flex justify-center space-x-5 archivo-uniquifier text-xl pr-10">
                    <li>
                        <a href="/"
                            class="{{ request()->is('/') ? 'text-black' : 'text-gray-600' }} hover:text-black scroll-smooth">Beranda</a>
                    </li>
                    <li>
                        <a href="/wisata"
                            class="{{ request()->is('wisata') ? 'text-black' : 'text-gray-600' }} hover:text-black scroll-smooth">Wisata</a>
                    </li>
                    <li>
                        <a href="/petaWilayah"
                            class="{{ request()->is('petaWilayah') ? 'text-black' : 'text-gray-600' }} hover:text-black scroll-smooth">Peta
                            Wilayah</a>
                    </li>
                    <li>
                        <a href="/hubungiKami"
                            class="{{ request()->is('hubungiKami') ? 'text-black' : 'text-gray-600' }} hover:text-black scroll-smooth">Hubungi
                            Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="xl:hidden">
        <div class="flex xl:h-auto w-full justify-between  items-center m-auto bg-white"
            style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);">

            <div class="flex items-center justify-center text-center text-xl p-2">

                <div class="drawer">
                    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
                    <div class="drawer-content ">
                        <!-- Page content here -->
                        <label for="my-drawer"
                            class="btn btn-circle bg-white hover:bg-white hover:text-black text-[#656D4A] border-none rounded-none swap swap-rotate">
                            <!-- this hidden checkbox controls the state -->
                            <input type="checkbox" />

                            <!-- hamburger icon -->
                            <svg class="swap-off fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 512 512">
                                <path d="M64,384H448V341.33H64Zm0-106.67H448V234.67H64ZM64,128v42.67H448V128Z" />
                            </svg>

                            <!-- close icon -->
                            <svg class="swap-on fill-current" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 512 512">
                                <polygon
                                    points="400 145.49 366.51 112 256 222.51 145.49 112 112 145.49 222.51 256 112 366.51 145.49 400 256 289.49 366.51 400 400 366.51 289.49 256 400 145.49" />
                            </svg>
                        </label>
                    </div>
                    <div class="drawer-side">
                        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay "></label>
                        <ul class="menu bg-[#656D4A] text-base-content min-h-full w-80 p-4">
                            <!-- Sidebar content here -->
                            <li>
                                <a href="/"
                                    class="{{ request()->is('/') ? 'text-white' : 'text-black' }} hover:text-white scroll-smooth">Beranda</a>
                            </li>
                            <li>
                                <a href="/wisata"
                                    class="{{ request()->is('wisata') ? 'text-white' : 'text-black' }} hover:text-white scroll-smooth">Wisata</a>
                            </li>
                            <li>
                                <a href="/petaWilayah"
                                    class="{{ request()->is('petaWilayah') ? 'text-white' : 'text-black' }} hover:text-white scroll-smooth">Peta
                                    Wilayah</a>
                            </li>
                            <li>
                                <a href="/hubungiKami"
                                    class="{{ request()->is('hubungiKami') ? 'text-white' : 'text-black' }} hover:text-white scroll-smooth">Hubungi
                                    Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center text-center text-xl p-2 px-4">
                <a href="#beranda" class="pacifico-regular flex text-[#656D4A] hover:text-black">
                    <span>Visit</span>
                    <span class="ml-1">Jember</span>
                </a>
            </div>
        </div>
    </div>

</nav>