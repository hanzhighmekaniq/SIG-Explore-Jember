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
                <span class="sr-only font-poppins">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal font-poppins">
                <strong>Kesalahan:</strong> {{ $message }}
            </div>
            <button type="button"
                class="font-poppins ms-auto -mx-1.5 -my-1.5 bg-red-100 text-red-400 hover:text-red-600 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-error" aria-label="Close" onclick="closeToast()">
                <span class="sr-only font-poppins">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <p class="font-poppins font-semibold text-3xl font-poppins pb-4">
        Edit Wisata
    </p>
    <form action="{{ route('wisata.update', ['wisatum' => $wisata->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="space-y-4 text-md">
            <!-- Kategori -->
            <div>
                <label for="id_kategori_detail" class="font-poppins block text-gray-700 font-bold mb-2">Kategori</label>
                <select id="id_kategori_detail" name="id_kategori_detail"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($dataKategori as $item)
                        <option value="{{ $item->id }}"
                            {{ old('id_kategori_detail', $wisata->id) == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori_detail ?? 'Detail kategori tidak tersedia' }}
                        </option>
                    @endforeach

                </select>
                @error('id_kategori')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <!-- Nama Wisata -->
            <div>
                <label for="nama_wisata" class="font-poppins block text-gray-700 font-bold mb-2">Nama Wisata:</label>
                <input type="text" id="nama_wisata" name="nama_wisata"
                    value="{{ old('nama_wisata', $wisata->nama_wisata) }}" required
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                @error('nama_wisata')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>


            <!-- Deskripsi Wisata -->
            <div>
                <label for="deskripsi_wisata" class="font-poppins block text-gray-700 font-bold mb-2">Deskripsi
                    Wisata:</label>
                <textarea id="deskripsi_wisata" name="deskripsi_wisata"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi_wisata', $wisata->deskripsi_wisata) }}</textarea>
                @error('deskripsi_wisata')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Fasilitas -->
            <div>
                <label for="fasilitas" class="font-poppins block text-gray-700 font-bold mb-2">Fasilitas:</label>
                <textarea id="fasilitas" name="fasilitas"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('fasilitas', $wisata->fasilitas) }}</textarea>
                @error('fasilitas')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Lokasi -->
            <div>
                <label for="lokasi" class="font-poppins block text-gray-700 font-bold mb-2">Lokasi:</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $wisata->lokasi) }}"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                @error('lokasi')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gambar Wisata -->
            <div class="flex gap-4"> <!-- Flex container dengan jarak (gap) 4 unit -->
                <!-- Upload Gambar Wisata -->
                <div class="flex-1">
                    <label for="file_input" class="font-poppins block mb-2 text-sm font-medium text-gray-900">Upload
                        Gambar Wisata</label>
                    <div class="flex">
                        <input
                            class="font-poppins block w-full text-sm text-gray-900 border border-slate-500 rounded-lg cursor-pointer bg-gray-50"
                            id="file_input" type="file" name="img">
                        <div class="flex justify-center items-center ml-2">
                            <div data-modal-target="modal-gambar-wisata" data-modal-toggle="modal-gambar-wisata"
                                class="font-poppins font-medium shadow-md shadow-gray-200 hover:bg-blue-600 text-white py-2 px-4 bg-blue-700 rounded-xl transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('img')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Gambar Detail -->
                <div class="flex-1">
                    <label for="multiple_files" class="font-poppins block mb-2 text-sm font-medium text-gray-900">Upload
                        Gambar Detail</label>
                    <div class="flex">
                        <input
                            class="font-poppins block w-full text-sm text-gray-900 border border-slate-500 rounded-lg cursor-pointer bg-gray-50"
                            id="multiple_files" type="file" name="img_detail[]" multiple>
                        <div class="flex justify-center items-center ml-2">
                            <div data-modal-target="modal-gambar-detail-wisata"
                                data-modal-toggle="modal-gambar-detail-wisata"
                                class="font-poppins font-medium shadow-md shadow-gray-200 hover:bg-blue-600 text-white py-2 px-4 bg-blue-700 rounded-xl transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('img_detail.*')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div>
                <label for="Jam_Operasional" class="font-poppins block mb-2 text-sm font-medium text-gray-900">Jam
                    Operasional</label>
                    <div id="jam-operasional-container"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                    @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $hari)
                        <div class="border-2 border-slate-500 p-3 rounded-lg bg-gray-50">
                            <label class="font-poppins block text-sm font-semibold text-gray-700 mb-1">
                                {{ ucfirst($hari) }}
                            </label>

                            <div class="flex gap-2">
                                <input type="time" name="jam_operasional[{{ $hari }}][buka]"
                                    class="font-poppins w-full p-2 border rounded text-sm focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ old("jam_operasional.$hari.buka") ?? ($jamOperasional[$hari]['buka'] ?? '') }}" required>

                                <input type="time" name="jam_operasional[{{ $hari }}][tutup]"
                                    class="font-poppins w-full p-2 border rounded text-sm focus:ring-blue-500 focus:border-blue-500"
                                    value="{{ old("jam_operasional.$hari.tutup") ?? ($jamOperasional[$hari]['tutup'] ?? '') }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Latitude dan Longitude -->
            <div class="grid-cols-2 grid gap-4">
                <div>
                    <label for="latitude" class="font-poppins block text-gray-700 font-bold mb-2">Latitude:</label>
                    <input type="text" id="latitude" name="latitude"
                        value="{{ old('latitude', $wisata->latitude) }}"
                        class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('latitude')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="longitude" class="font-poppins block text-gray-700 font-bold mb-2">Longitude:</label>
                    <input type="text" id="longitude" name="longitude"
                        value="{{ old('longitude', $wisata->longitude) }}"
                        class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('longitude')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- HTM Wisata -->
            <div>
                <label for="htm_wisata" class="font-poppins block text-gray-700 font-bold mb-2">HTM Wisata:</label>
                <input type="text" id="htm_wisata" name="htm_wisata"
                    value="{{ old('htm_wisata', $wisata->htm_wisata) }}" step="0.01"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                @error('htm_wisata')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- HTM Parkir -->
            <div>
                <label for="htm_parkir" class="font-poppins block text-gray-700 font-bold mb-2">HTM Parkir:</label>
                <input type="text" id="htm_parkir" name="htm_parkir"
                    value="{{ old('htm_parkir', $wisata->htm_parkir) }}" step="0.01"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                @error('htm_parkir')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4 xl:mt-4 flex justify-start">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                    Simpan
                </button>
            </div>
        </div>

    </form>
</x-layadmin>

<div id="modal-gambar-wisata" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5 flex justify-center items-center">
                @if ($wisata->img)
                    <img src="{{ asset('storage/' . $wisata->img) }}"
                        class="object-contain w-full max-w-full h-auto max-h-[500px]" alt="Gambar">
                @else
                    <p class="font-poppins text-center text-white">Tidak ada gambar yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div id="modal-gambar-detail-wisata" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="relative flex justify-center items-center overflow-hidden w-full">
                    @if (!empty($wisata->img_detail))
                        <div id="carousel" class="flex transition-transform duration-300">
                            @foreach (json_decode($wisata->img_detail, true) as $image)
                                <div class="flex-shrink-0 w-full flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $image) }}"
                                        class="object-contain w-auto h-auto max-h-[500px] mx-auto" alt="Gambar">
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigasi Geser -->
                        <button id="prev"
                            class="absolute top-1/2 left-10 transform -translate-y-1/2 bg-slate-200 bg-opacity-50 rounded-full p-2">
                            &#10094; <!-- Tanda panah kiri -->
                        </button>
                        <button id="next"
                            class="absolute top-1/2 right-10 transform -translate-y-1/2 bg-slate-200 bg-opacity-50 rounded-full p-2">
                            &#10095; <!-- Tanda panah kanan -->
                        </button>
                    @else
                        <p class="font-poppins text-center text-white">Tidak ada gambar yang tersedia.</p>
                    @endif
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const carousel = document.getElementById('carousel');
                    const images = carousel.children;
                    const totalImages = images.length;
                    let currentIndex = 0;

                    document.getElementById('next').addEventListener('click', () => {
                        currentIndex = (currentIndex + 1) % totalImages;
                        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                    });

                    document.getElementById('prev').addEventListener('click', () => {
                        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                        carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
                    });
                });
            </script>
        </div>
    </div>
</div>
