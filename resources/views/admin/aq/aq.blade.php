<x-layout>
    <div class="container px-10 py-10 my-20">
        <!-- Tombol untuk memilih Tim -->
        <div class="flex justify-center gap-4 mb-4">
            <button id="btnTeam1" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Team 1</button>
            <button id="btnTeam2" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Team 2</button>
            <button id="btnTeam3" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Team 3</button>
            <button id="btnTeam4" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Team 4</button>
        </div>

        <!-- Konten tim -->
        <div class="w-full flex">

            <!-- div Tim 1 -->
            <div id="team1" class="team hidden">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-300 rounded-lg shadow-md">
                        <p>Konten Team 1</p>
                    </div>
                </div>
            </div>

            <!-- div Tim 2 -->
            <div id="team2" class="team hidden">
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-300 rounded-lg shadow-md">
                        <p>Konten Team 2</p>
                    </div>
                </div>
            </div>

            <!-- div Tim 3 -->
            <div id="team3" class="team hidden">
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-300 rounded-lg shadow-md">
                        <p>Konten Team 3</p>
                    </div>
                </div>
            </div>

            <!-- div Tim 4 -->
            <div id="team4" class="team hidden">
                <div class="grid grid-cols-4 gap-4">
                    <div class="bg-white border border-gray-300 rounded-lg shadow-md">
                        <p>Konten Team 4</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Script untuk menampilkan dan menyembunyikan tim -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            // Referensi ke masing-masing div tim
            const teams = {
                team1: document.getElementById("team1"),
                team2: document.getElementById("team2"),
                team3: document.getElementById("team3"),
                team4: document.getElementById("team4"),
            };

            // Referensi ke masing-masing tombol
            const buttons = {
                team1: document.getElementById("btnTeam1"),
                team2: document.getElementById("btnTeam2"),
                team3: document.getElementById("btnTeam3"),
                team4: document.getElementById("btnTeam4"),
            };

            // Menambahkan event listener untuk setiap tombol
            Object.keys(buttons).forEach((team) => {
                buttons[team].addEventListener("click", () => {
                    // Menyembunyikan semua tim terlebih dahulu
                    Object.keys(teams).forEach((key) => {
                        teams[key].classList.add("hidden");
                    });
                    // Menampilkan tim yang dipilih
                    teams[team].classList.remove("hidden");
                });
            });
        });
    </script>

</x-layout>
