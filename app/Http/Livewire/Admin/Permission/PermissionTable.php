<?php

namespace App\Http\Livewire\Admin\Permission;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Admin\Permission;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class PermissionTable extends DataTableComponent
{
    protected $model = Permission::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        // $this->setColumnSelectDisabled();
    }


    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->searchable(),
            Column::make("Browse", "browse")
                ->format([$this, 'generateIcon']),
            Column::make("Read", "read")
                ->format([$this, 'generateIcon']),
            Column::make("Edit", "edit")
                ->format([$this, 'generateIcon']),
            Column::make("Add", "add")
                ->format([$this, 'generateIcon']),
            Column::make("Delete", "delete")
                ->format([$this, 'generateIcon']),
            Column::make("Role", "role.name")
                ->sortable()
                ->searchable()
                ->format([$this,'nullCheck']),
            Column::make("Name", "name")
                ->sortable()
                ->searchable()
                ->format([$this,'nullCheck']),
            Column::make("Model", "model")
                ->sortable()
                ->searchable(),
            Column::make("Can/Cannot", "can")
                ->format([$this,'nullCheck']),
            Column::make("Action")
                ->label(
                    fn ($row) => Blade::render('<x-action :model="$model" route="permissions" :show="false" />', ['model' => $row])
                )
                ->html(),
        ];
    }

    public function filters() : array
    {
        return [
            SelectFilter::make('Role'),
        ];
    }

    public function generateIcon($value) {
        $icon = $value ? 'check text-success' : 'times text-danger';
        return new HtmlString('<i class=" fa fa-' . $icon . '"></i>');
    }

    public function nullCheck($value){
        $data = $value ?? '<span class="badge bg-primary p-1"> N/A </span>';
        return new HtmlString($data);
    }

}
