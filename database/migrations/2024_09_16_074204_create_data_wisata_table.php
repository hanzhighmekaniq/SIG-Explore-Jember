<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWisataTable extends Migration
{
    public function up()
    {
        Schema::create('data_wisata', function (Blueprint $table) {
            $table->id('id_wisata');
            $table->string('nama_wisata');
            $table->string('kategori_wisata');
            $table->text('deskripsi_wisata')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->decimal('htm_wisata', 10, 2);
            $table->decimal('htm_parkir', 10, 2);
            $table->unsignedBigInteger('id_data_wisata_event')->nullable();
            $table->unsignedBigInteger('id_data_wisata_kuliner')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_wisata');
    }
}
