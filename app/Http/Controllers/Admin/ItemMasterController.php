<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Basecode\Classes\Repositories\ItemMasterRepository as Repository;
use App\Basecode\Classes\Permissions\ItemMasterPermission as Permission;

class ItemMasterController extends BackendController
{
    
    public $repository, $permission;

    function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

    public function store(Request $request) {

        if(! $this->permission->create() ) return;

        $request->validate( getValidationRules($this->repository->storeValidateRules));
        
        $model = $this->repository->getModel()->where('name', \request('name'))->where('user_id', auth()->user()->id)->first();

        if($model) return redirect()->back()->withErrors('Aleard exist.');

        $this->repository->save($this->repository->getAttrs());

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }
}
