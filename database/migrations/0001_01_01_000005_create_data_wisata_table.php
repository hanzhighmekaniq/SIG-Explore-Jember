<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataWisataTable extends Migration
{
    public function up()
    {
        Schema::create('data_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata')->unique();
            $table->string('kategori_wisata');
            $table->text('deskripsi_wisata')->nullable();
            $table->string('img')->nullable();
            $table->json('img_wisata')->nullable();
            $table->text('fasilitas')->nullable();
            $table->string('lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->decimal('htm_wisata', 10, 2);
            $table->decimal('htm_parkir', 10, 2);

            // Foreign key untuk event wisata
            $table->foreignId('event_id')->nullable()->constrained('data_wisata_event')->onDelete('cascade');

            // Foreign key untuk kuliner
            $table->foreignId('kuliner_id')->nullable()->constrained('data_wisata_kuliner')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_wisata');
    }
}
