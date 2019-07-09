<?php

namespace App\Http\Controllers\Admin;


use App\Basecode\Classes\Repositories\StoreItemRepository as Repository;
use App\Basecode\Classes\Permissions\StoreItemPermission as Permission;

class StoreItemController extends BackendController
{
    public $repository, $permission;

    public function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

}
