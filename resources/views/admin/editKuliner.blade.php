<x-layadmin>
    <div class="mx-auto bg-white py-4 rounded-lg">
        <form action="{{ route('kuliner.update', $kuliner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Pilih Wisata -->
            <div class="mb-2">
                <label for="id_wisata" class="block text-gray-700 font-bold mb-2">Pilih Wisata Untuk Menambah
                    Kuliner</label>
                <select id="id_wisata" name="id_wisata" required
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($wisata as $wisata)
                        <option value="{{ $wisata->id }}" {{ $kuliner->id_wisata == $wisata->id ? 'selected' : '' }}>
                            {{ $wisata->nama_wisata ?? 'Nama wisata tidak tersedia' }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Nama Kuliner -->
            <div class="mb-2">
                <label for="nama_kuliner" class="block text-gray-700 font-bold mb-2">Nama Kuliner</label>
                <input type="text" id="nama_kuliner" name="nama_kuliner" value="{{ $kuliner->nama_kuliner }}"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
                @error('nama_kuliner')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi Kuliner -->
            <div class="mb-2">
                <label for="deskripsi_kuliner" class="block text-gray-700 font-bold mb-2">Deskripsi Kuliner</label>
                <textarea id="deskripsi_kuliner" name="deskripsi_kuliner"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $kuliner->deskripsi_kuliner }}</textarea>
                @error('deskripsi_kuliner')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gambar Kuliner -->
            <div class="mb-2">
                <label class="block mb-2 text-sm font-medium text-gray-900" for="gambar_kuliner">Upload Gambar
                    Kuliner</label>
                <div class="flex ">
                    <input type="file" id="gambar_kuliner" name="gambar_kuliner"
                        class="mr-2 block w-full text-sm text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex justify-center items-center">
                        <div data-modal-target="modal-gambar-kuliner" data-modal-toggle="modal-gambar-kuliner"
                            class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                            Detail
                        </div>
                    </div>
                </div>


                @error('gambar_kuliner')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Gambar Menu Tambahan -->
            <div class="mb-2">
                <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Gambar Menu
                    Kuliner</label>
                <div class="flex">
                    <input type="file" id="multiple_files" name="gambar_menu[]" multiple
                        class="mr-2 block w-full text-sm text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50">
                    <div class="flex justify-center items-center">
                        <div data-modal-target="modal-detail-gambar-kuliner"
                            data-modal-toggle="modal-detail-gambar-kuliner"
                            class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                            Detail
                        </div>
                    </div>
                </div>

                @error('gambar_menu.*')
                    <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                    class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Simpan</button>
            </div>
        </form>
    </div>
</x-layadmin>





<div id="modal-gambar-kuliner" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="">
                    @if ($kuliner->gambar_kuliner)
                        <img src="{{ asset('storage/' . $kuliner->gambar_kuliner) }}" class="object-cover "
                            alt="Gambar">
                    @else
                        <p>Tidak ada gambar yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-detail-gambar-kuliner" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="relative flex overflow-hidden w-full">
                    @if (!empty($kuliner->gambar_menu))
                        <div id="carousel" class="flex transition-transform duration-300">
                            @foreach (json_decode($kuliner->gambar_menu, true) as $image)
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
