<?php

namespace Database\Factories;

use App\Models\DataWisata;
use App\Models\DataKategori;
use Illuminate\Database\Eloquent\Factories\Factory;

class DataWisataFactory extends Factory
{
    protected $model = DataWisata::class;

    public function definition():array
    {
        return [
            'nama_wisata' => fake()->word(),
            'id_kategori' => DataKategori::inRandomOrder()->first()->id,// Ini akan diisi dari seeder atau recycle
            'deskripsi_wisata' => fake()->paragraph(),
            'fasilitas' => fake()->sentence(),
            'lokasi' => fake()->address(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'htm_wisata' => fake()->numberBetween(5000, 50000), // Contoh untuk harga tiket masuk
            'htm_parkir' => fake()->numberBetween(2000, 10000), // Contoh untuk harga tiket parkir

        ];
    }
}
