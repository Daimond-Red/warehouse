<?php

namespace App\Basecode\Classes\Permissions;


class UserPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('user_index');
    }

    public function create() {
        return $this->checkAuthNPer('user_create');
    }

    public function edit() {
        return $this->checkAuthNPer('user_edit');
    }

    public function destroy() {
        return $this->checkAuthNPer('user_destroy');
    }

    public function show() {
        return $this->checkAuthNPer('user_show');
    }

}
