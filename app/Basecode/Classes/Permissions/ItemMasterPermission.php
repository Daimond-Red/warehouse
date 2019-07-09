<?php

namespace App\Basecode\Classes\Permissions;


class ItemMasterPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('item_master_index');
    }

    public function create() {
        if( isSuperAdmin() ) return true;
        return false;
        return $this->checkAuthNPer('item_master_create');
    }

    public function edit() {
        if( isSuperAdmin() ) return true;
        return false;
        return $this->checkAuthNPer('item_master_edit');
    }

    public function destroy() {
        if( isSuperAdmin() ) return true;
        return false;
        return $this->checkAuthNPer('item_master_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('item_master_show');
    }

}
