<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga','product_type_id', 'gambar', 'is_active', 'keterangan'];

    // Relasi one-to-one ke tabel product_stocks
    public function stock()
    {
        return $this->hasOne(ProductStock::class);
    }

    // Relasi many-to-one ke tabel product_types
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    // Relasi one-to-many ke tabel order_items
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }

    //product stock
    public function productStock()
    {
        return $this->hasOne(ProductStock::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(Discount::class, 'product_discounts');
    }

    public function getDiscountedPriceAttribute()
    {
        $activeDiscount = $this->discounts()
            ->where('is_active', true)
            ->where('start_date', '<=', now())
            ->where('end_date', '>=', now())
            ->orderByDesc('discount_amount') // Ambil diskon terbesar jika ada beberapa
            ->first();

        if ($activeDiscount) {
            if ($activeDiscount->discount_type === 'percentage') {
                return $this->harga - ($this->harga * $activeDiscount->discount_amount / 100);
            } else {
                return $this->harga - $activeDiscount->discount_amount;
            }
        }

        return $this->harga; // Jika tidak ada diskon, kembalikan harga asli
    }
    // Relasi one-to-one ke tabel product_images
    // public function image()
    // {
    //     return $this->hasOne(ProductImage::class);
    // }

    // // Relasi many-to-many ke tabel carts
    // public function carts()
    // {
    //     return $this->belongsToMany(Cart::class);
    // }
}
