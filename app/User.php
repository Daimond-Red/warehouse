<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    const SUPER_ADMIN = 1;
    const SUPERADMIN = 1;
    const VENDOR = 2;
    const ADMIN = 3;

    protected $fillable = [
        'name', 'email',  'password', 'phone', 'image', 'address', 'village', 'district', 'postcode', 'lat', 'lng', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function storeRel() {
        return $this->hasMany(Store::class, 'user_id');
    }

    public static $arrs = [

        [
            'title' => 'Location',
            'tag'   => 'location',
            'items' => [
                ['title' => 'View', 'tag' => 'index' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
            ]
        ],
        [
            'title' => 'Stock Type',
            'tag'   => 'item_type',
            'items' => [
                ['title' => 'Create', 'tag' => 'create' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
                ['title' => 'Delete', 'tag' => 'destroy' ],
                ['title' => 'View', 'tag' => 'index' ],
            ]
        ],
        [
            'title' => 'Vendor',
            'tag'   => 'vendor',
            'items' => [
                ['title' => 'Create', 'tag' => 'create' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
                ['title' => 'Delete', 'tag' => 'destroy' ],
                ['title' => 'View', 'tag' => 'index' ],
            ]
        ],
        [
            'title' => 'Store',
            'tag'   => 'store',
            'items' => [
                ['title' => 'Create', 'tag' => 'create' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
                ['title' => 'Delete', 'tag' => 'destroy' ],
                ['title' => 'View', 'tag' => 'index' ],
            ]
        ],
        [
            'title' => 'Stock List',
            'tag'   => 'item',
            'items' => [
                ['title' => 'Create', 'tag' => 'create' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
                ['title' => 'Delete', 'tag' => 'destroy' ],
                ['title' => 'View', 'tag' => 'index' ],
                ['title' => 'Warehouse Management', 'tag' => 'stocks' ],
            ]
        ],
        [
            'title' => 'Unit',
            'tag'   => 'unit',
            'items' => [
                ['title' => 'Create', 'tag' => 'create' ],
                ['title' => 'Edit', 'tag' => 'edit' ],
                ['title' => 'Delete', 'tag' => 'destroy' ],
                ['title' => 'View', 'tag' => 'index' ],
            ]
        ],
        // [
        //     'title' => 'Item Master',
        //     'tag'   => 'item_master',
        //     'items' => [
        //         ['title' => 'Create', 'tag' => 'create' ],
        //         ['title' => 'Edit', 'tag' => 'edit' ],
        //         ['title' => 'Delete', 'tag' => 'destroy' ],
        //         ['title' => 'View', 'tag' => 'index' ],
        //     ]
        // ],

    ];

}
