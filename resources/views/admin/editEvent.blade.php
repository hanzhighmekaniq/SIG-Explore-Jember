<x-layadmin>
    <p class="font-semibold text-3xl playfair-display-uniquifier pb-4">
        Edit Event
    </p>
    <div class=" mx-auto bg-white rounded-lg ">

        <!-- Nama Event -->
        <div class="grid gap-4 flex-wrap">
            {{-- KIRI --}}
            <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="id_wisata" class="block text-gray-700 font-bold mb-2">Pilih Wisata Untuk Menambah
                            Event</label>
                        <select id="id_wisata" name="id_wisata"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                            <option selected="">Pilih Wisata</option>

                            @foreach ($wisata as $wisata)
                                <option value="{{ $wisata->id }}"
                                    {{ $event->id_wisata == $wisata->id ? 'selected' : '' }}>
                                    {{ $wisata->nama_wisata ?? 'Nama wisata tidak tersedia' }}
                                </option>
                            @endforeach



                        </select>
                    </div>
                    <div>
                        <label for="nama_event" class="block text-gray-700 font-bold mb-2">Nama Event</label>
                        <input type="text" id="nama_event" name="nama_event" value="{{ $event->nama_event }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan nama event" required>
                    </div>
                    <!-- Deskripsi Event -->
                    <div>
                        <label for="deskripsi_event" class="block text-gray-700 font-bold mb-2">Deskripsi Event</label>
                        <textarea id="deskripsi_event" name="deskripsi_event"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan deskripsi event">{{ $event->deskripsi_event }}</textarea>
                    </div>
                    <!-- HTM Event -->
                    <div>
                        <label for="htm_event" class="block text-gray-700 font-bold mb-2">HTM Event</label>
                        <input type="number" id="htm_event" name="htm_event" step="0.01"
                            value="{{ $event->htm_event }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Harga tiket masuk" required>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div>
                        <label for="tgl_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai</label>
                        <input type="datetime-local" id="tgl_mulai" name="event_mulai" value="{{ $event->event_mulai }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>

                    </div>

                    <!-- Tanggal Berakhir -->
                    <div>
                        <label for="tgl_berakhir" class="block text-gray-700 font-bold mb-2">Tanggal Berakhir</label>
                        <input type="datetime-local" id="tgl_berakhir" name="event_berakhir"
                            value="{{ $event->event_berakhir }}"
                            class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                    </div>
                    <!-- Gambar Event -->
                    <div>
                        <form class="max-w-lg">

                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="user_avatar">Upload Gambar Event</label>
                            <div class="flex space-x-2">

                                <input
                                    class="block w-full text-sm text-gray-900 border border-slate-500 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none "
                                    aria-describedby="user_avatar_help" id="img" name="img" type="file">
                                <div class="flex">
                                    <div data-modal-target="modal-gambar-event" data-modal-toggle="modal-gambar-event"
                                        class="font-medium shadow-md shadow-gray-600 hover:bg-[#3F6A6B] text-white py-2 px-4 bg-[#4F7F81] rounded-xl">
                                        Detail
                                    </div>
                                </div>
                            </div>

                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A
                                profile
                                picture is useful to confirm your are logged into your account</div>


                        </form>
                    </div>
                    <!-- Submit Button -->
                    <div class="flex pt-4">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="modal-gambar-event" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto fixed top-0 right-0 left-0 z-50  justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full  max-w-2xl xl:max-w-5xl max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow dark:bg-gray-700 bg-[#4F7F81]">
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <div class="">
                        @if ($event->img)
                            <img src="{{ asset('storage/' . $event->img) }}" class="object-cover " alt="Gambar">
                        @else
                            <p>Tidak ada gambar yang tersedia.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layadmin>
