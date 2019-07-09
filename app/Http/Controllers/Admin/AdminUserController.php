<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Repositories\AdminUserRepository as Repository;
use App\Basecode\Classes\Permissions\AdminUserPermission as Permission;

class AdminUserController extends BackendController {

    public $repository, $permission;

    public function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

    public function create(){

        if(! $this->permission->create() ) return;

        $permissions = \Spatie\Permission\Models\Permission::get();
        $permissionIds = [];

        return view($this->repository->viewCreate, [
            'repository' => $this->repository,
            'permissions'       => $permissions,
            'permissionIds'     => $permissionIds,
        ]);
    }

    public function edit($id) {

        if(! $this->permission->edit() ) return;

        $model = $this->repository->find($id);

        $permissions = \Spatie\Permission\Models\Permission::get();
        $permissionIds = $model->permissions()->pluck('name')->toArray();

        return view($this->repository->viewEdit, [
            'model'         => $model,
            'repository'    => $this->repository,
            'permissions'       => $permissions,
            'permissionIds'     => $permissionIds,
        ]);

    }

     public function destroy($id) {

        if(! $this->permission->destroy() ) return;

        // $model = $this->repository->find($id);
        $model = \App\User::findOrFail($id);

        if( $model ) $model->delete();

        $this->repository->delete($model);

        return $this->repository->redirectBackWithSuccess($this->repository->delete_msg);

    }

}
