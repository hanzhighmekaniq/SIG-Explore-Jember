    <x-layadmin>

        <div class=" mx-auto bg-white py-4 rounded-lg">

            <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4 text-md">

                    <div>
                        <label for="id_wisata" class="block text-gray-700 font-bold mb-2">Pilih Wisata Untuk Menambah
                            Kuliner</label>
                        <select id="id_wisata" name="id_wisata" required
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                            <option selected disabled>Pilih Wisata</option>
                            @foreach ($DataWisata as $wisata)
                                <option value="{{ $wisata->id }}">{{ $wisata->id }}---{{ $wisata->nama_wisata }},
                                    {{ $wisata->detail_wisata }}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <!-- Nama Kuliner -->
                    <div>
                        <label for="nama_kuliner" class="block text-gray-700 font-bold mb-2">Nama Kuliner</label>
                        <input type="text" id="nama_kuliner" name="nama_kuliner"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Nama Kuliner" required>
                        @error('nama_kuliner')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi Event -->
                    <div>
                        <label for="deskripsi_kuliner" class="block text-gray-700 font-bold mb-2">Deskripsi
                            Kuliner</label>
                        <textarea id="deskripsi_kuliner" name="deskripsi_kuliner"
                            class="w-full border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan deskripsi event"></textarea>
                        @error('deskripsi_kuliner')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar Event -->

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" for="user_avatar">Upload Gambar
                            Kuliner</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none"
                            aria-describedby="user_avatar_help" id="gambar_kuliner" name="gambar_kuliner"
                            type="file">
                        @error('gambar_kuliner')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="multiple_files" class="block mb-2 text-sm font-medium text-gray-900">Upload Multiple
                            Files Kuliner</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50"
                            id="multiple_files" type="file" name="gambar_menu[]" multiple>
                        @error('gambar_menu.*')
                            <div class="text-red-500 mt-1 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex">
                        <button type="submit"
                            class="mt-2 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring">Tambah Data</button>
                    </div>
                </div>

            </form>
        </div>
    </x-layadmin>
