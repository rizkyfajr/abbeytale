<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingProvider extends Model
{
    protected $table = 'shipping_providers';
    protected $fillable = ['name', 'price_per_kg', 'max_discount', 'max_purchase'];
}
