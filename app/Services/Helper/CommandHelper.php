<?php

namespace App\Services\Helper;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CommandHelper
{
    public static function getStub($type)
    {
        return file_get_contents(app_path("Console/Commands/Stubs/$type.stub"));
    }

    public static function createFolderIfNotExists($folderPath)
    {
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true, true);
        }
    }

    public static function generateContent($stubName,$name)
    {
        $content = str_replace(
            [
            'modelName',
            'lowercaseModelName',
            'pluralModelName'
        ],
        [
            $name,
            strtolower($name),
            strtolower(Str::plural($name))
        ],Self::getStub($stubName));
        return $content;
    }
}
