<?php


namespace App\Libraries\Utilities;


use App\Http\Controllers\Navigation\NavigationController;

class NavigationUtility
{
    public static function createNavigations($type, $navigation = 'admin')
    {
        $navs = NavigationController::getNavigation($navigation, true);
        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if (in_array($nav1->properties->route, config('base.routes.data.items'))
                    && $nav1->properties->value == $type) {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        return $navs;
    }

}