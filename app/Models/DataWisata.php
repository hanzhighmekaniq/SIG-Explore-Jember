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
        'id_kategori_detail',
        'img',
        'deskripsi_wisata',
        'fasilitas',
        'lokasi',
        'img_detail',
        'jam_operasional',
        'latitude',
        'longitude',
        'htm_wisata',
        'htm_parkir',
    ];

    // Di model DataWisata
    public function kategori_detail(): BelongsTo
    {
        return $this->belongsTo(DataKategoriDetail::class, 'id_kategori_detail', 'id');
    }

    // Relasi dengan DataKuliner
    public function kuliners(): HasMany
    {
        return $this->hasMany(DataKuliner::class, 'id_wisata', 'id');
    }

    // Relasi dengan DataEvent
    public function events(): HasMany
    {
        return $this->hasMany(DataEvent::class, 'id_wisata', 'id');
    }

    public function komentars(): HasMany
    {
        return $this->hasMany(Komentar::class, 'id_wisata', 'id');
    }

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'id_wisata');
    }
}

