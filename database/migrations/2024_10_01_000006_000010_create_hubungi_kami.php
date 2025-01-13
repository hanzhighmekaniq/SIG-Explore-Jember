<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hubungi_kami', function (Blueprint $table) {
            $table->id('id_pengunjung');
            $table->string('nama');
            $table->string('email');
            $table->text('kritik_saran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hubungi_kami');
    }
};
