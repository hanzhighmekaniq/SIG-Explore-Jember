{{-- pacifico-regular --}}

@include('partials.navbarPengunjung')
<div class="bg-white h-auto w-full">

    <div class="container m-auto">
        <div class="m-auto w-96 pt-36 pb-32 text-[#333D29] text-6xl">
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
            <button class="btn bg-[#414833] text-white">Button</button>
            <button class="btn bg-[#414833] border-none text-white" onclick="my_modal_2.showModal()">FILTER
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="20" height="20" x="0" y="0" viewBox="0 0 512 512"
                    style="enable-background:new 0 0 512 512" xml:space="preserve">
                    <g>
                        <path
                            d="M16 90.259h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.088 72.778-58.508H496c8.836 0 16-7.164 16-16s-7.164-16-16-16h-90.847c-7.356-33.402-37.241-58.507-72.77-58.507-35.548 0-65.419 25.101-72.772 58.507H16c-8.836 0-16 7.164-16 16s7.164 16 16 16zm273.877-15.958.001-.172c.07-23.367 19.137-42.376 42.505-42.376 23.335 0 42.403 18.983 42.504 42.339l.003.235c-.037 23.407-19.091 42.441-42.507 42.441-23.406 0-42.454-19.015-42.507-42.408zM496 421.74h-90.847c-7.357-33.401-37.241-58.507-72.77-58.507-35.548 0-65.419 25.102-72.772 58.507H16c-8.836 0-16 7.163-16 16s7.164 16 16 16h243.605c7.342 33.419 37.186 58.508 72.778 58.508s65.436-25.089 72.778-58.508H496c8.836 0 16-7.163 16-16s-7.164-16-16-16zm-163.617 58.508c-23.406 0-42.454-19.015-42.507-42.408l.001-.058.001-.172c.07-23.367 19.137-42.377 42.505-42.377 23.335 0 42.403 18.983 42.504 42.338l.003.235c-.034 23.41-19.089 42.442-42.507 42.442zM496 240H252.395c-7.342-33.419-37.186-58.507-72.778-58.507S114.181 206.581 106.839 240H16c-8.836 0-16 7.164-16 16 0 8.837 7.164 16 16 16h90.847c7.357 33.401 37.241 58.507 72.77 58.507 35.548 0 65.419-25.102 72.772-58.507H496c8.836 0 16-7.163 16-16 0-8.836-7.164-16-16-16zm-273.877 15.958-.001.172c-.07 23.367-19.137 42.376-42.505 42.376-23.335 0-42.403-18.983-42.504-42.338l-.003-.234c.035-23.41 19.09-42.441 42.507-42.441 23.406 0 42.454 19.014 42.507 42.408z"
                            fill="#ffffff" opacity="1" data-original="#000000"></path>
                    </g>
                </svg>
            </button>
            <dialog id="my_modal_2" class="modal">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Hello!</h3>
                    <p class="py-4">Press ESC key or click outside to close</p>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
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
            {{-- CLONE --}}
        </div>
    </div>

</div>
