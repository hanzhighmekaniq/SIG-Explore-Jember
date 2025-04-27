<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_event', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi_event')->nullable();

            // Event temporer (sekali jalan)
            $table->datetime('event_mulai')->nullable();    // Tanggal + waktu mulai
            $table->datetime('event_berakhir')->nullable(); // Tanggal + waktu selesai

            // Event permanen (berulang setiap minggu)
            $table->json('jadwal_mingguan')->nullable(); // Disimpan dalam format JSON misalnya: [{"hari": "Senin", "jam_mulai": "08:00", "jam_akhir": "12:00"}, ...]

            $table->boolean('is_temporer')->default(true);

            $table->integer('htm_event')->nullable(); // Harga Tiket Masuk
`            $table->string('img')->nullable(); // Gambar
            $table->timestamps();

            // Foreign key ke tempat wisata
            $table->foreignId('id_wisata')
                ->nullable()
                ->constrained('data_wisata')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('data_event');
    }
};
