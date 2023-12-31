<?php

namespace App\Repositories;

use App\Models\Admin\Menu;
use App\Contracts\MenuRepositoryInterface;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Artisan;

class MenuRepository implements MenuRepositoryInterface
{
    // Menu Index
    public function indexMenu()
    {
        $menus = Menu::all();
        return compact('menus');
    }

    // Menu Create
    public function createMenu()
    {
        //
    }

    // Menu Store
    public function storeMenu(MenuRequest $request)
    {
        if($request->validated()){
            Artisan::call('make:crud ' .$request->name);
        }
    }

    // Menu Show
    public function showMenu(Menu $menu)
    {
        return compact('menu');
    }

    // Menu Edit
    public function editMenu(Menu $menu)
    {
        return compact('menu');
    }

    // Menu Update
    public function updateMenu(MenuRequest $request, Menu $menu)
    {
        if($request->validated()){
            Artisan::call('edit:crud ' . $request->name);
        }
        // $menu->update($request->validated());
    }

    // Menu Destroy
    public function destroyMenu(Menu $menu)
    {
        $menu->delete();
    }
}
