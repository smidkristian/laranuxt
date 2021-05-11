<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function createPermission(Request $request)
    {
        $permission = Permission::create([ 'name' => $request->input('name') ]);
        return $permission;
    }

    public function createRole(Request $request)
    {
        $role = Role::create([ 'name' => $request->input('name') ]);
        return $role;
    }
}
