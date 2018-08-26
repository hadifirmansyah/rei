<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_code', 'price', 'category_id', 'discount', 'description', 'stock'
    ];

    /**
     * Get the category relation.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Get the images for the product.
     */
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * Generate a product code.
     *
     **/
    public function setProductCodeAttribute($value)
    {
        $this->attributes['product_code'] = 'R'.sprintf("%'02d", $this->category_id).date('dmy').sprintf("%'03d", $this->count()+1);        
    }

    /**
     * @param $qty
     */
    public function addStock($qty)
    {
        $this->stock += (int) $qty;
        $this->save();
    }

    /**
     * @param $qty
     */
    public function substractStock($qty)
    {
        $this->stock -= (int) $qty;
        $this->save();
    }
}
