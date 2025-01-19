<x-layout>

    <body>
        <!-- Navbar Pengunjung -->
        <div class="container 2xl:pt-20 px-4">
            <div class="flex justify-start items-center">
                <div class=" pt-2">
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                            <li class="inline-flex items-center">
                                <a href="{{ route('wisata.pengunjung') }}"
                                    class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">

                                    Wisata
                                </a>
                            </li>
                            <li>
                                <div class="flex items-center">
                                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <a href="#"
                                        class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{ $wisata->nama_wisata }}</a>
                                </div>
                            </li>

                        </ol>
                    </nav>
                </div>
            </div>
            <div class="pt-4">
                <p class="font-bold 2xl:text-4xl mb-10">{{ $wisata->nama_wisata }}</p>
                <div class="grid grid-cols-1 xl:grid-cols-6 gap-4">
                    <div
                        class=" xl:col-span-2 flex flex-col justify-between dm-sans bg-slate-200 rounded-lg px-4 pb-6 pt-4 shadow-xl shadow-slate-400">
                        <div>
                            <p class="text-3xl font-semibold castoro-regular">Tentang</p>
                            <p class="text-lg font-serif pt-2" style="text-indent: 2rem;">
                                {{ $wisata->deskripsi_wisata }}
                            </p>
                        </div>

                        <div>
                            <div class="text-xl font-semibold space-y-1">
                                <div class="flex">
                                    <p class="w-32">Lokasi</p>
                                    <p class="w-4">:</p>
                                    <p>{{ $wisata->lokasi }}</p>
                                </div>
                                <div class="flex">
                                    <p class="w-32">Kategori</p>
                                    <p class="w-4">:</p>
                                    <p>{{ $wisata->kategori_detail->kategori->nama_kategori }},
                                        {{ $wisata->kategori_detail->nama_kategori_detail }}
                                    </p>
                                </div>
                                <div class="flex">
                                    <p class="w-32">Fasilitas</p>
                                    <p class="w-4">:</p>
                                    <p>{{ $wisata->fasilitas }}</p>
                                </div>
                                <div class="flex">
                                    <p class="w-32">HTM</p>
                                    <p class="w-4">:</p>
                                    <p>{{ $wisata->htm_wisata }}</p>
                                </div>
                                <div class="flex">
                                    <p class="w-32">Parkir</p>
                                    <p class="w-4">:</p>
                                    <p>{{ $wisata->htm_wisata }}</p>
                                </div>
                            </div>


                            <div class="items-end">
                                <div
                                    class="flex justify-center items-center px-4 py-2 rounded-lg mt-4 bg-slate-300 shadow-md shadow-slate-400">
                                    <p>Rute Terdekat</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="xl:col-span-4 flex flex-col rounded-2xl overflow-hidden shadow-xl shadow-slate-400">
                        <!-- Gambar Utama dan Galeri -->
                        <div class="col-span-4 rounded-lg overflow-hidden">
                            <!-- Gambar Utama -->
                            <div>
                                @if (!empty($imgDetails) && isset($imgDetails[0]))
                                    <img id="main-image" src="{{ asset('storage/' . $imgDetails[0]) }}"
                                        class="object-cover w-full h-[512px]"
                                        alt="Gambar utama {{ $wisata->nama_wisata }}">
                                @else
                                    <div class="flex justify-center items-center h-[512px] bg-gray-200 text-gray-500">
                                        <p>Gambar Kosong</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Gambar Kecil -->
                            @if (!empty($imgDetails))
                                <div class="grid grid-cols-8 gap-0">
                                    @foreach ($imgDetails as $img)
                                        <img src="{{ asset('storage/' . $img) }}"
                                            class="object-cover w-full h-24 cursor-pointer border-0 hover:border-blue-500"
                                            alt="Gambar detail"
                                            onclick="changeMainImage('{{ asset('storage/' . $img) }}')">
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-4 text-gray-500">
                                    <p>Gambar Detail Tidak Tersedia</p>
                                </div>
                            @endif
                        </div>

                        <!-- Script untuk Pergantian Gambar -->
                        <script>
                            function changeMainImage(newSrc) {
                                const mainImage = document.getElementById('main-image');
                                mainImage.src = newSrc;
                            }
                        </script>
                    </div>


                </div>
            </div>

            <div class="pt-32">
                <p class="font-bold 2xl:text-4xl mb-10">Lokasi Wilayah</p>
                <div class="grid">
                    <div id="map" class="aspect-video z-[1]"></div> <!-- Tentukan tinggi untuk peta -->
                </div>

                <!-- Memuat Leaflet -->
                <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                <script>
                    // Inisialisasi peta dengan titik tengah menggunakan koordinat dari variabel $wisata
                    var map = L.map('map', {
                        center: [{{ $wisata->latitude }}, {{ $wisata->longitude }}], // Atur titik pusat
                        zoom: 13, // Atur level zoom
                        scrollWheelZoom: false // Menonaktifkan zoom menggunakan scroll mouse
                    });

                    // Tambahkan tile layer dari OpenStreetMap
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                    }).addTo(map);

                    // Tambahkan marker lokasi wisata dengan popup
                    L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                        .bindPopup(
                            `<b>{{ $wisata->nama_wisata }}</b><br>{{ $wisata->kategori_detail->kategori->nama_kategori }}, {{ $wisata->kategori_detail->nama_kategori_detail }}.`
                        );
                </script>


            </div>


            <div class="pt-32">
                <p class="font-bold 2xl:text-4xl mb-10">Kuliner yang Tersedia</p>
                <div class="grid">
                    @if ($kuliner->isEmpty())

                        <p class="text-center">Kuliner tidak ada saat ini</p>
                    @else
                        <!-- beranda.blade.php -->
                        <div id="carousel" class="relative w-full" data-carousel="slide">
                            <!-- Carousel wrapper -->
                            <div class="relative overflow-hidden px-4">
                                @foreach ($kuliner->chunk(5) as $chunk)
                                    <!-- Memecah data menjadi potongan 5 per slide -->
                                    <div class="grid grid-cols-5 gap-4 duration-700 ease-in-out">
                                        @foreach ($chunk as $item)
                                            <a href="#" class="w-full flex-shrink-0 border p-4">
                                                <img src="{{ asset('storage/' . $item->gambar_kuliner) }}"
                                                    class="w-full h-48 object-contain rounded-lg" alt="Kuliner Image">
                                            </a>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>

                            <!-- Slider controls -->
                            <button type="button"
                                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                data-carousel-prev>
                                <span
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-500 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
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
                                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-slate-500 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 9 4-4-4-4" />
                                    </svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>

            <div class="pt-32 pb-32">
                <p class="font-bold 2xl:text-4xl mb-10">Event yang sedang berlangsung</p>

                @if ($wisata->events && $wisata->events->isNotEmpty())
                    @foreach ($wisata->events as $event)
                        <div class="duration-700 ease-in-out mb-6" data-carousel-item>
                            <img src="{{ asset('storage/' . $event->img) }}"
                                class="block w-full h-auto max-h-[500px] object-cover transition-all duration-300 filter grayscale hover:grayscale-0 mx-auto"
                                alt="{{ $event->name ?? 'Event Image' }}">
                            <p class="text-center mt-4 font-semibold text-lg">{{ $event->nama_event ?? 'Event Name' }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-center text-gray-500">Tidak ada event yang sedang berlangsung saat ini.</p>
                @endif
            </div>




        </div>


    </body>
</x-layout>
