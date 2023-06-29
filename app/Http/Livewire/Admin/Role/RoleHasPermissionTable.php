<?php

namespace App\Http\Livewire\Admin\Role;

use App\Models\Admin\Permission;
use Livewire\Component;

class RoleHasPermissionTable extends Component
{
    public $role;
    public $modules;


    public function render()
    {
        $this->makeModulePermission();
        return view('livewire.admin.role.role-has-permission-table');
    }

    public function makeModulePermission()
    {
        $this->modules = getAllModelNames(app_path('Models'));

        foreach($this->modules as $module)
        {
            Permission::Create([
                'role_id' => $this->role->id,
                'model' => $module
            ]);
        }
    }

}
