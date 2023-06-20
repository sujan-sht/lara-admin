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
        Self::makeView($name, $console);

        RepositoryPatternService::repoPattern($name,true);
        $console->info('Repo pattern created for model: '.$name);


    }

    protected static function makeModel($name, $console)
    {
        $file = app_path("Models/Admin/".$name.".php");
        file_put_contents($file, Self::generateContent('Model',$name));
        $console->info('Model Created Successfully: '.$name);
    }

    protected static function makeMigration($name, $console)
    {
        Artisan::call('make:migration create_'.strtolower(Str::plural($name)).'_table --create='.strtolower(Str::plural($name)));
        $console->info('Migration Created Successfully: create_'.strtolower(Str::plural($name)).'_table --create='.strtolower(Str::plural($name)));
    }

    protected static function makeController($name, $console)
    {
        $file = app_path("Http/Controllers/Admin/".$name."Controller.php");
        file_put_contents($file, Self::generateContent('Controller',$name));
        $console->info('Controller Created Successfully: '.$name.'Controller');
    }

    protected static function makeView($name, $console)
    {
        $file = resource_path("views/admin/".strtolower($name)."/index.blade.php");
        file_put_contents($file, Self::generateContent('IndexPage',$name));

        $file = resource_path("views/admin/".strtolower($name)."/create.blade.php");
        file_put_contents($file, Self::generateContent('CreatePage',$name));

        $file = resource_path("views/admin/".strtolower($name)."/edit.blade.php");
        file_put_contents($file, Self::generateContent('EditPage',$name));

        $file = resource_path("views/admin/".strtolower($name)."/show.blade.php");
        file_put_contents($file, Self::generateContent('ShowPage',$name));

        $console->info('Index Page Created Successfully');
        $console->info('Create Page Created Successfully');
        $console->info('Show Page Created Successfully');
        $console->info('Edit Page Created Successfully');


    }

}
