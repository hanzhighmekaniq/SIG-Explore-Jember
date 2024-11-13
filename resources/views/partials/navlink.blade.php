{{-- TAMBAH" --}}

<ul class="text-sm  flex font-medium text-center text-gray-500 rounded-lg  ">

    <li class="flex {{ request()->routeIs('wisata.index','wisata.create','wisata.edit') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="{{ route('wisata.index') }}" class="flex justify-center  py-2 items-center border px-4 border-gray-400 ">
            Wisata
            <div
                class="flex items-center justify-center w-full border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
            </div>
        </a>
    </li>
    <li class="flex {{ request()->routeIs('event.index','event.create','event.edit') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="{{ route('event.index') }}" class="flex justify-center  py-2 items-center border px-4 border-gray-400  ">

            <div
                class="flex items-center justify-center w-full border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Event</div>
        </a>
    </li>
    <li class="flex {{ request()->routeIs('kuliner.index','kuliner.create','kuliner.edit') ? 'bg-[#656D4A]  text-white' : '' }}">
        <a href="{{ route('kuliner.index') }}"
            class="flex justify-center  py-2 items-center border px-4 border-gray-400   ">

            <div
                class="flex items-center justify-center w-full border-gray-200   focus:ring-4 focus:ring-blue-300 focus:outline-none ">
                Kuliner</div>
        </a>
    </li>
</ul>
