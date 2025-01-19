<x-layadmin>
    <p class="font-semibold text-3xl playfair-display-uniquifier pb-4">
        Data Event
    </p>
    <div class="lg:flex space-y-2 lg:space-y-0 lg:justify-between lg:items-center">
        <!-- Kiri: Tombol Tambah-Wisata -->
        <div class="flex ">
            <a href="{{ route('event.create') }}" id="tambah-event-wisata"
                class="{{ request()->routeIs('event.create') ? 'bg-[#656D4A] text-white' : '' }} 
                       flex justify-center items-center text-xs font-medium text-gray-900 rounded-lg 
                       border border-slate-400 px-4 py-2 hover:bg-[#656D4A] hover:text-white 
                       focus:z-10 focus:ring-2 focus:ring-slate-300">
                Tambah-Event
            </a>
        </div>

        <!-- Kanan: Form Filter -->
        <div class="flex lg:justify-end">
            @if (request()->routeIs('event.index'))
                <form class="flex max-w-lg w-full" method="GET" action="{{ route('event.index') }}">
                    <!-- Dropdown Kategori -->
                    <select name="id_kategori_detail" id="id_kategori_detail"
                        class="h-full px-4 py-2 text-xs border border-gray-300 rounded-l-md 
                               focus:ring-blue-500 focus:border-blue-500 
                               dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:border-blue-500">
                        <option value="">Semua Sub Kategori</option>
                        @foreach ($wisata as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_kategori_detail }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Input Nama Wisata -->
                    <input type="text" name="nama_event" placeholder="Cari nama Event"
                        value="{{ request('nama_event') }}"
                        class="h-full px-4 py-2 text-xs border-t border-b border-gray-300 
                               focus:ring-blue-500 focus:border-blue-500 
                               dark:bg-gray-700 dark:text-white dark:border-gray-600 dark:focus:border-blue-500" />

                    <!-- Button Cari -->
                    <button type="submit"
                        class="h-full px-4 py-2 text-xs text-white bg-[#414833] border-l-0 border border-gray-300 
                               rounded-r-md hover:bg-[#515d4a] focus:ring-4 focus:outline-none focus:ring-blue-300 
                               dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                        Cari
                    </button>
                </form>
            @endif
        </div>
    </div>


    <div class="">
        {{ $DataEvent->links() }}
    </div>
    {{-- TABEL --}}
    <div class="relative overflow-x-auto  sm:rounded-lg py-2">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  border">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mulai - sampai
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Wisata
                    </th>
                    <th scope="col" class="px-6 py-3">
                        HTM
                    </th>
                    <th scope="col" class="px-6 py-3">
                        IMG
                    </th>
                    <th scope="col" class="px-2 py-3 flex justify-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($DataEvent as $index => $event)
                    <tr class="odd:bg-white even:bg-gray-50 border-b">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $index + 1 }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $event->nama_event }}
                        </td>
                        <td class="px-6 py-4">
                            <div>
                                {{ $event->event_mulai }}
                            </div>
                            <div>
                                {{ $event->event_berakhir }}
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            {{ $event->wisata->nama_wisata }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $event->htm_event }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset('storage/' . $event->img) }}" alt="Gambar" class="w-44 h-auto">
                        </td>
                        <td class="px-2 py-4 flex justify-center gap-2">
                            <div class="flex justify-center">
                                <a href="{{ route('event.edit', $event->id) }}"
                                    class="font-medium text-blue-600 border px-4 py-2 rounded-lg">Edit</a>
                            </div>
                            <div class="flex justify-center">
                                <button class="delete-button font-medium text-red-600 border px-4 py-2 rounded-lg"
                                    data-modal-target="default-modal-delete-event{{ $event->id }}"
                                    data-modal-toggle="default-modal-delete-event{{ $event->id }}"
                                    id="btn-delete-event">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin ingin
                        menghapus data ini?</h3>

                    <!-- Form untuk delete -->
                    <form id="deleteForm" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Iya, Hapus
                        </button>
                        <button type="button" data-modal-hide="popup-modal"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Batal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal DELETE Event --}}
    @foreach ($DataEvent as $event)
        <div id="default-modal-delete-event{{ $event->id }}" tabindex="-1"
            class="hidden fixed inset-0 z-50  items-center justify-center bg-black bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" data-modal-hide="default-modal-delete-event{{ $event->id }}"
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
                            <form id="edit-event-form" method="POST"
                                action="{{ route('event.destroy', $event->id) }}">
                                @csrf <!-- Token CSRF -->
                                @method('DELETE') <!-- Menggunakan metode DELETE -->
                                <button type="submit"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Ya, Saya Yakin
                                </button>
                            </form>

                            <button type="button"
                                id="cancel-logout"data-modal-hide="default-modal-delete-event{{ $event->id }}"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
                    const deleteUrl = `/data-event/${id}`;
                    deleteForm.setAttribute('action', deleteUrl);
                });
            });
        });
    </script>


</x-layadmin>
