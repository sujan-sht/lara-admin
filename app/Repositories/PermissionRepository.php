<?php

namespace App\Repositories;

use App\Models\Admin\Permission;
use App\Contracts\PermissionRepositoryInterface;
use App\Http\Requests\PermissionRequest;
use App\Models\Admin\Role;

class PermissionRepository implements PermissionRepositoryInterface
{
    // Permission Index
    public function indexPermission()
    {
        $permissions = Permission::where('model','=','all')->get();
        return compact('permissions');
    }

    // Permission Create
    public function createPermission()
    {
        $roles = Role::all();
        return compact('roles');
    }

    // Permission Store
    public function storePermission(PermissionRequest $request)
    {
        $request->validated();
        Permission::create([
            'browse' => 1,
            'read' => 1,
            'edit' => 1,
            'add' => 1,
            'delete' => 1,
            'role_id' => $request->role_id,
            'name' => $request->name,
            'model' => 'all'
        ]);
    }

    // Permission Show
    public function showPermission(Permission $permission)
    {
        return compact('permission');
    }

    // Permission Edit
    public function editPermission(Permission $permission)
    {
        $roles = Role::all();
        return compact('permission','roles');
    }

    // Permission Update
    public function updatePermission(PermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
    }

    // Permission Destroy
    public function destroyPermission(Permission $permission)
    {
        $permission->delete();
    }
}
