<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemLog extends Model {

    protected $fillable = [

    	'user_id',
        'item_id',
        'qty_added',
        'qty',
        'activity_type',
        'is_approved',

        'invoice_number',
        'invoice_date',

        'indent_number',
        'indent_date',

        'reason',

        'delivery_challan_no',
        'delivery_challan_date',

        'make',
        'model_number',
        'serial_number',
        'manufacturing_date',
        'ofc_color',
        'fat_reports',
        'cable_drum_number',

    ];

    const ADD = 'Add';
    const RELEASE = 'Release';
    const RETURN = 'Return';

    public function itemRel() {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function userRel() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function setInvoiceDateAttribute($val) {
        $this->attributes['invoice_date'] = date('Y-m-d', strtotime($val));
    }

    public function getInvoiceDateAttribute() {
        return getDateValue($this->attributes['invoice_date']);
    }

    public function setIndentDateAttribute($val) {
        $this->attributes['indent_date'] = date('Y-m-d', strtotime($val));
    }

    public function getIndentDateAttribute() {
        return getDateValue($this->attributes['indent_date']);
    }

    public function setDeliveryChallanDateAttribute($val) {
        $this->attributes['delivery_challan_date'] = date('Y-m-d', strtotime($val));
    }

    public function getDeliveryChallanDateAttribute() {
        return getDateValue($this->attributes['delivery_challan_date']);
    }

    public function setManufacturingDateAttribute($val) {
        $this->attributes['manufacturing_date'] = date('Y-m-d', strtotime($val));
    }

    public function getManufacturingDateAttribute() {
        return getDateValue($this->attributes['manufacturing_date']);
    }

}
