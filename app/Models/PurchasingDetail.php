<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchasingDetail extends Model
{
    protected $fillable = [
        'purchasing_id', 'product_id', 'price', 'quantiry', 'discount'
    ];
}
