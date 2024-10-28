{{-- TAMBAH" --}}

<ul class="text-sm  flex font-medium text-center text-gray-500 rounded-lg  ">

    <li class="flex {{ request()->is('data-wisata') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="/data-wisata" class="flex justify-center  py-2 items-center border px-4 border-gray-300     ">

            <div
                class="flex items-center justify-center w-full border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Wisata</div>
        </a>
    </li>

    
    <li class="flex {{ request()->is('tambah-wisata') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="/tambah-wisata" class="flex justify-center  py-2 items-center border px-4 border-gray-300     ">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="20" height="20" x="0" y="0" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                <g>
                    <path fill="#414833" fill-rule="evenodd"
                        d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0z"
                        clip-rule="evenodd" opacity="1" data-original="#4bae4f" class=""></path>
                    <path fill="#ffffff"
                        d="M116 279.6v-47.3c0-4.8 3.9-8.8 8.8-8.8h98.9v-98.8c0-4.8 3.9-8.8 8.8-8.8h47.3c4.8 0 8.7 3.9 8.7 8.8v98.9h98.8c4.8 0 8.8 3.9 8.8 8.8v47.3c0 4.8-3.9 8.7-8.8 8.7h-98.9v98.8c0 4.8-3.9 8.8-8.7 8.8h-47.3c-4.8 0-8.8-3.9-8.8-8.8v-98.9h-98.8c-4.9.1-8.8-3.9-8.8-8.7z"
                        opacity="1" data-original="#ffffff"></path>
                </g>
            </svg>
            <div
                class="flex items-center justify-center w-full border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Wisata</div>
        </a>
    </li>
    <li class="flex {{ request()->is('tambah-event') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="/tambah-event" class="flex justify-center  py-2 items-center border px-4 border-gray-300     ">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="20" height="20" x="0" y="0" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                <g>
                    <path fill="#414833" fill-rule="evenodd"
                        d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0z"
                        clip-rule="evenodd" opacity="1" data-original="#4bae4f" class=""></path>
                    <path fill="#ffffff"
                        d="M116 279.6v-47.3c0-4.8 3.9-8.8 8.8-8.8h98.9v-98.8c0-4.8 3.9-8.8 8.8-8.8h47.3c4.8 0 8.7 3.9 8.7 8.8v98.9h98.8c4.8 0 8.8 3.9 8.8 8.8v47.3c0 4.8-3.9 8.7-8.8 8.7h-98.9v98.8c0 4.8-3.9 8.8-8.7 8.8h-47.3c-4.8 0-8.8-3.9-8.8-8.8v-98.9h-98.8c-4.9.1-8.8-3.9-8.8-8.7z"
                        opacity="1" data-original="#ffffff"></path>
                </g>
            </svg>
            <div href="#"
                class="flex items-center justify-center w-full    border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Event</div>
        </a>
    </li>
    <li class="flex {{ request()->is('tambah-kuliner') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="/tambah-kuliner" class="flex justify-center  py-2 items-center border px-4 border-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                width="20" height="20" x="0" y="0" viewBox="0 0 512 512"
                style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                <g>
                    <path fill="#414833" fill-rule="evenodd"
                        d="M256 0C114.8 0 0 114.8 0 256s114.8 256 256 256 256-114.8 256-256S397.2 0 256 0z"
                        clip-rule="evenodd" opacity="1" data-original="#4bae4f" class=""></path>
                    <path fill="#ffffff"
                        d="M116 279.6v-47.3c0-4.8 3.9-8.8 8.8-8.8h98.9v-98.8c0-4.8 3.9-8.8 8.8-8.8h47.3c4.8 0 8.7 3.9 8.7 8.8v98.9h98.8c4.8 0 8.8 3.9 8.8 8.8v47.3c0 4.8-3.9 8.7-8.8 8.7h-98.9v98.8c0 4.8-3.9 8.8-8.7 8.8h-47.3c-4.8 0-8.8-3.9-8.8-8.8v-98.9h-98.8c-4.9.1-8.8-3.9-8.8-8.7z"
                        opacity="1" data-original="#ffffff"></path>
                </g>
            </svg>
            <div href="#"
                class="flex items-center justify-center w-full    border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Kuliner</div>
        </a>
    </li>
    {{-- MODAL KATEGORI --}}
    <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full ">
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow ">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                    <h3 class="text-xl font-semibold text-gray-900 ">
                        Static modal
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                        data-modal-hide="static-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p class="text-base leading-relaxed text-gray-500 ">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its
                        citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 ">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25
                        and is meant to ensure a common set of data rights in the European Union. It requires
                        organizations to notify users as soon as possible of high-risk data breaches that could
                        personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b ">
                    <button data-modal-hide="static-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">I
                        accept</button>
                    <button data-modal-hide="static-modal" type="button"
                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none  rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 ">Decline</button>
                </div>
            </div>
        </div>
    </div>
</ul>
