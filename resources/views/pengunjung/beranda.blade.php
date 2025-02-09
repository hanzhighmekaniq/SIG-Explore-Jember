        <x-layout>

            <div class="bg-white top-0 w-full h-auto" id="beranda">
                <!-- Hero Section -->
                <div class="relative">
                    <img src="{{ asset('img/bg-2.jpg') }}" alt="Full Width"
                        class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <figcaption class="container ">
                            <div class=" text-center px-4 2xl:px-8 space-y-4 lg:space-y-10">
                                <p
                                    class="rubik-mono-one-regular font-semibold text-3xl sm:text-4xl lg:text-6xl xl:text-7xl 2xl:text-7xl text-[#FFFFFF] drop-shadow-lg">
                                    WISATA <br> KABUPATEN JEMBER
                                </p>
                                <p
                                    class="text-white break-words font-serif text-sm sm:text-sm    md:text-lg lg:text-xl xl:text-2xl drop-shadow-lg">
                                    Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya yang
                                    kaya,
                                    serta
                                    berbagai destinasi wisata menarik. Dari keindahan Pantai Papuma hingga pesona
                                    Rembangan
                                    yang
                                    sejuk, Jember siap memberikan pengalaman liburan yang tak terlupakan. Jelajahi
                                    keajaiban
                                    alam
                                    dan nikmati keragaman budaya di setiap sudut kota yang menawan ini.
                                </p>
                                {{-- <div class="w-auto h-auto flex justify-center m-auto">
                                        <a class="bg-[#C2C5AA] shadow-lg shadow-gray-800 text-xs xl:text-base px-6 py-2 xl:px-12 xl:py-2 rounded-2xz xl:rounded-xl text-center flex items-center justify-center font-serif text-black"
                                            href="" role="button">Buka Peta Wisata</a>
                                    </div> --}}
                            </div>
                        </figcaption>
                    </div>
                </div>
                <div class="container">
                    <div class="px-4 grid grid-cols-1 gap-y-20 py-20">
                        <!-- Upcoming Events -->
                        <div>
                            <div class="mb-4">
                                <p class="text-2xl font-bold pb-2 ">Event Yang Akan Datang</p>
                                <h5 class="pl-0">Berikut adalah event yang akan datang saat ini</h5>
                            </div>


                            @if ($event->isEmpty())
                                <div class="p-10 text-center font-bold text-gray-500 rounded border">
                                    Event yang akan datang sedang tidak ada.
                                </div>
                            @else
                                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper -->
                                    <div class="relative overflow-hidden rounded-lg aspect-[1080/424]">
                                        @foreach ($event as $index => $eventItem)
                                            <a
                                                href="{{ route('profilWisata.index', $eventItem->wisata->nama_wisata) }}">
                                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                                    <img src="{{ asset('storage/' . $eventItem->img) }}"
                                                        class="absolute block w-full h-full object-cover transition-all duration-300 filter grayscale hover:grayscale-0"
                                                        alt="{{ $eventItem->name ?? 'Event Image' }}">
                                                </div>
                                            </a>
                                        @endforeach


                                    </div>
                                    <!-- Slider indicators -->
                                    <div
                                        class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                                        @foreach ($event as $index => $eventItem)
                                            <button type="button" class="w-3 h-3 rounded-full"
                                                aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                                                aria-label="Slide {{ $index + 1 }}"
                                                data-carousel-slide-to="{{ $index }}"></button>
                                        @endforeach
                                    </div>
                                    <!-- Slider controls -->
                                    <button type="button"
                                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                        data-carousel-prev>
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                            </svg>
                                            <span class="sr-only">Previous</span>
                                        </span>
                                    </button>
                                    <button type="button"
                                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                                        data-carousel-next>
                                        <span
                                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                            </svg>
                                            <span class="sr-only">Next</span>
                                        </span>
                                    </button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>




                <div class="container px-4 mt-10">
                    <div class="mb-4 flex justify-between">
                        <!-- Section Title -->
                        <div>

                            <p class="text-2xl font-bold pb-2">Persebaran Wisata</p>
                            <h5 class="pl-0">Berikut adalah persebaran seluruh wisata saat ini</h5>
                        </div>
                        <div class="flex items-end">
                            <a href="{{ route('petaWilayah.index') }}"
                                class="px-4 py-2 bg-[#4A8FE7] text-white rounded-xl">Selengkapnya</a>
                        </div>
                    </div>

                    <!-- Leaflet Map -->
                    <div id="map" class="h-96 rounded-lg relative z-[1]"></div>

                    <!-- LEAFLET JS -->
                    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                    <script>
                        // Inisialisasi peta dengan titik tengah di Jember
                        var map = L.map('map', {
                            scrollWheelZoom: false // Nonaktifkan zoom saat scroll
                        }).setView([-8.184485, 113.668075], 10);

                        // Tambahkan tile layer dari OpenStreetMap
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                        }).addTo(map);

                        @foreach ($wisata as $wisata)
                            // Tambahkan marker lokasi wisata dengan popup
                            L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                                .bindPopup(
                                    `<b>{{ $wisata->nama_wisata }}</b><br>{{ $wisata->kategori_detail->nama_kategori_detail }}, {{ $wisata->kategori_detail->kategori->nama_kategori }}.`
                                );
                        @endforeach
                    </script>



                    <!-- Popular Tourist Spots -->
                    <div class="container py-28 px-4">
                        <div class="mb-4 flex justify-between">
                            <div>

                                <p class="text-2xl font-bold pb-2">Beberapa Wisata</p>
                                <h5 class="pl-0">Berikut adalah beberapa wisata saat ini</h5>
                            </div>
                            <div class="flex items-end">
                                <a href="{{ route('wisata.pengunjung') }}"
                                    class="px-4 py-2 bg-[#4A8FE7] text-white rounded-xl">Selengkapnya</a>
                            </div>
                        </div>



                        <div class="grid xl:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-8">
                            @foreach ($filterWisata as $filter)
                                <div class="space-y-2 h-auto w-auto border border-slate-500 p-4 rounded-lg">
                                    <img class="object-cover w-full aspect-[1080/540] rounded-lg"
                                        src="{{ asset('storage/' . $filter->img) }}" alt="Image">

                                    <div class="w-auto h-auto">
                                        <p class="text-black font-bold text-xl">{{ $filter->nama_wisata }}</p>
                                        <div class="flex text-black items-center font-semibold">

                                            <p class="pr-1  text-md">
                                                {{ $filter->kategori_detail->kategori->nama_kategori }},
                                            </p>
                                            <p class=" text-sm">

                                                {{ $filter->kategori_detail->nama_kategori_detail }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex w-full">
                                        <a href="{{ route('profilWisata.index', $filter->nama_wisata) }}"
                                            class="w-full text-center bg-[#414833] text-white rounded-lg py-2 mt-4">Lihat
                                            Detail</a>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>
        </x-layout>
