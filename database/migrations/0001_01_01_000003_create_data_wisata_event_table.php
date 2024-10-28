<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWisataEventTable extends Migration
{
    public function up()
    {
        Schema::create('data_wisata_event', function (Blueprint $table) {
            $table->id();
            $table->string('nama_event');
            $table->text('deskripsi_event')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_berakhir');
            $table->time('jam_mulai');
            $table->time('jam_berakhir');
            $table->decimal('htm_event', 10, 2);
            $table->string('gambar_event')->nullable(); // URL or path to the image
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_wisata_event');
    }
}
