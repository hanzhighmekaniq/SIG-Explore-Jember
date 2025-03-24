<footer class="bg-transparent text-white p-5 rounded-lg container">
    <div class="mx-auto w-full p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="/" class="flex items-center">
                    <img src="img/logo-no-color.png" class="h-8 me-3" alt="Explore Jember Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap pacifico-regular">Explore
                        Jember</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-8 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-xl font-semibold uppercase font-poppins">Navigasi Cepat</h2>
                    <ul class="text-white font-medium font-poppins space-y-2">
                        <li class="">
                            <a href="{{ route('beranda.index') }}" class="hover:underline">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('wisata.pengunjung') }}" class="hover:underline">Wisata</a>
                        </li>
                        <li>
                            <a href="{{ route('petaWilayah.index') }}" class="hover:underline">Peta Wilayah</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-xl font-semibold uppercase font-poppins">Sumber Daya</h2>
                    <ul class="text-white font-poppins font-medium space-y-2">
                        <li>
                            <a href="{{ route('login') }}" class="hover:underline">Admin</a>
                        </li>
                        <li>
                            <button type="button" data-modal-target="service" data-modal-toggle="service"
                                class="hover:underline">Hubungi Kami</button>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-xl font-semibold uppercase font-poppins">Contact Person</h2>
                    <ul class="text-white font-poppins font-medium space-y-2">
                        <li>
                            <a href="/login" class="hover:underline">+62 85259990293</a>
                        </li>
                        <li>
                            <a href="/login" class="hover:underline">cs.visit@gmail.com</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-white sm:mx-auto lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-white sm:text-center">© 2025 <a href="https://flowbite.com/"
                    class="hover:underline">Explore Jember™</a>. All Rights Reserved.
            </span>
            <!--<div class="flex mt-4 sm:justify-center sm:mt-0">
                <a href="#" class="text-black hover:text-white">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 8 19">
                        <path fill-rule="evenodd"
                            d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Facebook page</span>
                </a>
                <a href="#" class="text-black hover:text-white ms-5">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 21 16">
                        <path
                            d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                    </svg>
                    <span class="sr-only">Discord community</span>
                </a>
            </div>-->
        </div>
</footer>
