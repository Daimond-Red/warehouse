<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Repositories\LocationRepository as Repository;
use App\Basecode\Classes\Permissions\LocationPermission as Permission;

class LocationController extends BackendController
{
    public $repository, $permission;

    function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }
}
