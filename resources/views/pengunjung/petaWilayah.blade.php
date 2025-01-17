<x-layout>

    <div class="bg-white h-auto w-full">
        <div class="container m-auto px-4">
            <div class="m-auto w-auto text-center pt-28 pb-10 text-6xl">
                <p class="pb-4 text-center font-extrabold xl:text-xl text-lime-800 text-base leading-7 text-primary">PETA
                    WILAYAH</p>
                <p class="pacifico-regular text-5xl text-[#656D4A]">Visit Jember</p>
            </div>

            {{-- Peta Wisata --}}
            <div class="flex justify-center items-center pb-32 w-full">
                <div class="w-full pt-8">
                    <div id="map" class="relative z-[1] rounded-xl aspect-video"></div>
                </div>
            </div>
            {{-- Tabel Daftar Lokasi Wisata --}}
            <p class="m-auto text-center text-2xl font-serif font-semibold pb-10 text-black">Daftar Titik Lokasi Wisata
            </p>
            {{ $rute->links() }}
            <div class="overflow-x-auto pb-20">
                <table class="mt-6 w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-3 px-4 border text-left">No</th>
                            <th class="py-3 px-4 border text-left">Nama Wisata</th>
                            <th class="py-3 px-4 border text-left">Kategori</th>
                            <th class="py-3 px-4 border text-left">Jarak (km)</th>
                            <th class="py-3 px-4 border text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rute as $index => $item)
                            <tr>
                                <td class="py-3 px-4 border">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 border">{{ $item->nama_wisata }}</td>
                                <td class="py-3 px-4 border">
                                    {{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}</td>
                                <td class="py-3 px-4 border">-</td>
                                <td class="py-3 px-4 border underline text-blue-500">
                                    <a href="{{ route('ruteTerdekat.index', $item->nama_wisata) }}"
                                        target="_blank">Lihat</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5 text-center text-gray-500">Tidak ada data yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <script>
                // Inisialisasi peta
                var map = L.map('map').setView([-8.184485, 113.668075], 10);

                // Tambahkan lapisan tile dari OpenStreetMap
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                // Data
                const Jarak = [
                    @forelse ($rute as $item)
                        {
                            nama_wisata: "{{ $item->nama_wisata }}",
                            kategori: "{{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}",
                            latitude: {{ $item->latitude ?? 0 }},
                            longitude: {{ $item->longitude ?? 0 }},
                        },
                    @empty
                        {
                            nama_wisata: "Data Kosong",
                            kategori: "Data Kosong",
                            latitude: 0,
                            longitude: 0,
                        },
                    @endforelse
                ];

                const wisataData = [
                    @forelse ($peta as $item)
                        {
                            nama_wisata: "{{ $item->nama_wisata }}",
                            kategori: "{{ $item->kategori_detail->nama_kategori_detail ?? 'Tidak ada kategori' }}",
                            latitude: {{ $item->latitude ?? 0 }},
                            longitude: {{ $item->longitude ?? 0 }},
                        },
                    @empty
                        {
                            nama_wisata: "Data Kosong",
                            kategori: "Data Kosong",
                            latitude: 0,
                            longitude: 0,
                        },
                    @endforelse
                ];


                // Icon custom untuk posisi saat ini
                const currentPositionIcon = L.icon({
                    iconUrl: 'https://cdn-icons-png.flaticon.com/512/4776/4776595.png',
                    iconSize: [38, 38],
                    iconAnchor: [19, 38],
                    popupAnchor: [0, -38]
                });

                // Menggunakan Geolocation API untuk mendapatkan posisi pengguna
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function(position) {
                            const userLat = position.coords.latitude;
                            const userLng = position.coords.longitude;

                            const currentPosition = L.latLng(userLat, userLng);

                            // Tambahkan marker untuk posisi pengguna
                            L.marker(currentPosition, {
                                    icon: currentPositionIcon
                                }).addTo(map)
                                .bindPopup('Posisi Anda')
                                .openPopup();

                            // Pindahkan peta ke lokasi pengguna
                            map.setView(currentPosition, 13);

                            // Update tabel dengan data `Jarak`
                            updateTable(currentPosition);
                        },
                        function(error) {
                            console.error("Error mendapatkan lokasi:", error.message);
                            alert("Tidak dapat mengakses lokasi Anda. Pastikan izin lokasi diaktifkan.");
                        }
                    );
                } else {
                    alert("Geolocation tidak didukung oleh browser Anda.");
                }

                // Render data `wisataData` di peta
                wisataData.forEach(wisata => {
                    L.marker([wisata.latitude, wisata.longitude]).addTo(map)
                        .bindPopup(`<strong>${wisata.nama_wisata}</strong><br>${wisata.kategori}`);
                });

                function updateTable(currentPosition) {
                    let tableBody = document.querySelector("table tbody");
                    tableBody.innerHTML = ""; // Bersihkan tabel sebelum render ulang

                    Jarak.forEach((rute, index) => {
                        // Jika latitude atau longitude adalah 0, beri jarak default "-" (tidak dihitung)
                        let distance = "-";
                        if (rute.latitude !== 0 && rute.longitude !== 0) {
                            const endLatLng = L.latLng(rute.latitude, rute.longitude);
                            distance = (currentPosition.distanceTo(endLatLng) / 1000).toFixed(2) + " km";
                        }

                        // Tambahkan baris ke tabel
                        let row = document.createElement("tr");

                        row.innerHTML = `
                                            <td class="py-3 px-4 border">${index + 1}</td>
                                            <td class="py-3 px-4 border">${rute.nama_wisata}</td>
                                            <td class="py-3 px-4 border">${rute.kategori}</td>
                                            <td class="py-3 px-4 border">${distance}</td>
                                            <td class="py-3 px-4 border underline text-blue-500">
                                                <a href="${rute.nama_wisata !== "Data Kosong" ? `/ruteTerdekat/${rute.nama_wisata}` : "#"}" target="_blank">Lihat</a>
                                            </td>
                                        `;
                        tableBody.appendChild(row);
                    });
                }

                // Render semua data wisata pada peta
                wisataData.forEach(wisata => {
                    if (wisata.latitude !== 0 && wisata.longitude !== 0) {
                        L.marker([wisata.latitude, wisata.longitude]).addTo(map)
                            .bindPopup(`<strong>${wisata.nama_wisata}</strong><br>${wisata.kategori}`);
                    }
                });
            </script>


        </div>
    </div>
</x-layout>
