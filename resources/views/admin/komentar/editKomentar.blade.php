<x-layadmin>
    <p class="font-semibold text-3xl font-poppins pb-4 text-[#5c7aff]">
        Komentar Pengunjung - {{ $wisata->nama_wisata }}
    </p>

    <!-- Breadcrumb kembali ke halaman wisata -->
    <div class="flex justify-start items-center mb-6">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{ route('admin.komentar.index') }}"
                        class="font-poppins inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        Data Komentar
                    </a>
                </li>
                <li>
                    <div class="flex items-center font-poppins">
                        <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-sm font-medium text-gray-700 md:ms-2">
                            {{ $wisata->nama_wisata }}
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg font-poppins">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">Nama Pengunjung</th>
                    <th class="px-6 py-3">Judul Komentar</th>
                    <th class="px-6 py-3">Isi Komentar</th>
                    <th class="px-6 py-3">Rating</th>
                    <th class="px-6 py-3">Waktu</th>
                    <th class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($komentars as $index => $komentar)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $komentar->nama ?? 'Anonim' }}</td>
                        <td class="px-6 py-4">{{ $komentar->judul }}</td>
                        <td class="px-6 py-4">{{ $komentar->komentar }}</td>
                        <td class="px-6 py-4">
                            @for ($i = 0; $i < $komentar->rating; $i++)
                                ⭐
                            @endfor
                        </td>
                        <td class="px-6 py-4">{{ $komentar->created_at->format('j M Y H:i') }}</td>
                        <td class="px-6 py-4 text-center">
                            <button data-modal-target="modal-delete-{{ $komentar->id }}"
                                data-modal-toggle="modal-delete-{{ $komentar->id }}"
                                class="text-red-600 hover:underline text-sm font-medium">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-400 italic">
                            Belum ada komentar.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal Delete -->
    @foreach ($komentars as $komentar)
        <div id="modal-delete-{{ $komentar->id }}" tabindex="-1"
            class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 overflow-y-auto">
            <div class="relative p-4 w-full max-w-md">
                <div class="relative bg-white rounded-lg shadow">
                    <button type="button" data-modal-hide="modal-delete-{{ $komentar->id }}"
                        class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 font-poppins">Yakin ingin menghapus komentar
                            ini?</h3>
                        <form action="{{ route('admin.komentar.destroy', $komentar->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Iya, Hapus
                            </button>
                            <button type="button" data-modal-hide="modal-delete-{{ $komentar->id }}"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                Batal
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-layadmin>

<!-- Flowbite Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
