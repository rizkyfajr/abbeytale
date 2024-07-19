<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_number', 'total_amount', 'payment_method', 'shipping_address', 'status', 'created_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function calculateTotalAmount()
    {
        $totalAmount = 0;
        foreach ($this->orderItems as $item) {
            $totalAmount += $item->product->discountedPrice * $item->quantity;
        }
        return $totalAmount;
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }


}
