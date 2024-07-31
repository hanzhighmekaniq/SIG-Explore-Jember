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
    <style>
        #map {
            height: 9eb
            00px; /* Atur tinggi peta sesuai kebutuhan */
        }
    </style>
</head>
<body>
    <div class="">
        <div class="grid">
            <div id="map"></div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-8.2644, 113.6321], 10); // Sesuaikan koordinat dan zoom level

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Fungsi untuk mendapatkan lokasi real-time pengguna
        function getLocationAndRoute() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    // Tambahkan rute menggunakan Leaflet Routing Machine
                    L.Routing.control({
                        waypoints: [
                            L.latLng(lat, lng),  // Titik awal dari lokasi real-time pengguna
                            L.latLng(-8.4500, 113.7000)   // Titik tujuan (contoh koordinat Tanjung Papuma)
                        ],
                        routeWhileDragging: true
                    }).addTo(map);

                    // Pindahkan peta ke lokasi real-time pengguna
                    map.setView([lat, lng], 13);
                }, function(error) {
                    console.error("Error Code = " + error.code + " - " + error.message);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        // Panggil fungsi untuk mendapatkan lokasi dan menambahkan rute
        getLocationAndRoute();
    </script>
</body>
</html>
