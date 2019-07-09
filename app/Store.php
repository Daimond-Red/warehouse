<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'name',
    	'image',
    	'address',
    	'village',
    	'district',
    	'postcode',
    	'lat',
    	'lng',
    ];

    public function itemsRel() {
        return $this->hasMany(Item::class, 'store_id');
    }

    public function userRel() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
