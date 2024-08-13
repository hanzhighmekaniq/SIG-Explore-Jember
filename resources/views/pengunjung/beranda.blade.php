<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jember Tourism</title>
    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Pacifico&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Arimo:ital,wght@0,700;1,700&family=DM+Serif+Display:ital@0;1&family=DM+Serif+Text:ital@0;1&family=Jersey+25&family=Poetsen+One&family=Ramabhadra&family=Righteous&family=Rubik+Mono+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <!-- CSS Font -->
    <link rel="stylesheet" href="./css/font.css">
    <!-- Jf -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.2.7/dist/tailwind.min.css" rel="stylesheet">
</head>

<body id="home" class="bg-white p-0 top-0">

    @include('partials.navbarPengunjung')


    <div class="bg-white top-0 w-full h-auto">
        <!-- Hero Section -->
        <div class="relative">
            <img src="{{ asset('img/bg-utama.png') }}" alt="Full Width"
                class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
            <div class="absolute inset-0 flex items-center justify-center">
                <figcaption class="container text-center space-y-4 lg:space-y-10">
                    <p
                        class="rubik-mono-one-regular font-semibold text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-7xl text-[#C2C5AA] drop-shadow-lg">
                        WISATA <br> KABUPATEN JEMBER
                    </p>
                    <p
                        class="text-white break-words font-serif text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl drop-shadow-lg">
                        Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya yang kaya, serta
                        berbagai destinasi wisata menarik. Dari keindahan Pantai Papuma hingga pesona Rembangan yang
                        sejuk, Jember siap memberikan pengalaman liburan yang tak terlupakan. Jelajahi keajaiban alam
                        dan nikmati keragaman budaya di setiap sudut kota yang menawan ini.
                    </p>
                    <div class="w-auto h-auto flex justify-center m-auto">
                        <a class="bg-[#C2C5AA] shadow-lg shadow-gray-800 text-xs xl:text-base px-6 py-2 xl:px-12 xl:py-2 rounded-2xl xl:rounded-3xl text-center flex items-center justify-center font-serif text-black"
                            href="" role="button">Buka Peta Wisata</a>
                    </div>
                </figcaption>
            </div>
        </div>

        <!-- Popular Tourist Spots -->
        <div class="container mx-auto py-16">
            <div class="flex justify-center mb-10">
                <h2 class="text-4xl font-bold">Wisata Terpopuler</h2>
            </div>
            <div class="flex items-center space-x-4">
                <!-- Cards Container -->
                <div class="flex space-x-4">
                    <!-- Card 1 -->
                    <!-- Card 1 -->
                    <div class="border border-gray-300 rounded-lg p-4 w-full">
                        <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Wisata-Rembangan.jpg') }}" alt="Image" />
                        <div class="mt-2">
                            <h5 class="text-xl font-bold text-gray-900">Rembangan</h5>
                            <p class="text-sm text-gray-700">Wisata Alam, Pegunungan</p>
                        </div>
                        <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Selengkapnya</button>
                    </div>

                    <!-- Card 2 -->
                    <div class="border border-gray-300 rounded-lg p-4 w-full">
                        <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/papuma.jpg') }}" alt="Image 1" />
                        <div class="mt-2">
                            <h5 class="text-xl font-bold text-gray-900">Pantai Papuma</h5>
                            <p class="text-sm text-gray-700">Wisata Alam, Pantai</p>
                        </div>
                        <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Selengkapnya</button>
                    </div>

                    <!-- Card 3 -->
                    <div class="border border-gray-300 rounded-lg p-4 w-full">
                        <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/minizoo.jpg') }}" alt="Image 1" />
                        <div class="mt-2">
                            <h5 class="text-xl font-bold text-gray-900">Mini Zoo</h5>
                            <p class="text-sm text-gray-700">Wisata Keluarga, Kebun Binatang</p>
                        </div>
                        <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Selengkapnya</button>
                    </div>

                    <!-- Card 4 -->
                    <div class="border border-gray-300 rounded-lg p-4 w-full">
                        <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/museumtembakau.jpg') }}" alt="Image 1" />
                        <div class="mt-2">
                            <h5 class="text-xl font-bold text-gray-900">Museum Tembakau</h5>
                            <p class="text-sm text-gray-700">Wisata Sejarah</p>
                        </div>
                        <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Selengkapnya</button>
                    </div>

                </div>

                <!-- Next Button -->
                <div class="flex items-center">
                    <a href="#" role="button"
                        class="flex items-center justify-center text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm h-full w-12">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>>
            </div>

            <!-- Upcoming Events -->
            <div class="container m-auto">
                <div class="p-4 mt-36 mb-10 flex justify-center items-center">
                    <p class="font-bold 2xl:text-4xl mb-10">Event Yang Akan Datang</p>
                </div>

                <!-- Carousel -->
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel Wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Carousel Items -->
                        <div class="flex space-x-4 duration-700 ease-in-out" data-carousel-item>
                            <!-- Item 1 -->
                            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="image1.jpg" alt="Event 1">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Event 1</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deskripsi singkat tentang event 1.</p>
                                </div>
                            </a>
                            <!-- Item 2 -->
                            <a href="#" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="image2.jpg" alt="Event 2">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Event 2</h5>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Deskripsi singkat tentang event 2.</p>
                                </div>
                            </a>
                            <!-- Tambahkan lebih banyak item carousel sesuai kebutuhan -->
                        </div>
                    </div>
                    <!-- Slider Indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <!-- Tambahkan lebih banyak indikator slide sesuai kebutuhan -->
                    </div>
                    <!-- Slider Controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>
                
            </div>

            <!--Peta persebaran-->
            <div class="container mx-auto p-6">
                <!-- Section Title -->
                <div class="p-4 mt-36 mb-10 flex justify-center items-center">
                    <p class="font-bold 2xl:text-4xl mb-10">Peta Persebaran</p>
                </div>

                <!-- Dropdown and Search Bar -->
                <form class="flex items-center mb-4">
                    <!-- Dropdown -->
                    <div class="relative">
                        <button id="dropdown-button" data-dropdown-toggle="dropdown"
                            class="inline-flex items-center py-2.5 px-4 text-sm font-medium text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600"
                            type="button">
                            All categories
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <div id="dropdown"
                            class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                <li><button type="button"
                                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata
                                        Alam</button></li>
                                <li><button type="button"
                                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata
                                        Budaya</button></li>
                                <li><button type="button"
                                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata
                                        Sejarah</button></li>
                                <li><button type="button"
                                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata
                                        Keluarga</button></li>
                                <li><button type="button"
                                        class="w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata
                                        Pendidikan</button></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="relative flex-grow mx-4">
                        <input type="search" id="search-dropdown"
                            class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                            placeholder="Search wisata..." required />
                        <button type="submit"
                            class="absolute top-0 end-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </form>

                <!-- Leaflet Map -->
                <div id="map" class="w-full h-96 rounded-lg"></div>
            </div>

            <!-- Include Leaflet JS -->
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <!-- Include Flowbite JS (if any) -->
            <script src="https://cdn.jsdelivr.net/npm/flowbite@1.6.1/dist/flowbite.min.js"></script>
            <script>
                // Initialize Leaflet map
                var map = L.map('map').setView([-8.167, 113.701], 12); // Coordinates for Jember, adjust as needed

                // Add OpenStreetMap tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Add sample markers (replace with real data)
                L.marker([-8.167, 113.701]).addTo(map)
                    .bindPopup('Wisata 1')
                    .openPopup();

                // Add more markers here
            </script>

        </div>

        <!-- Alpine.js -->
        <script src="//unpkg.com/alpinejs" defer></script>
</body>
@include('partials.footerPengunjung')

</html>
