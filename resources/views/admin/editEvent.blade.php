<x-layadmin>
    <div class="mx-auto bg-white py-4 rounded-lg">
        <div class="grid gap-4 flex-wrap">
            <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="space-y-4">

                    <!-- Pilihan Event -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        <div>
                            <label for="is_temporer" class="font-poppins block text-gray-700 font-bold mb-2">
                                Jenis Event
                            </label>
                            <select id="is_temporer" name="is_temporer"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                <option value="1"
                                    {{ old('is_temporer', $event->is_temporer) == 1 ? 'selected' : '' }}>
                                    Event Temporer 1
                                </option>
                                <option value="0"
                                    {{ old('is_temporer', $event->is_temporer) == 0 ? 'selected' : '' }}>
                                    Event Permanen 0
                                </option>
                            </select>
                        </div>
                        <div>
                            <label for="id_wisata" class="font-poppins block text-gray-700 font-bold mb-2">
                                Pilih Wisata Untuk Menambah Event
                            </label>
                            <select id="id_wisata" name="id_wisata"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                                <option value="" disabled hidden>Pilih Wisata</option>
                                @foreach ($wisata as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('id_wisata', $event->id_wisata) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_wisata }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Nama Event -->
                    <div>
                        <label for="nama_event" class="font-poppins block text-gray-700 font-bold mb-2">
                            Nama Event
                        </label>
                        <input type="text" id="nama_event" name="nama_event"
                            value="{{ old('nama_event', $event->nama_event) }}"
                            class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan nama event" required>
                    </div>

                    <!-- Deskripsi Event -->
                    <div>
                        <label for="deskripsi_event" class="font-poppins block text-gray-700 font-bold mb-2">
                            Deskripsi Event
                        </label>
                        <textarea id="deskripsi_event" name="deskripsi_event"
                            class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan deskripsi event" required>{{ old('deskripsi_event', $event->deskripsi_event) }}</textarea>
                    </div>

                    <!-- HTM Event -->
                    <div>
                        <label for="htm_event" class="font-poppins block text-gray-700 font-bold mb-2">
                            HTM Event
                        </label>
                        <input type="number" id="htm_event" name="htm_event" step="0.01"
                            value="{{ old('htm_event', $event->htm_event) }}"
                            class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Harga tiket masuk" required>
                    </div>

                    <!-- Toggle Script -->
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const select = document.getElementById('is_temporer');
                            const tglMulai = document.getElementById('tgl_mulai_container');
                            const tglBerakhir = document.getElementById('tgl_berakhir_container');
                            const jadwalMingguan = document.getElementById('jadwal_mingguan_container');

                            function toggleFields() {
                                let isTemporer = select.value == "1";
                                tglMulai.classList.toggle('hidden', !isTemporer);
                                tglBerakhir.classList.toggle('hidden', !isTemporer);
                                jadwalMingguan.classList.toggle('hidden', isTemporer);
                            }

                            select.addEventListener('change', toggleFields);
                            toggleFields();
                        });
                    </script>

                    <!-- Jadwal Mingguan -->
                    <div id="jadwal_mingguan_container" class="hidden">
                        <label class="font-poppins block text-gray-700 font-bold mb-2">Jadwal Mingguan</label>
                        @php
                            $hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                            $oldJadwal = old('jadwal', json_decode($event->jadwal_mingguan, true) ?? []);
                        @endphp
                        @foreach ($hari as $h)
                            <div class="mb-2">
                                <label class="block font-poppins">{{ $h }}</label>
                                <div class="flex gap-2">
                                    <input type="time" name="jadwal[{{ $h }}][mulai]"
                                        value="{{ $oldJadwal[$h]['mulai'] ?? '' }}"
                                        class="border rounded px-2 py-1 w-full">
                                    <input type="time" name="jadwal[{{ $h }}][akhir]"
                                        value="{{ $oldJadwal[$h]['akhir'] ?? '' }}"
                                        class="border rounded px-2 py-1 w-full">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tanggal Mulai dan Berakhir -->
                    <div class="flex gap-4">
                        <div id="tgl_mulai_container" class="flex-1">
                            <label for="tgl_mulai" class="font-poppins block text-gray-700 font-bold mb-2">
                                Tanggal Mulai
                            </label>
                            <input type="datetime-local" id="tgl_mulai" name="event_mulai"
                                value="{{ old('event_mulai', $event->event_mulai ? date('Y-m-d\TH:i', strtotime($event->event_mulai)) : '') }}"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        </div>

                        <div id="tgl_berakhir_container" class="flex-1">
                            <label for="tgl_berakhir" class="font-poppins block text-gray-700 font-bold mb-2">
                                Tanggal Berakhir
                            </label>
                            <input type="datetime-local" id="tgl_berakhir" name="event_berakhir"
                                value="{{ old('event_berakhir', $event->event_berakhir ? date('Y-m-d\TH:i', strtotime($event->event_berakhir)) : '') }}"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                        </div>
                    </div>

                    <!-- Upload Gambar -->
                    <div>
                        <div class="max-w-full">
                            <label class="font-poppins block mb-2 text-sm font-medium text-gray-900" for="img">
                                Upload Gambar Event
                            </label>
                            <input
                                class="font-poppins block w-full text-sm text-gray-900 border focus:border-blue-300 border-black rounded-lg cursor-pointer focus:outline-none"
                                aria-describedby="img_help" id="img" name="img" type="file"
                                accept="image/*" onchange="previewImage(event)">
                            <div class="font-poppins mt-1 text-sm text-gray-500" id="img_help">
                                Pastikan ukuran gambar landscape
                            </div>
                        </div>

                        <div class="pt-4">
                            <p class="text-sm mb-2 font-semibold">Preview Gambar:</p>
                            <img id="img_preview" src="{{ $event->img ? asset('storage/' . $event->img) : '#' }}"
                                class="w-full max-w-xs rounded-lg {{ $event->img ? '' : 'hidden' }}">
                        </div>

                        <script>
                            function previewImage(event) {
                                const output = document.getElementById('img_preview');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                output.classList.remove('hidden');
                            }
                        </script>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex mt-4">
                        <button type="submit"
                            class="font-poppins px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Simpan
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</x-layadmin>
