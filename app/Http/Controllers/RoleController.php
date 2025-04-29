<?php

namespace App\Http\Controllers;

use App\DTOs\Roles\RoleDTO;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; // استخدام النموذج الصحيح
use Spatie\Permission\Models\Permission; // استخدام النموذج الصحيح


class RoleController extends Controller
{
    public function store(Request $request)
    {
        $roleData = RoleDTO::fromRequest($request);

        $role = Role::create(['name' => $roleData->name]);
        if ($roleData->permissions) {
            $role->givePermissionTo($roleData->permissions);
        }

        return response()->json(['role' => $role]);
    }

    public function assignPermission(Request $request, Role $role)
    {
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->givePermissionTo($permissions);

        return response()->json(['message' => 'Permissions assigned successfully']);
    }
}
