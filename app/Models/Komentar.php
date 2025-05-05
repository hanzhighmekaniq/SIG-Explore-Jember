<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = [
        'wisata_id',
        'nama',
        'judul',
        'komentar',
        'rating',
    ];

    protected $table = 'komentar';

    public function wisata()
    {
        return $this->belongsTo(DataWisata::class, 'wisata_id');
    }

}
