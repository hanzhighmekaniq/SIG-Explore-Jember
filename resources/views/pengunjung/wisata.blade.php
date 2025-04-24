{{-- pacifico-regular --}}
<x-layout>
    <div class="bg-[#f3f3f3] h-auto w-full">
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                let elements = document.querySelectorAll("#wisataScroll");

                let observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.remove("opacity-0", "translate-y-10");
                        }
                    });
                }, {
                    threshold: 0.2
                });

                elements.forEach((el) => observer.observe(el));
            });
        </script>
        <div id="wisataScroll" class="container m-auto px-4 opacity-0 translate-y-10 transition-all duration-[1500ms]">
            <!-- Title Section -->
            <div class="w-auto pt-20 pb-10 m-auto text-6xl text-center lg:pt-28 ">
                <p
                    class="pb-4 text-center font-bold lg:font-extrabold xl:text-xl text-[#004165] text-lg leading-7 text-primary font-montserrat">
                    WISATA</p>
                <p class="pacifico-regular text-5xl text-[#004165] ">Kabupaten Jember </p>
            </div>

            <div class="flex items-center justify-center pt-4 pb-8 space-x-4 ">
                <form action="{{ route('wisata.pengunjung') }}" method="GET"
                    class="items-center gap-2 space-y-4 lg:space-y-0 lg:flex">

                    <div class="flex flex-wrap items-center justify-center gap-2">
                        <!-- Tombol "Semua" -->
                        <a href="{{ route('wisata.pengunjung') }}"
                            class="px-4 py-2 rounded-full text-sm shadow-md shadow-gray-400 transition-all duration-500 ease-in-out font-poppins
                                {{ !request('id_kategori') ? 'bg-white border border-[#006495] text-[#006495] font-bold' : 'bg-gray-200 text-gray-500' }}
                                hover:bg-gray-200 hover:text-[#006495] hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Semua
                        </a>

                        <!-- Tombol Kategori -->
                        @foreach ($kategoris as $kategori)
                            <a href="{{ route('wisata.pengunjung', ['id_kategori' => $kategori->id]) }}"
                                class="px-4 py-2 rounded-full text-sm shadow-md shadow-gray-400 transition-all duration-500 ease-in-out font-poppins
                                    {{ request('id_kategori') == $kategori->id ? 'bg-white border border-[#006495] text-[#006495] font-bold' : 'bg-gray-200 text-gray-500' }}
                                    hover:bg-gray-200 hover:text-[#006495] hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                {{ $kategori->nama_kategori }}
                            </a>
                        @endforeach
                    </div>

                    <!-- Input Pencarian dengan Tombol -->
                    <div class="flex items-center overflow-hidden rounded-full shadow-md shadow-gray-400">
                        <!-- Input Pencarian -->
                        <input type="text" name="nama_wisata" placeholder="Cari nama wisata"
                            value="{{ request('nama_wisata') }}"
                            class="w-full px-4 py-2 text-sm bg-white border-none rounded-l-full focus:outline-none font-poppins placeholder-[#006495] font-bold  text-[#006495]">

                        <!-- Tombol "Cari" -->
                        <button type="submit"
                            class="px-4 py-2 bg-[#006495] text-white text-sm rounded-r-full
                                       transition-all duration-500 ease-in-out font-poppins
                                       hover:bg-[#004165] hover:scale-105 hover:shadow-lg transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                            Cari
                        </button>
                    </div>

                </form>

            </div>

            <!-- Grid of Items or Empty Message -->
            <div class="pb-10">
                @if ($wisata->isEmpty())
                    <div class="text-xl text-center border text-slate-500 py-28 border-slate-300 rounded-xl">
                        <p class="font-bold uppercase font-poppins">Wisata kosong</p>
                    </div>
                @else
                    <div class="grid grid-cols-2 gap-2 xl:grid-cols-5 md:grid-cols-2 xl:gap-6">
                        @foreach ($wisata as $item)
                            <a href="{{ route('profilWisata.index', $item->nama_wisata) }}"
                                class="flex flex-col justify-between w-auto h-auto transition-all transition-transform duration-200 duration-300 ease-in-out transform bg-white shadow-md lg:shadow-xl shadow-slate-400 border-slate-500 rounded-xl hover:scale-105 hover:shadow-2xl hover:shadow-slate-400 hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                <div>

                                    <img class="object-cover w-full aspect-[1080/540] rounded-t-xl"
                                        src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/placeholder.png') }}"
                                        alt="{{ $item->nama_wisata }}" />

                                    <div class="w-auto h-auto px-4 pt-2 pb-4">
                                        <p class="text-[#004165] font-bold text-sm xl:text-xl font-fjalla uppercase">
                                            {{ $item->nama_wisata }}</p>
                                        <p class="text-xs text-gray-500 lg:text-sm font-poppins">
                                            {{ $item->kategori_detail->nama_kategori_detail ?? 'Kategori Tidak Tersedia' }}
                                            {{ $item->kategori_detail->kategori->nama_kategori ?? 'Kategori Tidak Tersedia' }}
                                        </p>
                                    </div>
                                </div>

                                <div class="flex w-full">
                                    {{-- <a href="{{ route('profilWisata.index', $item->nama_wisata) }}"
                                    class="w-full text-center bg-[#414833] text-white rounded-lg py-2 mt-4">
                                    Lihat Detail
                                </a> --}}
                                </div>
                            </a>
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
