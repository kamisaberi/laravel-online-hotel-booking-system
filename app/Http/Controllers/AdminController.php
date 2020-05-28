<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\BaseController;
use App\Http\Controllers\Base\PropertyController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Navigation\NavigationController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\User\UserController;
use App\Libraries\Utilities\ItemUtility;
use App\Libraries\Utilities\TypeUtility;
use App\ServiceType;
use DateTime;
use Route;

class AdminController extends Controller
{


    public static function getBaseInformation(&$data)
    {

        $navs = NavigationController::getNavigation('admin', true);

        foreach ($navs as $k => $nav) {
            foreach ($nav as $k1 => $nav1) {
                if ($nav1->properties->route == 'admin.index') {
                    $nav1->active = true;
                } else {
                    $nav1->active = false;
                }
            }
        }

        $data['navigations'] = $navs;
    }


    function __construct()
    {
//        $this->middleware(['auth', 'authAdmin']);
    }


    public function index()
    {

        $data = BaseController::createBaseInformations();
        self::getBaseInformation($data);
        $data['customer_count'] = 0;
        $data['user_count'] = 0;
        $data['users'] = ItemUtility::getItems('user');
        $data['customers'] = ItemUtility::getItems('customer');
        $data ['rooms'] = ItemUtility::getItems('room');
        $d = date('d');
        $m = date('m');
        $y = date('Y');
        $gr_st_date = new DateTime("$m/$d/$y");
        $today_timestamp = round($gr_st_date->getTimestamp() * 1000, 0);
        $data['today'] = $d . "-" . $m . '-' . $y;
        $data ['reserves'] = [];
        $data['service_type'] = "reserves";
//        return $data;
        return view('admin.index', $data);
    }

    //
}
