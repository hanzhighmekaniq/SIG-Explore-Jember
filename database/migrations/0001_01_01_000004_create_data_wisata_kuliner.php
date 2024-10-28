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
        Schema::create('data_wisata_kuliner', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kuliner');
            $table->text('deskripsi_kuliner')->nullable();
            $table->string('gambar_kuliner')->nullable(); // URL or path to the image
            $table->string('gambar_menu')->nullable(); // URL or path to the image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_wisata_kuliner');
    }
};
