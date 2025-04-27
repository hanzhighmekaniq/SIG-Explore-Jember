<x-layadmin>


    <div class="bg-white rounded-lg ">

        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-4">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label for="is_temporer" class="block text-gray-700 font-bold mb-2">Jenis Event</label>
                        <select id="is_temporer" name="is_temporer"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                            <option value="1">Event Temporer 1</option>
                            <option value="0">Event Permanen 0</option>
                        </select>
                    </div>


                    <div>
                        <label for="id_wisata" class="block text-gray-700 font-bold mb-2">Pilih Wisata untuk
                            Menambah Event</label>
                        <select id="id_wisata" name="id_wisata"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                            <option selected="">Pilih Wisata</option>
                            @foreach ($DataWisata as $wisata)
                                <option value="{{ $wisata->id }}">{{ $wisata->nama_wisata }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div>
                    <label for="nama_event" class="block text-gray-700 font-bold mb-2">Nama Event</label>
                    <input type="text" id="nama_event" name="nama_event"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Masukkan nama event" required>
                </div>

                <div>
                    <label for="deskripsi_event" class="block text-gray-700 font-bold mb-2">Deskripsi Event</label>
                    <textarea id="deskripsi_event" name="deskripsi_event"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Masukkan deskripsi event"></textarea>
                </div>

                <div>
                    <label for="htm_event" class="block text-gray-700 font-bold mb-2">HTM Event</label>
                    <input type="text" id="htm_event" name="htm_event" step="0.01"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Harga tiket masuk" required>
                </div>

                <div class="hidden" id="jadwal_mingguan_container">
                    <label class="block text-gray-700 font-bold mb-2">Jadwal Mingguan</label>
                    @php
                        $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    @endphp
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

                        @foreach ($hari as $h)
                            <div class="mb-2">
                                <label class="block">{{ $h }}</label>
                                <div class="flex gap-2">
                                    <div class="relative flex-1">
                                        <input type="time" name="jadwal[{{ $h }}][mulai]"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm1 11h3a1 1 0 100-2h-2V7a1 1 0 10-2 0v5a1 1 0 001 1z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="relative flex-1">
                                        <input type="time" name="jadwal[{{ $h }}][akhir]"
                                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                                        <div
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm1 11h3a1 1 0 100-2h-2V7a1 1 0 10-2 0v5a1 1 0 001 1z"
                                                    clip-rule="evenodd" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <script>
                        function toggleEventType() {
                            let isTemporer = document.getElementById('is_temporer').value === "1";

                            // Toggle input temporer
                            document.getElementById('tgl_mulai_container').classList.toggle('hidden', !isTemporer);
                            document.getElementById('tgl_berakhir_container').classList.toggle('hidden', !isTemporer);

                            // Set required
                            document.getElementById('tgl_mulai').required = isTemporer;
                            document.getElementById('tgl_berakhir').required = isTemporer;

                            // Toggle jadwal mingguan
                            document.getElementById('jadwal_mingguan_container').classList.toggle('hidden', isTemporer);
                        }

                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('is_temporer').addEventListener('change', toggleEventType);
                            toggleEventType(); // Panggil langsung pas halaman load
                        });
                    </script>

                </div>
                <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:items-center w-full">
                    <div class="flex-1 w-full" id="tgl_mulai_container">
                        <label for="tgl_mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai</label>
                        <input type="datetime-local" id="tgl_mulai" name="event_mulai"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    </div>

                    <!-- GARIS NYAMPING -->
                    <div class="hidden md:flex flex-col items-center px-4 w-12" id="tgl_mulai_container">
                        <div class="text-white mb-2">Sampai</div>
                        <div class="w-full border-t-2 border-gray-400"></div>
                    </div>

                    <div class="flex-1 w-full" id="tgl_berakhir_container">
                        <label for="tgl_berakhir" class="block text-gray-700 font-bold mb-2">Tanggal Berakhir</label>
                        <input type="datetime-local" id="tgl_berakhir" name="event_berakhir"
                            class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500">
                    </div>
                </div>



                <div>
                    <label for="img" class="block text-gray-700 font-bold mb-2">Upload Gambar Event</label>
                    <input type="file" id="img" name="img"
                        class="block w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                        onchange="previewImage()">
                    <div class="mt-1 text-sm text-gray-500">Pastikan Ukuran Landscape</div>
                    <img id="preview-image" src="" class="mt-2" style="max-height: 300px; max-width: 100%">
                </div>

                <script>
                    function previewImage() {
                        const image = document.querySelector('#img');
                        const imagePreview = document.querySelector('#preview-image');

                        imagePreview.src = URL.createObjectURL(image.files[0]);
                    }
                </script>

                <div class="flex mt-4">
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">Simpan</button>
                </div>
            </div>

        </form>
    </div>
</x-layadmin>
