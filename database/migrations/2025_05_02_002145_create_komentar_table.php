<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->longText('komentar'); // isi komentar
            $table->unsignedTinyInteger('rating')->nullable(); // rating (opsional)

            // Relasi ke wisata
            $table->foreignId('id_wisata')
                ->constrained('data_wisata') // sesuaikan dengan nama tabel wisata kamu
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentar');
    }
};
