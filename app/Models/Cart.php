<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'user_id', 'price', 'discount', 'quantity'
    ];

    /**
     * Get the product relation.
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
