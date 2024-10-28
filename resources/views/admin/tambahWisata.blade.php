<x-layadmin>

    <form action="#" method="POST" enctype="multipart/form-data" class=" mx-auto  bg-white py-4 rounded-lg ">
        @csrf
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">

            <div>

                <div class="mb-4">
                    <label for="nama_wisata" class="block text-gray-700 font-bold mb-2">Nama Wisata:</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="kategori_wisata" class="block text-gray-700 font-bold mb-2">Kategori Wisata:</label>
                    <input type="text" id="kategori_wisata" name="kategori_wisata" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="deskripsi_wisata" class="block text-gray-700 font-bold mb-2">Deskripsi Wisata:</label>
                    <textarea id="deskripsi_wisata" name="deskripsi_wisata"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div class="mb-4">
                    <label for="img" class="block text-gray-700 font-bold mb-2">Gambar Utama:</label>
                    <input type="file" id="img" name="img" accept="image/*"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="img_wisata" class="block text-gray-700 font-bold mb-2">Galeri Gambar:</label>
                    <input type="file" id="img_wisata" name="img_wisata[]" accept="image/*" multiple
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="fasilitas" class="block text-gray-700 font-bold mb-2">Fasilitas:</label>
                    <textarea id="fasilitas" name="fasilitas"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>
            </div>

            <div>

                <div class="mb-4">
                    <label for="lokasi" class="block text-gray-700 font-bold mb-2">Lokasi:</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude:</label>
                    <input type="text" id="latitude" name="latitude"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude:</label>
                    <input type="text" id="longitude" name="longitude"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="htm_wisata" class="block text-gray-700 font-bold mb-2">HTM Wisata:</label>
                    <input type="number" id="htm_wisata" name="htm_wisata" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="htm_parkir" class="block text-gray-700 font-bold mb-2">HTM Parkir:</label>
                    <input type="number" id="htm_parkir" name="htm_parkir" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div class="mb-4">
                    <label for="id_data_wisata_event" class="block text-gray-700 font-bold mb-2">Event Terkait
                        (Opsional):</label>
                    <select id="id_data_wisata_event" name="id_data_wisata_event"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Pilih Event</option>
                        {{-- @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->nama_event }}</option>
                @endforeach --}}
                    </select>
                </div>

                <div class="mb-4">
                    <label for="id_data_wisata_kuliner" class="block text-gray-700 font-bold mb-2">Kuliner Terkait
                        (Opsional):</label>
                    <select id="id_data_wisata_kuliner" name="id_data_wisata_kuliner"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Pilih Kuliner</option>
                        {{-- @foreach ($kuliners as $kuliner)
                    <option value="{{ $kuliner->id }}">{{ $kuliner->nama_kuliner }}</option>
                @endforeach --}}
                    </select>
                </div>
            </div>

        </div>

        <div class="mt-4 xl:mt-0 flex justify-start">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Tambah Data
            </button>
        </div>
    </form>

</x-layadmin>
