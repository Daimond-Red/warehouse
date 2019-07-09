<?php

namespace App\Http\Controllers\Admin;


use App\Basecode\Classes\Repositories\VendorRepository as Repository;
use App\Basecode\Classes\Permissions\VendorPermission as Permission;

class VendorController extends BackendController
{
    public $repository, $permission;

    public function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

    public function get() {

        $model = [];

        if(request('vendor_id')) $model = $this->repository->getModel()->where('id', request('vendor_id'))->first();

        if( $model ) return $model->toArray();

        return $model;
    }
}
