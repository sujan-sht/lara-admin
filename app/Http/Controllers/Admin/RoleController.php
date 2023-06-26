<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\RoleRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Admin\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $roleRepositoryInterface;

    public function __construct(RoleRepositoryInterface $roleRepositoryInterface)
    {
        $this->roleRepositoryInterface = $roleRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.role.index',$this->roleRepositoryInterface->indexRole());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $this->roleRepositoryInterface->storeRole($request);
        return redirect(adminRedirectRoute('roles'))->with('message','Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.role.show',$this->roleRepositoryInterface->showRole($role));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.role.edit',$this->roleRepositoryInterface->editRole($role));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {

        $this->roleRepositoryInterface->updateRole($request, $role);
        return redirect(adminRedirectRoute('roles'))->with('info','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $this->roleRepositoryInterface->deleteRole($role);
        return redirect(adminRedirectRoute('roles'))->with('error','Deleted Successfully');
    }
}
