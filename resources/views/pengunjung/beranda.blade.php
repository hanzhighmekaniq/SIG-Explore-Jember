        <x-layout>

            <div class="bg-white top-0 w-full h-auto" id="beranda">
                <!-- Hero Section -->
                <div class="relative">
                    <div>
                        <img src="{{ asset('img/bg-2.jpg') }}" alt="Full Width"
                            class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
                        <img src="{{ asset('img/layered-waves-haikei.svg') }}" alt="Full Width"
                            class="  w-full relative bottom-10 sm:bottom-12 md:bottom-16 lg:bottom-24 2xl:bottom-36">
                    </div>
                    <div class="absolute inset-0 flex items-center mb-10 justify-center">
                        <figcaption class="container ">
                            <div class=" text-center px-4  2xl:px-8 space-y-4 lg:space-y-10">
                                <p
                                    class="font-fjalla font-semibold text-2xl sm:text-4xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-[#FFFFFF] drop-shadow-lg">
                                    WISATA <br> KABUPATEN JEMBER
                                </p>
                                <p
                                    class="text-white break-words font-montserrat text-sm sm:text-sm md:text-lg lg:text-xl xl:text-2xl drop-shadow-lg">
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
                <div class="container bg-white">
                    <div class="px-4 grid grid-cols-1 gap-y-20 pb-20 relative z-[1] opacity-0 translate-y-10 transition-all duration-[1500ms]"
                        id="eventScrol">
                        <!-- Upcoming Events -->

                        <div class="mb-4">
                            <p class="text-3xl font-fjalla font-bold pb-2 text-[#004165]">EVENT YANG AKAN DATANG</p>
                            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah event yang akan datang saat ini</h5>
                        </div>


                        @if ($event->isEmpty())
                            <div class="p-10 text-center font-bold text-gray-500 rounded border font-poppins">
                                Event yang akan datang sedang tidak ada.
                            </div>
                        @else
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative overflow-hidden rounded-lg aspect-[1504/384]">
                                    @foreach ($event as $index => $eventItem)
                                        <a href="{{ route('profilWisata.index', $eventItem->wisata->nama_wisata) }}">
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
                                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 6 10">
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
            </div>




            <div id="mapScroll"
                class="container px-4 mt-10 relative z-[1] opacity-0 translate-y-10 transition-all duration-[1500ms]">
                <div class="mb-4 flex justify-between">
                    <!-- Section Title -->
                    <div>

                        <p class="text-3xl font-bold pb-2 font-fjalla text-[#004165]">PERSEBARAN WISATA</p>
                        <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah persebaran seluruh wisata saat ini</h5>
                    </div>
                    <div class="flex items-end">
                        <a href="{{ route('petaWilayah.index') }}"
                            class="px-4 py-2 rounded-xl text-white font-semibold transition-all duration-500 ease-in-out
                        bg-[linear-gradient(to_bottom_right,#00BAFF_2%,#006495_100%)]
                        hover:bg-[linear-gradient(to_bottom_right,#006495_2%,#00BAFF_100%)]
                        hover:scale-105 hover:shadow-2xl active:scale-95
                        relative overflow-hidden
                        before:absolute before:inset-0 before:bg-[linear-gradient(to_bottom_right,#006495_2%,#00BAFF_100%)]
                        before:opacity-0 before:transition-opacity before:duration-500 before:ease-in-out
                        hover:before:opacity-100 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            <span class="relative z-10 font-poppins">Selengkapnya</span>
                        </a>
                    </div>
                </div>

                <!-- Leaflet Map -->
                <div id="map" class="h-96 rounded-lg ">
                </div>




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
                <div id="wisataScroll"
                    class="container py-28 px-4 relative z-[1] opacity-0 translate-y-10 transition-all duration-[1500ms]">
                    <div class="mb-4 flex justify-between ">
                        <div>

                            <p class="text-3xl font-bold pb-2 text-[#004165] font-fjalla">BEBERAPA WISATA</p>
                            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah beberapa wisata saat ini</h5>
                        </div>
                        <div class="flex items-end">
                            <a href="{{ route('wisata.pengunjung') }}"
                                class="px-4 py-2 rounded-xl text-white font-semibold transition-all duration-500 ease-in-out
                                    bg-[linear-gradient(to_bottom_right,#00BAFF_2%,#006495_100%)]
                                    hover:bg-[linear-gradient(to_bottom_right,#006495_2%,#00BAFF_100%)]
                                    hover:scale-105 hover:shadow-2xl active:scale-95
                                    relative overflow-hidden
                                    before:absolute before:inset-0 before:bg-[linear-gradient(to_bottom_right,#006495_2%,#00BAFF_100%)]
                                    before:opacity-0 before:transition-opacity before:duration-500 before:ease-in-out
                                    hover:before:opacity-100 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                <span class="relative z-10 font-poppins">Selengkapnya</span>
                            </a>
                        </div>
                    </div>



                    <div class="grid xl:grid-cols-4 grid-cols-2 gap-4 xl:gap-8 ">
                        @foreach ($filterWisata as $filter)
                            <a href="{{ route('profilWisata.index', $filter->nama_wisata) }}"
                                class="shadow-xl shadow-slate-400 bg-white flex justify-between flex-col h-auto w-auto border-slate-500 rounded-lg
                                            transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:shadow-slate-400">
                                <div>

                                    <img class="object-cover w-full aspect-[1080/540] rounded-t-xl"
                                        src="{{ $filter->img ? asset('storage/' . $filter->img) : asset('images/placeholder.png') }}"
                                        alt="{{ $filter->nama_wisata }}" />

                                    <div class="w-auto h-auto pt-2 px-4 pb-4">
                                        <p class="text-black font-bold text-md">{{ $filter->nama_wisata }}</p>
                                        <p class="text-black text-sm">
                                            {{ $filter->kategori_detail->nama_kategori_detail ?? 'Kategori Tidak Tersedia' }}
                                            {{ $filter->kategori_detail->kategori->nama_kategori ?? 'Kategori Tidak Tersedia' }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach


                    </div>

                </div>

            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    let elements = document.querySelectorAll("#mapScroll, #eventScrol, #wisataScroll");

                    let observer = new IntersectionObserver((entries) => {
                        entries.forEach((entry) => {
                            if (entry.isIntersecting) {
                                entry.target.classList.remove("opacity-0", "translate-y-10");
                            }
                        });
                    }, {
                        threshold: 0.2
                    });

                    elements.forEach((el) => observer.observe(el));
                });
            </script>
        </x-layout>
