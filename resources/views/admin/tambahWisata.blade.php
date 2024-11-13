<x-layadmin>
    @if ($message = Session::get('error'))
        <div id="toast-error"
            class="absolute top-20 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-100 rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-200 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">
                <strong>Kesalahan:</strong> {{ $message }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-100 text-red-400 hover:text-red-600 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-error" aria-label="Close" onclick="closeToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <form action="{{ route('wisata.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 pt-4">
            <div class="grid-cols-1 grid gap-4">


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
                    @error('id_kategori')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="nama_wisata" class="block text-gray-700 font-bold mb-2">Nama Wisata:</label>
                    <input type="text" id="nama_wisata" name="nama_wisata" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('nama_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi_wisata" class="block text-gray-700 font-bold mb-2">Deskripsi Wisata:</label>
                    <textarea id="deskripsi_wisata" name="deskripsi_wisata"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    @error('deskripsi_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="fasilitas" class="block text-gray-700 font-bold mb-2">Fasilitas:</label>
                    <textarea id="fasilitas" name="fasilitas"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"></textarea>
                    @error('fasilitas')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="lokasi" class="block text-gray-700 font-bold mb-2">Lokasi:</label>
                    <input type="text" id="lokasi" name="lokasi"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('lokasi')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid-cols-1 grid gap-4">
                <div>
                    <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900">Upload File</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="file_input" type="file" name="img">

                    @error('img')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror

                </div>

                <div>
                    <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Multiple
                        Files</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                        id="multiple_files" type="file" name="img_detail[]" multiple>
                    @error('img_detail.*')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="grid-cols-2 grid gap-4">
                    <div>
                        <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude:</label>
                        <input type="text" id="latitude" name="latitude"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @error('latitude')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude:</label>
                        <input type="text" id="longitude" name="longitude"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @error('longitude')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="htm_wisata" class="block text-gray-700 font-bold mb-2">HTM Wisata:</label>
                    <input type="number" id="htm_wisata" name="htm_wisata" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('htm_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="htm_parkir" class="block text-gray-700 font-bold mb-2">HTM Parkir:</label>
                    <input type="number" id="htm_parkir" name="htm_parkir" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('htm_parkir')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
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
