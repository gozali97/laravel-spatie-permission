<?php

use App\Models\Navigation;

if (!function_exists('getMenus')) {

    function getMenus()
    {
        return Navigation::with('subMenus')->where('main_menu')->orderBy('id', 'asc')->get();
    }
}
