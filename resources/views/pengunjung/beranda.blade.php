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
            <div class="absolute inset-0 flex items-center xl:mb-28 justify-center">
                <figcaption class="container px-4">
                    <div class="grid grid-cols-2">
                        <div class="text-start space-y-4 lg:space-y-10">
                            <!-- Judul -->
                            <p
                                class="font-fjalla font-semibold text-2xl sm:text-4xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-[#FFFFFF] drop-shadow-lg">
                                WISATA <br>
                                <span class="typing-animation" id="typing-text">KABUPATEN JEMBER</span>
                            </p>
                        </div>

                    </div>
                    <div class="grid grid-cols-8 md:grid-cols-3">
                        <div class="col-span-8 md:col-span-2">
                            <p
                                class="text-white break-words font-montserrat text-xs sm:text-sm md:text-lg lg:text-xl xl:text-2xl drop-shadow-lg">
                                Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya
                                yang
                                kaya, serta berbagai destinasi wisata menarik. Jelajahi keajaiban alam dan
                                nikmati
                                keragaman budaya di setiap sudut
                                kota yang menawan ini.
                            </p>

                        </div>
                        <div class="col-span-0 md:col-span-1">

                        </div>
                    </div>
                </figcaption>
            </div>
        </div>

        <style>
            .typing-animation {
                overflow: hidden;
                border-right: 0.15em solid white;
                white-space: nowrap;
                display: inline-block;
                width: 0ch;
                /* Gunakan ch agar sesuai panjang karakter */
                animation: typing 3s steps(1, end) forwards, blink-caret 0.75s step-end infinite;
            }

            @keyframes typing {
                from {
                    width: 0ch;
                }

                to {
                    width: var(--char-count);
                }
            }

            @keyframes blink-caret {

                from,
                to {
                    border-color: transparent;
                }

                50% {
                    border-color: white;
                }
            }
        </style>

        <script>
            function setTypingAnimation() {
                const typingElement = document.getElementById("typing-text");
                const textLength = typingElement.textContent.length; // Hitung jumlah karakter

                // Gunakan CSS variabel untuk menyesuaikan panjang teks
                typingElement.style.setProperty("--char-count", textLength + "ch");
                typingElement.style.animation =
                    `typing 3s steps(${textLength}, end) forwards, blink-caret 0.75s step-end infinite`;
            }

            function restartAnimation() {
                const typingElement = document.getElementById("typing-text");
                typingElement.style.animation = "none"; // Hentikan animasi sementara
                void typingElement.offsetHeight; // Trigger reflow
                setTypingAnimation(); // Atur ulang animasi
            }

            setTypingAnimation(); // Jalankan saat halaman dimuat
            setInterval(restartAnimation, 7000); // Ulangi animasi setiap 7 detik
        </script>
    </div>
    <div class="container bg-white">
        <div class="px-4 grid grid-cols-1 gap-y-4 pb-20 relative z-[1] opacity-0 translate-y-10 transition-all duration-[1500ms]"
            id="eventScrol">
            <!-- Upcoming Events -->

            <div class="mb-4">
                <p class="text-3xl font-fjalla font-bold pb-2 text-[#004165]">EVENT YANG AKAN DATANG</p>
                <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah event yang akan datang saat ini
                </h5>
            </div>


            @if ($event->isEmpty())
                <div class="p-10 text-center font-bold text-gray-500 rounded border font-poppins">
                    Event yang akan datang sedang tidak ada.
                </div>
            @else
                <div class="swiper mySwiper relative w-full">
                    <div class="swiper-wrapper">
                        @foreach ($event as $eventItem)
                            <div class="swiper-slide">
                                <a href="{{ route('profilWisata.index', $eventItem->wisata->nama_wisata) }}"
                                    class="relative block">
                                    <img src="{{ asset('storage/' . $eventItem->img) }}"
                                        class="aspect-[3/4] w-full object-cover rounded-lg transition-all duration-300 filter"
                                        alt="{{ $eventItem->name ?? 'Event Image' }}">

                                    <!-- Overlay Blur di Bagian Bawah -->
                                    <div
                                        class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black/100 via-black/50 to-transparent backdrop-blur- rounded-b-lg">
                                    </div>

                                    <!-- Nama Event di Tengah -->
                                    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                                        <p
                                            class="text-white text-center font-fjalla uppercase font-semibold text-lg md:text-xl lg:text-3xl px-4 py-2">
                                            {{ $eventItem->nama_event }}
                                        </p>
                                    </div>
                                </a>

                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- Navigation Buttons dengan Icon FontAwesome -->
                    <div class="swiper-button-next">
                        <i class="fas fa-chevron-right"></i> <!-- Icon panah kanan -->
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fas fa-chevron-left"></i> <!-- Icon panah kiri -->
                    </div>

                    <!-- Script Swiper -->
                    <script>
                        document.addEventListener("DOMContentLoaded", function () {
                            new Swiper(".mySwiper", {
                                slidesPerView: 2, // Default untuk layar kecil
                                spaceBetween: 10,
                                loop: true, // Agar bisa berputar terus
                                pagination: {
                                    el: ".swiper-pagination",
                                    clickable: true,
                                },
                                navigation: {
                                    nextEl: ".swiper-button-next",
                                    prevEl: ".swiper-button-prev",
                                },
                                autoplay: {
                                    delay: 5000, // Ganti slide setiap 5 detik
                                    disableOnInteraction: false,
                                },
                                breakpoints: {
                                    1024: { // Jika ukuran layar 1024px (lg) ke atas
                                        slidesPerView: 4,
                                    },
                                    640: { // Jika ukuran layar 1024px (lg) ke atas
                                        slidesPerView: 3,
                                    }
                                }
                            });
                        });
                    </script>

                    <!-- Styling untuk tombol navigasi -->
                    <style>
                        .swiper-button-next,
                        .swiper-button-prev {
                            background-color: rgba(0, 0, 0, 0.5);
                            /* Background semi-transparan */
                            color: white;
                            /* Warna icon */
                            width: 40px;
                            /* Lebar tombol */
                            height: 40px;
                            /* Tinggi tombol */
                            border-radius: 50%;
                            /* Bentuk bulat */
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: background-color 0.3s ease;
                            /* Efek transisi */
                        }

                        .swiper-button-next:hover,
                        .swiper-button-prev:hover {
                            background-color: rgba(0, 0, 0, 0.8);
                            /* Background lebih gelap saat hover */
                        }

                        .swiper-button-next::after,
                        .swiper-button-prev::after {
                            display: none;
                            /* Menghilangkan icon default Swiper */
                        }

                        .swiper-button-next i,
                        .swiper-button-prev i {
                            font-size: 20px;
                            /* Ukuran icon */
                        }
                    </style>

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
                <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah persebaran seluruh wisata saat ini
                </h5>
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
        document.addEventListener("DOMContentLoaded", function () {
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