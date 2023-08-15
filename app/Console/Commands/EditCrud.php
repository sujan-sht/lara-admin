<?php

namespace App\Console\Commands;

use App\Services\EditCrudService;
use Illuminate\Console\Command;

class EditCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edit:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Edits crud files';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name=$this->argument('name');
        EditCrudService::editCrud($name, $this);
    }
}
