<?php

namespace  App\Basecode\Classes\Repositories;

class VendorRepository extends Repository
{

    public $model = '\App\Vendor';

    public $viewIndex = 'admin.vendors.index';
    public $viewCreate = 'admin.vendors.create';
    public $viewEdit = 'admin.vendors.edit';
    public $viewShow = 'admin.vendors.show';

    public $storeValidateRules = [
        'name' => 'required',
        'phone' => 'required'
    ];

    public $updateValidateRules = [
        'name' => 'required',
        'phone' => 'required'
    ];

    public function save( $attrs ) {

        $attrs = $this->getAttrs();

        $model = new $this->model;
        $model->fill($attrs);
        $model->user_id = auth()->user()->id;
        $model->save();
        return $model;
    }

    public function getAttrs() {
        $attrs = parent::getAttrs();
        if(!request('package')) $attrs['package'] = '';
        return $attrs;
    }

    public function getCollection($withFilters = true) {
        $collection = parent::getCollection($withFilters);
        if( userHasChildUserCondition() ) {
            $collection = $collection->where('user_id', auth()->user()->id);
        }
        return $collection;
    }

}