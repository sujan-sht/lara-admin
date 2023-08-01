<?php

namespace App\Repositories;

use App\Models\Admin\Menu;
use App\Contracts\MenuRepositoryInterface;
use App\Http\Requests\MenuRequest;

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
        Menu::create($request->validated());
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
        $menu->update($request->validated());
    }

    // Menu Destroy
    public function destroyMenu(Menu $menu)
    {
        $menu->delete();
    }
}
