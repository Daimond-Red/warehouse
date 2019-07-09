<?php

namespace App\Basecode\Classes\Permissions;


class VendorPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('vendor_index');
    }

    public function create() {
        return $this->checkAuthNPer('vendor_create');
    }

    public function edit() {
        return $this->checkAuthNPer('vendor_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('vendor_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('vendor_show');
    }

}
