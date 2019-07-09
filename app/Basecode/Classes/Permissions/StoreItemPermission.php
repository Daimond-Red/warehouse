<?php

namespace App\Basecode\Classes\Permissions;


class StoreItemPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('store_item_index');
    }

    public function create() {
        return $this->checkAuthNPer('store_item_create');
    }

    public function edit() {
        return $this->checkAuthNPer('store_item_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('store_item_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('store_item_show');
    }

}
