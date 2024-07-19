<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'order_id','shipping_address', 'billing_address', 'shipping_method', 'shipping_cost'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
