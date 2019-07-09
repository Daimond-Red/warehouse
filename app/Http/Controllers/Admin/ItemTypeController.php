<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Basecode\Classes\Repositories\ItemTypeRepository as Repository;
use App\Basecode\Classes\Permissions\ItemTypePermission as Permission;

class ItemTypeController extends BackendController
{
    public $repository, $permission;

    function __construct(Repository $repository, Permission $permission)
    {
        $this->repository = $repository;
        $this->permission = $permission;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        if(! $this->permission->create() ) return;

        $request->validate( getValidationRules($this->repository->storeValidateRules));
        
        $model = $this->repository->getCollection()
        		->where('title', \request('title'))
        		->where('user_id', auth()->user()->id)
        		->first();

       	if($model) return $this->repository->redirectBackWithErrors('This item type title already taken.');

        $this->repository->save($this->repository->getAttrs());

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }
}
