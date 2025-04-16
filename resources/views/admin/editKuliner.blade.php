<x-layadmin>
    <p class="font-semibold text-3xl playfair-display-uniquifier pb-4">
        Edit Kuliner
    </p>
    <div class="mx-auto bg-white rounded-lg">
        <form action="{{ route('kuliner.update', $kuliner->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Pilih Wisata -->
            <div class="mb-2">
                <label for="id_wisata" class="font-poppins block text-gray-700 font-bold mb-2">Pilih Wisata Untuk Menambah
                    Kuliner</label>
                <select id="id_wisata" name="id_wisata" required
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    @foreach ($wisata as $wisata)
                        <option value="{{ $wisata->id }}" {{ $kuliner->id_wisata == $wisata->id ? 'selected' : '' }}>
                            {{ $wisata->nama_wisata ?? 'Nama wisata tidak tersedia' }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Nama Kuliner -->
            <div class="mb-2">
                <label for="nama_kuliner" class="font-poppins block text-gray-700 font-bold mb-2">Nama Kuliner</label>
                <input type="text" id="nama_kuliner" name="nama_kuliner" value="{{ $kuliner->nama_kuliner }}"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                    required>
                @error('nama_kuliner')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi Kuliner -->
            <div class="mb-2">
                <label for="deskripsi_kuliner" class="font-poppins block text-gray-700 font-bold mb-2">Deskripsi
                    Kuliner</label>
                <textarea id="deskripsi_kuliner" name="deskripsi_kuliner"
                    class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">{{ $kuliner->deskripsi_kuliner }}</textarea>
                @error('deskripsi_kuliner')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- No. HP -->
            <div class="mb-2">
                <label for="no_hp" class="block text-sm font-poppins font-bold mb-2">No. HP</label>
                <input type="text" name="no_hp" class="form-input" value="{{ old('no_hp', $kuliner->no_hp) }}">

                @error('no_hp')
                    <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>
            {{-- Jam Operasional --}}
            @php
                $hariList = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];
                $jam_operasional_old = old('jam_operasional');
            @endphp

            <div class="mb-4">
                <label class="block mb-2 text-sm font-poppins">Jam Operasional</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 font-poppins">
                    @foreach ($hariList as $index => $hari)
                        @php
                            $dataBuka =
                                $jam_operasional_old[$index]['buka'] ??
                                ($kuliner->jam_operasional[$index]['buka'] ?? '');
                            $dataTutup =
                                $jam_operasional_old[$index]['tutup'] ??
                                ($kuliner->jam_operasional[$index]['tutup'] ?? '');
                        @endphp

                        <div class="border border-gray-400 p-3 rounded-lg bg-gray-50">
                            <label class="block text-sm font-semibold mb-1">{{ ucfirst($hari) }}</label>
                            <input type="hidden" name="jam_operasional[{{ $index }}][hari]"
                                value="{{ $hari }}">
                            <div class="flex gap-2">
                                <input type="time" name="jam_operasional[{{ $index }}][buka]"
                                    class="w-full p-2 border rounded text-sm font-poppins" value="{{ $dataBuka }}">
                                <input type="time" name="jam_operasional[{{ $index }}][tutup]"
                                    class="w-full p-2 border rounded text-sm font-poppins" value="{{ $dataTutup }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>


            <!-- Gambar Kuliner -->
            <div class="flex gap-4 mb-2"> <!-- Flex container dengan jarak (gap) 4 unit -->
                <!-- Upload Gambar Kuliner -->
                <div class="flex-1">
                    <label class="font-poppins block mb-2 text-sm font-medium text-gray-900" for="gambar_kuliner">Upload
                        Gambar Kuliner</label>
                    <div class="flex">
                        <input type="file" id="gambar_kuliner" name="gambar_kuliner"
                            class="font-poppins mr-2 block w-full text-sm text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex justify-center items-center">
                            <div data-modal-target="modal-gambar-kuliner" data-modal-toggle="modal-gambar-kuliner"
                                class="font-poppins font-medium shadow-md shadow-gray-600 hover:bg-blue-700 text-white py-2 px-4 bg-blue-600 rounded-xl">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('gambar_kuliner')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Gambar Menu Kuliner -->
                <div class="flex-1">
                    <label for="multiple_files" class="font-poppins block mb-2 text-sm font-medium text-gray-900">Upload
                        Gambar Menu Kuliner</label>
                    <div class="flex">
                        <input type="file" id="multiple_files" name="gambar_menu[]" multiple
                            class="font-poppins mr-2 block w-full text-sm text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50">
                        <div class="flex justify-center items-center">
                            <div data-modal-target="modal-detail-gambar-kuliner"
                                data-modal-toggle="modal-detail-gambar-kuliner"
                                class="font-medium shadow-md shadow-gray-600 hover:bg-blue-700 text-white py-2 px-4 bg-blue-600 rounded-xl">
                                Detail
                            </div>
                        </div>
                    </div>
                    @error('gambar_menu.*')
                        <div class="font-poppins text-red-500 mt-1 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex">
                <button type="submit"
                    class="font-poppins mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-layadmin>





<div id="modal-gambar-kuliner" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5 flex justify-center items-center">
                @if ($kuliner->gambar_kuliner)
                    <img src="{{ asset('storage/' . $kuliner->gambar_kuliner) }}"
                        class="object-contain w-full max-w-full h-auto max-h-[500px]" alt="Gambar">
                @else
                    <p class="font-poppins text-center text-white">Tidak ada gambar yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div id="modal-detail-gambar-kuliner" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl xl:max-w-5xl max-h-full">
        <!-- Modal content -->
        <div class="relative rounded-lg shadow dark:bg-gray-700">
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <div class="relative flex justify-center items-center w-full overflow-hidden">
                    @if (!empty($kuliner->gambar_menu))
                        <div id="carousel" class="flex transition-transform duration-300">
                            @foreach (json_decode($kuliner->gambar_menu, true) as $image)
                                <div class="flex-shrink-0 w-full flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $image) }}"
                                        class="object-contain w-full h-auto max-h-[500px] mx-auto" alt="Gambar">
                                </div>
                            @endforeach
                        </div>

                        <!-- Navigasi Geser -->
                        <button id="prev"
                            class="absolute top-1/2 left-10 transform -translate-y-1/2 bg-gray-200 bg-opacity-50 rounded-full p-2">
                            &#10094; <!-- Tanda panah kiri -->
                        </button>
                        <button id="next"
                            class="absolute top-1/2 right-10 transform -translate-y-1/2 bg-gray-200 bg-opacity-50 rounded-full p-2">
                            &#10095; <!-- Tanda panah kanan -->
                        </button>
                    @else
                        <p class="font-poppins text-center">Tidak ada gambar yang tersedia.</p>
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
