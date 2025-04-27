<x-layadmin>
    <!-- <p class="font-semibold text-3xl playfair-display-uniquifier pb-4">
        Data Kuliner
    </p> -->
    <div class="lg:flex space-y-2 lg:space-y-0 lg:justify-between lg:items-center">
        <!-- Kiri: Tombol Tambah-Wisata -->
        <div class="flex">
            <a href="{{ route('kuliner.create') }}" id="tambah-data-kuliner"
                class="{{ request()->routeIs('kuliner.create') ? 'bg-blue-600 text-white' : '' }}
                        flex justify-center items-center text-xs font-medium text-gray-900 rounded-lg
                        border border-slate-400 px-4 py-2 hover:bg-blue-600 hover:text-white
                        focus:z-10 focus:ring-2 focus:ring-slate-300 transition-all duration-200 ease-in-out
                        hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Kuliner
            </a>
        </div>

        <!-- Kanan: Form Filter -->
        <div class="flex lg:justify-end">
            @if (request()->routeIs('kuliner.index'))
                <form class="flex max-w-lg w-full" method="GET" action="{{ route('kuliner.index') }}">
                    <!-- Dropdown Kategori -->
                    <select name="id_kategori_detail" id="id_kategori_detail"
                        class="font-poppins h-full px-4 py-2 text-xs border border-gray-300 rounded-l-md
                    focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Semua Sub Kategori</option>
                        @foreach ($kategoriDetails as $item)
                            <option value="{{ $item->id }}"
                                {{ request('id_kategori_detail') == $item->id ? 'selected' : '' }}>
                                {{ $item->nama_kategori_detail }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Input Nama Kuliner -->
                    <input type="text" name="nama_kuliner" placeholder="Cari nama Kuliner"
                        value="{{ request('nama_kuliner') }}"
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
    <div class="relative overflow-x-auto  sm:rounded-lg py-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="font-poppins text-xs text-gray-700 uppercase bg-gray-50  border">
                <tr>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        Kuliner
                    </th>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        Wisata
                    </th>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        Kategori
                    </th>
                    <th scope="col" class="px-6 py-3 font-poppins">
                        Gambar
                    </th>
                    <th scope="col" class="px-2 py-3 flex justify-center font-poppins">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataKuliner as $index => $kuliner)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="font-poppins px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4 font-poppins">
                            {{ $kuliner->nama_kuliner }}
                        </td>
                        <td class="px-6 py-4 font-poppins">
                            {{ Str::limit($kuliner->deskripsi_kuliner, 30) }}
                        </td>
                        <td class="px-6 py-4 font-poppins">
                            {{ optional($kuliner->wisata)->nama_wisata ?? 'Tidak Ada Wisata' }}

                        </td>
                        <td class="px-6 py-4 font-poppins">
                            {{ $kuliner->wisata->kategori_detail->kategori->nama_kategori ?? '-' }}
                            -
                            {{ $kuliner->wisata->kategori_detail->nama_kategori_detail ?? '-' }}

                        </td>




                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $kuliner->gambar_kuliner) }}"
                                class=" object-cover h-32 w-32 rounded-xl">
                        </td>
                        <td class="px-2 py-4 flex justify-center gap-2">
                            <div class="flex justify-center gap-2">
                                <!-- Tombol Edit -->
                                <div class="flex justify-center">
                                    <a href="{{ route('kuliner.edit', $kuliner->id) }}"
                                        class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins font-medium text-blue-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-blue-800 transition duration-300 ease-in-out">
                                        <i class="fas fa-edit mr-2"></i>Edit
                                    </a>
                                </div>
                                <!-- Tombol Delete -->
                                <div class="flex justify-center">
                                    <button
                                        class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins delete-button font-medium text-red-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-red-800 transition duration-300 ease-in-out"
                                        data-modal-target="default-modal-delete-kuliner{{ $kuliner->id }}"
                                        data-modal-toggle="default-modal-delete-kuliner{{ $kuliner->id }}"
                                        id="btn-delete-kuliner">
                                        <i class="fas fa-trash-alt mr-2"></i>Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="">
        {{ $DataKuliner->links() }}
    </div>


    <!-- Modal -->
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow ">
                <button type="button"
                    class="font-poppins absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500  font-poppins">Apakah Anda yakin
                        ingin
                        menghapus data ini?</h3>

                    <!-- Form untuk delete -->
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Iya, Hapus
                        </button>
                        <button type="button" data-modal-hide="popup-modal"
                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                            Batal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal DELETE Kuliner --}}
    @foreach ($DataKuliner as $kuliner)
        <div id="default-modal-delete-kuliner{{ $kuliner->id }}" tabindex="-1"
            class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow ">
                    <button type="button" data-modal-hide="default-modal-delete-kuliner{{ $kuliner->id }}"
                        class="font-poppins absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center "
                        id="close-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="font-poppins mb-5 text-lg font-normal text-gray-500 ">Anda yakin
                            ingin
                            menghapus?</h3>
                        <div class="flex justify-center">
                            <form id="edit-kuliner-form" method="POST"
                                action="{{ route('kuliner.destroy', $kuliner->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300  font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button"
                                id="cancel-logout"data-modal-hide="default-modal-delete-kuliner{{ $kuliner->id }}"
                                class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">
                                Tidak, Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-button');
            const deleteForm = document.getElementById('deleteForm');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const deleteUrl = `/data-kuliner/${id}`;
                    deleteForm.setAttribute('action', deleteUrl);
                });
            });
        });
    </script>


</x-layadmin>
