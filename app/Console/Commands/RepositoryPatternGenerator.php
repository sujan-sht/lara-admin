<?php

namespace App\Console\Commands;

use App\Services\RepositoryPatternService;
use Illuminate\Console\Command;

class RepositoryPatternGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repo {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository pattern';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name=$this->argument('name');
        RepositoryPatternService::repoPattern($name);
        $this->info('Repository Pattern created successfully for model: '. $name);
    }
}
