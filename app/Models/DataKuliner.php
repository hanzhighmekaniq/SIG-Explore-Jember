<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DataKuliner extends Model
{
    protected $table = 'data_kuliner'; // Nama tabel yang sesuai
    use HasFactory;
    protected $fillable = [
        'id_wisata',         // Kolom yang bisa diisi
        'nama_kuliner',
        'deskripsi_kuliner',
        'gambar_kuliner',
        'gambar_menu',
    ];

    public function wisata(): BelongsTo
    {
        return $this->belongsTo(DataWisata::class, 'id_wisata', 'id'); // Menghubungkan ke model DataWisata
    }
}
