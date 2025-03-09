<x-layadmin>
    <div class="bg-[#f3f3f3] min-h-screen p-6">
        <!-- Grid Kategori -->
        <div class="pb-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($categories as $category)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-shadow duration-300 flex items-center p-6">
                        <!-- Ikon dengan Animasi Gradient -->
                        <div class="flex-shrink-0 w-12 h-12 rounded-full flex items-center justify-center animate-gradient bg-gradient-to-r from-[#00BAFF] to-yellow-300 bg-[length:200%_200%]">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <!-- Teks -->
                        <div class="ml-4 flex-grow">
                            <p class="text-lg font-bold font-poppins uppercase text-gray-800">{{ $category->nama_kategori }}</p>
                            <p class="text-sm text-gray-600 font-montserrat">Jumlah Wisata: {{ $category->total_wisatas }}</p>
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
            <script>
                // Initialize the map with default center and zoom level
                const map = L.map('map').setView([-8.1693844, 113.7041932], 10);

                // Add a tile layer from OpenStreetMap
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // Dummy markers data
                const markers = [
                    @foreach ($dataLokasi as $lokasi)
                        {
                            coords: [{{ $lokasi->latitude }}, {{ $lokasi->longitude }}],
                            popupText: 'Wisata {{ $lokasi->nama_wisata }}',
                            href: '{{ route('wisata.index') }}'
                        },
                    @endforeach
                ];

                // Add markers to the map
                markers.forEach(marker => {
                    L.marker(marker.coords).addTo(map)
                        .bindPopup('<a href="' + marker.href + '">' + marker.popupText + '</a>');
                });

                // Function to handle the successful retrieval of the user's location
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
                    userMarker.bindPopup("You are here").openPopup();

                    map.setView(e.latlng, 20);
                }

                // Function to handle the error in retrieving the user's location
                function onLocationError(e) {
                    alert("Unable to retrieve your location.");
                }

                // Request the user's location
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(onLocationFound, onLocationError);
                } else {
                    alert("Geolocation is not supported by this browser.");
                }
            </script>
        </div>
    </div>
</x-layadmin>