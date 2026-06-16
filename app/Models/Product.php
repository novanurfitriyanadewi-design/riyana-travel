<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'nama_paket',
        'jenis',
        'durasi',
        'harga',
        'hotel',
        'maskapai',
        'kuota',
        'tanggal_berangkat',
        'deskripsi',
        'gambar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}