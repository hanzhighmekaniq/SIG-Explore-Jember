<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DataKategori extends Model
{
    use HasFactory;

    protected $table = 'data_kategori';

    protected $fillable = [
        'nama_kategori',
    ];

    public $timestamps = true;

    // Relasi dengan DataWisata
    public function kategori_details(): HasMany
    {
        return $this->hasMany(DataKategoriDetail::class, 'id_kategori', 'id'); // Menentukan foreign key dan local key
    }
}
