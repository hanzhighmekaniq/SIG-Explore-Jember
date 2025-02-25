<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    @include('partials.font')
</head>
<div class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
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

<button type="button" data-modal-target="hubungi-kami" data-modal-toggle="hubungi-kami"
    class="fixed bottom-10 right-0 z-50 inline-flex items-center space-x-2.5 rounded-l-lg bg-primary p-3 px-4 uppercase text-primary-foreground duration-300 ease-in-out bg-blue-300 md:pr-5"
    id="radix-:R8m:" aria-haspopup="menu" aria-expanded="false" data-state="closed"><svg
        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="lucide lucide-headset h-4 w-4">
        <path
            d="M3 11h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-5Zm0 0a9 9 0 1 1 18 0m0 0v5a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3Z">
        </path>
        <path d="M21 16v2a4 4 0 0 1-4 4h-5"></path>
    </svg><span class="hidden text-xs font-medium md:inline">Hubungi Kami</span></button>


<div id="hubungi-kami" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-xl max-h-full ">
        <!-- Modal content -->
        <div class="relative bg-[#78c1f3] shadow-sm rounded-md">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 relative bg-[#78c1f3] text-white rounded-t-md">
                <p class="text-xl font-extrabold">HUBUNGI KAMI</p>
                <button type="button"
                    class="text-white bg-transparent hover:bg-gray-600 hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="hubungi-kami">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <footer class="bg-[#78c1f3] text-white pb-4 px-4 rounded-b-lg">
                <div class="m-auto">
                    <!-- Contact Form and Contact Info -->
                    <div class="gap-4">
                        <form action="{{ route('send.mail') }}" method="POST">
                            @csrf
                            <!-- Contact Form -->
                            <div class="space-y-1 max-w-md mx-auto">
                                <p class="text-white text-sm font-bold">Formulir Kritik/Saran</p>

                                <div>
                                    <p class="text-xs text-white font-bold">Nama Anda</p>
                                    <input type="text" placeholder="Nama Anda" name="name" required minlength="3"
                                        maxlength="50"
                                        class="input input-bordered placeholder-shown:border-white focus:border-white placeholder:text-white text-white bg-[#78c1f3] border-white w-full p-2 text-sm" />
                                </div>

                                <div>
                                    <p class="text-xs text-white font-bold">Email</p>
                                    <input type="email" placeholder="Email" name="email" required
                                        class="input input-bordered placeholder-shown:border-white focus:border-white placeholder:text-white text-white bg-[#78c1f3] border-white w-full p-2 text-sm" />
                                </div>

                                <div>
                                    <p class="text-xs text-white font-bold">Kritik Atau Saran</p>
                                    <textarea name="message" required minlength="5"
                                        class="textarea textarea-bordered w-full h-24 placeholder:text-sm focus:border-white placeholder-shown:border-white placeholder:text-white text-white bg-[#78c1f3] p-2 text-sm"
                                        placeholder="Kritik Atau Saran"></textarea>
                                </div>

                                <button type="submit"
                                    class="btn bg-white text-blue-bg-[#78c1f3] py-1 text-sm font-bold w-full">Kirim</button>
                                <div class=" text-start pt-4">
                                    <p class="text-xl font-bold text-white pacifico-regular mb-2">Visit Jember</p>
                                    <div class="items-center  justify-start  text-start mb-2">
                                        <p class=" text-white text-xs font-semibold">085259990293</p>
                                        <p class=" text-white text-xs font-semibold">cs.visit@gmail.com</p>
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
