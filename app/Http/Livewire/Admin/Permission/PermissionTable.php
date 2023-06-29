<?php

namespace App\Http\Livewire\Admin\Permission;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Blade;

class PermissionTable extends DataTableComponent
{
    // protected $model = Permission::class;

    public function builder(): Builder
    {
        return Permission::query()
            ->where('model','=','all');
    }

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Action")
                ->label(
                    fn ($row) => Blade::render('<x-action :model="$model" route="permissions" :show="false" />', ['model' => $row])
                )
                ->html(),
        ];
    }
}
