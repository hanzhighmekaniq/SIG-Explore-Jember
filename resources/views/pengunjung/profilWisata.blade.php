<x-layout>
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
                    class="xl:col-span-2 flex flex-col justify-between dm-sans bg-slate-200 rounded-lg p-6 shadow-xl shadow-slate-400">
                    <div>
                        <!-- Judul "Tentang" -->
                        <p class="text-3xl font-semibold castoro-regular mb-4">Tentang</p>

                        <!-- Deskripsi Wisata -->
                        <p class="text-lg font-serif mb-6 leading-relaxed text-justify" style="text-indent: 2rem;">
                            {{ $wisata->deskripsi_wisata }}
                        </p>

                        <!-- Informasi Wisata (Sejajar & Sama dengan "Tentang") -->
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Lokasi</p>
                            <p>: {{ $wisata->lokasi }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Kategori</p>
                            <p>: {{ $wisata->kategori_detail->kategori->nama_kategori }},
                                {{ $wisata->kategori_detail->nama_kategori_detail }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Fasilitas</p>
                            <p>: {{ $wisata->fasilitas }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">HTM</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Parkir</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                    </div>

                    <!-- Tombol Rute Terdekat -->
                    <div class="mt-6 w-full flex justify-end">
                        <a href="{{ route('ruteTerdekat.index', $wisata->nama_wisata) }}"
                            class="px-6 w-full py-2 rounded-lg bg-slate-300 shadow-md shadow-slate-400 hover:bg-slate-400 transition"
                            target="_blank">
                            Rute Terdekat
                        </a>
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
            <div class="grid pb-10">
                <div id="map" class="aspect-[1920/640] z-[1]"></div> <!-- Tentukan tinggi untuk peta -->
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

        @if ($wisata->kuliners->isEmpty())
        @else
            <div class="pt-10 lg:pt-32">
                <p class="font-bold 2xl:text-4xl mb-10">Kuliner yang Tersedia</p>
                <div class="w-full h-auto overflow-x-auto whitespace-nowrap p-4 border">
                    <div class="flex gap-4">
                        @foreach ($wisata->kuliners as $kulinersss)
                            <button data-modal-target="modal-gambar-detail-wisata-{{ $kulinersss->id }}"
                                data-modal-toggle="modal-gambar-detail-wisata-{{ $kulinersss->id }}" class="shrink-0"
                                type="button">
                                <div class="relative border w-40 md:w-56">
                                    <img src="{{ asset('storage/' . $kulinersss->gambar_kuliner) }}"
                                        alt="{{ $kulinersss->nama_kuliner }}"
                                        class="w-full h-auto object-cover aspect-[3/4] rounded-lg">
                                    <p
                                        class="absolute top-0 left-1/2 -translate-x-1/2 bg-black bg-opacity-50 text-white px-4 py-2 text-center">
                                        {{ $kulinersss->nama_kuliner }}
                                    </p>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if ($wisata->events && $wisata->events->isNotEmpty())
            <div class="pt-32 pb-32">
                @foreach ($wisata->events as $event)
                    <div class="duration-700 ease-in-out mb-6" data-carousel-item>
                        <img src="{{ asset('storage/' . $event->img) }}"
                            class="block w-full h-auto max-h-[500px] object-cover transition-all duration-300 filter grayscale hover:grayscale-0 mx-auto"
                            alt="{{ $event->name ?? 'Event Image' }}">
                        <p class="text-center mt-4 font-semibold text-lg">{{ $event->nama_event ?? 'Event Name' }}
                        </p>
                    </div>
                @endforeach
            </div>
        @else
            {{-- <p class="text-center text-gray-500">Tidak ada event yang sedang berlangsung saat ini.</p> --}}
        @endif
    </div>
    @foreach ($wisata->kuliners as $kuliner)
        <div id="modal-gambar-detail-wisata-{{ $kuliner->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-6xl max-h-full">
                <div class="relative rounded-lg shadow dark:bg-gray-700 bg-white">
                    <!-- Modal body -->
                    <div class="p-4">
                        @if (!empty($kuliner->gambar_menu))
                            <div class="gridQQQQQQ md:grid-cols-8 gap-4">
                                <!-- Kolom Gambar -->
                                <div class="col-span-3 border rounded-lg relative overflow-x-auto">
                                    <div class="flex space-x-4  flex-nowrap">
                                        @foreach (json_decode($kuliner->gambar_menu, true) as $gambar_menu)
                                            <div class="flex-shrink-0 w-64">
                                                <button data-modal-target="modal-galeri-kuliner{{ $kulinersss->id }}"
                                                    data-modal-toggle="modal-galeri-kuliner{{ $kulinersss->id }}"
                                                    class="shrink-0" type="button">
                                                    <img src="{{ asset('storage/' . $gambar_menu) }}"
                                                        class="object-cover aspect-[3/4] rounded-lg"
                                                        alt="Gambar Kuliner {{ $kuliner->nama_kuliner }}">
                                                </button>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Kolom Informasi -->
                                <div class="col-span-5">
                                    <!-- Tampilkan Nama Kuliner -->
                                    <div class="mb-4">
                                        <h2 class="text-2xl font-bold text-gray-800">
                                            {{ $kuliner->nama_kuliner }}
                                        </h2>
                                    </div>

                                    <!-- Tampilkan Deskripsi -->
                                    <div class="mb-6">
                                        <h3 class="text-lg font-semibold text-gray-700">Deskripsi:</h3>
                                        <p class="text-gray-600 leading-relaxed">
                                            {{ $kuliner->deskripsi_kuliner ?? 'Deskripsi tidak tersedia.' }}
                                        </p>
                                    </div>

                                    <!-- Tampilkan Informasi Tambahan -->
                                    <div class="mb-6">
                                        <h3 class="text-lg font-semibold text-gray-700">Informasi Tambahan:</h3>
                                        <ul class="list-disc pl-5 text-gray-600">
                                            <li><strong>Harga:</strong>
                                                Rp{{ number_format($kuliner->harga_kuliner, 0, ',', '.') }}</li>
                                            <li><strong>ID Kuliner:</strong> {{ $kuliner->id }}</li>
                                            <li><strong>Lokasi:</strong> {{ $kuliner->lokasi ?? 'Tidak diketahui' }}
                                            </li>
                                            <li><strong>Kategori:</strong>
                                                {{ $kuliner->kategori->nama_kategori ?? 'Tidak ada kategori' }}</li>
                                        </ul>
                                    </div>

                                    <!-- Tampilkan Kontak (Opsional) -->
                                    @if (!empty($kuliner->kontak))
                                        <div class="mb-6">
                                            <h3 class="text-lg font-semibold text-gray-700">Kontak:</h3>
                                            <p class="text-gray-600">
                                                {{ $kuliner->kontak }}
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="text-center text-gray-500">Tidak ada gambar yang tersedia.</p>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endforeach
</x-layout>
