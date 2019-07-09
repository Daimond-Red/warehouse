<?php

namespace App\Basecode\Classes\Permissions;


class ItemTypePermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('item_type_index');
    }

    public function create() {
        return $this->checkAuthNPer('item_type_create');
    }

    public function edit() {
        return $this->checkAuthNPer('item_type_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('item_type_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('item_type_show');
    }

}
