<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataWisata extends Model
{
    use HasFactory;

    protected $table = 'data_wisata';

    protected $fillable = [
        'nama_wisata',
        'id_kategori',
        'img',
        'deskripsi_wisata',
        'fasilitas',
        'lokasi',
        'img_detail',
        'latitude',
        'longitude',
        'htm_wisata',
        'htm_parkir',
    ];

    // Relasi dengan model DataKategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(DataKategori::class, 'id_kategori', 'id'); // Menentukan foreign key dan local key
    }

    // Relasi dengan DataKuliner
    public function kuliners(): HasMany
    {
        return $this->hasMany(DataKuliner::class, 'id_wisata', 'id'); // Menentukan foreign key dan local key
    }

    // Relasi dengan DataEvent
    public function events(): HasMany
    {
        return $this->hasMany(DataEvent::class, 'id_wisata', 'id'); // Menentukan foreign key dan local key
    }
}
