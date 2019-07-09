<?php

namespace App\Basecode\Classes\Permissions;


class StorePermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('store_index');
    }

    public function create() {
        return $this->checkAuthNPer('store_create');
    }

    public function edit() {
        return $this->checkAuthNPer('store_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('store_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('store_show');
    }

}
