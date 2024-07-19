<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'stok']; // Kolom yang boleh diisi massal

    // Relasi belongsTo ke tabel products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
