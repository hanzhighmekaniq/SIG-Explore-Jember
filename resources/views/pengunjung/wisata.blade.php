{{-- pacifico-regular --}}

@include('partials.navbarPengunjung')
<div class="bg-white h-auto w-full">

    <div class="container m-auto">
        <div class="m-auto w-96 pt-36 pb-24 text-[#333D29] text-6xl">
            <p class="text-start font-extrabold xl:text-4xl">WISATA</p>
            <p class="pacifico-regular text-start">Kabupaten</p>
            <p class="pacifico-regular text-end mt-[-8px]">Jember</p>
        </div>

        <!-- Search and Buttons -->
        <div class="flex justify-end items-center space-x-2 pb-10">
            <!-- Search Input -->
            <div class="relative">
                <input type="text" class="bg-white border border-[#414833] text-black text-sm rounded-lg focus:ring-[#414833] focus:border-[#414833] block w-full pl-10 p-2.5" placeholder="Search" />
            </div>

            <!-- Primary Button -->
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Default</button>

            <!-- Dropdown Button -->
            <div class="relative">
                <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                    type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdown" class="hidden z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Grid of Items -->
        <div class="grid lg:grid-cols-4 gap-8 pb-40 pt-4">
            <!-- Item Card 1 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Rembangan</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Wisata Keluarga, Gunung
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>
        
            <!-- Item Card 2 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Dira Park</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>
        
            <!-- Item Card 3 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Gunung Gambir</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Perbukitan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 4 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Alun Alun Jember</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga, Taman Kota
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 5 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Gumitir</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Pengunungan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 6 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Rembangan Diary Farm</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 7 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Pantai Watu Ulo</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Pantai
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 8 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Taman Galaxy</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga, Perbukitan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 9 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Pantai Papuma</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Pantai
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 10 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Citra Mandiri Land</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 11 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Pantai Payangan</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Pantai
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 12 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Mini Zoo</p>
                        <p class="text-black text-sm">
                            Wisata Keluarga, Kebun Binatang
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 13 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Bukit Domba</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Perbukitan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 14 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Situs Duplang</p>
                        <p class="text-black text-sm">
                            Wisata Sejarah
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 15 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Kemuning Lor Nature Park</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Wisata Keluarga, Perbukitan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 16 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Museum Huruf</p>
                        <p class="text-black text-sm">
                            Wisata Sejarah
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 17 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Taman Botani</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Wisata Keluarga, Perbukitan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 18 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Museum Tembakau</p>
                        <p class="text-black text-sm">
                            Wisata Sejarah
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 19 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Kampung Durian</p>
                        <p class="text-black text-sm">
                            Wisata Alam, Hutan
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>

            <!-- Item Card 20 -->
            <div>
                <div class="space-y-2 h-auto w-auto border p-4 rounded-lg">
                    <img class="object-cover w-full h-48 rounded-lg" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class="w-auto h-auto">
                        <p class="text-black font-bold text-xl">Museum Coklat</p>
                        <p class="text-black text-sm">
                            Wisata Sejarah
                        </p>
                    </div>
                    <div class="flex-grow"></div>
                    <button class="w-full bg-[#414833] text-white rounded-lg py-2 mt-4">Button</button>
                </div>
            </div>
        </div>
        

</div>
@include('partials.footerPengunjung')