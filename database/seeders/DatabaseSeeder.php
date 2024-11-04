<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\DataEvent;
use App\Models\DataWisata;
use App\Models\DataKategori;
use App\Models\DataKuliner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        ]);
        // Membuat 5 kategori

        // Membuat 100 wisata dan menggunakan recycle untuk kategori yang sudah dibuat\
        DataKuliner::factory(20)->recycle([
            DataEvent::factory(20)->recycle([
                DataWisata::factory(100)->recycle([
                    DataKategori::factory(3)->create(),
                ])->create()
            ])->create()
        ])->create();

        // DataKuliner::factory(20)->create([
        //     DataWisata::factory()
        // ]);
    }
}
