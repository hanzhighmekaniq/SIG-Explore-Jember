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
        Schema::create('data_wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata', 255);
            $table->longText('deskripsi_wisata')->nullable();
            $table->text('fasilitas')->nullable();
            $table->longText('lokasi')->nullable();
            $table->string('img')->nullable();
            $table->json('img_detail')->nullable();
            $table->string('latitude');
            $table->string('longitude');
            $table->decimal('htm_wisata', 10, 5)->nullable();
            $table->decimal('htm_parkir', 10, 5)->nullable();
            $table->timestamps();
            $table->foreignId('id_kategori')->constrained(
                table: 'data_kategori',
                column: 'id',
                indexName: 'wisata_id'
            )->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_wisatas');
    }
};
