<?php

namespace App\Mixins;

use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;

class AdminRouteMixins
{
    //Admin Routes
    public function admin()
    {
        return function (){

            Route::view('/dashboard', 'admin.dashboard.index')->middleware(['auth', 'verified'])->name('dashboard');
            Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
                Route::resource('roles',RoleController::class);
            });
        };
    }
}


