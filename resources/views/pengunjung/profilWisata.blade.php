<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Jember</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link href="https://unpkg.com/tailwindcss@3.2.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://unpkg.com/flowbite@1.6.2/dist/flowbite.min.css" rel="stylesheet">
    <style>
        #map {
            height: 500px;
            /* Atur tinggi peta sesuai kebutuhan */
        }
    </style>
</head>
<body>
    <!-- Navbar Pengunjung -->
    @include('partials.navbarPengunjung')

    <div class="container mb-20 2xl:pt-20">
        <div class="flex justify-start items-center">
            <div class="pl-10 pt-2">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="pt-16">
            <p class="font-bold 2xl:text-4xl mb-10">Tanjung Papuma</p>
            <div class="grid grid-cols-5">
                <div class="pt-4 col-span-2 flex flex-col justify-between">
                    <div>
                        <p>Tentang</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Lokasi : Desa</p>
                        <p>Kategori</p>
                        <p>Fasilitas</p>
                        <p>HTM</p>
                        <p>Parkir</p>
                    </div>
                    <div class="items-end">
                        <div class="flex justify-center items-center px-4 py-2 rounded-lg mt-4 bg-slate-300">
                            <p>Rute Terdekat</p>
                        </div>
                    </div>
                </div>
                <div class="col-span-3 mx-4 flex flex-col rounded-2xl overflow-hidden">
                    <div>
                        <img src="{{ asset('img/bg-utama.png') }}" class="object-cover w-full h-[450px]" alt="">
                    </div>
                    <div class="grid grid-cols-7">
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                        <div>
                            <img src="{{ asset('img/bg-utama.png') }}" class="object-cover 2xl:h-20 2xl:w-auto" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-32">
            <p class="font-bold 2xl:text-4xl mb-10">Lokasi Wilayah</p>
            <div class="grid">
                <div id="map"></div>
            </div>
        </div>

        <div class="pt-32">
            <p class="font-bold 2xl:text-4xl mb-10">Kuliner yang Tersedia</p>
            <p>Ada beberapa kuliner yang tersedia ditempat wisata ini yang dijamin woeenaak pwoll</p>
            <div class="grid">
            </div>
        </div>

        <div class="pt-32">
            <p class="font-bold 2xl:text-4xl mb-10">Event yang sedang berlangsung</p>
            <div class="grid grid-cols-3">
                <div class="pt-4 col-span-1 flex flex-col rounded-2xl overflow-hidden justify-between">
                    <div>
                        <img src="{{ asset('img/banner-berdiri.jpg') }}" class="object-cover w-full h-[600px]" alt="">
                    </div>
                </div>
                <div class="pt-4 col-span-2 flex flex-col justify-between">
                    <div>
                        <p>Jember Fashion Carnaval</p>
                        <p>theme pinkyy pet</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Tanggal</p>
                        <p>Jam</p>
                        <p>HTM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/flowbite@1.6.2/dist/flowbite.min.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-8.1667, 113.6500], 13); // Koordinat Jember

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Menambahkan marker
        L.marker([-8.1667, 113.6500]).addTo(map)
            .bindPopup('Lokasi Wisata')
            .openPopup();
    </script>
</body>
</html>
@include('partials.footerPengunjung')