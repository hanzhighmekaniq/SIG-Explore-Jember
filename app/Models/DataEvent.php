<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataEvent extends Model
{
    use HasFactory;

    protected $table = 'data_event'; // Nama tabel

    protected $fillable = [
        'id_wisata',          // Kolom yang bisa diisi
        'nama_event',
        'deskripsi_event',
        'event_mulai',
        'event_berakhir',
        'htm_event',
        'img',
    ];

    // Relasi dengan model DataWisata
    public function wisata()
    {
        return $this->belongsTo(DataWisata::class, 'id_wisata', 'id'); // Menghubungkan ke model DataWisata
    }
}
