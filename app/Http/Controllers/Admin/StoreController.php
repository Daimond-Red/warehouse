<?php

namespace App\Http\Controllers\Admin;

use App\Basecode\Classes\Repositories\ItemRepository;
use App\Basecode\Classes\Repositories\StoreRepository as Repository;
use App\Basecode\Classes\Permissions\StorePermission as Permission;
use Illuminate\Http\Request;

class StoreController extends BackendController
{
    public $repository, $permission;
    public $itemRepository;

    function __construct(
        Repository $repository,
        ItemRepository $itemRepository,
        Permission $permission
    )
    {
        $this->repository = $repository;
        $this->itemRepository = $itemRepository;
        $this->permission = $permission;
    }

    public function index() {

        if(! $this->permission->index()) return;

        $collection = $this->repository->getCollection();

        if($val = \request('userId')) $collection = $collection->where('user_id', $val);

        $collection = $collection->paginate(50000000);

        // dd($collection);

        return view($this->repository->viewIndex, [
           'collection' => $collection,
           'repository' => $this->repository
        ]);
    }

    public function getItems() {

        // dd(\request('store_id'));
        $collection = $this->itemRepository->getCollection()->where('store_id', request('store_id'))->where('items.quantity', '!=', 0)->get();

        return view('admin.stores.items', [
           'collection' => $collection
        ]);

    }


    public function store(Request $request) {

        if(! $this->permission->create() ) return;

        $request->validate( getValidationRules($this->repository->storeValidateRules));

        $model = $this->repository->getCollection()->where('name', request('name'))->where('user_id', auth()->user()->id)->first();
        if($model) return $this->repository->redirectBackWithErrors('Already added with this store name');

        $this->repository->save($this->repository->getAttrs());

        return $this->repository->redirectBackWithSuccess($this->repository->create_msg);

    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id) {

        if(! $this->permission->show() ) return;

        $model = $this->repository->find($id);

        $items = $this->itemRepository->getCollection()->where('store_id', $model->id)->get();


        return view($this->repository->viewShow, [
            'model'         => $model,
            'items'         => $items,
            'repository'    => $this->repository
        ]);

    }


}