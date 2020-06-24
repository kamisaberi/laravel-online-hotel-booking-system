<?php


namespace App\Libraries\Utilities;


use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\User\UserController;

class BaseUtility
{
    public static function createBaseInformations()
    {
        $data = [];
        $data['locales'] = config('base.locales');
        $data['base_locale'] = 'fa';
        $data['locales_and_flags'] = config('base.locales_and_flags');
        $data['user'] = UserController::getCurrentUserData();
        return $data;
    }

    public static function getBaseLocale()
    {
        $base_locale = 'fa';
        return $base_locale != app()->getLocale() ? true : false;
    }

    public static function generateForIndex($type)
    {
        $data = self::createBaseInformations();
        $data['navigations'] = NavigationUtility::createNavigations($type);
        $data['type'] = $type;
        $data['page_title'] = trans('messages.list of') . PluralUtility::plural(trans("items." . $type));
        $data['breadcrumbs'] = BreadcrumbsUtility::createForIndex($type);
        $data['urls'] = ItemUtility::getUrls($type);
        $data['permissions'] = ItemUtility::getPermissions($type);
        return $data;

    }

    public static function generateForCreate($type)
    {
        $data = self::createBaseInformations();
        $data['navigations'] = NavigationUtility::createNavigations($type);
        $data['type'] = $type;
        $data['urls'] = ItemUtility::getUrls($type);
        $data['permissions'] = ItemUtility::getPermissions($type);
        $data['page_title'] = trans('messages.list of') . PluralUtility::plural(trans("items." . $type));
        $data['breadcrumbs'] = BreadcrumbsUtility::createForCreate($type);
        $data['form_type'] = 'create';
        return $data;
    }

    public static function generateForEdit($type, $id)
    {
        $data = BaseController::createBaseInformations();
        $data['navigations'] = NavigationUtility::createNavigations($type);
        $data['type'] = $type;
        $data['id'] = $id;
        $data['urls'] = ItemUtility::getUrls($type, $id);
        $data['permissions'] = ItemUtility::getPermissions($type);
        $data['page_title'] = trans('messages.list of') . PluralUtility::plural(trans("items." . $type));
        $data['breadcrumbs'] = BreadcrumbsUtility::createForEdit($type);
        $data['form_type'] = 'edit';
        return $data;

    }
}
