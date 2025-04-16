<!-- resources/views/ruteTerdekat.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rute Terdekat</title>
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

</head>

<body>

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #map {
            height: 100vh;
            /* Tinggi 100% dari viewport */
            width: 100vw;
            /* Lebar 100% dari viewport */
        }
    </style>

    <div class="">
        <div class="grid">
            <div class="" id="map"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Inisialisasi peta dengan koordinat awal dan zoom level
            var map = L.map('map', {
                dragging: true,
                touchZoom: true,
                scrollWheelZoom: true,
                doubleClickZoom: true
            }).setView([-8.2644, 113.6321], 10);

            // Menambahkan tile layer dari OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            // Variabel untuk menyimpan marker lokasi pengguna
            var userMarker;

            // Cek apakah browser mendukung geolocation
            if (navigator.geolocation) {
                // Lokasi pengguna akan dicari dan peta akan disesuaikan
                map.locate({
                    setView: true,
                    maxZoom: 16.5
                });

                // Ketika lokasi pengguna ditemukan
                map.on('locationfound', function (e) {
                    var userLatLng = e.latlng;

                    // Jika marker sudah ada, perbarui lokasinya
                    if (userMarker) {
                        userMarker.setLatLng(userLatLng);
                    } else {
                        // Tambahkan marker untuk lokasi pengguna jika belum ada
                        userMarker = L.marker(userLatLng, {
                            interactive: true
                        })
                            .addTo(map)
                            .bindPopup("Lokasi Anda")
                            .openPopup();
                    }

                    // Menambahkan marker untuk lokasi tujuan
                    var destinationLatLng = L.latLng({{ $rute->latitude }}, {{ $rute->longitude }});
                    var tujuanMarker = L.marker(destinationLatLng, {
                        interactive: false
                    }).addTo(map)
                        .bindPopup("{{ $rute->nama_wisata }}", {
                            autoClose: false,
                            closeOnClick: false,
                            closeButton: false,
                            interactive: false
                        })
                        .openPopup();

                    // Tambahkan rute antara lokasi pengguna dan tujuan
                    L.Routing.control({
                        waypoints: [userLatLng, destinationLatLng],
                        routeWhileDragging: true,
                        draggableWaypoints: true,
                        collapsible: true,
                        createMarker: function () {
                            return null;
                        },
                        fitSelectedRoutes: true
                    }).addTo(map);
                });

                // Tangani error jika geolocation tidak tersedia
                map.on('locationerror', function (e) {
                    console.error("Geolocation error: " + e.message);
                    L.popup()
                        .setLatLng([-8.2644, 113.6321])
                        .setContent("❌ Tidak dapat menemukan lokasi Anda.")
                        .openOn(map);
                });

            } else {
                // Jika browser tidak mendukung geolocation
                L.popup()
                    .setLatLng([-8.2644, 113.6321])
                    .setContent("❌ Geolocation tidak didukung di browser Anda.")
                    .openOn(map);
            }
        });
    </script>




</body>

</html>
