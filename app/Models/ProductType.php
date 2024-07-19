<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'keterangan', 'icon'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
