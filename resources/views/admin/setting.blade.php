<x-layadmin>
    <div class="max-w-xl bg-white rounded-lg ">
        <h2 class="text-2xl font-bold mb-4 font-poppins">Ubah Password</h2>

        <!-- Form Ubah Password -->
        <form method="POST" action="{{ route('setting.update', auth()->id()) }}">
            @csrf
            @method('PUT')

            <!-- Password Lama -->
            <label class="block text-sm font-medium text-gray-700 font-poppins">Password Lama</label>
            <input type="password" name="current_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <!-- Password Baru -->
            <label class="block text-sm font-medium text-gray-700 font-poppins">Password Baru</label>
            <input type="password" name="new_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <!-- Konfirmasi Password -->
            <label class="block text-sm font-medium text-gray-700 font-poppins">Konfirmasi Password</label>
            <input type="password" name="confirm_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <button type="submit"
                class="font-poppins h-full px-4 py-2 text-xs text-white bg-blue-600 border border-gray-300
                        rounded-r-md hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
                        transition-all duration-200 ease-in-out hover:-translate-y-1 active:translate-y-0 active:scale-95">
                Ubah Password
            </button>
        </form>
    </div>

</x-layadmin>
