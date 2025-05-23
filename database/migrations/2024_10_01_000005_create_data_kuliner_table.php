<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_kuliner', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kuliner');
            $table->text('deskripsi_kuliner')->nullable();
            $table->string('gambar_kuliner')->nullable();
            $table->longText('gambar_menu')->nullable();
            $table->string('no_hp');
            $table->json('jam_operasional')->nullable(); // Kolom baru untuk jam buka & tutup
            $table->timestamps();

            // Ubah 'data_kategoris' menjadi 'data_wisata' jika itu tabel yang benar
            $table->foreignId('id_wisata')
            ->nullable() // Membuat kolom ini bisa NULL
                ->constrained('data_wisata') // Nama tabel yang dijadikan referensi
                ->onDelete('set null') // Aturan saat data dihapus
                ->onUpdate('cascade'); // Aturan saat data diupdate

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_kuliner');
    }
};
