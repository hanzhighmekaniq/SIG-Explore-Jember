<x-layadmin>

    <div class=" mx-auto bg-white py-4 rounded-lg shadow-lg">

        <form action="/data-wisata-event" method="POST">
            <!-- Nama Event -->
            <div class="grid grid-cols-2 gap-4 flex-wrap">
                <div class="">

                    <div class="mb-4">
                        <label for="nama_event" class="block text-gray-700 font-bold mb-2">Nama Event</label>
                        <input type="text" id="nama_event" name="nama_event"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan nama event" required>
                    </div>

                    <!-- Deskripsi Event -->
                    <div class="mb-4">
                        <label for="deskripsi_event" class="block text-gray-700 font-bold mb-2">Deskripsi Event</label>
                        <textarea id="deskripsi_event" name="deskripsi_event"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan deskripsi event"></textarea>
                    </div>



                    <!-- HTM Event -->
                    <div class="mb-4">
                        <label for="htm_event" class="block text-gray-700 font-bold mb-2">HTM Event</label>
                        <input type="number" id="htm_event" name="htm_event" step="0.01"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Harga tiket masuk" required>
                    </div>
                    <!-- Tanggal Mulai -->
                    <div class="mb-4">
                        <label for="tgl_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai</label>
                        <input type="date" id="tgl_mulai" name="tgl_mulai"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>

                    <!-- Tanggal Berakhir -->
                    <div class="mb-4">
                        <label for="tgl_berakhir" class="block text-gray-700 font-bold mb-2">Tanggal Berakhir</label>
                        <input type="date" id="tgl_berakhir" name="tgl_berakhir"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>

                    <!-- Jam Mulai -->
                    <div class="mb-4">
                        <label for="jam_mulai" class="block text-gray-700 font-bold mb-2">Jam Mulai</label>
                        <input type="time" id="jam_mulai" name="jam_mulai"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>

                    <!-- Jam Berakhir -->
                    <div class="mb-4">
                        <label for="jam_berakhir" class="block text-gray-700 font-bold mb-2">Jam Berakhir</label>
                        <input type="time" id="jam_berakhir" name="jam_berakhir"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                </div>

                <div>

                    <!-- Gambar Event -->

                    <form class="max-w-lg mx-auto">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="user_avatar">Upload Gambar Event</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none "
                            aria-describedby="user_avatar_help" id="gambar_event" name="gambar_event" type="file">
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                            picture is useful to confirm your are logged into your account</div>
                    </form>



                </div>

            </div>







            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring">Simpan</button>
            </div>
        </form>
    </div>
</x-layadmin>
