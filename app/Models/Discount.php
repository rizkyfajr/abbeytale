<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table = 'discounts';
    protected $fillable = ['name', 'code', 'discount_type', 'discount_amount', 'start_date', 'end_date', 'minimum_purchase', 'is_active'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_discounts');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)
                     ->where('start_date', '<=', now())
                     ->where('end_date', '>=', now());
    }

    public function calculateDiscountAmount($originalPrice)
    {
        if ($this->discount_type === 'percentage') {
            return $originalPrice * ($this->discount_amount / 100);
        } else { // fixed_amount
            return $this->discount_amount;
        }
    }

}
