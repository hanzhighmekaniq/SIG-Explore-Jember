<x-layadmin>

    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 pt-4">
            <div class="grid-cols-1 grid gap-4">
                
                <div>
                    <label for="nama_wisata" class="block text-gray-700 font-bold mb-2">Nama Wisata:</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label for="id_kategori" class="block text-gray-700 font-bold mb-2">Kategori</label>
                    <select id="id_kategori" name="id_kategori"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        <option value="">Pilih Kategori</option>
                        @foreach ($dataKategori as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }},
                                {{ $kategori->detail_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="deskripsi_wisata" class="block text-gray-700 font-bold mb-2">Deskripsi Wisata:</label>
                    <textarea id="deskripsi_wisata" name="deskripsi_wisata"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div>
                    <label for="fasilitas" class="block text-gray-700 font-bold mb-2">Fasilitas:</label>
                    <textarea id="fasilitas" name="fasilitas"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                </div>

                <div>
                    <label for="lokasi" class="block text-gray-700 font-bold mb-2">Lokasi:</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>

            <div class="grid-cols-1 grid gap-4">
                <div>
                    <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900">Upload File</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="file_input" type="file" name="img">
                </div>

                <div>
                    <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Multiple
                        Files</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="multiple_files" type="file" name="img_detail[]" multiple>
                </div>

                <div class="grid-cols-2 grid gap-4">
                    <div>
                        <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude:</label>
                        <input type="text" id="latitude" name="latitude"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                    <div>
                        <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude:</label>
                        <input type="text" id="longitude" name="longitude"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                </div>

                <div>
                    <label for="htm_wisata" class="block text-gray-700 font-bold mb-2">HTM Wisata:</label>
                    <input type="number" id="htm_wisata" name="htm_wisata" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>

                <div>
                    <label for="htm_parkir" class="block text-gray-700 font-bold mb-2">HTM Parkir:</label>
                    <input type="number" id="htm_parkir" name="htm_parkir" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                </div>
            </div>
        </div>

        <div class="mt-4 xl:mt-4 flex justify-start">
            <button type="submit"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                Tambah Data
            </button>
        </div>
    </form>


</x-layadmin>
