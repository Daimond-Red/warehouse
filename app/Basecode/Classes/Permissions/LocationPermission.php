<?php

namespace App\Basecode\Classes\Permissions;


class LocationPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('location_index');
    }

    public function create() {
        return $this->checkAuthNPer('location_create');
    }

    public function edit() {
        return $this->checkAuthNPer('location_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('location_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('location_show');
    }

}
