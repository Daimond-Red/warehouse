<?php

namespace App\Basecode\Classes\Permissions;


class ReportPermission extends Permission {

    public function index() {
        return $this->checkAuthNPer('report_index');
    }

}
