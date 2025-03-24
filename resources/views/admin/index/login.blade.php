<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/png" href="img/logo-no-color.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    @include('partials.head')
    @include('partials.font')
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000000;
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
    <div
        class="relative w-full max-w-xl mx-4 p-6 md:p-12 bg-opacity-50 bg-slate-800 rounded-2xl shadow-lg backdrop-blur-sm">
        <!-- Logo dan Judul -->
        <div class="flex items-center mb-8">
            <img src="img/logo-no-color.png" alt="Logo Explore Jember" class="w-10 h-10 mr-3">
            <h1 class="text-xl font-regular text-white pacifico-regular">Explore Jember</h1>
        </div>

        <!-- Judul dan Deskripsi -->
        <h1 class="text-2xl md:text-3xl font-bold text-white mb-6 font-montserrat uppercase animate-fade-in">
            Selamat Datang, Admin!
        </h1>
        <p class="mb-6 text-sm md:text-lg font-montserrat text-white animate-fade-in-delay">
            Halaman login ini khusus untuk administrator. Jika Anda bukan admin, harap tidak mencoba mengakses halaman
            ini. Silakan kembali ke halaman utama dengan menekan tombol di bawah.
        </p>

        <!-- Form Login -->
        <form action="{{ route('session.login') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Email -->
            <div class="mb-4">
                <div class="flex items-center border-b border-gray-400 py-2">
                    <i class="fas fa-envelope text-white mr-3"></i>
                    <input
                        class="font-montserrat appearance-none bg-transparent border-none w-full text-white
                                mr-3 py-1 px-2 leading-tight focus:outline-none placeholder-gray-400 placeholder:text-white"
                        name="email" type="email" placeholder="Email" aria-label="Email" required>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-6 relative">
                <div class="flex items-center border-b border-gray-400 py-2">
                    <i class="fas fa-lock text-white mr-3"></i>
                    <input
                        class="font-montserrat appearance-none bg-transparent border-none w-full text-white
                                mr-3 py-1 px-2 leading-tight focus:outline-none placeholder-gray-400 placeholder:text-white"
                        name="password" type="password" placeholder="Password" aria-label="Password" required>
                    <i class="fas fa-eye text-white cursor-pointer absolute right-3"
                        onclick="togglePasswordVisibility()"></i>
                </div>
            </div>

            <!-- Remember Me dan Lupa Password -->
            <!--<div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="mr-3">
                    <label for="remember" class="text-gray-400 text-sm md:text-lg font-montserrat">Remember me</label>
                </div>
                <a href="#" class="text-blue-400 hover:underline text-sm md:text-lg font-montserrat">Forgot Password?</a>
            </div>-->

            <!-- Tombol Login -->
            <button type="submit"
                class="mt-6 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                font-montserrat w-full py-2 md:py-3
                {{-- bg-gradient-to-r from-orange-400 to-pink-500 --}}
bg-gradient-to-r from-indigo-800 to-blue-600
                text-white rounded-full text-sm
                md:text-lg hover:from-indigo-900 hover:to-blue-700 hover-scale">
                Login
            </button>
        </form>

        <!-- Tombol Kembali ke Home -->
        <a href="/"
            class="mt-6 transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95
                w-full px-6 py-2 md:px-8 md:py-3
                	bg-red-600 hover:bg-red-700
                 text-white rounded-full text-sm md:text-lg  flex justify-center hover-scale">
            Kembali ke Halaman Utama
        </a>
    </div>

    <!-- Toast Notifications -->
    @if ($message = Session::get('success'))
        <div id="toast-success"
            class="absolute top-10 left-1/2 transform -translate-x-1/2 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ $message }}</div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8"
                data-dismiss-target="#toast-success" aria-label="Close" onclick="closeToast()">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
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
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
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

    <script>
        // Fungsi untuk toggle visibility password
        function togglePasswordVisibility() {
            const passwordInput = document.querySelector('input[name="password"]');
            const eyeIcon = document.querySelector('.fa-eye');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>

</html>
