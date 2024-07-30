{{-- pacifico-regular --}}

@include('partials.navbarPengunjung')
<div class="bg-white h-auto w-full">

    <div class="container m-auto">
        <div class="m-auto w-96 pt-36 pb-24 text-[#333D29] text-6xl">
            <p class="text-start font-extrabold xl:text-4xl">WISATA</p>
            <p class="pacifico-regular text-start">Kabupaten</p>
            <p class="pacifico-regular text-end mt-[-8px]">Jember</p>
        </div>
        <div class="flex justify-end items-center space-x-2 pb-10">
            <label
                class="input input-bordered bg-white border-[#414833] focus-within:border-[#414833] flex items-center gap-2">
                <input type="text" class="border-transparent text-black focus:border-transparent focus:ring-0 tn"
                    placeholder="Search" />
            </label>
            <button type="button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Default</button>

            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">Dropdown button <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 4 4 4-4" />
                </svg>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown"
                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>



        </div>
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-8 pb-40 pt-4 ">
            {{-- CLONE --}}
            <div>
                <div class="space-y-2  h-auto w-auto border p-4">
                    <img class="object-cover" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class=" w-auto h-auto">
                        <p class="text-black font-bold text-xl">Pantai Payangan</p>
                        <h1 class="text-black text">Merupakan tempat wisata alam sekaligus tempat untuk ritual meditasi
                            oleh
                            pengunjung. Meskipun memiliki pasir pantai yang tidak putih, namun butiran pasirnya sangat
                            lembut serta nyaman.
                            awdoamdaiODH:oA
                            awdliadh;
                            awdaidhaoifwhdoi
                            awd;iahwdl</h1>
                    </div>
                    <div class="flex-grow"></div> <!-- This pushes the button to the bottom -->
                    <button class="btn w-full rounded-2xl bg-[#414833] flex items-center justify-center">Button</button>
                </div>
            </div>
            <div>
                <div class="space-y-2  h-auto w-auto border p-4">
                    <img class="object-cover" src="{{ asset('img/Botani.png') }}" alt="Image">
                    <div class=" w-auto h-auto">
                        <p class="text-black font-bold text-xl">Pantai Payangan</p>
                        <h1 class="text-black text">Merupakan tempat wisata alam sekaligus tempat untuk ritual meditasi
                            oleh
                            pengunjung. Meskipun memiliki pasir pantai yang tidak putih, namun butiran pasirnya sangat
                            lembut serta nyaman.</h1>
                    </div>
                    <div class="flex-grow"></div> <!-- This pushes the button to the bottom -->
                    <button class="btn w-full rounded-2xl bg-[#414833] flex items-center justify-center">Button</button>
                </div>
            </div>
            {{-- CLONE --}}
        </div>
    </div>

</div>