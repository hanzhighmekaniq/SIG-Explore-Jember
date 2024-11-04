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
        Schema::create('data_kategori', function (Blueprint $table) {
            $table->id(); // Kolom ID untuk kategori
            $table->string('nama_kategori'); // Kolom untuk nama kategori dengan unique constraint
            $table->string('detail_kategori'); // Kolom untuk detail kategori
            $table->timestamps(); // Kolom created_at dan updated_at
            $table->unique(['nama_kategori', 'detail_kategori']);
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
