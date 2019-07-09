<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReleaseStock extends Model
{
    protected $fillable = [
        'user_id',
        'vendor_id',
        'store_id',
        'item_id',
        'quantity',
        'date',
        'person_name',
        'remarks',
        'phone',
        'indent_number',
        'indent_date',

        'vehicle_no',
        'gate_pass_no',

    ];

    public function itemRel() {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function store() {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function stock() {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function setIndentDateAttribute($val) {
        $this->attributes['indent_date'] = date('Y-m-d', strtotime($val));
    }

    public function getIndentDateAttribute() {
        return getDateValue($this->attributes['indent_date']);
    }
}
