<?php

namespace App\View\Composers;

// use App\Repositories\UserRepository;

use App\Services\MenuService;
use Illuminate\View\View;

class MenuComposer
{
    public function compose(View $view)
    {
        $menu = (new MenuService())->get_menu();

        $view->with('admin_menu', $menu['admin_menu']);
        $view->with('user_menu', $menu['user_menu']);
    }
}
