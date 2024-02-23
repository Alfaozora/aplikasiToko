<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori',
        'nama_barang',
        'stok_barang',
        'masuk',
        'keluar',
        'sisa',
        'satuan',
    ];

    public function departemen()
    {
        return $this->hasMany(departemen::class);
    }
}