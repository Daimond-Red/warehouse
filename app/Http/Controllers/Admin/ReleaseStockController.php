<?php

namespace App\Http\Controllers\Admin;

use App\ReleaseStock;
use Illuminate\Http\Request;
use App\Basecode\Classes\Repositories\ReleaseStockRepository as Repository;
use App\Basecode\Classes\Permissions\ReleaseStockPermission as Permission;

class ReleaseStockController extends BackendController
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


        $model = $this->repository->save($this->repository->getAttrs());

        if(!$model) return redirect()->back()->withErrors('Bad Request.');
        
        return $this->repository->redirectBackWithSuccess("Successfully Release items.");

    }

}
