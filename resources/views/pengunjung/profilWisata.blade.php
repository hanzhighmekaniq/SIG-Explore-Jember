<x-layout>
    <div class="container  2xl:pt-20 px-4">
        <div class="flex justify-start items-center">
            <div class="pt-24 pb-2 md:pb-4 lg:pb- lg:pt-24 2xl:pt-2">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="{{ route('wisata.pengunjung') }}"
                                class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 ">

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
                                    class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 ">{{ $data->nama_wisata }}</a>
                            </div>
                        </li>

                    </ol>
                </nav>
            </div>
        </div>
        <div class="">
            <div class="xl:grid grid-cols-1 xl:grid-cols-8 gap-4 flex flex-col-reverse xl:flex-col">
                <div class="xl:col-span-3 dm-sans rounded-xl">
                    <!-- Tombol Navigasi -->
                    <p class="font-bold text-2xl 2xl:text-6xl mb-8 text-[#004165] font-fjalla uppercase">
                        {{ $data->nama_wisata }}
                    </p>

                    <div class="flex items-start space-x-2 text-md font-semibold">
                        <!-- Tombol Navigasi -->
                        <div class="flex space-x-2">
                            <!-- Tombol "Deskripsi" -->
                            <button id="btn-deskripsi"
                                class="tab-button active flex rounded-xl px-4 py-1 font-poppins
            bg-blue-300 text-white hover:bg-blue-400 hover:text-white hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Deskripsi
                            </button>

                            <!-- Tombol "Detail" -->
                            <button id="btn-detail"
                                class="tab-button flex rounded-xl px-4 py-1 font-poppins
            bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Detail
                            </button>

                            <!-- Tombol "Ulasan" -->
                            <button id="btn-ulasan"
                                class="tab-button flex rounded-xl px-4 py-1 font-poppins
            bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Ulasan
                            </button>

                            <!-- Tombol "Rute" -->
                            <a href="{{ route('ruteTerdekat.index', $data->nama_wisata) }}" target="_blank"
                                class="flex rounded-xl px-4 py-1 font-poppins
            bg-gray-200 text-gray-500 hover:bg-gray-300 hover:text-gray-600 hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Rute
                            </a>
                        </div>

                        <!-- Style Tombol Aktif -->
                        <style>
                            .tab-button {
                                transition: background-color 0.2s ease-in-out;
                            }

                            .tab-button.active {
                                background-color: #60A5FA;
                                /* blue-400 */
                                color: white;
                            }
                        </style>

                        <!-- Script Navigasi -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                const btnDeskripsi = document.getElementById("btn-deskripsi");
                                const btnDetail = document.getElementById("btn-detail");
                                const btnUlasan = document.getElementById("btn-ulasan");
                                const deskripsi = document.getElementById("deskripsi");
                                const detail = document.getElementById("detail");
                                const ulasan = document.getElementById("ulasan");
                                const buttons = document.querySelectorAll(".tab-button");

                                function showContent(showSection, activeButton) {
                                    // Sembunyikan semua section
                                    [deskripsi, detail, ulasan].forEach(section => section.classList.add("hidden"));

                                    // Tampilkan yang aktif
                                    showSection.classList.remove("hidden");

                                    // Reset semua tombol
                                    buttons.forEach(btn => btn.classList.remove("active", "bg-blue-300", "text-white"));
                                    activeButton.classList.add("active", "bg-blue-300", "text-white");
                                }

                                // Event listener
                                btnDeskripsi.addEventListener("click", () => showContent(deskripsi, btnDeskripsi));
                                btnDetail.addEventListener("click", () => showContent(detail, btnDetail));
                                btnUlasan.addEventListener("click", () => showContent(ulasan, btnUlasan));

                                // Default aktif di Deskripsi
                                showContent(deskripsi, btnDeskripsi);
                            });
                        </script>

                    </div>

                    <!-- Konten -->
                    <div class="py-4 pr-4">
                        <div id="deskripsi">
                            <p
                                class=" text-lg md:text-xl font-poppins text-gray-700 leading-loose text-justify indent-8 md:indent-12 first-letter:text-4xl first-letter:font-bold first-letter:text-gray-900 first-letter:mr-2 first-letter:font-serif">
                                {{ $data->deskripsi_wisata }}
                            </p>
                        </div>
                        <div id="detail" class="hidden">
                            <!-- Informasi Wisata -->
                            <div class="grid grid-cols-1 gap-4 text-gray-800">

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Kategori</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">
                                            {{ $data->kategori_detail->kategori->nama_kategori }},
                                            {{ $data->kategori_detail->nama_kategori_detail }}
                                        </p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Lokasi</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $data->lokasi }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Fasilitas</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $data->fasilitas }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">HTM</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">Rp {{ $data->htm_wisata }}</p>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12">
                                    <div class="col-span-2">
                                        <p class="font-semibold font-poppins">Parkir</p>
                                    </div>
                                    <div class="col-span-1">:</div>
                                    <div class="col-span-9">
                                        <p class="flex ml-2 font-poppins">{{ $data->parkir ?? 'Tidak tersedia' }}</p>
                                    </div>
                                </div>

                                <!-- Jam Operasional -->
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2">
                                    <p class="font-semibold col-span-full font-poppins">Jam Operasional</p>
                                    @php
                                        $jamOperasional = json_decode($data->jam_operasional, true) ?? [];
                                    @endphp

                                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                                        @php
                                            $jamBuka = $jamOperasional[$hari]['buka'] ?? null;
                                            $jamTutup = $jamOperasional[$hari]['tutup'] ?? null;

                                            if ($jamBuka === '00:00' && $jamTutup === '00:00') {
                                                $status = '24 Jam';
                                            } elseif (empty($jamBuka) || empty($jamTutup)) {
                                                $status = 'Tutup';
                                            } else {
                                                $status = "Buka: $jamBuka<br>Tutup: $jamTutup";
                                            }
                                        @endphp
                                        <div class="border-2 border-slate-500 p-2 rounded-lg bg-gray-50">
                                            <p class="font-semibold font-poppins">{{ ucfirst($hari) }}</p>
                                            @if ($status === '24 Jam' || $status === 'Tutup')
                                                <p class="text-sm font-poppins font-medium">{!! $status !!}</p>
                                            @else
                                                <p class="text-sm font-poppins">Buka: <span
                                                        class="font-medium">{{ $jamBuka }}</span></p>
                                                <p class="text-sm font-poppins">Tutup: <span
                                                        class="font-medium">{{ $jamTutup }}</span></p>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Section Ulasan -->
                        <div id="ulasan" class="mt-6">
                            {{-- Form Review --}}
                            <form action="
                            {{-- {{ route('komentar.store', ['id' => $data->nama]) }} --}}
                             " method="POST">
                                @csrf
                                <h3 class="text-xl font-semibold mb-4">Bagikan pengalaman Anda</h3>

                                {{-- Rating --}}
                                <div class="flex items-center gap-1 mb-4" id="rating-stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer text-2xl">
                                            <input type="radio" name="rating" value="{{ $i }}"
                                                class="hidden" required>
                                            <span data-star="{{ $i }}" class="star text-gray-300">★</span>
                                        </label>
                                    @endfor
                                </div>

                                {{-- Judul --}}
                                <input type="text" name="judul" maxlength="120" required
                                    class="w-full border border-gray-300 p-2 rounded mb-4" placeholder="Judul ulasan">

                                {{-- Komentar --}}
                                <textarea name="komentar" rows="4" required class="w-full border border-gray-300 p-2 rounded mb-4"
                                    placeholder="Tulis ulasan Anda di sini..."></textarea>

                                <button type="submit"
                                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                                    Kirim Ulasan
                                </button>
                            </form>

                            {{-- Tampilkan error jika ada --}}
                            @if ($errors->any())
                                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                                    <ul class="list-disc ml-5">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Daftar Komentar --}}
                            <div class="mt-10">
                                <h4 class="text-lg font-semibold mb-4">Ulasan Pengunjung</h4>
                                @forelse ($komentar as $review)
                                    <div class="border p-4 mb-4 rounded shadow-sm">
                                        <div class="flex justify-between items-center mb-1">
                                            <h5 class="font-bold">{{ $review->judul }}</h5>
                                            <form action="{{ route('komentar.destroy', $review->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="text-red-500 hover:underline text-sm">Hapus</button>
                                            </form>
                                        </div>
                                        <div class="text-yellow-400 mb-1">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span
                                                    class="{{ $i <= $review->rating ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                            @endfor
                                        </div>
                                        <p class="text-sm text-gray-700">{{ $review->komentar }}</p>
                                        <p class="text-xs text-gray-500 mt-2">Ditulis pada
                                            {{ $review->created_at->format('d M Y') }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-gray-500">Belum ada ulasan untuk tempat ini.</p>
                                @endforelse
                            </div>

                            {{-- JavaScript Bintang Interaktif --}}
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const stars = document.querySelectorAll('#rating-stars .star');
                                    let selectedRating = 0;

                                    function updateStars(rating) {
                                        stars.forEach(star => {
                                            const starValue = parseInt(star.getAttribute('data-star'));
                                            star.classList.toggle('text-yellow-400', starValue <= rating);
                                            star.classList.toggle('text-gray-300', starValue > rating);
                                        });
                                    }

                                    stars.forEach(star => {
                                        star.addEventListener('mouseover', function() {
                                            const rating = parseInt(this.getAttribute('data-star'));
                                            updateStars(rating);
                                        });

                                        star.addEventListener('mouseout', function() {
                                            updateStars(selectedRating);
                                        });

                                        star.addEventListener('click', function() {
                                            selectedRating = parseInt(this.getAttribute('data-star'));
                                            document.querySelector(`#rating-stars input[value="${selectedRating}"]`)
                                                .checked = true;
                                            updateStars(selectedRating);
                                        });
                                    });
                                });
                            </script>
                        </div>



                    </div>
                </div>

                <div class="xl:col-span-5 flex flex-col rounded-lg xl:rounded-2xl overflow-hidden ">
                    <!-- Gambar Utama dan Galeri -->
                    <div class="col-span-4 rounded-lg overflow-hidden">
                        <!-- Gambar Utama -->
                        <div class="w-full">
                            @if (!empty($imgDetails) && isset($imgDetails[0]))
                                <img id="main-image" src="{{ asset('storage/' . $imgDetails[0]) }}"
                                    class="object-cover w-full h-auto aspect-[16/9] rounded-lg"
                                    alt="Gambar utama {{ $data->nama_wisata }}">
                            @else
                                <div
                                    class="flex justify-center items-center h-[300px] md:h-[400px] lg:h-[500px] bg-gray-200 text-gray-500 rounded-lg font-poppins">
                                    <p>Gambar Kosong</p>
                                </div>
                            @endif
                        </div>

                        <!-- Gambar Kecil -->
                        @if (!empty($imgDetails))
                            <div class="grid grid-cols-8">
                                @foreach ($imgDetails as $img)
                                    <img src="{{ asset('storage/' . $img) }}"
                                        class="object-cover w-full aspect-[1/1] cursor-pointer  border-transparent hover:border-blue-500 "
                                        alt="Gambar detail"
                                        onclick="changeMainImage('{{ asset('storage/' . $img) }}')">
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-4 text-gray-500 font-poppins">
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


        <!-- HASIL ULASAN -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Ulasan Pengunjung</h2>

            <div class="flex flex-col md:flex-row gap-6">
                <!-- Kiri: Ringkasan Rating -->
                <div class="md:w-1/3 bg-white shadow-md p-4 rounded-md border border-gray-200">
                    <div class="text-3xl font-bold text-green-600 mb-2">
                        {{ number_format($reviews->avg('rating'), 1) }} / 5
                    </div>
                    <div class="text-sm text-gray-500 mb-4">{{ $reviews->count() }} ulasan</div>

                    @for ($i = 5; $i >= 1; $i--)
                        @php
                            $jumlah = $reviews->where('rating', $i)->count();
                            $persentase = $reviews->count() > 0 ? ($jumlah / $reviews->count()) * 100 : 0;
                        @endphp
                        <div class="flex items-center text-sm mb-1">
                            <span class="w-10">{{ $i }}★</span>
                            <div class="w-full bg-gray-200 rounded h-2 mx-2">
                                <div class="bg-green-500 h-2 rounded" style="width: {{ $persentase }}%"></div>
                            </div>
                            <span class="w-6 text-right">{{ $jumlah }}</span>
                        </div>
                    @endfor
                </div>

                <!-- Kanan: Daftar Ulasan -->
                <div class="md:w-2/3 space-y-4">
                    @forelse ($reviews as $item)
                        <div class="p-4 bg-white shadow-md rounded-md border border-gray-200">
                            <div class="flex items-center justify-between mb-1">
                                <p class="text-sm text-gray-600 font-semibold">{{ $item->nama }}</p>
                                <p class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <!-- Tampilkan rating sebagai bintang -->
                            <div class="flex items-center text-yellow-400 text-sm mb-1">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $item->rating)
                                        ★
                                    @else
                                        <span class="text-gray-300">★</span>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-gray-800 text-sm">{{ $item->komentar }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada ulasan. Jadilah yang pertama!</p>
                    @endforelse
                </div>
            </div>
        </div>



        {{-- LOKASI --}}
        <div class="pt-8 xl:pt-16 pb-4">
            <p class="font-bold text-2xl 2xl:text-4xl mb-4 text-[#004165] font-fjalla">Lokasi Wilayah</p>
            <div class="grid ">
                <div id="map" class="aspect-[1920/1920] sm:aspect-[1920/1080] xl:sm:aspect-[1920/540] z-[1]">
                </div> <!-- Tentukan tinggi untuk peta -->
            </div>

            <!-- Memuat Leaflet -->
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            <script>
                // Inisialisasi peta dengan titik tengah menggunakan koordinat dari variabel $data
                var map = L.map('map', {
                    center: [{{ $data->latitude }}, {{ $data->longitude }}], // Atur titik pusat
                    zoom: 13, // Atur level zoom
                    scrollWheelZoom: false // Menonaktifkan zoom menggunakan scroll mouse
                });

                // Tambahkan tile layer dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Tambahkan marker lokasi wisata dengan popup
                L.marker([{{ $data->latitude }}, {{ $data->longitude }}]).addTo(map)
                    .bindPopup(
                        `<a href="{{ route('ruteTerdekat.index', $data->nama_wisata) }}" target="_blank">
                            <b>{{ $data->nama_wisata }}</b>
                        </a><br>
                        {{ $data->kategori_detail->kategori->nama_kategori }},
                        {{ $data->kategori_detail->nama_kategori_detail }}.`
                    );
            </script>
        </div>


        {{-- KULINER --}}
        <div class="mb-4 pt-10">
            <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla">Kuliner Yang Tersedia</p>
            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah kuliner yang tersedia saat ini</h5>
        </div>
        @if ($data->kuliners->isNotEmpty())

            <div class="relative">
                <div class="w-full h-auto overflow-x-auto py-4">
                    <div class="flex gap-4 min-w-max">
                        <!-- Added min-w-max to ensure horizontal overflow when items are many -->
                        @foreach ($data->kuliners as $kulinersss)
                            <button data-modal-target="modal-gambar-detail-wisata-{{ $kulinersss->id }}"
                                data-modal-toggle="modal-gambar-detail-wisata-{{ $kulinersss->id }}"
                                class="relative group flex-shrink-0" type="button">

                                <!-- Aspect ratio and image sizing adjustment -->
                                <div class="w-64 h-80 overflow-hidden rounded-lg">
                                    <!-- Set a fixed size for image container -->
                                    <img src="{{ asset('storage/' . $kulinersss->gambar_kuliner) }}"
                                        alt="{{ $kulinersss->nama_kuliner }}"
                                        class="w-full h-full object-cover transition duration-300 ease-in-out transform group-hover:scale-105 group-hover:brightness-90">
                                </div>

                                <div class="absolute inset-0 flex items-center justify-center">
                                    <figcaption class="absolute bottom-4 z-10 w-full text-center">
                                        <h1
                                            class="font-semibold text-white text-xs md:text-sm uppercase tracking-wide">
                                            {{ $kulinersss->nama_kuliner }}
                                        </h1>
                                    </figcaption>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="p-10 mb-10 text-center font-bold text-gray-500 rounded border">
                Kuliner Kosong.
            </div>
        @endif
        {{-- MODAL KULINER --}}
        @foreach ($data->kuliners as $kuliner)
            <div id="modal-gambar-detail-wisata-{{ $kuliner->id }}" data-modal-backdrop="static" tabindex="-1"
                aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full bg-black bg-opacity-50">
                <div class="relative p-4 w-full max-w-7xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Kuliner
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="modal-gambar-detail-wisata-{{ $kuliner->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5 space-y-4">
                            <!-- Modal Body -->
                            <div class="p-6 grid grid-cols-1 md:grid-cols-10 gap-4">
                                <!-- Kolom Gambar -->
                                <div class="md:col-span-4 flex flex-col  space-y-4 max-h-[500px]">
                                    @if (!empty($kuliner->gambar_menu))
                                        <div class="overflow-x-auto flex pb-4">
                                            @foreach (json_decode($kuliner->gambar_menu, true) as $gambar_menu)
                                                <div class="flex-shrink-0 w-auto h-[500px] mr-4">
                                                    <button type="button"
                                                        class="open-image-modal w-full h-full border border-slate-200 rounded-lg overflow-hidden hover:shadow-xl"
                                                        data-src="{{ asset('storage/' . $gambar_menu) }}">
                                                        <img src="{{ asset('storage/' . $gambar_menu) }}"
                                                            class="object-cover h-full w-auto rounded-lg"
                                                            alt="Gambar Kuliner {{ $kuliner->nama_kuliner }}">
                                                    </button>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <p class="text-center text-gray-500">Tidak ada gambar yang tersedia.</p>
                                    @endif
                                </div>
                                <!-- Kolom Informasi -->
                                <div class="md:col-span-6 space-y-2 overflow-y-auto max-h-[500px]">
                                    <!-- Deskripsi -->
                                    <div>
                                        <p class="text-gray-800 font-bold text-3xl poppins-bold uppercase ">
                                            {{ $kuliner->nama_kuliner ?? 'Nama tidak tersedia.' }}
                                        </p>

                                    </div>
                                    <div>
                                        <h3 class="text-xl font-semibold text-gray-600">Deskripsi</h3>
                                        <p class="text-gray-700 leading-relaxed">
                                            {{ $kuliner->deskripsi_kuliner ?? 'Deskripsi tidak tersedia.' }}

                                        </p>
                                    </div>

                                    <!-- Kontak -->
                                    @if (!empty($kuliner->no_hp))
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-600">Kontak</h3>
                                            <p class="text-gray-700">
                                                <a href="https://wa.me/{{ '62' . ltrim($kuliner->no_hp, '0') }}"
                                                    class="text-blue-600 hover:text-blue-800" target="_blank">
                                                    {{ $kuliner->no_hp }}
                                                </a>

                                            </p>
                                        </div>
                                    @endif

                                    <!-- Jam Operasional -->
                                    @if (!empty($kuliner->jam_operasional))
                                        @php
                                            $jamOperasional = json_decode($kuliner->jam_operasional, true);
                                        @endphp
                                        @if (is_array($jamOperasional))
                                            <div>
                                                <h3 class="text-xl font-semibold text-gray-600">Jam Operasional</h3>
                                                <ul class="space-y-2">
                                                    @foreach ($jamOperasional as $jam)
                                                        <li class="flex">
                                                            <span
                                                                class="w-28 font-medium text-gray-600">{{ ucfirst($jam['hari']) }}:</span>
                                                            <span class="text-gray-500">
                                                                @if ($jam['buka'] == '00:00' && $jam['tutup'] == '00:00')
                                                                    <span class="text-green-600">24 Jam</span>
                                                                @elseif($jam['buka'] && $jam['tutup'])
                                                                    <span
                                                                        class="text-green-600">{{ $jam['buka'] }}</span>
                                                                    <span class="text-gray-400">-</span>
                                                                    <span
                                                                        class="text-red-500">{{ $jam['tutup'] }}</span>
                                                                @else
                                                                    <span class="text-red-500">Tutup</span>
                                                                @endif
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    @endif


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach

        <!-- Modal Kuliner Fullscreen For Image -->
        <div id="imageModal" class="hidden fixed inset-0 z-[999] bg-black bg-opacity-90 items-center justify-center">

            <button type="button"
                class="absolute top-4 right-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm p-2.5 inline-flex items-center z-50"
                id="closeModalBtn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <img id="modalImage" src="" class="max-h-screen max-w-screen object-contain rounded-lg"
                alt="Preview Gambar">
        </div>
        {{-- JS Untuk Modal --}}
        <script>
            // Untuk semua tombol yang punya class 'open-image-modal'
            document.querySelectorAll('.open-image-modal').forEach(button => {
                button.addEventListener('click', () => {
                    const src = button.getAttribute('data-src');
                    const modal = document.getElementById('imageModal');
                    const modalImg = document.getElementById('modalImage');

                    // Set gambar dan tampilkan modal
                    modalImg.src = src;
                    modal.classList.remove('hidden'); // Hilangkan hidden
                    modal.classList.add('flex'); // Tambahkan flex supaya tampil
                });
            });

            // Tombol untuk menutup modal
            document.getElementById('closeModalBtn').addEventListener('click', () => {
                const modal = document.getElementById('imageModal');
                const modalImg = document.getElementById('modalImage');

                modal.classList.add('hidden'); // Sembunyikan lagi
                modal.classList.remove('flex'); // Hilangkan flex
                modalImg.src = ''; // Kosongkan gambar
            });

            // Klik area luar gambar untuk menutup modal
            document.getElementById('imageModal').addEventListener('click', (e) => {
                // Pastikan yang diklik adalah area gelap, bukan gambar atau tombol
                if (e.target.id === 'imageModal') {
                    const modal = e.currentTarget;
                    const modalImg = document.getElementById('modalImage');

                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                    modalImg.src = '';
                }
            });
        </script>


        <div class="mb-4 pt-10 ">
            <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla">Event Yang Akan Datang</p>
            <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah event yang akan datang saat ini</h5>
        </div>


        {{-- EVENT --}}
        @if ($data->events->isNotEmpty())
            <div class="w-full pt-4 pb-4 mb-8">
                <div class="swiper eventSwiper w-full h-auto">
                    <div class="swiper-wrapper">
                        @foreach ($data->events as $event)
                            @if ($event->is_temporer == 0 || ($event->is_temporer == 1 && $event->event_berakhir > now()))
                                <div class="swiper-slide flex items-center justify-center cursor-pointer">
                                    <div data-modal-target="img-event-{{ $event->id }}"
                                        data-modal-toggle="img-event-{{ $event->id }}"
                                        class="relative block w-full">
                                        <!-- Gambar Event dengan Aspect Ratio 3:4 -->
                                        <img src="{{ asset('storage/' . $event->img) }}"
                                            class="aspect-[3/4] w-full object-cover rounded-lg transition-all duration-300 filter"
                                            alt="{{ $event->nama_event ?? 'Event Image' }}">

                                        <!-- Overlay Blur di Bagian Bawah -->
                                        <div
                                            class="absolute bottom-0 left-0 w-full h-1/3 bg-gradient-to-t from-black/100 via-black/50 to-transparent backdrop-blur- rounded-b-lg">
                                        </div>

                                        <!-- Nama Event di Tengah -->
                                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2">
                                            <p
                                                class="text-white text-center font-fjalla uppercase font-semibold text-lg md:text-xl lg:text-3xl px-4 py-2">
                                                {{ $event->nama_event }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- Navigation -->
                    <div class="swiper-button-next">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="swiper-button-prev">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
            </div>

            <!-- Swiper Script -->
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    new Swiper(".eventSwiper", {
                        slidesPerView: 2, // Default untuk mobile
                        spaceBetween: 10,
                        loop: true,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true,
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev",
                        },
                        breakpoints: {
                            640: { // Untuk tablet
                                slidesPerView: 3,
                            },
                            1024: { // Untuk desktop
                                slidesPerView: 4,
                            }
                        },
                        on: {
                            init: function() {
                                // Set gambar agar potongannya berada di tengah
                                const images = document.querySelectorAll('.swiper-slide img');
                                images.forEach(image => {
                                    image.style.objectPosition = 'center';
                                });
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
                    color: white;
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: background-color 0.3s ease;
                }

                .swiper-button-next:hover,
                .swiper-button-prev:hover {
                    background-color: rgba(0, 0, 0, 0.8);
                }

                .swiper-button-next::after,
                .swiper-button-prev::after {
                    display: none;
                }

                .swiper-button-next i,
                .swiper-button-prev i {
                    font-size: 20px;
                }
            </style>
        @else
            <div class="p-10 mb-10 text-center font-bold text-gray-500 rounded border font-poppins">
                Event yang akan datang sedang tidak ada.
            </div>
        @endif




        {{-- MODAL EVENT --}}
        @foreach ($data->events as $event)
            <div id="img-event-{{ $event->id }}" tabindex="-1" aria-hidden="true"
                class="hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full min-h-screen bg-black bg-opacity-50 aspect-[1920/1440]">
                <div
                    class="relative p-4 w-full max-w-2xl max-h-full sm:max-w-3xl md:max-w-4xl lg:max-w-5xl xl:max-w-6xl">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow-sm">
                        <div class="flex items-center justify-between p-4 md:px-5 border-b rounded-t border-gray-200">
                            <h3 class="text-lg md:text-2xl font-semibold text-gray-900 font-poppins">
                                Detail Event
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                                data-modal-hide="img-event-{{ $event->id }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only font-poppins">Close modal</span>
                            </button>
                        </div>
                        <div
                            class="grid grid-cols-10 p-4 md:p-5 aspect-[16/14] lg:aspect-[16/9]  md:space-x-5 text-gray-700 break-words">
                            <!-- Left Column: Image -->
                            <div data-modal-target="img-event-detail{{ $event->id }}"
                                data-modal-toggle="img-event-detail{{ $event->id }}"
                                class="w-full hidden lg:block col-span-0 lg:col-span-4 pb-5 cursor-pointer  overflow-hidden">
                                <img src="{{ asset('storage/' . $event->img) }}"
                                    class="w-full h-full object-cover rounded-lg"
                                    alt="{{ $event->nama_event ?? 'Event Image' }}">
                            </div>

                            <!-- Right Column: Event Details -->
                            <div class="w-full col-span-10  lg:col-span-6 lg:p-4 space-y-4  overflow-y-auto">
                                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 font-poppins leading-snug">
                                    {{ $event->nama_event ?? 'Event Name' }}
                                </h3>

                                <div class="flex lg:hidden bg-blue-400 cursor-pointer items-center justify-center w-fit text-white font-medium py-2 px-4 rounded-lg shadow-md cursor-pointer transition-all duration-300 hover:bg-blue-600"
                                    data-modal-target="img-event-detail{{ $event->id }}"
                                    data-modal-toggle="img-event-detail{{ $event->id }}">
                                    <p>Lihat Gambar</p>
                                </div>
                                <p class="text-base sm:text-lg leading-relaxed tracking-wide">
                                    <strong>Deskripsi:</strong> <br>
                                    {{ $event->deskripsi_event ?? '-' }}
                                </p>

                                @if ($event->is_temporer == 1)
                                    <div class="space-y-2 text-sm sm:text-base text-gray-600">
                                        <div class="flex items-start gap-2">
                                            <i class="fas fa-calendar-day text-blue-500 mt-1"></i>
                                            <p><strong>Mulai:</strong>
                                                {{ \Carbon\Carbon::parse($event->event_mulai)->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                        <div class="flex items-start gap-2">
                                            <i class="fas fa-calendar-day text-red-500 mt-1"></i>
                                            <p><strong>Berakhir:</strong>
                                                {{ \Carbon\Carbon::parse($event->event_berakhir)->format('d M Y, H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                @else
                                    <div class="space-y-2 text-sm sm:text-base text-gray-600">
                                        <strong>Jadwal Mingguan:</strong>
                                        @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                            @php
                                                $schedule =
                                                    json_decode($event->jadwal_mingguan ?? '{}', true)[$day] ?? null;
                                            @endphp
                                            <div class="flex items-start gap-2">
                                                <i class="fas fa-clock text-gray-500 mt-1"></i>
                                                <p><strong>{{ $day }}:</strong>
                                                    @if ($schedule === null || ($schedule['mulai'] === null && $schedule['akhir'] === null))
                                                        Tutup
                                                    @elseif ($schedule['mulai'] == '00:00' && $schedule['akhir'] == '00:00')
                                                        24 Jam
                                                    @else
                                                        Mulai: {{ $schedule['mulai'] }} - Selesai:
                                                        {{ $schedule['akhir'] }}
                                                    @endif
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="flex items-center gap-2 text-lg sm:text-xl font-poppins">
                                    <i class="fas fa-ticket-alt text-gray-800"></i>
                                    <span><strong>HTM:</strong>
                                        <span class="font-extrabold text-gray-900">
                                            Rp{{ number_format($event->htm_event, 0, ',', '.') }}
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @forelse ($data->events as $event)
            {{-- id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" --}}
            <div id="img-event-detail{{ $event->id }}" data-modal-backdrop="static" tabindex="-1"
                aria-hidden="true"
                class="hidden fixed inset-0 z-[999] bg-black bg-opacity-90 items-center justify-center">
                <!-- Close Button -->
                <button type="button"
                    class="absolute top-4 right-4 text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 rounded-lg text-sm p-2.5 inline-flex items-center z-50"
                    data-modal-hide="img-event-detail{{ $event->id }}" aria-hidden="true">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Modal Image -->
                <img src="{{ asset('storage/' . $event->img) }}"
                    class="max-h-screen max-w-screen object-contain rounded-lg"
                    alt="{{ $event->nama_event ?? 'Event Image' }}">
            </div>
        @empty
        @endforelse



        {{-- Wisata lain --}}
        <div class="pb-10">
            <div class="py-4">
                <p class="text-2xl 2xl:text-4xl font-bold pb-2 text-[#004165] font-fjalla ">Wisata Lainnya</p>
                <h5 class="pl-0 text-gray-500 font-poppins">Berikut adalah beberapa rekomendasi wisata saat ini</h5>
            </div>

            <div class="grid xl:grid-cols-4 grid-cols-2 gap-4 xl:gap-8">
                @foreach ($lainnya as $filter)
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
                                    {{ $filter->kategori_detail->kategori->nama_kategori ?? '' }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>











</x-layout>
