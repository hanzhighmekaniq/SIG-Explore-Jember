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
        Schema::create('kategori_detail', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori_detail')->unique();
            $table->timestamps();
            $table->foreignId('id_kategori')
                ->nullable()
                ->constrained('data_kategori')
                ->onDelete('set null') // Set ke NULL jika data dihapus
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
