<x-layout>
    <div class="flex justify-center items-center pb-32 w-full">
        <div class="w-full pt-8">
            <div id="map" class="relative z-[1] rounded-xl aspect-video"></div>
            <table class="mt-6 w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4 border">No</th>
                        <th class="py-3 px-4 border">Nama Wisata</th>
                        <th class="py-3 px-4 border">Kategori</th>
                        <th class="py-3 px-4 border">Jarak (km)</th>
                        <th class="py-3 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-8.184485, 113.668075], 10);

        // Tambahkan lapisan tile dari OpenStreetMap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Data dummy
        const wisataData = [{
                nama_wisata: "Pantai Papuma",
                kategori: "Pantai",
                latitude: -8.524398,
                longitude: 114.113910
            },
            {
                nama_wisata: "Kawah Ijen",
                kategori: "Gunung",
                latitude: -8.058325,
                longitude: 114.242973
            },
            {
                nama_wisata: "Air Terjun Tumpak Sewu",
                kategori: "Air Terjun",
                latitude: -8.233610,
                longitude: 112.922950
            }
        ];

        // Hitung jarak dan render ke tabel
        function updateTable() {
            let tableBody = document.querySelector("table tbody");
            const startLatLng = L.latLng(-8.184485, 113.668075); // Titik awal (Jember)

            wisataData.forEach((wisata, index) => {
                const endLatLng = L.latLng(wisata.latitude, wisata.longitude);
                const distance = startLatLng.distanceTo(endLatLng) / 1000; // Jarak dalam km

                // Tambahkan baris ke tabel
                let row = document.createElement("tr");

                row.innerHTML = `
                    <td class="py-3 px-4 border">${index + 1}</td>
                    <td class="py-3 px-4 border">${wisata.nama_wisata}</td>
                    <td class="py-3 px-4 border">${wisata.kategori}</td>
                    <td class="py-3 px-4 border">${distance.toFixed(2)}</td>
                    <td class="py-3 px-4 border underline text-blue-500">
                        <a href="#" target="_blank">Lihat</a>
                    </td>
                `;
                tableBody.appendChild(row);

                // Tambahkan marker ke peta
                L.marker([wisata.latitude, wisata.longitude]).addTo(map)
                    .bindPopup(wisata.nama_wisata);
            });
        }

        // Panggil fungsi untuk menampilkan data
        updateTable();
    </script>
</x-layout>
