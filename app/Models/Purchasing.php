<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'province_id', 'city_id', 'sub_district_id', 'charges', 'address', 'phone_number', 'email', 'cod'
    ];

    /**
     * Get the user relation.
     */
    public function user()
    {
        return $this->belongsTo('App\Modules\Authentication\Models\User');
    }

    /**
     * Get the sub district relation.
     */
    public function sub_district()
    {
        return $this->belongsTo('App\Models\SubDistrict');
    }

    /**
     * Get the details relation.
     */
    public function detail()
    {
        return $this->hasMany('App\Models\PurchasingDetail');
    }
}
