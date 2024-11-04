<?php

namespace Database\Factories;

use App\Models\DataWisata;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataEvent>
 */
class DataEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition():array
    {
        return [
            'nama_event' => fake()->word(),
            'id_wisata' => DataWisata::inRandomOrder()->first()->id,// Ini akan diisi dari seeder atau recycle
            'deskripsi_event' => fake()->paragraph(),
            'event_mulai' => fake()->dateTime(),
            'event_berakhir' => fake()->dateTime(),
            'htm_event' => fake()->numberBetween(5000, 50000), // Contoh untuk harga tiket masuk
        ];
    }
}
