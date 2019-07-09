<?php

namespace App\Basecode\Classes\Permissions;


class UnitPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('unit_index');
    }

    public function create() {
        return $this->checkAuthNPer('unit_create');
    }

    public function edit() {
        return $this->checkAuthNPer('unit_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('unit_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('unit_show');
    }

}
