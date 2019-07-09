<?php

namespace App\Basecode\Classes\Permissions;


class ItemPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('item_index');
    }

    public function create() {
        return $this->checkAuthNPer('item_create');
    }

    public function edit() {
        return $this->checkAuthNPer('item_edit');
    }

    public function destroy() {
        if( isSuperAdmin() ) return true;
        return false;
        return $this->checkAuthNPer('item_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('item_show');
    }

    public function stocks() {
        return $this->checkAuthNPer('item_stocks'); // stock management page.
    }

}
