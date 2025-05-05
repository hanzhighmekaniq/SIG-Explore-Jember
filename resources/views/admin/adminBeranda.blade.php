<x-layadmin>
    <div class="bg-[#f3f3f3] min-h-screen p-6">
        <!-- Grid Kategori -->
        <div class="pb-4">
            <div class="grid grid-cols-1
            sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <div
                        class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex items-center p-6">
                        <!-- Ikon dengan Animasi Gradient -->
                        <div
                            class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center animate-gradient bg-gradient-to-r from-[#00BAFF] to-yellow-300 bg-[length:200%_200%]">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <!-- Teks -->
                        <div class="ml-4 flex-grow">
                            <p class="text-lg font-bold font-poppins uppercase text-gray-800">
                                {{ $category->nama_kategori }}</p>
                            <p class="text-sm text-gray-600 font-montserrat">Jumlah Wisata:
                                {{ $category->total_wisata }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Peta -->
        <div>
            <style>
                #map {
                    max-width: 100%;
                }

                /* Animasi Gradient */
                @keyframes gradientAnimation {
                    0% {
                        background-position: 0% 50%;
                    }

                    50% {
                        background-position: 100% 50%;
                    }

                    100% {
                        background-position: 0% 50%;
                    }
                }

                .animate-gradient {
                    animation: gradientAnimation 4s ease infinite;
                }
            </style>

            <div id="map"
                class="relative z-[1] w-full h-56 sm:h-64 md:h-96 lg:h-[500px] xl:h-[600px] max-w-4xl rounded-lg shadow-lg">
            </div>

            <!-- Leaflet JS -->
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <style>
                /* Sembunyikan attribution Leaflet */
                .leaflet-control-attribution {
                    display: none !important;
                }
            </style>
            
            <script>
                // Inisialisasi peta tanpa attribution control
                const map = L.map('map', {
                    attributionControl: false
                }).setView([-8.1693844, 113.7041932], 10);
            
                // Tambahkan tile layer dari OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    // Attribution tidak ditampilkan karena attributionControl sudah false
                }).addTo(map);
            
                // Data marker dari database (Laravel blade)
                const markers = [
                    @foreach ($dataLokasi as $lokasi)
                        {
                            coords: [{{ $lokasi->latitude }}, {{ $lokasi->longitude }}],
                            popupText: 'Wisata {{ $lokasi->nama_wisata }}',
                            href: '{{ route('wisata.index') }}'
                        },
                    @endforeach
                ];
            
                // Tambahkan marker ke peta
                markers.forEach(marker => {
                    L.marker(marker.coords).addTo(map)
                        .bindPopup('<a href="' + marker.href + '" style="text-decoration: none; color: #205C9E;">' + marker.popupText + '</a>');
                });
            
                // Fungsi jika lokasi pengguna ditemukan
                function onLocationFound(e) {
                    const userIcon = L.icon({
                        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-icon-red.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                    });
            
                    const userMarker = L.marker(e.latlng, {
                        icon: userIcon
                    }).addTo(map);
                    userMarker.bindPopup("Anda di sini").openPopup();
            
                    map.setView(e.latlng, 14);
                }
            
                // Fungsi jika lokasi pengguna gagal ditemukan
                function onLocationError(e) {
                    alert("Tidak dapat menemukan lokasi Anda.");
                }
            
                // Coba dapatkan lokasi pengguna
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(onLocationFound, onLocationError);
                } else {
                    alert("Browser Anda tidak mendukung Geolocation.");
                }
            </script>
            
        </div>
    </div>
</x-layadmin>
