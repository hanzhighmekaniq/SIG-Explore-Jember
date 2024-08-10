<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    {{-- NAVBAR CUSTOMER --}}
    {{-- TAILWIND & FLOWBITE --}}
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    {{-- GOOGLE FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Pacifico&display=swap" rel="stylesheet">

    {{-- CSS FONT --}}
    <link rel="stylesheet" href="./css/font.css">
    {{-- ALPINE.JS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<nav class="absolute z-40 w-full">
    <div class="hidden xl:block">
        <div class="flex items-center justify-between bg-white shadow-md h-[50px] w-full">
            <div class="text-xl pl-10">
                <a href="#beranda" class="pacifico-regular text-[#656D4A] hover:text-black">Visit Jember</a>
            </div>
            <div>
                <ul class="flex space-x-16 archivo-uniquifier text-xl pr-10">
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'text-black' : 'text-gray-600' }} hover:text-black">Beranda</a>
                    </li>
                    <li>
                        <a href="/wisata" class="{{ request()->is('wisata') ? 'text-black' : 'text-gray-600' }} hover:text-black">Wisata</a>
                    </li>
                    <li>
                        <a href="/petaWilayah" class="{{ request()->is('petaWilayah') ? 'text-black' : 'text-gray-600' }} hover:text-black">Peta Wilayah</a>
                    </li>
                    <li>
                        <a href="/hubungiKami" class="{{ request()->is('hubungiKami') ? 'text-black' : 'text-gray-600' }} hover:text-black">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="xl:hidden">
        <div class="flex items-center justify-between bg-white shadow-md h-auto w-full">

            <div class="flex items-center p-2">
                <!-- Mobile menu button -->
                <button type="button" class="text-[#656D4A] hover:text-black" data-drawer-target="navbar-default" data-drawer-toggle="navbar-default">
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4a2 2 0 012-2h12a2 2 0 012 2v1H2V4zm0 5h16v2H2V9zm16 5H2v-2h16v2z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex items-center p-2 px-4">
                <a href="#beranda" class="pacifico-regular text-[#656D4A] hover:text-black">
                    Visit Jember
                </a>
            </div>

            <!-- Drawer -->
            <div id="navbar-default" class="fixed top-0 left-0 z-40 w-80 h-full p-4 bg-[#656D4A] hidden transition-transform -translate-x-full overflow-y-auto" tabindex="-1" aria-labelledby="navbar-default-label">
                <div class="flex items-center justify-between pb-3">
                    <a href="#beranda" class="text-xl pacifico-regular text-white">Visit Jember</a>
                    <button type="button" class="text-white" data-drawer-hide="navbar-default">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 011.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"></path>
                        </svg>
                    </button>
                </div>

                <ul class="space-y-4 text-white">
                    <li>
                        <a href="/" class="{{ request()->is('/') ? 'text-white' : 'text-black' }} hover:text-white">Beranda</a>
                    </li>
                    <li>
                        <a href="/wisata" class="{{ request()->is('wisata') ? 'text-white' : 'text-black' }} hover:text-white">Wisata</a>
                    </li>
                    <li>
                        <a href="/petaWilayah" class="{{ request()->is('petaWilayah') ? 'text-white' : 'text-black' }} hover:text-white">Peta Wilayah</a>
                    </li>
                    <li>
                        <a href="/hubungiKami" class="{{ request()->is('hubungiKami') ? 'text-white' : 'text-black' }} hover:text-white">Hubungi Kami</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
