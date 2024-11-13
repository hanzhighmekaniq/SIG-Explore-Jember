<x-layadmin>

    @if ($message = Session::get('success'))
        <div id="toast-success"
            class="absolute top-20 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $message }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-success" aria-label="Close" onclick="closeToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div id="toast-error"
            class="absolute top-20 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-100 rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-200 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $message }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-red-100 text-red-400 hover:text-red-600 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-error" aria-label="Close" onclick="closeToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif


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

    <!-- Tombol Tambah Kategori -->
    <button data-modal-target="default-modal-tambah-kategori" data-modal-toggle="default-modal-tambah-kategori"
        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        type="button">
        Tambah Kategori
    </button>

    <!-- Modal Tambah Kategori -->
    <div id="default-modal-tambah-kategori" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambahkan Kategori
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal-tambah-kategori">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf
                    <div class="p-4 items-center">
                        <label for="nama_kategori" class="block text-gray-700 font-bold mb-1">Kategori</label>

                        <select id="countries" name="nama_kategori" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="Alam">Alam</option>
                            <option value="Buatan">Buatan</option>
                        </select>

                        <label for="detail_kategori" class="block mt-4 text-gray-700 font-bold mb-1">Detail</label>
                        <input type="text" id="detail_kategori" name="detail_kategori"
                            class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                            placeholder="Masukkan Detail" required required autocomplete="off">
                    </div>
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Tambah
                        </button>
                        <button data-modal-hide="default-modal-tambah-kategori" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- TABEL --}}
    <div class="relative overflow-x-auto sm:rounded-lg py-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                <tr>
                    <th scope="col" class="px-6 py-3">No</th>

                    <th scope="col" class="px-6 py-3">Kategori</th>
                    <th scope="col" class="px-6 py-3">Detail</th>
                    <th scope="col" class="px-2 py-3 flex justify-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataKategori as $index => $kategori)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">

                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">{{ $kategori->nama_kategori }}</td>
                        <td class="px-6 py-4">{{ $kategori->detail_kategori }}</td>
                        <td class="px-2 py-4 flex justify-center gap-2">
                            <!-- Tombol Edit -->
                            <!-- Button Submit dalam Form -->
                            <button class="edit-button font-medium text-blue-600 border px-4 py-2 rounded-lg"
                                data-modal-target="default-modal-edit-kategori{{ $kategori->id }}"
                                data-modal-toggle="default-modal-edit-kategori{{ $kategori->id }}"
                                id="btn-edit-kategori" data-id_kategori="{{ $kategori->id }}"
                                data-kategori="{{ $kategori->nama_kategori }}">
                                Edit
                            </button>
                            <!-- Tombol Hapus -->
                            <button class="delete-button font-medium text-red-600 border px-4 py-2 rounded-lg"
                                data-modal-target="default-modal-delete-kategori{{ $kategori->id }}"
                                data-modal-toggle="default-modal-delete-kategori{{ $kategori->id }}"
                                id="btn-delete-kategori">
                                Delete
                            </button>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <!-- Modal EDIT Kategori -->
    @foreach ($DataKategori as $kategori)
        <div id="default-modal-edit-kategori{{ $kategori->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Edit Kategori
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal-edit-kategori{{ $kategori->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <form id="edit-kategori-form" method="POST"
                        action="{{ route('kategori.update', $kategori->id) }}">
                        @csrf <!-- Token CSRF -->
                        @method('PUT') <!-- Menggunakan metode PUT -->
                        <input hidden value="{{ $kategori->id }}" type="text" id="edit-idkategori"
                            name="id" required>

                        <div class="p-4 items-center">
                            <label for="nama_kategori" class="block text-gray-700 font-bold mb-1">Kategori</label>
                            <select id="countries" name="nama_kategori" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option disabled {{ !$kategori->nama_kategori ? 'selected' : '' }}>Pilih Kategori
                                </option>
                                <option value="Alam" {{ $kategori->nama_kategori === 'Alam' ? 'selected' : '' }}>
                                    Alam</option>
                                <option value="Buatan" {{ $kategori->nama_kategori === 'Buatan' ? 'selected' : '' }}>
                                    Buatan</option>
                            </select>

                            <label for="detail_kategori"
                                class="block mt-4 text-gray-700 font-bold mb-1">Kategori</label>
                            <input type="text" id="edit-namaKategori" name="detail_kategori"
                                value="{{ $kategori->detail_kategori }}"
                                class="w-full px-3 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                                placeholder="Masukkan Kategori" required required required autocomplete="off">
                        </div>
                        <div
                            class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Update
                            </button>
                            <button data-modal-hide="default-modal-edit-kategori{{ $kategori->id }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Anda yakin ingin
                            menghapus?</h3>
                        <div class="flex justify-center">
                            <form id="edit-kategori-form" method="POST"
                                action="{{ route('kategori.destroy', $kategori->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button"
                                id="cancel-logout"data-modal-hide="default-modal-delete-kategori{{ $kategori->id }}"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Tidak, Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-layadmin>
