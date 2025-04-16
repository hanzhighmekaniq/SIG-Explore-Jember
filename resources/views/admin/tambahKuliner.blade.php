    <x-layadmin>

        <div class=" mx-auto bg-white py-4 rounded-lg">

            <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Pilih Wisata --}}
                <div class="mb-4">
                    <label for="id_wisata" class="block mb-1 font-poppins">Pilih Wisata</label>
                    <select name="id_wisata" id="id_wisata" class="w-full border p-2 rounded font-poppins" required>
                        <option value="" class="font-poppins">-- Pilih Disini --</option>
                        @foreach ($DataWisata as $kategoris)
                            <option value="{{ $kategoris->id }}" class="font-poppins">{{ $kategoris->nama_wisata }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Wrapper Kuliner --}}
                <div id="kuliner-wrapper">
                    <div class="kuliner-item border p-4 rounded mb-4">
                        <div class="mb-2 font-poppins">
                            <label>Nama Kuliner</label>
                            <input type="text" name="nama_kuliner[]" class="w-full border p-2 rounded" required>
                        </div>
                        <div class="mb-2 font-poppins">
                            <label>Deskripsi Kuliner</label>
                            <textarea name="deskripsi_kuliner[]" class="w-full border p-2 rounded" required></textarea>
                        </div>
                        <div class="mb-2 font-poppins">
                            <label class="block text-sm">No. HP</label>
                            <input type="tel" name="no_hp[]" class="w-full border p-2 rounded" required placeholder="+6281234567890">

                        </div>

                        {{-- Jam Operasional --}}
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-poppins">Jam Operasional</label>
                            <div class="jam-operasional-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 font-poppins">
                                @foreach (['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'] as $index => $hari)
                                    <div class="border-2 border-slate-500 p-3 rounded-lg bg-gray-50">
                                        <label class="block text-sm font-semibold mb-1">{{ ucfirst($hari) }}</label>
                                        <input type="hidden" name="jam_operasional[0][{{ $index }}][hari]" value="{{ $hari }}">
                                        <div class="flex gap-2">
                                            <input type="time" name="jam_operasional[0][{{ $index }}][buka]" class="w-full p-2 border rounded text-sm font-poppins">
                                            <input type="time" name="jam_operasional[0][{{ $index }}][tutup]" class="w-full p-2 border rounded text-sm font-poppins">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                            <div>
                                <label class="font-poppins">Gambar Kuliner</label>
                                <input type="file" name="gambar_kuliner[]" class="w-full border p-2 font-poppins" required>
                            </div>
                            <div>
                                <label class="font-poppins">Gambar Menu</label>
                                <input type="file" name="gambar_menu[0][]" class="w-full border p-2 font-poppins" multiple>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="btn-hapus bg-red-500 text-white px-3 py-1 rounded mt-2 font-poppins hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all
                            duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">Hapus</button>
                        </div>
                    </div>
                </div>

                <button type="button" id="tambah-kuliner" class="font-poppins w-full px-6 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none
                focus:ring-2 focus:ring-blue-300 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">+ Tambah Kuliner</button>

                <div class="mt-6">
                    <button type="submit" class="font-poppins px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all
                            duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">Simpan</button>
                </div>
            </form>
            <script>
                let index = 1;

                document.getElementById('tambah-kuliner').addEventListener('click', function () {
                    const wrapper = document.getElementById('kuliner-wrapper');
                    const original = document.querySelector('.kuliner-item');
                    const clone = original.cloneNode(true);

                    // Kosongkan semua input & textarea
                    clone.querySelectorAll('input[type="text"], textarea').forEach(input => input.value = '');
                    clone.querySelectorAll('input[type="time"]').forEach(input => input.value = '');
                    clone.querySelectorAll('input[type="file"]').forEach(input => input.value = '');

                    // Perbarui name untuk jam_operasional
                    clone.querySelectorAll('input[name^="jam_operasional"]').forEach(input => {
                        input.name = input.name.replace(/^jam_operasional\[0\]/, `jam_operasional[${index}]`);
                    });

                    // Perbarui name untuk gambar_menu
                    const menuInput = clone.querySelector('input[name^="gambar_menu"]');
                    if (menuInput) {
                        menuInput.name = `gambar_menu[${index}][]`;
                    }

                    wrapper.appendChild(clone);
                    index++;
                });

                // Hapus kuliner item (kecuali yang pertama)
                document.addEventListener('click', function (e) {
                    if (e.target.classList.contains('btn-hapus')) {
                        const items = document.querySelectorAll('.kuliner-item');
                        if (items.length > 1) {
                            e.target.closest('.kuliner-item').remove();
                        }
                    }
                });
            </script>



        </div>
    </x-layadmin>
