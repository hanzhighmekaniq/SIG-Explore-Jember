<x-layadmin>
    <div class="max-w-xl bg-white rounded-lg ">
        <h2 class="text-2xl font-bold mb-4">Ubah Password</h2>

        <!-- Form Ubah Password -->
        <form method="POST" action="{{ route('setting.update', auth()->id()) }}">
            @csrf
            @method('PUT')

            <!-- Password Lama -->
            <label class="block text-sm font-medium text-gray-700">Password Lama</label>
            <input type="password" name="current_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <!-- Password Baru -->
            <label class="block text-sm font-medium text-gray-700">Password Baru</label>
            <input type="password" name="new_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <!-- Konfirmasi Password -->
            <label class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
            <input type="password" name="confirm_password"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-300 mb-4" required>

            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                Ubah Password
            </button>
        </form>
    </div>

</x-layadmin>
