<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id',
        'store_id',
        'item_master_id',
        'name',
        'description',
        'type',
        'image',
        'quantity',
        'unit_id',

        'make',
        'model_number',
        'serial_number',
        'manufacturing_date',
        'ofc_color',
        'fat_reports',
        'cable_drum_number',
    ];

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function stores() {
        return $this->belongsToMany(Store::class, 'store_item');
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function itemMasterRel() {
        return $this->belongsTo(ItemMaster::class, 'item_master_id');
    }

    public function userRel() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setManufacturingDateAttribute($val) {
        $this->attributes['manufacturing_date'] = date('Y-m-d', strtotime($val));
    }

    public function getManufacturingDateAttribute() {
        return getDateValue($this->attributes['manufacturing_date']);
    }

    public function getQuantityAttribute() {
        if(! isset($this->attributes['quantity']) ) return 0;
        return floatToInt($this->attributes['quantity']);
    }

    public function itemLogsRel() {
        return $this->hasMany(ItemLog::class, 'item_id');
    }

}
