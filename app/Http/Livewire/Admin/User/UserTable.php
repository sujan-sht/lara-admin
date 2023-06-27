<?php

namespace App\Http\Livewire\Admin\User;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Illuminate\Support\Facades\Blade;

class UserTable extends DataTableComponent
{
    protected $model = User::class;

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
                    fn ($row) => Blade::render('<x-action :model="$model" route="users" :show="true" />', ['model' => $row])
                )
                ->html(),
        ];
    }
}
