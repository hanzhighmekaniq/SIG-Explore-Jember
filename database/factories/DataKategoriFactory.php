<?php

namespace Database\Factories;

use App\Models\DataKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataKategoriFactory extends Factory
{
    protected $model = DataKategori::class;

    public function definition(): array
    {
        do {
            // Buat nilai acak untuk `nama_kategori` dan `detail_kategori`
            $nama_kategori = $this->faker->word();
            $detail_kategori = $this->faker->sentence();

            // Cek apakah kombinasi ini sudah ada di database
            $exists = DataKategori::where('nama_kategori', $nama_kategori)
                ->where('detail_kategori', $detail_kategori)
                ->exists();
        } while ($exists); // Ulangi sampai mendapatkan kombinasi unik

        return [
            'nama_kategori' => $nama_kategori,
            'detail_kategori' => $detail_kategori,
        ];
    }
}
