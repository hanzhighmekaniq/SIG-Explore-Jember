<x-layadmin>

    <div class=" mx-auto bg-white py-4 rounded-lg ">

        <!-- Nama Event -->
        <div class="grid grid-cols-2 gap-4 flex-wrap">
            {{-- KIRI --}}
            <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-2">
                    <div class="">
                        <label for="id_wisata" class="block text-gray-700 font-bold mb-2">Pilih Wisata Untuk Menambah
                            Event</label>
                        <select id="id_wisata" name="id_wisata"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                            <option selected="">Pilih Wisata</option>
                            @foreach ($DataWisata as $wisata)
                                <option value="{{ $wisata->id }}">{{ $wisata->nama_wisata }},
                                    {{ $wisata->detail_wisata }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="nama_event" class="block text-gray-700 font-bold mb-2">Nama Event</label>
                        <input type="text" id="nama_event" name="nama_event"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan nama event" required>
                    </div>
                    <!-- Deskripsi Event -->
                    <div class="">
                        <label for="deskripsi_event" class="block text-gray-700 font-bold mb-2">Deskripsi Event</label>
                        <textarea id="deskripsi_event" name="deskripsi_event"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan deskripsi event"></textarea>
                    </div>
                    <!-- HTM Event -->
                    <div class="">
                        <label for="htm_event" class="block text-gray-700 font-bold mb-2">HTM Event</label>
                        <input type="number" id="htm_event" name="htm_event" step="0.01"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Harga tiket masuk" required>
                    </div>

                </div>
                {{-- KANAN --}}
                <div class="space-y-2">
                    <!-- Tanggal Mulai -->
                    <div class="">
                        <label for="tgl_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai</label>
                        <input type="datetime-local" id="tgl_mulai" name="event_mulai"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                    <!-- Tanggal Berakhir -->
                    <div class="">
                        <label for="tgl_berakhir" class="block text-gray-700 font-bold mb-2">Tanggal Berakhir</label>
                        <input type="datetime-local" id="tgl_berakhir" name="event_berakhir"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                    <!-- Gambar Event -->
                    <div class="">
                        <form class="max-w-lg mx-auto">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Upload Gambar Event</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none "
                                aria-describedby="user_avatar_help" id="img" name="img"
                                type="file">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                                picture is useful to confirm your are logged into your account</div>

                            <div>
                        </form>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layadmin>
