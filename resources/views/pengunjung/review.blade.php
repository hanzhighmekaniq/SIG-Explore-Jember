<!-- review.blade.php -->
<div class="md:flex gap-6 mt-6">
    <!-- KIRI: RINGKASAN RATING -->
    <div class="w-full md:w-1/3 p-4 border rounded bg-white shadow">
        <div class="text-3xl font-bold text-green-600">
            {{ number_format($rataRating, 1) }}
        </div>
        <div class="flex items-center mb-4">
            @for ($i = 1; $i <= 5; $i++)
                <svg class="w-5 h-5 {{ $i <= floor($rataRating) ? 'text-green-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.3 4.005h4.21c.969 0 1.371 1.24.588 1.81l-3.404 2.474 1.3 4.005c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.404 2.474c-.785.57-1.84-.197-1.54-1.118l1.3-4.005L2.952 8.742c-.783-.57-.38-1.81.588-1.81h4.21l1.3-4.005z"/>
                </svg>
            @endfor
            <span class="ml-2 text-sm text-gray-500">({{ $totalKomentar }} ulasan)</span>
        </div>

        @foreach ($ratingStats as $kategori => $jumlah)
            <div class="mb-1 text-sm">
                <div class="flex justify-between">
                    <span>{{ $kategori }}</span>
                    <span>{{ $jumlah }}</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2.5">
                    <div class="bg-green-500 h-2.5 rounded-full" style="width: {{ $totalKomentar > 0 ? ($jumlah / $totalKomentar) * 100 : 0 }}%"></div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- KANAN: DAFTAR KOMENTAR -->
    <div class="w-full md:w-2/3 p-4 space-y-4">
        @forelse ($komentar as $k)
            <div class="border rounded-lg p-4 shadow-sm bg-white">
                <div class="flex items-center gap-2 mb-2">
                    <div class="bg-gray-300 w-10 h-10 rounded-full flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr($k->nama, 0, 1)) }}
                    </div>
                    <div>
                        <div class="font-semibold text-sm">{{ $k->nama ?? 'Anonim' }}</div>
                        <div class="text-xs text-gray-500">{{ $k->created_at->format('d M Y') }}</div>
                    </div>
                </div>
                <div class="flex items-center text-green-500 mb-1">
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $k->rating ? 'text-green-500' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.3 4.005h4.21c.969 0 1.371 1.24.588 1.81l-3.404 2.474 1.3 4.005c.3.921-.755 1.688-1.54 1.118L10 13.347l-3.404 2.474c-.785.57-1.84-.197-1.54-1.118l1.3-4.005L2.952 8.742c-.783-.57-.38-1.81.588-1.81h4.21l1.3-4.005z"/>
                        </svg>
                    @endfor
                </div>
                <p class="text-gray-800">{{ Str::limit($k->komentar, 150) }}</p>
                @if(strlen($k->komentar) > 150)
                    <button class="text-green-600 text-sm hover:underline">Selengkapnya</button>
                @endif
            </div>
        @empty
            <p class="text-gray-500">Belum ada ulasan untuk wisata ini.</p>
        @endforelse
    </div>
</div>
