<?php

namespace  App\Basecode\Classes\Repositories;

class AdminUserRepository extends Repository {

    public $model = '\App\User';

    public $viewIndex = 'admin.adminUsers.index';
    public $viewCreate = 'admin.adminUsers.create';
    public $viewEdit = 'admin.adminUsers.edit';
    public $viewShow = 'admin.adminUsers.show';

    public $storeValidateRules = [
        'name' => 'required',
        'email' => 'required|unique:users,email|email',
        'password' => 'required',
    ];

    public $updateValidateRules = [
        'name' => 'required',
        'email' => 'required|unique:users,email|email',
    ];

    public function save( $attrs ) {

        $attrs = $this->getValueArray($attrs);

        if( $pass = request('password') ) {
            $attrs['password'] = bcrypt($pass);
        } elseif( array_key_exists('password', $attrs) ) {
            unset($attrs['password']);
        }

        $model = new $this->model;
        $model->fill($attrs);
        $model->type = \App\User::ADMIN;
        $model->save();

        if( request('permissions') ) {
            $model->syncPermissions(request('permissions', []));
        }

        return $model;
    }

    public function update($model, $attrs = null) {

        try {
            if(! $attrs ) $attrs = $this->getAttrs();

            if( $pass = request('password') ) {
                $attrs['password'] = bcrypt($pass);
            } elseif( array_key_exists('password', $attrs) ) {
                unset($attrs['password']);
            }

            if( request('permissions') ) {
                $model->syncPermissions(request('permissions', []));
            }

            $model->fill($attrs);
            $model->type = \App\User::ADMIN;
            $model->update();

            return $model;

        } catch (\Exception $e) {
            return $model;
        }
    }

    public function getCollection($withFilters = true) {
        $model = new $this->model;
        $model = $model->whereIn('type', [\App\User::ADMIN])->orderBy('created_at', 'desc');
        return $model;
    }

    public function find( $id ) {
        $model = $this->model;
        $model = $model::find($id);

        if( $model->type != \App\User::ADMIN ) throw new  \Illuminate\Database\Eloquent\ModelNotFoundException;

        return $model;
    }

}