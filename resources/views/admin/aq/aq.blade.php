<div>
                        <!-- Judul "Tentang" -->
                        <p class="text-3xl font-semibold castoro-regular mb-4">Tentang</p>

                        <!-- Deskripsi Wisata -->
                        <p class="text-lg font-serif mb-6 leading-relaxed text-justify" style="text-indent: 2rem;">
                            {{ $wisata->deskripsi_wisata }}
                        </p>

                        <!-- Informasi Wisata (Sejajar & Sama dengan "Tentang") -->
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Lokasi</p>
                            <p>: {{ $wisata->lokasi }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Kategori</p>
                            <p>: {{ $wisata->kategori_detail->kategori->nama_kategori }},
                                {{ $wisata->kategori_detail->nama_kategori_detail }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Fasilitas</p>
                            <p>: {{ $wisata->fasilitas }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">HTM</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Parkir</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                    </div>

                    <!-- Tombol Rute Terdekat -->
                    <div class="mt-6 w-full flex justify-end">
                        <a href="{{ route('ruteTerdekat.index', $wisata->nama_wisata) }}"
                            class="px-6 w-full py-2 text-center rounded-lg bg-slate-300 shadow-md shadow-slate-400 hover:bg-slate-400 transition"
                            target="_blank">
                            Rute Terdekat
                        </a>
                    </div>











                    <div>
                        <!-- Judul "Tentang" -->
                        <p class="text-3xl font-semibold castoro-regular mb-4">Tentang</p>

                        <!-- Deskripsi Wisata -->
                        <p class="text-lg font-serif mb-6 leading-relaxed text-justify" style="text-indent: 2rem;">
                            {{ $wisata->deskripsi_wisata }}
                        </p>

                        <!-- Informasi Wisata (Sejajar & Sama dengan "Tentang") -->
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Lokasi</p>
                            <p>: {{ $wisata->lokasi }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Kategori</p>
                            <p>: {{ $wisata->kategori_detail->kategori->nama_kategori }},
                                {{ $wisata->kategori_detail->nama_kategori_detail }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Fasilitas</p>
                            <p>: {{ $wisata->fasilitas }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">HTM</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-2">
                            <p class="font-semibold">Parkir</p>
                            <p>: {{ $wisata->htm_wisata }}</p>
                        </div>
                    </div>

                    <!-- Tombol Rute Terdekat -->
                    <div class="mt-6 w-full flex justify-end">
                        <a href="{{ route('ruteTerdekat.index', $wisata->nama_wisata) }}"
                            class="px-6 w-full py-2 text-center rounded-lg bg-slate-300 shadow-md shadow-slate-400 hover:bg-slate-400 transition"
                            target="_blank">
                            Rute Terdekat
                        </a>
                    </div>
{{-- <select name="id_kategori" id="id_kategori" class="px-4 py-2 border rounded-md text-xs">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ request('id_kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select> --}}

                    <!-- Dropdown Kategori Detail (will be populated dynamically) -->
                    {{-- <select name="id_kategori_detail" id="id_kategori_detail"
                        class="px-4 py-2 border rounded-md text-xs">
                        <option value="">Semua Sub Kategori</option>
                        @foreach ($kategorisDetail as $kategoriDetail)
                            <option value="{{ $kategoriDetail->id }}"
                                {{ request('id_kategori_detail') == $kategoriDetail->id ? 'selected' : '' }}>
                                {{ $kategoriDetail->nama_kategori_detail }}
                            </option>
                        @endforeach
                    </select> --}}
