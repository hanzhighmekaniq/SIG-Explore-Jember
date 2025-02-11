{{-- pacifico-regular --}}
<x-layout>
    <div class="bg-white h-auto w-full">

        <div class="container m-auto px-4">
            <!-- Title Section -->
            <div class="m-auto w-auto text-center pt-28 pb-10 text-6xl">
                <p class="pb-4 text-center font-extrabold xl:text-xl text-lime-800 text-base leading-7 text-primary">
                    WISATA</p>
                <p class="pacifico-regular text-5xl text-[#656D4A] ">Visit Jember</p>
            </div>

            <div class="flex justify-end items-center space-x-4 py-4 ">
                <form action="{{ route('wisata.pengunjung') }}" method="GET"
                    class="md:flex space-y-2 md:space-y-0 md:space-x-2 items-center">
                    <!-- Dropdown Kategori -->
                    <select name="id_kategori" id="id_kategori" class="px-4 py-2 border rounded-md text-xs">
                        <option value="">Semua Kategori</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}"
                                {{ request('id_kategori') == $kategori->id ? 'selected' : '' }}>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Dropdown Kategori Detail (will be populated dynamically) -->
                    <select name="id_kategori_detail" id="id_kategori_detail"
                        class="px-4 py-2 border rounded-md text-xs">
                        <option value="">Semua Sub Kategori</option>
                        @foreach ($kategorisDetail as $kategoriDetail)
                            <option value="{{ $kategoriDetail->id }}"
                                {{ request('id_kategori_detail') == $kategoriDetail->id ? 'selected' : '' }}>
                                {{ $kategoriDetail->nama_kategori_detail }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Input Nama Wisata -->
                    <input type="text" name="nama_wisata" placeholder="Cari nama wisata"
                        value="{{ request('nama_wisata') }}" class="px-4 py-2 border rounded-md text-xs">

                    <button type="submit" class="px-4 py-2 bg-[#414833] text-white rounded-md text-xs">Cari</button>
                </form>
            </div>

            <!-- Grid of Items or Empty Message -->
            <div class="pb-10">
                @if ($wisata->isEmpty())
                    <div class="text-center text-slate-500 text-xl py-28 border border-slate-300 rounded-xl">
                        <p class="uppercase font-bold">Wisata kosong</p>
                    </div>
                @else
                    <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8">
                        @foreach ($wisata as $item)
                            <div class="space-y-2 flex justify-between flex-col h-auto w-auto border border-slate-500 p-4 rounded-lg">
                                <div>

                                    <img class="object-cover w-full aspect-[1080/540] rounded-lg"
                                        src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/placeholder.png') }}"
                                        alt="{{ $item->nama_wisata }}" />

                                    <div class="w-auto h-auto">
                                        <p class="text-black font-bold text-xl">{{ $item->nama_wisata }}</p>
                                        <p class="text-black text-sm">
                                            {{ $item->kategori_detail->nama_kategori_detail ?? 'Kategori Tidak Tersedia' }}
                                            {{ $item->kategori_detail->kategori->nama_kategori ?? 'Kategori Tidak Tersedia' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex w-full">
                                    <a href="{{ route('profilWisata.index', $item->nama_wisata) }}"
                                        class="w-full text-center bg-[#414833] text-white rounded-lg py-2 mt-4">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="pt-10">

                    {{ $wisata->links() }}
                </div>

            </div>

            <script>
                document.getElementById('id_kategori').addEventListener('change', function() {
                    let kategoriId = this.value;
                    let subKategoriSelect = document.getElementById('id_kategori_detail');

                    if (kategoriId) {
                        // Mengirim request untuk mendapatkan subkategori berdasarkan kategori
                        fetch(`/get-kategori-details/${kategoriId}`)
                            .then(response => response.json())
                            .then(data => {
                                subKategoriSelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';
                                data.forEach(kategoriDetail => {
                                    subKategoriSelect.innerHTML +=
                                        `<option value="${kategoriDetail.id}">${kategoriDetail.nama_kategori_detail}</option>`;
                                });
                            });
                    } else {
                        subKategoriSelect.innerHTML = '<option value="">Pilih Sub Kategori</option>';
                    }
                });
            </script>
        </div>
    </div>
</x-layout>
