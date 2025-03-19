<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @include('partials.font')
</head>


<div id="navbar" class="fixed top-0 left-0 w-full bg-white bg-opacity-100 shadow-lg z-50 transition-all duration-300">
    @include('partials.navbarPengunjung')
</div>

    
<body class="bg-white">
    {{ $slot }}
</body>
@if (session('success'))
    <div id="alert-success"
        class="fixed top-20 left-1/2 -translate-x-1/2 bg-green-500 text-white p-3 rounded-md shadow-lg animate-fade-in">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="alert-error"
        class="fixed top-20 left-1/2 -translate-x-1/2 bg-red-500 text-white p-3 rounded-md shadow-lg animate-fade-in">
        {{ session('error') }}
    </div>
@endif

<script>
    // Auto-hide alert setelah 3 detik
    setTimeout(() => {
        document.getElementById('alert-success')?.classList.add('hidden');
        document.getElementById('alert-error')?.classList.add('hidden');
    }, 3000);
</script>

<style>
    /* Animasi fade-in */
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>


@include('partials.footerPengunjung')

</html>

<button type="button" data-modal-target="service" data-modal-toggle="service"
    class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 fixed bottom-10 right-0 z-50 inline-flex items-center space-x-3 rounded-l-lg bg-primary p-4 px-5 uppercase text-primary-foreground duration-300 ease-in-out bg-[#004165] md:pr-6 hover:bg-[#003055] transition-all"
    id="radix-:R8m:" aria-haspopup="menu" aria-expanded="false" data-state="closed">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-headset h-6 w-6 text-white">
        <path
            d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z">
        </path>
        <path d="M21 16v2a4 4 0 0 1-4 4h-5"></path>
    </svg>
    <span class="hidden text-xl font-medium md:inline text-white font-fjalla uppercase">Hubungi Kami</span>
</button>

<div id="service" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div
            class="relative bg-gradient-to-r from-[#0077B4cc] to-[#004165cc] shadow-sm rounded-2xl backdrop-blur-sm animate-fade-in">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-6 md:p-8 relative bg-gradient-to-r from-[#0077B4cc] to-[#004165cc] text-white rounded-t-2xl">
                <p class="text-4xl font-extrabold font-fjalla">HUBUNGI KAMI</p>
                <button type="button"
                    class="transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95 text-white bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-lg w-10 h-10 ms-auto inline-flex justify-center items-center transition-all duration-300"
                    data-modal-hide="service">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <footer class="bg-gradient-to-r from-[#0077B4cc] to-[#004165cc] text-white pb-6 px-6 rounded-b-2xl">
                <div class="m-auto">
                    <!-- Contact Form and Contact Info -->
                    <div class="gap-4">
                        <form action="{{ route('send.mail') }}" method="POST">
                            @csrf
                            <!-- Contact Form -->
                            <div class="space-y-2 max-w-md mx-auto">
                                <p class="text-white text-lg font-bold font-poppins">Formulir Kritik/Saran</p>

                                <div>
                                    <!--<p class="text-m text-white font-bold font-poppins">Nama Anda</p> -->
                                    <input type="text" placeholder="Nama Anda" name="name" required minlength="3"
                                        maxlength="50"
                                        class="rounded font-poppins input input-bordered placeholder:text-lg placeholder-shown:border-white focus:border-white placeholder:text-gray-300 text-white bg-transparent border-white w-full p-3 text-base" />
                                </div>

                                <div>
                                    <!-- <p class="text-m text-white font-bold font-poppins">Email</p> -->
                                    <input type="email" placeholder="Email" name="email" required
                                        class="rounded font-poppins input input-bordered placeholder:text-lg placeholder-shown:border-white focus:border-white placeholder:text-gray-300 text-white bg-transparent border-white w-full p-3 text-base" />
                                </div>

                                <div>
                                    <!-- <p class="text-m text-white font-bold font-poppins">Kritik Atau Saran</p> -->
                                    <textarea name="message" required minlength="5"
                                        class="rounded font-poppins textarea textarea-bordered w-full h-32 placeholder:text-lg focus:border-white placeholder-shown:border-white placeholder:text-gray-300 text-white bg-transparent p-3 text-base"
                                        placeholder="Kritik Atau Saran"></textarea>
                                </div>

                                <button type="submit"
                                    class="rounded  btn bg-white text-[#0077B4] py-2 text-base font-bold w-full hover:bg-gray-100 transition-all duration-300 font-poppins text-m uppercase transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">Kirim</button>
                                <div class="text-start pt-6">
                                    <p class="text-4xl font-bold text-white pacifico-regular mb-4">Explore Jember</p>
                                    <div class="items-center justify-start text-start mb-4">
                                        <p class="text-white text-2xl font-fjalla">085259990293</p>
                                        <p class="text-white text-2xl font-fjalla">cs.visit@gmail.com</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Contact Information -->
                        </form>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
