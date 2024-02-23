<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'kategori'
    ];
    
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }
}