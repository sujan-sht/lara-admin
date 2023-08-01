<?php

namespace App\Contracts;

use App\Http\Requests\MenuRequest;
use App\Models\Admin\Menu;

interface MenuRepositoryInterface
{
    public function indexMenu();

    public function createMenu();

    public function storeMenu(MenuRequest $request);

    public function showMenu(Menu $menu);

    public function editMenu(Menu $menu);

    public function updateMenu(MenuRequest $request, Menu $menu);

    public function destroyMenu(Menu $menu);
}
