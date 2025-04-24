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
            <div class="m-auto w-auto text-center pt-20 lg:pt-28 pb-10 text-6xl ">
                <p
                    class="pb-4 text-center font-bold lg:font-extrabold xl:text-xl text-[#004165] text-lg leading-7 text-primary font-montserrat">
                    WISATA</p>
                <p class="pacifico-regular text-5xl text-[#004165] ">Kabupaten Jember </p>
            </div>

            <div class="flex justify-center items-center space-x-4 pt-4 pb-8 ">
                <form action="{{ route('wisata.pengunjung') }}" method="GET"
                    class="space-y-4 lg:space-y-0 lg:flex gap-2 items-center">

                    <div class="items-center justify-center flex flex-wrap gap-2">
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
                    <div class="flex items-center shadow-md shadow-gray-400 rounded-full overflow-hidden">
                        <!-- Input Pencarian -->
                        <input type="text" name="nama_wisata" placeholder="Cari nama wisata"
                            value="{{ request('nama_wisata') }}"
                            class="px-4 py-2 w-full text-sm rounded-l-full bg-white focus:outline-none border-none font-poppins">

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
                    <div class="text-center text-slate-500 text-xl py-28 border border-slate-300 rounded-xl">
                        <p class="uppercase font-bold font-poppins">Wisata kosong</p>
                    </div>
                @else
                    <div class="grid xl:grid-cols-5 md:grid-cols-2 grid-cols-2 gap-2 xl:gap-6">
                        @foreach ($wisata as $item)
                            <a href="{{ route('profilWisata.index', $item->nama_wisata) }}"
                                class="shadow-md lg:shadow-xl shadow-slate-400 bg-white flex justify-between flex-col h-auto w-auto border-slate-500 rounded-xl
                                   transition-transform duration-300 ease-in-out transform hover:scale-105 hover:shadow-2xl hover:shadow-slate-400 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                <div>

                                    <img class="object-cover w-full aspect-[1080/540] rounded-t-xl"
                                        src="{{ $item->img ? asset('storage/' . $item->img) : asset('images/placeholder.png') }}"
                                        alt="{{ $item->nama_wisata }}" />

                                    <div class="w-auto h-auto pt-2 px-4 pb-4">
                                        <p class="text-[#004165] font-bold text-sm xl:text-xl font-fjalla uppercase">{{ $item->nama_wisata }}</p>
                                        <p class="text-gray-500 text-xs lg:text-sm font-poppins">
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
