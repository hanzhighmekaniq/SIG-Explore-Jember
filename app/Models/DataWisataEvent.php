<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWisataEvent extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_data_wisata_event';

    protected $fillable = [
        'nama_event',
        'deskripsi_event',
        'tgl_mulai',
        'tgl_berakhir',
        'jam_mulai',
        'jam_berakhir',
        'htm_event',
        'gambar_event'
    ];
    public function dataWisata()
    {
        return $this->hasMany(DataWisataEvent::class, 'id_data_wisata_event');
    }
}
