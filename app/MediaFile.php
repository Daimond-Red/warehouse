<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{

    const ITEM_DOCUMENT = 1;
    const ITEM_FINAL_FILES = 2;

    protected $fillable = [
        'model',
        'model_id',
        'type',
        'url',
        'name',
        'upload_template_id',
    ];

    public function typeRel() {
        return $this->belongsTo(UploadTemplate::class, 'upload_template_id');
    }

}
