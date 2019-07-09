<?php

namespace App\Basecode\Classes\Permissions;

/**
 * In Method We will return True if you has permissions to view this
 * Otherwise false
 */

class AdminUserPermission extends Permission {

    public function index() {
        if( isSuperAdmin() ) return true;
        return false;
    }

    public function create() {
        if( isSuperAdmin() ) return true;
        return false;
    }

    public function edit() {
        if( isSuperAdmin() ) return true;
        return false;
    }

    public function destroy() {
        if( isSuperAdmin() ) return true;
        return false;
    }

    public function show() {
        if( isSuperAdmin() ) return true;
        return false;
    }

    public function import() {
        if( isSuperAdmin() ) return true;
        return false;
    }

}
