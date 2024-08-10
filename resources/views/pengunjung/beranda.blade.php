<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Jember Tourism</title>
    <!-- Flowbite -->
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <!-- Tailwind CSS -->
    @vite('resources/css/app.css')
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Arimo:ital,wght@0,700;1,700&family=DM+Serif+Display:ital@0;1&family=DM+Serif+Text:ital@0;1&family=Jersey+25&family=Poetsen+One&family=Ramabhadra&family=Righteous&family=Rubik+Mono+One&family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- CSS Font -->
    <link rel="stylesheet" href="./css/font.css">
</head>
<body id="home" class="bg-white p-0 top-0">

    @include('partials.navbarPengunjung')

    <div class="bg-white top-0 w-full h-auto">
        <!-- Hero Section -->
        <div class="relative">
            <img src="{{ asset('img/bg-utama.png') }}" alt="Full Width" class="object-cover w-full h-[500px] sm:h-[584px] md:h-[668px] lg:h-[752px] xl:h-[836px] 2xl:h-[920px]">
            <div class="absolute inset-0 flex items-center justify-center">
                <figcaption class="container text-center space-y-4 lg:space-y-10">
                    <p class="rubik-mono-one-regular font-semibold text-4xl sm:text-5xl md:text-5xl lg:text-6xl xl:text-7xl 2xl:text-7xl text-[#C2C5AA] drop-shadow-lg">
                        WISATA <br> KABUPATEN JEMBER
                    </p>
                    <p class="text-white break-words font-serif text-xs sm:text-sm md:text-base lg:text-lg xl:text-xl drop-shadow-lg">
                        Selamat datang di Jember, kota yang menawarkan pesona alam yang memukau, budaya yang kaya, serta berbagai destinasi wisata menarik. Dari keindahan Pantai Papuma hingga pesona Rembangan yang sejuk, Jember siap memberikan pengalaman liburan yang tak terlupakan. Jelajahi keajaiban alam dan nikmati keragaman budaya di setiap sudut kota yang menawan ini.
                    </p>
                    <div class="w-auto h-auto flex justify-center m-auto">
                        <a class="bg-[#C2C5AA] shadow-lg shadow-gray-800 text-xs xl:text-base px-6 py-2 xl:px-12 xl:py-2 rounded-2xl xl:rounded-3xl text-center flex items-center justify-center font-serif text-black"
                           href="" role="button">Buka Peta Wisata</a>
                    </div>
                </figcaption>
            </div>
        </div>

        <!-- Popular Tourist Spots -->
        <div class="p-4 mt-36 mb-10 flex justify-center items-center">
            <p class="font-bold 2xl:text-4xl mb-10">Wisata Terpopuler</p>
        </div>
        <!-- Tour Boxes Placeholder -->
        <div class=""></div>
        <div class=""></div>
        
        <div class="flex justify-center items-center mb-24">
            <a class="py-2 px-20 rounded-3xl text-black font-serif shadow-md shadow-black bg-[#C2C5AA]"
               href="" role="button">LAINNYA...</a>
        </div>

        <!-- Upcoming Events -->
        <div class="container m-auto">
            <div class="p-4 mt-36 mb-10 flex justify-center items-center">
                <p class="font-bold 2xl:text-4xl mb-10">Event Yang Akan Datang</p>
            </div>

            <!-- Carousel -->
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel Wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Carousel Items -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-1.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Event 1">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-2.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Event 2">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-3.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Event 3">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-4.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Event 4">
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="/docs/images/carousel/carousel-5.svg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Event 5">
                    </div>
                </div>
                <!-- Slider Indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider Controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
