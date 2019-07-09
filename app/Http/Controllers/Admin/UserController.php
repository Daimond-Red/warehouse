<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Repositories\UserRepository as Repository;
use App\Basecode\Classes\Permissions\UserPermission as Permission;

class UserController extends BackendController
{
    public $repository, $permission;

    public function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

}
