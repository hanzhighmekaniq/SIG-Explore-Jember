<head>
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

@include('partials.navbarPengunjung')

<div class="bg-white h-auto w-full">
    <div class="container m-auto">
        <div class="m-auto w-96 pt-36 pb-16 text-[#333D29] text-6xl">
            <p class="text-start font-extrabold xl:text-4xl">PETA WILAYAH</p>
            <p class="pacifico-regular text-start bg-gradient-to-r from-soft-dark-green to-soft-light-green bg-clip-text text-transparent animate-glow">Kabupaten</p>
            <p class="pacifico-regular text-end mt-[-8px] bg-gradient-to-r from-soft-dark-green to-soft-light-green bg-clip-text text-transparent animate-glow">Jember</p>
        </div>

        {{-- Peta Wisata --}}
        <div class="flex justify-center items-center pb-32 w-full">
            <div class="w-full pt-16">
                <p class="font-bold 2xl:text-4xl mb-10">Titik Koordinat Lokasi Wisata</p>
                <div id="map"></div>
            </div>
        </div>

        <style>
            #map {
                height: 500px;  /* Menentukan tinggi peta */
                width: 100%;    /* Memastikan lebar peta penuh */
            }

            .map-container {
                width: 100%;  /* Pastikan container juga memiliki lebar penuh */
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

            // Contoh menambahkan marker lokasi wisata
            var marker = L.marker([-8.4310054, 113.5559703]).addTo(map)
                .bindPopup('<b>Wisata Tanjung Papuma</b><br>Pantai Selatan.')
                .openPopup();
        </script>

        {{-- Tabel --}}
        <p class="m-auto text-center text-2xl font-serif font-semibold pb-10 text-black">Daftar Titik Lokasi Wisata</p>
        <div class="md:flex justify-between pb-4">
            <div class="flex mb-4 md:mb-0">
                <button class="bg-white text-black border border-[#414833] hover:bg-[#414833] hover:text-white px-4 py-2 rounded-lg">Pilih Lokasi Anda</button>
            </div>
            <form class="max-w-lg mx-auto">
                <div class="flex">
                    <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Pencarian</label>
                    <!-- Dropdown Kategori -->
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Kategori Wisata
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata Alam</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata Keluarga</button>
                            </li>
                            <li>
                                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Wisata Sejarah</button>
                            </li>
                        </ul>
                    </div>

                    <!-- Input Pencarian -->
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Cari Wisata..." required />
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-[#414833] rounded-e-lg border border-[#414833] hover:bg-[#3a4130] focus:ring-4 focus:outline-none focus:ring-[#2f3624]">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg pb-20">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Wisata
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jarak Dari Lokasi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Titik Lokasi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            1
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Rembangan
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam, Pengunungan
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            2
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Gunung Gambir
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam, Pegunungan
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            3
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Gunung Gumitir
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            4
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pantai Watu Ulo
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            5
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pantai Papuma
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            6
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Pantai Payangan
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            7
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Bukit Domba
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            8
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Kemuning Lor Nature Park
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            9
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Botani
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            10
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Kampung Durian
                        </td>
                        <td class="px-6 py-4">
                            Wisata Alam
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            11
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Dira Park
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            12
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Alun Alun Jember
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            13
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Rembangan Dairy Farm
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            14
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Taman Galaxy
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            15
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Citra Mandiri Bumdes Arjasa
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            16
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Mini Zoo
                        </td>
                        <td class="px-6 py-4">
                            Wisata Keluarga
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            17
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Situs Duplang
                        </td>
                        <td class="px-6 py-4">
                            Wisata Sejarah
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            18
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Museum Huruf
                        </td>
                        <td class="px-6 py-4">
                            Wisata Sejarah
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            19
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Museum Tembakau
                        </td>
                        <td class="px-6 py-4">
                            Wisata Sejarah
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">
                            20
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Museum Coklat
                        </td>
                        <td class="px-6 py-4">
                            Wisata Sejarah
                        </td>
                        <td class="px-6 py-4">
                            -
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>
</div>
@include('partials.footerPengunjung')
