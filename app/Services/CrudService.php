<?php

namespace App\Services;
use App\Services\Helper\CommandHelper;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class CrudService extends CommandHelper
{
    public static function makeCrud($name, $console)
    {
        Self::createFolderIfNotExists(app_path('Models/Admin'));
        Self::createFolderIfNotExists(app_path('Http/Controllers/Admin'));
        Self::createFolderIfNotExists(resource_path('views/admin/'.strtolower($name)));

        Self::makeModel($name, $console);
        Self::makeMigration($name, $console);
        Self::makeController($name, $console);
        Self::makeViews($name, $console);
        Self::makeSeeder($name, $console);
        Self::makeBladeLayouts($name, $console);
        Self::addFileContent($name, $console);

        RepositoryPatternService::repoPattern($name,true);
        $console->info('Repo pattern created for model: '.$name);

    }

    protected static function makeModel($name, $console)
    {
        $file = app_path("Models/Admin/".$name.".php");
        file_put_contents($file, Self::generateContent('Model',$name));
        $console->info('Model Created Successfully');
    }

    protected static function makeMigration($name, $console)
    {
        Artisan::call('make:migration create_'.strtolower(Str::plural($name)).'_table --create='.strtolower(Str::plural($name)));
        $console->info('Migration Created Successfully');
    }

    protected static function makeController($name, $console)
    {
        $file = app_path("Http/Controllers/Admin/".$name."Controller.php");
        file_put_contents($file, Self::generateContent('Controller',$name));
        $console->info('Controller Created Successfully');
    }

    protected static function makeViews($name, $console)
    {
        $views = ['index', 'create', 'edit', 'show'];
        foreach ($views as $view) {
            $file = resource_path("views/admin/".strtolower($name)."/{$view}.blade.php");
            file_put_contents($file, self::generateContent(ucfirst($view).'Page', $name));
            $console->info(ucfirst($view).' Page Created Successfully');
        }
    }


    protected static function makeSeeder($name, $console)
    {
        Artisan::call('make:seeder '.$name.'Seeder');
        $console->info('Seeder file Created Successfully');
    }

    protected static function makeBladeLayouts($name,$console)
    {
        Self::createFolderIfNotExists(resource_path("views/admin/layouts/modules/".strtolower($name)));
        file_put_contents(resource_path("views/admin/layouts/modules/".strtolower($name)."/form.blade.php"), '');
        $console->info('Edit add file created successfully');

        file_put_contents(resource_path("views/admin/layouts/modules/".strtolower($name)."/scripts.blade.php"), '');
        $console->info('Script file created successfully');
    }

    protected static function addFileContent($name, $console)
    {
        // $lowercased_name = strtolower($name);
        // $route = "Route::resource('admin/{$lowercased_name}',\App\Http\Controllers\Admin\\{$name}Controller::class);";
    }
}
