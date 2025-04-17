<x-layadmin>
    <div class="mx-auto bg-white py-4 rounded-lg">
        <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Tampilkan Error --}}
            @if ($errors->any())
                <div class="bg-red-500 text-white p-4 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Pilih Wisata --}}
            <div class="mb-4">
                <label for="id_wisata" class="block mb-1 font-poppins">Pilih Wisata</label>
                <select name="id_wisata" id="id_wisata" class="w-full border p-2 rounded font-poppins" required>
                    <option value="">-- Pilih Disini --</option>
                    @foreach ($DataWisata as $kategoris)
                        <option value="{{ $kategoris->id }}" {{ old('id_wisata') == $kategoris->id ? 'selected' : '' }}>
                            {{ $kategoris->nama_wisata }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Wrapper Kuliner --}}
            <div id="kuliner-wrapper">
                @php $oldKuliner = old('nama_kuliner') ?? ['']; @endphp
                @foreach ($oldKuliner as $i => $nama)
                    <div class="kuliner-item border p-4 rounded mb-4">
                        {{-- Nama Kuliner --}}
                        <div class="mb-2 font-poppins">
                            <label>Nama Kuliner</label>
                            <input type="text" name="nama_kuliner[]" value="{{ old('nama_kuliner.' . $i) }}"
                                class="w-full border p-2 rounded" required>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-2 font-poppins">
                            <label>Deskripsi Kuliner</label>
                            <textarea name="deskripsi_kuliner[]" class="w-full border p-2 rounded"
                                required>{{ old('deskripsi_kuliner.' . $i) }}</textarea>
                        </div>

                        {{-- No HP --}}
                        <div class="mb-2 font-poppins">
                            <label class="block text-sm">No. HP</label>
                            <input type="tel" name="no_hp[]" value="{{ old('no_hp.' . $i) }}"
                                class="w-full border p-2 rounded" required placeholder="+6281234567890">
                        </div>

                        {{-- Jam Operasional --}}
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-poppins">Jam Operasional</label>
                            <div
                                class="jam-operasional-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 font-poppins">
                                @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $j => $hari)
                                    <div class="border-2 border-slate-500 p-3 rounded-lg bg-gray-50 relative">
                                        <label class="block text-sm font-semibold mb-1">{{ ucfirst($hari) }}</label>
                                        <input type="hidden" name="jam_operasional[{{ $i }}][{{ $j }}][hari]"
                                            value="{{ $hari }}">
                                        <div class="flex gap-2 time-inputs">
                                            <input type="time" name="jam_operasional[{{ $i }}][{{ $j }}][buka]"
                                                value="{{ old("jam_operasional.$i.$j.buka") }}"
                                                class="w-full p-2 border rounded text-sm font-poppins waktu-input"
                                                onchange="updateJamDisplay(this)">
                                            <input type="time" name="jam_operasional[{{ $i }}][{{ $j }}][tutup]"
                                                value="{{ old("jam_operasional.$i.$j.tutup") }}"
                                                class="w-full p-2 border rounded text-sm font-poppins waktu-input"
                                                onchange="updateJamDisplay(this)">
                                        </div>
                                        <div class="jam-display hidden text-sm font-semibold mt-1 text-center">24 Jam</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Gambar --}}
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <div>
                                <label class="font-poppins">Gambar Kuliner</label>
                                <input type="file" name="gambar_kuliner[]" class="w-full border p-2 font-poppins">
                            </div>
                            <div>
                                <label class="font-poppins">Gambar Menu</label>
                                <input type="file" name="gambar_menu[{{ $i }}][]" class="w-full border p-2 font-poppins"
                                    multiple>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="button"
                                class="btn-hapus bg-red-500 text-white px-3 py-1 rounded mt-2 font-poppins hover:bg-red-700">Hapus</button>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" id="tambah-kuliner"
                class="font-poppins w-full px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition-all">+
                Tambah Kuliner</button>

            <div class="mt-6">
                <button type="submit"
                    class="font-poppins px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition-all">Simpan</button>
            </div>
        </form>
    </div>

    {{-- SCRIPT --}}
    <script>
        let index = {{ count($oldKuliner) }};

        function updateJamDisplay(inputElement) {
            const parentDiv = inputElement.closest('.border-2');
            const bukaInput = parentDiv.querySelector('input[name*="[buka]"]');
            const tutupInput = parentDiv.querySelector('input[name*="[tutup]"]');
            const timeInputs = parentDiv.querySelector('.time-inputs');
            const jamDisplay = parentDiv.querySelector('.jam-display');

            if (bukaInput.value === '00:00' && tutupInput.value === '00:00') {
                timeInputs.classList.add('hidden');
                jamDisplay.classList.remove('hidden');
            } else {
                timeInputs.classList.remove('hidden');
                jamDisplay.classList.add('hidden');
            }
        }

        document.querySelectorAll('.waktu-input').forEach(input => {
            input.addEventListener('change', function () {
                updateJamDisplay(this);
            });
        });

        document.getElementById('tambah-kuliner').addEventListener('click', function () {
            const wrapper = document.getElementById('kuliner-wrapper');
            const original = document.querySelector('.kuliner-item');
            const clone = original.cloneNode(true);

            clone.querySelectorAll('input[type="text"], textarea, input[type="tel"], input[type="time"]').forEach(input => input.value = '');
            clone.querySelectorAll('input[type="file"]').forEach(input => input.value = '');

            clone.querySelectorAll('input[name^="jam_operasional"]').forEach(input => {
                input.name = input.name.replace(/jam_operasional\[\d+\]/, `jam_operasional[${index}]`);
            });

            const menuInput = clone.querySelector('input[name^="gambar_menu"]');
            if (menuInput) {
                menuInput.name = `gambar_menu[${index}][]`;
            }

            clone.querySelectorAll('.time-inputs').forEach(el => el.classList.remove('hidden'));
            clone.querySelectorAll('.jam-display').forEach(el => el.classList.add('hidden'));

            wrapper.appendChild(clone);
            index++;
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btn-hapus')) {
                const items = document.querySelectorAll('.kuliner-item');
                if (items.length > 1) {
                    e.target.closest('.kuliner-item').remove();
                }
            }
        });
    </script>
</x-layadmin>