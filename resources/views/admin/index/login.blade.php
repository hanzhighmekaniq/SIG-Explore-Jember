<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #004165;
        }

        /* Background Slideshow */
        .background-slideshow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 2s ease-in-out;
        }

        .background-image.active {
            opacity: 1;
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen">
    <!-- Background Slideshow -->
    <div class="background-slideshow">
        <div class="background-image" id="background-image-1"></div>
        <div class="background-image" id="background-image-2"></div>
    </div>

    <!-- Konten Utama -->
    <div class="relative w-full max-w-5xl mx-4 p-6 md:p-12 bg-[#004165] bg-opacity-50 rounded-lg shadow-lg backdrop-blur-md">
        <!-- Logo -->
        <div class="absolute top-4 left-4 md:top-8 md:left-8">
            <img alt="Logo" class="w-10 h-10 md:w-12 md:h-12" src="img/lugu.webp">
        </div>

        <!-- Konten Utama -->
        <div class="flex flex-col md:flex-row items-center justify-between">
            <!-- Bagian Kiri (Welcome Message) -->
            <div class="text-white md:w-1/2 text-center md:text-left mb-8 md:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold mb-4 font-fjalla uppercase">Selamat Datang!</h1>
                <p class="mb-6 text-sm md:text-lg font-montserrat">
                    Anu ini loginnya khusus atmin jd kl elu bkn atmin pergi aj deh pencet tombol ny yh mksi.
                </p>
                <a class="px-6 py-2 md:px-8 md:py-3 bg-green-500 text-white rounded-full text-sm md:text-lg hover:bg-green-600 transition-all duration-300" href="/">
                    Home
                </a>
            </div>

            <!-- Bagian Kanan (Form Login) -->
            <div class="bg-[#004165] bg-opacity-40 p-6 md:p-10 rounded-lg w-full md:w-1/2">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-6 font-montserrat uppercase">Masuk</h2>
                <form action="{{ route('session.login') }}" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-4">
                        <div class="flex items-center border-b border-gray-400 py-2">
                            <i class="fas fa-envelope text-white mr-3"></i>
                            <input class="font-montserrat appearance-none bg-transparent border-none w-full text-white 
                                        mr-3 py-1 px-2 leading-tight focus:outline-none" name="email" type="email" placeholder="Email" aria-label="Email">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <div class="flex items-center border-b border-gray-400 py-2">
                            <i class="fas fa-lock text-white mr-3"></i>
                            <input class="font-montserrat appearance-none bg-transparent border-none w-full text-white 
                                        mr-3 py-1 px-2 leading-tight focus:outline-none" name="password" type="password" placeholder="Password" aria-label="Password">
                        </div>
                    </div>

                    <!-- Remember Me dan Lupa Password -->
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember" class="mr-3">
                            <label for="remember" class="text-gray-300 text-sm md:text-lg font-montserrat">Remember me</label>
                        </div>
                        <a href="#" class="text-blue-400 hover:underline text-sm md:text-lg font-montserrat">Forgot Password?</a>
                    </div>

                    <!-- Tombol Login -->
                    <button type="submit"
                        class="font-montserrat w-full py-2 md:py-3 bg-gradient-to-r from-orange-400 to-pink-500 text-white rounded-full text-sm 
                                md:text-lg hover:from-orange-500 hover:to-pink-600 transition-all duration-300">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Toast Notifications -->
    @if ($message = Session::get('success'))
        <div id="toast-success"
            class="absolute top-10 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
            role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $message }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-success" aria-label="Close" onclick="closeToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <script>
            function closeToast() {
                document.getElementById('toast-success').classList.add('hidden');
            }
            setTimeout(closeToast, 5000);
        </script>
    @endif

    @if ($errors->any())
        <div id="toast-error"
            class="absolute top-10 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
            role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                aria-label="Close" onclick="closeErrorToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>

        <script>
            function closeErrorToast() {
                document.getElementById('toast-error').classList.add('hidden');
            }
        </script>
    @endif

    <!-- JavaScript untuk mengontrol pergantian foto -->
    <script>
        const photos = [
            "url('/img/log1.jpg')", // Ganti dengan path foto Anda
            "url('/img/log2.jpg')",
            "url('/img/log3.jpg')",
            "url('/img/log4.jpg')",
            "url('/img/log5.jpg')",
        ];

        const background1 = document.getElementById("background-image-1");
        const background2 = document.getElementById("background-image-2");
        let currentPhotoIndex = 0;
        let isBackground1Active = true;

        function changeBackground() {
            const nextPhotoIndex = (currentPhotoIndex + 1) % photos.length;

            // Tentukan elemen yang aktif dan yang tidak aktif
            const activeBackground = isBackground1Active ? background1 : background2;
            const inactiveBackground = isBackground1Active ? background2 : background1;

            // Set gambar berikutnya ke elemen yang tidak aktif
            inactiveBackground.style.backgroundImage = photos[nextPhotoIndex];

            // Tambahkan class 'active' ke elemen yang tidak aktif
            inactiveBackground.classList.add('active');

            // Hapus class 'active' dari elemen yang aktif setelah transisi selesai
            setTimeout(() => {
                activeBackground.classList.remove('active');
            }, 2000); // Sesuaikan dengan durasi transisi di CSS

            // Update indeks dan status elemen aktif
            currentPhotoIndex = nextPhotoIndex;
            isBackground1Active = !isBackground1Active;
        }

        // Mulai animasi dengan mengganti foto setiap 4 detik
        setInterval(changeBackground, 4000);

        // Jalankan sekali di awal
        background1.style.backgroundImage = photos[currentPhotoIndex];
        background1.classList.add('active');
    </script>
</body>

</html>