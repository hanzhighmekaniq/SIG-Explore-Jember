{{-- <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visit Jember</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
 --}}
<x-layout>

    <div class="bg-white h-auto w-full">
        <div class="container m-auto">
            <div class="m-auto w-96 pt-36 pb-32 text-[#333D29] text-6xl">
                <p class="text-start font-extrabold xl:text-4xl">PETA WILAYAH</p>
                <p class="pacifico-regular text-start">Kabupaten</p>
                <p class="pacifico-regular text-end mt-[-8px]">Jember</p>
            </div>

            {{-- Peta Wisata --}}
            <div class="flex justify-center items-center pb-32 w-full">
                <div class="w-full pt-32">
                    <p class="font-bold 2xl:text-4xl mb-10">Titik Koordinat Lokasi Wisata</p>
                    <div id="map" class="relative z-[1]                 "></div>
                </div>
            </div>
            <style>
                #map {
                    height: 500px;
                    /* Menentukan tinggi peta */
                    width: 100%;
                    /* Memastikan lebar peta penuh */
                }

                .map-container {
                    width: 100%;
                    /* Pastikan container juga memiliki lebar penuh */
                }
            </style>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
            <script>
                // Petae
                var map = L.map('map').setView([-8.4310054, 113.5559703], 13); // koor peta sm atur zoom

                // Tambahkan tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
                @foreach ($wisata as $wisata)
                    // Contoh menambahkan marker lokasi wisata
                    var marker = L.marker([{{ $wisata->latitude }}, {{ $wisata->longitude }}]).addTo(map)
                        .bindPopup(
                            '<b>{{ $wisata->nama_wisata }}</b><br>{{ $wisata->kategori->nama_kategori }}, {{ $wisata->kategori->detail_kategori }}.'
                            )
                        .openPopup();
                @endforeach
            </script>

            {{-- Tabel --}}
            <p class="m-auto text-center text-2xl font-serif font-semibold pb-10 text-black">Daftar Titik Lokasi Wisata
            </p>
            <div class="md:flex justify-between pb-4">
                <div class="flex mb-4 md:mb-0">
                    <button
                        class="bg-white text-black border border-[#414833] hover:bg-[#414833] hover:text-white px-4 py-2 rounded-lg">Pilih
                        Lokasi Anda</button>
                </div>
                <div class="flex space-x-2">
                    <input type="text"
                        class="bg-white border border-[#414833] text-black placeholder-black rounded-lg px-4 py-2"
                        placeholder="Pencarian" />
                    <button class="bg-[#414833] text-white px-6 py-2 rounded-lg">Cari</button>
                    <button class="bg-[#414833] text-white px-4 py-2 rounded-lg" onclick="my_modal_2.showModal()">FILTER
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            viewBox="0 0 512 512">
                            <path
                                d="M16 90.259h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.088 72.778-58.508H496c8.836 0 16-7.164 16-16s-7.164-16-16-16h-90.847c-7.356-33.402-37.241-58.507-72.77-58.507-35.548 0-65.419 25.101-72.772 58.507H16c-8.836 0-16 7.164-16 16s7.164 16 16 16zm273.877-15.958.001-.172c.07-23.367 19.137-42.376 42.505-42.376 23.335 0 42.403 18.983 42.504 42.339l.003.235c-.037 23.407-19.091 42.441-42.507 42.441-23.406 0-42.454-19.015-42.507-42.408zM496 421.74h-90.847c-7.357-33.401-37.241-58.507-72.77-58.507-35.548 0-65.419 25.102-72.772 58.507H16c-8.836 0-16 7.163-16 16s7.164 16 16 16h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.089 72.778-58.508H496c8.836 0 16-7.163 16-16s-7.164-16-16-16zm-163.617 58.508c-23.406 0-42.454-19.015-42.507-42.408l.001-.058.001-.172c.07-23.367 19.137-42.377 42.505-42.377 23.335 0 42.403 18.983 42.504 42.338l.003.235c-.034 23.41-19.089 42.442-42.507 42.442zM496 240H252.395c-7.342-33.419-37.186-58.507-72.778-58.507S114.181 206.581 106.839 240H16c-8.836 0-16 7.164-16 16 0 8.837 7.164 16 16 16h90.847c7.357 33.401 37.241 58.507 72.77 58.507 35.548 0 65.419-25.102 72.772-58.507H496c8.836 0 16-7.163 16-16 0-8.836-7.164-16-16-16zm-273.877 15.958-.001.172c-.07 23.367-19.137 42.376-42.505 42.376-23.335 0-42.403-18.983-42.504-42.338l-.003-.234c.035-23.41 19.09-42.441 42.507-42.441 23.406 0 42.454 19.014 42.507 42.408z"
                                fill="#ffffff"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto pb-20">
                <table class="min-w-full bg-white text-black border border-black">
                    <thead class="bg-white">
                        <tr>
                            <th class="py-3 px-4 border border-black text-left">No</th>
                            <th class="py-3 px-4 border border-black text-left">Wisata</th>
                            <th class="py-3 px-4 border border-black text-left">Jenis</th>
                            <th class="py-3 px-4 border border-black text-left">Jarak Dari Lokasi</th>
                            <th class="py-3 px-4 border border-black text-left">Titik Lokasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4 border border-black">1</td>
                            <td class="py-3 px-4 border border-black">Pantai Payangan</td>
                            <td class="py-3 px-4 border border-black">Alam</td>
                            <td class="py-3 px-4 border border-black">4 KM</td>
                            <td class="py-3 px-4 border border-black underline">Lihat</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
