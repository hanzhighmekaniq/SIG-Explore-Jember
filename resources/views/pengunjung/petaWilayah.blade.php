@include('partials.navbarPengunjung')
<div class="bg-white h-auto w-full">
    <div class="container m-auto">
        <div class="m-auto w-96 pt-36 pb-32 text-[#333D29] text-6xl">
            <p class="text-start font-extrabold xl:text-4xl">PETA WILAYAH</p>
            <p class="pacifico-regular text-start">Kabupaten</p>
            <p class="pacifico-regular text-end mt-[-8px]">Jember</p>
        </div>
        <div class="flex justify-center items-center pb-32">
            <img class="w-auto 2xl:h-[666px]" src="{{ asset('img/Group 87.png') }}" alt="">
        </div>
        <p class="m-auto text-center text-2xl font-serif font-semibold pb-10 text-black">Daftar Titik Lokasi Wisata</p>
        <div class="md:justify-between md:flex pb-4">
            <div class="md:mb-0 mb-4  flex">
                <button class="btn bg-white text-black hover:bg-[#414833] hover:text-white">Pilih Lokasi Anda</button>

            </div>
            <div class="flex space-x-2">
                <label
                    class="input input-bordered bg-white border-[#414833] focus-within:border-[#414833] flex items-center gap-2">
                    <input type="text"
                        class="border-transparent placeholder-black text-black focus:border-transparent focus:ring-0 placeholder-shown:border-[#414833]"
                        placeholder="Pencarian" />
                </label>
                <button class="btn bg-[#414833] px-6 text-white">Cari</button>
                <button class="btn bg-[#414833] border-none text-white" onclick="my_modal_2.showModal()">FILTER
                    <svg class="" xmlns="http://www.w3.org/2000/svg" version="1.1"
                        xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" x="0" y="0"
                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
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
        </div>
        <div class="overflow-x-auto pb-20 ">
            <table class="table table-lg table-pin-rows table-pin-cols bg-white">
                <thead>
                    <tr class="bg-white  border border-black text-lg">
                        <th class="border border-black text-black bg-white">No</th>
                        <td class="border border-black text-black bg-white">Wisata</td>
                        <td class="border border-black text-black bg-white">Jenis</td>
                        <td class="border border-black text-black bg-white">Jarak Dari Lokasi</td>
                        <td class="border border-black text-black bg-white">Titik Lokasi</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border bg-white   border-black text-black">1</th>
                        <td class="border border-black text-black">Pantai Payangan</td>
                        <td class="border border-black text-black">Alam</td>
                        <td class="border border-black text-black">4 KM</td>
                        <td class="border border-black text-black underline">Lihat</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>
