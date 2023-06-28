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
        $permissions = Permission::all();
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
        Permission::create($request->validated());
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
