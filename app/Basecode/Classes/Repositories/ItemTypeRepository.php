<?php

namespace  App\Basecode\Classes\Repositories;

class ItemTypeRepository extends Repository
{

    public $model = '\App\ItemType';

    public $viewIndex = 'admin.itemTypes.index';
    public $viewCreate = 'admin.itemTypes.create';
    public $viewEdit = 'admin.itemTypes.edit';
    public $viewShow = 'admin.itemTypes.show';

    public $storeValidateRules = [
        'title' => 'required',
    ];
    public $updateValidateRules = [
        'title' => 'required',
    ];

    public function save( $attrs ) {

        $attrs = $this->getAttrs();

        $attrs['tag'] = str_slug(request('title'), '_');
        
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