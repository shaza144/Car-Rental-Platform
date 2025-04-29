<?php

namespace App\Http\Controllers;

use App\DTOs\Roles\PermissionDTO;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission; // استخدام النموذج الصحيح

class PermissionController extends Controller
{
    public function store(Request $request)
    {
        $permissionData = PermissionDTO::fromRequest($request);
        $permission = Permission::create(['name' => $permissionData->name]);

        return response()->json(['permission' => $permission]);
    }
}
