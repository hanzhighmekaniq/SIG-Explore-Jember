<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKategoriDetail extends Model
{
    use HasFactory;

    protected $table = 'kategori_detail';

    protected $fillable = [
        'id_kategori',
        'nama_kategori_detail',
    ];

    public $timestamps = true;

    // Relasi dengan DataWisata
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(DataKategori::class, 'id_kategori', 'id'); // Menentukan foreign key dan local key
    }
    public function wisatas(): HasMany
    {
        return $this->hasMany(DataWisata::class, 'id_kategori_detail', 'id'); // Menentukan foreign key dan local key
    }
}
