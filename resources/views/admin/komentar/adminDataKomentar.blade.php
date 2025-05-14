<x-layadmin>
    <div class="lg:flex space-y-2 lg:space-y-0 lg:justify-between lg:items-center">
        <!-- Kiri: Judul -->
<!--        <div class="flex items-center space-x-3">
            <p class="font-semibold text-3xl font-poppins text-blue-800">
                Data Komentar
            </p>
        </div> -->

        <!-- Kanan: Form Pencarian -->
        <div class="flex lg:justify-end">
            @if (request()->routeIs('komentar.index'))
                <form class="flex max-w-lg w-full" method="GET" action="{{ route('komentar.index') }}">
                    <!-- Dropdown Wisata -->
                    <select name="id_wisata" id="id_wisata"
                        class="font-poppins h-full px-4 py-2 text-xs border border-gray-300 rounded-l-md
                            focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Wisata</option>
                        @foreach ($wisata as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_wisata }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Input Nama Pengguna -->
                    <input type="text" name="nama_pengguna" placeholder="Cari Nama Pengguna"
                        value="{{ request('nama_pengguna') }}"
                        class="font-poppins h-full px-4 py-2 text-xs border-t border-b border-gray-300
                            focus:ring-blue-500 focus:border-blue-500" />

                    <!-- Button Cari -->
                    <button type="submit"
                        class="font-poppins h-full px-4 py-2 text-xs text-white bg-blue-600 border-l-0 border border-gray-300
                                rounded-r-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                                transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                        Cari
                    </button>
                </form>
            @endif
        </div>
    </div>

    {{-- TABEL --}}
    <div class="relative overflow-x-auto sm:rounded-lg py-2">
        <table class="font-poppins w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                <tr>
                    <th scope="col" class="px-6 py-3 font-poppins">No</th>
                    <th scope="col" class="px-6 py-3 font-poppins">Nama Wisata</th>
                    <th scope="col" class="px-6 py-3 font-poppins">Jumlah Komentar</th>
                    <th scope="col" class="px-2 py-3 flex justify-center font-poppins">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wisatas as $index => $wisata)
                    <tr class="odd:bg-white even:bg-gray-50 border-b font-poppins">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4 uppercase">
                            {{ $wisata->nama_wisata }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $wisata->komentar_count }} Komentar
                        </td>
                        <td class="px-2 py-4 flex justify-center">
                            <a href="{{ route('admin.komentar.show', $wisata->id) }}"
                                class="text-white bg-blue-600 hover:bg-blue-700 font-medium rounded-lg text-sm px-4 py-2 text-center transition duration-300 ease-in-out">
                                <i class="fas fa-comment mr-2"></i>Lihat Komentar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $wisatas->links() }}
    </div>
</x-layadmin>
