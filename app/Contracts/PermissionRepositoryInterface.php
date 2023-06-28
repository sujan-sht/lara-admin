<?php

namespace App\Contracts;

use App\Http\Requests\PermissionRequest;
use App\Models\Admin\Permission;

interface PermissionRepositoryInterface
{
    public function indexPermission();

    public function createPermission();

    public function storePermission(PermissionRequest $request);

    public function showPermission(Permission $permission);

    public function editPermission(Permission $permission);

    public function updatePermission(PermissionRequest $request, Permission $permission);

    public function destroyPermission(Permission $permission);
}
