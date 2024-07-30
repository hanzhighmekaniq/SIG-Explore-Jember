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
                        style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);"
                            href="">
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



                <div class="p-16">
                    <div class="max-w-4xl mx-auto relative" x-data="{
                        activeSlide: 1,
                        slides: [{
                                id: 1,
                                title: 'Hello 1',
                                body: Lorem ipsum dolor sit amet consecture,
                                adipsicing elit,
                                Laborum,
                                quasi ? ' }, {
                                id : 2,
                                title: 'Hello 2',
                                body: Lorem ipsum dolor sit amet consecture,
                                adipsicing elit,
                                Laborum,
                                quasi ? ' }, {
                                id : 3,
                                title: 'Hello 3',
                                body: Lorem ipsum dolor sit amet consecture,
                                adipsicing elit,
                                Laborum,
                                quasi ? ' }, {
                                id : 4,
                                title: 'Hello 4',
                                body: Lorem ipsum dolor sit amet consecture,
                                adipsicing elit,
                                Laborum,
                                quasi ? ' }, {
                                id : 5,
                                title: 'Hello 5',
                                body: Lorem ipsum dolor sit amet consecture,
                                adipsicing elit,
                                Laborum,
                                quasi ? ' },

                            ]
                        }">
                        {{-- Data LOOPING --}}
                        <template x-for="slide in slides" :key="slide.in">
                            <div x-show="aciveSlide === slide.id"
                                class="p-24 h-80 flex items-center bg-slate-500 text-white">awdaw</div>
                        </template>


                        {{-- TOMBOL PREV / BACK --}}
                        <div></div>
                        {{-- BUTTON --}}
                        <div>
                            <template>
                            </template>
                        </div>
                    </div>
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
                    style="box-shadow: 0px 5px 6px 1px rgba(0, 0, 0, 0.2);"
                        href="">LAINNYA...</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
