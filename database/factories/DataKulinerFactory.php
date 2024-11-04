<?php

namespace Database\Factories;

use App\Models\DataWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataKuliner>
 */
class DataKulinerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kuliner' => fake()->word(),
            'id_wisata' => DataWisata::inRandomOrder()->first()->id, // Ini akan diisi dari seeder atau recycle
            'deskripsi_kuliner' => fake()->paragraph(),
        ];
    }
}
