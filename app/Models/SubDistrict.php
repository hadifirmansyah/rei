<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'city_id', 'charges', 'est'
    ];

    /**
     * Get the province relation.
     */
    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
