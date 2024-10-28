<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWisata extends Model
{
    use HasFactory;

    protected $table = 'data_wisata';

    protected $fillable = [
        'nama_wisata',
        'kategori_wisata',
        'deskripsi_wisata',
        'fasilitas',
        'lokasi',
        'latitude',
        'longitude',
        'htm_wisata',
        'htm_parkir', // Pastikan nama kolom sesuai dengan migrasi
        'id_data_wisata_event',
        'id_data_wisata_kuliner'
    ];

    public $timestamps = true;
}
