<?php

namespace App\Mixins;

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

class AdminRouteMixins
{
    //Admin Routes
    public function admin()
    {
        return function (){


            Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
            Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
                Route::resource('roles',RoleController::class);
                Route::resource('users',UserController::class);
                Route::resource('permissions',PermissionController::class);
                Route::resource('menus',MenuController::class);

            });
        };
    }
}


