<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemMaster extends Model
{
    protected $fillable = [
    	'user_id',
    	'unit_id',
    	'name',
    	'description',
    	'image',
    	'stock_type',

    ];

    public function unit() {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function userRel() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itemsRel() {
        return $this->hasMany(Item::class, 'item_master_id');
    }

}
