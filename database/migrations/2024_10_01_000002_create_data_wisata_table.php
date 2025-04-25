<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata', 255)->unique();
            $table->longText('deskripsi_wisata')->nullable();
            $table->text('fasilitas')->nullable();
            $table->longText('lokasi')->nullable();
            $table->string('img')->nullable();
            $table->longText('img_detail')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->string('htm_wisata')->nullable();
            $table->string('htm_parkir')->nullable();
            $table->json('jam_operasional')->nullable(); // Kolom baru untuk jam buka & tutup
            $table->timestamps();

            $table->foreignId('id_kategori_detail')
                ->nullable()
                ->constrained('kategori_detail')
                ->onDelete('set null')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_wisata');
    }
};
