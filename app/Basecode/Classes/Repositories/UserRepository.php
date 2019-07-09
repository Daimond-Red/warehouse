<?php

namespace  App\Basecode\Classes\Repositories;

class UserRepository extends Repository {

    public $model = '\App\User';

    public $viewIndex = 'admin.users.index';
    public $viewCreate = 'admin.users.create';
    public $viewEdit = 'admin.users.edit';
    public $viewShow = 'admin.users.show';

    public $storeValidateRules = [
//        'name' => 'required',
//        'email' => 'required|unique:users,email',
//        'phone' => 'required|unique:users,phone',
//        'password' => 'required',
    ];

    public $updateValidateRules = [

    ];





    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);
        $attrs['type'] = \App\User::SUPER_ADMIN;
        $attrs['image'] = '';
        $attrs['phone'] = '';
        $attrs['address'] = '';
        $attrs['village'] = '';
        $attrs['district'] = '';
        $attrs['postcode'] = '';
        $attrs['lat'] = '';
        $attrs['lng'] = '';
        if( $pass = request('password') ) {
            $attrs['password'] = bcrypt($pass);
        }
        $model = new $this->model;
        $model->fill($attrs);
        $model->save();
        return $model;
    }

    public function update($model, $attrs = null) {
        if(! $attrs ) $attrs = $this->getAttrs();
        $model->fill($attrs);
        $model->update();
        return $model;
    }

    public function getCollection($withFilters = true) {
        $model = new $this->model;
        $model = $model->whereIn('type', [\App\User::ADMIN])->orderBy('short_by', 'asc');
        return $model;
    }

}