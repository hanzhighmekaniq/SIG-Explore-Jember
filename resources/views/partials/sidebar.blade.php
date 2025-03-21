@php
    use Illuminate\Support\Facades\DB;
    $countWisata = DB::table('data_wisata')->count();
    $countKuliner = DB::table('data_kuliner')->count();
    $countEvent = DB::table('data_event')->count();
@endphp

<div class="h-full  px-3 pb-4 overflow-y-auto bg-white    ">
    <ul class="space-y-2 font-medium ">
        <li class="">
            <a href="{{ route('dashboard') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600
                    active:text-blue-600 focus:outline-none {{ request()->is('admin/dashboard') ? 'text-blue-600' : '' }}">
                <span
                    class="font-montserrat font-semibold ms-3 {{ request()->is('admin/dashboard') ? 'text-blue-600' : 'hover:text-blue-400' }}">Dashboard</span>

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ml-auto {{ request()->is('admin/dashboard') ? 'text-blue-600' : 'hover:text-blue-400' }} transition duration-75"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    viewBox="0 0 24 24">
                    <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                    <path d="M18 17V9" />
                    <path d="M13 17V5" />
                    <path d="M8 17v-3" />
                </svg>
            </a>
        </li>
        <li class="">
            <a href="{{ route('kategori.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600
                active:text-blue-600 focus:outline-none {{ request()->is('admin/kategori') ? 'text-blue-600' : '' }}">
                <span
                    class="font-montserrat font-semibold ms-3 {{ request()->is('admin/kategori') ? 'text-blue-600' : 'hover:text-blue-400' }}">Kategori</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="w-5 h-5 ml-auto {{ request()->is('admin/kategori') ? 'text-blue-600' : 'hover:text-blue-400' }} transition duration-75">
                    <path d="M11 13v4" />
                    <path d="M15 5v4" />
                    <path d="M3 3v16a2 2 0 0 0 2 2h16" />
                    <rect x="7" y="13" width="9" height="4" rx="1" />
                    <rect x="7" y="5" width="12" height="4" rx="1" />
                </svg>
            </a>
        </li>
        <li class="group">
            <a href="{{ route('wisata.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600 active:text-blue-600 focus:outline-none {{ request()->is('admin/wisata*') ? 'text-blue-600' : '' }}">
                <!-- Teks -->
                <span
                    class="font-montserrat font-semibold flex-1 ms-3 whitespace-nowrap {{ request()->is('admin/wisata*') ? 'text-blue-600' : 'hover:text-blue-400' }}">Data
                    Wisata</span>
                <!-- Ikon dan Notifikasi -->
                <div class="relative">
                    <!-- Notifikasi -->
                    <span
                        class="absolute -top-2 -right-2 inline-flex items-center justify-center w-6 h-6 text-xs font-medium bg-blue-600 rounded-full group-hover:bg-white group-hover:text-blue-600 {{ request()->is('admin/wisata*') ? 'bg-white text-blue-600' : 'text-white' }}">
                        {{ $countWisata }}
                    </span>
                    <!-- Ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-map-pinned {{ request()->is('admin/wisata*') ? 'text-blue-600' : 'hover:text-blue-400' }}">
                        <path
                            d="M18 8c0 3.613-3.869 7.429-5.393 8.795a1 1 0 0 1-1.214 0C9.87 15.429 6 11.613 6 8a6 6 0 0 1 12 0" />
                        <circle cx="12" cy="8" r="2" />
                        <path
                            d="M8.714 14h-3.71a1 1 0 0 0-.948.683l-2.004 6A1 1 0 0 0 3 22h18a1 1 0 0 0 .948-1.316l-2-6a1 1 0 0 0-.949-.684h-3.712" />
                    </svg>
                </div>
            </a>
        </li>

        <li class="group">
            <a href="{{ route('kuliner.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600 active:text-blue-600 focus:outline-none {{ request()->is('admin/kuliner*') ? 'text-blue-600' : '' }}">
                <!-- Teks -->
                <span
                    class="font-montserrat font-semibold flex-1 ms-3 whitespace-nowrap {{ request()->is('admin/kuliner*') ? 'text-blue-600' : 'hover:text-blue-400' }}">Data
                    Kuliner</span>
                <!-- Ikon dan Notifikasi -->
                <div class="relative">
                    <!-- Notifikasi -->
                    <span
                        class="absolute -top-2 -right-2 inline-flex items-center justify-center w-6 h-6 text-xs font-medium bg-blue-600 rounded-full group-hover:bg-white group-hover:text-blue-600 {{ request()->is('admin/kuliner*') ? 'bg-white text-blue-600' : 'text-white' }}">
                        {{ $countKuliner }}
                    </span>
                    <!-- Ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-utensils {{ request()->is('admin/kuliner*') ? 'text-blue-600' : 'hover:text-blue-400' }}">
                        <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                        <path d="M7 2v20" />
                        <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                    </svg>
                </div>
            </a>
        </li>

        <li class="group">
            <a href="{{ route('event.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600 active:text-blue-600 focus:outline-none {{ request()->is('admin/event*') ? 'text-blue-600' : '' }}">
                <!-- Teks -->
                <span
                    class="font-montserrat font-semibold flex-1 ms-3 whitespace-nowrap {{ request()->is('admin/event*') ? 'text-blue-600' : 'hover:text-blue-400' }}">Data
                    Event</span>
                <!-- Ikon dan Notifikasi -->
                <div class="relative">
                    <!-- Notifikasi -->
                    <span
                        class="absolute -top-2 -right-2 inline-flex items-center justify-center w-6 h-6 text-xs font-medium bg-blue-600 rounded-full group-hover:bg-white group-hover:text-blue-600 {{ request()->is('admin/event*') ? 'bg-white text-blue-600' : 'text-white' }}">
                        {{ $countEvent }}
                    </span>
                    <!-- Ikon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"
                        class="lucide lucide-book-image {{ request()->is('admin/event*') ? 'text-blue-600' : 'hover:text-blue-400' }}">
                        <path d="m20 13.7-2.1-2.1a2 2 0 0 0-2.8 0L9.7 17" />
                        <path
                            d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20" />
                        <circle cx="10" cy="8" r="2" />
                    </svg>
                </div>
            </a>
        </li>

        <li class="group">
            <a href="{{ route('setting.index') }}"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600 active:text-blue-600 focus:outline-none">
                <!-- Teks -->
                <span
                    class="font-montserrat font-semibold flex-1 ms-3 whitespace-nowrap {{ request()->is('admin/setting*') ? 'text-blue-600' : 'hover:text-blue-400' }}">Pengaturan</span>
                <!-- Ikon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-user-cog {{ request()->is('admin/setting*') ? 'text-blue-600' : 'hover:text-blue-400' }}">
                    <circle cx="18" cy="15" r="3" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                    <path d="m21.7 16.4-.9-.3" />
                    <path d="m15.2 13.9-.9-.3" />
                    <path d="m16.6 18.7.3-.9" />
                    <path d="m19.1 12.2.3-.9" />
                    <path d="m19.6 18.7-.4-1" />
                    <path d="m16.8 12.3-.4-1" />
                    <path d="m14.3 16.6 1-.4" />
                    <path d="m20.7 13.8 1-.4" />
                </svg>
            </a>
        </li>
        <li class="group">
            <a id="logout-button" type="button" data-modal-target="default-modal-logout"
                data-modal-toggle="default-modal-logout"
                class="flex items-center p-2 rounded-lg text-gray-400 hover:text-blue-400 focus:text-blue-600 active:text-blue-600 focus:outline-none">
                <!-- Teks -->
                <span
                    class="font-montserrat font-semibold flex-1 ms-3 whitespace-nowrap hover:text-blue-400">Logout</span>
                <!-- Ikon -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="lucide lucide-log-out hover:text-blue-400">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" x2="9" y1="12" y2="12" />
                </svg>

            </a>
            </button>
    </ul>
</div>
