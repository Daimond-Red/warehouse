<?php

namespace  App\Basecode\Classes\Repositories;

class UnitRepository extends Repository
{

    public $model = '\App\Unit';

    public $viewIndex = 'admin.units.index';
    public $viewCreate = 'admin.units.create';
    public $viewEdit = 'admin.units.edit';
    public $viewShow = 'admin.units.show';

    public $storeValidateRules = [
        'title' => 'required',
        'unit' => 'required'
    ];

    public $updateValidateRules = [
        'title' => 'required',
        'unit' => 'required'
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);

        $attrs['user_id'] = auth()->user()->id; 

        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }

    public function getCollection($withFilters = true) {
        
        $model = new $this->model;
        
        $model = $model->orderBy('created_at', 'desc');
        
        // if ( userHasChildUserCondition() ) {
        //     $model = $model->where('user_id', auth()->user()->id);
        // }

        return $model;
    }


}