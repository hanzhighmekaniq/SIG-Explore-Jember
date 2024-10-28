    <x-layout>

    <div class="bg-white top-0 w-full h-auto">
        <!-- Hero Section -->
        <div class="relative">
            <img src="{{ asset('img/bg-utama.png') }}" alt="Full Width"
                class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
            <div class="absolute inset-0 flex items-center justify-center">
                <figcaption class="container ">
                    <div class="px-4 text-center space-y-4 lg:space-y-10">
                        <p
                            class="rubik-mono-one-regular font-semibold text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-7xl text-[#C2C5AA] drop-shadow-lg">
                            WISATA <br> KABUPATEN JEMBER
                        </p>
                        <p
                            class="text-white break-words font-serif text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl drop-shadow-lg">
                            Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya yang kaya,
                            serta
                            berbagai destinasi wisata menarik. Dari keindahan Pantai Papuma hingga pesona Rembangan yang
                            sejuk, Jember siap memberikan pengalaman liburan yang tak terlupakan. Jelajahi keajaiban
                            alam
                            dan nikmati keragaman budaya di setiap sudut kota yang menawan ini.
                        </p>
                        <div class="w-auto h-auto flex justify-center m-auto">
                            <a class="bg-[#C2C5AA] shadow-lg shadow-gray-800 text-xs xl:text-base px-6 py-2 xl:px-12 xl:py-2 rounded-2xl xl:rounded-3xl text-center flex items-center justify-center font-serif text-black"
                                href="" role="button">Buka Peta Wisata</a>
                        </div>
                    </div>
                </figcaption>
            </div>
        </div>

        <div class="container">
            <div class="px-4 grid grid-cols-1 gap-y-20 py-20">


                <!-- Upcoming Events -->
                <div>
                    <div class="mb-4">
                        <p class="text-2xl font-bold pb-2">🎆Event Yang Akan Datang</p>
                        <h5 class="pl-9">Berikut adalah event yang akan datang saat ini</h5>
                    </div>


                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-[570px] overflow-hidden  ">
                            <!-- Item 1 -->
                            <div class="p-2 hidden duration-700 ease-in-out md:flex md:h-auto"
                                data-carousel-item="active">
                                <div class="grid grid-cols-7 h-full bg-[#C2C5AA] p-4 rounded-md">
                                    <!-- Image Container -->
                                    <div class="col-span-7 xl:col-span-3 overflow-hidden">
                                        <img src="{{ asset('img/banner-berdiri.jpg') }}"
                                            class="rounded-lg object-center w-full h-full object-cover" alt="...">
                                    </div>
                                    <!-- Text Content -->
                                    <div class="hidden xl:flex xl:col-span-4 p-4  flex-col justify-center pl-8">
                                        <div>
                                            <h1 class="text-4xl font-bold flex pb-4">Jember Fashion Carnaval</h1>
                                            <p class="text-lg pr-20 mb-2 font-medium ">Jember Fashion Carnaval adalah
                                                acara
                                                tahunan
                                                yang menampilkan parade busana kreatif dengan tema yang berbeda setiap
                                                tahun.
                                                Acara ini dikenal dengan kostum yang megah dan penuh warna,
                                                menggabungkan
                                                elemen
                                                tradisional dan modern. Peserta dari berbagai daerah berpartisipasi,
                                                menciptakan
                                                suasana yang meriah dan menarik perhatian pengunjung</p>
                                            <div class=" py-2 font-bold">

                                                <p class="text-xl">Tanggal : 17 Agustus - 19 Mei 2004</p>
                                                <p class="text-xl">Jam : 18.00 - 20.00 WIB</p>
                                                <p class="text-xl">HTM : VIP Rp. 25.000 || REG Rp. 10.000</p>
                                            </div>
                                        </div>
                                        <div class="mt-auto text-xl">
                                            <a href="#"
                                                class="w-full p-2 flex justify-center bg-[#656D4A] text-slate-300 rounded-xl">Lihat
                                                Wisata
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <!-- Item 2 -->
                            <div class="p-2 hidden  duration-700 ease-in-out md:flex md:h-auto" data-carousel-item>
                                <div class="grid xl:grid-cols-7 grid-cols-1 h-full bg-[#C2C5AA] p-4 rounded-lg">
                                    <!-- Image Container -->
                                    <div class="col-span-7 xl:col-span-3 overflow-hidden">
                                        <img src="{{ asset('img/banner-berdiri.jpg') }}"
                                            class="rounded-lg object-center w-full h-full object-cover" alt="...">
                                    </div>
                                    <!-- Text Content -->
                                    <div class="hidden xl:flex xl:col-span-4 p-4  flex-col justify-center pl-8">
                                        <div>
                                            <h1 class="text-4xl font-bold flex pb-4">Jember Fashion Carnaval</h1>
                                            <p class="text-lg pr-20 mb-2 font-medium ">Jember Fashion Carnaval adalah
                                                acara
                                                tahunan
                                                yang menampilkan parade busana kreatif dengan tema yang berbeda setiap
                                                tahun.
                                                Acara ini dikenal dengan kostum yang megah dan penuh warna,
                                                menggabungkan
                                                elemen
                                                tradisional dan modern. Peserta dari berbagai daerah berpartisipasi,
                                                menciptakan
                                                suasana yang meriah dan menarik perhatian pengunjung</p>
                                            <div class=" py-2 font-bold">

                                                <p class="text-xl">Tanggal : 17 Agustus - 19 Mei 2004</p>
                                                <p class="text-xl">Jam : 18.00 - 20.00 WIB</p>
                                                <p class="text-xl">HTM : VIP Rp. 25.000 || REG Rp. 10.000</p>
                                            </div>
                                        </div>
                                        <div class="mt-auto text-xl">
                                            <a href="#"
                                                class="w-full p-2 flex justify-center bg-[#656D4A] text-slate-300 rounded-xl">Lihat
                                                Wisata
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-3.svg"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 4 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-4.svg"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                            <!-- Item 5 -->
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="/docs/images/carousel/carousel-5.svg"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="...">
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-500  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-500  group-hover:bg-white/50  group-focus:ring-4 group-focus:ring-white  group-focus:outline-none">
                                <svg class="w-4 h-4 text-white  rtl:rotate-180" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>

                </div>


                <!-- Popular Tourist Spots -->
                <div>
                    <div class="mb-4">
                        <p class="text-2xl font-bold pb-2">🏝️Beberapa Wisata</p>
                        <h5 class="pl-9">Berikut adalah beberapa wisata saat ini</h5>
                    </div>

                    <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
                        <div class="space-y-2 h-auto w-auto border border-slate-500 p-4 rounded-lg">
                            <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}"
                                alt="Image">
                            <div class="w-auto h-auto">
                                <p class="text-black font-bold text-xl">Rembangan</p>
                                <p class="text-black text-sm">
                                    Wisata Alam, Wisata Keluarga, Gunung
                                </p>
                            </div>
                            <div class="flex-grow"></div>
                            <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                        </div>
                        <div class="space-y-2 h-auto w-auto border border-slate-500 p-4 rounded-lg">
                            <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}"
                                alt="Image">
                            <div class="w-auto h-auto">
                                <p class="text-black font-bold text-xl">Rembangan</p>
                                <p class="text-black text-sm">
                                    Wisata Alam, Wisata Keluarga, Gunung
                                </p>
                            </div>
                            <div class="flex-grow"></div>
                            <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                        </div>
                        <div class="space-y-2 h-auto w-auto border border-slate-500 p-4 rounded-lg">
                            <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/dufan.jpeg') }}"
                                alt="Image">
                            <div class="w-auto h-auto">
                                <p class="text-black font-bold text-xl">Rembangan</p>
                                <p class="text-black text-sm">
                                    Wisata Alam, Wisata Keluarga, Gunung
                                </p>
                            </div>
                            <div class="flex-grow"></div>
                            <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                        </div>

                    </div>

                </div>


                <!--Peta persebaran-->
                <div>
                    <div class="">
                        <!-- Section Title -->
                        <div class="mb-4">
                            <p class="text-2xl font-bold pb-2">🗺️Persebaran Wisata</p>
                            <h5 class="pl-9">Berikut adalah persebaran seluruh wisata saat ini</h5>
                        </div>
                        <!-- Dropdown and Search Bar -->
                        <form class="flex items-center justify-end mb-4">
                            <!-- Dropdown -->

                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                type="button">Semua <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdown"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Alami</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const dropdownButton = document.getElementById('dropdownDefaultButton');
                                    const dropdownMenu = document.getElementById('dropdown');

                                    dropdownButton.addEventListener('click', function() {
                                        dropdownMenu.classList.toggle('hidden');
                                        dropdownMenu.style.zIndex = 1000; // Set z-index saat dropdown terbuka
                                    });

                                    window.addEventListener('click', function(event) {
                                        if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                            dropdownMenu.classList.add('hidden');
                                        }
                                    });
                                });
                            </script>

                        </form>

                        <!-- Leaflet Map -->
                        <div id="map" class="w-full h-[650px] rounded-lg"></div>
                    </div>


                    {{-- LEFLEAT JS --}}

                    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                    <script>
                        // Initialize Leaflet map
                        var map = L.map('map', {
                            center: [-8.1691362, 113.7021103],
                            zoom: 10,
                            zoomControl: true, // Menonaktifkan kontrol zoom
                            dragging: true, // Menonaktifkan dragging
                            scrollWheelZoom: false // Menonaktifkan zoom dengan scroll mouse
                        });

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
            </div>
        </div>
</x-layout>
