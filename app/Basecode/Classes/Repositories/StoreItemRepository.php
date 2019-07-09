<?php

namespace  App\Basecode\Classes\Repositories;

class StoreItemRepository extends Repository
{

    public $model = '\App\StoreItem';

    public $viewIndex = 'admin.storeItems.index';
    public $viewCreate = 'admin.storeItems.create';
    public $viewEdit = 'admin.storeItems.edit';
    public $viewShow = 'admin.storeItems.show';

    public $storeValidateRules = [
    ];

    public $updateValidateRules = [
    ];

    public function save( $attrs ) {

        $attrs = $this->getAttrs();

        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }

    public function getAttrs() {
        $attrs = parent::getAttrs();

        return $attrs;
    }

}