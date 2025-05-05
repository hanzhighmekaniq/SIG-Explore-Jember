<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = ['wisata_id', 'nama', 'judul', 'komentar', 'rating'];

    public function wisata()
    {
        return $this->belongsTo(DataWisata::class, 'wisata_id');
    }
}
