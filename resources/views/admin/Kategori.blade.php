<x-layadmin>




    <script>
        // Panggil fungsi closeToast setelah 3 detik
        setTimeout(() => {
            closeToast();
        }, 3000);

        function closeToast() {
            // Sembunyikan toast tanpa konfirmasi
            document.getElementById('toast-success').classList.add('hidden');
        }
    </script>

    <div class=" space-y-4">

        {{-- KATEGORI --}}
        <div class="p-4 border border-slate-400 rounded-xl">
            <div class="flex justify-between">

                <button data-modal-target="default-modal-tambah-kategori"
                    data-modal-toggle="default-modal-tambah-kategori"
                    class="flex justify-center items-center text-xs font-medium font-montserrat text-gray-900 rounded-lg
                    px-4 py-2 bg-white hover:bg-blue-600 hover:text-white
                    border border-slate-400 hover:border-blue-600
                    focus:z-10 focus:ring-2 focus:ring-slate-300
                    transition-all duration-200 ease-in-out
                    hover:-translate-y-1 active:translate-y-0 active:scale-95"
                    type="button">

                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Kategori
                </button>
                {{ $DataKategori->links() }}
            </div>

            <div class="relative overflow-x-auto sm:rounded-lg py-2">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-poppins">No</th>
                            <th scope="col" class="px-6 py-3 font-poppins">Kategori</th>
                            <th scope="col" class="px-2 py-3 flex justify-center font-poppins">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($DataKategori as $index => $kategori)
                            <tr class="odd:bg-white even:bg-gray-50 border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $index + 1 }}
                                </th>
                                <td class="px-6 py-4 font-poppins">{{ $kategori->nama_kategori }}</td>
                                <td class="px-2 py-4 flex justify-center gap-2">
                                    <!-- Tombol Edit -->
                                    <button
                                        class="font-poppins edit-button font-medium text-blue-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-blue-800 transition duration-300 ease-in-out"
                                        data-modal-target="default-modal-edit-kategori{{ $kategori->id }}"
                                        data-modal-toggle="default-modal-edit-kategori{{ $kategori->id }}"
                                        id="btn-edit-kategori" data-id_kategori="{{ $kategori->id }}"
                                        data-kategori="{{ $kategori->nama_kategori }}">
                                        <i class="fas fa-edit mr-2"></i>Edit
                                    </button>
                                    <!-- Tombol Hapus -->
                                    <button
                                        class="font-poppins delete-button font-medium text-red-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-red-800 transition duration-300 ease-in-out"
                                        data-modal-target="default-modal-delete-kategori{{ $kategori->id }}"
                                        data-modal-toggle="default-modal-delete-kategori{{ $kategori->id }}"
                                        id="btn-delete-kategori">
                                        <i class="fas fa-trash-alt mr-2"></i>Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- CRUD KATEGORI --}}
        <section>
            <!-- Modal Tambah Kategori -->
            <div id="default-modal-tambah-kategori" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white font-montserrat">
                                Tambahkan Kategori
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="default-modal-tambah-kategori">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only font-poppins">Close modal</span>
                            </button>
                        </div>
                        <form action="{{ route('kategori.store') }}" method="POST">
                            @csrf
                            <div class="p-4 items-center">
                                <label for="nama_kategori"
                                    class="block text-gray-700 font-bold mb-1 font-poppins">Kategori</label>
                                <input type="text" id="nama_kategori" name="nama_kategori"
                                    class="font-poppins w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                    placeholder="Masukkan Kategori" required required autocomplete="off">

                            </div>
                            <div
                                class="font-poppins flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit"
                                    class="font-poppins text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                    Tambah
                                </button>
                                <button data-modal-hide="default-modal-tambah-kategori" type="button"
                                    class="font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                                    Batal
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal EDIT Kategori -->
            @foreach ($DataKategori as $kategori)
                <div id="default-modal-edit-kategori{{ $kategori->id }}" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-2xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white font-montserrat">
                                    Edit Kategori
                                </h3>
                                <button type="button"
                                    class="font-poppins text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="default-modal-edit-kategori{{ $kategori->id }}">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only font-poppins">Close modal</span>
                                </button>
                            </div>
                            <form id="edit-kategori-form" method="POST"
                                action="{{ route('kategori.update', $kategori->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('PUT') <!-- Menggunakan metode PUT -->
                                <input hidden value="{{ $kategori->id }}" type="text" id="edit-idkategori"
                                    name="id" required>

                                <div class="px-4 pb-4 items-center">
                                    <label for="detail_kategori"
                                        class="block mt-4 text-gray-700 font-bold mb-1 font-poppins">Kategori</label>
                                    <input type="text" id="edit-namaKategori" name="nama_kategori"
                                        value="{{ $kategori->nama_kategori }}"
                                        class="font-poppins w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                        placeholder="Masukkan Kategori" required required required autocomplete="off">
                                </div>
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                                    <button type="submit"
                                        class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Update
                                    </button>
                                    <button data-modal-hiden="default-modal-edit-kategori{{ $kategori->id }}"
                                        type="button"
                                        class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Batal
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- Modal DELETE Kategori --}}
            @foreach ($DataKategori as $kategori)
                <div id="default-modal-delete-kategori{{ $kategori->id }}" tabindex="-1"
                    class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" data-modal-hide="default-modal-delete-kategori{{ $kategori->id }}"
                                class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                id="close-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-4 md:p-5 text-center">
                                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <h3 class="font-poppins mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda
                                    yakin ingin
                                    menghapus Kategori ini?</h3>
                                <div class="flex justify-center">
                                    <form id="edit-kategori-form" method="POST"
                                        action="{{ route('kategori.destroy', $kategori->id) }}">
                                        @csrf <!-- Token CSRF -->
                                        @method('DELETE') <!-- Menggunakan metode DELETE -->
                                        <button type="submit"
                                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Ya, Saya Yakin
                                        </button>
                                    </form>

                                    <button type="button"
                                        id="cancel-logout"data-modal-hide="default-modal-delete-kategori{{ $kategori->id }}"
                                        class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Tidak, Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </section>
        <section>

            {{-- SUB KATEGORI --}}
            <div class="p-4 border border-slate-400 rounded-xl">
                <!-- Tombol Tambah Kategori -->
                <div class="flex justify-between">

                    <button data-modal-target="default-modal-tambah-kategori_detail"
                        data-modal-toggle="default-modal-tambah-kategori_detail"
                        class="flex justify-center items-center text-xs font-medium font-montserrat text-gray-900 rounded-lg
            px-4 py-2 bg-white hover:bg-blue-600 hover:text-white
            border border-slate-400 hover:border-blue-600
            focus:z-10 focus:ring-2 focus:ring-slate-300
            transition-all duration-200 ease-in-out
            hover:-translate-y-1 active:translate-y-0 active:scale-95"
                        type="button">

                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        Sub Kategori
                    </button>
                    {{ $SubKategori->links() }}

                </div>

                <div class="relative overflow-x-auto sm:rounded-lg py-2">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                            <tr>
                                <th scope="col" class="px-6 py-3 font-poppins">No</th>
                                <th scope="col" class="px-6 py-3 font-poppins">Kategori</th>
                                <th scope="col" class="px-6 py-3 font-poppins">Sub Kategori</th>
                                <th scope="col" class="px-2 py-3 flex justify-center font-poppins">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($SubKategori as $index => $item)
                                <tr class="odd:bg-white even:bg-gray-50 border-b">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap font-poppins">
                                        {{ $index + 1 }}
                                    </th>
                                    <td class="px-6 py-4 font-poppins">
                                        {{ $item->kategori->nama_kategori ?? 'N/A' }}
                                    </td>
                                    <td class="px-6 py-4 font-poppins">
                                        {{ $item->nama_kategori_detail }}
                                    </td>
                                    <td class="px-2 py-4 flex justify-center gap-2">
                                        <!-- Tombol Edit -->
                                        <button
                                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins edit-button font-medium text-blue-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-blue-800 transition duration-300 ease-in-out"
                                            data-modal-target="default-modal-edit-kategori-detail{{ $item->id }}"
                                            data-modal-toggle="default-modal-edit-kategori-detail{{ $item->id }}"
                                            id="btn-edit-kategori-detail" data-id_kategori="{{ $item->id }}"
                                            data-kategori="{{ $item->nama_kategori_detail }}">
                                            <i class="fas fa-edit mr-2"></i>Edit
                                        </button>
                                        <!-- Tombol Hapus -->
                                        <button
                                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins delete-button font-medium text-red-600 border px-4 py-2 rounded-lg hover:transform hover:-translate-y-1 hover:text-red-800 transition duration-300 ease-in-out"
                                            data-modal-target="default-modal-delete-kategori-detail{{ $item->id }}"
                                            data-modal-toggle="default-modal-delete-kategori-detail{{ $item->id }}"
                                            id="btn-delete-kategori">
                                            <i class="fas fa-trash-alt mr-2"></i>Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>






    {{-- CCRUD SUB KATEGORI --}}

    <!-- Modal Tambah Kategori Detail -->
    <div id="default-modal-tambah-kategori_detail" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="font-poppins text-xl font-semibold text-gray-900 dark:text-white">Tambahkan Sub Kategori
                    </h3>
                    <button type="button"
                        class="font-poppins text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal-tambah-kategori_detail">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('subKategori.store') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        <div class="font-poppins text-red-500 text-sm mt-2">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                    <div class="p-4 items-center">
                        <label for="kategori" class="font-poppins block text-gray-700 font-bold mb-1">Kategori</label>
                        <select id="id_kategori" name="id_kategori"
                            class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            required>
                            <option value="" disabled selected>Pilih Kategori</option>
                            @foreach ($DataKategori as $category)
                                <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="p-4 items-center">
                        <label for="nama_kategori_detail" class="font-poppins block text-gray-700 font-bold mb-1">Sub
                            Kategori</label>
                        <input type="text" id="nama_kategori_detail" name="nama_kategori_detail"
                            class="font-poppins w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Sub Kategori" required autocomplete="off">
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tambah
                        </button>
                        <button data-modal-hide="default-modal-tambah-kategori_detail" type="button"
                            class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal EDIT SUB KATEGORI -->
    @foreach ($SubKategori as $item)
        <div id="default-modal-edit-kategori-detail{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="font-poppins text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Kategori
                        </h3>
                        <button type="button"
                            class="font-poppins text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-edit-kategori-detail{{ $item->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="edit-kategori-detail-form" method="POST"
                        action="{{ route('subKategori.update', $item->id) }}">
                        @csrf <!-- Token CSRF -->
                        @method('PUT') <!-- Menggunakan metode PUT -->
                        <input hidden value="{{ $item->id }}" type="text" id="edit-idkategori-detail"
                            name="id" required>

                        <div class="px-4 pb-4 items-center">
                            <label for="Kategori"
                                class="font-poppins block mt-4 text-gray-700 font-bold mb-1">Kategori</label>
                            <select id="id_kategori" name="id_kategori"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                required>
                                <option value="" disabled {{ $item->id_kategori ? '' : 'selected' }}>Pilih
                                    Kategori</option>
                                @foreach ($DataKategori as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $item->id_kategori == $category->id ? 'selected' : '' }}>
                                        {{ $category->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="detail_kategori"
                                class="font-poppins block mt-4 text-gray-700 font-bold mb-1">Sub
                                Kategori</label>
                            <input type="text" id="edit-namaKategori" name="nama_kategori_detail"
                                value="{{ $item->nama_kategori_detail }}"
                                class="font-poppins w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Masukkan Kategori" required autocomplete="off">
                        </div>
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>
                            <button data-modal-hiden="default-modal-edit-kategori-detail{{ $item->id }}"
                                type="button"
                                class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Batal
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach


    {{-- Modal DELETE Kategori --}}
    @foreach ($SubKategori as $item)
        <div id="default-modal-delete-kategori-detail{{ $item->id }}" tabindex="-1"
            class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" data-modal-hide="default-modal-delete-kategori-detail{{ $item->id }}"
                        class="font-poppins absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        id="close-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="font-poppins mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="font-poppins mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin
                            ingin
                            menghapus Sub Kategori ini?</h3>
                        <div class="flex justify-center">
                            <form id="edit-kategori-form" method="POST"
                                action="{{ route('subKategori.destroy', $item->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button"
                                id="cancel-logout"data-modal-hide="default-modal-delete-kategori-detail{{ $item->id }}"
                                class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 font-poppins py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Tidak, Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</x-layadmin>
