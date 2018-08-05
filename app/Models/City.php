<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'province_id'
    ];

    /**
     * Get the province relation.
     */
    public function province()
    {
        return $this->belongsTo('App\Models\Province');
    }

}
