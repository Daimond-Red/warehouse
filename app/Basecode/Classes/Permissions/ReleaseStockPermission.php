<?php

namespace App\Basecode\Classes\Permissions;


class ReleaseStockPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('item_stocks');
    }

    public function create() {
        return $this->checkAuthNPer('item_stocks');
    }

    public function edit() {
        return $this->checkAuthNPer('item_stocks');
    }

    public function destroy() {
        return $this->checkAuthNPer('item_stocks');
    }

    public function show() {
        return $this->checkAuthNPer('item_stocks');
    }

}
