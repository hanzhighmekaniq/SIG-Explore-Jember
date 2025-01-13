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

    <form action="{{ route('wisata.update', ['wisatum' => $wisata->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4 pt-4">
            <div class="grid-cols-1 grid gap-4">
                <!-- Kategori -->
                <div>
                    <label for="id_kategori" class="block text-gray-700 font-bold mb-2">Kategori</label>
                    <select id="id_kategori" name="id_kategori"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @foreach ($dataKategori as $item)
                            <option value="{{ $item->id }}"
                                {{ old('id_kategori_detail', $wisata->id) == $item->id ? 'selected' : '' }}>
                                {{ $item->kategori->nama_kategori ?? 'Nama kategori tidak tersedia' }},
                                {{ $item->nama_kategori_detail ?? 'Detail kategori tidak tersedia' }}
                            </option>
                        @endforeach

                    </select>
                    @error('id_kategori')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Nama Wisata -->
                <div>
                    <label for="nama_wisata" class="block text-gray-700 font-bold mb-2">Nama Wisata:</label>
                    <input type="text" id="nama_wisata" name="nama_wisata"
                        value="{{ old('nama_wisata', $wisata->nama_wisata) }}" required
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('nama_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Deskripsi Wisata -->
                <div>
                    <label for="deskripsi_wisata" class="block text-gray-700 font-bold mb-2">Deskripsi Wisata:</label>
                    <textarea id="deskripsi_wisata" name="deskripsi_wisata"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('deskripsi_wisata', $wisata->deskripsi_wisata) }}</textarea>
                    @error('deskripsi_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fasilitas -->
                <div>
                    <label for="fasilitas" class="block text-gray-700 font-bold mb-2">Fasilitas:</label>
                    <textarea id="fasilitas" name="fasilitas"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ old('fasilitas', $wisata->fasilitas) }}</textarea>
                    @error('fasilitas')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label for="lokasi" class="block text-gray-700 font-bold mb-2">Lokasi:</label>
                    <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $wisata->lokasi) }}"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('lokasi')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="grid-cols-1 grid gap-4">
                <!-- Gambar Wisata -->
                <div>
                    <label for="file_input" class="block mb-2 text-sm font-medium text-gray-900">Upload Gambar
                        Wisata</label>
                    <div class="flex">

                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="file_input" type="file" name="img">
                        <div class="flex justify-center items-center ml-2">
                            <div data-modal-target="modal-gambar-wisata" data-modal-toggle="modal-gambar-wisata"
                                class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('img')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Gambar Detail -->
                <div>
                    <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Gambar
                        Detail</label>
                    <div class="flex">

                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="multiple_files" type="file" name="img_detail[]" multiple>
                        <div class="flex justify-center items-center ml-2">
                            <div data-modal-target="modal-gambar-detail-wisata"
                                data-modal-toggle="modal-gambar-detail-wisata"
                                class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('img_detail.*')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Latitude dan Longitude -->
                <div class="grid-cols-2 grid gap-4">
                    <div>
                        <label for="latitude" class="block text-gray-700 font-bold mb-2">Latitude:</label>
                        <input type="text" id="latitude" name="latitude"
                            value="{{ old('latitude', $wisata->latitude) }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @error('latitude')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="longitude" class="block text-gray-700 font-bold mb-2">Longitude:</label>
                        <input type="text" id="longitude" name="longitude"
                            value="{{ old('longitude', $wisata->longitude) }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        @error('longitude')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- HTM Wisata -->
                <div>
                    <label for="htm_wisata" class="block text-gray-700 font-bold mb-2">HTM Wisata:</label>
                    <input type="number" id="htm_wisata" name="htm_wisata"
                        value="{{ old('htm_wisata', $wisata->htm_wisata) }}" step="0.01"
                        class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @error('htm_wisata')
                        <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- HTM Parkir -->
                <div>
                    <label for="htm_parkir" class="block text-gray-700 font-bold mb-2">HTM Parkir:</label>
                    <input type="number" id="htm_parkir" name="htm_parkir"
                        value="{{ old('htm_parkir', $wisata->htm_parkir) }}" step="0.01"
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
                Simpan
            </button>
        </div>
    </form>
</x-layadmin>

<div id="modal-gambar-wisata" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="">
                    @if ($wisata->img)
                        <img src="{{ asset('storage/' . $wisata->img) }}" class="object-cover " alt="Gambar">
                    @else
                        <p>Tidak ada gambar yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-gambar-detail-wisata" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="relative flex overflow-hidden w-full">
                    @if (!empty($wisata->img_detail))
                        <div id="carousel" class="flex transition-transform duration-300">
                            @foreach (json_decode($wisata->img_detail, true) as $image)
                                <div class="flex-shrink-0 w-full items-center flex justify-center">
                                    <img src="{{ asset('storage/' . $image) }}"
                                        class=" object-contain w-full h-auto max-h-[500px] mx-auto" alt="Gambar">
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigasi Geser -->
                        <button id="prev"
                            class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-gray-200 bg-opacity-50 rounded-full p-2 ml-2">
                            &#10094; <!-- Tanda panah kiri -->
                        </button>
                        <button id="next"
                            class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-gray-200 bg-opacity-50 rounded-full p-2 mr-2">
                            &#10095; <!-- Tanda panah kanan -->
                        </button>
                    @else
                        <p>Tidak ada gambar yang tersedia.</p>
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
