<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $fillable = [
        'id_wisata',
        'nama',
        'judul',
        'komentar',
        'rating',
    ];

    public function wisata(): BelongsTo
    {
        return $this->belongsTo(DataWisata::class, 'id_wisata', 'id');
    }
}

