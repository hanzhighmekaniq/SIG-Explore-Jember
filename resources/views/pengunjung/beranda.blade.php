<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="style.css">
</head>
<html class="bg-white p-0 " lang="en">

@include('partials.navbarPengunjung')

<body id="home" class="top-0">

    <div class="bg-white top-0 w-full h-auto">
        <figure class="relative 2xl:mb-20">
            <img src="{{ asset('img/bg-utama.png') }}" alt="UKURAN FULL"
                class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
            <div class="absolute inset-0 flex items-center justify-center">
                <figcaption class="container text-center space-y-4 lg:space-y-10">
                    <p
                        class="rubik-mono-one-regular font-semibold text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-7xl text-[#C2C5AA] drop-shadow-lg">
                        WISATA <br> KABUPATEN JEMBER
                    </p>
                    <p
                        class="text-white break-words font-serif text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl drop-shadow-lg">
                        Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya yang kaya, serta
                        berbagai destinasi wisata menarik. Dari keindahan Pantai Papuma hingga pesona Rembangan yang
                        sejuk, Jember siap memberikan pengalaman liburan yang tak terlupakan. Jelajahi keajaiban alam
                        dan nikmati keragaman budaya di setiap sudut kota yang menawan ini.
                    </p>
                    <div class="w-auto h-auto flex justify-center m-auto">
                        <a class="bg-[#C2C5AA] shadow-lg shadow-gray-800 text-xs xl:text-base px-6 py-2 xl:px-12 xl:py-2 rounded-2xl xl:rounded-3xl text-center flex items-center justify-center font-serif text-black"
                            style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);" href="">
                            Buka Peta Wisata
                        </a>
                    </div>
                </figcaption>
            </div>
        </figure>




        <div class="container m-auto">
            <div class="">
                <div class="p-4 mt-36 mb-10 flex justify-center items-center">
                    <p class="m-auto text-2xl font-serif text-black">Event Yang Akan Datang</p>
                </div>





                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-1.svg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 2 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-2.svg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 3 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-3.svg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 4 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-4.svg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                        <!-- Item 5 -->
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="/docs/images/carousel/carousel-5.svg"
                                class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                alt="...">
                        </div>
                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                            data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                            data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                            data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                            data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                            data-carousel-slide-to="4"></button>
                    </div>
                    <!-- Slider controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                            <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>





                <div class="p-4 mt-36 mb-10 flex justify-center items-center">
                    <p
                        class="m-auto text-xl sm:text-xl md:text-xl lg:text-2xl xl:text-2xl 2xl:text-2xl font-serif text-black">
                        Wisata Terpopuler</p>
                </div>
                <div class="w-full font-serif mb-20">
                    <div class="grid 2xl:grid-cols-2 2xl:gap-2">
                        <div class="">
                            <img src="{{ asset('img/Botani.png') }}" alt=""
                                class="object-cover object-center h-[200px] sm:h-[237px] md:h-[274px] lg:h-[450px] 2xl:h-[320px] w-full ">
                        </div>
                        <div class="text-black h-[350px] xl:h-[385px] 2xl:h-auto  xl:w-full ">
                            <div class="h-64 xl:w-auto pt-4 2xl:pt-0 2xl:px-4 flex flex-col justify-between">
                                <div class="w-auto h-auto">
                                    <p class="text-xl sm:text-xl md:text-xl lg:text-xl xl:text-2xl 2xl:text-3xl">JUDUL
                                        EVENT WISATA</p>
                                </div>
                                <div class="h-auto py-2">
                                    <p class="2xl:text-base xl:h-full xl:w-full bg-transparent rounded-xl">
                                        Kebun botani atau kebun raya adalah suatu lahan yang ditanami berbagai jenis
                                        tumbuhan yang ditujukan untuk keperluan koleksi, penelitian, dan konservasi
                                        ex-situ (di luar habitat alami). Kebun botani sering kali berfungsi sebagai
                                        pusat penelitian ilmiah, di mana para ilmuwan mempelajari berbagai aspek
                                        kehidupan tumbuhan, termasuk taksonomi, ekologi, dan konservasi spesies yang
                                        terancam punah. Selain untuk penelitian,
                                    </p>
                                </div>
                                <div class="flex justify-end items-end">
                                    <a href=""
                                        class="xl:text-2xl flex justify-end xl:pt-4 text-end underline">Wisata Buatan -
                                        Wisata Alam</a>
                                </div>
                            </div>
                            <div class="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center mb-24">
                    <a class="py-2 px-20  rounded-3xl text-black font-serif shadow-md shadow-black bg-[#C2C5AA]"
                        style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);" href="">LAINNYA...</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
