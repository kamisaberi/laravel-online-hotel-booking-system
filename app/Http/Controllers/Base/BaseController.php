<?php

namespace App\Http\Controllers\Base;

use App\Data;
use App\DataProperty;
use App\DataPropertyValue;
use App\DataType;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Data\DataController;
use App\Http\Controllers\User\UserController;
use App\Relation;
use App\RelationProperty;
use App\Translation;
use DB;
use Illuminate\Http\Request;
use stdClass;

class BaseController extends Controller
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


}
